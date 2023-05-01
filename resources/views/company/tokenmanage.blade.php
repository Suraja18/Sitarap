<!DOCTYPE html>
<html lang="en">

<head>

    @include('company.layout.companycss')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('company.layout.sidenavbar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                 @include('admin.layout.adminnav')
                 @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                 @endif
                <div style="text-align:center; padding-top: 20px;">
                    <h1>Tokens</h1>
                    <form action="{{route('company.add_token')}}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Write Token Code" style="height:35px;">
                        <input type="Submit" class="btn btn-primary" name="Submit" value="Add Tokens">
                    </form>

                    <div class="container" style="padding-top: 20px;">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-12">
                                <div class="panel">
                                    <div class="panel-body table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Token Code</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($token as $tok)
                                                <tr>
                                                    <td>{{$tok->id}}</td>
                                                    <td>{{$tok->token_code}}</td>
                                                    <td>
                                                        <ul class="action-list">
                                                            <li><a onclick="confirmation(event)" href="{{route('company.del_token',$tok->id)}}" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
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

    @include('company.layout.companylogout')

    @include('admin.layout.adminjs')

    

</body>

</html>