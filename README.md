# INSTALL


## Change DB values in .env file

## Install laravel
`composer install`

## Create new key for your projet
`php artisan key:generate`

## Launch migrations for DB
`php artisan migrate`

## Launch server
`php artisan serve`



# Tips for use

## Admin
First user registered will be admin by default.

## Plan
For user to subscribe, admin have to create 2 plans before : Monthly and Yearly

## Actualites
Admin can create actualites with custom images, title, description, ....
Be carefull, the image only work on heroku, curl error in localhost with cloudinary

## Users
Admin can modify user values, change if user is admin or not and delete an user

## Search
Don't work for now : 404
