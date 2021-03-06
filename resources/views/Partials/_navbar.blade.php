 
<!-- default bootstrap navbar-->

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Rent and Ride</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item @yield('Home')"> <a class="nav-link" href="/">Home</a></li>
      <li class="nav-item @yield('Search')"> <a class="nav-link" href="/cars">Find A Car</a></li>
      <li class="nav-item @yield('Garage')"><a class="nav-link" href="/garage">Garage</a></li>
    </ul>

    <ul class="navbar-nav navbar-right">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
        @guest
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/login">Login</a>
            <a class="dropdown-item" href="/register">Register</a>
          </div>
        @else
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/settings">My Settings</a>
            <a class="dropdown-item" href="/messages">My Messages</a>
            <a class="dropdown-item" href="/transactions">My transactions</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
             
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        @endguest

      </li>
    </ul>


  </div>
</nav>