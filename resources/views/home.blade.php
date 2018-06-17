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
                            <a href="{{ route( 'profile', [Auth::user()->email] ) }}">{{Auth::user()->First_Name}}  {{Auth::user()->Last_Name}} Profile</a>
                        </li> 
                        <li>
                            <div class="row justify-content-center">
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
                                    @endif
                                    {{-- User is able to Post --}}
                                    <li>
                                        @include('forms.postForm')
                                    </li>
                                    <li>
                                        {{-- prints posts --}}
                                        MAIN FORUM:
                                        @include('layouts.postComment')           
                                    </li>      
                                </div>
                            </div>          
                        </li>   
                    </ol>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection