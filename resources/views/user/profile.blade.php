@extends('layouts.app')

<meta charset="utf-8">

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">

                    <h5>

                        Logged in as: 

                        {{Auth::user()->First_Name}}

                        {{Auth::user()->Last_Name}} 

                    </h5>

                    @if (Auth::user()->admin === 0)

                    <h5>NOT Admin</h5>

                    @else

                    <h5>Admin</h5>

                    @endif

                </div>

                <div class="card-body">

                    @if (session('status'))

                    <div class="alert alert-success">

                        {{ session('status') }}

                    </div>

                    @endif

                    <h3>

                        Profile:

                        <li>

                            @if (Auth::user()->admin === 1)

                            <div class="btn-group">




                                @if (Auth::user()->id !== $user->id)

                                <button autofocus type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    Delete/Make Admin

                                </button>

                                @else

                                <button autofocus type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    Delete

                                </button>

                                @endif

                                <div class="dropdown-menu">

                                    <form method="post" action="{{ route( 'user.delete', [Auth::user()->id] ) }}">

                                        @csrf

                                        <input class="dropdown-item" type="submit" value="Delete">

                                    </form>

                                    @if (Auth::user()->id !== $user->id)

                                    <form method="Post" action="{{ route( 'user.admin', [Auth::user()->id] ) }}">

                                        @csrf

                                        <input class="dropdown-item" type="submit" value="Make Admin">

                                    </form>
                                    
                                    @endif

                                </div>

                            </div>

                            @endif 

                        </li>

                        <li>User Id:

                            {{ $user->id }}

                        </li>

                        <li>Name:

                            {{ $user->First_Name }}

                            {{ $user->Last_Name }}

                        </li>

                    </h3>

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

                            @if (!is_null($bio))

                            {{ $bio->biography }}

                            @endif

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

                        @if (Auth::user()->id === $user->id)
                        <li>

                            {{-- prints posts form--}}
                            @include('forms.postForm')

                        </li>
                        @endif

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