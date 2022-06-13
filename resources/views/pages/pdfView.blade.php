<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .page-break {
            page-break-after: always;
        }

        /* table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        } */

        #pdf {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #pdf td,
        #pdf th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #pdf tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #pdf th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #2f309e;
            color: white;
        }
    </style>

    <title>Excel To PDF - @yield('title')</title>
</head>

<body class="container-fluid">
    <div>
        <div class="container">

            @foreach ($excelData as $edata)
                @for ($j = 1; $j < count($edata); $j++)
                    <table id="pdf" class="page-break">
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
                        <tr class="">
                            @for ($k = 0; $k < count($edata[$j]); $k++)
                                @if (!is_null($edata[$j][$k]))
                                    <td>{{ $edata[$j][$k] }}</td>
                                @endif
                            @endfor
                        </tr>

                    </table>
                @endfor

            @endforeach
        </div>
    </div>
</body>

</html>
