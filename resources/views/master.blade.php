<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>@yield('page-title', 'Bistro Restaurant Manager')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" charset="utf-8">
    @stack('head')
  </head>
  <body>
    @yield('body')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @stack('foot')
  </body>
</html>
