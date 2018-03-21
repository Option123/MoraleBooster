`composer install`

Within your terminal open `crontab -e` and paste: `15 9 * * 1-5 /usr/local/bin/php /Users/aaron/Sites/morale/artisan run:now`

This will run your cronjob at 9:15am monday - friday (this can be adjusted accordingly).

Once you have filled in your databases .env file run the following:

`php artisan db:seed --class=MoraleTableSeeder`

Within StaffTableSeeder you will need to input your own staff members details: name and email address. then run:

`php artisan db:seed --class=StaffTableSeeder`

There is no visual design to this, just a simple cronjob. You can force send this at any time by running the following within your terminal: `php artisan run:now
`
