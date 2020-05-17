@extends('halaman_pelanggan.pelanggan_template')

@section('title', 'Pemesanan')
    
@section('content')


<!-- Begin Page Content -->
<!-- DataTable with Hover -->
     <div class="card shadow mb-4">
           <h4><strong>Detail Pemesanan</strong></h4>
           <h5>Upload Bukti Transaksi Ke Rekening : 1234567</h5>
            @foreach($amount as $c)
            <p>Total : {{$c->total}}
              @endforeach   

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Pesanan</th>
                      <th>Nama Pelanggan</th>
                      <th>Produk</th>
                      <th>Jumlah Produk Yang Dipesan</th>
                      <th>Harga per Pcs</th>
                      <th>Status</th>
                      <th>Desain</th>
                      <th>Tanggal Pesan</th>
                      
                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $data->id_pemesanan }}</td>
                                    <td>{{ $data->nama_pelanggan }}</td>
                                    <td>{{ $data->nama_produk }}</td>
                                    <td>{{ $data->jml_pesan }}</td>
                                   <td>{{ $data->harga_pcs }}</td>
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