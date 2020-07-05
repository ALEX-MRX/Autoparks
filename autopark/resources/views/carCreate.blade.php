@extends('layouts.app')

@section('carCreate')
    <span class="title">Регистрация машины</span>
    <hr size=200px color=#6c84b7>
    <form action="/carCreate" method="POST">
        @csrf
        <div class="carsItem">
            <div class="carDescription">
                <div>
                    <span>Номер машины</span><br>
                    <input type="text" name="numberCar" class="numberCar @error('numberCar') is-invalid @enderror">
                    @error('numberCar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <span>Имя водителя</span><br>
                    <input type="text" name="driverName" class="driverName @error('driverName') is-invalid @enderror">
                    @error('driverName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <br>
{{--        <input class="btn btn-primary" type="submit" value="Create">--}}
        <button type="button"  id="createCar" class="btn btn-primary">Создать</button>
    </form>
@endsection


