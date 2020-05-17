@extends('halaman_pelanggan.pelanggan_template')

@section('title', 'Index')
    
@section('content')



<div id="produk">
<div class="content-top ">
	<div class="container ">
		<div class="spec ">
			<h3>Produk</h3>
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
										<img src="{{ url('uploads/file/'.$data->foto_produk) }}" style="width: 400px; height: 150px;" style="width: 400px; height: 150px;" class="img-responsive" alt="">
										<div class="offer"><p><span> </span></p></div>
									</a>
									
									<div class="mid-1">
										<div class="women">
											<h6><a href="single.html"><strong>{{ $data->nama_produk }}</strong></a></h6>
											<h6><a href="single.html">{{ $data->deskripsi_produk }}</a></h6>						
											<h6><a href="single.html">{{ $data->ukuran }}</a></h6>	
											<h6><a href="single.html">{{ $data->harga }}</a></h6>		
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



	 @endsection