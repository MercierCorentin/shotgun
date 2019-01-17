# Shotgun

# Configuration
Just edit `config.php`
- `openningDate`: ISO date-time format of the openning date: `YYYY-MM-DDTHH:MM:SSZ`. Example: for 14 january 2042 at 18h30, enter "2042-01-14T18:30:00Z"
- The database configuration is a classic
- `shotgunTable`: Name of the shotgun table. See the table schema bellow.

|  Name             | Type         | Null | Default Value      | Extra |
| :---------------- | :----------: | :--: | :----------------: | :---: |
| ***id\_shotgun*** |   int(11)    | No   |                    | AI    |
| login             | varchar(255) | No   |                    |       |
| created\_at       |  timestamp   | No   | CURRENT\_TIMESTAMP |       |
