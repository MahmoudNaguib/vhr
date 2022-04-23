<?php

use Intervention\Image\Facades\Image;

function RandomString($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $randstring = '';
    for ($i = 0; $i < $n; $i++) {
        $randstring .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randstring;
}
function configureUploads() {
    $uploads = public_path() . '/uploads';
    if (!File::isDirectory($uploads)) {
        File::makeDirectory($uploads, 0777, true, true);
    }
    $small = $uploads . '/small';
    if (!File::isDirectory($small)) {
        File::makeDirectory($small, 0777, true, true);
    }
    $large = $uploads . '/large';
    if (!File::isDirectory($large)) {
        File::makeDirectory($large, 0777, true, true);
    }
}

function token() {
    $token = request('token') ?: (request()->header('Authorization') ?: request()->header('token'));
    if ($token) {
        $token = str_replace('Bearer ', '', $token);
    }
    return $token;
}

function generateToken($email) {
    return md5(RandomString(10)) . md5(time()) . md5($email) . md5(RandomString(10));
}

function resizeImage($image, $sizes = ['large' => 'resize,400x240', 'small' => 'crop,200x120']) {
    $fileName = pathinfo($image)['basename'];
    $random = strtolower(str_random(10)) . time();
    foreach ($sizes as $key => $size) {
        $image = \Image::make($image);
        $newFileName = $random . '.' . $image->extension;
        $uploadsPath = public_path() . '/uploads/' . $key . '/' . $newFileName;
        $size = explode(',', $size);
        $type = $size[0];
        $dimensions = (isset($size[1])) ? $size[1] : '200x200';
        $dimensions = explode('x', $dimensions);
        if ($type == 'crop') {
            $image->fit($dimensions[0], $dimensions[1]);
        } else {
            $image->resize($dimensions[0], $dimensions[1], function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $image->save($uploadsPath, 90);
    }
    return $newFileName;
}

function getConfigsPairs() {
    $arr = [];
    if (\Schema::hasTable('configs')) {
        $configs = \App\Models\Config::get();
        if ($configs) {
            foreach ($configs as $c) {
                $arr[$c->field] = $c->value;
            }
        }
    }
    return $arr;
}
function conf($field) {
    return @getConfigs()[$field];
}
function transformValidation($errors) {
    $temp = [];
    if ($errors) {
        foreach ($errors as $key => $value) {
            $temp[$key] = (is_array(@$value)) ? implode(', ', $value) : $value;
        }
    }
    return $temp;
}

function authorize($action) {
    if (!can($action))
        return abort(403, 'Unauthorized action.');
}

function can($action) {
    $user = auth()->user();
    if (!$user) {
        $token = token();
        if (!$token)
            return false;
        $user = \App\Models\User::active()->where('token',$token)->first();
    }
    if (!$user)
        return false;
    if ($user->role_id == 1)
        return true;
    if (!$user->role_id)
        return false;
    if (!in_array($action, $user->role->permissions)) {
        return false;
    }
    return true;
}
