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
    </head>
    <body style="background-color:#F4F4F4">
        <div class="container">
            <div class="box box-success" style="margin-top:50px">
                <div class="box-header">
                    <h3>Create a blog - (Ajax Method)</h3>
                </div>
                <div class="box-body">
                    @include('flash')
                    <div id="ajaxAlert"></div>
                    {!! Form::open(['files'=>true,'id'=>'createBlog']) !!}

                        @include('post_method.form')

                        <div class="form-group">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary','createButton']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $('#createBlog').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "{{ route('ajax_methods.store') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("#ajaxAlert").html('<div class="alert alert-warning" align="center">Please wait...</div>');
            },

            success: function ($_res) {
                if($_res.status)
                {
                    $("#ajaxAlert").html('<div class="alert alert-info" align="center">Blog was successfully created.</div>');
                    ;
                    setTimeout(function() {
                        window.location.href = "{{ route('ajax_methods.index') }}"; // Proper way to redirect
                    }, 1000);
                }
                else
                {
                    $("#ajaxAlert").html('<div class="alert alert-danger" align="center">Server Error while creating blog</div>');
                }

            },
            error: function (a, b, b) {
                console.log(a.responseText);
            }
        });
    });
</script>
