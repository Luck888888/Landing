<header>
    <div class="row">
        @if(isset($menu))
        <div class="top-bar">
            <a class="menu-toggle" href="#"><span>Menu</span></a>

            <div class="logo">
                <a href="#">MENU</a>
            </div>
            <nav id="main-nav-wrap">
                <ul class="main-navigation">
{{--                    из базы данных формируются пункты меню--}}

                    @foreach($menu as $item)
                        <li class="current"><a class="smoothscroll"  href="#{{ $item['alias']}}">{{$item['title']}}</a></li>
                    @endforeach
{{--                    <li class="current"><a class="smoothscroll"  href="#intro" title="">Home</a></li>--}}
{{--                    <li><a class="smoothscroll"  href="#about" title="">About</a></li>--}}
{{--                    <li><a class="smoothscroll"  href="#resume" title="">Resume</a></li>--}}
{{--                    <li><a class="smoothscroll"  href="#portfolio" title="">Portfolio</a></li>--}}
{{--                    <li><a class="smoothscroll"  href="#services" title="">Services</a></li>--}}
{{--                    <li><a class="smoothscroll"  href="#contact" title="">Contact</a></li>--}}
{{--                    <li><a href="styles.html" title="">Style Demo</a></li>--}}
                </ul>
            </nav>
            @endif
        </div> <!-- /top-bar -->
    </div> <!-- /row -->
</header> <!-- /header -->