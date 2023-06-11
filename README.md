## Installation

1. Run `composer install`
2. Run `npm install`
3. Create your own database
3. Make `.env` from `.env.example` and fill your database information and PUSHER variable, example:

    PUSHER_APP_ID=qrticketiot
    PUSHER_APP_KEY=yourkey
    PUSHER_APP_SECRET=yoursecret
    PUSHER_HOST=localhost
    PUSHER_PORT=6001
    PUSHER_SCHEME=http
    PUSHER_APP_CLUSTER=mt1

4. Run `php artisan migrate:fresh --seed`
5. Run `npm run build`

## Run

1. Start the server with `php artisan serve --host=youripaddress`
2. Start the websocket with `php artisan websocket:serve`
3. You can generate QR Code for existing user by accessing `youripaddress/generate`, it will be saved to `public/qrcodes/{id}.svg`

    

