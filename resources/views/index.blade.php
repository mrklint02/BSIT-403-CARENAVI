@php
    use Carbon\Carbon;
@endphp

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
    <div class="scroll-container">
        <div class="container">
            <header>
                <h1 id="name">CareNavi</h1>
                <img src="{{asset('assets/logos/logo2.png')}}" alt="Logo" id="logo">
            </header>
            <nav>
                <button onclick="view()" class="nav">View</button>
                <button onclick="dashboardView()" class="nav" id="dashb">Dashboard</button>
                <button onclick="patientList()" class="nav" id="ptnList">Patient List</button>
                <button onclick="doctorList()" class="nav" id="docList">Doctor List</button>
            </nav>

            <div id="dashboard" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <h1 class="h1">Welcome to CareNavi!</h1>
                <p class="p">View - Shows current patients and all doctors.</p>
                {{-- <p class="p" style="color: #F564A9;">Dashboard - 😉😉</p> --}}
                <p class="p">Patient List - View and update patients.</p>
                <p class="p">Doctor List - View and update doctors.</p>
            </div>

            {{-- <div id="dashboard" style="display: none; justify-content: center; align-items: center; height:50vh;">
                <h1 style="color: #F564A9">✨Izzaprankkk wala pa to✨</h1>
            </div> --}}
            
            <div id="patientTable" style="display: none; margin: 10px; flex-direction: column; gap:10px">
                <div>
                    <h1>Admit New Patient:</h1>
                    <form method="post">
                        @csrf
                        <input type="text" name="firstName" id="firstName" placeholder="First Name" required>
                        <input type="text" name="lastName" id="lastName" placeholder="Last Name" required>
                        <input type="number" name="room" id="room" placeholder="Room Number" required>
                        <input type="number" name="floor" id="floor" placeholder="Floor Number" required>
                        {{-- Status: --}}
                        <select name="status" id="status" required>
                            <option value="">Status</option>
                            <option value="Admitted">Admitted</option>
                            <option value="In Surgery">In Surgery</option>
                        </select>
                        <input type="datetime-local" name="dateAdmitted" id="dateAdmitted" required>
                        {{-- Doctor: --}}
                        <select name="doctorName" id="doctorName" required>
                            <option value="">Doctor</option>
                            @foreach ($doctorOptions as $doctor)
                                <option value="{{$doctor->fullName}}">{{$doctor->fullName}}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="Admit">
                    </form>
                    <div>
                        @if(session('message'))
                        <script>
                            alert("{{ session('message') }}");
                        </script>
                        @endif
                    </div>
                </div>
                <table border="1" class="table table-custom" style="text-align: center; width:100%; place-self:center;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Room & Floor</th>
                            <th scope="col">Date Admitted</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $patient)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$patient->firstName}} {{$patient->lastName}}</td>
                                <td>{{$patient->status}}</td>
                                <td>Room {{$patient->room}}, Floor {{$patient->floor}}</td>
                                <td>{{ Carbon::parse($patient->dateAdmitted)->format('M. d, Y h:i A') }}</td>
                                <td>{{$patient->doctorName}}</td>
            
                                @if ($patient->status == 'Discharged')
                                <td class="action">
                                    No action needed.
                                </td>
                                @else
                                <td>
                                    <a href="{{route('updPatient', $patient->id)}}">Change Status</a>
                                </td>
                                @endif
                                
                            </tr>
                        @empty
                            <tr>
                                <td>No Patient currently.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div id="doctorTable" style="display: none; margin:10px;">
                <table border="1" class="table table-custom" style="text-align: center; width:100%; place-self:center;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Specialty</th>
                            <th scope="col">Floor</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($doctors as $doctor)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$doctor->firstName}} {{$doctor->lastName}}</td>
                                <td>{{$doctor->specialty}}</td>
                                <td>{{$doctor->floor}}</td>
                                <td>{{$doctor->status}}</td>
                                <td>
                                    <a href="{{route('updDoctor', $doctor->id)}}">Change Status</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>No Doctors Currently.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/js.js')}}"></script>

    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            var currentDate = new Date();
            var utcOffset = 8 * 60;
            currentDate.setMinutes(currentDate.getMinutes() + utcOffset);
            var dateString = currentDate.toISOString().slice(0,16);
            document.getElementById('dateAdmitted').value = dateString;
        });

        function view() {
            window.location.href = " {{route('view')}} ";
        }
    </script>
</body>
</html>