<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Hotel</title>
    @if (session()->get('locale') =='ar')
        <style>
            html,body{
                direction: rtl;
            }
            #content{
                display: flex;
            }
            .sidebar{
                flex: 2;
                right: 0;
                top: 0;
            }
            #content .right{
                margin-right: 260px;
                margin-left:0;
            }
 
            @media only screen and (max-width: 600px) {
                #content .right{
                    margin-right: 0px;
                    margin: 0;
                }
            }
        </style>
    @endif
    <style>
        table{
            width: 90%;
            overflow:scroll;
        }
     
    </style>
</head>
<body>
    <div id="content" class="d-flex">
        <div class="sidebar bg-dark bg-gradient text-light">
            <div id="top_side_content">
                    <div class="top d-flex justify-content-center" style="height: 210px">
                        <a href="{{ route('admin.index') }}"><img src="{{ asset('img/WhiteLogo.png') }}" style="width: 200px;" alt=""></a>
                    </div>
                    <div class="d-flex">
                        <div class="img">
                        </div>
                        <div class="info d-flex px-3 pb-2">
                            <div>
                                <img style="width: 50px;border-radius:50%;" src="{{ asset('img/user.jpg') }}" alt="">
                            </div>
                            <div class="mx-3">
                                <h6 class="ms-1">{{ Auth::user()->name }}</h6>
                                <div class="d-flex align-items-center">
                                    <div class="ms-1" style="width: 13px;height:13px;border-radius:50%;background-color:rgb(90, 223, 72)">
                                    </div>
                                    <span class="ms-1">{{ Auth::user()->role }}</span> 
                                </div>
                            </div>
                        </div>
                    </div>              

            </div>
            <hr>

            <div>
                <ul class="firstul">
                    <li class="active">
                        <a class="thefirsta" href="{{ route('admin.index') }}">
                            <span class="material-icons-outlined">
                                dashboard
                            </span>
                            <span>{{ __('custom.Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="d-flex align-items-center justify-content-between clickToggle">
                        <a class="thefirsta" href="#">
                            <span class="material-icons-outlined">
                                calendar_month
                            </span>
                            <span>{{ __('custom.Reservation') }}</span>
                        </a>
                        <span class="material-icons-outlined downicon " style="display: block;">
                            expand_more
                        </span>
                        <span class="material-icons-outlined upicon" style="display: none;">
                            expand_less
                        </span>
                    </li>
                    <div class="container" style="display: none;" id="dropdownMenu">
                        <ul>
                            <a href="{{ route('room.index') }}" class="dropitems"><li class="py-2">{{ __('custom.Rooms') }}</li></a>
                            <a href="{{ route('client.index') }}" class="dropitems"><li class="py-2">{{ __('custom.Clients') }}</li></a>
                        </ul>
                    </div>
                    <li>
                        <a class="thefirsta" href="{{ route('employee.index') }}">
                            <span class="material-icons-outlined">
                                engineering
                            </span>
                            <span>{{ __('custom.Employers') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="thefirsta" href="{{ route('user.index') }}">
                            <span class="material-icons-outlined">
                                people
                                </span>
                            <span>{{ __('custom.user') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="thefirsta" href="{{ route('admin.about') }}">
                            <span class="material-icons-outlined">
                                help
                            </span>
                            <span>{{ __('custom.About') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="right w-100">
            <nav class="bg-dark bg-gradient py-3">
                <ul class="d-flex justify-content-end align-items-center">
                    <li class="itemone">
                        <div class="dropdown">
                            <span class="dropdown-toggle text-light d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="material-icons-outlined">
                                    language
                                </span>
                                <a class="itemnav mx-1" href="">{{ __('custom.Language') }}</a>
                            </span>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('admin.show', 'ar') }}">{{ __('custom.Arabic') }}</a></li>
                              <li><a class="dropdown-item" href="{{ route('admin.show', 'en') }}">{{ __('custom.English') }}</a></li>
                            </ul>
                          </div>
                    </li>
                    <li class="itemone">
                        <div class="dropdown">
                            <span class="dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="user mx-2"  src="{{ asset('img/user.jpg') }}" alt="">
                            </span>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item d-flex align-items-center" href="{{ route('user.show',Auth::user()->id) }}"><span class="material-icons-outlined mx-2">account_circle</span><span>{{ __('custom.Profile') }}</span></a></li> 
                              <li><hr class="dropdown-divider"></li>
                              <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex align-items-center"><span class="material-icons-outlined mx-2">logout</span><span>{{ __('custom.Logout') }}</span></button>
                                </form>
                               
                              </li>
                            </ul>
                          </div>
                    </li>
                    <div class="align-items-center justify-content-between w-100 sideforphone">
                        <div>
                            <a href="{{ route('admin.index') }}"><img class="w-25" src="{{ asset('img/WhiteLogo.png') }}" alt=""></a>
                        </div>
                        <span  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><span class="material-icons-outlined text-light" style="font-size: 35px;">
                            menu
                            </span></span>
    
                        <div class="offcanvas {{ session()->get('locale') == 'en' ? 'offcanvas-end' : 'offcanvas-start' }}  text-bg-dark" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasRightLabel"><img class="w-25" src="{{ asset('img/WhiteLogo.png') }}" alt=""></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="card py-3 bg-dark p-2">
                                    <div class="d-flex align-items-center">
                                        <li class="itemone mx-2">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-light d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span class="material-icons-outlined">
                                                        language
                                                    </span>
                                                    <a class="itemnav mx-1" href="">{{ __('custom.Language') }}</a>
                                                </span>
                                                <ul class="dropdown-menu">
                                                  <li><a class="dropdown-item" href="{{ route('admin.show', 'ar') }}">{{ __('custom.Arabic') }}</a></li>
                                                  <li><a class="dropdown-item" href="{{ route('admin.show', 'en') }}">{{ __('custom.English') }}</a></li>
                                                </ul>
                                              </div>
                                        </li>
                                        <li class="itemone">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img class="user mx-2"  src="{{ asset('img/user.jpg') }}" alt="">
                                                </span>
                                                <ul class="dropdown-menu">
                                                  <li><a class="dropdown-item d-flex align-items-center" href="{{ route('user.show',Auth::user()->id) }}"><span class="material-icons-outlined mx-2">account_circle</span><span>{{ __('custom.Profile') }}</span></a></li> 
                                                  <li><hr class="dropdown-divider"></li>
                                                  <li>
                                                    <form action="{{ route('logout') }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item d-flex align-items-center"><span class="material-icons-outlined mx-2">logout</span><span>{{ __('custom.Logout') }}</span></button>
                                                    </form>
                                                   
                                                  </li>
                                                </ul>
                                              </div>
                                        </li>
                                    </div>
                                    
                                </div>
                                <ul class="m-0 p-0">
                                    <li class="list-group-item"><a href="{{ route('admin.index') }}" class="nav-link py-3">{{ __('custom.Dashboard') }}</a></li>
                                    <li class="list-group-item"><a href="{{ route('room.index') }}" class="nav-link py-3">{{ __('custom.Rooms') }}</a></li>
                                    <li class="list-group-item"><a href="{{ route('client.index') }}" class="nav-link py-3">{{ __('custom.Clients') }}</a></li>
                                    <li class="list-group-item"><a href="{{ route('employee.index') }}" class="nav-link py-3">{{ __('custom.Employers') }}</a></li>
                                    <li class="list-group-item"><a href="{{ route('user.index') }}" class="nav-link py-3">{{ __('custom.user') }}</a></li>
                                    <li class="list-group-item"><a href="{{ route('admin.about') }}" class="nav-link py-3">{{ __('custom.About') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                   

                </ul>
            </nav>
            <div class="container-fluid bg-light">
                <div class="route container pt-2 ps-2">
                    <span class="d-flex align-items-center">
                        <a href="{{ route('admin.index') }}" class="text-dark mx-2">                     
                             <h6 class="material-icons-outlined icon">
                               home
                             </h6>
                        </a> 
  
                        <h6> <a href="{{ route('admin.index') }}" style="text-decoration: none;" class="text-dark">{{ __('custom.Home') }}</a></h6>
                        <h6 class="mx-1">{{  str_replace('/' , ' / ',$_SERVER['REQUEST_URI'])  }}</h6>

                    </span>
                </div>
                <div class="container-md">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
       
    <script>
        $(document).ready(()=>{
            $('.clickToggle').click(()=>{
                console.log('hhhh');
                $('#dropdownMenu').toggle(600,()=>{
                    if($('#dropdownMenu').is(":visible")){
                        $('.downicon').css('display','none')
                        $('.upicon').css('display','block')
                    }else{
                        $('.downicon').css('display','block')
                        $('.upicon').css('display','none')
                    }
                })
            })
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
       
