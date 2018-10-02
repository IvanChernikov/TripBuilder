let builder = {
	trip: {
		id: null,
		flights: [],
		
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
								.addClass('list-group-item list-group-item-action')
								.data('flight', flight)
								.append( $('<h3>').text(title) )
								.append( $('<p>').text(flight.departs_at) )
								.append( $('<p>').html(`<b>$ ${flight.price}</b>`) )
								.click( function () {
									if ($(this).parent().attr('id') == 'results') {
										builder.addFlight(this);
									} else {
										builder.removeFlight(this);
									}
								})
								.appendTo('#results');
					}
					
					if (response.last_page > 1) {
						let container = $('<li>')
								.addClass('list-group-item')
								.appendTo('#results'),
							pagination = $('<ul>')
								.addClass('pagination')
								.appendTo(container);
						for (let i = 0; i < response.last_page; i++) {
							let count = i+1,
								link = $('<a>')
										.attr('href', `#page-${count}`)
										.text(count)
										.click(function () {
											builder.getFlights(form, count);
										}),
								page = $('<li>')
									.addClass('page-item')
									.append(link)
									.appendTo(pagination);
						}
					}
				});
		
	},
	addFlight: function (item) {
		
	},
	removeFlight: function (item) {
		
	}
	createTrip: function () {
		
	}
}