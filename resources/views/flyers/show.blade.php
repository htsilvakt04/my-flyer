@extends("layout")

@section("scripts.header")
  <link rel="stylesheet" type="text/css" href="/css/libs/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="/css/libs/dropzone.css">
  <link rel="stylesheet" type="text/css" href="/css/libs/jquery.fancybox.css">
  <style>
    body {padding-top: 0; padding-bottom: 50px}
  </style>
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
      @foreach ($flyer->photos->chunk(3) as $set)
        <div class="row">
          @foreach ($flyer->photos as $photo)
            <div class="col-md-4">
              <form action="/photos/{{$photo->name}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit"  value="Delete">
              </form>
              <a class="fancybox" rel="gallery1" href="/{{$photo->path}}">
              <img src="/{{$photo->thumbnail_path}}">
              </a>
            </div>
          @endforeach
        </div>
      @endforeach
      <hr>
      @if($signedIn && $flyer->onwnedBy($user))
      <div class="row">
        <form action="/{{$flyer->zip}}/{{$flyer->street}}/photos" class="dropzone" id="dropzone" method="post">
          {{csrf_field()}}
          <div class="fallback">
            <input name="file" type="file" multiple />
          </div>
        </form>
      </div>
      @endif

    </div>
  </div>

@stop

@section("scripts.footer")
  <script src="/js/libs/sweetalert.min.js"></script>
  <script src="/js/libs/dropzone.js"></script>
  <script src="/js/app.js"></script>
  <script src="/js/libs/jquery.fancybox.js"></script>
  <script>
  $(function() {
    $(".fancybox").fancybox();

    Dropzone.options.dropzone = {
      paramName: "photos", // The name that will be used to transfer the file
      maxFilesize: 10, // MB
      acceptedFiles: ".png,.jpg,.jpng,",
    };
  })
  </script>
  @include("flash.alert")
@stop
