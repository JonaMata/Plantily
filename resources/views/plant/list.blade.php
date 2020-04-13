@extends('layouts.app', ['title' => 'Plants'])

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
                                        @if($plant->image)
                                            <img class="card-img-top" src="{{ $plant->image }}"
                                                 alt="{{ $plant->name }}-image"/>
                                        @endif
                                        <div class="card-body">
                                            <div class="plant-info">
                                                <h4>{{ $plant->name }}</h4>
                                                <strong>{{ $plant->genus->family->name }} {{ $plant->genus->name }}</strong>
                                                <h6>Children: {{ $plant->children->sum('amount') }}</h6>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="GaugeMeter"
                                                     data-percent="{{ random_int(10, 90) }}"
                                                     data-append="%"
                                                     data-size="150"
                                                     data-width="15"
                                                     data-style="Arch"
                                                     data-text_size="0.22"
                                                     data-label="Health"
                                                ></div>
                                                <div class="GaugeMeter"
                                                     data-percent="{{ random_int(10, 90) }}"
                                                     data-append="%"
                                                     data-size="150"
                                                     data-width="15"
                                                     data-style="Arch"
                                                     data-text_size="0.22"
                                                     data-label="Humidity"
                                                ></div>
                                                <div class="GaugeMeter"
                                                     data-percent="{{ random_int(10, 90) }}"
                                                     data-append="%"
                                                     data-size="150"
                                                     data-width="15"
                                                     data-style="Arch"
                                                     data-text_size="0.22"
                                                     data-label="Nutrition"
                                                ></div>
                                                <div class="GaugeMeter"
                                                     data-percent="{{ random_int(10, 90) }}"
                                                     data-append="%"
                                                     data-size="150"
                                                     data-width="15"
                                                     data-style="Arch"
                                                     data-text_size="0.22"
                                                     data-label="Light"
                                                ></div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('plant.show', ['plant' => $plant]) }}"
                                               class="btn btn-primary">View</a>
                                            <a href="{{ route('plant.edit', ['plant' => $plant]) }}"
                                               class="btn btn-secondary">Edit</a>
                                            <a href="{{ route('plant.delete', ['plant' => $plant]) }}"
                                               class="btn btn-danger">Delete</a>
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
