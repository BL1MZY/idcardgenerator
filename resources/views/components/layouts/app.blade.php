<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />

    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }


        body {
            /* font-family: serif, serif; */
            /* display: flex; */
            /* justify-content: center; */
            /* align-items: center; */
            /* height: 100vh; */
            /* background-color: #f0f0f0; */
            /* margin: 0; */
        }

        .id-card {
            font-family: serif, serif;
            /* width: 450px;
            height: 286px; */
            border: 1px solid #cbcbcb;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0px;
            background-position: center center;
            background-size: contain;
            background-repeat: no-repeat;

        }

        .id-card-header {
            background-color: #DE1B21;
            color: #fff;
            width: 100%;
            padding: 10px 0;
            margin-bottom: 10px;
            /* border-radius: 10px 10px 0 0; */
        }

        .id-card-header h1 {
            margin: 0;
            font-size: 1.2em;
            font-weight: 600;
            text-transform: capitalize;
        }

        .red {
            color: #DE1B21;
            font-weight: 500;
        }

        .id-card-body {
            padding: 0 1rem;
            display: flex;
            width: 100%;
            align-items: center;
        }

        .id-card-photo {
            width: 120px;
            height: 120px;
            border-radius: 8px;
            overflow: hidden;
            margin-right: 20px;
        }

        .id-card-photo img {
            width: 100%;
            height: 100%;
        }

        .id-card-info {
            flex-grow: 1;
            text-align: left;
        }

        .id-card-info h2 {
            /* margin: 0 0 10px 0; */
            font-size: 1em;
            font-weight: bold;

        }

        .id-card-info p {
            font-size: .9rem;
            font-weight: 600;
            /* margin: 5px 0; */
        }

        .id-card-footer {
            background-color: #DE1B21;
            color: #fff;
            width: 100%;
            padding: 10px 0;
            /* border-radius: 0 0 10px 10px; */
            margin-top: auto;
        }

        .id-card-footer p {
            /* margin: 5px 0; */
        }
    </style>


    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-neutral-100">
    <nav class="fixed top-0 left-0 z-50 w-full px-4 py-3 bg-white shadow-sm">
        <div class="container mx-auto">
            <div class="flex justify-between">
                <img src="{{ asset('photo/images.jpg') }}" width="120px" alt="Lincoln University">
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="self-center">
                        @csrf
                        <button type="submit" class="font-medium text-red-500">Logout</button>
                    </form>
                @endauth
                @if (!Auth::check())
                 <div class="self-center space-x-4">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                 </div>
                @endif

            </div>
        </div>
    </nav>
    <div class="pt-16">
        {{ $slot }}
    </div>
    @livewire('notifications')

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
