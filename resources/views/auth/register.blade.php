<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Register | IMS</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">
</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <!-- <div class="logo text-center"><img src="{{asset('assets/img/logo-dark.png')}}" alt="IMS Logo"></div> -->
                            <p class="lead">Register account</p>
                        </div>
                        <form class="form-auth-small" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="signup-email" class="control-label sr-only">Name</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       id="signup-email" name="name" value="{{ old('name') }}" required autofocus
                                       placeholder="Name">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="signup-email" class="control-label sr-only">Address</label>
                                <input type="text"
                                       class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                       id="signup-address" name="address" value="{{ old('address') }}" required
                                       autofocus placeholder="Address">
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="signup-phone" class="control-label sr-only">Phone</label>
                                <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                       id="signup-phone" name="phone" value="{{ old('phone') }}" required autofocus
                                       placeholder="Phone">
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="signup-password" class="control-label sr-only">Email</label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{ old('email') }}" required placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="signup-password" class="control-label sr-only">Password</label>
                                <input type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="signup-password" class="control-label sr-only">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                       placeholder="Confirm Password" name="password_confirmation" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary btn-md btn-block">REGISTER</button>
                        </form>
                    </div>
                </div>
                <div class="right">
                    <div class="overlay"
                         style="background-image: url('https://www.ascm.org/globalassets/ascm_website_assets/img/landing/im-01.jpg');">
                    </div>
                    <div class="content text">
                        <h1 class="heading"></h1>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
</body>
<script type="text/javascript">
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>

</html>
