@extends('layouts.app', ['title' => 'Shop'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header clearfix">
                        <h4 class="d-inline">Shop</h4>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs" id="shopTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="item-tab" data-toggle="tab" href="#item-shop" role="tab"
                                   aria-controls="item-shop" aria-selected="true">Items</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="plant-tab" data-toggle="tab" href="#plant-shop" role="tab"
                                   aria-controls="plant-shop" aria-selected="false">Plants</a>
                            </li>
                        </ul>
                        <br/>
                        <div class="tab-content" id="shopTabContent">
                            <div class="tab-pane fade show active" id="item-shop" role="tabpanel"
                                 aria-labelledby="item-tab">
                                @foreach($shopItems as $item)
                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                        <div class="card">
                                            @if(false)
                                                <img class="card-img" src="{{ $item->image() }}"
                                                     alt="{{ $item->name }}-image"/>
                                            @endif
                                            <div class="card-body">
                                                <h4>
                                                    <a href="{{ route('shop.item', ['item' => $item]) }}">{{ $item->name }}</a>
                                                </h4>
                                                <h6>Description: {{ $item->description }}</h6>
                                                <h6>Price: €{{ number_format($item->price, 2) }}</h6>
                                                <h6>Stock: {{ $item->stock }}</h6>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-primary">Buy</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="plant-shop" role="tabpanel" aria-labelledby="plant-tab">
                                @foreach($children as $child)
                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                        <div class="card">
                                            @if($child->plant->image())
                                                <img class="card-img" src="{{ $child->plant->image() }}"
                                                     alt="{{ $child->plant->name }}-image"/>
                                            @endif
                                            <div class="card-body">
                                                <h4>
                                                    <a href="{{ route('child.index', ['child' => $child]) }}">{{ $child->plant->name.' '.($child->amount > 1 ? Str::plural($child->typeString()) : $child->typeString()) }}</a>
                                                </h4>
                                                <h6>Description: {{ $child->description }}</h6>
                                                <h6>Amount: {{ $child->amount }}</h6>
                                                <h6>Price: €{{ number_format($child->price, 2) }}</h6>
                                                <h6>Plant: <a
                                                        href="{{ route('plant.show', ['plant' => $child->plant]) }}">{{ $child->plant->name }}</a>
                                                </h6>
                                                <h6>Owner: <a
                                                        href="{{ route('user.index', ['user' => $child->plant->user->username]) }}">{{ $child->plant->user->username }}</a>
                                                </h6>
                                                <h6>Family: {{ $child->plant->genus->family->name }}</h6>
                                                <h6>Genus: {{ $child->plant->genus->name }}</h6>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-primary">Buy</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
