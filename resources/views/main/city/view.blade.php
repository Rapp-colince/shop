@extends('main.layouts.app')

@section('title', 'Город ' . $city['name'])
@section('header-main', 'Просмотр города ' . $city['name'])

@section('content-main')
    @if(!empty($city))
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
                <td>{{ $city['id'] }}</td>
            </tr>
            <tr>
                <td>Имя</td>
                <td>{{ $city['name'] }}</td>
            </tr>
            <tr>
                <td>Дата создания</td>
                <td> @if(!is_null($city['created_at'])) {{ (new \Carbon\Carbon($city['created_at']))->format('d.m.Y H:i:s') }} @endif</td>
            </tr>
            <tr>
                <td>Дата обновления</td>
                <td> @if(!is_null($city['updated_at'])) {{ (new \Carbon\Carbon($city['updated_at']))->format('d.m.Y H:i:s') }} @endif</td>
            </tr>
            @if(!empty($shops))
                <tr>
                    <td>Магазины</td>
                    <td>
                        <div class="list-group list-group-item-action active" aria-current="true">
                            @foreach($shops as $shop)
                                <a href="{{ route('shop.view', ['id' => $shop['id']]) }}" class="list-group-item list-group-item-action">{{ $shop['name'] }}</a>
                            @endforeach
                        </div>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    @endif
@endsection



