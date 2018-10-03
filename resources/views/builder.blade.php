@extends ('layouts.app')

@push ('scripts')
<script src="{{ asset('js/builder.js') }}" defer></script>
<script>
// list helper
function setAirportId(input) {
	let value = input.value,
		id = null,
		hidden = $(input).prev();
	$('#airports option').each(function (i, item) {
		let j = $(item);
		if (j.text() == value) {
			id = j.data('value');
		}
	});
	hidden.val(id);
}
</script>
@endpush

@push ('styles')
<style>
#results .item-flight .btn-danger,
#flights .item-flight .btn-success {
	display: none;
}
</style>
@endpush

@section ('content')
<div class="container">
	<form action="#" method="GET" onsubmit="event.preventDefault(); builder.getFlights(this, 1);">
		<div class="form-row">
			<datalist id="airports">
				@foreach ($airports as $airport)
				<option data-value="{{ $airport->id }}">{{ $airport->code }} {{ $airport->city }}</option>
				@endforeach
			</datalist>
			<div class="form-group col-md-4">
				<label for="from_text">Departure</label>
				<input type="hidden" name="from">
				<input class="form-control" name="from_text" list="airports"
					onchange="setAirportId(this)">
			</div>
			<div class="form-group col-md-4">
				<label for="to_text">Destination</label>
				<input type="hidden" name="to">
				<input class="form-control" name="to_text" list="airports"
					onchange="setAirportId(this)">
			</div>
			<div class="form-group col-md-4">
				<label for="date">Date</label>
				<input class="form-control" type="datetime-local" name="date"
					value="{{ today()->format('Y-m-d\TH:i') }}">
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
				<li class="list-group-item">
					<p>Total: <b id="total">$ 0.00</b></p>
					<button type="button" class="btn btn-primary btn-block"
						onclick="builder.createTrip()">Book Trip</button>
				</li>
			</ul>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="trip-modal" tabindex="-1" role="dialog" 
	aria-labelledby="trip-modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="trip-modal-title">Trip Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<ul class="list-group" id="trip-flights"></ul>
		<p>Total: <b id="trip-total"></b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>
@stop