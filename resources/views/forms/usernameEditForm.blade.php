@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">

                    User Biography

                </div>

                <div class="card-body">

                    <form method="GET" action="{{ route('username.update') }}">

                        @csrf

                        <div class="form-group">

                            <label for="username" class="col-md-4 col-form-label">

                                Username

                            </label>

                            <input class="form-control" id="username" name="username" rows="3" value="{{ $user->username }}">

                            <input type="hidden"  name="user_id" value="{{ $id }}">
                            
                        </div>

                        <div class="form-group row mb-0">

                            <div class="col-md-6 offset-md-9">

                                <button type="submit" class="btn btn-primary">

                                    Update

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

