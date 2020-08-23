@extends('layouts.admin_layout.admin_layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style = "color:red;"><b>Catalogues</b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category Tables</h3>
                <a href = " {{url('admin/add-edit-category') }}">  <button  type="button" class="btn btn-outline-primary" style="float:right;">Add Category</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $category)
                    <tr>
                        <td> {{ $category->id }} </td>
                        <td> {{ $category->category_name }} </td>
                        <td> {{ $category->url }} </td>
                         <td>
                            @if($category-> status == 1)
                                <a  class = "updateCategoryStatus" id = "category-{{ $category->id }}"
                                category_id  = "{{ $category->id }}" href = "Javascript:void(0)">Active</a>
                            @else
                            <a  class = "updateCategoryStatus" id = "category-{{ $category->id }}"
                                 category_id = "{{ $category->id }}" href = "Javascript:void(0)">Inactive</a>
                            @endif
                          </td>
                    </tr>
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection