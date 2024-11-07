<!DOCTYPE html>
<html lang="en" dir="rtl">>


 @extends('auth.includes.jsheader');




<body>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
				     <img src="{{asset('loginpage/images/img-01.png')}}" alt="IMG">
				</div>

                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        @if($type == 'student')
                        {{-- type parameter from loginController loginForm($type){ --}}
                        {{-- student from selection page  --}}
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول طالب</h3>
                        @elseif($type == 'parent')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول ولي امر</h3>
                        @elseif($type == 'teacher')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول معلم</h3>
                        @else
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول ادمن</h3>
                        @endif

                {{-- <form method="POST" action="{{ route('login') }}"class="login100-form validate-form"> --}}
                    <form method="POST" action="{{ route('login') }}">
                    @csrf




					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" @error('email') is-invalid @enderror>
                        <input type="hidden" value="{{$type}}" name="type">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>

					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password"@error('password') is-invalid @enderror>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit"  class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>

                    @if (Route::has('password.request'))
                        <a class="txt2" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
					</div>

					{{-- <div class="text-center p-t-136">
                            <a class="txt2" href="{{route('register')}}">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> --}}
				</form>
            </div>
        </div>
			</div>
		</div>
	</div>


   @extends('auth.includes.jsfooter');







</body>
</html>
































{{-- <!DOCTYPE html>
<html lang="en">



@include('view.auth.includes.jsheader')
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('loginpage/images/img-01.png')}}" alt="IMG">
				</div>

                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf

					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100  @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate = "Password is required">

                   {{--     <div class="{{$errors->has('g-recaptcha-response')? 'has-error' : ''}}">

                            {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                              </div>
                         @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong> recaptcha هذا الحقل مطلوب </strong>
                                </span>
                            @endif



                        </div>



					<div class="container-login100-form-btn">
						<button  type="submit"  class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
                        </span>
                        @if (Route::has('password.request'))
                        <a class="txt2" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                       @endif

					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="{{route('register')}}">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


    @include('view.auth.includes.jsfooter')

</body>
</html> --}}
