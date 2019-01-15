<aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/josuebravo.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Josue Bravo</p>

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>


      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú principal</li>

        <li {{ request()->is('admin') ? 'class=active' : '' }}>
          <a href="{{url('admin')}}"><i class="fa fa-link"></i> <span>Dashboard</span></a>
        </li>

        <li {{ request()->is('admin/categories') ? 'class=active' : '' }}>
          <a href="{{route('admin.categories')}}"><i class="fa fa-link"></i> <span>Categorías</span></a>
        </li>

        <li class="treeview {{ request()->is('admin/products*') ? 'active' : '' }}">
          <a href=""><i class="fa fa-link"></i> <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li {{ request()->is('admin/products') ? 'class=active' : '' }} >
              <a href="{{route('admin.products')}}">Ver productos</a>
            </li>
          </ul>
        </li>

      </ul>

    </section>

</aside>