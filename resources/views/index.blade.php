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
        <button onclick="view()" class="nav">View</button>
        <button onclick="" class="nav">Dashboard</button>
        <button onclick="patientList()" class="nav">Patient List</button>
        <button onclick="doctorList()" class="nav">Doctor List</button>
    </nav>

    <div id="patientTable" style="display: none">
        <div>
            <table>
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
                        <tr>
                            <td>No Patient currently.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div>
            <h1>Admit New Patient:</h1>
            <form method="post">
                @csrf
                <input type="text" name="firstName" id="firstName" placeholder="First Name">
                <input type="text" name="lastName" id="lastName" placeholder="Last Name">
                Status:
                <select name="status" id="status">
                    <option value="Admitted">Admitted</option>
                    <option value="Discharged">Discharged</option>
                    <option value="In Surgery">In Surgery</option>
                    <option value="In Recovery">In Recovery</option>
                    <option value="Critical Condition">Critical Condition</option>
                    <option value="Stable">Stable</option>
                </select>
                <input type="number" name="roomNumber" id="roomNumber" placeholder="Room Number">
                <input type="number" name="floorNumber" id="floorNumber" placeholder="Floor Number">
                <input type="date" name="dateAdmitted" id="dateAdmitted">
                <input type="text" name="doctorName" id="doctorName" placeholder="Doctor Name">
                <input type="submit" value="Admit">
            </form>
        </div>
    </div>

    <div id="doctorTable" style="display: none">
        <div>
            <table>
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
                        <tr>
                            <td>No Doctors Currently.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div>
            
        </div>
    </div>

    <script src="{{asset('assets/js/js.js')}}"></script>
    <script>
        function view() {
            window.location.href = " {{route('view')}} ";
        }
    </script>
</body>
</html>