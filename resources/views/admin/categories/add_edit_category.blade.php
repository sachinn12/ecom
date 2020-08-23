@extends('layouts.admin_layout.admin_layout')
@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
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
        <!-- SELECT2 EXAMPLE -->
       <form>
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Category</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" id="category_name" placeholder="Enter Category Name">
                  </div>
                  <div class="form-group">
                      <label>Select Category Level</label>
                      <select name = "parent_id" class="form-control select2" style="width: 100%;">
                      <option value = "0"> Main Category</option>
                      </select>
                   </div>
               
              </div>
            
              <div class="col-md-6">
              <div class="form-group">
                  <label>Select Sections</label>
                  <select name = "section_id" class="form-control select2" style="width: 100%;">
                  <option value = ""> select</option>
                   @foreach($getSections as $section)
                   <option> {{$section -> name}} </option>
                   @endforeach
                  </select>
                </div>
                <!-- </div> -->
               
                 <div class="form-group">
                    <label for="exampleInputFile">Category Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                     </div>
                     </div>
              </div>
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-12 col-sm-6">
              <div class="form-group">
                    <label for="category_name">Category Discount</label>
                    <input type="text" class="form-control" id="category_discount" placeholder="Enter Category Discount">
                  </div>
              </div>
              <div class="col-12 col-sm-6">
              <div class="form-group">
                    <label for="category_name">Category URL</label>
                    <input type="text" class="form-control" id="category_url" placeholder="Enter Category URL">
                  </div>
              </div>
              <div class="col-12 col-sm-6">
              <div class="form-group">
                    <label for="category_name">Category Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Category Description"></textarea>
                  </div>
              </div>
              <div class="col-12 col-sm-6">
              <div class="form-group">
                    <label for="category_name">Meta Title</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Meta Title"></textarea>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
                    <label for="category_name">Meta Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Meta Description"></textarea>
                  </div>
              </div>
              <div class="col-12 col-sm-6">
              <div class="form-group">
                    <label for="category_name">Meta Keywords</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Meta Keywords"></textarea>
                  </div>
              </div>
          </div>
          <!-- /.card-body -->
                  <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection