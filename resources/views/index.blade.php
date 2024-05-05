<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CareNavi</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <header>
        <h1 id="name">CareNavi</h1>
        <img src="{{asset('assets/logos/logo2.png')}}" alt="Logo" id="logo">
    </header>
    <nav>
        <a href="{{route('view')}}">View</a>
        <a href="{{route('index')}}">Dashboard</a>
        <a href="">Patient List</a>
        <a href="">Doctor List</a>
    </nav>

</body>
</html>