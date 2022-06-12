@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="container">
    <h1>hello</h1>
    @foreach($excelData as $edata)
    <p>{{$edata}}</p><br>
    @endforeach
    <table class="table table-borded">
        <tr>
            <th>Serial</th>
            <th>Hoist Label</th>
            <th>Hoist Type</th>
            <th>Function</th>
            <th>Total Point Load</th>
            <th>X</th>
            <th>Y</th>
            <th>LAYER</th>
            <th>NAME</th>
            <th>SYMBOL USED</th>
            <th></th>
        </tr>
        {{$i = 1;}}
        @foreach($excelData as $edata)
            <tr>
                <td>{{$i}}</td>
                {{-- @for($j=2;$j<10;$j++)
                
                <td>{{$edata[$j]}}</td>
                @endfor --}}
                {{-- <td>{{$edata->Hoist_Label}}</td>
                <td>{{$edata->Hoist_Type}}</td>
                <td>{{$edata->Function}}</td>
                
                <td>{{$edata->Total_Point_Load}}</td>
                <td>{{$edata->X}}</td>
                <td>{{$edata->Y}}</td>
                <td>{{$edata->LAYER}}</td>
                <td>{{$edata->NID}}</td>
                <td>{{$edata->NAME}}</td>
                <td>{{$edata->SYMBOL_USED}}</td> --}}
                {{$i++;}}
        @endforeach
    </table>
</div>

@endsection