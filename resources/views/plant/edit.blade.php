@extends('layouts.app', ['title' => 'Edit '.$plant->name])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit {{ $plant->name }}</div>
                    <form method="POST">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Planty McPlant Face" value="{{ $plant->name }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Image Url</label>
                                <input type="url" class="form-control" id="image" name="image"
                                       placeholder="https://imgur.com/plant.png" value="{{ $plant->image }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                          placeholder="The best plant ever!">{{ $plant->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="birth">Birth</label>
                                <input type="date" class="form-control" id="birth" name="birth"
                                       value="{{ $plant->birth->format('Y-m-d') }}">
                            </div>
                            <div class="form-group ui-widget">
                                <label for="family">Family</label>
                                <input type="text" class="form-control autocomplete" id="family" name="family"
                                       placeholder="" value="{{ $plant->genus->family->name }}">
                            </div>
                            <div class="form-group ui-widget">
                                <label for="genus">Genus</label>
                                <input type="text" class="form-control autocomplete" id="genus" name="genus"
                                       placeholder="" value="{{ $plant->genus->name }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save Plant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let families = function (request, response) {
                $.ajax({
                    url: '{{ route('json.families') }}',
                    type: 'GET',
                    contentType: 'application/json',
                    success: function (data) {
                        response($.map(JSON.parse(data), function (item) {
                            return {
                                label: item,
                                value: item,
                            };
                        }));
                    }
                });
            };

            let genera = function (request, response) {
                let family = $('#family').val();
                $.ajax({
                    url: '{{ route('json.genera') }}?family=' + family,
                    type: 'GET',
                    contentType: 'application/json',
                    success: function (data) {
                        response($.map(JSON.parse(data), function (item) {
                            return {
                                label: item,
                                value: item,
                            };
                        }));
                    },
                    error: function (data) {
                        response([]);
                    }
                });
            };

            $('#family').autocomplete({
                source: families,
                minLength: 0,
            });

            $('#genus').autocomplete({
                source: genera,
                minLength: 0,
            });

            $('#family, #genus').on('focus', function () {
                $(this).autocomplete('search', '');
            });


        });
    </script>
@endsection
