@extends('layouts.app')

<meta charset="utf-8">

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{Auth::user()->First_Name}}
                    {{Auth::user()->Last_Name}} 
                    <ol>
                        <li>
                            User Name: {{  $user->username  }}
                        </li>
                        <li> Biography:  
                            {{ $bio->biography }}    
                        </li>
                        <li>
                            First Name:
                           {{ $user->First_Name }}
                        </li> 
                        <li>
                            Last Name:
                           {{ $user->Last_Name }}
                        </li> 
                        <li>
                            Posts:
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
                                                                {{ $comment->created_at }}
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
                                            <form method="POST" action="#">
                                                <div class="form-group">
                                                    <label for="comment">{{ __('Comment') }}</label>
                                                    <input type="input" class="col-md-4 form-control" id="comment" placeholder="Enter comment" name="comment" autofocus>
                                                </div>
                                                <input type="submit" value="Comment">
                                            </form>
                                        </li>

                                       {{-- {{ $comments }} --}}
                                    </ul>     
                                @endforeach
                        </li>   
                    </ol>                    
                    
                </div>
            </div>
            
        </div>

    </div>
</div>
@endsection