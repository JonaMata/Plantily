@extends('layouts.app', ['title' => 'dashboard'])

@section('content')
    <div class="master-header">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-6 col-8 offset-md-3 offset-1 text-left">
                    <h1>Do you love your plants?</h1>
                    <p class="lead">
                        Join <b>MarketPlants</b> now and share the joy of plants with the rest of the world!
                    </p>
                    <hr>
                    <p>
                        Become part of MarketPlants to get tips and tricks on taking even better care of your plants.
                        Share your plants with the world and maybe even earn some money by selling seed or shoots on our marketplace.
                    </p>
                    <p class="lead">
                        <a href="/register" class="btn btn-primary btn-lg">
                            Join For Free
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
