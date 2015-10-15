<html>
<head>
    <title>LogMe</title>
    <link rel="stylesheet" href="{{ asset('stylesheet.css') }}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
    <div class="row">
        <hr/>
    </div>
    <div class="row">
        @include('includes.debug')
    </div>

</div>

<script src="{{ asset('dependencies.js') }}"></script>
<script src="{{ asset('app.js') }}"></script>
</body>
</html>