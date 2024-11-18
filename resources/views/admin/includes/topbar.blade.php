<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <!--li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="{{asset('admin/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="{{asset('admin/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li-->
        <!-- Notifications Dropdown Menu -->
        <!--li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li-->
        <li class="dropdown user user-menu open">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">

                @if(file_exists(public_path(Auth::user()->profile_photo_path)))
                <img src="{{asset(Auth::user()->profile_photo_path)}}" class="user-image" alt="User Image">
                @else
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                @endif
                <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    @if(file_exists(public_path(Auth::user()->profile_photo_path)))
                    <img src="{{asset(Auth::user()->profile_photo_path)}}" class="img-circle" alt="User Image">
                    @else
                    <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    @endif
                    

                    <p>
                        <h5>{{Auth::user()->name}}</h5>
                        <small>Member since Nov. 2012</small>
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <div class="row">
                        <div class="col-lg-4 text-center">
                            <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#updateProfileModal">Profile</a>
                        </div>
                        <div class="col-lg-3 text-center">
                            <a href="#"></a>
                        </div>
                        <div class="col-lg-5 text-center">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logoutform').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                            </a>
                            <form id="logoutform" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                </li>
            </ul>
        </li>
        <!--li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li-->
    </ul>
</nav>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    ...
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="updateProfileModal">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"><h4 class="modal-title"><b>Admin Profile</b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{route('admin-update-profile')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="username" class="col-sm-3 control-label">Name : </label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 control-label">Address : </label>

                    <div class="col-sm-9">
                    <!-- <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}" > -->
                    <textarea class="form-control" name="address">{{Auth::user()->address}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 control-label">Phone : </label>
        
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  name="phone" value="{{Auth::user()->phone}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 control-label">Email : </label>
            
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-3 control-label">Photo : </label>
                    <div class="col-sm-9">
                        <input type="file" id="photo" name="profile_photo_path">
                        <img src="{{asset(Auth::user()->profile_photo_path)}}" style="margin: 2% 0% 0% 0%;width: 20%;" class="form-group row">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password : </label>
                
                    <div class="col-sm-9">
                      <input type="password" class="form-control"  name="current_password" required>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 control-label">New Password:</label>
                
                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="new_password" >
                  </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 control-label">Confirm Password : </label>
                
                    <div class="col-sm-9">
                      <input type="password" class="form-control"  name="confirm_password" >
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Update Profile</button>
            </form>
            </div>

</div>
</div>
</div>