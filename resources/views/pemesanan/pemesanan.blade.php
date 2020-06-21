@extends('halaman_pelanggan.pelanggan_template')

@section('title', 'Pemesanan')
    
@section('content')


<!-- Begin Page Content -->
<!-- DataTable with Hover -->
     <div class="card shadow mb-4">
           <h4><strong>Detail Pemesanan</strong></h4>
\   

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Pesanan</th>
                      <th>Nama Pelanggan</th>
                      <th>Produk</th>
                      <th>Foto KTP</th>
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

                                     <td><img src="{{ url('uploads/file/foto_ktp/'.$data->foto_ktp) }}" style="width: 400px; height: 150px;"> </td>
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