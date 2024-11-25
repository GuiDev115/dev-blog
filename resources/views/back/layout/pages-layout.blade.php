<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>@yield('pageTitle')</title>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site favicon -->
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="/images/site/{{ isset (settings()->site_favicon) ? settings()->site_favicon : '' }}"
    />

    <!-- Mobile Specific Metas -->
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/core.css" />
    <link
        rel="stylesheet"
        type="text/css"
        href="/back/vendors/styles/icon-font.min.css"
    />
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/style.css" />
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.14.1/jquery-ui.min.css">
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.14.1/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.14.1/jquery-ui.theme.min.css">

    @kropifyStyles
    @stack('stylesheets')
</head>
<body>

<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div
            class="search-toggle-icon bi bi-search"
            data-toggle="header_search"
        ></div>
        <div class="header-search">
            <form>
                <div class="form-group mb-0">
                    <i class="dw dw-search2 search-icon"></i>
                    <input
                        type="text"
                        class="form-control search-input"
                        placeholder="Search Here"
                    />
                    <div class="dropdown">
                        <a
                            class="dropdown-toggle no-arrow"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                        >
                            <i class="ion-arrow-down-c"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label"
                                >From</label
                                >
                                <div class="col-sm-12 col-md-10">
                                    <input
                                        class="form-control form-control-sm form-control-line"
                                        type="text"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                <div class="col-sm-12 col-md-10">
                                    <input
                                        class="form-control form-control-sm form-control-line"
                                        type="text"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label"
                                >Subject</label
                                >
                                <div class="col-sm-12 col-md-10">
                                    <input
                                        class="form-control form-control-sm form-control-line"
                                        type="text"
                                    />
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a
                    class="dropdown-toggle no-arrow"
                    href="javascript:;"
                    data-toggle="right-sidebar"
                >
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-notification">
            <div class="dropdown">
                <a
                    class="dropdown-toggle no-arrow"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                >
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="/back/vendors/images/img.jpg" alt="" />
                                    <h3>John Doe</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/back/vendors/images/photo1.jpg" alt="" />
                                    <h3>Lea R. Frith</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/back/vendors/images/photo2.jpg" alt="" />
                                    <h3>Erik L. Richards</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/back/vendors/images/photo3.jpg" alt="" />
                                    <h3>John Doe</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/back/vendors/images/photo4.jpg" alt="" />
                                    <h3>Renee I. Hansen</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/back/vendors/images/img.jpg" alt="" />
                                    <h3>Vicki M. Coleman</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @livewire('admin.top-user-info')
        <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"
            ><img src="/back/vendors/images/github.svg" alt=""
                /></a>
        </div>
    </div>
</div>

<div class="right-sidebar">
    <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
            Layout Settings
            <span class="btn-block font-weight-400 font-12"
            >User Interface Settings</span
            >
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
            <i class="icon-copy ion-close-round"></i>
        </div>
    </div>
    <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
            <h4 class="weight-600 font-18 pb-10">Header Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a
                    href="javascript:void(0);"
                    class="btn btn-outline-primary header-white active"
                >White</a
                >
                <a
                    href="javascript:void(0);"
                    class="btn btn-outline-primary header-dark"
                >Dark</a
                >
            </div>

            <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a
                    href="javascript:void(0);"
                    class="btn btn-outline-primary sidebar-light"
                >White</a
                >
                <a
                    href="javascript:void(0);"
                    class="btn btn-outline-primary sidebar-dark active"
                >Dark</a
                >
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
            <div class="sidebar-radio-group pb-10 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebaricon-1"
                        name="menu-dropdown-icon"
                        class="custom-control-input"
                        value="icon-style-1"
                        checked=""
                    />
                    <label class="custom-control-label" for="sidebaricon-1"
                    ><i class="fa fa-angle-down"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebaricon-2"
                        name="menu-dropdown-icon"
                        class="custom-control-input"
                        value="icon-style-2"
                    />
                    <label class="custom-control-label" for="sidebaricon-2"
                    ><i class="ion-plus-round"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebaricon-3"
                        name="menu-dropdown-icon"
                        class="custom-control-input"
                        value="icon-style-3"
                    />
                    <label class="custom-control-label" for="sidebaricon-3"
                    ><i class="fa fa-angle-double-right"></i
                        ></label>
                </div>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
            <div class="sidebar-radio-group pb-30 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebariconlist-1"
                        name="menu-list-icon"
                        class="custom-control-input"
                        value="icon-list-style-1"
                        checked=""
                    />
                    <label class="custom-control-label" for="sidebariconlist-1"
                    ><i class="ion-minus-round"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebariconlist-2"
                        name="menu-list-icon"
                        class="custom-control-input"
                        value="icon-list-style-2"
                    />
                    <label class="custom-control-label" for="sidebariconlist-2"
                    ><i class="fa fa-circle-o" aria-hidden="true"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebariconlist-3"
                        name="menu-list-icon"
                        class="custom-control-input"
                        value="icon-list-style-3"
                    />
                    <label class="custom-control-label" for="sidebariconlist-3"
                    ><i class="dw dw-check"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebariconlist-4"
                        name="menu-list-icon"
                        class="custom-control-input"
                        value="icon-list-style-4"
                        checked=""
                    />
                    <label class="custom-control-label" for="sidebariconlist-4"
                    ><i class="icon-copy dw dw-next-2"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebariconlist-5"
                        name="menu-list-icon"
                        class="custom-control-input"
                        value="icon-list-style-5"
                    />
                    <label class="custom-control-label" for="sidebariconlist-5"
                    ><i class="dw dw-fast-forward-1"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebariconlist-6"
                        name="menu-list-icon"
                        class="custom-control-input"
                        value="icon-list-style-6"
                    />
                    <label class="custom-control-label" for="sidebariconlist-6"
                    ><i class="dw dw-next"></i
                        ></label>
                </div>
            </div>

            <div class="reset-options pt-30 text-center">
                <button class="btn btn-danger" id="reset-settings">
                    Reset Settings
                </button>
            </div>
        </div>
    </div>
</div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="/">
            <img src="/images/site/{{ isset (settings()->site_logo) ? settings()->site_logo : '' }}" alt="" class="dark-logo site_logo" />
            <img
                src="/images/site/{{ isset (settings()->site_logo) ? settings()->site_logo : '' }}"
                alt=""
                class="light-logo site_logo"
            />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle no-arrow {{ Route::is('admin.dashboard') ? 'active' : '' }}">
								<span class="micon fa fa-home"></span
                                ><span class="mtext">Home</span>
                    </a>
                </li>
                @if (auth()->user()->type == 'superAdmin')
                <li>
                    <a href="{{ route('admin.categories') }}" class="dropdown-toggle no-arrow" {{ Route::is('admin.categories') ? 'active' : '' }}>
                        <span class="micon fa fa-list"></span
                        <span class="mtext">Categorias</span>
                            </a>
                        </li>
                @endif


                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
								<span class="micon fa fa-newspaper-o"></span
                                ><span class="mtext"> Posts </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="">Novo</a></li>
                        <li><a href="">Posts</a></li>
                    </ul>
                </li>

                @if (auth()->user()->type == 'superAdmin')
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
								<span class="micon fa fa-shopping-bag"></span
                                ><span class="mtext">Shop</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="">Novo Produto</a></li>
                        <li><a href="">Todos Produto</a></li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="invoice.html" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-receipt-cutoff"></span><span class="mtext">Invoice</span>
                    </a>
                </li>

                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <div class="sidebar-small-cap">Config.</div>
                </li>

                <li>
                    <a
                        href="{{ route('admin.profile')}}"
                        class="dropdown-toggle no-arrow {{ Route::is('admin.profile') ? 'active' : '' }}"
                    >
                        <span class="micon fa fa-user-circle"></span>
                        <span class="mtext"
                        >Perfil
                        </span>
                    </a>
                </li>


                @if (auth()->user()->type == 'superAdmin')
                <li>
                    <a
                        href="{{ route('admin.settings')}}"
                        class="dropdown-toggle no-arrow {{ Route::is('admin.settings') ? 'active' : '' }}"
                    >
                        <span class="micon fa fa-cogs"></span>
                        <span class="mtext"
                        >Geral
                        </span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">

            <div class="">

                @yield('content')
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By
            <a href="https://github.com/dropways" target="_blank"
            >Ankit Hingarajiya</a
            >
        </div>
    </div>
</div>

<!-- js -->
<script src="/back/vendors/scripts/core.js"></script>
<script src="/back/vendors/scripts/script.min.js"></script>
<script src="/back/vendors/scripts/process.js"></script>
<script src="/back/vendors/scripts/layout-settings.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/extra-assets/jquery-ui-1.14.1/jquery-ui.min.js"></script>

@kropifyScripts
@stack('scripts')
<script>
    // Define the notifa function

    $.fn.notifa = function(options) {
        var settings = $.extend({
            vers: 2,
            cssClass: 'sucess',
            message: 'Foto atualizada',
            time: 3000
        }, options);

        // Use SweetAlert2 to show the notification
        Swal.fire({
            icon: settings.cssClass,
            text: settings.message,
            timer: settings.time,
            showConfirmButton: false,
            timerProgressBar: true,
            toast: true,
            color: 'white',
            background: 'green',
            position: 'top-end'
        });
    };

    // Event listener for showToastr
    window.addEventListener('showToastr', function(event) {
        $().notifa({
            vers: 2,
            cssClass: event.detail[0].type,
            message: event.detail[0].message,
            time: 3000
        });
    });

    function updateLogo(imagePath) {
        const logoElements = document.querySelectorAll('.site_logo');
        logoElements.forEach(logo => {
            logo.src = '/' + imagePath + '?' + new Date().getTime(); // Add timestamp to force refresh
        });
    }

    // Example of how to call the updateLogo function after a successful logo update
    // This should be called in the AJAX success callback after the logo is updated
    window.addEventListener('logoUpdated', function(event) {
        updateLogo(event.detail.image_path);
    });
</script>

</body>
</html>
