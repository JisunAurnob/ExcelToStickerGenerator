@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
    <div class="container">
        <p></p>
        <a style="float: right" href="/pdf/pdfdownload/{{ $id }}" class="btn btn-Info">Download PDF</a>
        <table class="table table-borded">
            <tr>
                {{-- <th>Serial</th> --}}
                <th>Hoist Label</th>
                <th>Hoist Type</th>
                <th>Function</th>
                <th>Total Point Load</th>
                <th>X</th>
                <th>Y</th>
                <th>LAYER</th>
                <th>NAME</th>
                <th>SYMBOL USED</th>
            </tr>
            @foreach ($excelData as $edata)
                @for ($j = 1; $j < count($edata); $j++)
                    <tr class="page-break">
                        @for ($k = 0; $k < count($edata[$j]); $k++)
                            <td>{{ $edata[$j][$k] }}</td>
                        @endfor
                    </tr>
                @endfor

            @endforeach
        </table>
    </div>

@endsection
