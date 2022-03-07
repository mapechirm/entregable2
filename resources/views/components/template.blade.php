<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @if ($style)
    <style>
      {{ $stylecontent }}    
    </style>
    @endif

    @if ($css)
      <link rel="stylesheet" href="{{ $cssfilename }}">
    @endif

    <title>{{ $title }}</title>
  </head>
  <body style="background-color: #C6E5DF">
    @include('partials.alerts') {{-- Preguntar --}}

    @auth
        @include('partials.nav')
    @endauth
    <div
      class="container d-flex justify-content-center flex-column mt-3" >
        {{ $content }}
    </div>
    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="/js/platformAdd.js"></script>
    <script src="https://kit.fontawesome.com/ee80b1599b.js" crossorigin="anonymous"></script>
  </body>
</html>
