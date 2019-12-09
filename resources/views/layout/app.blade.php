<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>
    @yield('title')</title>
    </head>


<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
     <a class="navbar-brand" href="/">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="/acceleration">Accelerometer</a>
      <a class="nav-item nav-link" href="/location">GPS location</a>
      <a class="nav-item nav-link" href="/gyroscope">Gyroscope</a>
      
    </div>
  </div>
</nav>

  <div class="container-fluid">
    @yield('content')
</div>
</body>

</html>