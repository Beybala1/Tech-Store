<?php
use Intervention\Image\Facades\Image;

if (!function_exists('upload')) {
    function upload($path, $file)
    {
        try {
            $img = $file;
            $extension = $img->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $img->move('images/' . $path, $filename);
            $data['photo'] = 'images/' . $path . '/' . $filename;
            return $data['photo'];
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}