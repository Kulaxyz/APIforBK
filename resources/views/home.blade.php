@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <h1>Active Matches</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Team 1</th>
                    <th>Team 2</th>
                    <th class="d-none d-md-table-cell d-lg-table-cell">SCORE</th>
                    <th class="d-none d-md-table-cell d-lg-table-cell">WIN 1</th>
                    <th class="d-none d-md-table-cell d-lg-table-cell">DRAW</th>
                    <th class="d-none d-md-table-cell d-lg-table-cell">WIN 2</th>
                    <th class="d-none d-md-table-cell d-lg-table-cell">Start Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->team1name }}</td>
                        <td>{{ $event->team2name }}</td>
                        <td class="d-none d-md-table-cell d-lg-table-cell">{{ $event->score }}</td>
                        <td class="d-none d-md-table-cell d-lg-table-cell">{{ $event->team1wincoef }}</td>
                        <td class="d-none d-md-table-cell d-lg-table-cell">{{ $event->draw_coef }}</td>
                        <td class="d-none d-md-table-cell d-lg-table-cell">{{ $event->team2wincoef }}</td>
                        <td class="d-none d-md-table-cell d-lg-table-cell">{{ $event->start_date }}</td>
                        <td>
                            <a href="{{ route('event.score', $event->id) }}" class="btn btn-sm btn-link">Score</a>
                            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm btn-link">Edit</a>
                            <a href="{{ route('event.delete', $event->id) }}"
                               onclick="deleteOne(event, '{{ $event->id }}')"
                               class="btn btn-sm btn-link">Delete</a>
                        </td>
                    </tr>
                    <form id="delete-{{$event->id}}" hidden method="post" action="{{ route('event.delete', $event->id) }}">
                        @csrf
                    </form>
                @endforeach
                </tbody>
            </table>
            {{ $events->links() }}
    </div>
</div>
@endsection
@section('scripts')
    <script>
        function deleteOne(e, id) {
            e.preventDefault();
            if (window.confirm("Are you sure?")) {
                $('#delete-'+id).submit();
            }
        }
    </script>
@stop
