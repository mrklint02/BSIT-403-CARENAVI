<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <div class="centered">
        <h1 class="h1">Change {{$patient->firstName}} {{$patient->lastName}}'s status.</h1>
        <form action="{{route('updatePatient', $patient->id)}}" method="post">
            @csrf
            <select name="status" id="status" class="updateSelection">
                <option value="{{$patient->status}}">{{$patient->status}}</option>
                <option value="Admitted">Admitted</option>
                <option value="In Surgery">In Surgery</option>
                <option value="In Recovery">In Recovery</option>
                <option value="Critical Condition">Critical Condition</option>
                <option value="Stable">Stable</option>
                <option value="Discharged">Discharged</option>
            </select>
            <button type="submit" class="updateBtn">Change</button>
        </form>
        <div>
            @if(session('message'))
            <script>
                alert("{{ session('message') }}");
            </script>
            @endif
        </div>
    </div>
</body>
</html>