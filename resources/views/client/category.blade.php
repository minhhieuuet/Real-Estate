@extends('client.index')
@section('content')
<!-- Page top section -->
<style media="screen">
	.main-menu{
		color:black !important;
	}
</style>
<section class="page-top-section set-bg" data-setbg="{{asset('image/category/'.$category['image'])}}">
	<div class="container text-red">
			<h2  style="font-size:70px;color:crimson !important;text-shadow: 4px 3px 0px #fff, 9px 8px 0px rgba(0,0,0,0.15);">{{$category['name']}}</h2>
	</div>
</section>
<!--  Page top end -->

<!-- Breadcrumb -->
<div class="site-breadcrumb">
	<div class="container">
		<a href=""><i class="fa fa-home"></i>Trang chủ</a>
		<span><i class="fa fa-angle-right"></i>{{$category['name']}}</span>
	</div>
</div>



<!-- page -->
<section class="page-section categories-page">
	<div class="container">
		<div class="row">
			@if(sizeof($products)==0)
				<div class="col-md-12 text-center">
						<h3>Chưa có sản phẩm</h3>
						<br>
						<button onclick="window.location.href=window.location.origin"  type="button" class="btn btn-danger" name="button">Quay lại trang chủ</button>
				</div>

			@endif
		@foreach($products as $product)
			<div class="col-lg-4 col-md-6">
				<!-- feature -->
				<div class="feature-item">
					<div class="feature-pic set-bg" data-setbg="{{asset('image/product/'.$product['image'])}}">
					@if($product['type']=="rent")
						<div class="sale-notic" style="background-color:green;">Cho thuê</div>
					@else
						<div class="sale-notic">đang bán</div>
					@endif
					</div>
					<div class="feature-text">
						<div class="text-center feature-title">
							<h5>{{$product['title']}}</h5>
							<p><i class="fa fa-map-marker"></i> {{$product['location']}}</p>
						</div>
						<div class="room-info-warp">
							<div class="room-info">
								<div class="rf-left">
									<p><i class="fa fa-th-large"></i>{{$product['area']}} m<sup>2</sup></p>

								</div>
								<div class="rf-right">
										<p><i class="fa fa-map"></i> {{$product['location']}}</p>
								</div>

							</div>
							<div class="room-info">
								<div class="rf-left">
									<p><i class="fa fa-user"></i> Đỗ Minh Hiếu</p>
								</div>
								<div class="rf-right">
									<p><i class="fa fa-clock-o"></i> 1 ngày trước</p>
								</div>
							</div>
						</div>
						@if($product['type']=='sale')
						<a href="{{asset('san-pham/'.$product['slug'].'/'.$product['id'])}}" class="room-price">{{number_format($product['price'],0,',','.')}} VNĐ</a>
					@else
						<a href="{{asset('san-pham/'.$product['slug'].'/'.$product['id'])}}" class="room-price">{{number_format($product['price'],0,',','.')}} VNĐ/tháng</a>
					@endif
					</div>
				</div>
			</div>
		@endforeach
		</div>
		<div style=" display: table;margin: 0 auto;">
			{{$products->links()}}
		</div>
	</div>
</section>
<!-- page end -->


{{-- <!-- Clients section -->
<div class="clients-section">
	<div class="container">
		<div class="clients-slider owl-carousel">
			<a href="#">
				<img src="client/img/partner/1.png" alt="">
			</a>
			<a href="#">
				<img src="client/img/partner/2.png" alt="">
			</a>
			<a href="#">
				<img src="client/img/partner/3.png" alt="">
			</a>
			<a href="#">
				<img src="client/img/partner/4.png" alt="">
			</a>
			<a href="#">
				<img src="client/img/partner/5.png" alt="">
			</a>
		</div>
	</div>
</div> --}}
<!-- Clients section end -->

@endsection
