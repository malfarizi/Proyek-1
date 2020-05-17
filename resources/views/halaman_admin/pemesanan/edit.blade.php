@extends('halaman_admin.template')

@section('title', 'Edit Data Pemesanan')

@section('content')
    

            <<div class="card">
            <div class="card-header">
                <h3>Edit Data Pemesanan</h3>
            </div>
            <div class="card-body">
                    <form
                        method="POST"
                        action="{{url('halaman_admin/pemesanan/edit/proses', $data->id_pemesanan) }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                    
                    <div class="row form-group">
                   <label for="text" class="col-sm-2 col-form-label">ID Pelanggan</label>
                    <div class="col-sm-8">
                         <label for="text" class="col-sm-2 col-form-label">{{ $data->id_pelanggan }}</label>
                    </div>
                    </div>
                     <div class="row form-group">
                   <label for="text" class="col-sm-2 col-form-label">ID Produk</label>
                    <div class="col-sm-8">
                       <label for="text" class="col-sm-2 col-form-label">{{ $data->id_produk }}</label>
                    </div>
                    </div>
                     <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Jumlah Pesan</label>
                    <div class="col-sm-8">
                        <label for="text" class="col-sm-2 col-form-label">{{ $data->jml_pesan }}</label>
                    </div>
                    </div>
                   
                    
                        <div class="row form-group">
                   <label for="text" class="col-sm-2 col-form-label">Harga Pcs</label>
                    <div class="col-sm-8">
                        <label for="text" class="col-sm-2 col-form-label">{{ $data->harga_pcs }}</label>
                    </div>
                    </div>
                     <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <input type="text" name="status" class="form-control" value="{{ $data->status }}">
                    </div>
                    </div>
                    <div class="row form-group">
                     <label for="desain" class="col-sm-2 col-form-label">Foto Desain Lama</label>
                    <div class="col-sm-8">
                        <img src="{{ url('uploads/file/desain/'.$data->desain) }}" style="width: 150px; height: 150px;">
                    </div>
                    </div>
                    <div class="row form-group">
                    <label for="desain" class="col-sm-2 col-form-label">Foto Desain</label>
                    <div class="col-sm-8">
                        <input type="file" name="desain" class="form-control" >
                    </div>
                    </div>
                   
                   
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
      
                  @endsection