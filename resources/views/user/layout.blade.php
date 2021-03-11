<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title','unknowen')</title>
  <meta name="description" content="Eaalim syllbus">
  <meta name="keywords" content="learn,quran,like,arabic,native">
  <meta name="author" content="Sayed Khaled">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link href="https://fonts.googleapis.com/css?family=Cairo:200,400,900" rel="stylesheet">
  
  <link rel="stylesheet" href="{{asset('assets/ali/css/animate.css')}}">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="{{asset('assets/ali/css/style.css')}}">

</head>
<body>
  @yield('content')


  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="{{asset('assets/ali/js/jquery.pagepiling.min.js')}}"></script>
  
  <script src="{{asset('assets/ali/js/code-user.js')}}"></script>
  <script src="{{asset('assets/ali/js/notify.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>