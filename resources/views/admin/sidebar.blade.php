<div class="sidebar" data-background-color="white" data-active-color="danger">

<!--
Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->

  <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                Creative Tim
            </a>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="{{asset('admin')}}">
                    <i class="ti-panel"></i>
                    <p>Trang chủ</p>
                </a>
            </li>
            <li>
                <a href="{{asset('admin/category')}}">
                    <i class="ti-view-list-alt"></i>
                    <p>Danh mục</p>
                </a>
            </li>
            <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-box"></i>
                <p>Sản phẩm</p>
              </a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                  <li>
                      <a href="{{asset('admin/product')}}">Danh sách</a>
                  </li>
                  <li>
                      <a href="{{asset('admin/product/add')}}">Thêm</a>
                  </li>

              </ul>
            </li>
            <li>
                <a href="typography.html">
                    <i class="ti-text"></i>
                    <p>Typography</p>
                </a>
            </li>
            <li>
                <a href="icons.html">
                    <i class="ti-pencil-alt2"></i>
                    <p>Icons</p>
                </a>
            </li>
            <li>
                <a href="maps.html">
                    <i class="ti-map"></i>
                    <p>Maps</p>
                </a>
            </li>
            <li>
                <a href="notifications.html">
                    <i class="ti-bell"></i>
                    <p>Thông báo</p>
                </a>
            </li>
    <!-- <li class="active-pro">
                <a href="upgrade.html">
                    <i class="ti-export"></i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
  </div>
</div>
