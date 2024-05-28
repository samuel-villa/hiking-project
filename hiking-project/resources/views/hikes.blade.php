<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<p>Tags:</p>
@foreach ($hikes as $hike)
@if ($hike->tags->isNotEmpty())
    <ul>
        @foreach ($hike->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>
@else
    <p>No tags available.</p>
@endif
@endforeach


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
    </article>
@endforeach


</body>
</html>




