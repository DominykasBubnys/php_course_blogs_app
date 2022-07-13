@extends("welcome")

@section("content")

    <div class="row">

        <div class="col">

            <h1>Blogs</h1>
            <a href="{{ route('blogs.create') }}" title="New blog">New blog</a>
        </div>

    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('blogs.index') }}">
        <label for="search">Search</label>
        <input value="{{ request('search') }}" type="text" name="search" placeholder="Insert blog title">
        <input type="submit">
    </form>

    {{-- <form action="/action_page.php">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value="John"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" value="Doe"><br><br>
        <input type="submit" value="Submit">
    </form>  --}}
      

    <table class="table">
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Description</td>
        </tr>

        @foreach ($blogs as $blog)

            <tr>
                <td>{{ $blog->id }}</td>
                <td><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></td>
                <td>{{ $blog->description }}</td>
                <td>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
            
            
        @endforeach


    </table>

    {{ $blogs->links() }}


    <script>
        $(
            function(){

                $("#search").autocomplete({
                    source: "{{ route('blogs.autocomplete') }}",
                    minLength: 2,
                    select: function(event, ui){
                        console.log("Selected " + ui.item.value + " aka " + ui.item.id);
                        window.location.replace('http://localhost/blogs/' + ui.item.id);
                    }
                })
            }


        )
    </script>

@endsection