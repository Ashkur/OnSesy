@extends('layouts.app')

@section('content')
<div class="container py-5">
        <div class="col-md-12">
            <div class="col-md-5 mx-auto">
		@if (session('status'))
				<div class="card">
					{{ session('status') }}
				</div>
					@endif
                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Login</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-signin" method="POST" action="{{ url('/login') }}">
								{{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputEmail">E-mail</label>
                                    <input type="text" id="inputEmail" value="{{ old('email') }}" class="form-control" name="email" autofocus>
									@if ($errors->has('email'))
							<span>
								<strong>{{ $errors->first('email') }}</strong>
							</span>
									@endif
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Senha</label>
                                    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Senha">
									@if ($errors->has('password'))
							<span>
								<strong>{{ $errors->first('password') }}</strong>
							</span>
									@endif
                                </div>
                                <div class="checkbox">
						<label>
							<input type="checkbox" value="remember-me"> Lembrar-me
						</label>
						</div>
                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
		</div>
</div> <!-- /container -->
</div>
@endsection
