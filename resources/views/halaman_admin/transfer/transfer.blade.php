@extends('halaman_admin.template')

@section('title', 'Transfer')
    
@section('content')


<!-- Begin Page Content -->
<!-- DataTable with Hover -->
     <div class="card shadow mb-4">
           
            <div class="card-header">
                       <strong>Detail Transfer</strong>
                          
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
                      <th>ID Transfer</th>
                      <th>Nama Pelanggan</th>
                      <th>ID Pemesanan</th>
                      <th>ID Produk</th>
                      <th>Bukti Transfer</th>
                      <th>Tanggal Transfer</th>
                      <th>Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $data->id_transfer }}</td>
                                    <td>{{ $data->nama_pelanggan }}</td>
                                    <td>{{ $data->id_pemesanan }}</td>
                                    <td>{{ $data->id_produk }}</td> 
                                     <td><img src="{{ url('uploads/file/foto_transfer/'.$data->foto_transfer) }}" style="width: 400px; height: 150px;"> </td>
                                      <td>{{ $data->created_at }}</td>

                                       <td>
                                    <div class="btn-group dropdown">

                                     


                                        <form action="{{ url('halaman_admin/transfer/hapus', $data->id_transfer)}}" method="post">
                     
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