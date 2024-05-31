<div class="container">
    <div class="d-flex justify-content-around my-5">
        <div class="btn-group">
            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Difficulty
            </button>
            <ul class="dropdown-menu">
                @foreach ($tags_difficulty as $tag)
                    <li>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
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
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
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
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            {{ $tag->name }}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Loop
            </label>
        </div>
    </div>