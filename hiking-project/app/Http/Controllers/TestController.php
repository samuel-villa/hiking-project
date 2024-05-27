<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestController extends Controller
{
    public function showHikesPage()
    {
        $filePath = '../resources/views/hikes.blade.php';
        if (File::exists($filePath)) {
            $content = file_get_contents($filePath);
            // Encapsuler le contenu dans une balise div
            $html = '<div id="hikes-content">' . $content . '</div>';
            return response($html);
        } else {
            return response('File not found baby', 404);
        }
    }
}
