@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1>Schedule list</h1>
                    {!! $current_user->doctor->doctor_number !!}

                    <div class="row">
                        <a href="/schedule/create" class="btn btn-primary">Create Schedule</a>
                    </div>
                    @foreach ($schedules as $schedule)
                        <div class="row">
                            <div class="col-md-10">
                                {!! $schedule->date_time !!}
                            </div>
                            <div class="col-md-2">
                                {!! Form::open(['url' => '/schedule/'.$schedule->id.'/delete', 'method' => 'delete']) !!}
                                    {!! Form::token() !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
