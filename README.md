# Shotgun
This shotgun blocks POST scripts and aims to be easily configured and integrated. 

Don't hesitate to contact me to improve the code or if you need help with the configuration/integration. 

## Explanations 
### Before and during the shotgun
The index shows a countdown. When it comes to THE shotgun (based on server time), the page refresh itself and he can enter his login in the field. 

Then, if his login isn't already in the database, the shotgun ends.

Before the shotgun, the user can't put his login into database. If he tries, he is redirected to index. 

### After the shotgun
#### For users
The shotgun is closed and all users can just see the index.
#### For the person in charge
To treat the result of the shotgun you have two choices:
- Launch the script `launch.sh` in the folder `scripts`
    This is the best choice, put the rights to `700` on `shotgun_treatment.php`.
    If possible, you can put a `cron` task. 

    Be careful to be the owner of the logs files if the script is launched by you. 
- Access via `GET` method the php file `shotgun_treatment.php`
    Here the logs file have to be owned by `www-data`
    **Please put an authentification to access this folder!**


## Installation and configuration

### Code

Just edit `config.php`:
#### General config
- `openningDate`: ISO date-time format of the openning date: `YYYY-MM-DDTHH:MM:SSZ`. Example: for 14 january 2042 at 18h30, enter "2042-01-14T18:30:00Z"
- `closeOnDate` : default false, set it on true when you want the shotgun to have a close date.
- `closingDate` : Same format as `openningDate`
- `limitNumber` : the number of things you have to sell/give/...
- The database configuration is a classic
- `shotgunTable`: Name of the shotgun table. See the table schema bellow.

#### Specific to University of Technology of Compiègne config
- `gingerApiKey` : you need this key to get the informations about someone from his student login. To get a key, ask the SIMDE
- `mailFromHeader`: The From header of a mail but without `From: ` so just follow this syntaxe: 

`"NameOfOrganisation <blabla@domain.domainExtension>"`
- `mailSuccessObject`: The object of the mail for users who succeded the shotgun.
- `mailSuccessContent`: Content of the mail for users who succeded the shotgun. In HTML
- `sendFailMail`: set `true` if you want the send an email to inform failure. 
- `mailFailObject` & `mailFailContent`: same as success but for failure email. 



Then add your html/css. 

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
Nothing to come but ask me ;)