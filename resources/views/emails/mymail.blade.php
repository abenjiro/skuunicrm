<h1>Hello {{$user['name']}}</h1>
<p>Please click the link below for verification of your email {{$user['email']}}</p>
<p>Your login password is: {{  $user->getOriginal('password') }}</p>
<a href="{{ url('/verification', $user->verification->token)}}">Verify Email</a>