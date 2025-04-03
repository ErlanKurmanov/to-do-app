<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To do list</title>
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <header class="app-header">
        <div class="header">
            <a href="/" class="logo">
                <img src="images/logoipsum-327.svg" alt="Logo"/>
            </a>
            <h1>Task</h1>
        </div>
    </header>
        {{ $slot }}

        
    <script src="/js/app.js"></script>
</body>
</html>
