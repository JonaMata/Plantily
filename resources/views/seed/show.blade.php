@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h4 class="card-header">Seed listing for {{ $seed->plant->name }}</h4>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>Plant</th>
                                <td><a href="{{ route('plant.show', ['plant' => $seed->plant]) }}">{{ $seed->plant->name }}</a></td>
                            </tr>
                            <tr>
                                <th>Owner</th>
                                <td><a href="{{ route('user.index', ['user' => $seed->plant->user->username]) }}">{{ $seed->plant->user->username }}</a></td>
                            </tr>
                            <tr>
                                <th>Amount</th>
                                <td>{{ $seed->amount }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>€{{ number_format($seed->price, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $seed->description }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
