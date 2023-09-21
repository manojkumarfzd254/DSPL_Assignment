<html>
    <head>
        <title>Blogs List</title>

        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    </head>
    <body style="background-color:#F4F4F4">
        <div class="container">
            <div class="box box-success" style="margin-top:50px">
                <div class="box-header">
                    <h3>Blogs List - (Ajax Method) <a href="{{ route('ajax_methods.create') }}" class="btn btn-success pull-right">Create a blog</a></h3>
                </div>
                <div class="box-body">
                    @include('flash')
                    <div id="ajaxAlert"></div>
                    <table id="blog-table" class="table table-bordered table-striped">
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

                        </tbody>
                    </table>
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
var blogTable = 0;
    $(function () {

      blogTable = $('#blog-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('ajax_methods.index_data') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'title', name: 'title'},
              {data: 'image', name: 'image'},
              {data: 'content', name: 'content'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });

    });
    $(document).on("click",".deleteBlog",function(){
        $id = $(this).attr("data-id");
        // alert($id);

        $.ajax({
                url : "http://127.0.0.1:8000/ajax_methods/"+$id,
                type : "DELETE",
                dataType : "json",
                data : {_token : "{{ csrf_token() }}"},
                beforeSend:function(){
                    $("#ajaxAlert").html('<div class="alert alert-warning" align="center">Please wait...</div>');
                },
                success:function($_res){
                    if($_res.status)
                        blogTable.ajax.reload();
                    else
                        $("#ajaxAlert").html('<div class="alert alert-danger" align="center">Server while deleting a blog...</div>');
                },
                complete:function(){
                    $("#ajaxAlert").html('<div class="alert alert-info" align="center">Record successfully deleted.</div>');
                },
                error:function(a,b,c){
                    console.log(a.responseText);
                }
        });
    });
  </script>
