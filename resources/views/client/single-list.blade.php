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
<section class="page-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 single-list-page">
        <div class="single-list-slider owl-carousel" id="sl-slider">
          <div class="sl-item set-bg" data-setbg="client/img/single-list-slider/1.jpg">
            <div class="sale-notic">FOR SALE</div>
          </div>
          <div class="sl-item set-bg" data-setbg="client/img/single-list-slider/2.jpg">
            <div class="rent-notic">FOR Rent</div>
          </div>
          <div class="sl-item set-bg" data-setbg="client/img/single-list-slider/3.jpg">
            <div class="sale-notic">FOR SALE</div>
          </div>
          <div class="sl-item set-bg" data-setbg="client/img/single-list-slider/4.jpg">
            <div class="rent-notic">FOR Rent</div>
          </div>
          <div class="sl-item set-bg" data-setbg="client/img/single-list-slider/5.jpg">
            <div class="sale-notic">FOR SALE</div>
          </div>
        </div>
        <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
          <div class="sl-thumb set-bg" data-setbg="client/img/single-list-slider/1.jpg"></div>
          <div class="sl-thumb set-bg" data-setbg="client/img/single-list-slider/2.jpg"></div>
          <div class="sl-thumb set-bg" data-setbg="client/img/single-list-slider/3.jpg"></div>
          <div class="sl-thumb set-bg" data-setbg="client/img/single-list-slider/4.jpg"></div>
          <div class="sl-thumb set-bg" data-setbg="client/img/single-list-slider/5.jpg"></div>
        </div>
        <div class="single-list-content">
          <div class="row">
            <div class="col-xl-8 sl-title">
              <h2>305 North Palm Drive</h2>
              <p><i class="fa fa-map-marker"></i>Beverly Hills, CA 90210</p>
            </div>
            <div class="col-xl-4">
              <a href="#" class="price-btn">$4,500,000</a>
            </div>
          </div>
          <h3 class="sl-sp-title">Thông số</h3>
          <div class="row property-details-list">
            <div class="col-md-4 col-sm-6">
              <p><i class="fa fa-th-large"></i> 1500 Square foot</p>
              <p><i class="fa fa-bed"></i> 16 Bedrooms</p>
              <p><i class="fa fa-user"></i> Gina Wesley</p>
            </div>
            <div class="col-md-4 col-sm-6">
              <p><i class="fa fa-car"></i> 2 Garages</p>
              <p><i class="fa fa-building-o"></i> Family Villa</p>
              <p><i class="fa fa-clock-o"></i> 1 days ago</p>
            </div>
            <div class="col-md-4">
              <p><i class="fa fa-bath"></i> 8 Bathrooms</p>
              <p><i class="fa fa-trophy"></i> 5 years age</p>
            </div>
          </div>
          <h3 class="sl-sp-title">Mô tả</h3>
          <div class="description">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas fermentum ornareste. Donec index lorem. Vestibulum  aliquet odio, eget tempor libero. Cras congue cursus tincidunt. Nullam venenatis dui id orci egestas tincidunt id elit. Nullam ut vuputate justo. Integer lacnia pharetra pretium. Casan ante ipsum primis in faucibus orci luctus et ultrice.</p>
            </div>
          <h3 class="sl-sp-title">Đặc điểm nổi bật</h3>
          <div class="row property-details-list">
            <div class="col-md-4 col-sm-6">
              <p><i class="fa fa-check-circle-o"></i> Air conditioning</p>
              <p><i class="fa fa-check-circle-o"></i> Telephone</p>
              <p><i class="fa fa-check-circle-o"></i> Laundry Room</p>
            </div>
            <div class="col-md-4 col-sm-6">
              <p><i class="fa fa-check-circle-o"></i> Central Heating</p>
              <p><i class="fa fa-check-circle-o"></i> Family Villa</p>
              <p><i class="fa fa-check-circle-o"></i> Metro Central</p>
            </div>
            <div class="col-md-4">
              <p><i class="fa fa-check-circle-o"></i> City views</p>
              <p><i class="fa fa-check-circle-o"></i> Internet</p>
              <p><i class="fa fa-check-circle-o"></i> Electric Range</p>
            </div>
          </div>



          <h3 class="sl-sp-title bd-no">Địa chỉ</h3>
          <div class="pos-map" id="map-canvas">
            <iframe src="https://maps.google.com/maps?q=21.0802711,105.5941409&hl=es;z=14&amp;output=embed" width="700" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <!-- sidebar -->
      <div class="col-lg-4 col-md-7 sidebar">
        <div class="author-card">
          <h3>Liên hệ:</h3>

          <div class="author-contact">
            <p><i class="fa fa-user"></i>Đỗ Minh Hiếu</p>
            <p><i class="fa fa-phone"></i>(567) 666 121 2233</p>
            <p><i class="fa fa-envelope"></i>ginawesley26@gmail.com</p>
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
          <div class="rp-item">
            <div class="rp-pic set-bg" data-setbg="client/img/feature/1.jpg">
              <div class="sale-notic">FOR SALE</div>
            </div>
            <div class="rp-info">
              <h5>1963 S Crescent Heights Blvd</h5>
              <p><i class="fa fa-map-marker"></i>Los Angeles, CA 90034</p>
            </div>
            <a href="#" class="rp-price">$1,200,000</a>
          </div>
          <div class="rp-item">
            <div class="rp-pic set-bg" data-setbg="client/img/feature/2.jpg">
              <div class="rent-notic">FOR Rent</div>
            </div>
            <div class="rp-info">
              <h5>17 Sturges Road, Wokingham</h5>
              <p><i class="fa fa-map-marker"></i> Newtown, CT 06470</p>
            </div>
            <a href="#" class="rp-price">$2,500/month</a>
          </div>
          <div class="rp-item">
            <div class="rp-pic set-bg" data-setbg="client/img/feature/4.jpg">
              <div class="sale-notic">FOR SALE</div>
            </div>
            <div class="rp-info">
              <h5>28 Quaker Ridge Road, Manhasset</h5>
              <p><i class="fa fa-map-marker"></i>28 Quaker Ridge Road, Manhasset</p>
            </div>
            <a href="#" class="rp-price">$5,600,000</a>
          </div>
          <div class="rp-item">
            <div class="rp-pic set-bg" data-setbg="client/img/feature/5.jpg">
              <div class="rent-notic">FOR Rent</div>
            </div>
            <div class="rp-info">
              <h5>Sofi Berryessa 750 N King Road</h5>
              <p><i class="fa fa-map-marker"></i>Sofi Berryessa 750 N King Road</p>
            </div>
            <a href="#" class="rp-price">$1,600/month</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Page end -->
@endsection
