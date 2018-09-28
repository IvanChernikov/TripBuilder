@extends ('layouts.app')

@section ('content')
<div class="container">
	<form action="#" method="GET" onsubmit="$(this).parent().next().addClass('show'); return false">
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="from">Departure</label>
				<input class="form-control" name="from">
			</div>
			<div class="form-group col-md-4">
				<label for="to">Destination</label>
				<input class="form-control" name="to">
			</div>
			<div class="form-group col-md-4">
				<label for="date">Date</label>
				<input class="form-control" type="datetime-local" name="date">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-12">
				<button type="submit" class="btn btn-primary btn-block">Search</button>
			</div>
		</div>
	</form>
</div>

<div class="container fade">
	<div class="row">
		<div class="col-8">
			<h2>Available Flights</h2>
			<ul class="list-group">
			</ul>
		</div>
		
		<div class="col-4">
			<h2>My Trip</h2>
			<ul class="list-group">
			
			</ul>
		</div>
	</div>
</div>
@stop