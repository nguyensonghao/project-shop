<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link rel="stylesheet" href="{{Asset('assets/admin/css/login.css')}}">
</head>

<body>
  <div class="container">
    <div class="info">
      <h1>{{trans('admin.login_systerm')}}</h1>
      <span>Shop bán hàng online Adidas
    </div>
  </div>
  <div class="form">
    <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
    {{Form::open(['route' => 'admin.login', 'class' => 'login-form'])}}
      <input type="text" name="name" placeholder="{{trans('admin.username')}}" autofocus/>
      <input type="password" name="password" placeholder="{{trans('admin.password')}}"/>
      <button>{{trans('admin.login')}}</button>
  	<div class="action">
  		<div class="remember-token-form">
  			<input type="checkbox" id="remember-token">
  			<label for="remember-token">{{trans('admin.remember_password')}}</label>			
  		</div>    	
  		<div class="forget-password">
  			<a href="#">{{trans('admin.forget_password')}}</a>
  		</div>
  	</div>
    {{Form::close()}}
  </div>    
</body>
</html>
