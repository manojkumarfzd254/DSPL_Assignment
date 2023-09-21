<html>
    <head>
        <title>Blogs List</title>

        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color:#F4F4F4">
        <div class="container">
            <div class="box box-success" style="margin-top:50px">
                <div class="box-header">
                    <h3>Blogs List - (Post Method) <a href="{{ route('post_methods.create') }}" class="btn btn-success pull-right">Create a blog</a></h3>
                </div>
                <div class="box-body">
                    @include('flash')
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td><img src="{{ asset($blog->image) }}" style="width:120px;height:80px" alt="{{ $blog->title }}"></td>
                                    <td>{{ $blog->content }}</td>
                                    <td>
                                        <div>
                                            <form method="POST" class="pull-right" action="{{ route('post_methods.destroy',$blog->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            <a href="{{ route('post_methods.edit',['post_method'=>$blog->id]) }}" class="btn btn-info pull-right">Edit</a>
                                        </div>
                                        {{-- <a href="{{ route('post_methods.destroy',['post_method'=>$blog->id]) }}" class="btn btn-danger">Delete</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </body>
</html>

