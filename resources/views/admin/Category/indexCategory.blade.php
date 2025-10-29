@extends('template.base')

@section('dz')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">

        <div class="col-sm-6">
          <h1 class="m-0">table data category</h1>
        </div>

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard data category</li>
            </ol>
        </div>

    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-header">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Tambah Category</a>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>

              </div>
            </div>
          </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
        {{-- alert create --}}
          @if (Session::get('success'))
          <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ Session::get('success') }}
          </div>
          @endif
        {{-- /aler --}}
        {{-- danger alert --}}
          @if (Session::get('Delete'))
          <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ Session::get('Delete') }}
          </div>
          @endif
        {{-- /aler --}}

            <table class="table table-hover text-nowrap">

            <thead>
              <tr>
                <th>NO.</th>
                <th>category</th>
                <th>slug</th>
                <th>action</th>
              </tr>
            </thead>

            <tbody>
            @foreach ($category as $jay)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $jay->category }}</td>
            <td>{{ $jay->slug }}</td>
            <td>
            <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#edit{{ $jay->id }}"><i class="fa-solid fa-pencil"></i></a>
            @include('admin.Category.modalupdate')
            <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $jay->id }} " ><i class="fa-solid fa-trash"></i></a>
            @include('admin.Category.modaldelete')
            </td>
            </tr>
            @endforeach
            </tbody>

            </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- modal create --}}
<div class="modal fade" id="modal-default">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Tambah Data Category</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="{{ route('create.category') }}" method="POST">
@csrf
<div class="form-group">
<input type="text" name="category" class="form-control" placeholder="Masukan Data Category !">
</div>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit"class="btn btn-primary">Save changes</button>
</div>
</div>
</form>
</div>
</div>
@endsection