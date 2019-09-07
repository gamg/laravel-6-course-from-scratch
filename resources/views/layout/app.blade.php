<html>
<head>
    <title>Mi aplicacion - @yield('title')</title>
</head>
<body>
@section('sidebar')
    Este es el mensaje desde el layout
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
