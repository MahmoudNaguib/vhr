<?php

namespace App\Http\Controllers\Admin;

use Intervention\Image\Facades\Image;
use File;

class ConfigsController extends \App\Http\Controllers\Controller {

    public function __construct(\App\Models\Config $model) {
        $this->module = 'configs';
        $this->title = trans('app.Configs');
        $this->model = $model;
    }

    public function getIndex() {
        $data['module'] = $this->module;
        $data['page_title'] = $this->title;
        $data['model']=$this->model;
        $data['rows'] = $this->model->get();
        return view('admin.' . $this->module . '.index', $data);
    }

    public function postIndex() {
        $rows = $this->model->get();
        if ($rows) {
            foreach ($rows as $row) {
                if($row->field!='logo'){
                    $row->value = request($row->field);
                    $row->save();
                }
                if($row->field=='logo'){
                    $field = $row->field;
                    if (request()->hasFile($field)) {
                        $uploadPath = 'uploads';
                        $image = request()->file($field);
                        $fileName = strtolower(str_random(10)) . time() . '.' . $image->getClientOriginalExtension();
                        request()->file($field)->move($uploadPath, $fileName);
                        $filePath = $uploadPath . '/' . $fileName;
                        if ($filePath) {
                            $imageSizes = ['large' => 'resize,300x300', 'small' => 'resize,200x200'];
                            foreach ($imageSizes as $key => $value) {
                                $value = explode(',', $value);
                                $type = $value[0];
                                $dimensions = explode('x', $value[1]);
                                if (!File::exists($uploadPath . '/' . $key)) {
                                    @mkdir($uploadPath . '/' . $key);
                                    @chmod($uploadPath . '/' . $key, 0777);
                                }
                                $thumbPath = $uploadPath . '/' . $key . '/' . $fileName;
                                $image = Image::make($filePath);
                                if ($type == 'crop') {
                                    $image->fit($dimensions[0], $dimensions[1]);
                                } else {
                                    $image->resize($dimensions[0], $dimensions[1], function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                $image->save($thumbPath);
                            }
                            @unlink($filePath);
                        }
                        $row->value = $fileName;
                        $row->save();
                    }
                }
            }
        }
        \Cache::forget('configs');
        flash(trans('app.Update successfully'))->success();
        return back();
    }

}
