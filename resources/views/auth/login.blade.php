@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-6 col-md-4 mx-auto">
			@if (session('status'))
				<div class="card">
					{{ session('status') }}
				</div>
			@endif
			<div class="card">
				<div class="card-body">
					<form class="form-signin" method="POST" action="{{ url('/login') }}">
						{{ csrf_field() }}
						<input type="email" id="inputEmail" value="{{ old('email') }}" class="form-control" placeholder="Email address" required autofocus>
						<label for="inputEmail" class="sr-only">Email address</label>
						@if ($errors->has('email'))
							<span>
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
						<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
						<label for="inputPassword" class="sr-only">Password</label>
						@if ($errors->has('password'))
							<span>
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
						<div class="checkbox">
						<label>
							<input type="checkbox" value="remember-me"> Remember me
						</label>
						</div>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> <!-- /container -->
@endsection
