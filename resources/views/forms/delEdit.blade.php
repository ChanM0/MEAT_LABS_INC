    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Edit/Delete
    </button>
    <div class="dropdown-menu">
        <form method="POST" action="{{ route( 'destroy', [Auth::user()->id] ) }}">
            @csrf
            {{-- <input type="hidden" name="email" value="{{Auth::user()->email}}" > --}}
            <input class="dropdown-item" type="submit" value="Delete">
        </form>
        <div class="dropdown-divider"></div>
        <form method="GET" action="{{ route( 'bio.edit', [Auth::user()->id] ) }}">
            @csrf
            <input class="dropdown-item" type="submit" value="Edit">
        </form>
    </div>
