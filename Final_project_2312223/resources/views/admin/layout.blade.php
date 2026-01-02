<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Cake Bliss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="d-flex flex-column min-vh-100">

@include('partials.header')

<div class="container py-4 flex-grow-1">
    @yield('content')
</div>
@include('partials.footer')
</body>
</html>
