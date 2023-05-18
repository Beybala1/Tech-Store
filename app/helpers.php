<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

if (!function_exists('upload')) {
    function upload($path, $file)
    {
        try {
            $img = $file;
            $extension = $img->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $img->move('images/' . $path, $filename);
            $data['photo'] = 'images/' . $path . '/' . $filename;
            return $data['photo'];
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}

if (!function_exists('multi_upload')) {
    function multi_upload($path, $files)
    {
        try {
            $result = [];
            foreach ($files as $file) {
                $name = uniqid() . '.' . Str::lower($file->extension());
                $file->move("images/$path", $name);
                $result[] = "$path/$name";
            }
            return $result;
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}

if (!function_exists('admin_abort')) {
    function admin_abort()
    {
        if (Gate::denies('admin')) {
            abort(403);
        }
    }
}

if (!function_exists('publisher_abort')) {
    function publisher_abort()
    {
        if (Gate::denies('publisher')) {
            abort(403);
        }
    }
}
if (!function_exists('editor_abort')) {
    function editor_abort()
    {
        if (Gate::denies('editor')) {
            abort(403);
        }
    }
}

if (!function_exists('destroyer_abort')) {
    function destroyer_abort()
    {
        if (Gate::denies('destroyer')) {
            abort(403);
        }
    }
}

if (!function_exists('convert_number')) {
    function convert_number($value)
    {
        if ($value >= 1000 and $value < 1000000) {
            return round($value / 1000, 0) . 'k';
        }
        if ($value >= 1000000) {
            return round($value / 1000000, 0) . 'M';
        } else {
            return $value;
        }
    }
}
