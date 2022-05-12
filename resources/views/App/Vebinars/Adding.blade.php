@extends('layouts.app')

@section('title', 'Добавлние вебинара')

@section('content')
    <div class="card-body text-center">
        <h1>Добавление вебинара</h1>
        <form name="submit-add" id="submit-add" method="post" action="{{ url('/vebinars/submit-add') }}">
            @csrf
{{--            <div class="form-floating">--}}
{{--                <label for="date">Выберите дату</label>--}}
{{--                <input type="date" name="date" id="date" class="form-control" required>--}}
{{--            </div>--}}
            <div class="form-floating mt-2">
                <label for="topic">Введите тему вебинара</label>
                <input type="text" name="topic" id="topic" class="form-control" required>
            </div>

{{--            <div class="form-floating">--}}
{{--                <lebel for="textDoc">Выберите ваш тектовый документ</lebel>--}}
{{--                <input type="file" name="textDoc" id="textDoc" class="form-floating" required>--}}
{{--            </div>--}}
{{--            --}}
{{--            <div class="form-floating">--}}
{{--                <label for="slide">Выберите ваши слайды</label>--}}
{{--                <input type="file" name="slide" id="slide" class="form-floating" required>--}}
{{--            </div>--}}

            <button class="btn btn-success mt-2" type="submit">Отправить</button>
        </form>
    </div>
@stop
