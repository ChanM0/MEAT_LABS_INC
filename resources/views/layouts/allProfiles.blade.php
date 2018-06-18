

@foreach ($profiles as $user)

<li>

    <ul>

        <li>User Id:

            {{$user->id}}

        </li>

        <li>First Name:

            {{$user->First_Name}}

        </li>

        <li>Last Name:

            {{$user->Last_Name}}

        </li>

        <li>Username:

            <a href="{{ route( 'profile', [$user['email']] ) }}">

                {{$user->username}}

            </a>

        </li>

    </ul> 

</li>

@endforeach

