@section('tilte', 'Giỏ hàng')
@extends('frontend.layouts.master')

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="lds-hourglass"></div>
    </div>

    <!-- Main Content-->
    <div class="main-container-wrapper">
        <!-- Top bar area -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img src="img/core-img/logo.png" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="img/core-img/small-logo.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item app-search d-none d-sm-block">
                        <form role="search" class=""><input type="text" placeholder="Search..." class="form-control">
                            <button type="submit" class="search-btn mr-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search search-icon">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></button></form>
                    </li>
                </ul>
                <ul class="top-navbar-area navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown dropdown-animate">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown-2" href="#" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail switch-icon">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown-2">
                            <div class="dropdown-header custom">
                                <p class="mb-0">Messages</p>
                            </div>
                            <div id="messageBox">
                                <a class="dropdown-item preview-item d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon">
                                                <img src="img/member-img/1.png" alt="">
                                            </div>
                                        </div>
                                        <div class="notification-item-content d-flex">
                                            <div>
                                                <h6>Peter jhon.</h6>
                                                <p class="mb-0">Consectetur adipisicing elit. A libero soluta, eligendi facilis.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item preview-item d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon">
                                                <img src="img/member-img/2.png" alt="">
                                            </div>
                                        </div>
                                        <div class="notification-item-content d-flex">
                                            <div>
                                                <h6>Saldia jhon.</h6>
                                                <p class="mb-0">Consectetur adipisicing elit. A libero soluta, eligendi facilis.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item preview-item d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon">
                                                <img src="img/member-img/3.png" alt="">
                                            </div>
                                        </div>
                                        <div class="notification-item-content d-flex">
                                            <div>
                                                <h6>Ajoy Das.</h6>
                                                <p class="mb-0">Consectetur adipisicing elit. A libero soluta, eligendi facilis.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item preview-item d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon">
                                                <img src="img/member-img/4.png" alt="">
                                            </div>
                                        </div>
                                        <div class="notification-item-content d-flex">
                                            <div>
                                                <h6>Purnima Punom.</h6>
                                                <p class="mb-0">Consectetur adipisicing elit. A libero soluta, eligendi facilis.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item preview-item d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon">
                                                <img src="img/member-img/5.png" alt="">
                                            </div>
                                        </div>
                                        <div class="notification-item-content d-flex">
                                            <div>
                                                <h6>jhon Punom.</h6>
                                                <p class="mb-0">Consectetur adipisicing elit. A libero soluta, eligendi facilis.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item preview-item d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon">
                                                <img src="img/member-img/6.png" alt="">
                                            </div>
                                        </div>
                                        <div class="notification-item-content d-flex">
                                            <div>
                                                <h6>Alex Punom.</h6>
                                                <p class="mb-0">Consectetur adipisicing elit. A libero soluta, eligendi facilis.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown dropdown-animate">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown-3" href="#" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell switch-icon">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown-3">
                            <div class="dropdown-header custom">
                                <p class="mb-0">Notifications</p>
                            </div>
                            <div id="notificationsBox">
                                <a class="dropdown-item preview-item d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail primary-text-cu">
                                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                    <polyline points="22,6 12,13 2,6"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="notification-item-content d-flex">
                                            <div>
                                                <h6>New message.</h6>
                                                <p class="mb-0">Payout has been processed.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item preview-item d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase sucess-text-cu">
                                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="notification-item-content d-flex">
                                            <div>
                                                <h6>New Order Recieved.</h6>
                                                <p class="mb-0">You got new order.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item preview-item d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server warning-text-cu">
                                                    <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                                                    <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                                                    <line x1="6" y1="6" x2="6.01" y2="6"></line>
                                                    <line x1="6" y1="18" x2="6.01" y2="18"></line>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="notification-item-content d-flex">
                                            <div>
                                                <h6>New message.</h6>
                                                <p class="mb-0">Payout has been processed.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item preview-item d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square danger-text-cu">
                                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="notification-item-content d-flex">
                                            <div>
                                                <h6>New message.</h6>
                                                <p class="mb-0">Payout has been processed.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item preview-item d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift info-text-cu">
                                                    <polyline points="20 12 20 22 4 22 4 12"></polyline>
                                                    <rect x="2" y="7" width="20" height="5"></rect>
                                                    <line x1="12" y1="22" x2="12" y2="7"></line>
                                                    <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                                                    <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="notification-item-content d-flex">
                                            <div>
                                                <h6>New message.</h6>
                                                <p class="mb-0">Payout has been processed.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item preview-item d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase dark-text-cu">
                                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="notification-item-content d-flex">
                                            <div>
                                                <h6>New Order Recieved.</h6>
                                                <p class="mb-0">Payout has been processed.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </li>

                    <li class="nav-item nav-profile dropdown dropdown-animate">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="img/member-img/team-2.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown profile-top" aria-labelledby="profileDropdown">
                            <div class="profile-header d-flex align-items-center">
                                <div class="thumb-area">
                                    <img src="img/member-img/team-2.jpg" alt="">
                                </div>
                                <div class="content-text">
                                    <h6>Jhon Hazra</h6>
                                    <p class="mb-0">Pro Member</p>
                                </div>
                            </div>
                            <a href="#" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user profile-icon">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg> My profile</a>

                            <a href="#" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail profile-icon">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg> Inbox</a>

                            <a href="#" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square profile-icon">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg> Messages</a>

                            <a href="#" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings profile-icon">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg> Settings</a>

                            <a href="#" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out profile-icon">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg> Sign-out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-xl-none align-self-center" type="button" data-toggle="offcanvas">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid menu-bar-icon">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg></span>
                </button>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <!-- Side Menu area -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#home" aria-expanded="false" aria-controls="home">
                            <svg id="icon-home" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box link-icon">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span class="menu-title">Dashboard</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="home">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="index.html">Default</a></li>
                                <li class="nav-item"><a class="nav-link" href="index-2.html">E-commerce</a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#app" aria-expanded="false" aria-controls="app">
                            <svg id="icon-home-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit link-icon">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            <span class="menu-title">Apps</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="app">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="chat-box.html">Chat box</a></li>
                                <li class="nav-item"><a class="nav-link" href="calendar.html">Calendar</a></li>
                                <li class="nav-item"><a class="nav-link" href="inbox.html">Mail</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ecommerce" aria-expanded="false" aria-controls="ecommerce">
                            <svg id="icon-home-9" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart link-icon">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <span class="menu-title">Ecommerce</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="ecommerce">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="shop.html">Shop</a></li>
                                <li class="nav-item"> <a class="nav-link" href="product-details.html">Product Details</a></li>
                                <li class="nav-item"> <a class="nav-link" href="order.html">Order</a></li>
                                <li class="nav-item"> <a class="nav-link" href="cart.html">Cart</a></li>
                                <li class="nav-item"> <a class="nav-link" href="checkout.html">Checkout</a></li>
                                <li class="nav-item"> <a class="nav-link" href="invoice.html">Invoice</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                            <svg id="icon-home-15" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-aperture link-icon">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
                                <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
                                <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
                                <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
                                <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
                                <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
                            </svg>
                            <span class="menu-title">Icons</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="font-awesome.html">Font Awesome</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pe-7-stroke.html">Pe-7 stroke</a></li>
                                <li class="nav-item"> <a class="nav-link" href="matarial-icons.html">Materialize</a></li>
                                <li class="nav-item"> <a class="nav-link" href="themify-icons.html">Themify</a></li>
                                <li class="nav-item"> <a class="nav-link" href="elegant-icons.html">Elegant</a></li>
                                <li class="nav-item"> <a class="nav-link" href="et-line-icons.html">Et-line</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#elements" aria-expanded="false" aria-controls="elements">
                            <svg id="icon-home-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-feather link-icon">
                                <path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path>
                                <line x1="16" y1="8" x2="2" y2="22"></line>
                                <line x1="17.5" y1="15" x2="9" y2="15"></line>
                            </svg>
                            <span class="menu-title">Elements</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="buttons.html">Button</a></li>
                                <li class="nav-item"><a class="nav-link" href="card.html">Card</a></li>
                                <li class="nav-item"><a class="nav-link" href="slider.html">Slider</a></li>
                                <li class="nav-item"><a class="nav-link" href="tab.html">Tab</a></li>
                                <li class="nav-item"><a class="nav-link" href="progressbar.html">Progressbar</a></li>
                                <li class="nav-item"><a class="nav-link" href="notifications.html">Notification</a></li>
                                <li class="nav-item"><a class="nav-link" href="dropdown.html">Dropdown</a></li>
                                <li class="nav-item"><a class="nav-link" href="typography.html">Typography</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="widgets.html">
                            <svg id="icon-home-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar link-icon">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span class="menu-title">Widget</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                            <svg id="icon-home-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart link-icon">
                                <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                            </svg>
                            <span class="menu-title">Charts</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="am-chart.html">Am Chart</a></li>
                                <li class="nav-item"> <a class="nav-link" href="height-chart.html">Heigh Chart</a></li>
                                <li class="nav-item"> <a class="nav-link" href="peity-chart.html">Peity Chart</a></li>
                                <li class="nav-item"> <a class="nav-link" href="flot-chart.html">Flot Chart</a></li>
                                <li class="nav-item"> <a class="nav-link" href="chartist.html">Chartist Chart</a></li>
                                <li class="nav-item"> <a class="nav-link" href="morris-chart.html">Morris Chart</a></li>
                                <li class="nav-item"> <a class="nav-link" href="chart-js.html">Chart Js</a></li>
                                <li class="nav-item"> <a class="nav-link" href="c3-charts.html">C3 chart</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#general" aria-expanded="false" aria-controls="general">
                            <svg id="icon-home-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard link-icon">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                            <span class="menu-title">Pages</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="general">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="blank.html">Start Page</a></li>
                                <li class="nav-item"><a class="nav-link" href="range.html">Range Slider</a></li>
                                <li class="nav-item"><a class="nav-link" href="timeline.html">Timeline</a></li>
                                <li class="nav-item"><a class="nav-link" href="modals.html">Modals</a></li>
                                <li class="nav-item"><a class="nav-link" href="toastr.html">Toastr</a></li>
                                <li class="nav-item"><a class="nav-link" href="preloader.html">Preloader</a></li>
                                <li class="nav-item"><a class="nav-link" href="sweet-alert.html">Sweet Alert</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="todo-list.html">
                            <svg id="icon-home-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list link-icon">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                <line x1="3" y1="18" x2="3.01" y2="18"></line>
                            </svg>
                            <span class="menu-title">Todo List</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="profile.html">
                            <svg id="icon-home-10" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar link-icon">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span class="menu-title">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form" aria-expanded="false" aria-controls="form">
                            <svg id="icon-home-11" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-minus link-icon">
                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                                <line x1="9" y1="14" x2="15" y2="14"></line>
                            </svg>
                            <span class="menu-title">Forms</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="form">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="basic-form.html">Basic form</a></li>
                                <li class="nav-item"> <a class="nav-link" href="form-validation.html">Validation</a></li>
                                <li class="nav-item"> <a class="nav-link" href="form-switchers.html">Switchers</a></li>
                                <li class="nav-item"> <a class="nav-link" href="form-wizard.html">Form Wizard</a></li>
                                <li class="nav-item"> <a class="nav-link" href="form-input-mask.html">Input mask</a></li>
                                <li class="nav-item"> <a class="nav-link" href="file-upload.html">File upload</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <svg id="icon-home-12" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tablet link-icon">
                                <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                                <line x1="12" y1="18" x2="12.01" y2="18"></line>
                            </svg>
                            <span class="menu-title">Tables</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="basic-table.html">Basic table</a></li>
                                <li class="nav-item"> <a class="nav-link" href="data-table.html">Data table</a></li>
                                <li class="nav-item"> <a class="nav-link" href="price-table.html">Price table</a></li>
                                <li class="nav-item"> <a class="nav-link" href="edit-table.html">Edit Table</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#advanced" aria-expanded="false" aria-controls="advanced">
                            <svg id="icon-home-13" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book link-icon">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                            <span class="menu-title">Advanced</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="advanced">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="gallery.html">Gallery</a></li>
                                <li class="nav-item"> <a class="nav-link" href="video.html">Video</a></li>
                                <li class="nav-item"> <a class="nav-link" href="session-timeout.html">Session timeout</a></li>
                                <li class="nav-item"> <a class="nav-link" href="contact.html">Contact</a></li>
                                <li class="nav-item"> <a class="nav-link" href="coming-soon.html">Coming Soon</a></li>
                                <li class="nav-item"> <a class="nav-link" href="404.html">404</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
                            <svg id="icon-home-18" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock link-icon">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <span class="menu-title">User Page</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="user">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
                                <li class="nav-item"><a class="nav-link" href="lock-screen.html">Lock Screen</a></li>
                                <li class="nav-item"><a class="nav-link" href="forget-password.html">Forget Password</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
                            <svg id="icon-home-16" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin link-icon">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span class="menu-title">Maps</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="maps">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="vector-map.html">Vector</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Mani Page -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Product Edit area Start -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <form class="form-inline d-flex justify-content-between">
                                                    <div class="form-group mb-30">
                                                        <label for="inputPassword2" class="sr-only">Search</label>
                                                        <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                                    </div>
                                                    <div class="form-group mx-sm-3 mb-30">
                                                        <label for="status-select" class="mr-2">Status</label>
                                                        <select class="custom-select" id="status-select">
                                                            <option selected>Choose...</option>
                                                            <option value="1">Paid</option>
                                                            <option value="2">Awaiting Authorization</option>
                                                            <option value="3">Payment failed</option>
                                                            <option value="4">Cash On Delivery</option>
                                                            <option value="5">Fulfilled</option>
                                                            <option value="6">Unfulfilled</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th data-hide="phone">Customer</th>
                                                        <th data-hide="phone">Amount</th>
                                                        <th data-hide="phone">Date added</th>
                                                        <th data-hide="phone,tablet">Date modified</th>
                                                        <th data-hide="phone">Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            3214
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $500.00
                                                        </td>
                                                        <td>
                                                            03/04/2015
                                                        </td>
                                                        <td>
                                                            03/05/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-success-lighten">Shipped</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            324
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $320.00
                                                        </td>
                                                        <td>
                                                            12/04/2015
                                                        </td>
                                                        <td>
                                                            21/07/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-warning-lighten">Pending</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            546
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $2770.00
                                                        </td>
                                                        <td>
                                                            06/07/2015
                                                        </td>
                                                        <td>
                                                            04/08/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-success-lighten">Shipped</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            6327
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $8560.00
                                                        </td>
                                                        <td>
                                                            01/12/2015
                                                        </td>
                                                        <td>
                                                            05/12/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-warning-lighten">Pending</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            642
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $6843.00
                                                        </td>
                                                        <td>
                                                            10/04/2015
                                                        </td>
                                                        <td>
                                                            13/07/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-success-lighten">Shipped</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            7435
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $750.00
                                                        </td>
                                                        <td>
                                                            04/04/2015
                                                        </td>
                                                        <td>
                                                            14/05/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-success-lighten">Shipped</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            3214
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $500.00
                                                        </td>
                                                        <td>
                                                            03/04/2015
                                                        </td>
                                                        <td>
                                                            03/05/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-warning-lighten">Pending</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            324
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $320.00
                                                        </td>
                                                        <td>
                                                            12/04/2015
                                                        </td>
                                                        <td>
                                                            21/07/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-warning-lighten">Pending</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            546
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $2770.00
                                                        </td>
                                                        <td>
                                                            06/07/2015
                                                        </td>
                                                        <td>
                                                            04/08/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-danger-lighten">Canceled</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            6327
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $8560.00
                                                        </td>
                                                        <td>
                                                            01/12/2015
                                                        </td>
                                                        <td>
                                                            05/12/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-warning-lighten">Pending</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            642
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $6843.00
                                                        </td>
                                                        <td>
                                                            10/04/2015
                                                        </td>
                                                        <td>
                                                            13/07/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-success-lighten">Shipped</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            7435
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $750.00
                                                        </td>
                                                        <td>
                                                            04/04/2015
                                                        </td>
                                                        <td>
                                                            14/05/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-warning-lighten">Pending</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            324
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $320.00
                                                        </td>
                                                        <td>
                                                            12/04/2015
                                                        </td>
                                                        <td>
                                                            21/07/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-danger-lighten">Expired</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            546
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $2770.00
                                                        </td>
                                                        <td>
                                                            06/07/2015
                                                        </td>
                                                        <td>
                                                            04/08/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-warning-lighten">Pending</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            6327
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $8560.00
                                                        </td>
                                                        <td>
                                                            01/12/2015
                                                        </td>
                                                        <td>
                                                            05/12/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-warning-lighten">Pending</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            642
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $6843.00
                                                        </td>
                                                        <td>
                                                            10/04/2015
                                                        </td>
                                                        <td>
                                                            13/07/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-success-lighten">Shipped</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            7435
                                                        </td>
                                                        <td>
                                                            Customer example
                                                        </td>
                                                        <td>
                                                            $750.00
                                                        </td>
                                                        <td>
                                                            04/04/2015
                                                        </td>
                                                        <td>
                                                            14/05/2015
                                                        </td>
                                                        <td>
                                                            <div class="product-en-btn">
                                                                <a class="badge badge-warning-lighten">Pending</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                </div>

                <!-- Footer Area -->
                <div class="footer-area footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <!-- Copywrite Text -->
                                <div class="copywrite-text text-center">
                                    <p>Nijar &copy; 2021 created by - <a href="#">Theme-zome.</a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Must needed plugins to the run this Template -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bundle.js"></script>
    <script src="js/vivus.min.js"></script>
    <script src="js/svg.animation.js"></script>

    <!-- Inject JS -->
    <script src="js/canvas.js"></script>
    <script src="js/collapse.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/template.js"></script>
    <script src="js/default-assets/active.js"></script>

</body>

</html>