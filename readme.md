## Trip Builder

# Prerequisites
- MySQL server or another Laravel compatible database
- PHP 7.1+
- Composer
- NPM
- Apache or nginx

# Installation
- Clone repository to your web root folder
- Run `composer isntall`
- Run `npm run production`
- Create a new database schema, default name is `airtrip`
- Run `cp .env.example .env`
- Run `php artisan key:generate`
- Change `/.env` configuration for your database access
- Run `php artisan migrate:fresh --seed`
- Make sure that `public` and `storage` folders are writable to by the web server user
    - for ubuntu and apache stack run `chown www-data public -R` and `chown www-data storage -R`

# Usage
- API routes:
	- GET /api/airlines -- lists airlines
	- GET /api/airports -- lists airports
	- GET /api/flights -- lists flights, can be filtered by departure and arrival airports, and a minimum date
	- POST /api/trips -- creates a new trip. requires `flights`: an array of flight ids
	- GET /api/trips/{id} -- retrieves a trip by it's `id`
	
- Front-end Component:
	- Search flight by arrival and departure airports, and by date
	- Add flights to a trip
	- Remove flights from a trip
	- Book the trip
	- Receive confirmation
	
# Known Issues
- Lack of validation on flights; flights must follow the each other sequentially by date
- Data is randomly generated; find find an API that provides a list of actual airlines and airports
