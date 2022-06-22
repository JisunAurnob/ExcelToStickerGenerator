<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .page-break {
            page-break-after: always;
        }
        @page { size:5in 5in; }
    </style>

    <title>Excel To PDF - @yield('title')</title>
</head>

<body class="">
    <div>
        <div class="">
            @foreach ($excelData as $edata)
                @for ($j = 1; $j < count($edata); $j++)
                    @if ($edata[$j]!='')
                        <div id="pdf" class="page-break">
                            <p style="position: fixed; left: 8%; top: 0%; font-size: 30px;"><b>{{ $edata[$j][0] }}</b>
                            </p>
                            <p style="position: fixed; left: 35%; top: 35%; font-size: 25px;">
                                <b>{{ substr($edata[$j][1], 0, -2) }}</b>
                            </p>
                            <p style="position: fixed; right: 34.5%; top: 37%; font-size: 17px;">
                                <b>{{ $edata[$j][2] }}</b>
                            </p>
                            <p style="position: fixed; left: 0%; top: 37%; font-size: 22px; color:blue;"><b>X:
                                    {{ $edata[$j][4] }}</b></p>
                            <p style="position: fixed; left: 0%; top: 45%; font-size: 22px; color:green;"><b>Y:
                                    {{ $edata[$j][5] }}</b></p>
                            <p style="position: fixed; right: 0%; top: 82%; font-size: 25px;">
                                <b>{{ $edata[$j][3] }}</b>
                            </p>
                            <p style="position: fixed; right: 0%; top: 0%; font-size: 20px;">
                                <b>{{ $edata[$j][6] }}</b>
                            </p>
                            <p style="position: fixed; left: 0%; top: 78%; font-size: 20px;">
                                <b>{{ $edata[$j][7] }}</b>
                            </p>
                            <p style="position: fixed; left: 0%; top: 85%; font-size: 20px;">
                                <b>{{ $edata[$j][8] }}</b>
                            </p>
                            @if ($edata[$j][1] == '1 Ton')
                                <center>
                                    <div width="100%"><img style="max-width:100%; max-height:100%;"
                                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('stickers/1T.jpg'))) }}">
                                    </div>
                                </center>
                            @elseif($edata[$j][1] == '1/4 Ton' || $edata[$j][1] == '4 Ton')
                                <center>
                                    <div width="100%"><img style="max-width:100%; max-height:100%;"
                                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('stickers/1_4T.jpg'))) }}">
                                    </div>
                                </center>
                            @elseif($edata[$j][1] == '1/2 Ton')
                                <center>
                                    <div width="100%"><img style="max-width:100%; max-height:100%;"
                                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('stickers/2T_1000.jpg'))) }}">
                                    </div>
                                </center>
                            @elseif($edata[$j][1] == '2 Ton')
                                <center>
                                    <div width="100%"><img style="max-width:100%; max-height:100%;"
                                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('stickers/2T_4000.jpg'))) }}">
                                    </div>
                                </center>
                            @else
                                {{-- {{ $edata[$j][8] }} --}}
                            @endif
                        </div>
                    @endif
                @endfor
            @endforeach
        </div>
    </div>
</body>

</html>
