<div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Admin DashBoard</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="/images/profile-photo/{{auth()->user()->photo ? auth()->user()->photo->file : 'empty.jpg'}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{auth()->user()->firstName}}</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i>DashBoard<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('/adminDashboard')}}">DashBoard</a></li>
                    </ul>
                  </li>
                </ul> 
              <h3>Configuration</h3>
              <ul class="nav side-menu">
                <li><a></i>Employee Configure<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('allUsers')}}">User Management</a>
                    <li><a href="{{route('role.index')}}">Role Management</a>
                    <li><a href="">Employee Details</a>
                    </li>
                  </ul>
                </li>
                <li><a></i>Product Configure<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('productCategory.index')}}">product category</a>
                    <li><a href="{{route('productsAdmin')}}">products</a>
                    <li><a href="{{route('productCategoryConfigure')}}">category configuration</a>
                    </li>
                  </ul>
                </li>
              </ul>
              <h3>Master</h3>              
              <ul class="nav side-menu">
                 <li><a></i>Products<span class="fa fa-chevron-down"></span></a>
                   <ul class="nav child_menu">
                     <li><a href="{{route('products.index')}}">products</a>
                     </li>
                   </ul>
                 </li> 
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="fa fa-cogs" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="fa fa-arrows-alt" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="UserDashBoard" href="{{url('/userDashboard')}}">
              <span class="fa fa-user" aria-hidden="true"></span>
            </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
              <span class="fa fa-sign-out" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>
