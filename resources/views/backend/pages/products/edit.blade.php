@extends('backend.layouts.main_template')
@section('title') Edit Product @parent @endsection
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('backend/products') }}">Product List</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
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
              <form class="form-horizontal" method="post" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                  <div class="form-group row">
                    <label for="prd_name" class="col-sm-2 col-form-label">ชื่อสินค้า</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="prd_name" name="prd_name" placeholder="ชื่อสินค้า" value="{{ $product->name }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="prd_slug" class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="prd_slug" name="prd_slug" placeholder="Slug" value="{{ $product->slug }}">  
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="prd_description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="prd_description" name="prd_description" placeholder="Description">{{ $product->description }}</textarea>                      
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="prd_price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="prd_price" name="prd_price" placeholder="Price" value="{{ $product->price }}"> 
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