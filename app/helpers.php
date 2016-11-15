<?php 

function set_active($path, $active = 'active') {
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

//add image to Public folder
function uploadImage($image, $path, $delete = false) {
    if (!$image) {
        return null;
    }

    try {
            $uploadDir = public_path(sprintf($path));

            if ($delete) {
                File::cleanDirectory($uploadDir);
            }

            $imageName= time() . '.' . $image->getClientOriginalExtension();
            $image->move($uploadDir, $imageName);

            return $imageName;
    } catch (Exception $e) {
        Log::debug($e);

        return null;
    }
}

//make lesson
function makeLesson($words) {
    try {
        $questions = [];
        foreach ($words as $key => $word) {
            $questions[$key]['word'] = $word;
            foreach ($word->answers as $answer) {
                $questions[$key]['answers'][] = $answer;
            }
        }

        return $questions;
    } catch (Exception $e) {
        Log::debug($e);

        return null;
    }
}
