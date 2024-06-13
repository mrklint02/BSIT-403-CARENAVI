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
        <h1 class="h1">Change {{$doctor->firstName}} {{$doctor->lastName}}'s status.</h1>
        <form action="{{route('updateDoctor', $doctor->id)}}" method="post">
            @csrf
            <select name="status" id="status" class="updateSelection">
                <option value="{{$doctor->status}}">{{$doctor->status}}</option>
                'Available','On Call','Off Duty','In Surgery','In Rounds','On Vacation'
                <option value="Available">Available</option>
                <option value="In Surgery">In Surgery</option>
                <option value="On Call">On Call</option>
                <option value="Off Duty">Off Duty</option>
                <option value="In Rounds">In Rounds</option>
                <option value="On Vacation">On Vacation</option>
            </select>
            <button type="submit" class="updateBtn">Change</button>
        </form>
    </div>
</body>
</html>