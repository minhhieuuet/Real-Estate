@extends('admin.index')
@section('content')
<div class="content" id="app">
  <div class="container">
    <form class="" action="{{asset('api/admin/product')}}" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="form-group col-md-5">
            <label for="">Tiêu đề</label>
            <input class="form-control" type="text" name="title" required placeholder="Nhập tiêu đề  sản phẩm"  value="">
        </div>
        <div class="form-group col-md-5">
            <label for="">Thể loại</label>
            <select class="form-control" name="category_id" required >
                <option value="">Chọn thể loại</option>
                <option v-for="category in categories" v-bind:value="category.id">@{{category.name}}</option>
            </select>
        </div>

      </div>

      <div class="row">
        <div class="form-group col-md-5">
          <label for="">Loại giao dịch</label>
          <select class="form-control" name="type" required >
            <option value="">Chọn loại giao dịch</option>
            <option value="rent">Cho thuê</option>
            <option value="sale">Bán</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="">Giá tiền</label>
          <span>(VNĐ)</span>
          <input class="form-control" required type="number" name="price" placeholder="Nhập giá tiền" min="0" value="">

        </div>
        <div class="form-group col-md-3">
          <label for="">Diện tích</label>
          <span>(m2)</span>
          <input class="form-control" required min="0" type="number" name="area" placeholder="Nhập diện tich" value="">

        </div>
      </div>
      <div class="row">

        <div class="form-group col-md-12">
          <h4>Ảnh và slideshow</h4>
          <label for="">Ảnh đại diện</label>
          <input type="file" class="form-control" name="image" required value="">
          <h5>Slide show</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <h4>Mô tả</h4>
            <textarea  class="form-control ckeditor" name="description" rows="8" cols="80"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
              <h4>Đặc điểm nổi bật</h4>
              <!-- Convert amenities array to input -->
            <input type="hidden" name="amenities" v-bind:value="amenities.join(';')">
            <!-- End convert -->
            <table class="table" style="background-color:white;">
                <thead>
                  <th>STT</th>
                  <th>Nội dung</th>
                </thead>
                <tbody>
                  <tr v-for="(amenity,index) in amenities">
                    <td>@{{index+1}}</td>
                    <td>@{{amenity}}</td>
                    <td>
                      <button type="button"  @click="deleteAmenity(index)" class="btn btn-danger" name="button" style="border-radius:0">
                        <i class="fa fa-times"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>Add</td>
                    <td >
                      <input class="form-control" v-model="inputAmenity" @keyup.enter="addAmenity()" placeholder="Nhập nội dung" style="width:200px;border-bottom  :1px solid green;float:left;border-radius:0" type="text">
                    </td>
                    <td>
                      <button type="button" class="btn btn-success"  @click="addAmenity()" name="button" style="border-radius:0"><i class="fa fa-plus"></i></button>
                    </td>
                  </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group col-md-5" id="info-table">
          <h4>Thông tin liên hệ</h4>
          <table class="table">
              <tr>
                <td><i class="fa fa-user"></i></td>
                <td><input type="text" required name="contactName" placeholder="Nhập tên liên hệ" class="form-control"></td>
              </tr>
              <tr>
                <td><i class="fa fa-phone"></i></td>
                <td><input type="phone" required name="contactPhone" placeholder="Nhập số điện thoại liên hệ" class="form-control"></td>
              </tr>
              <tr>
                <td><i class="fa fa-envelope"></i></td>
                <td><input type="email" required name="contactEmail" placeholder="Nhập email liên hệ" class="form-control"></td>
              </tr>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-10">
            <h5>Vị trí</h5>
            <input required class="form-control" type="text" name="location" placeholder="Vui lòng nhập địa chỉ" value="">
        </div>
          <div class="form-group col-md-5">
            <select class="form-control col-md-5" name="city_code" v-on:change="getDistrict()"  v-model="selectedCity" >
              <option value="" selected disabled>Thành phố</option>
              <option v-for="city in cities" v-bind:value="city.code" >@{{city.name}}</option>
            </select>
          </div>
          <div class="form-group col-md-5">
            <select class="form-control col-md-5" name="district_code" v-model="selectedDistrict">
              <option value="" selected disabled >Quận Huyện</option>
              <option v-for="district in districts" v-bind:value="district.code">@{{district.name_with_type}}</option>
            </select>
          </div>
      </div>
      <div class="row" id="location-map">
        <h4>Vị trí Google Map</h4>
        <h6>Tham khảo: <a target="_blank" href="https://support.google.com/maps/answer/18539?co=GENIE.Platform%3DDesktop&hl=vi">Cách xem kinh độ vĩ độ trên Google Map</a></h6>

        <div class="form-group col-md-3">
            <label for="">Vĩ độ</label>
            <input type="number" name="lat" step="any" v-model="inputLat" class="form-control" name="lat" value="0">
        </div>
        <div class="form-group col-md-3">
            <label for="">Kinh độ</label>
            <input type="number" name="long" step="any" v-model="inputLong" class="form-control" name="long" value="0">
        </div>
        <div class="col-md-2">
            <button  @click="previewMap()" class="btn btn-success" type="button" name="button" id="preview-map">Xem trước</button>
        </div>
        <div class="col-md-12">
          <div class="pos-map" id="map-canvas">
          <iframe v-bind:src="inputLocation" width="700" height="350" frameborder="0" style="border:0" allowfullscreen=""></iframe>
        </div>
        </div>
      </div>
      <div class="row">
        <h4>Nhúng video youtube</h4>
        <div class="col-md-7">
          <label for="">Link</label>
          <input type="text" class="form-control" v-model="videoLink" name="video" value="">
        </div>

        <div class="col-md-12">
          <iframe width="620" height="500" v-if="videoLink!=''"
          v-bind:src="videoLink.replace('watch?v=','embed/')">
          </iframe>
        </div>
      </div>
        <button class="btn btn-success " id="product-submit" type="submit" >Thêm sản phẩm</button>
      </form>
    </div>


  </div>
</div>
<script type="text/javascript">
  new Vue({
    el:'#app',
    data (){
      return {
        videoLink:'',
        selectedCity:'',
        selectedDistrict:'',
        inputAmenity:'',
        cities:[],
        // LOcation
        inputLat:0,
        inputLong:0,
        inputLocation:'http://maps.google.com/maps?q=,10.606619&z=15&output=embed',
        //
        categories:[],
        districts:[],
        amenities:[],
  
      }
    },
    methods:{
      // Preview google map
      previewMap (){
        this.inputLocation=`http://maps.google.com/maps?q=${this.inputLat},${this.inputLong}&z=15&output=embed`
      },
      //
      // Delete amanity
      deleteAmenity (amenityId){

        this.amenities.splice(amenityId,1);
      },
      // Add new Amenity
      addAmenity (){
        // Push amenity input to array
        this.amenities.push(this.inputAmenity);
        // Reset input amenity
        this.inputAmenity='';
      },
      getDistrict (){
        //get districs list on change city
        axios.get('/data/quan_huyen.json').then(response=>{
          this.districts=[];
          let allDistricts=Object.values(response.data);
          allDistricts.forEach(district=>{
            if(district.parent_code==this.selectedCity){
                this.districts.push(district);
            }
          })
        })
      },
      // Get all category
      getCategories:function(){
        axios.get('/api/admin/category').then(response=>{
          this.categories = response.data;
        })
      }
    }
    ,
    mounted (){
      // Get categories on mount
      this.getCategories(),
      // Get city and district
      axios.get('/data/tinh_tp.json').then(response=>{

        this.cities=Object.values(response.data);

      })
    }
  })
</script>
@endsection
