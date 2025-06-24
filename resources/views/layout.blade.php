<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/">Mairie</a>
    <div>
      <a class="nav-link text-white d-inline" href="/mairie">La Mairie</a>
      <a class="nav-link text-white d-inline" href="/actualites">Actualités</a>
      <a class="nav-link text-white d-inline" href="/services">Services</a>
      <a class="nav-link text-white d-inline" href="/contact">Contact</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<footer class="bg-dark text-white text-center p-3 mt-4">
    © 2025 Mairie du Tchad. Tous droits réservés.
</footer>

</body>
</html>