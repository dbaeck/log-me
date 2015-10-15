<html>
<head>
    <title>LogMe</title>
    <link rel="stylesheet" href="{{ asset('stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>
<body>

<header class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}" title="LogMe">LogMe <small>Track Anything</small></a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a data-toggle="offcanvas" data-target="#navigation" data-canvas="body">
                        <i class="fa fa-navicon"></i>&nbsp;
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<nav id="navigation" class="navmenu navmenu-default navmenu-fixed-right offcanvas" role="navigation">
    <a class="navmenu-brand" href="{{ route('home') }}">Track Something!</a>
    <ul class="nav navmenu-nav">
        <li><a href="{{ route('home') }}">My Times</a></li>
    </ul>
</nav>
<div class="container" id="content-container">
    @yield('content')
</div>

<script src="{{ asset('dependencies.js') }}"></script>
<script src="{{ asset('app.js') }}"></script>
</body>
</html>