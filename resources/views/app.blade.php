<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    .<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    {{-- theem important thengs belongs to css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    {{-- end theem css things --}}

  </head>
  <body class="antialiased">

    <div class="wrapper" style="margin-top: -24px;">
      <!-- loading image -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
      </div>

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav w-100">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item ml-auto d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>

      </nav>

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
          <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Ageeb</span>
        </a>
        <!-- Sidebar data and liks -->
        <div class="sidebar">
          <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              
              {{-- <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard v1</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="pages/widgets.html" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Widgets
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li> --}}

              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                  <i class="nav-icon fa-solid fa-people-roof"></i>
                    Categories
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('group.index') }}" class="nav-link">
                  <i class="nav-icon fa-solid fa-masks-theater"></i>
                    Groups
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('item.index') }}" class="nav-link">
                  <i class="nav-icon fa-solid fa-bug"></i>
                    Items
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('paking.index') }}" class="nav-link">
                  <i class="nav-icon fa-solid fa-boxes-packing"></i>
                    Packing
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('purchase.index') }}" class="nav-link">
                  <i class="nav-icon fa-solid fa-cart-plus"></i>
                    Purchases
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('order.index') }}" class="nav-link">
                  <i class="nav-icon fa-solid fa-people-carry-box"></i>
                    Sales
                </a>
              </li>

            </ul>
          </nav>
        </div>
      </aside>
  

      @yield('content')

      <footer class="main-footer">
        <strong>Copyright &copy; 2020-2022 <a href="https://www.linkedin.com/in/moeen-adly-2bbb21155/">Moeen Adly</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.1
        </div>
      </footer>
    </div>
    
    {{-- import things for theem adminlte js --}}

    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/adminlte.js') }}"></script>

    <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
    {{-- end import things belong to theem js --}}
    <script src="{{ asset('js/table2excel.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        function Export() {
            $("#tblCustomers").table2excel({
                filename: "Table.xls"
            });
        }
    </script>
    <script type="text/javascript">
      function Export2() {
          $("#intransactions").table2excel({
              filename: "Table.xls"
          });
      }
  </script>

  </body>
</html>
