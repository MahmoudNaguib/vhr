<?php

use Intervention\Image\Facades\Image;


function ValidateRequestApi($request, $rules) {
    $validator = validator()->make($request, $rules);
    if ($validator->fails()) {
        throw new \App\Exceptions\ValidationApiException(json_encode(transformValidation($validator->errors()->messages())));
    }
}

function appVersion() {
    $json = json_decode(@file_get_contents(public_path() . '/version.json'));
    return number_format(@$json->version, 2);
}

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

function resizeImage($image, $sizes = ['large' => 'resize,300x300', 'small' => 'crop,150x120']) {
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
        $user = \App\Models\User::active()->where('token', $token)->first();
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

function youtubeID($link) {
    if ($link) {
        if (strstr($link, '?v=')) {
            $query = parse_url($link, PHP_URL_QUERY);
            parse_str($query, $params);
            if (@$params['v']) {
                $id = $params['v'];
                return $id;
            }
        } else {
            if (strstr($link, 'embed')) {
                $id = trim(substr(strstr($link, 'embed'), 6));
            } else {
                $links = explode('/', $link);
                if (@$links[sizeof($links) - 1]) {
                    $id = trim($links[sizeof($links) - 1]);
                } else {
                    if (@$links[sizeof($links) - 2]) {
                        $id = trim($links[sizeof($links) - 2]);
                    }
                }
            }
        }
        if (strlen($id) > 11) {
            return substr($id, strlen($id) - 11, 11);
        } else {
            return $id;
        }
    }
    return false;
}

function youtube($youtubeID) {
    if ($youtubeID) {
        return '<iframe width="150" height="113" src="http://www.youtube.com/embed/' . $youtubeID . '?rel=0;showinfo=0;controls=0" frameborder="0" allowfullscreen></iframe>';
    }
}

function getConfigs() {
    if (\Cache::has('configs')) {
        return \Cache::get('configs');
    } else {
        if (\Schema::hasTable('configs')) {
            $configs = \App\Models\Config::get();
            $arr = [];
            if ($configs) {
                foreach ($configs as $c) {
                    $key = $c->field;
                    $arr[$key] = $c->value;
                }
            }
            \Cache::put('configs', $arr, env('CACHE_TIME', 24 * 60 * 60));
            return \Cache::get('configs');
        }
    }
}

function conf($field) {
    return @getConfigs()[$field];
}

function appName() {
    $configs = getConfigs();
    $appName = (@$configs['app_name']) ?: env('APP_NAME');
    return $appName;
}

function sendPushNotifications($tokens, $title, $body, $data) {
    $data = array_merge(['title' => $title, 'body' => $body], $data);
    $FCM_SERVER_KEY = env('FCM_SERVER_KEY');
    if ($FCM_SERVER_KEY) {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $tokens = (!is_array($tokens)) ? [$tokens] : $tokens;
        $fields = [
            'notification' => [
                "content_available" => true,
                "sound" => "default",
                'title' => $title,
                "body" => $body,
            ],
            'data' => $data,//['id'=>$id,'type'=>$type]
            "registration_ids" => $tokens
        ];
        $headers = [
            'Authorization: key=' . $FCM_SERVER_KEY, 'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
    }
}

function image($img, $size = '', $attributes = Null) {
    $path = 'uploads/' . $size;
    $src = app()->make("url")->to('/') . '/' . $path . '/' . $img;
    if (!file_exists(public_path() . '/' . $path . '/' . $img) || !$img) {
        $src = '/img/placeholder.png';
    }
    $others = '';
    if ($attributes) {
        foreach ($attributes as $key => $value) {
            $others .= $key . '="' . $value . '"';
        }
    }
    return '<img src="' . $src . '" ' . $others . '>';
}

function fileRender($file) {
    if (!$file)
        return '';
    $path = 'uploads/'.$file;
    if (!$file || !file_exists($path)) {
        return '&nbsp;-----';
    }
    return '<i class="fa fa-paperclip"></i>
        <a href="download/file/' . $file . '" >' . $file . '</a>';
}

