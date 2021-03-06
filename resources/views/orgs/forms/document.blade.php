@if($type == 'create')
	<div class="file-field input-field">
		<div class="btn">
			<i class="material-icons left">attach_file</i>
			<span>Upload*</span>
			<input type="file" name="file">
		</div>
		<div class="file-path-wrapper">
			<input class="file-path validate" type="text">
		</div>
	</div>
@endif

<div class="input-field">
	{!! Form::label('name', 'Name*') !!}
	{!! Form::text('name', null) !!}
</div>

<div class="input-field">
	{!! Form::label('description', 'Description*') !!}
	{!! Form::textarea('description', null, ['class' => 'materialize-textarea']) !!}
</div><br />

<div class="row center">
	<button class="btn waves-effect waves-light" type="submit" name="action">
	    {{ $submitText }}
  	</button>
</div>