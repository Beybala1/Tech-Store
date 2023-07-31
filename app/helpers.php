<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

if (!function_exists('upload')) {
    function upload($path, $file): string|\Illuminate\Http\RedirectResponse
    {
        try {
            $img = $file;
            $extension = $img->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            // Move the original image
            $img->move('images/' . $path, $filename);

            // Generate WebP version
            $image = Image::make(public_path('images/' . $path . '/' . $filename));
            $webpFilename = pathinfo($filename, PATHINFO_FILENAME) . '.webp';
            $webpImagePath = public_path('images/' . $path . '/' . $webpFilename);
            $image->save($webpImagePath, 80);

            $data['photo'] = 'images/' . $path . '/' . $filename;
            $data['photo_webp'] = 'images/' . $path . '/' . $webpFilename;
            return $data['photo_webp']; // Return the WebP image path
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}

if (!function_exists('multi_upload')) {
    function multi_upload($path, $files): array|\Illuminate\Http\RedirectResponse
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

if (!function_exists('lang')) {
    function lang()
    {
        return App\Models\Language::where('status',1)->get();
    }
}

if (!function_exists('admin_abort')) {
    function admin_abort(): void
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
