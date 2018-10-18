@extends('admin.index')
@section('content')
  <div class="content" id="app">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                          <h4 class="title">Bảng danh mục <button id="toogleAddCategory" @click="redirectToAddForm()" class="btn btn-success" type="button" name="button"><i class="fa fa-plus" ></i></button></h4>

                      </div>
                      <div class="content table-responsive table-full-width">
                          <table class="table table-striped">
                              <thead style="text-align:center !important">
                                <th>STT</th>
                                <th style="width:100px;">Tiêu đề</th>
                                <th>Danh mục</th>
                                <th>Loại giao dịch</th>
                                <th>Người đăng</th>
                                <th>Địa chỉ</th>
                                <th>Diện tích</th>
                                <th>Nổi bật</th>
                                <th>Ảnh đại diện</th>
                                <th>Hành động</th>
                              </thead>
                              <tbody>
                                @foreach($products as $key => $product)
                                  <tr >
                                    <td>{{$key+1}}</td>
                                    <td style="width:150px;">{{$product['title']}}</td>
                                    <td>{!!$product->category['name']!!}</td>
                                    <td>{{$product['type']=='rent'?"Cho thuê":"Đang bán"}}</td>
                                    <td style="width:150px;">{{$product->contact['name']}}</td>

                                    <td>{{$product->location}}</td>
                                    <td>{{$product['area']}}m<sup>2</sup></td>
                                    <td>
                                      <ul>
                                        @foreach(explode(";",$product['amenities']) as $amenity)
                                          <li>{{$amenity}}</li>
                                        @endforeach
                                      </ul>

                                    </td>
                                    <td><img  width="150px" height="150px" src="{{asset('image/product/'.$product['image'])}}" ></td>

                                    <td>
                                        <a href="{{asset('san-pham/'.$product['slug'].'/'.$product['id'])}}" target="_blank"><button type="button"  class="btn btn-info" style="border-radius:10px 10px 0px 0px;width:70px;" > Xem </button></a>
                                        <a href="{{asset('admin/product/'.$product['id'].'/edit')}}"><button type="button" style="border-radius:0px 0px 0px 0px;width:70px;" class="btn btn-success" name="button" >Sửa</button></a>

                                        <button type="button" id="{{$product['id']}}" @click="confirmProductDelete"  style="border-radius:0px 0px 10px 10px;width:70px;" class="btn btn-danger" name="button" >Xóa</button>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                          </table>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <script type="text/javascript">
      new Vue({
        el:'#app',
        data (){
          return {
            deletingId:''
          }
        },
        methods :{
          redirectToAddForm (){
            window.location.href = window.location.origin +"/admin/product/add";
          },
          confirmProductDelete (e){
            this.deletingId = e.currentTarget.getAttribute('id');
            swal({
              title:"Bạn đã chắc chưa",
              text:"Mọi dữ liệu sẽ không thể khôi phục lại",
              icon:"error",
              buttons: true,
              dangerMode: true,
            }).then(willDel=>{
              if(willDel){
                axios.delete('../api/admin/product/'+this.deletingId)
                .then(response => {
                  if(response.data == "success"){
                      window.location.reload();
                      swal({
                        title:"Xóa thành công",
                        icon:"success",
                        timer:"1000"
                      })
                  }
                  else{
                    swal({
                      title:"Đã xảy ra lỗi gì đó",
                      icon:"error",
                      timer:"1000"
                    })
                  }
                })
              }
            })
          }
        }
      })
  </script>
@endsection
