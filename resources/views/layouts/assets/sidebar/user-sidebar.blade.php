<div class="col-md-3 left_col fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Eco Solve ERP</span></a>
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
                <li><a><i class="fa fa-edit"></i>Products<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="/products">Product</a></li>
                    <li><a href="/403">View Product Categories</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i>Quotation <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ route('customer.index') }}">Customer Details</a></li>
                    <li><a href="{{ route('quotation.index') }}"> Quotation</a></li>
                    <li><a href="media_gallery.html">Quotation Information</a></li>
                    <li><a href="{{ url('/quotation/approval') }}">Quotation Approval</a></li>
                    <li><a href="media_gallery.html">Quotation Documentation</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i>Order <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ route('customer.index') }}">Order Details</a></li>
                  </ul>
                </li>
                @can('allow-production', Auth::user())
                <li><a><i class="fa fa-table"></i>Production<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="tables.html">Check Production Avalability</a></li>
                    <li><a href="tables_dynamic.html">Create Production</a></li>
                    <li><a href="tables_dynamic.html">Quality Check</a></li>
                    <li><a href="tables_dynamic.html">Product Approval</a></li>
                    <li><a href="tables_dynamic.html">Production Information</a></li>
                  </ul>
                </li>
                @endcan
                @can('allow-accounts', Auth::user())
                <li><a><i class="fa fa-table"></i>Accounting<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="/accounts">Accounts</a></li>
                  </ul>
                @endcan  
                </li>
              </ul>
            </div>

            <div class="menu_section">
              <h3>Go to Administrator's Panel</h3>
              <ul class="nav side-menu">
                <li><a href="{{url('/adminDashboard')}}"><i class="fa fa-bug"></i>Administrator's Panel</a>
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
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="fa fa-lock" aria-hidden="true"></span>
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
