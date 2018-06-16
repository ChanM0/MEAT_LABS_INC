@extends('layouts.app')

<meta charset="utf-8">

{{-- <input type="text" class="col-md-4 form-control" id="edit" placeholder="Enter edit" name="edit" autofocus> --}}

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
                    @if (Auth::user()->admin === 0)
                        <h1>NOT Admin</h1>
                        <!-- Example single danger button -->
                    @endif
                    {{-- User Post --}}
                    @if (Auth::user()->id === $user->id)
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
                    @endif
                    
                    <ol>
                        <li>
                            User Name: {{  $user->username  }}
                        </li>
                        <li> Biography:  
                            {{ $bio->biography }}
                                {{-- Bio Edit --}}
                                @if (Auth::user()->id === $user->id)
                                    <div class="btn-group">
                                        @include('forms.delEdit')
                                         
                                @endif 
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
                            {{-- prints posts --}}
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
                                                    <label for="comment">{{ __('Comment') }}</label>
                                                    <input type="input" class="col-md-4 form-control" id="comment" placeholder="Enter comment" name="comment" autofocus>
                                                </div>
                                                <input type="hidden"  name="user_id" value="{{Auth::user()->id}}" >
                                                <input type="hidden"  name="post_id" value="{{ $post->id }}" >
                                                {{-- <input type="hidden"  name="email" value="{{Auth::user()->email}}"> --}}
                                                <input type="hidden"  name="url" value="{{url()->current()}}">

                                                <input type="submit" value="Comment">
                                            </form>
                                        </li>
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