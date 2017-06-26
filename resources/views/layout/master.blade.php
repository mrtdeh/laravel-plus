<html>
<head>
    <title>App Name - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@section('sidebar')
    This is the master sidebar.
@show
 
<div id="app"  class="container">
    @yield('content')
</div>

@option('page','master')
@getAppCss
@getAppScript



</body>
</html>