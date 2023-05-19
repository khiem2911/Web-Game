@include('admin.header')

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User new</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Form create user</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Form Create User</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">


                        <form id="demo-form" action="{{ route('custom.user') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">User Name * :</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter user name" required autofocus>
                                @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="fullname">Full Name * :</label>
                                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter full name" required autofocus>
                                @if ($errors->has('fullname'))
                                <span class="text-danger">{{ $errors->first('fullname') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email">Email * :</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Enter email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password * :</label>
                                <input type="text" id="password" class="form-control" name="password" placeholder="Enter Password" required autofocus>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone">Number Phone * :</label>
                                <input type="number" id="phone" class="form-control" name="phone" placeholder="Enter number phone" required autofocus>
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                                <div class="form-group">
                                    <label for="moneyaccount">Money * :</label>
                                    <input type="number" id="moneyaccount" class="form-control" name="moneyaccount" placeholder="Enter monney" required autofocus>
                                    @if ($errors->has('moneyaccount'))
                                    <span class="text-danger">{{ $errors->first('moneyaccount') }}</span>
                                    @endif
                                </div>
                            <div class="form-group">
                                <label for="avatar">Avatar * :</label>
                                <input type="file" id="avatar" class="form-control" name="avatar" required autofocus>
                                @if ($errors->has('avatar'))
                                <span class="text-danger">{{ $errors->first('avatar') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-success">
                                    Create
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect" ><a href="{{route('admin')}}">Cancel</a>
                                </button>
                            </div>

                        </form>
                    </div> <!-- end card-box-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->
    
    <!-- Footer Start -->
    @include('admin.footer')