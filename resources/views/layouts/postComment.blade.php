 @foreach ($posts as $post)
 <ul>
    <li>Post id:
        {{ $post->id }}
    </li>
    <li>Created at:
        {{ $post->created_at->toFormattedDateString() }}
    </li>
    <li>Post:
        {{ $post->post }}
        <ol>    
            @foreach ($post->comments as $comment)
            <li>
                <ul>
                   <li>Comment id:
                    {{ $comment->id }}
                </li>

                <li>Comment:
                    {{ $comment->comment }}
                </li>

                <li>Created At:
                    {{ $comment->created_at->toFormattedDateString() }}
                </li>
                <li>Author By:
                    {{  $comment->author['username']  }}
                </li>
            </ul>
        </li>
        @endforeach
    </ol>
</li>
<li>
    <form method="POST" action="{{route('comment.store')}}">
        @csrf
        <div class="form-group">
            <label for="comment">{{ __('Comment') }}
            </label>
            <input type="input" class="col-md-4 form-control" id="comment" placeholder="Enter comment" name="comment" autofocus>
        </div>
        <input type="hidden"  name="user_id" value="{{Auth::user()->id}}" >
        <input type="hidden"  name="post_id" value="{{ $post->id }}" >
        <input type="submit" value="Comment">
    </form>
</li>
</ul>  
@endforeach