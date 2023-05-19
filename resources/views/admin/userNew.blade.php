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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Upvex</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Datatables</li>
                            </ol>
                        </div>
                        <h4 class="page-title">List user new</h4>
                    </div>
                </div>
            </div>
            <!-- Button create user -->
            <a href="{{ route('create.user')}}"><button id="button"> Create user</button></a>


            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Avatar</th>
                                            <th>Name</th>
                                            <th>Full name</th>
                                            <th>Password</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Money</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->uid}}</td>
                                            <td>{{$user->avatar}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->fullname}}</td>
                                            <td>@if(strlen($user->password) > 25)
                                                {{substr($user->password, 0, 25)}}...
                                                @else
                                                {{$user->password}}
                                                @endif
                                            </td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->moneyaccount}}</td>

                                            <td>
                                                <form action="{{route('user.destroy',$user->uid)}}" method="post">
                                                    <a href="{{route('edit.user',$user->uid)}}" class="btn btn-primary waves-effect waves-light btn-sm">
                                                            <span class="btn-label"><i class="fe-edit-1"></i></span>Edit
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger waves-effect waves-light btn-sm">
                                                        <span class="btn-label"><i class="fe-trash-2"></i></span>Delete
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $users->links('pagination::bootstrap-4')}}
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    @include('admin.footer')