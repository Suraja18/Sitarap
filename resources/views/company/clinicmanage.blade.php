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
                <div class="center-body">
                    <div class="registration-form">
                        <form method="POST" action="{{route('admin.add_company')}}">
                            @csrf
                            <div class="form-icon">
                                <span><i class="fa fa-user"></i></span>
                            </div>
                            <div class="form-group">
                                Username  <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                <input type="text" class="form-control item" name="name" id="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                Password  <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                <input type="password" class="form-control item" id="password" name="pass" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                Email  <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control item" id="email" name="email" placeholder="Email" required>
                            </div>
                            <!--
                            <div class="form-group">
                                <input type="text" class="form-control item" id="phone-number" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control item" id="birth-date" placeholder="Birth Date">
                            </div> 
                            <div class="input_field radio_option">
                                <input type="radio" name="radiogroup1" id="rd1">
                                <label for="rd1">Male</label>
                                <input type="radio" name="radiogroup1" id="rd2">
                                <label for="rd2">Female</label>
                                </div>
                                <div class="input_field select_option">
                                    <select>
                                    <option>Select a country</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    </select>
                                    <div class="select_arrow"></div>
                                </div>
                        -->
                            <div class="form-group">
                                <Input type="Submit" value="Create Company" class="btn btn-block create-account">
                            </div>
                        </form>
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