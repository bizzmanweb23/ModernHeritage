<header class="header-area">

    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <ul class="header-left-content">
                        <li>
                            <a href="{{ route('about.index') }}">
                                About
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Store Location
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Order Tracking
                            </a>
                        </li>
                        <li>
                            Need help? Call:
                            <a href="tel:+1-(514)-321-4567">
                                <span>+1 (514) 321-4567</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="header-right-content">
                        <ul>
                        @auth
                                <li>
                                    <a href="{{ route('account') }}">My Account</a>
                                </li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
								</li>
                                @endauth
                               @guest
                               <li>
                               <a href="{{ route('login') }}">Login/</a>
                               <a href="{{ route('register') }}">SignUp</a>
                            </li>
                        @endguest
                                
                                   
                                
                            
                            <li>
                                <div class="usd">
                                    <select>
                                        <option value="1">USD</option>
                                        <option value="2">EURO</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="navbar-option-item navbar-option-language dropdown language-option">
                                    <button class="dropdown-toggle" type="button" id="language2"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="lang-name">English</span>
                                    </button>
                                    <div class="dropdown-menu language-dropdown-menu" aria-labelledby="language2">
                                        <a class="dropdown-item" href="#">


                                            <img src="{{ url('/') }}/user/assets/images/language/english.png"
                                                alt="Image">
                                            English
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <img src="{{ url('/') }}/user/assets/images/language/deutsch.png"
                                                alt="Image">
                                            Deutsch
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <img src="{{ url('/') }}/user/assets/images/language/china.png"
                                                alt="Image">
                                            简体中文
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <img src="{{ url('/') }}/user/assets/images/language/arbic.png"
                                                alt="Image">
                                            العربيّة
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- <li> <button class="eye-btn btn btn-primary quote-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Get a Quote
                                </button>

                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="middle-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="index.html">
                            <img src="https://www.bizzmanweb.com/wp-content/themes/bizzman/img/bizzman-logo.png"
                                alt="Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <form class="search-box">
                        <input type="text" name="Search" placeholder="Search Products..." class="form-control">
                        <button type="submit" class="search-btn">
                            <i class="ri-search-line"></i>
                            Search
                        </button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <ul class="wish-cart">
                        <li>
                            <a href="{{ route('wish.show') }}">
                                <span class="wish-icon">
                                    <i class="ri-heart-line"></i>
                                    <span class="count">{{ App\Models\Wishlist::where('user_id',Auth::check()?Auth::user()->id:0)->count() }}</span>
                                </span>
                                <span class="favorite">Favorite</span>
                                My Wishlist
                            </a>
                        </li>
                        <li>
                            <span class="cart" data-bs-toggle="modal" data-bs-target="#exampleModal-cart">
                            <a href="{{ route('cart.show') }}">
                                <span class="wish-icon">
                                    <i class="ri-shopping-cart-line"></i>
                                    <span class="count">{{ App\Models\Cart::where('user_id',Auth::check()?Auth::user()->id:0)->count() }}</span>
                                </span>
                                <span class="favorite">Your Cart:</span>
                                $00.00
                                </a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-area only-home-one-sticky">
        <div class="mobile-responsive-nav">
            <div class="container">
                <div class="mobile-responsive-menu">
                    <div class="navbar-category">
                        <button type="button" id="categoryButton-1" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ri-menu-line"></i>
                        </button>
                        <div class="navbar-category-dropdown dropdown-menu" aria-labelledby="categoryButton-1">
                            <ul>
                                <li>
                                    <a href="#">Power Tools</a>
                                </li>
                                <li>
                                    <a href="#">Hand Tools</a>
                                </li>
                                <li>
                                    <a href="#">Cordless Tools</a>
                                </li>
                                <li>
                                    <a href="#">Welding & Soldering</a>
                                </li>
                                <li>
                                    <a href="#">Gardening Tools</a>
                                </li>
                                <li>
                                    <a href="#">Air and Gas Powered Tools</a>
                                </li>
                                <li>
                                    <a href="#">Safety Tools</a>
                                </li>
                                <li>
                                    <a href="#">Site lighting Tools</a>
                                </li>
                                <li>
                                    <a href="#">Tools Accessories</a>
                                </li>
                                <li>
                                    <a href="#">Outdoor Power Equipment</a>
                                </li>
                                <li>
                                    <a href="#">Safety Tools</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="logo">
                        <a href="index.html">
                            <img src="https://www.bizzmanweb.com/wp-content/themes/bizzman/img/bizzman-logo.png"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</header>