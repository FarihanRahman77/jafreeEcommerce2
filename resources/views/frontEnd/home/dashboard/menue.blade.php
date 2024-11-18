<div class="sidebar">
    <div class="text-center">
        <a href="{{url('/userDashboard')}}" style="text-align: center;">
            @if(Auth::user()->profile_photo_path)
            <img class="profile-user-img img-fluid img-circle"
                 src=""
                 alt="Profile Image" style="height:145px; width: 145px;margin-top: 1%;border: 2px solid white;">
                 @else
                 <img class="profile-user-img img-fluid img-circle"
                 src="{{asset('frontEnd/images/user.png')}}"
                 alt="Profile Image" style="height:145px; width: 145px;margin-top: 1%;border: 2px solid white;">
                 @endif
             </a>
    </div>
    <h3 class="profile-username text-center">{{Auth::user()->name}}<br></h3><br>
    <a class="" href="{{route('user-order-list',['id'=>'pending'])}}"><i class="fa fa-random" aria-hidden="true"></i> All Orders</a> 
    <a class="" href="{{route('user-message-portal')}}"><i class="fa fa-envelope" aria-hidden="true"></i> Message</a>
    <a class="active" href="{{route('user-profile-view')}}"><i class="fa fa-address-card" aria-hidden="true"></i> Profile View</a>
    <a class="" href="{{route('user-profile-edit')}}"><i class="fa fa-location-arrow" aria-hidden="true"></i> Profile Edit</a>
    <a class="" href="{{route('user-change-password')}}"><i class="fa fa-random" aria-hidden="true"></i> Change Password</a>
    
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a style="color:red" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                   this.closest('form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i>
            {{ __('Logout') }}

        </a>
    </form>
</div>