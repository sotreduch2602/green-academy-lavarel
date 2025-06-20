<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Template</title>
</head>
<body class="bg-dark">
    <header class="bg-primary text-white text-center py-3 m-3">
        <h1>Header</h1>
        <nav class="navbar navbar-light bg-light text-dark text-center flex justify-content-center p-3 m-3">
            <div class="w-full">Navigation</div>
        </nav>
    </header>

    <div class="body-container py-3 m-3">
        <div class="row">
            <div class="col bg-success">
                sidebar right
                {{-- @yield('sidebar-right') --}}
                {{-- thêm vào --}}
                @section('sidebar-left')
                    <p>Default Sidebar right content goes here.</p>
                @show
            </div>
            <div class="col bg-danger">
                sidebar left
                {{-- ghi đè --}}
                @yield('sidebar-right')
            </div>
        </div>
    </div>

    <footer class="bg-secondary text-white text-center py-3 m-3">
        <p>Footer</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
