<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes._head')
  </head>
  <body>
    <div id="app">
        @include('includes/_nav')
        
        <div class="container">
          @yield('content')
        </div>
    </div>
	  
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>