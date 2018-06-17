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
                    <h1>
                        {{Auth::user()->First_Name}}
                        {{Auth::user()->Last_Name}} 
                    </h1>
                    
                    @if (Auth::user()->admin === 0)
                    <h1>NOT Admin</h1>
                    @endif
                    {{-- User is able to Post --}}
                    @if (Auth::user()->id === $user->id)
                    @include('forms.postForm')
                    @endif
                    
                    <ol>
                        <li class="liMargin">
                            User Name: 
                            {{  $user->username  }}
                            @if (Auth::user()->id === $user->id)
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Edit
                                </button>
                                <div class="dropdown-menu">
                                    <form method="GET" action="{{ route( 'username.edit', [Auth::user()->id] ) }}">
                                        @csrf
                                        <input class="dropdown-item" type="submit" value="Edit">
                                    </form>
                                </div>
                            </div>
                            @endif 
                        </li>
                        
                        <li class="liMargin"> Biography:  
                            {{ $bio->biography }}
                            {{-- Bio Edit --}}
                            @if (Auth::user()->id === $user->id)
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Delete/Edit
                                </button>
                                <div class="dropdown-menu">
                                    <form method="POST" action="{{ route( 'bio.delete', [Auth::user()->id] ) }}">
                                        @csrf
                                        <input class="dropdown-item" type="submit" value="Delete">
                                    </form>
                                    <div class="dropdown-divider"></div>
                                    <form method="GET" action="{{ route( 'biography.edit', [Auth::user()->id] ) }}">
                                        @csrf
                                        <input class="dropdown-item" type="submit" value="Edit">
                                    </form>
                                </div>
                            </div>
                            @endif 
                        </li>
                        <li class="liMargin">
                            First Name:
                            {{ $user->First_Name }}
                        </li> 
                        <li class="liMargin">
                            Last Name:
                            {{ $user->Last_Name }}
                        </li> 
                        <li class="liMargin">
                            {{-- prints posts --}}
                            Posts:
                            @include('layouts.postComment')           
                        </li>   
                    </ol>                    
                    
                </div>
            </div>
            
        </div>

    </div>
</div>
@endsection