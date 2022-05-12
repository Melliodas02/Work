@extends('layouts.app')

@section('title', 'Добавление документов')

@section('content')
    <div class="container">
        <h1>Добавление документов для вебинара: {{ $data->Topic }}</h1>
        <form action="{{ url('/vebinars/'.$id.'/submit_add_docs') }}" method="post" enctype="multipart/form-data">
            @csrf

            <h3>Выберите текстовый документ</h3>
            <div class="mb-3">
                <input class="form-control" type="file" name="doc" id="doc" required>
                <div class="form-floating mt-2">
                    <label for="docDesc">Введите описание файла</label>
                    <textarea class="form-control" id="docDesc" name="docDesc" style="min-height: 255px;" ></textarea>
                </div>
            </div>

            <h3>Выберите слайды</h3>
            <div class="mb-3">
                <input class="form-control" type="file" name="slide" id="slide" required>
                <div class="form-floating mt-2">
                    <label for="docSlide">Введите описание файла</label>
                    <textarea class="form-control" id="docSlide" name="docSlide" style="min-height: 255px;"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Добавить</button>
        </form>
    </div>
@endsection
