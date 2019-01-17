# Shotgun

## Installation and configuration
### Code
Just edit `config.php`:
- `openningDate`: ISO date-time format of the openning date: `YYYY-MM-DDTHH:MM:SSZ`. Example: for 14 january 2042 at 18h30, enter "2042-01-14T18:30:00Z"
- The database configuration is a classic
- `shotgunTable`: Name of the shotgun table. See the table schema bellow.
If you change the tree organization, here's a list of relative links to change:
- `index.php`: line 2 => `config.php`
- `shotgun.php`: line 6 => `functions.php`
- `functions.php`: line 6 => `config.php`
- `new_shotgun.php`: line 6 => `functions.php`
### Database
It has to contain only one table with the name `shotgunTable` defined in `config.php`
|  Name             | Type         | Null | Default Value      | Extra |
| :---------------- | :----------: | :--: | :----------------: | :---: |
| ***id\_shotgun*** |   int(11)    | No   |                    | AI    |
| login             | varchar(255) | No   |                    |       |
| created\_at       |  timestamp   | No   | CURRENT\_TIMESTAMP |       |




## License
- All that is in `./resources/flipclock/*`: Copyright (c) 2013 Objective HTML, LCC shared under MIT LICENSE
- The rest is under [beerware license](https://en.wikipedia.org/wiki/Beerware) ;)