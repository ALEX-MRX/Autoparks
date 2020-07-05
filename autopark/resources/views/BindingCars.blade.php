@extends('layouts.app')


@section('Editing')
    <span class="title">Привязка машин</span>
    <hr size=200px color=#6c84b7>
    <div class="Cars">
        @for($i = 0; $i < count($infoCar['name_driver']); $i++)
            <span >Имя водителя: {{$infoCar['name_driver'][$i]}}</span><br>
            <span >Номер машины: {{$infoCar['number'][$i]}}</span><br>
            <span>Привязана к :</span>
            <span>{{$infoCar['autopark'][$i]}}</span><br><br>
            <select class="select" id="selectElement"  name={{$i}} multiple>
                @for($j = 0; $j < count($ListNameAutopark); $j++)
                    <option>
                        {{$ListNameAutopark[$j]}}
                    </option>
                @endfor
            </select><br><br>
            <button type="button" class="btn btn-primary" id="ChangeMachineBinding"  onclick="ChangeCar({{$i}}, {{$infoCar['id'][$i]}})">Изменить привязку</button><br>
            <hr color=#6c84b7>
        @endfor
            {{--        @for($j = 0; $j < count($carName['name_driver']); $j++)--}}
{{--            <span >Имя водителя: {{$carName['name_driver'][$j]}}</span><br>--}}
{{--            <span >Номер машины: {{$carName['number'][$j]}}</span><br>--}}
{{--            <span>Привязана к автопарку:</span>--}}
{{--            <br>--}}
{{--            <select class="select" id="selectElement"  name={{$j}} multiple>--}}
{{--                    @for($i = 0; $i < count($nameAutopark['name']); $i++)--}}
{{--                            <span>{{$carName['autopark'][$j]}}</span>--}}
{{--                        @if($nameAutopark['name'][$i] == $carName['autopark'][$j])--}}
{{--                            <option selected>{{$carName['autopark'][$j]}}</option>--}}
{{--                        @else--}}
{{--                            <option>{{$nameAutopark['name'][$i]}}</option>--}}

{{--                        @endif--}}
{{--                    @endfor--}}
{{--            </select><br><br>--}}
{{--            <button type="button" class="btn btn-primary" id="ChangeMachineBinding"  onclick="ChangeCar({{$j}}, {{$carName['id'][$j]}})">Изменить привязку</button><br>--}}
{{--            <hr color=#6c84b7>--}}
{{--                <br>--}}
{{--        @endfor--}}
    </div>
@endsection
