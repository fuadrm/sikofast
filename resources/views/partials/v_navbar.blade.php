    <!-- Left navbar links -->
    
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        
        {{-- <li class="nav-item d-none d-sm-inline-block">
          <a href="/kontak" class="nav-link">Kontak</a>
        </li> --}}
      </ul>
  
      <!-- SEARCH FORM -->
  
      <!-- Right navbar links -->
      
      <ul class="navbar-nav ml-auto">
        
        @auth

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Welcome Back, {{ auth()->user()->username }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              {{-- <a class="dropdown-item" href="/dashboard">
                <i class="bi bi-layout-text-sidebar-reverse"></i>&ensp; My Dashboard</a> --}}
              <div class="dropdown-divider"></div>

              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="bi bi-box-arrow-in-left"></i>&ensp; Logout</button>
              </form>

              
            </div>
          </li>
        {{-- @else
          
          <a href="/login" class="btn btn-block btn-danger"><i class="bi bi-box-arrow-in-right"></i>&ensp; Login</a> --}}
        
        @endauth
        
      </ul>
          
      