let builder = {
	trip: {
		id: null,
		flights: []
	},
	getFlights: function (form, page = 1) {
		$('#builder').addClass('show');
		let from = form.from.value,
			to = form.to.value,
			date = form.date.value,
			params = { 'from': from, 'to': to, 'date': date, 'page': page },
			esc = encodeURIComponent,
			query = Object.keys(params)
				.map(k => esc(k) + '=' + esc(params[k]))
				.join('&');
			
			$.get(`/api/flights?${query}`)
				.done(function (response) {
					let flights = response.data;
					$('#results').children().remove();
					for (let i in flights) {
						let flight = flights[i],
							title = `${flight.departure_airport.code} - ${flight.arrival_airport.code}`,
							li = $('<li>')
								.addClass('list-group-item list-group-item-action item-flight')
								.data('flight', flight)
								.append( $('<h3>').text(title) )
								.append( $('<p>').text(flight.departs_at) )
								.append( $('<p>').html(`<b>$ ${flight.price}</b>`) )
								.appendTo('#results');
							$('<button>')
								.attr('type', 'button')
								.addClass('btn btn-danger btn-block')
								.text('Remove Flight')
								.click( function () {
										builder.removeFlight(li);
									})
								.appendTo(li);
							$('<button>')
								.attr('type', 'button')
								.addClass('btn btn-success btn-block')
								.text('Add Flight')
								.click( function () {
										builder.addFlight(li);
									})
								.appendTo(li);
					}
					
					if (response.last_page > 1) {
						let container = $('<li>')
								.addClass('list-group-item')
								.prependTo('#results'),
							pagination = $('<ul>')
								.addClass('pagination pagination-sm justify-content-center')
								.appendTo(container),
							maxPages = Math.min(response.last_page, 8);
						for (let i = 0; i < maxPages; i++) {
							let count = i+1,
								link = $('<a>')
										.addClass('page-link')
										.attr('href', `#page-${count}`)
										.text(count)
										.click(function () {
											builder.getFlights(form, count);
										}),
								page = $('<li>')
									.addClass('page-item')
									.append(link)
									.appendTo(pagination);
								if (response.current_page == count) {
									page.addClass('active');
								}
						}
					}
				});
		
	},
	addFlight: function (item) {
		let li = $(item)
			flight = li.data('flight');
		
		li.appendTo('#flights');
		builder.trip.flights.push(flight);
		
		builder.calcTotalPrice();
		
	},
	removeFlight: function (item) {
		let li = $(item),
			flight = li.data('flight'),
			index = builder.trip.flights.indexOf(flight);
		
		li.appendTo('#results');
		if (index >= 0) {
			builder.trip.flights.splice(index, index + 1);
		}
		
		builder.calcTotalPrice();
	},
	calcTotalPrice: function () {
		let total = 0;
		const reducer = (accumulator, currentValue) => accumulator + currentValue;
		if (builder.trip.flights.length) {
			total = builder.trip.flights.map((f)=> Number(f.price)).reduce(reducer);
			total = Math.round(total * 100)/100;
		}
		$('#total').text(`$ ${total}`);
	},
	createTrip: function () {
		let data = {
			// Laravel CSRF token
			'_token': $('[name="csrf-token"]').attr('content'),
			// Fligth array
			'flights': builder.trip.flights.map( (f)=> f.id )
		};
		
		$.post('/api/trips', data)
			.done(function (response) {
				console.log(response);
			});
	}
}