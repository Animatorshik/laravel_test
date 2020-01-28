@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				@hasrole('admin')
				<div class="card mb-3">
					<div class="card-body">
						<a href="{{ route('articles.indexAll') }}">{{ __('View all articles') }}</a><br>
						<a href="{{ route('users') }}">{{ __('All managers') }}</a>
					</div>
				</div>
				@endhasrole

				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-6 text-left">
								{{ __('My articles') }}
							</div>
							<div class="col-6 text-right">
								<a href="{{ route('articles.create') }}">{{ __('Create a new article') }}</a>
							</div>
						</div>
					</div>

					<div class="card-body">
						@forelse($articles as $article)
							<a href="{{ route('articles.show', $article) }}">
								<h3>{{ $article->title }}</h3>
							</a>
							<p>{{ __('Author') }}: {{ $article->user->name }}</p>
							<hr>
						@empty
							<p class="text-center m-0">{{ __('No articles yet.') }}</p>
						@endforelse
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
