@extends('halaman_pelanggan.pelanggan_template')

@section('title', 'Upload Bukti Transaksi')

@section('content')
    

            <<div class="card">
            <div class="card-header">
                <h3>Upload Bukti Transaksi</h3>
            </div>
            <div class="card-body">
                    <form
                        method="POST"
                        action="{{url('pemesanan/pemesanan/edit/proses', $data->id_pemesanan) }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                   
                    <div class="row form-group">
                    <label for="foto_bukti" class="col-sm-2 col-form-label">Upload Foto Bukti Transfer</label>
                    <div class="col-sm-8">
                        <input type="file" name="foto_bukti" class="form-control" >
                    </div>
                    </div>
                   
                   
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
      
                  @endsection