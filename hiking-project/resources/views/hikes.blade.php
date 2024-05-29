<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>



    @include('partials/header')


@foreach($hikes as $hike)
    <article>
        <h2>{{ $hike->name }}</h2>
        @if ($hike->pictures->isNotEmpty())
            <img src="{{ $hike->pictures->first()->image_path }}" alt="First picture of {{ $hike->name }}">
        @else
            <p>No pictures available.</p>
        @endif
        <h4>Distance</h4>
        <p>{{ $hike->distance }}</p>
        <h4>Duration</h4>
        <p>{{ $hike->duration }}</p>
        <h4>Elevation gain</h4>
        <p>{{ $hike->elevation_gain }}</p>
        <h4>Description</h4>
        <p>{{ $hike->description }}</p>
        <h4>Trail Rank</h4>
        <p>{{ $hike->trail_rank }}</p>
        <p>Tags:</p>
        @if ($hike->tags->isNotEmpty())
            <ul>
                @foreach ($hike->tags as $tag)
                    <li>{{ $tag->name }}</li>
                @endforeach
            </ul>
        @else
            <p>No tags available.</p>
        @endif
    </article>
@endforeach

    {{$hikes->links()}}

@include('partials/footer')

</body>
</html>




