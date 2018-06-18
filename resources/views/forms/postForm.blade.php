<div>
	@include('forms.errors')
	<form method="GET" action="{{ route('post.store',[Auth::user()->id]) }}">

		<div class="form-group">

			@csrf

			<label for="post">{{ __('Create Post') }}</label>

			<input type="input" class="col-md-4 form-control" id="post" placeholder="Enter post" name="post" autofocus>

		</div>

		<input type="submit" value="Post">

	</form>
</div>
