@extends('halaman_admin.template')

@section('title', 'Admin')
    
@section('content')


<!-- Begin Page Content -->
<!-- DataTable with Hover -->
        <!-- Content Row -->
         <div class="card">
            <div class="card-header">
                <h3>Tambah Data Admin</h3>
            </div>
            <div class="card-body">
            <form method="post" action="{{url('/halaman_admin/tambah/proses') }}" enctype="multipart/form-data">
                 @csrf
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="username"  required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_admin" class="col-sm-2 col-form-label">Nama Admin</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_admin" class="form-control" id="nama_admin" required="">
                    </div>
                </div>

               <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <input type="textarea" name="alamat" class="form-control" id="alamat" required="">
                    </div>
                </div>                      
                 <div class="form-group row">
                    <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-10">
                    <input type="text" name="no_hp" class="form-control" id="no_hp">
                    </div>
                </div>
              
                    <div class="col-sm-10">
                    <input type="submit" name="tombol_tambah" class="btn btn-primary" value="Tambah">
                    </div>
               
            </form>
            </div>
        </div>
    <!--Row-->

          <!-- DataTales Example -->
                 
    

          

          <!-- DataTales Example -->
          @endsection