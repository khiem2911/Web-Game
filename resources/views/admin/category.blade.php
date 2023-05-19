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
                        <h4 class="page-title">List Category Game</h4>
                    </div>
                </div>
            </div>
            <!-- Button create user -->
            <a href="{{ route('create.category')}}"><button id="button"> Create Category Game</button></a>


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
                                            <th>Category Game</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach($categoryproducts as $category)
                                        <tr>
                                            <td>{{$category->cateid}}</td>
                                            <td>{{$category->nameCate}}</td>

                                            <td>
                                                <form action="{{route('user.destroyCategory',$category->cateid)}}" method="post">
                                                    <a href="{{route('edit.category',$category->cateid)}}" class="btn btn-primary waves-effect waves-light btn-sm">
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
                                {{ $categoryproducts->links('pagination::bootstrap-4')}}
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