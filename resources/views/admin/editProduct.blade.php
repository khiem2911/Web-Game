
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
                        <h4 class="page-title">Form Edit User</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">

                        <form id="demo-form" action="{{route('custom.updateProduct', $proId->proId)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nameProduct">Product Name * :</label>
                                <input type="text" class="form-control" value="{{$proId->nameProduct}}" name="nameProduct" id="nameProduct" placeholder="Enter name product" required autofocus>
                                @if ($errors->has('nameProduct'))
                                <span class="text-danger">{{ $errors->first('nameProduct') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="cateid">Category Game * :</label>
                                <select name="cateid" value="{{$proId->cateid}}">
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
                                <label for="descriptionProduct">Description Product * :</label>
                                <input type="text" id="description" class="form-control" value="{{$proId->description}}" name="description" placeholder="Enter Description" required autofocus>
                                @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="idadmin">Admin Add * :</label>
                                <select name="idadmin" value="{{$proId->idadmin}}" >
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>                                              
                                @if ($errors->has('idadmin'))
                                <span class="text-danger">{{ $errors->first('idadmin') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">Price * :</label>
                                <input type="number" id="price" class="form-control" value="{{$proId->price}}" name="price" placeholder="Enter price" required autofocus>
                                @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="statuss">Money * :</label>
                                <input type="text" id="statuss" class="form-control" value="{{$proId->status}}" name="status" placeholder="Enter monney" required autofocus>
                                @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="salePrice">Sale Price * :</label>
                                <input type="number" id="salePrice" class="form-control" value="{{$proId->salePrice}}" name="salePrice" placeholder="Enter Sale Price" required autofocus>
                                @if ($errors->has('salePrice'))
                                <span class="text-danger">{{ $errors->first('salePrice') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="imgPro">Image Game * :</label>
                                <input type="file" id="imgPro" class="form-control" value="{{$proId->imgPro}}" name="imgPro" required autofocus>
                                @if ($errors->has('imgPro'))
                                <span class="text-danger">{{ $errors->first('imgPro') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-success">
                                    Update
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect"><a href="{{route('product')}}">Cancel</a>
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