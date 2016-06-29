<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | Bj Payne</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <div id="container">
        @if(session('message_sent'))
            <div class="alert alert-success">
                {{ session('message_sent') }}
            </div>
        @endif
        <div id="ying">
            <a class="controller contact-controller" href="#yang">
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
        <div id="yang">
            <a class="controller about-controller" href="#ying">
                <h1>About</h1>
            </a>
            <div id="about-copy">
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