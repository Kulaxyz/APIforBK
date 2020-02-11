@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Score of Event {{ $event->name }}</div>

                    <div class="card-body">
                        <div class="row justify-content-between">
                            <h4>{{$event->team1name}} (coef: {{ $event->team1wincoef }})</h4>
                            <h4>Draw (coef: {{ $event->draw_coef }})</h4>
                            <h4>{{$event->team2name}} (coef: {{ $event->team2wincoef }})</h4>
                        </div>
                        <div class="row justify-content-between">
                            <form action="{{ route('event.score', $event) }}" method="post">
                                @csrf
                                <input name="team1score" type="hidden" value="{{$team1score+1}}">
                                <input name="team2score" type="hidden" value="{{$team2score}}">
                                <button type="submit" class="btn btn-primary btn-lg score-btn">+</button>
                            </form>

                            <div>
                                <h1 class="big">{{ $team1score }}</h1>
                            </div>

                            <h1 class="big">:</h1>

                            <div>
                                <h1 class="big">{{ $team2score }}</h1>
                            </div>

                            <form action="{{ route('event.score', $event) }}" method="post">
                                @csrf
                                <input name="team1score" type="hidden" value="{{$team1score}}">
                                <input name="team2score" type="hidden" value="{{$team2score+1}}">
                                <button type="submit" class="btn btn-primary btn-lg score-btn">+</button>
                            </form>
                        </div>
                        <div class="row justify-content-center">
                            <form action="{{ route('event.finish', $event) }}" method="post">
                                @csrf
                                <input name="team1score" type="hidden" value="{{$team1score}}">
                                <input name="team2score" type="hidden" value="{{$team2score+1}}">
                                <button type="submit" class="btn btn-success btn-lg">Finish Match</button>
                            </form>
                        </div>

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
