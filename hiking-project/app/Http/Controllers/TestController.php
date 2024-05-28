<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Hike;

class TestController extends Controller
{
    public function showHikesPage()
    {
        $filePath = '../resources/views/hikes.blade.php';
        if (File::exists($filePath)) {
            $content = file_get_contents($filePath);
            return response($content);
        } else {
            return response('File not found baby', 404);
        }
    }

    public function show()
    {
//        $hikes = Hike::paginate(2);
//        if ($hike->slug !== $slug) {
//            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
//        }
        return view('hikes', [
            'hikes' => Hike::paginate(2)
        ]);
    }


}
