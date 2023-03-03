<h1>Admin Page</h1>
<h1>Name :{{ Auth::user()->name }}</h1>
<h1>E-mail :{{ Auth::user()->email }}</h1>
<h1>Role :{{ Auth::user()->role }}</h1>
<a class="btn btn-danger" type="button" href="{{ route('logout') }}">Logout</a>