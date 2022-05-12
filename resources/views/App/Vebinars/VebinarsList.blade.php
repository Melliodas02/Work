@extends('layouts.app')

@section('content')
    <a href="/vebinars/add" class="btn btn-success">Добавить вебинар</a>

    <div class="container">
        <div class="p-3 row">
            <p class="col-4">Название</p>
            <p class="col-4">Статус</p>
            <p class="col-4">Действия</p>
        </div>
        @foreach ($data as $el)
            <div class="border border-1 rounded mt-2 p-3 row">
                <h2 class="col-4">{{ $el->Topic }}</h2>
                <p class="col-4">{{ $el->Stage }}</p>
                <div class="col-4 row">
                    @if( $el->Stage == "Подготовка доклада")
                        <a href="/vebinars/{{ $el->id }}/add_docs" class="btn btn-success row" >Добавить документы</a>
                    @endif
                    @if( $el->Stage == "Планирование вебинара")
                            <a href="/vebinars/{{ $el->id }}/add_date" class="btn btn-success row" >Выбрать дату</a>
                    @endif
                        <a href="/vebinars/{{ $el->id }}" class="btn btn-success mt-2 row">Подробнеее</a>
                </div>
            </div>
        @endforeach
    </div>
@stop
