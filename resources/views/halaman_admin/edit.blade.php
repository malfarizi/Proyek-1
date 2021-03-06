@extends('halaman_admin.template')

@section('title', 'Edit Data Admin')

@section('content')
    

            <<div class="card">
            <div class="card-header">
                <h3>Edit Data Admin</h3>
            </div>
            <div class="card-body">
                    <form
                        method="POST"
                        action="{{url('halaman_admin/edit/proses', $data->id) }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                         
                    <div class="form-group row">
                    <label for="nama_admin" class="col-sm-2 col-form-label">Nama Admin</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_admin" class="form-control" value="{{ $data->nama_admin }}">
                    </div>
                    </div>
                    <div class="row form-group">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-8">
                        <input type="text" name="username" class="form-control" value="{{ $data->username }}">
                    </div>
                    </div>
                    <div class="row form-group">
                     <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control" value="{{ $data->password }}">
                    </div>
                    </div>
                    <div class="row form-group">
                     <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $data->alamat }}">
                    </div>
                    </div>
                    <div class="row form-group">
                    <label for="no_hp" class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-8">
                        <input type="text" name="no_hp" class="form-control" value="{{ $data->no_hp }}">
                    </div>
                    </div>
                   
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
      
                  @endsection