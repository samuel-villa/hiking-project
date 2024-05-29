<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Hike;


class HikeController extends Controller
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
        $hikes = Hike::with(['pictures' => function ($query) {
            $query->orderBy('id')->limit(1);
        }, 'tags'])->paginate(8);

        $hikes->each(function ($hike) {
            $hike->short_description = Str::limit($hike->description, 200);
        });

        return view('home', [
            'hikes' => $hikes
        ]);
    }

    public function show_hike(string $id)
    {
        $hike = Hike::findOrFail($id);
        // if ($post->slug !== $slug) {
        //     return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        // }
        return view('hike-detail', [
            'hike' => $hike
        ]);
    }

    public function show_add_hike(Request $request)
    {
        return view('add-hike', ['request' => $request]);
    }

    public function add_picture(Request $request)
    {
        
    }

    public function create(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'distance' => 'required|string|max:255',
        //     'duration' => 'required|string|max:255',
        //     'elevation_gain' => 'required|string|max:255',
        //     'description' => 'required',
        //     'trail_rank' => 'required',
        //     'user_id' => 'required',
        // ]);

        $userId = Auth::id();

        // dd($request->input('name'));
        // dd($validatedData);

        Hike::create([
            'name' => $request->input('name'),
            'distance' => $request->input('distance'),
            'duration' => $request->input('duration'),
            'elevation_gain' => $request->input('elevation_gain'),
            'description' => $request->input('description'),
            'trail_rank' => '100',
            'user_id' => $userId,

        ]);

        return redirect()->route('home');
    }
}
