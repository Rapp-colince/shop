@extends('main.layouts.app')

@section('title', 'Магазин ' . $shop['name'])
@section('header-main', 'Просмотр магазина ' . $shop['name'])

@section('content-main')
    @if(!empty($shop))
        <table class="table w-auto">
            <thead>
            <tr>
                <th></th>
                <th>Значение</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>id</td>
                <td>{{ $shop['id'] }}</td>
            </tr>
            <tr>
                <td>Имя</td>
                <td>{{ $shop['name'] }}</td>
            </tr>
            <tr>
                <td>Дата создания</td>
                <td> @if(!is_null($shop['created_at'])) {{ (new \Carbon\Carbon($shop['created_at']))->format('d.m.Y H:i:s') }} @endif</td>
            </tr>
            <tr>
                <td>Дата обновления</td>
                <td> @if(!is_null($shop['updated_at'])) {{ (new \Carbon\Carbon($shop['updated_at']))->format('d.m.Y H:i:s') }} @endif</td>
            </tr>
            @if(!empty($city))
                <tr>
                    <td>Город</td>
                    <td>
                        <a href="{{ route('city.view', ['id' => $city['id']]) }}">{{ $city['name'] }}</a>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    @endif
@endsection



