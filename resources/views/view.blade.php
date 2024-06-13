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

    <div class="scroll-container2">
        <div class="container2">
            <div id="main">
                <h1 class="listName">Patient List</h1>
                <div class="bar"></div>
                <h1 class="listName">Doctor List</h1>
                
                {{-- patient list --}}
                <div id="patientList">
                    @forelse ($patients as $patient)
                    @if ($patient->status !== 'Discharged')
                    <div class="card" data-status="{{$patient->status}}">
                        <h2>{{$patient->lastName}}, {{$patient->firstName}}</h2>
                        <h3>{{$patient->status}}</h3>
                        <div class="line"></div>
                        <p><strong>Floor {{$patient->floor}}</strong>, Room {{$patient->room}}</p>
                        <p>{{$patient->dateAdmitted}}</p>
                        <br>
                        <h4>{{$patient->doctorName}}</h4>
                    </div>
                    @endif
                @empty
                    <h1>No Patient currently.</h1>
                @endforelse
                </div>
                <div class="bar"></div>
                {{-- doctor list --}}
                <div id="doctorList">
                    @forelse ($doctors as $doctor)
                    <div class="card" data-status="{{$doctor->status}}">
                        <h2>{{$doctor->lastName}},</h2>
                        <h3>{{$doctor->firstName}}</h3>
                        <div class="line"></div>
                        <p><strong>{{$doctor->specialty}}</strong>, Floor {{$doctor->floor}}</p>
                        <p>{{$doctor->status}}</p>
                    </div>
                @empty
                    <h1>No Doctors available.</h1>
                @endforelse
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/js.js')}}"></script>
    <script>
    document.addEventListener('keydown', function(e) {
        if(e.key == 'q') {
            window.location.href = "{{route('index')}}"
        }
    })
    </script>
</body>
</html>