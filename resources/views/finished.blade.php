@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <h1>Finished Matches</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Team 1</th>
                    <th>Team 2</th>
                    <th>SCORE</th>
                    <th>WIN 1</th>
                    <th>WIN 2</th>
                    <th>DRAW</th>
                    <th>Start Date</th>
                    <th>Finish Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->team1name }}</td>
                        <td>{{ $event->team2name }}</td>
                        <td>{{ $event->score }}</td>
                        <td>{{ $event->team1wincoef }}</td>
                        <td>{{ $event->team2wincoef }}</td>
                        <td>{{ $event->draw_coef }}</td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->finished_at }}</td>
                        <td>
                            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm btn-link"><i class="fa fa-eye"></i> Edit</a>
                            <a href="{{ route('event.delete', $event->id) }}" class="btn btn-sm btn-link"><i class="fa fa-eye"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $events->links() }}
    </div>
</div>
@endsection
