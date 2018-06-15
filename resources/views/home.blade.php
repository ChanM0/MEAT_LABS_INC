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
                            You are logged in!
                        </li>
                        <li>
                            <p hidden>
                                {{-- {{$email = Auth::user()->email}} --}}
                            </p>
                            {{-- <a href="{{route('profile')}}">Profile</a> --}}
                            {{-- <a href="{{ route( 'profile', [$email] ) }}">{{Auth::user()->First_Name}}  {{Auth::user()->Last_Name}} Profile</a> --}}
                            <a href="{{ route( 'profile', [Auth::user()->email] ) }}">{{Auth::user()->First_Name}}  {{Auth::user()->Last_Name}} Profile</a>
                        </li> 
                    </ol>                    
                    
                </div>
            </div>
            
        </div>

    </div>
</div>
@endsection

 {{-- @if (Auth::check())
            @if (!(is_null( $bio = App\UserBiography::find(Auth::user()->id)->first() )))
            {{$bio->biography}}
            @endif
            @endif --}}