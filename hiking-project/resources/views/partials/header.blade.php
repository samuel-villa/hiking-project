<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Hikido Hiking</title>
</head>
<style>
    .zoom-on-hover {
        transition: transform 0.2s ease-in-out;
    }

    .zoom-on-hover:hover {
        transform: scale(1.05);
    }
</style>

<body style="background-color: #fffefb;">

<header >
    <div class="container" >
        <nav class="navbar navbar-expand-lg border" style="background-color:#EEEEEE;">
            <div class="container-fluid" >

                <a class="navbar-brand " href="{{ route('home') }}">
                    <img class="zoom-on-hover"src="{{ asset('storage/images/Icons/Hikido-icon2.svg') }}" alt="Hikido-icon"> Hikido</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="ms-auto d-flex justify-content-end gap-2">
                        @if (Auth::id())
                            @if ((Auth::check() && Auth::user()->is_admin == 1))
                                <div class="btn-group me-2" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('users.index') }}">
                                        <button type="button" class="btn btn-outline-primary">Users</button>
                                    </a>
                                </div>
                            @endif
                            <div class="btn-group me-2" role="group" aria-label="Basic mixed styles example">
                                <a href={{ route('add-hike') }}>
                                    <button type="button" class="btn btn-success">Add New Hike</button>
                                </a>
                            </div>
                            <div class="dropdown-center">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ (request()->user()->name) }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                    {{-- <li><a class="dropdown-item" href="{{ route('') }}">My Hikes</a></li> --}}
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Log Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ms-auto">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('login')}}">Log In</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('register')}}">Register</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
