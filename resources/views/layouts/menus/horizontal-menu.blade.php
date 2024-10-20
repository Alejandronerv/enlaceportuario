<div class="horizontal-main hor-menu clearfix">
    <div class="horizontal-mainwrapper container clearfix">
        <nav class="horizontalMenu clearfix">
            <ul class="horizontalMenu-list">
                <li aria-haspopup="true">
                    <a href="{{ route('dashboard') }}" class="sub-icon">
                        <svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        Dashboard <i class="fa fa-angle-down horizontal-icon"></i>
                     </a>
                    {{-- <ul class="sub-menu">
                        <li aria-haspopup="true"><a href="index.html">Dashboard 01</a></li>
                        <li aria-haspopup="true"><a href="index2.html">Dashboard 02</a></li>
                        <li aria-haspopup="true"><a href="index3.html">Dashboard 03</a></li>
                        <li aria-haspopup="true"><a href="index4.html">Dashboard 04</a></li>
                        <li aria-haspopup="true"><a href="index5.html">Dashboard 05</a></li>
                    </ul> --}}
                </li>
                <li aria-haspopup="true">
                    <a href="#" class="sub-icon">
                        <svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        Inquiries <i class="fa fa-angle-down horizontal-icon"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="#"> Operation Berth</a></li>
                        <li><a href="#"> Container Operation Information</a></li>
                        <li><a href="#"> Vessel Operation Summary </a></li>
                    </ul>
                </li>
                {{-- <li aria-haspopup="true">
                    <a href="#" class="sub-icon">
                        <svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        Widgets <i class="fa fa-angle-down horizontal-icon"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="widgets-1.html">Widgets</a></li>
                        <li><a href="widgets-2.html">Chart Widgets</a></li>
                    </ul>
                </li> --}}
                <li aria-haspopup="true">
                    <a href="#" class="sub-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hor-icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        Forms <i class="fa fa-angle-down horizontal-icon"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('announcements.table') }}"> Announcements</a></li>
                        <li><a href="{{ route('yardinventory.table') }}"> Inventory Yard File Upload</a></li>
                        {{-- <li><a href="advanced-forms.html"> Advanced Forms</a></li>
                        <li><a href="form-wizard.html"> Form Wizard</a></li>
                        <li><a href="wysiwyag.html"> Form Edit</a></li>
                        <li><a href="form-sizes.html"> Form Element Sizes</a></li>
                        <li><a href="form-treeview.html"> Form Treeview</a></li> --}}
                    </ul>
                </li>
                {{-- <li aria-haspopup="true"><a href="#" class="sub-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hor-icon"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                    Advanced UI <i class="fa fa-angle-down horizontal-icon"></i></a>
                    <ul class="sub-menu">
                        <li aria-haspopup="true" class="sub-menu-sub"><a href="#">Charts</a>
                            <ul class="sub-menu">
                                <li><a href="chart-chartist.html" class="slide-item">Chartjs Charts</a></li>
                                <li><a href="chart-morris.html" class="slide-item"> Morris Charts</a></li>
                                <li><a href="chart-apex.html" class="slide-item"> Apex Charts</a></li>
                                <li><a href="chart-peity.html" class="slide-item"> Pie Charts</a></li>
                                <li><a href="chart-echart.html" class="slide-item"> Echart Charts</a></li>
                                <li><a href="chart-flot.html" class="slide-item"> Flot Charts</a></li>
                                <li><a href="chart-c3.html" class="slide-item">C3 Charts</a></li>
                            </ul>
                        </li>
                        <li aria-haspopup="true" class="sub-menu-sub"><a href="#">Maps</a>
                            <ul class="sub-menu">
                                <li><a href="maps.html" class="slide-item">Vector Maps</a></li>
                                <li><a href="maps2.html" class="slide-item">Leaflet Maps</a></li>
                                <li><a href="maps3.html" class="slide-item">Mapel Maps</a></li>
                            </ul>
                        </li>
                        <li aria-haspopup="true" class="sub-menu-sub"><a href="#">Tables</a>
                            <ul class="sub-menu">
                                <li><a href="tables.html" class="slide-item">Default table</a></li>
                                <li><a href="datatable.html" class="slide-item">Data Table</a></li>
                            </ul>
                        </li>
                        <li aria-haspopup="true" class="sub-menu-sub"><a href="#">Invoice</a>
                            <ul class="sub-menu">
                                <li><a href="invoice-list.html">Invoice list</a></li>
                                <li><a href="invoice-1.html">Invoice 01</a></li>
                                <li><a href="invoice-2.html">Invoice 02</a></li>
                                <li><a href="invoice-3.html">Invoice 03</a></li>
                                <li><a href="invoice-add.html">Add Invoice</a></li>
                                <li><a href="invoice-edit.html">Edit Invoice</a></li>
                            </ul>
                        </li>
                        <li aria-haspopup="true" class="sub-menu-sub"><a href="#">Shop</a>
                            <ul class="sub-menu">
                                <li><a href="shop.html"> Products</a></li>
                                <li><a href="shop-des.html">Product Details</a></li>
                                <li><a href="cart.html"> Shopping Cart</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li aria-haspopup="true">
                    <a href="#" class="sub-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hor-icon"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        Elements  <i class="fa fa-angle-down horizontal-icon"></i>
                    </a>
                    <div class="horizontal-megamenu clearfix">
                        <div class="container">
                            <div class="mega-menubg">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 col-xs-12 link-list">
                                        <ul>
                                            <li><a href="accordion.html"> Accordion</a></li>
                                            <li><a href="alerts.html"> Alerts</a></li>
                                            <li><a href="avatars.html"> Avatars</a></li>
                                            <li><a href="badge.html"> Badges</a></li>
                                            <li><a href="breadcrumbs.html"> Breadcrumb</a></li>
                                            <li><a href="buttons.html"> Buttons</a></li>
                                            <li><a href="cards.html"> Cards</a></li>
                                            <li><a href="cards-image.html"> Card Images</a></li>
                                            <li><a href="carousel.html"> Carousel</a></li>
                                            <li><a href="dropdown.html"> Dropdown</a></li>
                                            <li><a href="footers.html"> Footers</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-xs-12 link-list">
                                        <ul>
                                            <li><a href="headers.html"> Headers</a></li>
                                            <li><a href="jumbotron.html"> Jumbotron</a></li>
                                            <li><a href="list.html"> List</a></li>
                                            <li><a href="media-object.html"> Media Obejct</a></li>
                                            <li><a href="modal.html"> Modal</a></li>
                                            <li><a href="navigation.html"> Navigation</a></li>
                                            <li><a href="pagination.html"> Pagination</a></li>
                                            <li><a href="panels.html"> Panel</a></li>
                                            <li><a href="popover.html"> Popover</a></li>
                                            <li><a href="progress.html"> Progress</a></li>
                                            <li><a href="tabs.html"> Tabs</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-xs-12 link-list">
                                        <ul>
                                            <li><a href="tags.html"> Tags</a></li>
                                            <li><a href="tooltip.html"> Tooltips</a></li>
                                            <li class="title mt-3">Error Pages</li>
                                            <li><a href="400.html" class="slide-item"> 400</a></li>
                                            <li><a href="401.html" class="slide-item"> 401</a></li>
                                            <li><a href="403.html" class="slide-item"> 403</a></li>
                                            <li><a href="404.html" class="slide-item"> 404</a></li>
                                            <li><a href="500.html" class="slide-item"> 500</a></li>
                                            <li><a href="503.html" class="slide-item"> 503</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-xs-12 link-list">
                                        <ul>
                                            <li class="title">Basic Elements</li>
                                            <li><a href="element-colors.html"> Colors</a></li>
                                            <li><a href="element-flex.html"> Flex Items</a></li>
                                            <li><a href="element-height.html"> Height</a></li>
                                            <li><a href="elements-border.html"> Border</a></li>
                                            <li><a href="elements-display.html"> Display</a></li>
                                            <li><a href="elements-margin.html"> Margin</a></li>
                                            <li><a href="elements-paddning.html"> Padding</a></li>
                                            <li><a href="element-typography.html"> Typhography</a></li>
                                            <li><a href="element-width.html"> Width</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li> --}}
                {{-- <li aria-haspopup="true"><a href="#" class="sub-icon ">
                    <svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                    Pages <i class="fa fa-angle-down horizontal-icon"></i></a>
                    <div class="horizontal-megamenu clearfix">
                        <div class="container">
                            <div class="mega-menubg">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 col-xs-12 link-list">
                                        <ul>
                                            <li class="title">Profile Pages</li>
                                            <li><a href="profile-1.html">Profile 01</a></li>
                                            <li><a href="profile-2.html">Profile 02</a></li>
                                            <li><a href="profile-3.html">Profile 03</a></li>
                                            <li><a href="editprofile.html"> Edit Profile</a></li>
                                            <li class="title mt-3">Email Pages</li>
                                            <li><a href="email-compose.html">Email Compose</a></li>
                                            <li><a href="email-inbox.html">Email Inbox</a></li>
                                            <li><a href="email-read.html">Email Read</a></li>
                                            <li class="title mt-3">Pricing Pages</li>
                                            <li><a href="pricing.html">Pricing 01</a></li>
                                            <li><a href="pricing-2.html">Pricing 02</a></li>
                                            <li><a href="pricing-3.html">Pricing 03</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-xs-12 link-list">
                                        <ul>
                                            <li class="title">Blog Pages</li>
                                            <li><a href="blog.html">Blog 01</a></li>
                                            <li><a href="blog-2.html">Blog 02</a></li>
                                            <li><a href="blog-3.html">Blog 03</a></li>
                                            <li><a href="blog-styles.html">Blog Styles</a></li>
                                            <li class="title mt-3">Other Pages</li>
                                            <li><a href="gallery.html"> Gallery</a></li>
                                            <li><a href="faq.html"> FAQS</a></li>
                                            <li><a href="terms.html"> Terms</a></li>
                                            <li><a href="empty.html"> Empty Page</a></li>
                                            <li><a href="search.html"> Search</a></li>

                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-xs-12 link-list">
                                        <ul>
                                            <li class="title">Login</li>
                                            <li><a href="login-1.html">Login 01</a></li>
                                            <li><a href="login-2.html">Login 02</a></li>
                                            <li><a href="login-3.html">Login 03</a></li>
                                            <li class="title mt-3">Register</li>
                                            <li><a href="register-1.html">Register 01</a></li>
                                            <li><a href="register-2.html">Register 02</a></li>
                                            <li><a href="register-3.html">Register 03</a></li>
                                            <li class="title mt-3">Forgot Passowrd</li>
                                            <li><a href="forgot-password-1.html">Forget Password 01</a></li>
                                            <li><a href="forgot-password-2.html">Forget Password 02</a></li>
                                            <li><a href="forgot-password-3.html">Forget Password 03</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-xs-12 link-list">
                                        <ul>
                                            <li class="title">Reset password</li>
                                            <li><a href="reset-password-1.html">Reset Password 01</a></li>
                                            <li><a href="reset-password-2.html">Reset Password 02</a></li>
                                            <li><a href="reset-password-3.html">Reset Password 03</a></li>
                                            <li class="title mt-3">Lock screen</li>
                                            <li><a href="lockscreen-1.html">Lock Screen 01</a></li>
                                            <li><a href="lockscreen-2.html">Lock Screen 02</a></li>
                                            <li><a href="lockscreen-3.html">Lock Screen 03</a></li>
                                            <li><a href="construction.html"> Under Construction</a></li>
                                            <li><a href="coming.html"> Coming Soon</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li> --}}
                {{-- <li aria-haspopup="true">
                    <a href="#" class="sub-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hor-icon"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                        Icons <i class="fa fa-angle-down horizontal-icon"></i>
                    </a>
                    <ul class="sub-menu">
                        <li aria-haspopup="true"><a href="icons.html">Font Awesome</a></li>
                        <li aria-haspopup="true"><a href="icons2.html">Material Design Icons</a></li>
                        <li aria-haspopup="true"><a href="icons3.html">Simple line Icons</a></li>
                        <li aria-haspopup="true"><a href="icons4.html">Feather Icons</a></li>
                        <li aria-haspopup="true"><a href="icons5.html">Ionic Icons</a></li>
                        <li aria-haspopup="true"><a href="icons6.html"> Flag Icons</a></li>
                        <li aria-haspopup="true"><a href="icons7.html">pe7 Icons</a></li>
                        <li aria-haspopup="true"><a href="icons8.html">Themify Icons</a></li>
                        <li aria-haspopup="true"><a href="icons9.html"> Typicons Icons</a></li>
                        <li aria-haspopup="true"><a href="icons10.html">Weather Icons</a></li>
                        <li aria-haspopup="true"><a href="icons11.html">Material Icons</a></li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
        <!--Nav end -->
    </div>
</div>