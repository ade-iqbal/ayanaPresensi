<!doctype html>
<html lang="en">
    <head>
        <title>Login | Ayana Presensi</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="{{asset('login-form/css/style.css')}}">

    </head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex shadow-lg">
						<div class="img"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Login</h3>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="username">Username</label>
                                    <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" required>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success rounded submit px-3">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{asset('login-form/js/jquery.min.js')}"></script>
    <script src="{{asset('login-form/js/popper.js')}}"></script>
    <script src="{{asset('login-form/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('login-form/js/main.js')}}"></script>

	</body>
</html>