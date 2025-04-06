<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>To do list</title>
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <header class="app-header">
        <div class="header">
            <a href="/" class="logo">
                {{-- <img src="{{asset('images/logoipsum-327.svg')}}" alt="Logo"/> --}}
                <h1>Task</h1>
            </a>
        </div>
    </header>
        {{ $slot }}
        
    <script src="/js/app.js"></script>
</body>
</html>
