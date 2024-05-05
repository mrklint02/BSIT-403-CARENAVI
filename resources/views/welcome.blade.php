<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <header>
        <h1 id="name">CareNavi</h1>
        <img src="{{asset('assets/logos/logo.png')}}" alt="Logo" id="logo">
    </header>

    <div id="main">
        <h1 class="listName">Patient List</h1>
        <h1 class="listName">Doctor List</h1>
        
        {{-- patient list --}}
        <div id="patientList"></div>
        {{-- doctor list --}}
        <div id="doctorList"></div>
    </div>
</body>
</html>