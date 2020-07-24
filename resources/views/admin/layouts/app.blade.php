<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.1.3/css/bootstrap.min.css" integrity="sha384-Jt6Tol1A2P9JBesGeCxNrxkmRFSjWCBW1Af7CSQSKsfMVQCqnUVWhZzG0puJMCK6" crossorigin="anonymous">    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" defer></script>
    
    <title>{{ $settings->name }} - لوحة التحكم</title>
    @yield('header')
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">

        <a class="navbar-brand" href="#"><img src="{{ $settings->icon_header_admin_path }}" width="190" height="40" /></a>


        <button class="navbar-toggler sideMenuToggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button> 
        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown  user-menu">
                <a class="nav-link dropdown-toggle" href="http://example.com" style="margin-top:1px;" id="navbarDropdownMenuLink" data-toggle="dropdown" data-target="#actions" aria-haspopup="true" aria-expanded="false">
                  <img src="{{ Auth::user()->image }}" class="user-image" >
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu" id="actions" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      تسجيل الخروج
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>             
                </div>
            </li>

              <li class="nav-item dropdown messages-menu">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" data-target="#notifications" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="label label-success bg-success">{{-- count($contact) --}}</span>
                </a>
                <div class="dropdown-menu" id="notifications" aria-labelledby="navbarDropdownMenuLink">
                  <ul class="dropdown-menu-over list-unstyled">
                    <li class="header-ul text-center">لديك {{-- count($contact) --}} رسائل جديدة</li>
                    <li>
                      <!-- inner menu: contains the actual data -->
                      <ul class="menu list-unstyled">
                      {{--  @foreach($contact as $c)
                        <li><!-- start message -->
                        <a href="#">
                          <div class="float-right">
                            <img src="http://via.placeholder.com/160x160" class="rounded-circle  " alt="User Image">
                          </div>
                          <h4>
                          {{ $c->name }}
                          <small><i class="fa fa-clock-o"></i>{{ $c->created_at }}</small>
                          </h4>
                          <p>{{ $c->text }}</p>
                        </a>
                      </li>
                      @endforeach --}}
                      <!-- end message -->
                    </ul>
                  </li>
                  <li class="footer-ul text-center"><a href="{{ url("../public/contacts") }}">مشاهدة كل الرسائل</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item dropdown notifications-menu">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" data-target="#messages" aria-haspopup="true" aria-expanded="false">
                <span class="material-icons">mail</span>
                <span class="label label-warning bg-warning">{{-- count($activity) --}}</span>
              </a>
              <div id="messages" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <ul class="dropdown-menu-over list-unstyled">
                  <li class="header-ul text-center">لديك {{-- count($activity) --}} إشعارات جديدة</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu list-unstyled">
                      <li>
                       {{-- @foreach($activity as $a)
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> {{ $a->description }}
                        </a>
                        @endforeach --}}
                      </li>
                    </ul>
                  </li>
                  <li class="footer-ul text-center"><a href="{{ url("../public/activitylog") }}">مشاهدة الكل</a></li>
                </ul>
              </div>
            </li>
            
            
          </ul>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        
    </nav>

    <div class="wrapper d-flex">
        <div class="sideMenu bg-mattBlackLight">
            <div class="sidebar">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="{{ url('dashboard') }}" class="nav-link px-2"><i class="material-icons icon">dashboard</i><span class="text">لوحة التحكم</span></a></li>
                    <li class="nav-item"><a href="{{ url('sliders') }}" class="nav-link px-2"><i class="material-icons icon">content_copy</i><span class="text">السلايدر</span></a></li>
                    <li class="nav-item"><a href="{{ url('services') }}" class="nav-link px-2"><i class="material-icons icon">content_copy</i><span class="text">الخدمات</span></a></li>
                    <li class="nav-item"><a href="{{ url('servicestwo') }}" class="nav-link px-2"><i class="material-icons icon">content_copy</i><span class="text">الخدمات 2</span></a></li>
                    <li class="nav-item"><a href="{{ url('partners') }}" class="nav-link px-2"><i class="material-icons icon">content_copy</i><span class="text">الشركاء</span></a></li>
                    <li class="nav-item"><a href="{{ url('projects') }}" class="nav-link px-2"><i class="material-icons icon">content_copy</i><span class="text">المشاريع</span></a></li>
                    <li class="nav-item"><a href="{{ url('business/1/edit') }}" class="nav-link px-2"><i class="material-icons icon">content_copy</i><span class="text">business</span></a></li>
                    <li class="nav-item"><a href="{{ url('contacts') }}" class="nav-link px-2"><i class="material-icons icon">accessibility</i><span class="text">تواصل معنا</span></a></li>
                    <li class="nav-item"><a href="{{ url('settings/1/edit') }}" class="nav-link px-2"><i class="material-icons icon">account_box</i><span class="text">إعدادات الموقع</span></a></li>
                    <li class="nav-item"><a href="{{ url('pages') }}" class="nav-link px-2"><i class="material-icons icon">content_copy</i><span class="text">الصفحات</span></a></li>
                    <li class="nav-item"><a href="#" class="nav-link sideMenuToggler px-2"><span class="text">ex</span><i class="material-icons icon">ex</i></a></li>
                </ul>
            </div>
        </div>
    


    <div class="content">
        <main>
           
            @yield('content')
                        
        </main>
    </div>

    

</body>


<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script src="{{ asset('admin/js/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

@yield('footer')
</html>