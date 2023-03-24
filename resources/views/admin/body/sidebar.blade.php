<div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{ route('homeSlide') }}" class="waves-effect">
                                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">Home</span>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Update Pages Content</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">

                                <li class="menu-title">Home Page</li>
                                            <li><a href="{{ route('HomeSlider_settings') }}">Home Slider</a></li>
                                            <li><a href="{{ route('about.slider') }}">About Slider</a></li>
                                            <li><a href="{{ route('multi.images') }}">Multi Images Slider</a></li>
                                            <li><a href="{{ route('about.images') }}">Donwload Multi Image</a></li>
                                            <li><a href="{{ route('all.portfolio') }}">Portfolio Slider</a></li>
                                            <li><a href="{{ route('add.portfolio') }}">Add New Portfolio</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">Footer</li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-vip-crown-2-line"></i>
                                    <span>Footer</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('footer.section') }}">Footer Setting</a></li>
                                </ul>
                            </li>
                            
                            <li class="menu-title">Blog</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-vip-crown-2-line"></i>
                                    <span>Blog Publication</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('all.blog') }}">All Publication</a></li>
                                    <li><a href="{{ route('add.blog') }}">Add New Publication</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-vip-crown-2-line"></i>
                                    <span>Blog Categories</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('blog.category') }}">All Blog Category</a></li>
                                    <li><a href="{{ route('add.blog.category') }}">Add New category</a></li>

                                </ul>
                            </li>

                            <li class="menu-title">Clients Messages</li>

                            <li>
                                <a href="{{ route('client.message') }}" class="waves-effect">
                                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span>Form Messages</span>
                                </a>
                            </li>

                            <li class="menu-title">Layout</li>


                            
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>