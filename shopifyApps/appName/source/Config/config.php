<?php

/**
 *  CONFIG DB
 *  config data base to save token, shop & script
 *  
 *  DB-CREATE
 *
 *  nameTable = {YOU-APP-NAME}
 *
 * 	columns:  
 * 	token = VARCHAR = 100
 * 	shop = VARCHAR = 100
 * 	script VARCHAR = 100
 * 	id = auto
 */

define( "DB_USER", "USER-BD" );
define( "DB_PASS", "PASSWORD" );
define( "DB_BANCO", "mysql" );
define( "DB_HOST", "BD-HOST" );
define( "DB_NAME", "NAME-BD" );


/**
 * CONFIG APPNAME && NAME TABLE DB
 *
 * name must be the same as the parent folder name
 * exemple:
 * 	https://youwebhost.com/shopifyApps/{appName}/source/
 */
define( "APP_NAME", "appName" );


/**
 * BASE URL APP(HOST)
 * you url web app
 */
define( "BASE_URL", "https://YOU-WEB-URL-APP.com" );


/**
 * APP API KEY & SECRET KEY
 * shopify app key app
 */
define( "API_KEY", "API-KEY" );
define( "SECRET_KEY", "SECRET-KEY" );


/**
 * VERSION API
 * check api version shopify
 */
define( "VERSION_API", "2020-04");


//----------------------NO CHANGE---------------------------------//

/**
 * SCOPES APP PRIORITY
 * what the app should do in the store
 */
define( "SCOPES", "read_orders,write_products,read_themes,write_themes,write_script_tags" );


/**
 * URL REDIRCT TOKEN SHOP
 * url to generate token shop
 */
define( "REDIRECT_URI", BASE_URL ."/shopifyApps/". APP_NAME ."/source/generateToken.php" );
