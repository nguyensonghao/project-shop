<!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>{{trans('admin.manager')}}</h3>
      <ul class="nav side-menu">
      
        <li>
          <a><i class="fa fa-shopping-bag"></i> {{trans('admin.product')}} <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('admin.product.list')}}">{{trans('admin.list')}}</a></li>
            <li><a href="{{route('admin.product.add')}}">{{trans('admin.add')}}</a></li>
          </ul>
        </li>

        <li>
          <a><i class="fa fa-suitcase"></i> {{trans('admin.category')}} <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('admin.category.list')}}">{{trans('admin.list')}}</a></li>
            <li><a href="{{route('admin.category.add')}}">{{trans('admin.add')}}</a></li>
          </ul>
        </li>

        <li>
          <a><i class="fa fa-tags"></i> {{trans('admin.label')}} <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('admin.label.list')}}">{{trans('admin.list')}}</a></li>
            <li><a href="{{route('admin.label.add')}}">{{trans('admin.add')}}</a></li>
          </ul>
        </li>

        <li>
          <a><i class="fa fa-user"></i> {{trans('admin.user')}} <span class="fa fa-chevron-down"></span> </a>
          <ul class="nav child_menu">
            <li><a href="general_elements.html">{{trans('admin.list')}}</a></li>
            <li><a href="media_gallery.html">{{trans('admin.add')}}</a></li>
          </ul>
        </li>

        <li>
          <a><i class="fa fa-cart-plus"></i> {{trans('admin.cart')}} <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="tables.html">{{trans('admin.list')}}</a></li>
          </ul>
        </li>

        <li>
          <a><i class="fa fa-newspaper-o"></i> {{trans('admin.article')}} <span class="fa fa-chevron-down"></span>
        </a>
          <ul class="nav child_menu">
            <li><a href="chartjs.html">{{trans('page.list')}}</a></li>
            <li><a href="chartjs2.html">{{trans('page.add')}}</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="menu_section">
      <h3>{{trans('admin.setting')}}</h3>
      <ul class="nav side-menu">
        <li>
          <a><i class="fa fa-desktop"></i> {{trans('admin.interface')}} <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="e_commerce.html">{{trans('admin.general')}}</a></li>
            <li><a href="projects.html">{{trans('admin.slider')}}</a></li>
          </ul>
        </li>
        <li>
          <a><i class="fa fa-windows"></i> {{trans('admin.config')}} <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="page_403.html">403 Error</a></li>
            <li><a href="page_404.html">404 Error</a></li>
            <li><a href="page_500.html">500 Error</a></li>
            <li><a href="plain_page.html">Plain Page</a></li>
            <li><a href="login.html">Login Page</a></li>
            <li><a href="pricing_tables.html">Pricing Tables</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>