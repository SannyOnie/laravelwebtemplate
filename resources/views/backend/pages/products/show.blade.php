@extends('backend.layouts.main_template')
@section ('title') แสดงรายละเอียดสินค้า @parent @endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product Detail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('backend/products') }}">Product</a></li>
            <li class="breadcrumb-item active">Product Detail</li>
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
               <h6>ชื่อสินค้า</h6>
               <p> {{ $product->name}} </p>

               <h6>Slug</h6>
               <p> {{ $product->slug}} </p>

               <h6>ราคา</h6>
               <p> {{ $product->price}} </p>

               <h6>รายละเอียดสินค้า</h6>
               <p> {{ $product->description}} </p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection