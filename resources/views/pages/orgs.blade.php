@extends('layout')

@section('content')

<div class="row">

	<div class="col s12">

		<div class="row">
			<h1 class="center btn-h1">Organisations</h1>
			<a class="btn-large right waves-effect waves-light" href="orgs/create">
				<i class="material-icons left">add</i>Add
		  	</a>
		</div>

		<div class="row">

			<div class="col l3">
				<a href="#!" class="waves-effect waves-teal btn-flat" id="filters-link"><i class="material-icons right" id="filters-icon">add</i>Filter Results</a>
			</div>

			<form class="col s12 m6 l6">
				<div>
					<div class="input-field">
						<i class="material-icons prefix">search</i>
						<input id="search" type="search" required>
						<label for="search"></label>
					</div>
				</div>
			</form>
		
			
		</div>



		<div class="row" id="filters" style="display:none;">

			<div class="input-field col s12 m3">
				<select multiple>
					<option value="" disabled selected>Select...</option>
					<option value="1">Option 1</option>
					<option value="2">Option 2</option>
					<option value="3">Option 3</option>
				</select>
				<label>Technologies</label>
			</div>

			<div class="input-field col s12 m3">
				<select multiple>
					<option value="" disabled selected>Select...</option>
					<option value="1">Option 1</option>
					<option value="2">Option 2</option>
					<option value="3">Option 3</option>
				</select>
				<label>Industries</label>
			</div>

			<div class="input-field col s12 m3">
				<select multiple>
					<option value="" disabled selected>Select...</option>
					<option value="1">Option 1</option>
					<option value="2">Option 2</option>
					<option value="3">Option 3</option>
				</select>
				<label>Domains</label>
			</div>

			<div class="switch">
				<label>
					Not in Talks
					<input type="checkbox">
					<span class="lever"></span>
					In Talks
				</label>
			</div>

		</div>

		<div class="row org-grid">
			<div class="col s12">
				@include('snippets.org-grid')
			</div>
		</div>

		<div class="row center">
			<ul class="pagination">
				<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
				<li class="active"><a href="#!">1</a></li>
				<li class="waves-effect"><a href="#!">2</a></li>
				<li class="waves-effect"><a href="#!">3</a></li>
				<li class="waves-effect"><a href="#!">4</a></li>
				<li class="waves-effect"><a href="#!">5</a></li>
				<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
			</ul>
		</div>

	</div> <!-- END col -->

</div> <!-- END row -->

@stop