<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a5efd35989.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/template_utama.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    @yield('css')
    

    <title>@yield('title')</title>
  </head>
  <body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white shadow-lg" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <a href="{{route('home')}}">
                    <img src="{{asset('img/ayana-logo.jpeg')}}" alt="logo ayana">
                </a>
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="{{route('home')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ request()->is('home') ? 'active' : '' }}"><i 
                        class="fas fa-chalkboard-teacher me-2"></i>Kelas</a>
                
                @if(auth()->user()->role == "admin")
                    <a href="{{route('admin.kelas.tambah')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ request()->is('kelas/tambah') ? 'active' : '' }}"><i class="fas fa-chalkboard me-2"></i>Tambah Kelas</a>
                @endif

            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <p class="fs-2 m-0">Dashboard</p>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" 
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" 
                            aria-expanded="false">
                                <i class="fas fa-user me-2"></i>{{auth()->user()->name}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-5">
                <div class="row my-5">
                    @yield('content')
                </div>
            </div>

            <div class="footer-wrapper text-center">
                <p>©Build by Saptadarpa</p>
                <p>@2021</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "bJQueryUI": true,
                "bDestroy": true,
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0, 1]
                }],
                "aLengthMenu": [[5, 10, 15], [5, 10, 15]],
                "iDisplayLength": 5,
                info: false
            });
        } );
    </script>

    @yield('footer')

</body>
</html>