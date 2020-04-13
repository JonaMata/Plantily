@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <h3 class="d-inline border-left-custom">Your plants</h3>
                <a href="{{ route('plant.add') }}" class="d-inline float-right btn btn-primary"><i class="fas fa-plus"></i></a>
            </div>
        </div>

        @foreach($plants as $plant)
            <div class="row py-3 mx-2">
                <div class="col-lg-3 col-4">
                    <div class="row">
                        @if($plant->image)
                            <img class="card-img-top" style="border-radius: 15%" src="{{ $plant->image }}"
                                 alt="{{ $plant->name }}-image"/>
                        @endif
                    </div>
                    <div class="row justify-content-between px-4 pt-2 h5">
                        <a href="{{ route('plant.show', ['plant' => $plant]) }}"
                           class="text-primary m-1"><i class="far fa-eye"></i></a>
                        <a href="{{ route('plant.edit', ['plant' => $plant]) }}"
                           class="text-secondary m-1"><i class="far fa-edit"></i></a>
                        <a href="{{ route('plant.delete', ['plant' => $plant]) }}"
                           class="text-danger m-1"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
                <div class="col-lg-8 col-7 p-4 ml-3">
                    <div class="row mb-3">
                        <div class="plant-info">
                            <h2>{{ $plant->name }}</h2>
                            <span class="badge badge-primary p-2 mr-2">{{ $plant->genus->family->name }} {{ $plant->genus->name }}</span>
                            <b>Children: {{ $plant->children->sum('amount') }}</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row justify-content-left">
                            <div class="GaugeMeter ml-md-5 d-md-block d-none"
                                 data-percent="{{ random_int(10, 90) }}"
                                 data-append="%"
                                 data-size="150"
                                 data-width="15"
                                 data-style="Arch"
                                 data-text_size="0.22"
                                 data-label="Health"
                            ></div>
                            <div class="GaugeMeter d-lg-block d-none"
                                 data-percent="{{ random_int(10, 90) }}"
                                 data-append="%"
                                 data-size="150"
                                 data-width="15"
                                 data-style="Arch"
                                 data-text_size="0.22"
                                 data-label="Humidity"
                            ></div>
                            <div class="GaugeMeter d-lg-block d-none"
                                 data-percent="{{ random_int(10, 90) }}"
                                 data-append="%"
                                 data-size="150"
                                 data-width="15"
                                 data-style="Arch"
                                 data-text_size="0.22"
                                 data-label="Nutrition"
                            ></div>
                            <div class="GaugeMeter d-lg-block d-none"
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
                </div>
            </div>
        @endforeach
    </div>
@endsection
