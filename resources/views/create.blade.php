@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />

@stop
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Event</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('event.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label ">Name</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control
                                        @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="team1name" class="col-md-4 col-form-label ">Team 1 Name</label>

                                <div class="col-md-12">
                                    <input id="team1name" type="text" class="form-control
                                         @error('team1name') is-invalid @enderror" name="team1name"
                                           value="{{ old('team1name') }}" required autocomplete="name" autofocus>

                                    @error('team1name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="team2name" class="col-md-4 col-form-label ">Name</label>

                                <div class="col-md-12">
                                    <input id="team2name" type="text" class="form-control
                                       @error('team2name') is-invalid @enderror" name="team2name"
                                           value="{{ old('team2name') }}" required autocomplete="team2name" autofocus>

                                    @error('team2name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="team1wincoef" class="col-md-4 col-form-label ">
                                    Team 1 win coefficient (ex:2.00)
                                </label>

                                <div class="col-md-12">
                                    <input id="team1wincoef" type="number" step="0.01" class="form-control
                                        @error('team1wincoef') is-invalid @enderror" name="team1wincoef"
                                           value="{{ old('team1wincoef') }}"
                                           required autocomplete="team1wincoef" autofocus>

                                    @error('team1wincoef')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="team2wincoef" class="col-md-4 col-form-label ">
                                    Team 2 win coefficient (ex:2.00)
                                </label>

                                <div class="col-md-12">
                                    <input id="team2wincoef" type="number" step="0.01" class="form-control
                                        @error('team2wincoef') is-invalid @enderror" name="team2wincoef"
                                           value="{{ old('team2wincoef') }}"
                                           required autocomplete="team2wincoef" autofocus>

                                    @error('team2wincoef')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="draw_coef"  class="col-md-4 col-form-label ">
                                    Draw coefficient (ex:2.00)
                                </label>

                                <div class="col-md-12">
                                    <input id="draw_coef" type="number" step="0.01" class="form-control
                                        @error('draw_coef') is-invalid @enderror" name="draw_coef"
                                           value="{{ old('draw_coef') }}"
                                           required autocomplete="draw_coef" autofocus>

                                    @error('draw_coef')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-md-4 col-form-label ">
                                    Date of start
                                </label>

                                <div class="col-md-12">
                                    <input id="start_date" type="text" class="form-control
                                        @error('start_date') is-invalid @enderror" name="start_date"
                                           value="{{ old('start_date') }}"
                                           required  autofocus>

                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/js/moment-with-locales.min.js"></script>
    <script src="/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#start_date').datetimepicker({
                locale: 'ru',
                format: 'YYYY-MM-DD HH:mm'
            })
        });
    </script>
@stop
