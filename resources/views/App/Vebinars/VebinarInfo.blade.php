@extends('layouts.app')

@section('title', $data->Topic)

@section('content')
    <div>
        <h5>Тема: {{ $data->Topic }}</h5>
        <h5>Этап: {{ $data->Stage }}</h5>
        <h5>Дата и время: @if ($data->Stage == "Планирование вебинара") <a href="{{ url('/vebinars/'.$data->id.'/add_date_time') }}" class="btn btn-success">Задать время</a> @else {{ $data->DateTime }} @endif</h5>
        <h5>Ссылка на трансляцию: {{ $data->Address }}</h5>
        <h4>Документы:</h4>
        <div class="ms-2">
            @foreach($docs as $el)
                <div class="border border-1 p-4 mb-2">
                    <p>{{ $el->Description }}</p>
                    <a href="{{ $el->FileSrc }}">Скачать</a>
                </div>
            @endforeach
        </div>
    </div>
@stop
