

    @include('partials/header')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('created'))
        <div class="alert alert-success">
            {{ session('created') }}
        </div>
    @endif

    {{-- <form action="{{ route('filter') }}" method="GET">
        @csrf
        @include('partials/tags-dropdown')

        <div class="btn-group">
            <a href={{ route('filter') }}>
                <button type="submit" class="btn btn-warning">Apply filters</button>
            </a>
        </div>
    </form> --}}
    @include('partials/tags-dropdown')

<div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($hikes as $hike)
                <a style="text-decoration:none;" href="{{ route('show-hike', ['id' => $hike->id]) }}">
                    <div class="col my-5 zoom-on-hover">
                        <div class="card shadow">
                            <figure class="figure m-0 w-100 " style="height: 280px; overflow: hidden;">
                                @if ($hike->pictures->isNotEmpty() && $hike->pictures->first()->image_path)
                                    @php
                                        $imagePath = $hike->pictures->first()->image_path;
                                    @endphp
                                    <img class="figure-img img-fluid"
                                         src="{{ str_starts_with($imagePath, 'images')   ? asset('storage/' . $imagePath) : asset($imagePath) }}"
                                         alt="{{ $hike->name }}"
                                         style="object-fit: cover; height: 100%; width: 100%; border-radius:5px 5px 0px 0px; overflow: hidden;"
                                    >
                                @else
                                    <img class="figure-img img-fluid" src="{{ asset('images/no_image.png') }}" alt="{{ $hike->name }}" style="object-fit: cover; height: 100%; width: 100%;border-radius:5px 5px 0px 0px;">
                                @endif
                            </figure>
                            <div class="card-body">
                                <h3 class="card-title text-center my-2">{{ $hike->name }}</h3>
                                <hr>
                                <div class="row my-3 text-center">
                                    <div class="col-md-6">
                                        <h6><strong>Trail Rank</strong></h6>
                                        <p>{{ $hike->trail_rank }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><strong>Distance</strong></h6>
                                        <p>{{ $hike->distance }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><strong>Duration</strong></h6>
                                        <p>{{ $hike->duration }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><strong>Elevation gain</strong></h6>
                                        <p>{{ $hike->elevation_gain }}</p>
                                    </div>
                                </div>
                                <h6 class="text-center"><strong>Description</strong></h6>
                                <p class="card-text">{{ $hike->short_description}}</p>
                                <small class="text-muted">
                                    <h6><strong>Created by  </strong><span>{{ $hike->creator->name }}</span></h6>
                                </small>

                            </div>

                            <div class="card-footer">

                                <small class="text-muted">
                                    <p class="text-center"><strong>{{ $hike->tags->pluck('name')->join(' - ') }}</strong></p>
                                </small>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="my-5">
                {{$hikes->links()}}
            </div>
        </div>


@include('partials/footer')

</body>
</html>
