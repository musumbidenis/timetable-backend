@include('layouts.header')

<body class="">

  @include('sweetalert::alert')
  @include('layouts.sidebar')
  @yield('content')
  @include('layouts.scripts')


</body>