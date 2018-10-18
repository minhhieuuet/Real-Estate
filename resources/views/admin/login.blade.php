<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{asset('client/css/login.css')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  </head>
  <body>

      <div class="tile">
      <div class="tile-header">
        <h2 style="color: white; opacity: .75; font-size: 4rem; display: flex; justify-content: center; align-items: center; height: 100%;">
          LOGIN
        </h2>
      </div>

      <div class="tile-body">
        <form id="app" @keydown.enter="submitForm()">
          <label class="form-input">
            <i class="material-icons">person</i>
             <input type="text" v-model="username" required />

            <!--<input type="text" autofocus="true" required />-->
            <span class="label">Tài khoản</span>
            <span class="underline"></span>
          </label>


          <label class="form-input">
            <i class="material-icons">lock</i>
            <input type="password" v-model="password" required />
            <span class="label">Mật khẩu</span>
            <div class="underline"></div>
          </label>

          <div class="submit-container clearfix" style="margin-top: 2rem;">
            <div id="submit" @click="submitForm()" role="button" type="button" class="btn btn-irenic center" tabindex="0">
              <span>Đăng nhập</span>
            </div>

            <div class="login-pending">
              <div class=spinner>
                <span class="dot1"></span>
                <span class="dot2"></span>
              </div>

            </div>
          </div>
        </form>
      </div>
    </div>

  </body>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>
  {{-- Swal --}}
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.5/dist/sweetalert2.all.min.js"></script>
  <script type="text/javascript">
      var app = new Vue({
        el:'#app',
        data (){
          return {
            username:'',
            password:''
          }
        }
        ,
        methods :{
          submitForm (){
            axios.post(window.location.href,{username:this.username,password:this.password})
            .then(response=>{
              if(response.data == "Done"){

                swal({
                  title:"Đăng nhập thành công",
                  text:" Chào mừng bạn đến với trang quản trị",
                  type:"success",
                  timer:'1500',
                  showCancelButton: false,
                  showConfirmButton: false
                }).then(function(){
                    window.location.href = window.location.origin + "/admin";
                });

              }
              else{
                swal({
                  title:"Đăng nhập thất bại",
                  text:"Tên đâng nhập hoặc mật khẩu không đúng!",
                  type:"error",
                  timer:'1500',
                  showCancelButton: false,
                  showConfirmButton: false
                })
              }
            })
          }
        }
      })

  </script>
</html>
