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
                        <h4 class="page-title">Search Results</h4>
                        
                    </div>
                </div>
            </div>
           
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(count($products) > 0)
                                <p>Showing search results for '{{ $search }}':</p>
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
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->proId}}</td>
                                            <td>{{$product->nameProduct}}</td>
                                            <td>{{$product->cateid}}</td>
                                            <td>{{$product->imgPro}}</td>
                                            <td>{{substr($product->description,0,50)}}...</td>
                                            <td>{{$product->idadmin}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->status}}</td>
                                            <td>{{$product->salePrice}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $products->appends(request()->query())->links('pagination::bootstrap-4')}}
                                @else
                                <p>No search results found for '{{ $search }}'.</p>
                                @endif
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