<html lang="en">
<head>
    <title>@yield('title')</title>
</head>
<body>
    <div align="center">
         @include('layouts.header')
        <div align="center">
            @yield('content')
        </div>
     	@include('layouts.footer')
    </div>
</body>
</html>


