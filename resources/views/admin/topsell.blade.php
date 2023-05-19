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
                        <h4 class="page-title">Top selling products</h4>
                    </div>
                </div>
            </div>




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
                                            <th>Name</th>
                                            <th>Cateid</th>
                                            <th>Img product</th>
                                            <th>Description</th>
                                            <th>Id admin</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Sell price</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach($product as $topproduct)
                                        <tr>
                                            <td>{{$topproduct->proId}}</td>
                                            <td>{{$topproduct->nameProduct}}</td>
                                            <td>{{$topproduct->cateid}}</td>
                                            <td>{{$topproduct->imgPro}}</td>
                                            <td>{{substr($topproduct->description,0,50)}}...</td>
                                            <td>{{$topproduct->idadmin}}</td>
                                            <td>{{$topproduct->price}}</td>
                                            <td>{{$topproduct->status}}</td>
                                            <td>{{$topproduct->salePrice}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $product->links('pagination::bootstrap-4')}}
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