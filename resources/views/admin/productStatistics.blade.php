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
                        <h4 class="page-title">Product Statistics</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form action="{{route('statistics.product')}}" method="get">
                @csrf
                <label>Monthly statistics <select name="month" class="custom-select custom-select-sm form-control form-control-sm">
                        @for($i = 1; $i <= 12; $i++) <option value="{{$i}}">{{$i}}</option>
                            @endfor

                    </select></label>
                <label>Statistics by year <select name="year" class="custom-select custom-select-sm form-control form-control-sm">
                        @php
                        $currentYear = date('Y');
                        @endphp

                        @for($year = $currentYear - 4; $year <= $currentYear; $year++) <option value="{{ $year }}">{{ $year }}</option>
                            @endfor

                    </select></label>
                <button type="submit">Submit</button>
            </form>

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
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Sell price</th>
                                            <th>Quantity</th>
                                            <th>Month statisticalsell</th>
                                            <th>Year statisticalsell</th>

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
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->status}}</td>
                                            <td>{{$product->salePrice}}</td>
                                            <td>{{$product->soLuong}}</td>
                                            <td>{{$product->monthstatisticalsell}}</td>
                                            <td>{{$product->yearstatisticalsell}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>


                                </table>

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