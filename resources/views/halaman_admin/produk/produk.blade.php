@extends('halaman_admin.template')

@section('title', 'Produk')
    
@section('content')


<!-- Begin Page Content -->
<!-- DataTable with Hover -->
     <div class="card shadow mb-4">
           
            <div class="card-header">
                       <strong>Produk</strong>
                        <a href="{{url('halaman_admin/produk/tambah')}}" class="btn btn-success" align="right"><i class="fa fa-plus"></i> Tambah Data</a>  
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
                      <th>Nama Produk</th>
                      <th>Ukuran</th>
                      <th>Deskripsi Produk</th>
                      <th>Harga Pcs</th>
                      <th>Foto Produk</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $data->nama_produk }}</td>
                                    <td>{{ $data->ukuran }}</td>
                                    <td>{{ $data->deskripsi_produk }}</td>
                                    
                                    <td>{{ $data->harga }}</td>
                                    <td><img src="{{ url('uploads/file/'.$data->foto_produk) }}" style="width: 400px; height: 150px;"> </td>


                                    
                                       <td>
                                    <div class="btn-group dropdown">

                                        
                                           
                                  <a href="{{url('halaman_admin/produk/edit', $data->id_produk) }}"  class='btn btn-secondary btn-rounded'><i class='fa fa-pen'></i></a> 
                                       


                                        <form action="{{ url('halaman_admin/produk/hapus', $data->id_produk)}}" method="post">
                     
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