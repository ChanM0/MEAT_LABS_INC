<!DOCTYPE html>
<html>
<head>
	<title>
		Welcome
	</title>
</head>
<body>
	<h1>Welcome to MEAT LABS INC.</h1>

	<h5>
		Here is your information, new User.
	</h5>

	<ol>
		<li>
			{{ $user->First_Name }}
			{{ $user->Last_Name }}
		</li>
		<li>
			{{ $user->email }}
		</li>
</ol>

</body>
</html>



