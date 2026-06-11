<form method="POST" action="/login">

@csrf

<input 
type="text"
name="user_name"
placeholder="Username">

<input 
type="password"
name="password"
placeholder="Password">

<button>

Login

</button>

@if(session('error'))

{{ session('error') }}

@endif

</form>