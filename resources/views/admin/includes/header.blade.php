  <header class="main-header">

    <a href="index2.html" class="logo">
      <span class="logo-mini"><b>E</b>S</span>
      <span class="logo-lg"><b>{{ config('app.name', 'Electro Shop') }}</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown notifications-menu">
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-success">10</span>
            </a>

            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>

                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>

                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>

          </li>

          
          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('dist/img/josuebravo.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>

            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="{{asset('dist/img/josuebravo.png')}}" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::user()->name }} - Web Developer
                  <small>Administrador</small>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar sesión</a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </li>
            </ul>

          </li>

        </ul>
      </div>
    </nav>
  </header>