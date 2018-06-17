 @foreach ($posts as $post)
 <ul>
    @if (Auth::user()->id === $post->user_id)
    <li>
        <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Delete/Edit
            </button>
            <div class="dropdown-menu">
                <form method="POST" action="{{ route( 'post.delete', [$post->id] ) }}">
                    @csrf
                    <input class="dropdown-item" type="submit" value="Delete">
                </form>
                <div class="dropdown-divider"></div>
                <form method="GET" action="{{ route( 'post.edit', [$post->id] ) }}">
                    @csrf
                    <input class="dropdown-item" type="submit" value="Edit">
                </form>
            </div>
        </div>
    </li>
    @endif 
    <li>Post id:
        {{ $post->id }}
    </li>
    <li>Author By:
        {{ $post->user['username'] }}
    </li>
    <li>Created at:
        {{ $post->created_at->toFormattedDateString() }}
    </li>
    <li>Post:
        {{ $post->post }}
        <ol>    
            <h5>Comments</h5>
            @foreach ($post->comments as $comment)
            <li>
                <ul>
                    @if (Auth::user()->id === $comment->user_id)
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Delete/Edit
                            </button>
                            <div class="dropdown-menu">
                                <form method="POST" action="{{ route( 'comment.delete', [$comment->id] ) }}">
                                    @csrf
                                    <input class="dropdown-item" type="submit" value="Delete">
                                </form>
                                <div class="dropdown-divider"></div>
                                <form method="GET" action="{{ route( 'comment.edit', [$comment->id] ) }}">
                                    @csrf
                                    <input class="dropdown-item" type="submit" value="Edit">
                                </form>
                            </div>
                        </div>
                    </li>
                    @endif 
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