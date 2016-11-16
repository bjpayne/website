<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ben Payne</title>
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <main class="row">
        <div id="home" class="col-xs-12 section">
           <div class="inner-section">
                <div class="jumbotron">
                    <h1 class="text-center">I'm Ben Payne.</h1>
                    <p class="text-center">
                        I am a web developer from Grand Rapids, MI.
                    </p>
                </div>
           </div>
           <div class="nav-controller text-center">
               <a href="#about">&#10148;</a>
           </div>
        </div>
        <div id="about" class="col-xs-12 section">
            <div class="row inner-section">
                <div class="col-xs-8 col-xs-offset-2">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aut ipsum labore mollitia nobis,
                        quas quidem voluptatibus! Aperiam culpa cum deleniti eligendi excepturi expedita facere, in modi,
                        placeat quasi tempore.</p>
                </div>
            </div>
            <div class="nav-controller text-center">
               <a href="#contact">&#10148;</a>
            </div>
        </div>
        <div id="contact" class="col-xs-12 section">
            <div class="row inner-section">
                <div class="col-xs-8 col-xs-offset-2">
                    <form action="{{ route('store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message" class="text-area-label">Message</label>
                            <textarea name="message" id="message" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<div id="notice" class="out">
    <span id="notice-text"></span>
</div>
<script src="{{ elixir('js/app.js') }}"></script>
@if(session('message'))
    <script>
        $(function () {
            var notice = $('#notice');

            notice.find('#notice-text').html("{{ session('message') }}");

            notice.addClass("{{ session('message-type') }}");

            notice.toggleClass('in out');

            window.setTimeout(function () {
                notice.toggleClass('in out')
            }, 3000);
        });
    </script>
@endif
</body>
</html>