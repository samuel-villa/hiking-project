    <div class="container">

        <div class="d-flex flex-wrap justify-content-center border shadow-sm mb-5 py-2 gap-3">

                @if (Route::currentRouteName() == 'home' || Route::currentRouteName() == 'filter')
                    <form method="GET" action="{{ route('clearFilters') }}">

                        <a href={{ route('clearFilters') }}>
                            <button type="submit" class="btn btn-outline-warning btn-sm">Clear filters</button>
                        </a>

                    </form>

                @endif

            <div class="btn-group">
                <form action="{{ route('filter') }}" method="GET">
                    @csrf
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" style="border:none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" style="border:none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" style="border:none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" style="border:none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <button type="submit" class="btn btn-outline-success btn-sm">Apply filters</button>
                    </a>
                @endif

            </div>
        </div>


