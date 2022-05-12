@extends('layouts.app')

@section('title', 'Планирование даты')

@section('content')
    <div class="container">
        <h2>Планирование даты: {{ $data->Topic }}</h2>
        <form action="{{ url('/vebinars/'.$id.'/add_date_submit') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="">
                <label for="date">Введите дату</label>
                <input type="date" name="date" id="date" required class="form-control">
            </div>
            <div class=" mt-3">
                <label for="time">Введите время</label>
                <input type="time" name="time" id="time" required class="form-control">
            </div>

            <button class="btn btn-success mt-3" type="submit">Отправить</button>
        </form>
    </div>
@stop
