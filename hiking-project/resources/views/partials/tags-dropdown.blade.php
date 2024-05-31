<form action="{{ route('filter') }}" method="GET">
    @csrf
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
        
            @if (Route::currentRouteName() == 'home' || Route::currentRouteName() == 'filter')
            <div class="btn-group">
                <a href={{ route('filter') }}>
                    <button type="submit" class="btn btn-success">Apply filters</button>
                </a>
            </div>
            @endif
        </div>
    </div>
</form>

@if (Route::currentRouteName() == 'home' || Route::currentRouteName() == 'filter')
<form method="GET" action="{{ route('clearFilters') }}">
    <div class="container">
        <div class="d-flex justify-content-around my-5">
            <a href={{ route('clearFilters') }}>
                <button type="submit" class="btn btn-warning">Clear filters</button>
            </a>
        </div>
    </div>
</form>
@endif
