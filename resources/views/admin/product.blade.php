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
                        <h4 class="page-title">List product new</h4>
                    </div>
                </div>
            </div>
            <!-- Button create user -->
            <a href="{{ route('create.product')}}"><button id="button"> Create Product</button></a>


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
                                            <th>Image Game</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Admin Add</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Sale Price</th>
                                            <th>Date Create Product</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->proId}}</td>
                                            <td>{{$product->imgPro}}</td>
                                            <td>{{$product->nameProduct}}</td>
                                            <td>{{$product->cateid}}</td>                                        
                                            <td>{{substr($product->description,0 ,100)}}...</td>
                                            <td>{{$product->idadmin}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->status}}</td>
                                            <td>{{$product->salePrice}}</td>
                                            <td>{{$product->datecreatePro}}</td>

                                            <td>
                                                <form action="{{route('user.destroyProduct',$product->proId)}}" method="post">
                                                    <a href="{{route('edit.product',$product->proId)}}" class="btn btn-primary waves-effect waves-light btn-sm">
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
                                {{ $products->links('pagination::bootstrap-4')}}
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