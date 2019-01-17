# Shotgun
This shotgun blocks POST scripts and aims to be easily configured and integrated. 

Don't hesitate to contact me to improve the code or if you need help with the configuration/integration. 

## Explanations 
### Before and during the shotgun
The index shows a countdown. When it comes to THE shotgun (based on server time), the page refresh itself and he can enter his login in the field. 

Then, if his login isn't already in the database, the shotgun ends.

Before the shotgun, the user can't put his login into database. If he tries, he is redirected to index. 

### After the shotgun
PHP scripts to send emails are comming soon ;)

## Installation and configuration

### Code

Just edit `config.php`:
- `openningDate`: ISO date-time format of the openning date: `YYYY-MM-DDTHH:MM:SSZ`. Example: for 14 january 2042 at 18h30, enter "2042-01-14T18:30:00Z"
- The database configuration is a classic
- `shotgunTable`: Name of the shotgun table. See the table schema bellow.

If you change the tree organization, here's a list of relative links to change:
- `index.php`: line 2 => `config.php`
- `shotgun.php`: line 6 => `functions.php`
- `functions.php`: line 3 => `config.php`
- `new_shotgun.php`: line 8 => `functions.php`

### Database

It has to contain only one table with the name `shotgunTable` defined in `config.php`

|  Name             | Type         | Null | Default Value      | Extra |
| :---------------- | :----------: | :--: | :----------------: | :---: |
| ***id\_shotgun*** |   int(11)    | No   |                    | AI    |
| login             | varchar(255) | No   |                    |       |
| created\_at       |  timestamp   | No   | CURRENT\_TIMESTAMP |       |




## License
- All that is in `./resources/flipclock/*`: Copyright (c) 2013 Objective HTML, LCC shared under MIT LICENSE, copied from [flipclockjs.com](http://flipclockjs.com)
- The rest is under [beerware license](https://en.wikipedia.org/wiki/Beerware) ;)

## Next features
Later you'll be able to add a closing date/number for the shotgun.

PHP scripts to send emails are also comming. I'll first protect them with a `.htacess` file. You'll have to deal with your own authentification ;)  