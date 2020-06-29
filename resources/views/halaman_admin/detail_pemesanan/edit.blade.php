@extends('halaman_admin.template')

@section('title', 'Edit  Status')

@section('content')
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
                <h3>Edit Status</h3>
            </div>
            <div class="card-body">
                    <form
                        method="POST"
                        action="{{url('halaman_admin/detail_pemesanan/edit/proses', $data->id_detail_pemesanan) }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                    
                     




                    <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status Pemesanan</label>
                    <div class="col-sm-5">
                    <select name="status" id="status" class="form-control">
                    <option value="{{$data->status}}">--{{$data->status}}--</option>
                    <option value="Pembayaran Ditolak">Pembayaran Ditolak</option>
                    <option value="Pembayaran Terverifikasi">Pembayaran Terverifikasi</option>
                    <option value="Pesanan Dalam Proses">Pesanan Dalam Proses</option>
                     <option value="Pesanan Selesai">Pesanan Selesai</option>  
                     </select>
                     </div>
                    </div> 
                  
                   
                   
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
      
                  @endsection