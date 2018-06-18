@foreach ($posts as $post)

 <ul>

    @if (Auth::user()->id === $post->user_id || Auth::user()->admin === 1 )

    <li>

        <div class="btn-group">

            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                Delete/Edit

            </button>

            <div class="dropdown-menu">

                <form method="GET" action="{{ route( 'post.delete', [$post->id] ) }}">

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

    <li>Created at:

        {{ $post->created_at->toFormattedDateString() }}

    </li>

    <li>Author By:

        <a href="{{ route( 'profile', [$post->user['email']] ) }}">{{  $post->user['username']  }}</a>

    </li>

    <li>Post:

        {{ $post->post }}

        <ol>    

            <h5>Comments</h5>

            @foreach ($post->comments as $comment)

            <li>

                <ul>

                    @if (Auth::user()->id === $comment->user_id || Auth::user()->admin === 1)

                    <li>

                        <div class="btn-group">

                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                Delete/Edit

                            </button>

                            <div class="dropdown-menu">

                                <form method="GET" action="{{ route( 'comment.delete', [$comment->id] ) }}">

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

                    <li>Created At:

                        {{ $comment->created_at->toFormattedDateString() }}

                    </li>

                    <li>Author By:

                        <a href="{{ route( 'profile', [$comment->author['email']] ) }}">{{  $comment->author['username']  }}</a>

                    </li>

                    <li>Comment:

                        {{ $comment->comment }}

                    </li>

                </ul>

            </li>

            @endforeach

        </ol>

    </li>

    <li>

        @include('forms.commentForm')

    </li>

</ul>  

@endforeach