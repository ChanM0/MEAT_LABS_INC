<div>
	@include('forms.errors')
	<form method="GET" action="{{route('comment.store',[Auth::user()->id] )}}">

		@csrf

		<div class="form-group">

			<label for="comment">{{ __('Comment') }}

			</label>

			<input type="input" class="col-md-4 form-control" id="comment" placeholder="Enter comment" name="comment" autofocus>

		</div>

		<input type="hidden"  name="post_id" value="{{ $post->id }}" >

		<input type="submit" value="Comment">

	</form>
</div>
