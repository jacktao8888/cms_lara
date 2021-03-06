<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />

    <title>首页</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.10.8/umd/popper.min.js" integrity="sha384-DnkRdQ7qQnIyQu3l2I77BVrTus+ZPSPbzkftVyG/w9e7UxGp0S0a72dG5FfBY/G3" crossorigin="anonymous"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>

<body>
Hello
<h1>Article</h1>
<hr>

@foreach($articles as $article)
    <a href="articles/{{ $article->id }}"><h2>{{ $article->title }}</h2></a>
    <!--
        <a href="{{ url('articles', $article->id) }}"><h2>{{ $article->title }}</h2></a>
        <a href={{ action('ArticlesController@show', $article->id) }}<h2>{{ $article->title }}</h2></a>
        -->
    <h5>{{ $article->author }}</h5>
    <article>
        {{ $article->content }}
    </article>
    <span style="color:red">{{ $article->created_at->diffForHumans() }}</span>
@endforeach

</body>

</html>