    <div class="dropdown-menu">
        <form method="POST" action="{{ route( 'delete', [Auth::user()->id] ) }}">
            @csrf
            <input class="dropdown-item" type="submit" value="Delete">
        </form>
        <div class="dropdown-divider"></div>
        <form method="GET" action="{{ route( 'biography.edit', [Auth::user()->id] ) }}">
            @csrf
            <input class="dropdown-item" type="submit" value="Edit">
        </form>
    </div>
