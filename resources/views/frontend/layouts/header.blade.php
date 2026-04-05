    <header class="site-navbar py-3" role="banner" dir="rtl">

      <div class="container-fluid">
        <div class="row align-items-center">

          <div class="col-6 col-xl-2 order-2 order-xl-1 text-left text-xl-right" data-aos="fade-down">
            <a href="{{ url('/') }}">
              <img src="{{ asset('frontend/images/Alqadsy.png') }}" alt="ورشة القدسي" style="max-width: 90px; height: auto; border-radius: 50%;" />
            </a>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block order-xl-2" data-aos="fade-down">
            <nav class="site-navigation position-relative text-center text-lg-center" role="navigation">

              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active"><a href="{{ url('/') }}">الرئيسية</a></li>
                <li class="has-children">
                  <a href="#">الأقسام</a>
                  <ul class="dropdown">
                    @foreach($categories as $category)
                      <li><a href="{{ route('frontend.category.products', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li><a href="{{ route('gallery') }}">المعرض</a></li>
                {{-- <li><a href="services.html">الخدمات</a></li> --}}
                <li><a href="{{ route('about') }}">من نحن</a></li>
                {{-- <li><a href="{{ route('contact.show') }}">اتصل بنا</a></li> --}}
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 order-1 order-xl-3 text-right text-xl-left" data-aos="fade-down">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav mr-auto list-unstyled d-flex text-left mb-0" data-class="social">
                <li>
                  <a href="https://wa.me/967771839780" target="_blank" class="pl-3 pr-3"><span class="icon-whatsapp"></span></a>
                </li>
                <li>
                  <a href="https://www.facebook.com/share/1EyxBLDgNc/" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                </li>
              </ul>
            </div>

            <div class="d-inline-block d-xl-none ml-md-0 mr-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>

    </header>
