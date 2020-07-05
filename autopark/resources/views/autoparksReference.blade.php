@extends('layouts.app')


@section('description')
    <h2>Информация про автопарки</h2>
    <hr size=200px color=#6c84b7><br>
        @for($i = 0; $i < count($autopark['name']); $i++)
            <br><span>Автопарк: {{ $autopark['name'][$i] }}<br></span>
            @for($j = 0; $j < count($autoparkData); $j++)
                @if(@array_key_exists($autopark['name'][$i], $autoparkData[$j]))

                    <div class="alert alert-info" role="alert">
                        <span style="margin-left: 6px">Имя водителя:  {{$autoparkData[$j][$autopark['name'][$i]]['name_driver']}}</span><br>
                        <span style="margin-left: 6px">Номер машины:  {{$autoparkData[$j][$autopark['name'][$i]]['number']}}</span><br>
                    </div>
                @endif
            @endfor
        @endfor
{{--            @foreach($autopark as $auto)--}}

{{--                --}}
{{--                @foreach($dataAutoparks as $dataAutopark)--}}
{{--                    @if($dataAutopark->name == $auto->name)--}}

{{--                        <div class="alert alert-info" role="alert">--}}
{{--                            <span style="margin-left: 6px">Имя водителя:  {{$dataAutopark->name_driver}}</span><br>--}}
{{--                            <span style="margin-left: 6px">Номер машины:  {{$dataAutopark->number}}</span><br><br>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}

{{--        @endforeach--}}
@endsection
