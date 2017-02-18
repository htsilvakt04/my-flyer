<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    @yield("scripts.header")
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @include("navbar")
    <div class="container">
      @yield("content")
    </div>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  @yield("scripts.footer")
  <script src="/js/app.js" charset="utf-8"></script>
  </body>
</html>
