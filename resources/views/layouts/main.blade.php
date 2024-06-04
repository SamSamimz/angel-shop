<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}">
    <script src="{{asset('frontend/jquery/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('frontend/carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/carousel/css/owl.theme.default.min.css')}}">
</head>
<body>
    @include('frontend.partials.navbar')
    <main>{{$slot}}</main>
    <script src="{{asset('bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/carousel/js/owl.carousel.min.js')}}"></script>
</body>
</html>