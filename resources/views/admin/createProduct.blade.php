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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Form Validation</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Form Create Products</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">


                        <form id="demo-form" action="{{ route('custom.products') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="productname">Product Name * :</label>
                                <input type="text" class="form-control" name="nameProduct" id="productname" placeholder="Enter product name" required autofocus>
                                @if ($errors->has('productname'))
                                <span class="text-danger">{{ $errors->first('productname') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="cateProduct">Category Game *(1-Kinh dị, 2-Hành động, 3-Thế giới mở, 4-Sinh tồn):</label>
                                <select name="cateid">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                                @if ($errors->has('cateid'))
                                <span class="text-danger">{{ $errors->first('cateid') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="descriptionProduct">Description Product *:</label>
                                <input type="text" id="descriptionProduct" class="form-control" name="description" placeholder="Enter description" required autofocus>
                                @if ($errors->has('descriptionProduct'))
                                <span class="text-danger">{{ $errors->first('descriptionProduct') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="adminAdd">Admin Add *(1-Khiem, 2-Hieu, 3-Bao, 4-Dat, 5-Trung) :</label>
                                <select name="idadmin">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>                                
                                @if ($errors->has('adminAdd'))
                                <span class="text-danger">{{ $errors->first('adminAdd') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">Price * :</label>
                                <input type="number" id="price" class="form-control" name="price" placeholder="Enter price" required autofocus>
                                @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                    <label for="status">Status * :</label>
                                    <input type="text" id="statuss" class="form-control" name="status" placeholder="Enter status" required autofocus>
                                    @if ($errors->has('statuss'))
                                    <span class="text-danger">{{ $errors->first('statuss') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="salePrice">Sale Price * :</label>
                                    <input type="number" id="salePrice" class="form-control" name="salePrice" placeholder="Enter sale price" required autofocus>
                                    @if ($errors->has('salePrice'))
                                    <span class="text-danger">{{ $errors->first('salePrice') }}</span>
                                    @endif
                                </div>    
                            <div class="form-group">
                                <label for="imageGame">Image Game * :</label>
                                <input type="file" id="imageGame" class="form-control" name="imgPro" required autofocus>
                                @if ($errors->has('imageGame'))
                                <span class="text-danger">{{ $errors->first('imageGame') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-success">
                                    Create
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect" ><a href="{{route('product')}}">Cancel</a>
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