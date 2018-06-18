@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">

                    User Post

                </div>

                <ol>

                    <li>Post id:

                        {{ $post->id }}

                    </li>

                    <li>Created at:

                        {{ $post->created_at->toFormattedDateString() }}

                    </li>

                    <li>Post:

                        <form method="get" action="{{ route('post.update',[Auth::user()->id]) }}">

                            @csrf

                            <div class="form-group">

                                <div class="col-md-6">

                                    <input class="form-control" type="text" name="post" id="post"  value="{{ $post->post }}">

                                    <input type="hidden"  name="post_id" value="{{ $post->id }}">

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

