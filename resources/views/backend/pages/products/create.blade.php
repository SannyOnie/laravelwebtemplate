@extends('backend.layouts.main_template')
@section('title') เพิ่มข้อมูลสินค้า @parent @endsection
@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('backend') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Product List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              xxx
              @if($message = Session::get('success'))
                <div class = "alert alert-success text-center mb-3">
                  {{ $message }}
                </div>
              @endif

                <form class="form-horizontal" method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="prd_name" class="col-sm-2 col-form-label">ชื่อสินค้า</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="prd_name" name="prd_name" placeholder="ชื่อสินค้า" value="{{ old('prd_name')}}">
                          <div class="text-danger mt-2"> {{ $errors->first('prd_name')}} </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="prd_slug" class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="prd_slug" name="prd_slug" placeholder="Slug" value="{{ old('prd_slug')}}">
                          <div class="text-danger mt-2"> {{ $errors->first('prd_slug')}} </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="prd_description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="prd_description" name="prd_description" placeholder="Description" value="{{ old('prd_description')}}"></textarea>
                          <div class="text-danger mt-2"> {{ $errors->first('prd_description')}} </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="prd_price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="prd_price" name="prd_price" placeholder="Price" value="{{ old('prd_price')}}">
                          <div class="text-danger mt-2"> {{ $errors->first('prd_price')}} </div>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="prd_image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="prd_image" name="prd_image" placeholder="Image">
                        </div>
                      </div>
                      
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                     
                        <input type="submit" value="Submit">
                    </div>
                    <!-- /.card-footer -->
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection