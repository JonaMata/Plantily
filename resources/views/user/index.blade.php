@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header">{{ $user->name }}'s Profile</h4>

                    <div class="card-body">
                        <h4>Bio</h4>
                        <p>This user has no bio :(</p>
                        <h4>Plants</h4>
                        <div class="row">
                            @foreach($user->plants as $plant)
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card">
                                        @if($plant->image())
                                            <img class="card-img" src="{{ $plant->image() }}"
                                                 alt="{{ $plant->name }}-image"/>
                                        @endif
                                        <div class="card-body">
                                            <div class="plant-info">
                                                <a class="stretched-link"
                                                   href="{{ route('plant.show', ['plant' => $plant]) }}">
                                                    <h4>{{ $plant->name }}</h4></a>
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
                                            </div>
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
