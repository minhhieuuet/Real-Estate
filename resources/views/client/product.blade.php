@extends('client.index')
@section('content')
<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('client/img/page-top-bg.jpg')}}">
  <div class="container text-white">
    <h2>Thông Số Chi Tiết</h2>
  </div>
</section>
<!--  Page top end -->

<!-- Breadcrumb -->
<div class="site-breadcrumb">
  <div class="container">
    <a href=""><i class="fa fa-home"></i>Home</a>
    <span><i class="fa fa-angle-right"></i>Thông Số Chi Tiết</span>
  </div>
</div>

<!-- Page -->
<section class="page-section" id="app">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 single-list-page">
        <div class="single-list-slider owl-carousel" id="sl-slider">
          @for($i=0;$i<5;$i++)
          <div class="sl-item set-bg" data-setbg="{{asset('image/product/'.$product['image'])}}">
            <div class="sale-notic">{{$product['type']=='sale'?'ĐANG BÁN':'CHO THUÊ'}}</div>
          </div>
          @endfor
        </div>
        <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
          @for($i=0;$i<5;$i++)
          <div class="sl-thumb set-bg" data-setbg="{{asset('image/product/'.$product['image'])}}"></div>
          @endfor
        </div>
        <div class="single-list-content">
          <div class="row">
            <div class="col-xl-8 sl-title">
              <h2>{{$product->title}}</h2>
              <p><i class="fa fa-map-marker"></i> {{$product->location}}</p>
            </div>
            <div class="col-xl-4">
            @if($product->type =="sale")
              <a href="#" class="price-btn" id="product-price">{{$product->price}}VNĐ</a>
            @else
              <a href="#" class="price-btn" id="product-price">{{$product->price}}VNĐ/tháng</a>
            @endif
            </div>
          </div>
          <h3 class="sl-sp-title">Thông số</h3>
          <div class="row property-details-list">
            <div class="col-md-4 col-sm-6">
              <p><i class="fa fa-th-large"></i>Diện tích: {{$product['area']}} m2</p>

            </div>
            <div class="col-md-4 col-sm-6">

              <p><i class="fa fa-clock-o"></i> 1 ngày trước</p>
            </div>

          </div>
          <h3 class="sl-sp-title">Mô tả</h3>
          <div class="description">
            <p>{!!$product -> description!!}</p>
          </div>
          <h3 class="sl-sp-title">Đặc điểm nổi bật</h3>
          <div class="row property-details-list">
            {{-- split amenites by ; and foreach --}}
          @foreach(explode(";",$product->amenities) as $amenity )
            <div class="col-md-4 col-sm-6">
              <p><i class="fa fa-check-circle-o"></i> {{$amenity}}</p>
            </div>
          @endforeach
          {{-- end amenites --}}
          </div>



          <h3 class="sl-sp-title bd-no">Địa chỉ</h3>
          <div class="pos-map" id="map-canvas">
            <iframe src="{{'https://maps.google.com/maps?q='.$product->long.','.$product->lat.'&hl=es;z=14&amp;output=embed'}}" width="700" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <!-- sidebar -->
      <div class="col-lg-4 col-md-7 sidebar">
        <div class="author-card">
          <h3>Liên hệ:</h3>

          <div class="author-contact">
            <p><i class="fa fa-user"></i>{{$product->contact['name']}}</p>
            <p><i class="fa fa-phone"></i>{{$product->contact['phone']}}</p>
            <p><i class="fa fa-envelope"></i>{{$product->contact['email']}}</p>
          </div>
        </div>
        <div class="contact-form-card">
          <h5>Bạn có thắc mắc?</h5>
          <form>
            <input type="text" placeholder="Tên của bạn">
            <input type="phone" placeholder="Số điện thoại">
            <textarea placeholder="Câu hỏi"></textarea>
            <button style="margin-left:40%;">Gửi</button>
          </form>
        </div>
        <div class="related-properties">
          <h2>CÙNG THỂ LOẠI</h2>
          @foreach($relatedProducts as $product)
          <div class="rp-item">
            <div class="rp-pic set-bg" data-setbg="{{asset('image/product/'.$product['image'])}}">
              {{-- if else title of product --}}
            @if($product['type']=='sale')
              <div class="sale-notic" >Đang bán</div>
            @else
              <div class="sale-notic" style="background-color:green;">Cho thuê</div>
            @endif
            </div>
            <div class="rp-info">
              <h5>{{$product['title']}}</h5>
              <p><i class="fa fa-map-marker"></i>{{$product['location']}}</p>
            </div>

            @if($product['type']=='sale')
            <a href="{{asset('san-pham/'.$product['slug'].'/'.$product['id'])}}" class="rp-price">{{number_format($product['price'],0,',','.')}} VNĐ</a>
          @else
            <a href="{{asset('san-pham/'.$product['slug'].'/'.$product['id'])}}" class="rp-price">{{number_format($product['price'],0,',','.')}} VNĐ/tháng</a>
          @endif

          </div>
        @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Page end -->
<script type="text/javascript">
// Add thorusand dot to price
  Array.from(document.getElementsByClassName('price-btn')).map(btn=>{
    if(!btn.innerHTML.includes('tháng')){
      btn.innerHTML = parseInt(btn.innerHTML).toLocaleString() +" VNĐ";
    }
    else{
      btn.innerHTML = parseInt(btn.innerHTML).toLocaleString() +" VNĐ/tháng";
    }

  })
</script>
{{-- Vue script --}}
<script type="text/javascript">
  new Vue({
    el:"#app",
    data (){
      return {

      }
    }
  })
</script>
@endsection
