@extends('halaman_admin.template')

@section('title', 'Pelanggan')
    
@section('content')


<!-- Begin Page Content -->
<!-- DataTable with Hover -->
     <div class="card shadow mb-4">
           
            <div class="card-header">
                       
                        <a href="{{url('halaman_pelanggan/tambah')}}" class="btn btn-success" align="right"><i class="fa fa-plus"></i> Tambah Data</a>  
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
                      <th>Username Pelanggan</th>
                      <th>Nama Pelanggan</th>
                      <th>Alamat</th>
                     <th>No HP</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->nama_pelanggan }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->no_hp }}</td>

                                    
                                       <td>
                                    <div class="btn-group dropdown">

                                        
                                           
                                  <a href="{{url('halaman_pelanggan/edit', $data->id_pelanggan) }}"  class='btn btn-secondary btn-rounded'><i class='fa fa-pen'></i></a> 
                                       


                                        <form action="{{ url('halaman_pelanggan/pelanggan/hapus', $data->id_pelanggan)}}" method="post">
                     
                                            {{csrf_field()}}
                                            {{method_field('delete') }}
                                <button type="submit"  class='btn btn-secondary btn-rounded' ><i class='fa fa-trash'></i></button>
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