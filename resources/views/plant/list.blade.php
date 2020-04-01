@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header clearfix">
                        <h4 class="d-inline">Your plants</h4>
                        <a href="{{ route('plant.add') }}" class="d-inline float-right btn btn-primary">Add Plant</a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($plants as $plant)
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card">
                                        @if($plant->image())
                                            <img class="card-img" src="{{ $plant->image() }}" alt="{{ $plant->name }}-image"/>
                                        @endif
                                        <div class="card-body">
                                            <h4>{{ $plant->name }}</h4>
                                            <h6>Family: {{ $plant->genus->family->name }}</h6>
                                            <h6>Genus: {{ $plant->genus->name }}</h6>
                                            <h6>Seeds: {{ $plant->seeds->sum('') }}</h6>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('plant.show', ['plant' => $plant]) }}" class="btn btn-primary">View</a>
                                            <a href="{{ route('plant.edit', ['plant' => $plant]) }}" class="btn btn-secondary">Edit</a>
                                            <a href="{{ route('plant.delete', ['plant' => $plant]) }}" class="btn btn-danger">Delete</a>
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
@endsection
