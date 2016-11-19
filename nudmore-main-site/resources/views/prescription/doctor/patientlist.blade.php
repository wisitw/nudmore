@extends('layouts.app')

@section('content')
<div class="content-wrapper container">
	<h3>จัดการประวัติการรับยาของผู้ป่วย </h3>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="table-responsive">
						<table id="datatable2" class="table table-striped table-hover">
							<thead>
								<tr>
									<th>รหัสผู้ป่วย</th>
									<th>ชื่อผู้ป่วย</th>
									<th> การจัดการ </th>
								</tr>
							</thead>
							<tbody>
								@foreach ($patients as $patient)
								<tr>
									<td>{!! $patient->patient_number !!}</td>
									<td>{!! $patient->user()->first()->title !!} {!! $patient->user()->first()->name !!} {!! $patient->user()->first()->surname !!}</td>
									<td>
										<a href="{{ url('/prescription/doctor/'.$patient->id.'') }}" class="btn btn-labeled btn-info"> <span class="btn-label"><i class="fa fa-info-circle"></i> </span> แสดง </a>
										<a href="{{ url('/prescription/doctor/'.$patient->id.'/create') }}" class="btn btn-labeled btn-success"> <span class="btn-label"><i class="fa fa-plus"></i> </span> ออกใบสั่งยา </a>
									</td>
								</tr>
								@endforeach
							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('footer_script')

<!-- DATATABLES-->
<link rel="stylesheet" href="{{ url('/vendor/datatables/media/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('/vendor/dataTables.fontAwesome/index.css') }}">
<!-- DATATABLES-->
<script src="{{ url('/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('/vendor/datatables/media/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ url('/vendor/datatables-responsive/js/dataTables.responsive.js') }}"></script>
<script src="{{ url('/vendor/datatables-responsive/js/responsive.bootstrap.js') }}"></script>
<script>
	(function(window, document, $, undefined){
		var dtInstance2 = $('#datatable2').dataTable({
			'paging':   true,  // Table pagination
			'ordering': true,  // Column ordering
			'info':     true,  // Bottom left status text
			'responsive': true, // https://datatables.net/extensions/responsive/examples/
			// Text translation options
			// Note the required keywords between underscores (e.g _MENU_)
			oLanguage: {
				sSearch:      'Search all columns:',
				sLengthMenu:  '_MENU_ records per page',
				info:         'Showing page _PAGE_ of _PAGES_',
				zeroRecords:  'Nothing found - sorry',
				infoEmpty:    'No records available',
				infoFiltered: '(filtered from _MAX_ total records)'
			}
		});
		var inputSearchClass = 'datatable_input_col_search';
		var columnInputs = $('tfoot .'+inputSearchClass);

		// On input keyup trigger filtering
		columnInputs.keyup(function () {
			dtInstance2.fnFilter(this.value, columnInputs.index(this));
		});

	})(window, document, window.jQuery);
</script>


@endsection
