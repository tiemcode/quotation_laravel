<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('components.head')

<body>

    @include('layouts.navigation')
    <main class="container">
        <div class="row">
            <div class="col-12">
                <x-fleshMessages></x-fleshMessages>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                @include('components.sidebar')
            </div>
            <div class="col-10">
                {{ $slot }}
            </div>
        </div>
    </main>

</body>


</html>
