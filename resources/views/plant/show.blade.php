@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h4 class="card-header">{{ $plant->name }}</h4>
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
            <div class="col-md-4">
                <div class="card">
                    <h4 class="card-header">Seeds</h4>
                    <div class="card-body">
                        <h5>On sale</h5>
                        <div class="list-group list-group-flush">
                            @if(count($plant->seeds) == 0)
                                You don't have seeds of this plant on sale right now :(
                            @endif
                            @foreach($plant->seeds as $seed)
                                <a href="{{ route('seed.edit', ['seed' => $seed]) }}" class="list-group-item list-group-item-action">
                                    <strong>{{ $seed->amount }}</strong> seeds<br>
                                    €<strong>{{ number_format($seed->price, 2) }}</strong><br>
                                    {{ $seed->created_at->format('m-d-Y') }}
                                    <p>{{ $seed->description }}</p>
                                </a>
                            @endforeach
                        </div>
                        @if(count($plant->seeds) > 0)
                            <br>
                        @else
                            <hr>
                        @endif
                        <h5>Create new listing</h5>
                        <form action="{{ route('seed.create', ['plant' => $plant]) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" id="amount" name="amount" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <input type="number" step="0.01" min="0" id="price" name="price" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" id="description" name="description" class="form-control"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Create listing</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
