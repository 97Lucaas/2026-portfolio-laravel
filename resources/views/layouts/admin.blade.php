<!doctype html>
<html>
<head>
  <title>Admin</title>
  <link rel="stylesheet" href="{{ asset('admin.css') }}">
</head>
<body>
  <nav>
    <a href="/admin">Dashboard</a>
    <a href="/admin/projects">Projects</a>
    <a href="/admin/rates">Rates</a>
    <form method="POST" action="/logout">@csrf<button>Logout</button></form>
  </nav>

  <main>
    @yield('content')
  </main>
</body>
</html>
