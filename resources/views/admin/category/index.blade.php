@extends('admin.index')
@section('content')
<div class="content" id="app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Bảng danh mục <button id="toogleAddCategory" @click="isActiveAddForm=!isActiveAddForm" class="btn btn-success" type="button" name="button"><i class="fa fa-plus" ></i></button></h4>
                        <!-- Add category form -->
                        <div class="add-category" v-show="isActiveAddForm">
                          <form enctype="multipart/form-data" method="post" action="{{asset('api/admin/category')}}">
                            <h3>Thêm danh mục</h3>
                            <h3 style="float:right; margin-top:0px;margin-right:3px;cursor:pointer;" @click="showAddForm()">
                              <i class="fa fa-window-close"></i>
                            </h3>
                            @csrf
                              <div class="form-group">
                                  <label for="inputName">Tiêu đề</label>
                                <input type="text" class="form-control" id="inputName" name="name" required>
                              </div>
                              <div class="form-group">
                                <label for="inputDescription">Mô tả</label>
                                <input type="text" class="form-control" id="inputDescription"  name="description">
                              </div>
                              <div class="form-group">
                                <label for="inputImage">Danh mục cha</label>
                                <select class="form-control" name="parent_id" required>
                                    <option value="">Vui lòng chọn</option>
                                    <option value="0">Không có</option>
                                    <option v-for="category in categories" v-bind:value="category.id" >@{{category.name}}</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="inputImage">Ảnh</label>
                                <input type="file" class="form-control" ref="file" @change="handleFileUpload()" accept="image/*" id="file" name="image" width="502" height="364">
                                <img v-bind:src="imagePreview" id="previewImage" alt="">
                              </div>
                              <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </form>
                        </div>
                        <!-- End add category form -->
                        <!-- Edit Form -->
                        <div class="edit-category" id="edit-category" v-show="isActiveEditForm">
                          <h3 style="float:right; margin-top:0px;margin-right:3px;cursor:pointer;" @click="isActiveEditForm=false">
                            <i class="fa fa-window-close"></i>
                          </h3>
                          <form enctype="multipart/form-data" id="edit-form" method="post" action="{{route('category.edit')}}">
                            <h3>Sửa danh mục</h3>
                              @csrf
                             <input type="hidden" name="id" v-model="editingCategory.id" >
                              <div class="form-group">
                                  <label for="inputName">Tiêu đề</label>
                                <input type="text" class="form-control" id="inputName" name="name" v-model="editingCategory.name" required>
                              </div>
                              <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <input type="text" class="form-control" id="inputDescription" v-model="editingCategory.description" name="description">
                              </div>
                              <div class="form-group">
                                <label for="inputImage">Danh mục cha</label>
                                <select class="form-control" name="parent_id" required v-bind:value="editingCategory.parent_id">
                                    <option value="">Vui lòng chọn</option>
                                    <option value="0">Không có</option>
                                    <option v-for="category in categories" v-bind:value="category.id" >@{{category.name}}</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="inputImage">Ảnh đại diện</label>
                                <input type="file" class="form-control" ref="file" @change="handleEditFileUpload()" id="editImage" accept="image/*" name="image"  >
                                <img v-bind:src="editingImage" width="502" height="364" alt="">
                              </div>
                              <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </form>
                        </div>
                        <!-- End edit form -->
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead style="text-align:center !important">
                              <th>STT</th>
                              <th>Tiêu đề</th>
                              <th style="width:200px;">Mô tả</th>
                              <th>Danh mục cha</th>
                              <th>Ảnh đại diện</th>

                              <th>Hiển thị trên trang chủ</th>
                              <th>Hành động</th>
                            </thead>
                            <tbody>
                                <tr v-for="category in categories">
                                  <td>@{{category.id}}</td>
                                  <td>@{{category.name}}</td>
                                  <td>@{{category.description}}</td>
                                  <td>@{{getParent(category.parent_id)}}</td>
                                  <td><img v-bind:src="'../image/category/'+category.image" width="150px" height="150px" ></td>


                                  <td>
                                    <button v-if="category.show==1" v-on:click="toogleShowHide(category.id)" type="button" class="btn btn-success" name="button">Đang hiện</button>
                                    <button v-if="category.show==0" v-on:click="toogleShowHide(category.id)" type="button" class="btn btn-danger" name="button">Đang ẩn</button>
                                  </td>
                                  <td>
                                      <div class=" btn-group-vertical">
                                        <button type="button"  class="btn btn-success" name="button" @click="showEditingCategory(category)"><a href="#edit-form">Sửa </a></button>
                                        <button type="button"class="btn btn-danger" name="button" @click="deleteCategory(category)">Xóa</button>
                                      </div>

                                  </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  new Vue({
    el:'#app',
    data (){
      return {
        isActiveAddForm:false,
        isActiveEditForm:false,
        file:'',
        editingImage:'',
        imagePreview:'',
        editingCategory:{},
        categories:[]
      }
    },
    methods: {
      // hande add form image
      handleFileUpload (){
        this.file = this.$refs.file.files[0];

         let reader  = new FileReader();

         reader.addEventListener("load", function () {

          this.imagePreview = reader.result;
        }.bind(this), false);
         if( this.file ){
           reader.readAsDataURL( this.file );
         }

      },
      handleEditFileUpload (){
          this.file = this.$refs.file.files[0];

          let reader = new FileReader();
          reader.addEventListener('load',function(){
            this.editingImage = reader.result;
          }.bind(this),false);
          if(this.file){
            reader.readAsDataURL(this.file);
          }

      }
      ,
      // Get paarent name
      getParent:function(parent_id){
        let name='Không có';
        for(let i=0;i<this.categories.length;i++){
          if(this.categories[i].id == parent_id){
            return this.categories[i].name;
          }
        }
        return name;
      },
      showAddForm(){
        this.isActiveAddForm = !this.isActiveAddForm;
        this.isActiveEditForm = false;
      }
      ,
      showEditingCategory:function(category){
        this.isActiveEditForm = true;
        this.isActiveAddForm = false;
        this.editingCategory=category;
        this.editingImage = '../image/category/'+this.editingCategory.image;
      },
      // Toogle show and hide category on home page
      toogleShowHide:function(idCategory){

          axios.post('/api/admin/category/toogle',{id:idCategory})
          .then(response => {
            console.log(response.data);
            this.getCategories();
          })
      },
      // Get all category
      getCategories:function(){
        axios.get('/api/admin/category').then(response=>{
          this.categories = response.data;
        })
      },
      // Delete category by id
      deleteCategory:function(category){
        swal({
          title:"Bạn có chắc muốn xóa mục này?",
          text:"Các mục này sẽ không thể khôi phục lại",
          icon:"error",
          buttons: true,
          dangerMode: true,
        }).then(willDel=>{
          if(willDel){
            axios.delete('/api/admin/category/'+category.id)
            .then(response=>{

              this.getCategories();
              swal({
                title:response.data,
                icon:"success",
              })
            })
          }
        })

      }
    },
    computed:{

    }
    ,
    mounted (){
        this.getCategories();

    }
  })
</script>
@endsection
