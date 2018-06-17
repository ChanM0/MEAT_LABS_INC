@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">

                    User Comment

                </div>

                <ol>

                    <li>Comment id:

                        {{ $comment->id }}

                    </li>

                    <li>Comment:

                        {{ $comment->comment }}

                    </li>                    

                    <li>Created At:

                        {{ $comment->created_at->toFormattedDateString() }}

                    </li>

                    <li>Comment:

                        <form method="get" action="{{ route( 'comment.update', [$comment->id]) }}">

                            @csrf

                            <div class="form-group">

                                <div class="col-md-6">

                                    <input class="form-control" type="text" name="comment" id="comment"  value="{{ $comment->comment }}">

                                    <input type="hidden"  name="user_id" value="{{ $comment->user_id }}">

                                    <input type="hidden"  name="post_id" value="{{ $comment->id }}">

                                </div>

                            </div>

                            <div class="form-group row mb-0">

                                <div class="col-md-6 offset-md-9">

                                    <button type="submit" class="btn btn-primary">

                                        Update

                                    </button>

                                </div>

                            </div>

                        </form>

                    </li>

                </ol>

            </div>

        </div>

    </div>

</div>

@endsection

