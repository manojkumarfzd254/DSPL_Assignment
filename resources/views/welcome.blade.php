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
                    <h3>Assinment</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-4">
                        <a href="{{ route('post_methods.index') }}" class="btn btn-default">Post Method</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('ajax_methods.index') }}" class="btn btn-default">Ajax Method</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('dialer.index') }}" class="btn btn-default">Dialer</a>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>

