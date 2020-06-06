@extends('halaman_admin.template')

@section('title', 'Tambah Data Produk')
    
@section('content')


<!-- Begin Page Content -->
<!-- DataTable with Hover -->
        <!-- Content Row -->
         @if($errors->any())
                              <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <ul>
                                      @foreach ($errors->all() as $error)
                                      <li>{{$error}}</li>
                                      @endforeach
                                    </ul>
                              </div>
                            @endif
         <div class="card">
            <div class="card-header">
                <h3>Tambah Data Produk</h3>
            </div>
            <div class="card-body">
            <form method="post" action="{{url('/halaman_admin/produk/tambah/proses') }}" enctype="multipart/form-data">
                 @csrf
                <div class="form-group row">
                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_produk" class="form-control" id="nama_produk" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Ukuran</label>
                    <div class="col-sm-10">
                    <input type="text" name="ukuran" class="form-control" id="ukuran" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deskripsi_produk" class="col-sm-2 col-form-label">Deskrispi Produk</label>
                    <div class="col-sm-10">
                    <input type="text" name="deskripsi_produk" class="form-control" id="deskripsi_produk" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                    <input type="text" name="harga" class="form-control" id="harga" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto_produk" class="col-sm-2 col-form-label">Upload Foto Produk</label>
                    <div class="col-sm-10">
                    <input type="file" name="foto_produk" class="form-control" id="foto_produk" required="">
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