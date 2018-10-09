@extends('admin.index')
@section('content')
<div class="content" id="app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Categories Table <button id="toogleAddCategory" @click="isActiveAddForm=!isActiveAddForm" class="btn btn-success" type="button" name="button"><i class="fa fa-plus" ></i></button></h4>
                        <!-- Add category form -->
                        <div class="add-category" v-show="isActiveAddForm">
                          <form enctype="multipart/form-data" method="post" action="{{asset('api/admin/category')}}">
                            <h3>Add Form</h3>
                            <h3 style="float:right; margin-top:0px;margin-right:3px;cursor:pointer;" @click="isActiveAddForm=false">
                              <i class="fa fa-window-close"></i>
                            </h3>
                            @csrf
                              <div class="form-group">
                                  <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" name="name" required>
                              </div>
                              <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <input type="text" class="form-control" id="inputDescription" name="description">
                              </div>
                              <div class="form-group">
                                <label for="inputImage">Image</label>
                                <input type="file" class="form-control" id="inputImage" name="image">
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- End add category form -->
                        <!-- Edit Form -->
                        <div class="edit-category" id="edit-category" v-show="isActiveEditForm">
                          <h3 style="float:right; margin-top:0px;margin-right:3px;cursor:pointer;" @click="isActiveEditForm=false">
                            <i class="fa fa-window-close"></i>
                          </h3>
                          <form enctype="multipart/form-data" method="post" action="{{route('category.edit')}}">
                            <h3>Edit Form</h3>
                              @csrf
                             <input type="hidden" name="id" v-model="editingCategory.id" >
                              <div class="form-group">
                                  <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" name="name" v-model="editingCategory.name" required>
                              </div>
                              <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <input type="text" class="form-control" id="inputDescription" v-model="editingCategory.description" name="description">
                              </div>
                              <div class="form-group">
                                <label for="inputImage">Image</label>
                                <input type="file" class="form-control" id="inputImage" name="image">
                                <img v-bind:src="'../image/category/'+editingCategory.image" alt="">
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- End edit form -->
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead style="text-align:center !important">
                              <th>ID</th>
                              <th>Tên</th>
                              <th style="width:300px;">Mô tả</th>
                              <th>Ảnh</th>

                              <th>Hiển thị trên trang chủ</th>
                              <th>Hành động</th>
                            </thead>
                            <tbody>
                                <tr v-for="category in categories">
                                  <td>@{{category.id}}</td>
                                  <td>@{{category.name}}</td>
                                  <td>@{{category.description}}</td>
                                  <td><img v-bind:src="'../image/category/'+category.image" width="150px" height="150px" ></td>


                                  <td>
                                    <button v-if="category.show==1" v-on:click="toogleShowHide(category.id)" type="button" class="btn btn-success" name="button">Đang hiện</button>
                                    <button v-if="category.show==0" v-on:click="toogleShowHide(category.id)" type="button" class="btn btn-danger" name="button">Đang ẩn</button>
                                  </td>
                                  <td>
                                      <a href="#edit-category"><button type="button" class="btn btn-success" name="button" @click="showEditingCategory(category)">Edit</button></a>
                                      <button type="button" class="btn btn-danger" name="button" @click="deleteCategory(category)">Delete</button>
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
        editingCategory:{},
        categories:[]
      }
    },
    methods: {
      showEditingCategory:function(category){
        this.isActiveEditForm = true;
        this.editingCategory=category;
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
            axios.delete('/api/category/'+category.id)
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
    mounted (){
        this.getCategories();
    }
  })
</script>
@endsection