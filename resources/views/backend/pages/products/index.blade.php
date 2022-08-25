@extends('backend.layouts.main_template')
@section ('title') รายการสินค้า @parent @endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>รายละเอียดสินค้า</h1>
        </div>
        {{-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Employeelist</li>
          </ol>
        </div> --}}
      </div>
    </div><!-- /.container-fluid -->
</section>
@if($message = Session::get('success'))
<div class="alert alert-danger text-center mb-3">
    {{ $message }}
</div>
@endif
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">รายการสินค้า</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="mb-3 text-right">
              <a href="{{ route('products.create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> เพิ่มข้อมูลสินค้า </a>
              </div>
              <div class="mb-3">
                   {{-- {{$products->links('pagination::bootstrap-4');}} --}}
                    </div>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Manage</th>
                    
                </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        
                        <tr>
                        <td>{{$product->id}}</td>
                        <td>
                            <div class="image">
                                <img src="{{$product->image}}" width="50" class="direct-chat-img" alt="User Image">
                            </div>
                        </td>   
                        <td>{{$product->name}}</td>
                        <td>{{$product->slug}} </td>
                        <td>{{$product->price}}</td>
                        <td>{{ $product->created_at ? \Carbon\Carbon::parse($product->created_at)->format('d/m/Y'): "ไม่พบ" }}</td>
                        <td>{{ $product->updated_at ? \Carbon\Carbon::parse($product->updated_at)->format('d/m/Y') : "ไม่พบ"}}</td>
                        <td>
                          <div class="btn-group">
                            <a href="{{ route('products.show', $product->id)}}" class="btn btn-info">View</a>
                            
                            <a href="{{ 
                              route('products.edit', $product->id) 
                            }}" class="btn btn-warning">Edit</a>
                         
                            <form method="POST" action="{{ 
                              route('products.destroy', $product->id) }}">
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you Confirm Delete?')">Delete</button>
                                @method('DELETE')
                            </form>
                        </div>
                      </td>
                        </tr>
                     @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Manage</th>
                </tr>
                </tfoot>
              </table>
              <div class="mt-3">
                {{-- {{$products->links('pagination::bootstrap-4');}} --}}
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection
@push('script')
<script src="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/backend/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/backend/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // $("#example1").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
    $('#example2').DataTable({
      "paging": true,
      "pageLength":25,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush