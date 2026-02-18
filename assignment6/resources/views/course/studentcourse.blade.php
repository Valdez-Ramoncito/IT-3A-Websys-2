<h1>Problem #2</h1>
@if (strtoupper($course) == "BSIT")
    <p style="color:blue">Course: </p><p>{{strtoupper($course)}}</p><br>
    <p style="color:blue">Year Level: </p><p>{{$yearlevel == null ? "N/A" : $yearlevel}}</p><br>
@elseif (strtoupper($course) == "EE")
    <p style="color:blue">Course: </p><p>{{strtoupper($course)}}</p><br>
    <p style="color:blue">Year Level: </p><p>{{$yearlevel == null ? "N/A" : $yearlevel}}</p><br>
@elseif (strtoupper($course) == "ME")
    <p style="color:blue">Course: </p><p>{{strtoupper($course)}}</p><br>
    <p style="color:blue">Year Level: </p><p>{{$yearlevel == null ? "N/A" : $yearlevel}}</p><br>
@endif