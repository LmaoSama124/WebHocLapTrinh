@extends('admin.layouts.login')

@section('content') 
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('assets/login_admin/images/img-01.png') }}" alt="IMG">
            </div>

            <form class="login100-form validate-form" action="?mode=admin&action=login" method="post">
                <span class="login100-form-title">
                    Admin Site
                </span>
                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-136">
                </div>
            </form>
        </div>
    </div>
</div>




<script src="{{ asset('assets/login_admin/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/login_admin/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('assets/login_admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/login_admin/vendor/tilt/tilt.jquery.min.js') }}"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<script src="{{ asset('assets/login_admin/js/main.js') }}"></script>

</body>
</html>
@endsection