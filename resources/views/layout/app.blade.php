<html>
<title>@yield('title')</title>

<body>
    <ol>
        <li><a href="/">Home</a></li>
        <li><a href="/contacts">Contacts</a></li>
        <li><a href="/about">About Us</a></li>
    </ol>
    <div class="content">
        @yield('content')
    </div>

</body>

</html>