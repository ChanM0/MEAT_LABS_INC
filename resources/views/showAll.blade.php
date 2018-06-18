@extends('layouts.app')

<meta charset="utf-8">

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header"> <h5>

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

                <ol>

                    <li>Profile:

                        <a href="{{ route( 'profile', [Auth::user()->email] ) }}">

                            {{Auth::user()->First_Name}}

                            {{Auth::user()->Last_Name}}

                        </a>

                    </li> 

                    @include('layouts.allProfiles')

                </ol>

            </div>

        </div>

    </div>

</div>

</div>

@endsection