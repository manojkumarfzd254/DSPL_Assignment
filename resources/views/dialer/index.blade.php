<html>
    <head>
        <title>Blogs List</title>

        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
             #dialer_table {
            width: 100%;
            font-size: 1.5em;
        }

        #dialer_table tr td {
            text-align: center;
            height: 50px;
            width: 33%;
        }

        #dialer_table #dialer_input_td {
            border-bottom: 1px solid #fafafa;
        }

        #dialer_table #dialer_input_td input {
            width: 100%;
            border: none;
            font-size: 1.6em;
        }

        /* Remove arrows from type number input : Chrome, Safari, Edge, Opera */
        #dialer_table #dialer_input_td input::-webkit-outer-spin-button,
        #dialer_table #dialer_input_td input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Remove arrows from type number input : Firefox */
        #dialer_table #dialer_input_td input[type=number] {
            -moz-appearance: textfield;
        }

        #dialer_table #dialer_input_td input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #cccccc;
            opacity: 1; /* Firefox */
        }

        #dialer_table #dialer_input_td input:-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: #cccccc;
        }

        #dialer_table #dialer_input_td input::-ms-input-placeholder { /* Microsoft Edge */
            color: #cccccc;
        }

        #dialer_table #dialer_call_btn_td {
            color: #ffffff;
            background-color: green;
            border: none;
            cursor: pointer;
            width: 100%;
            text-decoration: none;
            padding: 5px 32px;
            text-align: center;
            display: inline-block;
            margin: 10px 2px 4px 2px;
            transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            --webkit-transition: all 300ms ease;
        }

        #dialer_table #dialer_call_btn_td:hover {
            background-color: #009d00;
        }

        #dialer_table .dialer_num_tr td {
            -webkit-touch-callout: none; /* iOS Safari */
            -webkit-user-select: none; /* Safari */
            -khtml-user-select: none; /* Konqueror HTML */
            -moz-user-select: none; /* Old versions of Firefox */
            -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently supported by Chrome, Edge, Opera and Firefox */
        }

        #dialer_table .dialer_num_tr td:nth-child(1) {
            border-right: 1px solid #fafafa;
        }

        #dialer_table .dialer_num_tr td:nth-child(3) {
            border-left: 1px solid #fafafa;
        }

        #dialer_table .dialer_num_tr:nth-child(1) td,
        #dialer_table .dialer_num_tr:nth-child(2) td,
        #dialer_table .dialer_num_tr:nth-child(3) td,
        #dialer_table .dialer_num_tr:nth-child(4) td {
            border-bottom: 1px solid #fafafa;
        }

        #dialer_table .dialer_num_tr .dialer_num {
            color: #0B559F;
            cursor: pointer;
        }

        #dialer_table .dialer_num_tr .dialer_num:hover {
            background-color: #fafafa;
        }

        #dialer_table .dialer_num_tr:nth-child(0) td {
            border-top: 1px solid #fafafa;
        }

        #dialer_table .dialer_del_td img {
            cursor: pointer;
        }
        </style>
    </head>
    <body style="background-color:#F4F4F4">
        <div class="container">
            <div class="col-md-4 col-md-offset-4">
                <div class="box box-success" style="margin-top:50px">
                    <div class="box-header">
                        <h3>Dialer </h3>
                    </div>
                    <div class="box-body">
                        @include('flash')
                        <table id="dialer_table">
                            <tr>
                                <td id="dialer_input_td" colspan="3"><input type="number" placeholder="321234567890"></td>
                            </tr>
                            <tr class="dialer_num_tr">
                                <td class="dialer_num" onclick="calculator('dial', 1)">1</td>
                                <td class="dialer_num" onclick="calculator('dial', 2)">2</td>
                                <td class="dialer_num" onclick="calculator('dial', 3)">3</td>
                            </tr>
                            <tr class="dialer_num_tr">
                                <td class="dialer_num" onclick="calculator('dial', 4)">4</td>
                                <td class="dialer_num" onclick="calculator('dial', 5)">5</td>
                                <td class="dialer_num" onclick="calculator('dial', 6)">6</td>
                            </tr>
                            <tr class="dialer_num_tr">
                                <td class="dialer_num" onclick="calculator('dial', 7)">7</td>
                                <td class="dialer_num" onclick="calculator('dial', 8)">8</td>
                                <td class="dialer_num" onclick="calculator('dial', 9)">9</td>
                            </tr>
                            <tr class="dialer_num_tr">
                                <td class="dialer_del_td">
                                    <img alt="clear" onclick="calculator('clear', 'clear')" src="data:image/svg+xml;base64,PHN2ZyBhcmlhLWhpZGRlbj0idHJ1ZSIgZm9jdXNhYmxlPSJmYWxzZSIgZGF0YS1wcmVmaXg9ImZhcyIgZGF0YS1pY29uPSJlcmFzZXIiIHJvbGU9ImltZyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgY2xhc3M9InN2Zy1pbmxpbmUtLWZhIGZhLWVyYXNlciBmYS13LTE2IGZhLTd4Ij48cGF0aCBmaWxsPSIjYjFiMWIxIiBkPSJNNDk3Ljk0MSAyNzMuOTQxYzE4Ljc0NS0xOC43NDUgMTguNzQ1LTQ5LjEzNyAwLTY3Ljg4MmwtMTYwLTE2MGMtMTguNzQ1LTE4Ljc0NS00OS4xMzYtMTguNzQ2LTY3Ljg4MyAwbC0yNTYgMjU2Yy0xOC43NDUgMTguNzQ1LTE4Ljc0NSA0OS4xMzcgMCA2Ny44ODJsOTYgOTZBNDguMDA0IDQ4LjAwNCAwIDAgMCAxNDQgNDgwaDM1NmM2LjYyNyAwIDEyLTUuMzczIDEyLTEydi00MGMwLTYuNjI3LTUuMzczLTEyLTEyLTEySDM1NS44ODNsMTQyLjA1OC0xNDIuMDU5em0tMzAyLjYyNy02Mi42MjdsMTM3LjM3MyAxMzcuMzczTDI2NS4zNzMgNDE2SDE1MC42MjhsLTgwLTgwIDEyNC42ODYtMTI0LjY4NnoiIGNsYXNzPSIiPjwvcGF0aD48L3N2Zz4=" width="22px" title="Clear" />
                                </td>
                                <td class="dialer_num" onclick="calculator('dial', 0)">0</td>
                                <td class="dialer_del_td">
                                    <img alt="delete" onclick="calculator('delete', 'delete')" src="data:image/svg+xml;base64,PHN2ZyBhcmlhLWhpZGRlbj0idHJ1ZSIgZm9jdXNhYmxlPSJmYWxzZSIgZGF0YS1wcmVmaXg9ImZhciIgZGF0YS1pY29uPSJiYWNrc3BhY2UiIHJvbGU9ImltZyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNjQwIDUxMiIgY2xhc3M9InN2Zy1pbmxpbmUtLWZhIGZhLWJhY2tzcGFjZSBmYS13LTIwIGZhLTd4Ij48cGF0aCBmaWxsPSIjREMxQTU5IiBkPSJNNDY5LjY1IDE4MS42NWwtMTEuMzEtMTEuMzFjLTYuMjUtNi4yNS0xNi4zOC02LjI1LTIyLjYzIDBMMzg0IDIyMi4wNmwtNTEuNzItNTEuNzJjLTYuMjUtNi4yNS0xNi4zOC02LjI1LTIyLjYzIDBsLTExLjMxIDExLjMxYy02LjI1IDYuMjUtNi4yNSAxNi4zOCAwIDIyLjYzTDM1MC4wNiAyNTZsLTUxLjcyIDUxLjcyYy02LjI1IDYuMjUtNi4yNSAxNi4zOCAwIDIyLjYzbDExLjMxIDExLjMxYzYuMjUgNi4yNSAxNi4zOCA2LjI1IDIyLjYzIDBMMzg0IDI4OS45NGw1MS43MiA1MS43MmM2LjI1IDYuMjUgMTYuMzggNi4yNSAyMi42MyAwbDExLjMxLTExLjMxYzYuMjUtNi4yNSA2LjI1LTE2LjM4IDAtMjIuNjNMNDE3Ljk0IDI1Nmw1MS43Mi01MS43MmM2LjI0LTYuMjUgNi4yNC0xNi4zOC0uMDEtMjIuNjN6TTU3NiA2NEgyMDUuMjZDMTg4LjI4IDY0IDE3MiA3MC43NCAxNjAgODIuNzRMOS4zNyAyMzMuMzdjLTEyLjUgMTIuNS0xMi41IDMyLjc2IDAgNDUuMjVMMTYwIDQyOS4yNWMxMiAxMiAyOC4yOCAxOC43NSA0NS4yNSAxOC43NUg1NzZjMzUuMzUgMCA2NC0yOC42NSA2NC02NFYxMjhjMC0zNS4zNS0yOC42NS02NC02NC02NHptMTYgMzIwYzAgOC44Mi03LjE4IDE2LTE2IDE2SDIwNS4yNmMtNC4yNyAwLTguMjktMS42Ni0xMS4zMS00LjY5TDU0LjYzIDI1NmwxMzkuMzEtMTM5LjMxYzMuMDItMy4wMiA3LjA0LTQuNjkgMTEuMzEtNC42OUg1NzZjOC44MiAwIDE2IDcuMTggMTYgMTZ2MjU2eiIgY2xhc3M9IiI+PC9wYXRoPjwvc3ZnPg==" width="25px" title="Delete" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"><a href="#" type="button" id="dialer_call_btn_td">Call</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
   function calculator(type, value) {
        let input = $('#dialer_input_td input');
        let input_val = $('#dialer_input_td input').val();
        if (type == 'dial') {
            input.val(input_val + value);
        } else if (type == 'delete') {
            input.val(input_val.substring(0, input_val.length - 1));
        } else if (type == 'clear') {
            input.val("");
        }
    }
    $("#dialer_call_btn_td").click(function(){
        let input_val = $('#dialer_input_td input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url : "{{ route('dialer.makePhoneCall') }}",
                type : "POST",
                data : {phoneNumber:input_val},
                beforeSend:function(){
                    $("#dialer_call_btn_td").text("Dialing...");
                },
                success:function($_res){
                    console.log($_res);
                    $("#dialer_call_btn_td").text($_res.message);
                },
                complete:function(){

                },
                error:function(a,b,c){
                    console.log(a.responseText);
                }
        });
    })
</script>
