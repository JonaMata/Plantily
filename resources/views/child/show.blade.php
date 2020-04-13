@extends('layouts.app', ['title' => 'Child Listing'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h4 class="card-header">Seed listing for {{ $child->plant->name }}</h4>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>Plant</th>
                                <td><a href="{{ route('plant.show', ['plant' => $child->plant]) }}">{{ $child->plant->name }}</a></td>
                            </tr>
                            <tr>
                                <th>Owner</th>
                                <td><a href="{{ route('user.index', ['user' => $child->plant->user->username]) }}">{{ $child->plant->user->username }}</a></td>
                            </tr>
                            <tr>
                                <th>Amount</th>
                                <td>{{ $child->amount }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>€{{ number_format($child->price, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $child->description }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
