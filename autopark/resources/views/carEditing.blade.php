@extends('layouts.app')


@section('Editing')
    <form action="{{route('carEditing')}}" method="POST" id="form">
        @csrf
        @if(count($cars) != 0)
            <span class="title">Редкактор Машин</span>
            <hr size=200px color=#6c84b7>
            @foreach($cars as $index => $car)
            <div class="Cars">
                <div class="alert alert-info" role="alert">
                <div class="carsItem">
                    <div class="carDescription">
                        <div>
                            <span>Номер машины</span><br>
                            <input type="text" name="numberCar[]" class="numberCar" value="{{$car->number}}">
                        </div>
                        <div>
                            <span>Имя водителя</span><br>
                            <input type="text" name="driverName[]" class="driverName" value="{{$car->name_driver}}">
                        </div>
                    </div>
                </div>
                <br>

                <button type="button" class="btn btn-primary" id="editing" onclick="editingCar({{$car->id}}, {{$index}})">Редактировать</button>
                <br><br>
                </div>
            </div>
            @endforeach
            <br>
        @else
            <h1>У вас нет созданых машин, <a href="{{route('carCreate')}}">создать</a></h1>
        @endif
    </form>
@endsection
