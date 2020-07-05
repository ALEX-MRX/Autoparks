@extends('layouts.app')


@section('Editing')
    <form action="/autoparkCreate" method="POST">
        @csrf
        <span class="title">Автопарк</span><br><br>
        <div class="Autopark">
            <div>
                <span>Название</span><br><br>
                <span>Адрес</span><br><br>
                <span>График работы</span><br><br>
            </div>
            {{--  --}}
            @if($errors->get('nameAutopark') or $errors->get('address') or $errors->get('schedule') or count($errors->get('numberCar.*')) > 0 or count($errors->get('driverName.*')) > 0)
                <div>
                    <input type="text" name="nameAutopark" class="nameAutopark @error('nameAutopark') is-invalid @enderror"  value="{{session('nameAutopark')}}"><br>
                    @error('nameAutopark')
                        <span class="invalid-feedback" role="alert">
                            <div class="errors">
                                <strong>{{ $message }}</strong>
                            </div>
                        </span>
                    @enderror
                    <input type="text" name="address" class="address @error('address') is-invalid @enderror" value="{{session('address')}}"><br>
                     @error('address')
                        <span class="invalid-feedback" role="alert">
                            <div class="errors">
                                <strong>{{ $message}}</strong>
                            </div>
                        </span>
                    @enderror
                    <input type="text" name="schedule" class="schedule @error('schedule') is-invalid @enderror" value="{{session('schedule')}}"><br>
                     @error('schedule')
                        <span class="invalid-feedback" role="alert">
                            <div class="errors">
                                <strong>{{ $message }}</strong>
                            </div>
                        </span>
                    @enderror
                </div>
            @else
                <div>
                    <input type="text" name="nameAutopark" class="nameAutopark @error('nameAutopark') is-invalid @enderror"  value=""><br>
                    @error('nameAutopark')
                    <span class="invalid-feedback" role="alert">
                            <div class="errors">
                                <strong>{{ $message }}</strong>
                            </div>
                        </span>
                    @enderror
                    <input type="text" name="address" class="address @error('address') is-invalid @enderror" value=""><br>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                            <div class="errors">
                                <strong>{{ $message}}</strong>
                            </div>
                        </span>
                    @enderror
                    <input type="text" name="schedule" class="schedule @error('schedule') is-invalid @enderror" value=""><br>
                    @error('schedule')
                    <span class="invalid-feedback" role="alert">
                            <div class="errors">
                                <strong>{{ $message }}</strong>
                            </div>
                        </span>
                    @enderror
                </div>
            @endif
            {{--  --}}
        </div>
        <span class="title">Машины</span>
        <div class="Cars">
            <div class="carsItem">
                @if(count($errors->get('numberCar.*')) > 0 or count($errors->get('driverName.*')) > 0)
                    <div class="carDescription">
                        <div>
                            <span>Номер машины</span><br>
                            <input type="text" name="numberCar[]" class="numberCar @error('numberCar') is-invalid @enderror" value="{{session('number')[0]}}"><br>
                            @if(count($errors->get('numberCar.*')) > 0)
                                <strong style="color: red">The number car field is required.</strong>
                            @endif
                        </div>
                        <div>
                            <span>Имя водителя</span><br>
                            <input type="text" name="driverName[]" class="driverName @error('driverName') is-invalid @enderror" value="{{session('name_driver')[0]}}">
                            @if(count($errors->get('driverName.*')) > 0)
                                <strong style="color: red">The driver name field is required.</strong>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="carDescription">
                        <div>
                            <span>Номер машины</span><br>
                            <input type="text" name="numberCar[]" class="numberCar @error('numberCar') is-invalid @enderror" value=""><br>
                        </div>
                        <div>
                            <span>Имя водителя</span><br>
                            <input type="text" name="driverName[]" class="driverName @error('driverName') is-invalid @enderror" value="">
                        </div>
                    </div>
                @endif

            </div>
        </div>
        <br>
            <div class="buttons">
                <button class="btn btn-danger" id="delete_car" onclick="delete_car()">-</button><br><br>
                <button class="btn btn-primary" id="add_car" onclick="add_car()">+</button><br><br>
                <input class="btn btn-primary" type="submit"  value="Сохранить">
    {{--            <button class="btn btn-success" id="SaveAutopark">Сохранить</button>--}}
            </div>
    </form>
@endsection



