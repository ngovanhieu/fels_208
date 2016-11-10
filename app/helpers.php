<?php 

function set_active($path, $active = 'active') {
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function uploadPhoto($request, $model, $photoFieldName) {
    if (!$request->hasFile($photoFieldName)) {
        return $model->$photoFieldName;
    }
    if ($model->$photoFieldName) {
        Storage::delete($model->$photoFieldName);
    }
    return $request->file($photoFieldName)->store(config('fels.upload-path'));
}
