<footer class="footer-section set-bg" data-setbg="{{asset('client/img/footer-bg.jpg')}}" id="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 footer-widget">
        <img src="{{asset('client/img/logo.png')}}" alt="">
        <p>Nếu bạn đang tìm kiếm cho riêng mình một không gian riêng đầy tinh tế và thân thiện thì
đây đúng là nơi đáng sống cho gia đình bạn</p>
        <div class="social">
          <a target="_blank" href="https://facebook.com/giveup.nevo"><i class="fa fa-facebook"></i></a>

        </div>
      </div>
      <div class="col-lg-3 col-md-6 footer-widget">
        <div class="contact-widget">
          <h5 class="fw-title">LIÊN HỆ</h5>
          <p><i class="fa fa-map-marker"></i>175 Xuân Thủy, Cầu Giấy, Hà Nội </p>
          <p><i class="fa fa-phone"></i>0963871598</p>
          <p><i class="fa fa-envelope"></i>minhhieuuet@gmail.com</p>
          <p><i class="fa fa-clock-o"></i>Mon - Sat, 08 AM - 06 PM</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 footer-widget">
        <div class="double-menu-widget">
          <a href="#relatedLocation"><h5 class="fw-title" >ĐỊA ĐIỂM PHỔ BIẾN</h5></a>
          <ul>
            <li><a href="{{asset('tim-kiem?city=01')}}">Hà Nội</a></li>
            <li><a href="{{asset('tim-kiem?city=79')}}">TP.Hồ Chí Minh</a></li>

          </ul>
          <ul>
            <li><a href="{{asset('tim-kiem?city=48')}}">Đà Nẵng</a></li>
            <li><a href="{{asset('/tim-kiem?district=568')}}">Nha Trang</a></li>

          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6  footer-widget">
        <div class="newslatter-widget">
          <h5 class="fw-title">NHẬN THÔNG BÁO</h5>
          <p>Theo dõi chũng tôi để nhận những tin tức mới nhất về bât động sản.</p>
          <div class="footer-newslatter-form" @keyup.enter="sendSubscriberEmail()">
            <input type="text" type="email" v-model="emailSubscriber" placeholder="Địa chỉ email">
            <button style="cursor:pointer;"><i class="fa fa-send" @click="sendSubscriberEmail()"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      {{-- <div class="footer-nav">
        <ul>
          <li><a href="client/">Home</a></li>
          <li><a href="client/">Featured Listing</a></li>
          <li><a href="client/">About us</a></li>
          <li><a href="client/">Pages</a></li>
          <li><a href="client/">Blog</a></li>
          <li><a href="client/">Contact</a></li>
        </ul>
      </div> --}}
      <div class="copyright">
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div>
    </div>
  </div>
</footer>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

</script>
<script type="text/javascript">
  new Vue({
    el:'#footer',
    data (){
      return {
        emailSubscriber:''
      }
    },
    methods:{
      validateEmail(email) {
          var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(String(email).toLowerCase());
      },
      sendSubscriberEmail(){
        if(this.validateEmail(this.emailSubscriber)){
          swal({
            title:"Đang gửi",
            icon:"info",
            text:"Vui lòng đợi"
          });

          axios.post('/api/subscriber',{email:this.emailSubscriber})
          .then(response =>{
            if(response.data == 'success'){
              this.emailSubscriber = '';
              swal({
                title:"Đăng ký thành công",
                icon:"success",
                text:"Bạn sẽ nhận được những tin tức mới nhất từ chúng tôi",
                timer:"1000",
                button:false
              });
            }
          })
          .catch(error =>{
            swal({
              title:"Lỗi",
              icon:"error",
              text:"Email không hợp lệ hoặc đã tồn tại",
              timer:"1000",
              button:false
            })
            // let errs = error.response.data.errors;
            // Object.keys(errs).forEach(errKey =>{
            //   console.log(errKey + ": "+errs[errKey].join(","));
            // })


          })
        }
        else{
          swal({
            title:"Email không hợp lệ",
            timer:1000,
            text:"Bạn cần nhập email đúng đinh dạng",
            icon:"error",
            button:false
          })
        }
      }
    }
  })
</script>
