<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public $basePath;

    public function __construct()
    {
        $this->basePath = base_path('public') . '/media';
        // $this->path = base_path('public').'/../../media/';
    }

    public function uploadFile($file, $path)
    {
        $fileExt = $file->getClientOriginalExtension();
        $name = time() . '.' . $fileExt;
        $file->move($this->basePath . $path, $name);
        return $name;
    }

    public function updateFile($previous, $new, $path)
    {
        $previousimg = $previous ? $previous : '1.jpg';
        $this->deleteFile($path, $previousimg);
        return $this->uploadFile($new, $path);
    }

    public function deleteFile($path, $file)
    {
        !file_exists($this->basePath . $path . $file) ?: unlink($this->basePath . $path . $file);
    }
}
