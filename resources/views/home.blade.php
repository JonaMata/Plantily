@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        <h4>Plants</h4>
                        <ul>
                            @foreach(Auth::user()->plants() as $plant)
                                <li>
                                    <strong>Name: </strong>{{ $plant->name }}<br>
                                    <strong>Family: </strong>{{ $plant->genus()->family()->name }}<br>
                                    <strong>Genus: </strong>{{ $plant->genus()->name }}<br>
                                    <strong>Seeds: {{ count($plant->seeds()) }}</strong>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
