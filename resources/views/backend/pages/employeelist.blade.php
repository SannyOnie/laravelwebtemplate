@extends('backend.layouts.main_template')
@section ('title') รายชื่อเจ้าหน้าที่ @parent @endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Employeelist</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Employeelist</li>
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
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="mb-3">
                    {{$employees->links('pagination::bootstrap-4');}}
                    </div>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Fullname</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Tel</th>
                    <th>Address</th>
                    
                </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        
                        <tr>
                        <td>{{$employee->id}}</td>
                        <td>
                            <div class="image">
                                <img src="{{$employee->avatar}}" width="50" class="direct-chat-img" alt="User Image">
                            </div>
                        </td>   
                        <td>{{$employee->fullname}}</td>
                        <td>{{$employee->gender}} </td>
                        <td>{{$employee->age}}</td>
                        <td>{{$employee->tel}}</td>
                        <td>{{$employee->address}}</td>
                        
                        </tr>
                     @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Fullname</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Tel</th>
                    <th>Address</th>
                </tr>
                </tfoot>
              </table>
              <div class="mt-3">
                {{$employees->links('pagination::bootstrap-4');}}
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