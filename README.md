## Installation

1. Uncomment `;extension=gd` in your `php.ini` (your php settings, not in this project root).

2. Run `composer install`
3. Run `npm install`
4. Create your own database
5. Make `.env` from `.env.example` and fill your database information and PUSHER variable, example:

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=yourdbname
    DB_USERNAME=root
    DB_PASSWORD=
```

```
    PUSHER_APP_ID=qrticketiot
    PUSHER_APP_KEY=yourkey
    PUSHER_APP_SECRET=yoursecret
    PUSHER_HOST=localhost
    PUSHER_PORT=6001
    PUSHER_SCHEME=http
    PUSHER_APP_CLUSTER=mt1
```

Also set `BROADCAST_DRIVER` to `pusher`

6. Run `php artisan migrate:fresh --seed`
7. Run `php artisan db:seed --class=TicketSeeder`
8. Run `npm run build`

## Starting server

1. Start the server with `php artisan serve --host=youripaddress`
2. Start the websocket with `php artisan websocket:serve`

## Routes

1. You can generate QR Code for existing user by accessing `youripaddress/generate`, it will be saved to `public/qrcodes/{id}.svg`
2. To trigger the live notification, make a GET Request to `youripaddress/find/{code}` with `code` as the QR Code payload. It will trigger the notification if the code is correct.
