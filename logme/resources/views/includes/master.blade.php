<html>
<head>
    <title>LogMe</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}
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

<script src="{{ asset('date-range-parser.js') }}"></script>
<script src="{{ asset('vue.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>
</body>
</html>