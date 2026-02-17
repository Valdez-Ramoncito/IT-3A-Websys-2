@php
    $average = ($prelimgrade + $midtermgrade + $finalgrade) / 3;
    $remarks = "";
    $awards = "";
    $lettergrade = "";
@endphp

@if($average >= 98 && $average <= 100)
    @php $remarks = "Passed"; $awards = "With Highest Honors"; $lettergrade = "A"; @endphp
@elseif($average >= 95 && $average <= 97)
    @php $remarks = "Passed"; $awards = "With High Honors"; $lettergrade = "A"; @endphp
@elseif($average >= 90 && $average <= 94)
    @php $remarks = "Passed"; $awards = "With Honors"; $lettergrade = "A"; @endphp
@elseif($average >= 80 && $average <= 89)
    @php $remarks = "Passed"; $awards = "No Award"; $lettergrade = "B"; @endphp
@elseif($average >= 75 && $average <= 79)
    @php $remarks = "Passed"; $awards = "No Award"; $lettergrade = "C"; @endphp
@elseif($average >= 70 && $average <= 74)
    @php $remarks = "Failed"; $awards = "No Award"; $lettergrade = "C"; @endphp
@elseif($average >= 60 && $average <= 69)
    @php $remarks = "Failed"; $awards = "No Award"; $lettergrade = "D"; @endphp
@else
    @php $remarks = "Failed"; $awards = "No Award"; $lettergrade = "F"; @endphp
@endif

<p style="color: green">Name: </p><p>{{$studname}}</p><br>
<p style="color: green">Preliminary Grade: </p><p>{{$prelimgrade}}</p><br>
<p style="color: green">Midterm Grade: </p><p>{{$midtermgrade}}</p><br>
<p style="color: green">Final Grade: </p><p>{{$finalgrade}}</p><br><br>

<p style="color: green">Average: </p><p>{{number_format($average, 2)}}</p><br>
<p style="color: green">Letter Grade: </p><p>{{$lettergrade}}</p><br>
<p style="color: green">Remarks: </p><p>{{$remarks}}</p><br>
<p style="color: green">Award: </p><p>{{$awards}}</p><br>