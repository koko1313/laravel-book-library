<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Librarian System</title>

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font: 400 15px/1.8 "Lato", sans-serif;
            color: #777;
        }
        .panel-primary {
                 border-color: #337ab7;
                    opacity: 0.90;
}

        .bg {
            /* The image used */
            background-image: url("https://images.unsplash.com/photo-1474291102916-622af5ff18bb?ixlib=rb-0.3.5&s=47d38ebcce41c8441068eaccbebb01a8&auto=format&fit=crop&w=1050&q=80");

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .caption {
            position: absolute;
            left: -15%;
            top: 40%;
            width: 100%;
            text-align: center;
            color: #000;
            opacity: 0.65;
        }
            
        .caption span.border {
            background-color: #111;
            color: #fff;
            padding: 18px;
            font-size: 25px;
            letter-spacing: 10px;
        }
        .btn-danger,.btn-danger:active{
            background-color: #a94442;
            border-color: #f5f5f5;
        }
        .container {
            background: rgba(255,255,255,0.8);
            border-radius: 10px;
            position: relative;
        }
        .wrapper{
            margin: 0 auto;
            width: 92%;
            margin-top: 10px;
        }
        .pagination {
        display: inline-block;
        padding-left: 0;
         border-radius: 4px;
        padding-left: 15px;
         }
         .panel-heading {
            border-bottom: 1px solid transparent;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            }
            
    </style>
</head>
<body>

<div class="bg">

@yield('welcome')

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href={{route('welcome')}}>LibrarianSystem</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href={{route('welcome')}}>Home</a></li>

                @auth
                    <li><a href="{{route('books.list')}}">Library</a></li>
                    <li><a href={{route('files.list')}}>Download</a></li>
                @endauth

                @guest
                    <li><a href="{{route('login')}}">Login</a></li>
                    <li><a href="{{route('register-user')}}">Register</a></li>
                @endguest

                @auth
                    <li><a href="{{route('logout')}}">Logout</a></li>
                @endauth

                <li><a href="{{route('contacts')}}">Contact us</a></li>
            </ul>
        </div>
    </nav>

@yield('content')

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>