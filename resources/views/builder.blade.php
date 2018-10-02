@extends ('layouts.app')

@push ('scripts')
<script src="{{ asset('js/builder.js') }}" defer></script>
@endpush

@section ('content')
<div class="container">
	<form action="#" method="GET" onsubmit="event.preventDefault(); builder.getFlights(this, 1);">
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

<div class="container fade" id="builder">
	<div class="row">
		<div class="col-6">
			<h2>Available Flights</h2>
			<ul class="list-group" id="results">
			</ul>
		</div>
		
		<div class="col-6">
			<h2>My Trip</h2>
			<ul class="list-group" id="flights">
			
			</ul>
		</div>
	</div>
</div>
@stop