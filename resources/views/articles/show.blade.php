@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-6 text-left">
							<a href="{{ route('articles.index') }}">{{ __('My articles') }}</a>
						</div>
						<div class="col-6 text-right">
							<a href="{{ route('articles.create') }}">{{ __('Create a new article') }}</a>
						</div>
					</div>
				</div>

                <div class="card-body">
					<h3>{{ $article->title }}</h3>
					<p>{{ $article->body }}</p>
					<p>{{ __('Author') }}: {{ $article->user->name }}</p>
					<hr>
					<a href="{{ route('articles.edit', $article) }}">{{ __('Edit') }}</a>
					@hasrole('admin')
					<form class="d-inline" method="POST" action="{{ route('articles.delete', $article) }}">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Delete') }}</button>
					</form>
					@endhasrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
