@extends('layouts.main')

@section('title', 'Meta test 1')

@section('content')
    <div class="row h-100 justify-content-center align-items-center">
        <form action="/check" class="col-12">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Введите строку">
            </div>
            <button type="submit" class="btn btn-success offset-5 col-2">Проверить</button>

            <p>
            <div class="alert" role="alert"></div>
            </p>

        </form>
    </div>
@stop
