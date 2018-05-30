<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/Admin/b/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/b/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/b/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/Admin/b/css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="/Admin/b/css/mws-theme.css" media="screen">

<title>后台登录</title>

</head>

<body>

    <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>Login</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="/admin/dologin" method="post">
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input id="username" type="text" name="username" class="mws-login-username required" placeholder="username" value="{{old('username')}}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="password" class="mws-login-password required" placeholder="password">
                        </div>
                    </div>
                    <div id="mws-login-remember" class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                            <li>
                                <input id="remember" type="checkbox"> 
                                <label for="remember">Remember me</label>
                                <br/>
                                <span id="warn" class="" style="display:none; color:rgb(252,67,67);">为了后台安全，不建议此操作！</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mws-form-row">
                        {{csrf_field()}}
                        <input type="submit" value="Login" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script src="/Admin/b/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/Admin/b/js/libs/jquery-1.8.3.js"></script>
    <script src="/Admin/b/js/libs/jquery.placeholder.min.js"></script>
    <script src="/Admin/b/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/Admin/b/jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="/Admin/b/plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="/Admin/b/js/core/login.js"></script>
    <script type="text/javascript">
     
        $('#remember').click(function(){
            if(this.checked == true){

                $('#warn')[0].style.display = 'inline';
                if($('#username')[0].value != ''){ 
                    var a = $('#username')[0].value;
                    $.post('/admin/remember',{'_token':'{{csrf_token()}}','username':a},function(data){
                        // alert(data);
                        
                            $('#username')[0].value = data;
                            // alert(111);
                       

                    });
                }
              
            }

            if(this.checked == false){

                $('#warn')[0].style.display = 'none';
                // $('#username')[0].placeholder = 'username';
                //$('#username')[0].value = '';
                if($('#username')[0].value != ''){ 
                    var a = $('#username')[0].value;
                    $.post('/admin/unremember',{'_token':'{{csrf_token()}}','username':a},function(data){
                        // alert(data);
                        
                            $('#username')[0].value = data;
                            // alert(111);
                       

                    });
                }

            }
            
        });
    
    
    </script>

</body>
</html>
