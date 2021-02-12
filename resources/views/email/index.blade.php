<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($participants as $participant)
        @foreach ($participant->fakulteti as $fakultet)
            @if ($fakultet->id == 3)
                {{ $participant->email }}
                <br>
                @foreach ($participant->fakulteti as $fakultet)
                    {{ $fakultet->naziv }}
                @endforeach
                <br> <br> <br>
            @elseif(  $fakultet->id  == 5)
                {{ $participant->email }}
                <br>
                @foreach ($participant->fakulteti as $fakultet)
                    {{ $fakultet->naziv }}
                @endforeach
                <br> <br> <br>
            @elseif( $fakultet->id  == 11)
                {{ $participant->email }}
                <br>
                @foreach ($participant->fakulteti as $fakultet)
                    {{ $fakultet->naziv }}
                @endforeach
                <br> <br> <br>
            @elseif(  $fakultet->id  == 20)
                {{ $participant->email }}
                <br>
                @foreach ($participant->fakulteti as $fakultet)
                    {{ $fakultet->naziv }}
                @endforeach
                <br> <br> <br>
            @elseif( $fakultet->id  == 26)
                {{ $participant->email }}
                <br>
                @foreach ($participant->fakulteti as $fakultet)
                    {{ $fakultet->naziv }}
                @endforeach
                <br> <br> <br>
            @elseif(  $fakultet->id  == 27)
                {{ $participant->email }}
                <br>
                @foreach ($participant->fakulteti as $fakultet)
                    {{ $fakultet->naziv }}
                @endforeach
                <br> <br> <br>
            @elseif(  $fakultet->id  == 17)
                {{ $participant->email }}
                <br>
                @foreach ($participant->fakulteti as $fakultet)
                    {{ $fakultet->naziv }}
                @endforeach
                <br> <br> <br>
            @elseif(  $fakultet->id  == 18)
                {{ $participant->email }}
                <br>
                @foreach ($participant->fakulteti as $fakultet)
                    {{ $fakultet->naziv }}
                @endforeach
                <br> <br> <br>
            @elseif(  $fakultet->id == 6)
                {{ $participant->email }}
                <br>
                @foreach ($participant->fakulteti as $fakultet)
                    {{ $fakultet->naziv }}
                @endforeach
                <br> <br> <br>
            @endif
        @endforeach
    @endforeach

</body>
