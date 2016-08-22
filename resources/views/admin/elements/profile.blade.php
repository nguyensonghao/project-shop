<!-- Profile menu left -->
<div class="navbar nav_title" style="border: 0;">
  <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Backend!</span></a>
</div>

<div class="clearfix"></div>

<div class="profile">
  <div class="profile_pic">
    <img src="{{Asset('assets/image/avatar-default.jpg')}}" alt="Avatar default" class="img-circle profile_img">
  </div>
  <div class="profile_info">
    <span>{{trans('admin.welcome')}},</span>
    <h2>{{Auth::user()->name}}</h2>
  </div>
</div>
<br />