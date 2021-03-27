<link rel="stylesheet" href="/css/normalize.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/toastr.css">

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <!-- Authentication Links -->
                @guest
                                @if (Route::has('login'))
                                    <li class="">
                                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                
                                @if (Route::has('register'))
                                    <li >
                                        <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li><a href="/user/1">compte</a></li>               
                                <li><a href="/songs/create">Create</a></li>
                                <li>
                                    

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                                <li>
                                    <form method="get" action="/search" id="search">
                                        <input type="text" name="search" placeholder="search">
                                        <input type="submit" value=">">
                                    </form>   
                                </li>
            </ul>
            <a href=""></a>
        </nav> 
          
    </header>
         

    <section id="pjax-container">
        @yield('contenu')

        @if(Session::has("toastr"))
            <script>
                toastr.{{Session::get('toastr')['status']}}('{{Session::get('toastr')['message']}}')
            </script>
        @endif
    </section>  
    <audio controls id="audio" ></audio>
</body>


<script src="/js/jquery.js"></script>
<script src="/js/jquery.pjax.js"></script>
<script src="/js/toastr.min.js"></script>
<script src="/js/divers.js"></script>
