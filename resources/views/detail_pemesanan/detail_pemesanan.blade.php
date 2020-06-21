@extends('halaman_pelanggan.pelanggan_template')

@section('title', 'Detail Pemesanan')
    
@section('content')


<!-- Begin Page Content -->
<!-- DataTable with Hover -->
     <div class="card shadow mb-4">
           <h4><strong>Detail Pemesanan</strong></h4>
                    @if(session('status'))
                      <div class="alert alert-success">
                          {{session('status')}}
                      </div>
                    @endif
  <a href="{{ url('transfer/tambah') }}" class="hyper"> <span> Transfer Pembayaran</span></a>
  <a href="{{ url('transfer/transfer') }}" class="hyper"> <span> Detail Pembayaran</span></a>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Detail Pemesanan</th>
                      <th>Nama Pelanggan</th>
                      <th>Nama Produk</th>
                      <th>Jumlah Pesan</th>
                      <th>Harga Produk</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Desain</th>
                      <th>Tanggal Pesan</th>
                      
                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $data->id_detail_pemesanan }}</td>
                                    <td>{{ $data->nama_pelanggan }}</td>
                                    <td>{{ $data->nama_produk }}</td>
                                    <td>{{ $data->jml_pesan }} pcs</td>
                                    <td>Rp.{{ $data->harga }}</td>
                                    <td>Rp.{{ $data->total }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td><img src="{{ url('uploads/file/desain/'.$data->desain) }}" style="width: 400px; height: 150px;"> </td>
                                    <td>{{ $data->created_at }}</td>

                                    
                                       <td>
                                    
                     

                                        </form>
                                    </div>
                                </td>
                            </tr>
                            
                              @endforeach  
                                 

                  </tbody>
                </table>
              </div>
            </div>
          </div>
    <!--Row-->

          <!-- DataTales Example -->
                 
    

          

          <!-- DataTales Example -->
          @endsection