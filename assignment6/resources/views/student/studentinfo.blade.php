<h1>Problem #1</h1>
@if ($name == "Maria" || $name == "maria")
    <p style="color:blue">Student ID: </p><p>{{$studID}}</p><br>
    <p style="color:blue">Student Name: </p><p>{{$name}}</p><br>
@elseif ($name == "John" || $name == "john")
    <p style="color:blue">Student ID: </p><p>{{$studID}}</p><br>
    <p style="color:blue">Student Name: </p><p>{{$name}}</p><br>
@elseif ($name == "Ramoncito" || $name == "ramoncito")
    <p style="color:blue">Student ID: </p><p>{{$studID}}</p><br>
    <p style="color:blue">Student Name: </p><p>{{$name}}</p><br>
@endif