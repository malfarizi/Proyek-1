@extends('halaman_pelanggan.pelanggan_template')

@section('title', 'Pelanggan')
    
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
         <div class="card" align="center">
            <div class="card-header">
                <h3>Pemesanan</h3>
            </div>
            <div class="card-body">
            <form method="POST" action="{{url('/pemesanan/tambah/proses') }}" enctype="multipart/form-data">
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
                    <label for="id_pelanggan" class="col-sm-2 col-form-label">{{$c2->id_pelanggan}}</label>
                   @endforeach
                    </div>
                </div>


                 <div class="form-group row">
                    
                    <div class="col-sm-5">
                        @foreach($datas as $c2)
                    <input type="hidden" name="id_pelanggan" class="form-control" value="{{$c2->id_pelanggan}}" id="id_pelanggan" required="" readonly>
                    @endforeach
                    </div>
                </div>
                 



                 <div class="form-group row">
                <label for="id_produk" class="col-sm-2 col-form-label">Pilih Produk</label>
                <div class="col-sm-5">
                <select name="id_produk" id="id_produk" class="form-control">
                <option value=""> ==Pilih Produk==</option>
                @foreach ($prodak as $p)
            
                 <option value="{{ $p->id_produk }}"> {{$p->nama_produk}} - Rp.{{$p->harga}}.- </option>
              
                @endforeach
                 </select>
                 </div>
                </div>

                   
               <div class="form-group row">
                    <label for="foto_ktp" class="col-sm-2 col-form-label">Upload Foto KTP</label>
                    <div class="col-sm-5">
                    <input type="file" name="foto_ktp" class="form-control" id="foto_ktp" required="">
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
       