@extends('client.index')
@section('content')
<div id="app">


<section class="hero-section set-bg" data-setbg="{{asset('client/img/bg.jpg')}}">
  <div class="container hero-text text-white">
    <h2>Tìm kiếm ngôi nhà trong mơ của bạn</h2>
    <!-- <p>Search real estate property records, houses, condos, land and more on leramiz.com®.<br>Find property info from the most comprehensive source data.</p> -->
    <p>Nếu bạn đang tìm kiếm cho riêng mình một không gian riêng đầy tinh tế và thân thiện thì </br>đây đúng là nơi đáng sống cho gia đình bạn</p>
    <a href="client/#" class="site-btn">Xem chi tiết</a>
  </div>
</section>
<!-- Filter form section -->
<div class="filter-search">
  <div class="container">
    <form class="filter-form">
      <input type="text" placeholder="Nhập tên, địa chỉ, hoặc từ khóa">
      <select v-on:change="getDistrict()" v-model="selectedCity">
        <option value="" selected disabled>Thành phố</option>

        <option v-for="city in cities" v-bind:value="city.code" >@{{city.name}}</option>
      </select>
      <select v-model="selectedDistrict">
        <option value="" >Quận Huyện</option>
        <option v-for="district in districts" value="">@{{district.name_with_type}}</option>
      </select>

      <button class="site-btn fs-submit">Tìm kiếm</button>
    </form>
  </div>
</div>
<!-- Filter form section end -->



<!-- Properties section -->
<section class="properties-section spad">
  <div class="container">
    <div class="section-title text-center">
      <h3>ĐANG HOT</h3>
      <!-- <p>Discover how much the latest properties have been sold for</p> -->

    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="propertie-item set-bg" data-setbg="{{asset('client/img/propertie/1.jpg')}}">
          <div class="sale-notic">FOR SALE</div>
          <div class="propertie-info text-white">
            <div class="info-warp">
              <h5>176 Kingsberry, Dr Anderson</h5>
              <p><i class="fa fa-map-marker"></i> Rochester, NY 14626</p>
            </div>
            <div class="price">$1,777,000</div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="propertie-item set-bg" data-setbg="{{asset('client/img/propertie/2.jpg')}}">
          <div class="rent-notic">FOR Rent</div>
          <div class="propertie-info text-white">
            <div class="info-warp">
              <h5>45 Lianne Dr, Greece Street</h5>
              <p><i class="fa fa-map-marker"></i> Tasley, VA 23441</p>
            </div>
            <div class="price">$1255/month</div>
          </div>
        </div>

      </div>
      <div class="col-md-6">
        <div class="propertie-item set-bg" data-setbg="{{asset('client/img/propertie/2.jpg')}}">
          <div class="rent-notic">FOR Rent</div>
          <div class="propertie-info text-white">
            <div class="info-warp">
              <h5>45 Lianne Dr, Greece Street</h5>
              <p><i class="fa fa-map-marker"></i> Tasley, VA 23441</p>
            </div>
            <div class="price">$1255/month</div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="propertie-item set-bg" data-setbg="{{asset('client/img/propertie/2.jpg')}}">
          <div class="rent-notic">FOR Rent</div>
          <div class="propertie-info text-white">
            <div class="info-warp">
              <h5>45 Lianne Dr, Greece Street</h5>
              <p><i class="fa fa-map-marker"></i> Tasley, VA 23441</p>
            </div>
            <div class="price">$1255/month</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Properties section end -->


<!-- Services section -->
<section class="services-section spad set-bg" data-setbg="client/img/service-bg.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <img src="{{asset('client/img/service.jpg')}}" alt="">
      </div>
      <div class="col-lg-5 offset-lg-1 pl-lg-0">
        <div class="section-title text-white">
          <h3>DỊCH VỤ CỦA CHÙNG TÔI</h3>
          <p>Chúng tôi cung cấp những dịch vụ hoàn hảo cho </p>
        </div>
        <div class="services">
          <div class="service-item">
            <i class="fa fa-comments"></i>
            <div class="service-text">
              <h5>Consultant Service</h5>
              <p>In Aenean purus, pretium sito amet sapien denim consectet sed urna placerat sodales magna leo.</p>
            </div>
          </div>
          <div class="service-item">
            <i class="fa fa-home"></i>
            <div class="service-text">
              <h5>Properties Management</h5>
              <p>In Aenean purus, pretium sito amet sapien denim consectet sed urna placerat sodales magna leo.</p>
            </div>
          </div>
          <div class="service-item">
            <i class="fa fa-briefcase"></i>
            <div class="service-text">
              <h5>Renting and Selling</h5>
              <p>In Aenean purus, pretium sito amet sapien denim consectet sed urna placerat sodales magna leo.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Services section end -->


<!-- feature section -->
<section class="feature-section spad">
  <div class="container">
    <div class="section-title text-center">
      <h3>GẦN ĐÂY</h3>
      <p>Browse houses and flats for sale and to rent in your area</p>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <!-- feature -->
        <div class="feature-item">
          <div class="feature-pic set-bg" data-setbg="{{asset('client/img/feature/1.jpg')}}">
            <div class="sale-notic">FOR SALE</div>
          </div>
          <div class="feature-text">
            <div class="text-center feature-title">
              <h5>1963 S Crescent Heights Blvd</h5>
              <p><i class="fa fa-map-marker"></i> Los Angeles, CA 90034</p>
            </div>
            <div class="room-info-warp">
              <div class="room-info">
                <div class="rf-left">
                  <p><i class="fa fa-th-large"></i> 800 Square foot</p>
                  <p><i class="fa fa-bed"></i> 10 Bedrooms</p>
                </div>
                <div class="rf-right">
                  <p><i class="fa fa-car"></i> 2 Garages</p>
                  <p><i class="fa fa-bath"></i> 6 Bathrooms</p>
                </div>
              </div>
              <div class="room-info">
                <div class="rf-left">
                  <p><i class="fa fa-user"></i> Tony Holland</p>
                </div>
                <div class="rf-right">
                  <p><i class="fa fa-clock-o"></i> 1 days ago</p>
                </div>
              </div>
            </div>
            <a href="client/#" class="room-price">$1,200,000</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <!-- feature -->
        <div class="feature-item">
          <div class="feature-pic set-bg" data-setbg="{{asset('client/img/feature/3.jpg')}}">
            <div class="rent-notic">FOR Rent</div>
          </div>
          <div class="feature-text">
            <div class="text-center feature-title">
              <h5>305 North Palm Drive</h5>
              <p><i class="fa fa-map-marker"></i> Beverly Hills, CA 90210</p>
            </div>
            <div class="room-info-warp">
              <div class="room-info">
                <div class="rf-left">
                  <p><i class="fa fa-th-large"></i> 1500 Square foot</p>
                  <p><i class="fa fa-bed"></i> 16 Bedrooms</p>
                </div>
                <div class="rf-right">
                  <p><i class="fa fa-car"></i> 2 Garages</p>
                  <p><i class="fa fa-bath"></i> 8 Bathrooms</p>
                </div>
              </div>
              <div class="room-info">
                <div class="rf-left">
                  <p><i class="fa fa-user"></i> Gina Wesley</p>
                </div>
                <div class="rf-right">
                  <p><i class="fa fa-clock-o"></i> 1 days ago</p>
                </div>
              </div>
            </div>
            <a href="client/#" class="room-price">$2,500/month</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- feature section end -->



<!-- feature category section -->
<section class="feature-category-section spad">
  <div class="container">
    <div class="section-title text-center">
      <h3>BẠN ĐANG TÌM KIẾM THỨ GÌ ?</h3>
      <!-- <p>What kind of property are you looking for? We will help you</p> -->
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 f-cata" v-for="category in categories" v-if="category.show">
        <img v-bind:src="'image/category/'+category.image" alt="" width="264px" height="194px">
        <h5>@{{category.name}}</h5>
      </div>

    </div>
  </div>
</section>
<!-- feature category section end-->


<!-- Gallery section -->
<section class="gallery-section spad">
  <div class="container">
    <div class="section-title text-center">
      <h3>ĐỊA ĐIỂM HẤP DẪN</h3>
      <p>Những dịa điểm hấp dẫn bạn không thể bỏ qua</p>
    </div>
    <div class="gallery">
      <div class="grid-sizer"></div>
      <a href="client/#" class="gallery-item grid-long set-bg" data-setbg="client/img/gallery/1.jpg">
        <div class="gi-info">
          <h3>TP. Hồ Chí Minh</h3>
          <p>118 Properties</p>
        </div>
      </a>
      <a href="client/#" class="gallery-item grid-wide set-bg" data-setbg="client/img/gallery/2.jpg">
        <div class="gi-info">
          <h3>Hà Nội</h3>
          <p>112 Properties</p>
        </div>
      </a>
      <a href="client/#" class="gallery-item set-bg" data-setbg="client/img/gallery/3.jpg">
        <div class="gi-info">
          <h3>Đà Nẵng</h3>
          <p>72 Properties</p>
        </div>
      </a>
      <a href="client/#" class="gallery-item set-bg" data-setbg="client/img/gallery/4.jpg">
        <div class="gi-info">
          <h3>Nha Trang</h3>
          <p>50 Properties</p>
        </div>
      </a>

    </div>
  </div>
</section>
<!-- Gallery section end -->



<!-- Review section -->
<section class="review-section set-bg" data-setbg="{{asset('client/img/review-bg.jpg')}}">
  <div class="container">
    <div class="review-slider owl-carousel">
      <div class="review-item text-white">
        <div class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
        </div>
        <p>“ TRAO GIÁ TRỊ TỪ TÂM - Điều tuyệt vời nhất trong cuộc sống của mỗi chúng ta là cho đi những điều giá trị, và quan trọng nhất là tất cả chúng đều xuất phát từ chính cái "TÂM" của mỗi chúng ta. BẤT ĐỘNG SẢN sôi động kéo theo rất nhiều môi giới ra đời, và ở đó có cả những nhà môi giới chân chính và những nhà môi giới không chuyên thì vấn đề chữ TÂM với nghề là cực kỳ quan trọng. ”</p>
        <h5>Stacy Mc Neeley</h5>
        <span>CEP’s Director</span>
        <div class="clint-pic set-bg" data-setbg="{{asset('client/img/review/1.jpg')}}"></div>
      </div>

    </div>
  </div>
</section>
<!-- Review section end-->


<!-- Blog section -->
<section class="blog-section spad">
  <div class="container">
    <div class="section-title text-center">
      <h3>TIN TỨC MỚI NHẤT</h3>
      <p>Những thông tin mới nhất về bất động sản trên toàn thế giới.</p>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 blog-item">
        <img src="{{asset('client/img/blog/1.jpg')}}" alt="">
        <h5><a href="client/single-blog.html">Housing confidence hits record high as prices skyrocket</a></h5>
        <div class="blog-meta">
          <span><i class="fa fa-user"></i>Amanda Seyfried</span>
          <span><i class="fa fa-clock-o"></i>25 Jun 201</span>
        </div>
        <p>Integer luctus diam ac scerisque consectetur. Vimus dotnetact euismod lacus sit amet. Aenean interdus mid vitae maximus...</p>
      </div>
      <div class="col-lg-4 col-md-6 blog-item">
        <img src="{{asset('client/img/blog/2.jpg')}}" alt="">
        <h5><a href="client/single-blog.html">Taylor Swift is selling her $2.95 million Beverly Hills mansion</a></h5>
        <div class="blog-meta">
          <span><i class="fa fa-user"></i>Amanda Seyfried</span>
          <span><i class="fa fa-clock-o"></i>25 Jun 201</span>
        </div>
        <p>Integer luctus diam ac scerisque consectetur. Vimus dotnetact euismod lacus sit amet. Aenean interdus mid vitae maximus...</p>
      </div>
      <div class="col-lg-4 col-md-6 blog-item">
        <img src="{{asset('client/img/blog/3.jpg')}}" alt="">
        <h5><a href="client/single-blog.html">NYC luxury housing market saturated with inventory, says celebrity realtor</a></h5>
        <div class="blog-meta">
          <span><i class="fa fa-user"></i>Amanda Seyfried</span>
          <span><i class="fa fa-clock-o"></i>25 Jun 201</span>
        </div>
        <p>Integer luctus diam ac scerisque consectetur. Vimus dotnetact euismod lacus sit amet. Aenean interdus mid vitae maximus...</p>
      </div>
    </div>
  </div>
</section>
<!-- Blog section end -->

<!-- Clients section -->
<div class="clients-section">
  <div class="container">
    <div class="clients-slider owl-carousel">
      <a href="client/#">
        <img src="{{asset('client/img/partner/1.png')}}" alt="">
      </a>
      <a href="client/#">
        <img src="{{asset('client/img/partner/2.png')}}" alt="">
      </a>
      <a href="client/#">
        <img src="{{asset('client/img/partner/3.png')}}" alt="">
      </a>
      <a href="client/#">
        <img src="{{asset('client/img/partner/4.png')}}" alt="">
      </a>
      <a href="client/#">
        <img src="{{asset('client/img/partner/5.png')}}" alt="">
      </a>
    </div>
  </div>
</div>
</div>
<!-- Clients section end -->
<script type="text/javascript">
  new Vue({
    el:'#app',
    data (){
      return {
        selectedCity:'',
        selectedDistrict:'',
        cities:[],
        categories:[],
        districts:[]
      }
    },
    methods:{

      getDistrict (){
        console.log(this.selectedCity);
        axios.get('/data/quan_huyen.json').then(response=>{
          this.districts=[];
          let allDistricts=Object.values(response.data);
          allDistricts.forEach(district=>{
            if(district.parent_code==this.selectedCity){
              this.districts.push(district);
            }
          })
        })
      }

    }
    ,
    computed:{

    }
    ,
    mounted (){
      // Get categories
      axios.get('/api/admin/category').then(response =>{
        console.log(response.data);
        this.categories=response.data;
      })
      // Get city and district
      axios.get('/data/tinh_tp.json').then(response=>{

        this.cities=Object.values(response.data);

      })
    }
  })
</script>
@endsection
