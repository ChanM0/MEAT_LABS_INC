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

                    <form method="get" action="{{ route('biography.update') }}">

                        @csrf

                        <div class="form-group">

                            <label for="biography" class="col-md-4 col-form-label">

                                User Biography

                            </label>

                            <textarea class="form-control" id="biography" name="biography" rows="3">

                                {{ $userBio->biography }}

                            </textarea>

                            <input type="hidden"  name="user_id" value="{{ $user_id }}">

                        </div>

                        {{-- Update Button --}}

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

