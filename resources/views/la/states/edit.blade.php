@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/states') }}">State</a> :
@endsection
@section("contentheader_description", $state->$view_col)
@section("section", "States")
@section("section_url", url(config('laraadmin.adminRoute') . '/states'))
@section("sub_section", "Edit")

@section("htmlheader_title", "States Edit : ".$state->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($state, ['route' => [config('laraadmin.adminRoute') . '.states.update', $state->id ], 'method'=>'PUT', 'id' => 'state-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'country_id')
					@la_input($module, 'publish')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/states') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#state-edit-form").validate({
		
	});
});
</script>
@endpush
