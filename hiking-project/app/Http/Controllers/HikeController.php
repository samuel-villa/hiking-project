<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Hike;
use App\Models\Picture;
use App\Models\Tag;



class HikeController extends Controller
{
    public $pagination = 6;

    public function show(Request $request)
    {
        $hikes = Hike::with(['pictures' => function ($query) {
            $query->orderBy('id')->limit(1);
        }, 'tags','creator'])
            ->orderBy('trail_rank', 'desc')
            ->paginate($this->pagination);

        $tags_difficulty = Tag::where('type', 'difficulty')->get();
        $tags_distance = Tag::where('type', 'distance')->get();
        $tags_terrain = Tag::where('type', 'terrain')->get();
        $tags_loop = Tag::where('type', 'loop')->get();
        $selectedTags = $request->input('tags', []);

        return view('home', [
            'hikes' => $hikes,
            'tags_difficulty' => $tags_difficulty,
            'tags_distance' => $tags_distance,
            'tags_terrain' => $tags_terrain,
            'tags_loop' => $tags_loop,
            'selectedTags' => $selectedTags
        ]);
    }

    public function filter(Request $request)
    {
        $tags_difficulty = Tag::where('type', 'difficulty')->get();
        $tags_distance = Tag::where('type', 'distance')->get();
        $tags_terrain = Tag::where('type', 'terrain')->get();
        $tags_loop = Tag::where('type', 'loop')->get();
        $selectedTags = $request->input('tags', []);

        if (!empty($selectedTags)) {
            $hikes = Hike::whereHas('tags', function($query) use ($selectedTags) {
                $query->whereIn('tags.id', $selectedTags);
            })->paginate($this->pagination);
        } else {
            $hikes = Hike::all()->paginate($this->pagination);
        }

        return view('home', [
            'hikes' => $hikes,
            'tags_difficulty' => $tags_difficulty,
            'tags_distance' => $tags_distance,
            'tags_terrain' => $tags_terrain,
            'tags_loop' => $tags_loop,
            'selectedTags' => $selectedTags
        ]);
    }

    public function clearFilters()
    {
        session()->forget('selectedTags');
        return redirect()->route('home');
    }

    public function show_hike(string $id)
    {
        $hike = Hike::with(['pictures', 'tags'])->findOrFail($id);
        $imagePaths = $hike->pictures->pluck('image_path');

        return view('hike-detail', [
            'hike' => $hike,
            'imagePaths' => $imagePaths
        ]);
    }

    public function show_add_hike(Request $request)
    {
        $tags_difficulty = Tag::where('type', 'difficulty')->get();
        $tags_distance = Tag::where('type', 'distance')->get();
        $tags_terrain = Tag::where('type', 'terrain')->get();
        $tags_loop = Tag::where('type', 'loop')->get();
        $selectedTags = [];

        return view('add-hike', [
            'request' => $request,
            'tags_difficulty' => $tags_difficulty,
            'tags_distance' => $tags_distance,
            'tags_terrain' => $tags_terrain,
            'tags_loop' => $tags_loop,
            'selectedTags' => $selectedTags
        ]);
    }

    public function show_edit_hike(Request $request, $id)
    {
        $hike = Hike::findOrFail($id);

        $tags_difficulty = Tag::where('type', 'difficulty')->get();
        $tags_distance = Tag::where('type', 'distance')->get();
        $tags_terrain = Tag::where('type', 'terrain')->get();
        $tags_loop = Tag::where('type', 'loop')->get();
        $selectedTags = $hike->tags->pluck('id')->toArray();

        return view('show-edit-hike', [
            'request' => $request,
            'hike' => $hike,
            'tags_difficulty' => $tags_difficulty,
            'tags_distance' => $tags_distance,
            'tags_terrain' => $tags_terrain,
            'tags_loop' => $tags_loop,
            'selectedTags' => $selectedTags
        ]);
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

        $hike = Hike::create([
            'name' => $request->input('name'),
            'distance' => $request->input('distance'),
            'duration' => $request->input('duration'),
            'elevation_gain' => $request->input('elevation_gain'),
            'description' => $request->input('description'),
            'trail_rank' => $request->input('trail_rank'),
            'user_id' => $userId,
        ]);

        $hike->tags()->sync($request->input('tags', []));

        if ($request->picture) {
            $path = $request->file('picture')->store('images', 'public');

            // Create the picture record
            Picture::create([
                'hike_id' => $hike->id,
                'image_path' => $path,
            ]);
        }

        session()->flash('created', 'Hike created successfully!');

        return redirect()->route('home');
    }

    public function edit(Request $request, $id)
    {
        Hike::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'distance' => $request->input('distance'),
                'duration' => $request->input('duration'),
                'elevation_gain' => $request->input('elevation_gain'),
                'description' => $request->input('description'),
                'trail_rank' => $request->input('trail_rank'),
            ]);

        $hike = Hike::find($id); // Retrieve the hike model
        $hike->tags()->sync($request->input('tags', [])); // Sync the tags
        session()->flash('edited', 'Hike edited successfully!');

        return redirect()->route('show-hike', [
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        $hike = Hike::find($id);
        if ($hike) {
            $hike->delete();
            session()->flash('status', 'Hike deleted successfully!');
        }
        return redirect()->route('home');
    }
}
