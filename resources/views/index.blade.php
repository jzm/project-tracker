@extends('layouts.app')

@section('content')
	@auth
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
										You're activated.
                </div>
            </div>
        </div>
    </div>
</div>
@endauth

@endsection
