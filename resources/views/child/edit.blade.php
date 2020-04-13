@extends('layouts.app', ['title' => 'Edit Listing'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit seed listing for {{ $seed->plant->name }}</div>
                    <form method="POST">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" id="amount" name="amount" class="form-control" value="{{ $seed->amount }}"/>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <input type="number" step="0.01" min="0" id="price" name="price" class="form-control" value="{{ number_format($seed->price, 2) }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" id="description" name="description" class="form-control" value="{{ $seed->description }}"/>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update listing</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
