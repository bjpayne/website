<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Bj Payne</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <div id="container">
        @if(session('alert'))
            <div class="alert {{ session('alert-type') or '' }} section">
                {{ session('alert') }}
            </div>
        @endif
        <div id="contact" class="section left out">
            <a class="controller contact-controller" href="#contact">
                <h1>Contact</h1>
            </a>
            <div id="contact-form">
                <form action="/contact" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">send</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="about" class="section right out">
            <a class="controller about-controller" href="#about">
                <h1>About</h1>
            </a>
            <div id="about-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus autem beatae delectus omnis
                    reprehenderit, tempora! Accusamus at aut dolor enim fugit incidunt inventore libero, magni minus
                    necessitatibus sint temporibus unde.</p>
            </div>
        </div>
    </div>
</div>
<script src="/js/all.js"></script>
</body>
</html>