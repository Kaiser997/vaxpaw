<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <title>@yield('title')</title>
    @vite('resources/css/styles.css')

</head>

<body class="d-flex flex-column min-vh-100">

    @include('plantillas.navbar')
    @yield('content')



    

    @include('plantillas.footer')



    


</body>

</html>
