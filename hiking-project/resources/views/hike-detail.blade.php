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
        <div class="card" style="max-width: 1400px;">
            <div class="row g-0">
                <div class="col-sm-5">
                    @if (count($imagePaths) > 1)
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators" >
                            @foreach ($imagePaths as $index => $imagePath)
                                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="@if ($index === 0) active @endif"></li>
                            @endforeach
                        </ol>
                        @foreach ($imagePaths as $index => $imagePath)
                        
                            <div class="carousel-inner">
                                <div style="max-height: 600px;" class="carousel-item  @if ($index === 0) active @endif">
                                    <img class="d-block w-100"  src="{{ $imagePath }}" alt="Slide {{ $index + 1 }}">
                                </div>
                            </div>
                        
                        @endforeach
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                    @else
                        <img class="figure-img img-fluid"
                                        src="{{ str_starts_with($imagePaths[0], 'images')   ? asset('storage/' . $imagePaths[0]) : asset($imagePaths[0]) }}"
                                        alt="{{ $hike->name }}"
                                        style="object-fit: cover; height: 100%; width: 100%;">
                    @endif

                </div>
                <div class="col-sm-7">
                    <div class="card-body" style="min-height: 600px;">
                        <h2 class="card-title">{{ $hike->name }}</h2>
                        <p class="card-text">{{ $hike->description }}</p>
                    </div>
                </div>
                <div class="table-responsive p-0 m-0">
                    <table class="table table-bordered  m-0">
                        <thead>
                        <tr>
                            <th class="text-center fw-bold m-0">TrailRank</th>
                            <th class="text-center fw-bold m-0">Distance</th>
                            <th class="text-center fw-bold m-0">Duration</th>
                            <th class="text-center fw-bold m-0">Elevation</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">{{ $hike->trail_rank }}</td>
                            <td class="text-center">{{ $hike->distance }}</td>
                            <td class="text-center">{{ $hike->duration }}</td>
                            <td class="text-center">{{ $hike->elevation_gain }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <small class="text-muted">Tags:
                        @foreach ($hike->tags as $tag)
                            - {{ $tag->name }}
                        @endforeach
                    </small>
                </div>
            </div>
        </div>
    </div>



@include('partials/footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>




