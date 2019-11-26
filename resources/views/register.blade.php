@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
									<h2>
										Register
									</h2>

									@if (session('message'))
										<div class="alert alert-success">
											{{ session('message') }}
										</div>
									@endif
									@error ('email')
										<div class="alert alert-warning">
											{{ $message }}
										</div>
									@enderror


									<form method="post" class="mt-4">
										@csrf

										<div class="form-group">
											<label for="name" class="sr-only">Name</label>
											<input autofocus required placeholder="Name" id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
										</div>

										<div class="form-group">
											<label for="email" class="sr-only">Email</label>
											<input required placeholder="Email address" id="email" class="form-control" type="email" name="email" value="{{ old('email') }}">
										</div>

										<div class="form-group">
											<button class="btn-lg btn-block btn btn-primary" type="submit">Log in</button>
										</div>
									</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
