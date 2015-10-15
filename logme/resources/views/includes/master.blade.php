<html>
<head>
    <title>LogMe</title>
    <link rel="stylesheet" href="{{ asset('stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>
<body>
<header class="container">
    <div class="col-md-12">
        <h1>LogMe</h1>
        <p>Track anything. Easily.</p>
    </div>
</header>
<div class="container">
    @yield('content')
</div>

<script src="{{ asset('dependencies.js') }}"></script>
<script src="{{ asset('app.js') }}"></script>
</body>
</html>