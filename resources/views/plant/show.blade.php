@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $plant->name }}</div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>Name</th>
                                <td>{{ $plant->name }}</td>
                            </tr>
                            <tr>
                                <th>Owner</th>
                                <td><a href="{{ route('user.index', ['user' => $plant->user->username]) }}">{{ $plant->user->username }}</a></td>
                            </tr>
                            <tr>
                                <th>Family</th>
                                <td>{{ $plant->genus->family->name }}</td>
                            </tr>
                            <tr>
                                <th>Genus</th>
                                <td>{{ $plant->genus->name }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('plant.edit', ['plant' => $plant]) }}" class="btn btn-secondary">Edit</a>
                        <a href="{{ route('plant.delete', ['plant' => $plant]) }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
