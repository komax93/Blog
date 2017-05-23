@extends('main')

@section('title', '| Homepage')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1>Welcome to My Blog!</h1>
                    <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">

                @foreach($posts as $post)

                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ str_limit(strip_tags($post->body), 300) }}</p>
                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read more</a>
                </div>

                <hr/>
                @endforeach
            </div>

            <div class="col-md-3 col-md-offset-1">
                <h3>Sidebar</h3>
            </div>
        </div>
    </div>
@endsection
