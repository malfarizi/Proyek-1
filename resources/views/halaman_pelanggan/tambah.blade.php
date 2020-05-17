@extends('halaman_admin.template')

@section('title', 'Pelanggan')
    
@section('content')


<!-- Begin Page Content -->
<!-- DataTable with Hover -->
        <!-- Content Row -->
         <div class="card">
            <div class="card-header">
                <h3>Tambah Data Pelanggan</h3>
            </div>
            <div class="card-body">
            <form method="post" action="{{url('/halaman_pelanggan/tambah/proses') }}" enctype="multipart/form-data">
               {{ csrf_field() }}
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="username" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama pelanggan</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" required="">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" id="alamat" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-10">
                    <input type="text" name="no_hp" class="form-control" id="no_hp" required="">
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