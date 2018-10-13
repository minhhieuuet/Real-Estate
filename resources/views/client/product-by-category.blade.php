@extends('client.index')
@section('content')
<!-- Page top section -->
<style media="screen">
	.main-menu{
		color:black !important;
	}
</style>
<section class="page-top-section set-bg" data-setbg="{{asset('client/img/bg.jpg')}}">
	<div class="container text-red">
			<h2  style="color:white !important;font-weight:bold;">Kết quả tìm kiếm </h2>
	</div>
</section>
<!--  Page top end -->

<!-- Breadcrumb -->
<div class="site-breadcrumb">
	<div class="container">
		<a href=""><i class="fa fa-home"></i>Trang chủ</a>
		<span><i class="fa fa-angle-right"></i>Tìm kiếm</span>
	</div>
</div>


<!-- page -->
<section class="page-section categories-page">
	<div class="container">
    {{-- @foreach($categories as $category)
      {{$category->products}}
    @endforeach --}}
    @foreach($categories as $category)
      <div class="row category-bar">
        <div class="col-md-3">
          <i class="fa fa-tag"> </i>
           {{mb_strtoupper($category['name'])}}
        </div>
        <div class="col-md-9" style="background-color:#f5f5f5;">
          <a href="{{asset('danh-muc/'.$category['slug'].'/'.$category['id'])}}" target="_blank">Xem thêm <i class="	fa fa-angle-double-right"></i></a>
        </div>
      </div>
    <div class="row">

		@foreach($category->products->take(6) as $product)
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
						<a href="{{asset('product/'.$product['id'])}}" class="room-price">{{number_format($product['price'],0,',','.')}} VNĐ</a>
					@else
						<a href="{{asset('product/'.$product['id'])}}" class="room-price">{{number_format($product['price'],0,',','.')}} VNĐ/tháng</a>
					@endif
					</div>
				</div>
			</div>
		@endforeach
		</div>

  @endforeach

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
