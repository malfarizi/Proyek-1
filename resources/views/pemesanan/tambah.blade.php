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
                    <input type="text" name="id_pelanggan" class="form-control" value="{{$c2->id_pelanggan}}" id="id_pelanggan" required="" readonly>
                    @endforeach
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="nama_produk" class="col-sm-2 col-form-label"> Nama Produk</label>
                    <div class="col-sm-5">
                        @foreach($prodak as $c1)
                   <label for="nama_produk" class="col-sm-2 col-form-label"> {{$c1->nama_produk}}</label>
                    @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ukuran" class="col-sm-2 col-form-label"> Ukuran Produk</label>
                    <div class="col-sm-5">
                        @foreach($prodak as $c1)
                   <label for="ukuran" class="col-sm-2 col-form-label"> {{$c1->ukuran}}</label>
                    @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_produk" class="col-sm-2 col-form-label">ID Produk</label>
                    <div class="col-sm-5">
                        @foreach($prodak as $c1)
                    <input type="text" name="id_produk" class="form-control" value="{{$c1->id_produk}}" id="id_produk" required="" readonly>
                    @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_pcs" class="col-sm-2 col-form-label">Harga per Pcs</label>
                    <div class="col-sm-5">
                        @foreach($prodak as $c1)
                    <input type="text" name="harga_pcs" class="form-control" value="{{$c1->harga}}" id="harga_pcs" required="" readonly>
                    @endforeach
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="jml_pesan" class="col-sm-2 col-form-label">Jumlah Pesan</label>
                    <div class="col-sm-5">
                    <input type="text" name="jml_pesan" class="form-control" id="jml_pesan" required="">
                    </div>
                </div>
                 <div class="form-group row">
   
                    <div class="col-sm-5">
                    <input type="hidden" name="status" class="form-control" id="status" required="" value="Proses Pesan" readonly>
                    </div>
                </div>
               <div class="form-group row">
                    <label for="desain" class="col-sm-2 col-form-label">Upload Desain</label>
                    <div class="col-sm-5">
                    <input type="file" name="desain" class="form-control" id="desain" required="">
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
       