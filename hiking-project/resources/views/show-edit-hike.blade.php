@include('partials/header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<div class="container">

    <div>
        <h1>Edit hike</h1>
    </div>

    <form action="{{ route('edit', ['id' => $hike->id]) }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $hike->name }}">
        </div>

        <div class="mb-3">
            <label for="distance" class="form-label">Distance</label>
            <input type="text" class="form-control" id="distance" name="distance" value="{{ $hike->distance }}">
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" value="{{ $hike->duration }}">
        </div>

        <div class="mb-3">
            <label for="elevation_gain" class="form-label">Elevation</label>
            <input type="text" class="form-control" id="elevation_gain" name="elevation_gain" value="{{ $hike->elevation_gain }}">
        </div>


        {{-- @include('partials/tags-dropdown') --}}

        <div class="container">
            <div class="d-flex justify-content-around my-5">
                <div class="btn-group">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Difficulty
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($tags_difficulty as $tag)
                            <li>
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="flexCheckChecked" {{ in_array($tag->id, $selectedTags) ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckChecked">
                                    {{ $tag->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
        
                <div class="btn-group">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Distance
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($tags_distance as $tag)
                            <li>
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="flexCheckChecked" {{ in_array($tag->id, $selectedTags) ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckChecked">
                                    {{ $tag->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
        
                <div class="btn-group">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Terrain
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($tags_terrain as $tag)
                            <li>
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="flexCheckChecked" {{ in_array($tag->id, $selectedTags) ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckChecked">
                                    {{ $tag->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="btn-group">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Loop
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($tags_loop as $tag)
                            <li>
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="flexCheckChecked" {{ in_array($tag->id, $selectedTags) ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckChecked">
                                    {{ $tag->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
        
                {{-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="flexCheckChecked" {{ in_array($tag->id, $selectedTags) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckChecked">
                        Loop
                    </label>
                </div> --}}
            </div>
        


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" class="form-control" name="description" rows="4" cols="50" maxlength="3000">{{ old('description', $hike->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="trail_rank" class="form-label">Rate</label>
            <input type="text" class="form-control" id="trail_rank" name="trail_rank" value="{{ $hike->trail_rank }}">
        </div>

        {{-- <div class="mb-3">
            <label for="picture" class="form-label">Picture</label>
            <input type="file" class="form-control" id="picture" name="picture">
        </div> --}}

        <div class="mb-3"><button type="submit" class="btn btn-primary">Save Hike</button></div>

    </form>

    @include('partials/delete-hike-modal')

</div>
@include('partials/footer')
