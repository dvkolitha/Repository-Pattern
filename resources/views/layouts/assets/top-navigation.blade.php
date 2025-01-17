<!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="/images/profile-photo/{{auth()->user()->photo ? auth()->user()->photo->file : 'empty.jpg'}}" alt="">{{auth()->user()->firstName}}
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="javascript:;"> Profile</a></li>
                <li>
                  <a href="javascript:;">
                    <span class="badge bg-red pull-right">50%</span>
                    <span>Settings</span>
                  </a>
                </li>
                <li><a href="javascript:;">Help</a></li>
                <li><a href="{{ route('logout') }}"onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                </li>

              </ul>
            </li>

            <li role="presentation" class="dropdown">
              <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell"></i>
                <span class="badge bg-green">{{count(auth()->user()->notifications)}}</span>
              </a>
              <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                @foreach(auth()->user()->notifications as $notification)
                   <li>
                     <a>
                       <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                       <span>
                        {{--  <span>{{$notification}}</span> --}}
{{--                          <span class="time">3 mins ago</span>
 --}}                       </span>
                       @php
                         $user = \App\User::find($notification->data['created_by']);
                       @endphp
                       <span class="message">
                        {{$user->firstName}} created a quotation !!!.
                       </span>
                     </a>
                   </li>
                @endforeach
                  <div class="text-center">
                    <a>
                      <strong>See All Alerts</strong>
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->
