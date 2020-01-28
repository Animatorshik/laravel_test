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
							{{ __('Create a new article') }}
						</div>
					</div>
				</div>

                <div class="card-body">
					<form method="POST" action="{{ route('articles.store') }}">
						@csrf
						<div class="form-group">
							<label for="title">{{ __('Title') }}</label>
							<input type="text"
									name="title"
									class="form-control @error('title') is-invalid @enderror"
									id="title"
									value="{{ old('title') }}">
							@error('title')
								<div class="invalid-feedback">{{ $errors->first('title') }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="body">{{ __('Body') }}</label>
							<textarea name="body"
									  class="form-control @error('body') is-invalid @enderror"
									  id="body"
									  rows="3">{{ old('body') }}</textarea>
							@error('body')
								<div class="invalid-feedback">{{ $errors->first('body') }}</div>
							@enderror
						</div>
						<button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
