@extends ('layouts.app')

@section ('content')
<div class="container">
	<form action="#" method="GET">
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
	<div class="col-8">
	
	</div>
	
	<div class="col-4">

	</div>
</div>
@stop