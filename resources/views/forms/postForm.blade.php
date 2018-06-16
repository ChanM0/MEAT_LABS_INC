<form method="POST" action="{{ route('post.store') }}">
	<div class="form-group">
		@csrf
		<label for="post">{{ __('Create Post') }}</label>
		<input type="input" class="col-md-4 form-control" id="post" placeholder="Enter post" name="post" autofocus>
		<input type="hidden"  name="user_id" value="{{Auth::user()->id}}">
		<input type="hidden"  name="email" value="{{Auth::user()->email}}">
	</div>
	<input type="submit" value="Post">
</form>