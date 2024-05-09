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
    <nav>
        <button onclick="view()" class="nav">View</button>
        <button onclick="" class="nav">Dashboard</button>
        <button onclick="patientList()" class="nav">Patient List</button>
        <button onclick="doctorList()" class="nav">Doctor List</button>
    </nav>

    <table id="patientTable" style="display: none">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Room & Floor</th>
                <th>Date Admitted</th>
                <th>Doctor</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($patients as $patient)
                <tr>
                    <td>{{$patient->firstName}} {{$patient->lastName}}</td>
                    <td>{{$patient->status}}</td>
                    <td>Room {{$patient->room}}, Floor {{$patient->floor}}</td>
                    <td>{{$patient->dateAdmitted}}</td>
                    <td>{{$patient->doctorName}}</td>
                </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>

    <table id="doctorTable" style="display: none">
        <thead>
            <tr>
                <th>Name</th>
                <th>Specialty</th>
                <th>Floor</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($doctors as $doctor)
                <tr>
                    <td>{{$doctor->firstName}} {{$doctor->lastName}}</td>
                    <td>{{$doctor->specialty}}</td>
                    <td>{{$doctor->floor}}</td>
                    <td>{{$doctor->status}}</td>
                </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>

    <script src="{{asset('assets/js/js.js')}}"></script>
    <script>
        function view() {
            window.location.href = "{{ route('view') }}";
        }
    </script>
</body>
</html>