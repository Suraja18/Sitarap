<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.layout.admincss')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin.layout.sidenavbar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                 @include('admin.layout.adminnav')
                 @if(session()->has('message'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                 @endif
                <!--  -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <a href="{{route('admin.company')}}" class="btn btn-sm btn-primary pull-left"><i class="fa fa-plus-circle"></i> Add New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($company as $compa)
                                            <tr>
                                                <td>{{$compa->id}}</td>
                                                <td>{{$compa->name}}</td>
                                                <td>{{$compa->email}}</td>
                                                <td>
                                                    <ul class="action-list">
                                                        <li><a href="#" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                                        <li><a onclick="return confirm('Are you sure to delete this company?')" href="{{route('admin.del_company',$compa->id)}}" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               

            </div>
            <!-- End of Main Content -->

            @include('admin.layout.adminfooter')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('admin.layout.adminlogout')

    @include('admin.layout.adminjs')

    

</body>

</html>