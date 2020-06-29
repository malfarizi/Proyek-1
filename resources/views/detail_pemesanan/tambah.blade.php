@extends('halaman_pelanggan.pelanggan_template')

@section('title', 'Penyewaan')
    
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
                            @if(session('status'))
                      <div class="alert alert-success">
                          {{session('status')}}
                      </div>
                    @endif
         <div class="card" align="center">
            <div class="card-header">
                <h3>Detail Pemesanan</h3>
            </div>
            <div class="card-body">
            <form method="POST" action="{{url('/detail_pemesanan/tambah/proses') }}" enctype="multipart/form-data">
             {{ csrf_field() }}

                <div class="form-group row">
                    <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                    <div class="col-sm-5">
                       
                    <label for="nama_pelanggan" class="col-sm-2 col-form-label">{{Session::get('nama_pelanggan')}}</label>
                  
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
                <label for="id_pemesanan" class="col-sm-2 col-form-label">Pemesanan</label>
                <div class="col-sm-2">
                <select name="id_pemesanan" id="id_pemesanan" class="form-control">
                <option value="">Pilih </option>
                @foreach ($datas as $p1)
   
                    <option value="{{ $p1->id_pemesanan }}">{{ $loop->iteration}}. ID  {{ $p1->id_pemesanan }} - {{$p1->nama_produk}}</option>
                @endforeach
                 </select>
                 </div>
                </div>

                

                <div class="form-group row">
                    
                    <div class="col-sm-5">
                        @foreach($datas as $c1)
                    <input type="hidden" name="id_produk" class="form-control" value="{{$c1->id_produk}}" id="id_produk" required="" readonly>
                    @endforeach
                    </div>
                </div>

               

                <div class="form-group row">
                    
                    <div class="col-sm-2">
                        @foreach($datas as $c1)
                    <input type="hidden" name="harga" class="form-control"  value="{{$c1->harga}}"  id="harga" required="" readonly  >
                    @endforeach
                    </div>
                </div>

                <div class="form-group row">
                <label for="jml_pesan" class="col-sm-2 col-form-label">Jumlah Pesan</label>
                    <div class="col-sm-2">
                    <input type="text" name="jml_pesan" class="form-control" id="jml_pesan" required="">
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="desain" class="col-sm-2 col-form-label">Upload Desain</label>
                    <div class="col-sm-5">
                    <input type="file" name="desain" class="form-control" id="desain" required="">
                    </div>
                </div>

               <!--  <div class="form-group row">
   
                    <div class="col-sm-5">
                    <input type="hidden" name="status" class="form-control" id="status" required="" value="Dalam Proses" readonly>
                    </div>
                </div> -->
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
       