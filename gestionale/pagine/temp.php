<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>
        body {
            background-color: #767676;
        }

        .dot-red {
            height: 15px;
            width: 15px;
            background-color: red;
            border-radius: 50%;
            display: inline-block;
        }

        .dot-green {
            height: 15px;
            width: 15px;
            background-color: green;
            border-radius: 50%;
            display: inline-block;
        }

        .card-1 {
            border: none;
            border-radius: 10px;
            width: 100%;
            background-color: #fff
        }

        .icons i {
            margin-left: 20px
        }

        #example {
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <table id="example" class="table table-borderless table-responsive card-1 p-4">
        <thead style="background-color:rgb(33, 164, 245)">
            <tr class="border-bottom">
                <th> <span class="ml-2">Profilo</span> </th>
                <th> <span class="ml-2">Data di Nascita</span> </th>
                <th> <span class="ml-2">Visita</span> </th>
                <th> <span class="ml-2">Action</span> </th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-bottom">
                <td>
                    <div class="p-2 d-flex flex-row align-items-center mb-2"> <img src="https://i.imgur.com/ZSkeqnd.jpg" width="40" class="rounded-circle">
                        <div class="d-flex flex-column ml-2"> <span class="d-block font-weight-bold">Jennifer john</span> <small class="text-muted">Jasmine Owner Reality group</small> </div>
                    </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">Ammy Song</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>1 City point,#2A</span> <span> Brooklyn,NY</span> </div>
                </td>
                <td>
                    <div class="p-2 icons"> <i class="fa fa-phone text-danger"></i> <i class="fa fa-adjust text-danger"></i> <i class="fa fa-share"></i> </div>
                </td>
            </tr>
            <tr class="border-bottom">

                <td>
                    <div class="p-2 d-flex flex-row align-items-center mb-2"> <img src="https://i.imgur.com/C4egmYM.jpg" class="rounded-circle" width="40">
                        <div class="d-flex flex-column ml-2"> <span class="d-block font-weight-bold">David Smith</span> <small class="text-muted">Jasmine Owner Reality group</small> </div>
                    </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">David Clark</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>205 2ndst,#2A,</span> <span> Brooklyn,NY</span> </div>
                </td>
                <td>
                    <div class="p-2 icons"> <i class="fa fa-phone text-danger"></i> <i class="fa fa-adjust text-danger"></i> <i class="fa fa-share"></i> </div>
                </td>
            </tr>
            <tr class="border-bottom">

                <td>
                    <div class="p-2 d-flex flex-row align-items-center mb-2"> <img src="https://i.imgur.com/0LKZQYM.jpg" class="rounded-circle" width="40">
                        <div class="d-flex flex-column ml-2"> <span class="d-block font-weight-bold">Emmily johnson</span> <small class="text-muted">Jasmine Owner Reality group</small> </div>
                    </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">Mary Kingston</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>199 Bowery,#7A</span> <span> Brooklyn,NY</span> </div>
                </td>
                <td>
                    <div class="p-2 icons"> <i class="fa fa-phone text-danger"></i> <i class="fa fa-adjust text-danger"></i> <i class="fa fa-share"></i> </div>
                </td>
            </tr>
            <tr class="border-bottom">
                <td>
                    <div class="p-2 d-flex flex-row align-items-center mb-2"> <img src="https://i.imgur.com/hczKIze.jpg" width="40" class="rounded-circle">
                        <div class="d-flex flex-column ml-2"> <span class="d-block font-weight-bold">Nick Jones</span> <small class="text-muted">Jasmine Owner Reality group</small> </div>
                    </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">James Smith</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>123 Clinton Ave,#2A</span> <span> Brooklyn,NY</span> </div>
                </td>
                <td>
                    <div class="p-2 icons"> <i class="fa fa-phone text-danger"></i> <i class="fa fa-adjust text-danger"></i> <i class="fa fa-share"></i> </div>
                </td>
            </tr>
        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">User Details</h4>
                </div>
                <div class="modal-body">
                    <div class="username">
                        <p>Name: </p><span></span>
                    </div>
                    <div class="position">
                        <p>Position: </p><span></span>
                    </div>
                    <div class="office">
                        <p>Office: </p><span></span>
                    </div>
                    <div class="age">
                        <p>Age: </p><span></span>
                    </div>
                    <div class="date">
                        <p>Start date: </p><span></span>
                    </div>
                    <div class="salary">
                        <p>Salary: </p><span></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <style>
        .btn-purple {
            color: #fff;
            background-color: #6f42c1;
            border-color: #643ab0;
        }

        .modal-body div {
            float: left;
            width: 100%
        }

        .modal-body div p {
            float: left;
            width: 20%;
            font-weight: 600;
        }

        .modal-body div span {
            float: left;
            width: 80%
        }
    </style>
    <script>
        jQuery(document).ready(function($) {
            $('#example').DataTable({
                searching: false,
                responsive: true,
                paging: false,
                ordering: true,
                info: false,
                "autoWidth": false,
            });
            var table = $('#example').DataTable();
            $('#example tbody').on('click', 'tr', function() {
                //console.log(table.row(this).data());
                $(".modal-body div span").text("");
                $(".username span").text(table.row(this).data()[0]);
                $(".position span").text(table.row(this).data()[1]);
                $(".office span").text(table.row(this).data()[2]);
                $(".age span").text(table.row(this).data()[3]);
                $(".date span").text(table.row(this).data()[4]);
                $(".salary span").text(table.row(this).data()[5]);
                $("#myModal").modal("show");
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>