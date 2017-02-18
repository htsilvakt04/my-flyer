@if(session()->has("flash_message"))

<script>
  swal({
    title: "{{session('flash_message.title')}}",
    text: "{{session('flash_message.text')}}",
    type: "{{session('flash_message.type')}}",
    timer: 1900,
  });
</script>

@endif
