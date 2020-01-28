@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card mb-3">
					<div class="card-body">
						<a href="{{ route('home') }}">{{ __('Back to home') }}</a>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-6 text-left">
								{{ __('All managers') }}
							</div>
						</div>
					</div>

					<div class="card-body">
						@forelse($users as $user)
							@if (! $user->hasRole('admin'))
								<h4>{{ $user->name }}</h4>
								<p>{{ __('Email') }}: {{ $user->email }}</p>
								<hr>
							@endif
						@empty
							<p class="text-center m-0">{{ __('No users yet.') }}</p>
						@endforelse
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
