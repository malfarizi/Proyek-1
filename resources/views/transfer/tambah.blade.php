@extends('halaman_pelanggan.pelanggan_template')

@section('title', 'Pelanggan')
    
@section('content')


<!-- Begin Page Content -->
<!-- DataTable with Hover -->
        <!-- Content Row -->
         <div class="card" >
            <div class="card-header" >
                <h3><strong>Upload Bukti Transfer</strong></h3>
                <p>Transfer Ke No Rek : 0987876</p>
            </div>
            <div class="card-body">
            <form method="POST" action="{{url('/transfer/tambah/proses') }}" enctype="multipart/form-data">
              @csrf

                <div class="form-group row">
                    <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                    <div class="col-sm-5">
                       
                    <label for="nama_pelanggan" class="col-sm-2 col-form-label">{{Session::get('nama_pelanggan')}}</label>
                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_pelanggan" class="col-sm-2 col-form-label">ID Pelanggan</label>
                    <div class="col-sm-5">
                        @foreach($datas as $c2)
                    <input type="text" name="id_pelanggan" class="form-control" value="{{$c2->id_pelanggan}}" id="id_pelanggan" required="" readonly>
                    @endforeach
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="id_pemesanan" class="col-sm-2 col-form-label">ID Pemesanan</label>
                    <div class="col-sm-5">
                      <select name="id_pemesanan" id="id_pemesanan" class="form-control">
                <option value="">== Pilih Pesanan ==</option>
                @foreach ($pms as $p)
                    <option value="{{ $p->id_pemesanan }}">{{ $p->id_pemesanan }}</option>
                @endforeach
                 </select>
                 </div>
                </div>
              
               <div class="form-group row">
                    <label for="foto_transfer" class="col-sm-2 col-form-label">Upload Bukti Transfer</label>
                    <div class="col-sm-5">
                    <input type="file" name="foto_transfer" class="form-control" id="foto_transfer" required="">
                    </div>
                </div>


                    <div class="col-sm-10">
                    <input type="submit" name="tombol_tambah" class="btn btn-primary" value="Tambah">
                    </div>
               
            </form>
            </div>
        </div>
   @endsection
    <!--Row-->

          <!-- DataTales Example -->
                 
    

          

          <!-- DataTales Example -->
       