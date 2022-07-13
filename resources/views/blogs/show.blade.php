@extends("welcome")

@section("content")

    <div class="row">

        <div class="col">
            <h1>Add new blog</h1>
            <a href="{{ route('blogs.create') }}" title="New blog">New blog</a>

        </div>

    </div>


    <div class="row">

        <div class="col">
            <h1>{{ $blog->title }}</h1>
            <h1>{{ $blog->description }}</h1>
            <h1>{{ $blog->author }}</h1>
            <p>{{ $blog->is_active }}</p>
        </div>

    </div>

@endsection;