@extends('halaman_pelanggan.pelanggan_template')

@section('title', 'Pelanggan')
    
@section('content')


<div id="produk">
<div class="content-top ">
  <div class="container ">
    <div class="spec ">
      <h3>Profil</h3>
      <div class="ser-t">
        <b></b>
        <span><i></i></span> 
        <b class="line"></b>
      </div>
    </div>
    
      <div class="tab-head " align="center">
          
        <div class=" tab-content tab-content-t ">
          <div class="tab-pane active text-style" id="tab1">
            <div class=" con-w3l">
              @foreach($datas as $data)
              <div class="col-md-3 m-wthree">
                <div class="col-m">               
                  <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                    <img src="/img/profil.jpg" style="width: 400px; height: 150px;" style="width: 400px; height: 150px;" class="img-responsive" alt="">
                    <div class="offer"><p><span> </span></p></div>
                  </a>
                  
                  <div class="mid-1">
                    <div class="women">
                      <h6><a href="single.html"><strong>{{ $data->nama_pelanggan }}</strong></a></h6>
                      <h6><a href="single.html">{{ $data->username}}</a></h6>           
                      <h6><a href="single.html">{{ $data->alamat }}</a></h6>  
                      <h6><a href="single.html">{{ $data->no_hp }}</a></h6>   
                    </div>
                    <div class="add">
                        <a href="{{url('halaman_pelanggan/pelanggan/edit', $data->id_pelanggan) }}"  class='btn btn-danger my-cart-btn my-cart-b '><i class='fa fa-pen'></i>Edit</a> 
                    </div>
                    
                    
                    
                  </div>
                </div>
              </div>
               @endforeach  


  
              <div class="clearfix"></div>
             </div>
          </div>
        
          
        </div>
        
      </div>
       

    
  </div>
  </div>
  </div>

          <!-- DataTales Example -->
                 
    

          

          <!-- DataTales Example -->
          @endsection