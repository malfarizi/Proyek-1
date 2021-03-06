@extends('halaman_admin.template')

@section('title', 'Pemesanan')
    
@section('content')


<!-- Begin Page Content -->
<!-- DataTable with Hover -->
     <div class="card shadow mb-4">
           
            <div class="card-header">
                       <strong>Detail Pesanan</strong>
                          
                    </div>
                    @if(session('status'))
                      <div class="alert alert-success">
                          {{session('status')}}
                      </div>
                    @endif
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
                      <th>DP</th>
                      <th>Status</th>
                      <th>Desain</th>
                      <th>Tanggal Pesan</th>
                      <th>Aksi</th>
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
                                    <td>@currency($data->harga)</td>
                                    <td>@currency($data->total)</td>
                                    <td>@currency($data->dp)</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->desain }}</td>
                                    <td>{{ $data->created_at }}</td>


                                    
                                       <td>
                                    <div class="btn-group dropdown">

                                        
                                           
                                 <a href="{{url('halaman_admin/detail_pemesanan/edit', $data->id_detail_pemesanan) }}"  class='btn btn-secondary btn-rounded'><i class='fa fa-pen'></i></a> 
                                       
                                       <a href="{{url('halaman_admin/detail_pemesanan/download/'. $data->desain) }}"  class='btn btn-secondary btn-rounded'><i class='fa fa-download'></i></a> 


                                        <form action="{{ url('halaman_admin/detail_pemesanan/hapus', $data->id_detail_pemesanan)}}" method="post">

                                            {{csrf_field()}}
                                            {{method_field('delete') }}
                                <button type="submit" class='btn btn-secondary btn-rounded'><i class='fa fa-trash'></i></button>
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