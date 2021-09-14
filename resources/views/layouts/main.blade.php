<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a href="{{route('main.index')}}" class="nav-link">Main</a></li>
                    <li class="nav-item"><a href="{{route('post.index')}}" class="nav-link">Posts</a></li>
                    <li class="nav-item"><a href="{{route('about.index')}}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="{{route('contact.index')}}" class="nav-link">Contacts</a></li>
                </ul>
            </div>
        </nav>



    </div>
    @yield('content')
</div>
</body>
</html>
