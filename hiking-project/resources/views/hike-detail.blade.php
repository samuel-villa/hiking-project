<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../resources/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <title>{{ $hike->name }}</title>
</head>
<body>

    @include('partials/header')

        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">

{{--                        @foreach ($imagePaths as $index => $imagePath)--}}
{{--                        <figure class="figure m-0 w-100" style="height: 180px; overflow: hidden;">--}}
{{--                            <img class="figure-img img-fluid" src="{{ $imagePath }}" alt="{{ $hike->name }}" style="object-fit: cover; height: 100%; width: 100%;">--}}
{{--                        </figure>--}}
{{--                        @endforeach--}}


                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($imagePaths as $index => $imagePath)
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="@if ($index === 0) active @endif"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($imagePaths as $index => $imagePath)
                                    <div class="carousel-item @if ($index === 0) active @endif">
                                        <img class="d-block w-100" src="{{ $imagePath }}" alt="Slide {{ $index + 1 }}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>






                        <div class="card-body">
                            <h5 class="card-title">{{ $hike->name }}</h5>
                            <p class="card-text">{{ $hike->description }}</p>
                            <h4>Distance</h4>
                            <p class="testtest">{{ $hike->distance }}</p>
                            <h4>Duration</h4>
                            <p>{{ $hike->duration }}</p>
                            <h4>Elevation gain</h4>
                            <p>{{ $hike->elevation_gain }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Tags :
                                @foreach ($hike->tags as $tag)
                                    -  {{ $tag->name }}
                                @endforeach
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@include('partials/footer')


</body>
</html>




