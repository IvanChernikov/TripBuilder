## Trip Builder

# Prerequisites
- MySQL server or another Laravel compatible database
- PHP 7.1+
- Composer

# Installation
- Clone repository to your web root folder
- Run `composer isntall`
- Run `npm run production`
- Create a new database schema, default name is 'airtrip'
- Run `php artisan migrate --seed`

# Usage
- API routes:
	- GET /api/airlines -- lists airlines
	- GET /api/airports -- lists airports
	- GET /api/flights -- lists flights, can be filtered by departure and arrival airports, and a minimum date
	- POST /api/trips -- creates a new trip. requires `flights`: an array of flight ids
	- GET /api/trips/{id} -- retrieves a flight by it's `id`
	
- Front-end Component:
	- Search flight by arrival and departure airports, and by date
	- Add flights to a trip
	- Remove flights from a trip
	- Book the trip
	- Receive confirmation
	
# Known Issues
- Lack of validation on flights; flights must follow the each other sequentially by date
- Data is randomly generated; find find an API that provides a list of actual airlines and airports