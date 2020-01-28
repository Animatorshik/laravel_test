@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thank you for registration!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

					<p class="text-center m-0">We sanded a message to your email</p>
					<p class="text-center m-0">{{ $email }}</p>
					<p class="text-center m-0">with the instruction to verify your account.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
