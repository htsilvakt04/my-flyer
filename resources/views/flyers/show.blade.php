@extends("layout")

@section("scripts.header")
  <link rel="stylesheet" type="text/css" href="/css/libs/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="/css/libs/dropzone.css">
@stop

@section("content")

  <div class="row">
    <div class="col-md-4">
      <h1>{{$flyer->street}}</h1>
      <h2>${{number_format($flyer->price,2)}}</h2>
      <h4>{{$flyer->description}}</h4>
    </div>
    <div class="col-md-8">
      <h1>drop photo and photo show here</h1>

      <form action="/{{$flyer->zip}}/{{$flyer->street}}/photos" class="dropzone" id="dropzone" method="post">
        {{csrf_field()}}
        <div class="fallback">
          <input name="file" type="file" multiple />
        </div>
      </form>

    </div>
  </div>

@stop

@section("scripts.footer")
  <script src="/js/libs/sweetalert.min.js"></script>
  <script src="/js/libs/dropzone.js"></script>
  <script src="/js/libs/app.js"></script>
  <script>
  $(function() {
    Dropzone.options.dropzone = {
      paramName: "photos", // The name that will be used to transfer the file
      maxFilesize: 10, // MB
      acceptedFiles: ".png,.jpg,.jpng,",
    };
  })
  </script>
  @include("flash.alert")
@stop
