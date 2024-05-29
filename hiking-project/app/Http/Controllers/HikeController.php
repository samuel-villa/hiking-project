<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
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
        }, 'tags'])->paginate(1);

        return view('hikes', [
            'hikes' => $hikes
        ]);
    }

    public function show_add_hike(Request $request)
    {
        return view('add-hike', ['request' => $request]);
    }

    public function create(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'distance' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'elevation_gain' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $userId = Auth::id();

        Hike::create([
            'title' => $validatedData['title'],
            'distance' => $validatedData['distance'],
            'duration' => $validatedData['duration'],
            'elevation_gain' => $validatedData['elevation_gain'],
            'description' => $validatedData['description'],
            'user_id' => $userId,

        ]);

        return redirect()->route('hikes')->with('success', 'Hike created successfully.');
    }
}
