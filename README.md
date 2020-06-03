# Shopify App with PHP 

A Simple code in php to create basic apps on shopify

## Getting Started

Download with zip or clone https://github.com/erickferreir4/shopify-app-PHP.git

### Prerequisites

Tenha certeza que voce tenha um servidor https:

```
https://youwebhost.com/
```

Make sure you have a partner account with shopify & shop development:

```
https://partners.shopify.com/
```

### settings

Rename folder "appName" to you app name:

```
/shopifyApps/{appName}/source/
```

Create database:

```
table name = "YOU APP NAME"

columns:

id = auto
shop = VARCHAR 100
token = VARCHAR 100
script = VARCHAR 100
```

Go folder "config" and open file config.php:

```
/shopifyApps/{appName}/source/config/config.php
```

Config database to save token, shop & script:

```
define( "DB_USER", "USER-BD" );
define( "DB_PASS", "PASSWORD" );
define( "DB_BANCO", "mysql" );
define( "DB_HOST", "BD-HOST" );
define( "DB_NAME", "NAME-BD" );
```

Config appname && name table database:

Name must be the same as the parent folder name
exemple:
https://youwebhost.com/shopifyApps/{appName}/source/


```
define( "APP_NAME", "appName" );
```

Config you url web app:

```
define( "BASE_URL", "https://YOU-WEB-URL-APP.com" );
```

Go to you shopify partners:

```
create app

app name = {youAppName}
URL app = https://youwebhost.com/shopifyApps/{appName}/source/index.php
URL(s) redirect = https://youwebhost.com/shopifyApps/{appName}/source/generateToken.php
```

Copy you API KEY & SECRET KEY in shopify apps -> YOU-APPNAME:

```
define( "API_KEY", "API-KEY" );
define( "SECRET_KEY", "SECRET-KEY" );
```

Check api version in shopify documentation:

```
define( "VERSION_API", "xxxx-xx");
```

Go to shopifyApps/{appName}/source/assets/js/main.js:

```
const APP_NAME = 'appName';
const BASE_URL = 'YOU-WEB-URL';
```


## Running the tests

Go to you https://partners.shopify.com/ select you app -> Test app -> shop select -> install app

### Break down into end to end tests

if the installation is successful, when entering the app panel (about) press active app option

```
active app
```

### And coding

To edit the app's front panel

```
shopifyApps/{appName}/source/assets/js/main.js

shopifyApps/{appName}/source/View/home/
```

## Built With

* [NYALEX](https://github.com/nyalex/shopify-generating-api-token-guide) - Used to generate token & facility call api shopify

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)
