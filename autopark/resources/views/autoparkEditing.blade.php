@extends('layouts.app')


@section('Editing')
    <span class="title">Редактор автопарка</span>
    <hr size=200px color=#6c84b7>
    <div class="CarsEditing">
        @for($i = 0; $i < count($autoparks); $i++)
            <div class="carsItem">
                <div class="carDescription">
                    <div>
                        <span>Название</span><br>
                        <input type="text" name="nameAutopark" class="nameAutopark" value="{{$autoparks[$i]['name']}}">
                    </div>

                    <div>
                        <span>Адрес</span><br>
                        <input type="text" name="address" class="address" value="{{$autoparks[$i]['address']}}">
                    </div>

                    <div>
                        <span>График работы</span><br>
                        <input type="text" name="schedule" class="schedule" value="{{$autoparks[$i]['schedule']}}">
                    </div>
                </div>
            </div>
            <br>
            <button type="button" class="btn btn-primary" onclick="EditingAutopark({{$autoparks[$i]['id']}}, {{$i}})">Редактировать</button>
                <button class="btn btn-danger" onclick="deleteAuto({{$autoparks[$i]['id']}})">Удалить</button>
            <br><br>
            <hr width= 800px size=200px color=#6c84b7>
        @endfor
    </div>
@endsection
