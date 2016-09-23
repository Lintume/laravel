
## Laravel test project
*Version Beta 1 - 2016.09.23

This is the site, that user can select several items from Vocabulary table and get hash of them with one or several selected algorithms, e.g. md5, sha1, etc.
User can to save hashes and can see and delete hashes on page 'hashes'.
Provided cli task and schedule it to run each 11 minutes. Task create xml files with information about user, their saved hashes from database. User information include ip, browser, cookie and country of the user.

## System Requirements

The Laravel framework has a few system requirements.
However, if you are not using Homestead, you will need to make sure your server meets the following requirements:

PHP >= 5.6.4
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension

## Installation

Please check the system requirements before installing project

1. You may install by cloning from github
  * Github: `git clone https://github.com/Lintume/laravel`
2. Enter your database details into `app/config/database.php`.
3. Run the command
`composer install`
4. For creating tables in data base run the command
`php artisan migrate`
5. Finally, setup an [Apache VirtualHost](http://httpd.apache.org/docs/current/vhosts/examples.html) to point to the "public" folder.
  * For development, you can simply run `php artisan serve`

##XML files
You can create xml files about users by command:
`php artisan xml:report`
You can find generating files in folder /storage/app/

##Test data
For the filling data base test data (vocabulary) you can run the command
`php artisan db:seed`


