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
                        <h4 class="page-title">Form Create Category</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">


                        <form id="demo-form" action="{{ route('custom.category') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nameCate">Name Category * :</label>
                                <input type="text" class="form-control" name="nameCate" id="nameCate" placeholder="Enter name category" required autofocus>
                                @if ($errors->has('nameCate'))
                                <span class="text-danger">{{ $errors->first('nameCate') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-success">
                                    Create
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect" ><a href="{{route('category')}}">Cancel</a>
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