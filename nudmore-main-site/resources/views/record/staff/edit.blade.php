@extends('layouts.app')

@section('content')
<div class="content-wrapper container">
	<h3> แก้ไขประวัติการรักษาของ {!! $record->patient()->first()->user()->first()->title !!} {!! $record->patient()->first()->user()->first()->name !!} {!! $record->patient()->first()->user()->first()->surname !!} </h3>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-info">

				<div class="panel-heading white-text">
					<div class="row">
						<div class="col-md-4">เพิ่มประวัติการรักษา</div>
						<div class="col-md-8 text-right">วันที่วันที่เข้ารักษา: {{ \Carbon\Carbon::now() }}</div>
					</div>
				</div>
				<div class="panel-body">
                    {!! Form::open(['url' => 'record/staff/'.$record->id.'/edit', 'class' => 'form-horizontal']) !!}
                        {!! Form::token() !!}
                        {!! Form::hidden('date_time', $record->date_time) !!}

                        <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                            {!! Form::label('weight', 'น้ำหนัก (กิโลกรัม)', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('weight', $record->weight, ['class' => 'form-control', 'required', 'autofocus']) !!}
                                @if ($errors->has('weight'))<span class="help-block"><strong>{{ $errors->first('weight') }}</strong></span>@endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                            {!! Form::label('height', 'ส่วนสูง (เซนติเมตร)', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('height', $record->height, ['class' => 'form-control', 'required', 'autofocus']) !!}
                                @if ($errors->has('height'))<span class="help-block"><strong>{{ $errors->first('height') }}</strong></span>@endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('temperature') ? ' has-error' : '' }}">
                            {!! Form::label('temperature', 'อุณหภูมิ (องศาเซลเซียส)', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('temperature', $record->temperature, ['class' => 'form-control', 'required', 'autofocus']) !!}
                                @if ($errors->has('temperature'))<span class="help-block"><strong>{{ $errors->first('temperature') }}</strong></span>@endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('heart_rate') ? ' has-error' : '' }}">
                            {!! Form::label('heart_rate', 'อัตราการเต้นของหัวใจ', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('heart_rate', $record->heart_rate, ['class' => 'form-control', 'required', 'autofocus']) !!}
                                @if ($errors->has('heart_rate'))<span class="help-block"><strong>{{ $errors->first('heart_rate') }}</strong></span>@endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('systolic_blood_pressure') ? ' has-error' : '' }}">
                            {!! Form::label('systolic_blood_pressure', 'ความดันโลหิตซีสโตลิค', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('systolic_blood_pressure', $record->systolic_blood_pressure, ['class' => 'form-control', 'required', 'autofocus']) !!}
                                @if ($errors->has('systolic_blood_pressure'))<span class="help-block"><strong>{{ $errors->first('systolic_blood_pressure') }}</strong></span>@endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('diastolic_blood_pressure') ? ' has-error' : '' }}">
                            {!! Form::label('diastolic_blood_pressure', 'ความดันโลหิตไดแอสโตลิค', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('diastolic_blood_pressure', $record->diastolic_blood_pressure, ['class' => 'form-control', 'required', 'autofocus']) !!}
                                @if ($errors->has('diastolic_blood_pressure'))<span class="help-block"><strong>{{ $errors->first('diastolic_blood_pressure') }}</strong></span>@endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('topic') ? ' has-error' : '' }}">
                            {!! Form::label('topic', 'อาการ', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('topic', $record->topic, ['class' => 'form-control', 'autofocus']) !!}
                                @if ($errors->has('topic'))<span class="help-block"><strong>{{ $errors->first('topic') }}</strong></span>@endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('icd10') ? ' has-error' : '' }}">
                            {!! Form::label('icd10', 'รหัสโรค', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('icd10', $record->icd10, ['class' => 'form-control', 'autofocus']) !!}
                                @if ($errors->has('icd10'))<span class="help-block"><strong>{{ $errors->first('icd10') }}</strong></span>@endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                            {!! Form::label('detail', 'รายละเอียดการรักษา', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('detail', $record->detail, ['class' => 'form-control', 'autofocus']) !!}
                                @if ($errors->has('detail'))<span class="help-block"><strong>{{ $errors->first('detail') }}</strong></span>@endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('บันทึกการแก้ไขข้อมูล', ['class' => 'btn btn-success btn-block']) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


