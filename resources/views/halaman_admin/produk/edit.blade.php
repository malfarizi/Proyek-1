@extends('halaman_admin.template')

@section('title', 'Edit Data Produk')

@section('content')
    

            <<div class="card">
            <div class="card-header">
                <h3>Edit Data Produk</h3>
            </div>
            <div class="card-body">
                    <form
                        method="POST"
                        action="{{url('halaman_admin/produk/edit/proses', $data->id_produk) }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                         
                    <div class="form-group row">
                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_produk" class="form-control" value="{{ $data->nama_produk }}">
                    </div>
                    </div>
                     <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Ukuran</label>
                    <div class="col-sm-8">
                        <input type="text" name="ukuran" class="form-control" value="{{ $data->ukuran }}">
                    </div>
                    </div>
                    <div class="row form-group">
                    <label for="deskripsi_produk" class="col-sm-2 col-form-label">Deskrispi Produk</label>
                    <div class="col-sm-8">
                        <input type="text" name="deskripsi_produk" class="form-control" value="{{ $data->deskripsi_produk }}">
                    </div>
                    </div>
                     <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-8">
                        <input type="text" name="harga" class="form-control" value="{{ $data->harga }}">
                    </div>
                    </div>
                    <div class="row form-group">
                     <label for="foto_produk" class="col-sm-2 col-form-label">Foto Produk Lama</label>
                    <div class="col-sm-8">
                        <img src="{{ url('uploads/file/'.$data->foto_produk) }}" style="width: 150px; height: 150px;">
                    </div>
                    </div>
                    <div class="row form-group">
                    <label for="foto_produk" class="col-sm-2 col-form-label">Foto Produk</label>
                    <div class="col-sm-8">
                        <input type="file" name="foto_produk" class="form-control" >
                    </div>
                    </div>
                   
                   
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
      
                  @endsection