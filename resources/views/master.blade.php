<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>@yield('title', 'Recipe Manager')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bistro.css') }}" charset="utf-8">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" charset="utf-8">
    <script src="https://use.fontawesome.com/26d36bc8b1.js"></script>
    <!-- Header Stack -->
    @stack('head')
    <!-- End Header Stack -->
  </head>

  <body>

    @include('shared.navbar')
    <div class="container">
      <div class="row">
        @yield('body')
      </div>
    </div>

    <!-- Footer Stack -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('assets/js/jquery.js') }}"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>window.jQuery.fn.modal || document.write('<script src="{{ asset('assets/js/bootstrap.js') }}"><\/script>')</script>
    @stack('foot')
    <!-- End Footer Stack -->
  </body>
</html>
