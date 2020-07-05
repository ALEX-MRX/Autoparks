@extends('layouts.app')

@section('description')
    <span class="title">Ваши созданые машины</span>
    <div class="Cars">
        @foreach($cars as $car)
            <div class="alert alert-info" role="alert">
                <br>
                <span style="margin-left: 100px">Имя водителя: {{$car->name_driver}}</span><br>
                <span style="margin-left: 100px">Номер машины: {{$car->number}}</span><br>
                @if($car->autopark != "")
                    <span style="margin-left: 100px">Автопарк: {{$car->autopark}}</span><br>
                @else
                    <span style="margin-left: 100px;">Автопарк: <span style="color: grey">Нет привязки</span></span><br>
                @endif
            </div>
            <br>
        @endforeach
    </div>
@endsection
