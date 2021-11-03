<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
  <!-- Plugins -->
  <link href="/vendor/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="/vendor/bootstrap5/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/vendor/bootstrap5/dist/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="/css/admin/style.css" rel="stylesheet" />
  <link href="/css/admin/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!--Theme Styles-->
  <link href="/css/admin/dark-theme.css" rel="stylesheet" />
  <link href="/css/admin/light-theme.css" rel="stylesheet" />
  <link href="/css/admin/semi-dark.css" rel="stylesheet" />
  <link href="/css/admin/header-colors.css" rel="stylesheet" />

  <title>Skodash - Bootstrap 5 Admin Template</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
    <header class="top-header">
      <nav class="navbar navbar-expand">
        <div class="mobile-toggle-icon d-xl-none">
          <i class="bi bi-list"></i>
        </div>
        <div class="top-navbar d-none d-xl-block">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="app-emailbox.html">Email</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:;">Projects</a>
            </li>
            <li class="nav-item d-none d-xxl-block">
              <a class="nav-link" href="javascript:;">Events</a>
            </li>
            <li class="nav-item d-none d-xxl-block">
              <a class="nav-link" href="app-to-do.html">Todo</a>
            </li>
          </ul>
        </div>
        <div class="top-navbar-right ms-3 ms-auto">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item dropdown dropdown-large">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="user-setting d-flex align-items-center gap-1">
                  <img src="assets/images/avatars/avatar-1.png" class="user-img" alt="">
                  <div class="user-name d-none d-sm-block">Jhon Deo</div>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <img src="assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="60"
                        height="60">
                      <div class="ms-3">
                        <h6 class="mb-0 dropdown-user-name">Jhon Deo</h6>
                        <small class="mb-0 dropdown-user-designation text-secondary">HR Manager</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item" href="pages-user-profile.html">
                    <div class="d-flex align-items-center">
                      <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                      <div class="setting-text ms-3"><span>Profile</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="setting-icon"><i class="bi bi-gear-fill"></i></div>
                      <div class="setting-text ms-3"><span>Setting</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="index2.html">
                    <div class="d-flex align-items-center">
                      <div class="setting-icon"><i class="bi bi-speedometer"></i></div>
                      <div class="setting-text ms-3"><span>Dashboard</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="setting-icon"><i class="bi bi-piggy-bank-fill"></i></div>
                      <div class="setting-text ms-3"><span>Earnings</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="setting-icon"><i class="bi bi-cloud-arrow-down-fill"></i></div>
                      <div class="setting-text ms-3"><span>Downloads</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item" href="authentication-signup-with-header-footer.html">
                    <div class="d-flex align-items-center">
                      <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                      <div class="setting-text ms-3"><span>Logout</span></div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!--end top header-->

    <!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="true">
      <div class="sidebar-header">
        <div>
          <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
          <h4 class="logo-text">Skodash</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
        </div>
      </div>
      <!--navigation-->
      <ul class="metismenu" id="menu">
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-grid"></i>
            </div>
            <div class="menu-title">Application</div>
          </a>
          <ul class="mm-collapse">
            <li> <a href=""><i class="bi bi-arrow-right-short"></i>Email</a>
            </li>
            <li> <a href=""><i class="bi bi-arrow-right-short"></i>Chat Box</a>
            </li>
            <li> <a href=""><i class="bi bi-arrow-right-short"></i>File Manager</a>
            </li>
            <li> <a href=""><i class="bi bi-arrow-right-short"></i>Todo List</a>
            </li>
            <li> <a href=""><i class="bi bi-arrow-right-short"></i>Invoice</a>
            </li>
            <li> <a href=""><i class="bi bi-arrow-right-short"></i>Calendar</a>
            </li>
          </ul>
        </li>
        <li class="menu-label">Pages</li>
        <li>
          <a href="">
            <div class="parent-icon"><i class="bi bi-person-check"></i>
            </div>
            <div class="menu-title">User Profile</div>
          </a>
        </li>
        <li>
          <a href="">
            <div class="parent-icon"><i class="bi bi-collection-play"></i>
            </div>
            <div class="menu-title">Timeline</div>
          </a>
        </li>
      </ul>
      <!--end navigation-->
    </aside>
    <!--end sidebar -->

    <!--start content-->
    <main class="page-content">



    </main>
    <!--end page main-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    <div class="switcher-body">
      <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
          class="bi bi-paint-bucket me-0"></i></button>
      <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false"
        tabindex="-1" id="offcanvasScrolling">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <h6 class="mb-0">Theme Variation</h6>
          <hr>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1"
              checked>
            <label class="form-check-label" for="LightTheme">Light</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
            <label class="form-check-label" for="DarkTheme">Dark</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
            <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
          </div>
          <hr>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3">
            <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
          </div>
          <hr />
          <h6 class="mb-0">Header Colors</h6>
          <hr />
          <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
              <div class="col">
                <div class="indigator headercolor1" id="headercolor1"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor2" id="headercolor2"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor3" id="headercolor3"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor4" id="headercolor4"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor5" id="headercolor5"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor6" id="headercolor6"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor7" id="headercolor7"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor8" id="headercolor8"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end switcher-->

  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="/vendor/bootstrap5/dist/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/vendor/metismenu/js/metisMenu.min.js"></script>
  <!--app-->
  <script src="/js/app.js"></script>

</body>

</html>