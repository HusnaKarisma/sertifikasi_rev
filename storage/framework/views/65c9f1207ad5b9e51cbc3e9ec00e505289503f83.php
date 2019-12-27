<header id="header" class="new-header">

  <!-- top header -->
  <!-- on web -->
  <div class="header-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
       <a href="/" class="navbar-brand">
        <img src="<?php echo e(asset("images/logo-star.png")); ?>" alt="<?php echo e(CRUDBooster::getSetting('page_title')); ?>" class="logo hidden-xs">
        <span class="logo-text hidden-xs">
          <span class="title"><?php echo e(CRUDBooster::getSetting('page_title')); ?></span>
          <span class="tagline"><?php echo e(CRUDBooster::getSetting('tagline')); ?></span>
        </span>
       </a>
      </div>
      <div class="navbar-top">
        <ul id="menu-top-menu" class="list-inline header-menu hidden-sm hidden-xs">
          <li class="col-md-12 col-sm-12 col-xs-12">
            <form action="/search" method="get" name="searchform" class="search-form" target="_blank">
                <input name="lookfor" type="text" class="form-control" placeholder="Cari...">
              <i class="fa fa-search"></i>
            </form>
            
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- end on web -->
  <!-- end top header -->

  <!-- navbar -->
  <!-- mobile mode -->
  <nav class="navbar navbar-default ">
    <div class="container">
      <div class="navbar-header visible-xs visible-sm mobile-mode">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-nav">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="/" class="navbar-brand">
          <span class="logo-text visible-xs">
            <!-- <span class="title">Perpustakaan Nasional Republik Indonesias</span> -->
            <img src="<?php echo e(asset("images/logo-star.png")); ?>" alt="Perpustakaan Nasional Republik Indonesia" class="logo">
            <span class="logo-text">
              <span class="title"><?php echo e(CRUDBooster::getSetting('page_title')); ?></span>
            </span>
          </span>
         </a>
      </div>

      <div class="collapse navbar-collapse" id="header-nav">

        <!-- on mobile -->
        <ul class="nav navbar-nav nav-left list-inline header-menu hidden-md hidden-lg">    ​
          <li class="col-md-12 col-sm-12 col-xs-12">
            <form action="/search" method="get" name="searchform" class="search-form" target="_blank">
                <input name="lookfor" type="text" class="form-control" placeholder="Cari...">
              <i class="fa fa-search"></i>
            </form>
          </li>
        </ul>

        <!-- menu -->
        <ul id="menu-primary-menu" class="nav navbar-nav navbar-right">

          <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown"><a title="Organisasi" href="#" class="dropdown-toggle" aria-haspopup="true">Informasi</a><span class="mobile-arrow"><i class="fa fa-chevron-right"></i></span>
            <ul role="menu" class=" dropdown-menu">
              <li class="megamenu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown"><a title="megamenu" href="#">megamenu</a>
                <ul role="menu" class=" dropdown-menu">
                  <li class="column-2-3 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown"><a title="column-1-2" href="#">column-1-2</a>
                    <ul role="menu" class=" dropdown-menu">
                      <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown"><h4 class="dropdown-header">Informasi</h4>
                        <ul role="menu" class=" dropdown-menu">
                          
                          <?php echo app(\Imanghafoori\Widgets\Utils\WidgetRenderer::class)->renderWidget('NavbarMenu'); ?>
                          
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="column-1-3 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown"><a title="column-2-2" href="#">column-2-2</a>
                    <ul role="menu" class=" dropdown-menu">
                      <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown"><h4 class="dropdown-header">Registrasi</h4>
                        <ul role="menu" class=" dropdown-menu">
                          <li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="Form Registrasi" href="register">Formulir Pendaftaran</a></li>
                          <li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="Form Registrasi" href="forgot">Lupa Password</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          
          <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-445 dropdown">
            <a title="Aktifitas" href="#" class="dropdown-toggle" aria-haspopup="true">Berita</a><span class="mobile-arrow"><i class="fa fa-chevron-right"></i></span>
            <ul role="menu" class=" dropdown-menu">
              <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-19 current_page_item current_page_parent"><a title="Berita" href="http://perpusnas.go.id/berita/">Pengumuman</a></li>
            </ul>
          </li>

          <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-445 dropdown">
            <a title="Aktifitas" href="/admin" class="dropdown-toggle" aria-haspopup="true">Login</a><span class="mobile-arrow"><i class="fa fa-chevron-right"></i></span>
          </li>
        </ul>
        <!-- end menu -->

        <!-- on web -->
        <ul class="nav navbar-nav nav-left show-fixed">

          <div class="hidden-md hidden-lg">
            <li class="col-md-12 col-sm-12 col-xs-12">
              <form action="/search" method="get" name="searchform" class="search-form" target="_blank">
                <input name="lookfor" type="text" class="form-control" placeholder="Apa yang Anda cari..."><i class="fa fa-search"></i>
              </form>
            </li>
          </div>

          <li>
            <a href="/" class="navbar-brand">
              <img src="<?php echo e(asset("images/logo-star.png")); ?>" alt="<?php echo e(CRUDBooster::getSetting('page_title')); ?>" class="logo">
              <span class="logo-text hidden-xs">
                <span class="title"><?php echo e(CRUDBooster::getSetting('page_title')); ?></span>
              </span>
            </a>
          </li>
        </ul>
      </div>

      <!-- on web -->
      <div class="pm-search-container" id="pm-search-container">    
        <div class="container">
          <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-2">
              <ul class="pm-search-controls">
                <li><a href="#" id="pm-desktop-search-btn"><i class="fa fa-search"></i></a></li>                    
              </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-10">
              <select name="search-source" class="form-control">
                <option value="/id/">Situs Ini</option>
                <option value="http://onesearch.perpusnas.go.id/Search/Results">Perpusnas</option>
                <option value="http://onesearch.id/Search/Results">OneSearch</option>
              </select>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-10">
              <form action="http://onesearch.perpusnas.go.id/Search/Results" method="get" name="searchform" class="search-form" id="pm-desktop-searchform" target="_blank">
                <input name="lookfor" type="text" class="pm-search-field-header" placeholder="Apa yang Anda cari..."> 
              </form>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <ul class="pm-search-controls">
                <li><a href="#" id="pm-search-collapse"><i class="fa fa-times"></i></a></li>
              </ul>
            </div>
          </div>
        </div>      
      </div>
    </div>
  </nav>
</header>