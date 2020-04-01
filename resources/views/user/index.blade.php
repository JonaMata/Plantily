@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->name }}'s Profile</div>

                    <div class="card-body">
                            <h4>Plants</h4>
                            <ul>
                                @foreach($user->plants as $plant)
                                    <li>
                                        <strong>Name: </strong>{{ $plant->name }}<br>
                                        <strong>Family: </strong>{{ $plant->genus->family->name }}<br>
                                        <strong>Genus: </strong>{{ $plant->genus->name }}<br>
                                    </li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
