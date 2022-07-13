@extends("welcome")

@section("content")

    <div class="row">

        <div class="col">

            <h1>Blogs</h1>
            <a href="{{ route('blogs.index') }}" title="Main page">Main page</a>
        </div>

    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">

        <div class="col">

            <form action="{{ route('blogs.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Title:</strong>
                            <input value="{{ $blog->title }}" type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea class="form-control" style="height:150px" name="description" placeholder="Description">
                                {{ $blog->description }}
                            </textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Author:</strong>
                            <input value={{ $blog->author }} class="form-control" style="height:150px" name="author" placeholder="Author" />
                        </div>
                    </div>

                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-check">
                            <input
                                @if ($blog->is_active == 1)
                                    checked
                                @endif
                            type="checkbox" name="is_active" value="1" id="flexCheckChecked" class="form-check-input" />
                            <label class="form-check-label" for="flexCheckChecked">
                                Active
                            </label>
                        </div> --}}
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>

        </div>

    </div>

@endsection;