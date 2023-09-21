<html>
    <head>
        <title>Blogs List</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body style="background-color:#F4F4F4">
        <div class="container">
            <div class="box box-success" style="margin-top:50px">
                <div class="box-header">
                    <h3>Update blog - (Ajax Method)</h3>
                </div>
                <div class="box-body">
                    @include('flash')
                    {!! Form::model($blog, ['route' => ['ajax_methods.update', $blog->id], 'method' => 'PUT','files'=>true,'id'=>'updateBlog']) !!}
                    {{-- {!! Form::model($blog, ['id'=>'updateBlog','files'=>true]) !!}  --}}
                        @method('PUT')
                        @include('ajax_method.form')

                        <div class="form-group">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </body>
</html>

<script>
    $('#updateBlog').submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    // formData.append("_token","{{ csrf_token() }}");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "{{ route('ajax_methods.update',['ajax_method'=>$blog->id]) }}",
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $("#ajaxAlert").html('<div class="alert alert-warning" align="center">Please wait...</div>');
        },

        success: function(response) {
            if (response.status) {
                $("#ajaxAlert").html('<div class="alert alert-info" align="center">Blog was successfully updated.</div>');
                setTimeout(function() {
                    window.location.href = "{{ route('ajax_methods.index') }}";
                }, 1000);
            } else {
                $("#ajaxAlert").html('<div class="alert alert-danger" align="center">Server Error while updating blog</div>');
            }
        },
        error: function(a, b, c) {
            console.log(a.responseText);
        }
    });
});

</script>
