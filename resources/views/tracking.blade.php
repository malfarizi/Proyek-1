<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@extends('halaman_pelanggan.template')

@section('title', 'Tracking')
    
@section('content')

<!--content-->
<div id="tracking">

<div class="content-top ">
	<div class="container ">
		<div class="banner-info">
		<form method="post" action="{{url('/lihat_datakendaraan/tambah/proses') }}" enctype="multipart/form-data">
                 
                <div class="form-group row">
                	<table align="center">
                		<td>
                    <label for="nama_kendaraan" class="col-sm-2 col-form-label">Kode</label>
                </td>
                <td>
                    <div class="col-sm-10">
                    <input type="text" name="nama_kendaraan" class="form-control" id="nama_kendaraan" required="">
                    </div>
                </div>
                <td>

                <div class="col-sm-10">
                    <input type="submit" name="tombol_tambah" class="btn btn-primary" value="Cari">
                    
                </div>
                </td>
                   </table>
        </form>
    </div>
		
	</div>
	</div>
	</div>
</div>

 @endsection