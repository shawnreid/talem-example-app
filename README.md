## Requirements
Docker must be installed on your machine to run this application.

## Installation 

> 1) git clone git@github.com:shawnreid/talem-example-app.git
> 2) cd talem example-app
> 3) ./vendor/bin/sail up -d
> 4) ./vendor/bin/sail artisan migrate:fresh --seed
> 5) ./vendor/bin/sail npm install
> 6) ./vendor/bin/sail npm run watch
> 7) application should now be available via http://localhost or http://laravel.test

## Test Instructions

Create a simple TODO app using Laravel, InertiaJS, VueJS and BootstrapVue. The todo app should have one form field which allows you to enter a 'task'. Please take your time and complete using clean, readable code. You will not be assessed on how long it takes you to complete this task.

## Requirements:
> 1) Create a todo list with CRUD (Create, Read, Update, Delete) logic.
> 2) Write PHPUnit tests for CRUD logic.
> 3) Create a simple UI using BootstrapVue, this does not have to be fancy.
> 4) Show an alert message showing when an action has been completed.
> 5) Use a computed property to calculate the number of todos and display it somewhere on the page.
> 6) Use a watched property somewhere in the demo app.

## Installation:
> 1) Install a blank laravel project using composer (https://laravel.com/docs/8.x/installation)
> 2) Install InertiaJS PHP dependencies using composer (https://inertiajs.com/server-side-setup)
> 3) Install InertiaJS Vue dependencies using npm (https://inertiajs.com/client-side-setup)
> 4) Install BootstrapVue using npm (https://bootstrap-vue.org/docs)
> 5) Create a database migration for table `todos` which has 1 column `task` (https://laravel.com/docs/8.x/migrations)
> 6) Create database model `Todos` which references database table `todos` (https://laravel.com/docs/8.x/eloquent)

## TODO example input:
> Take dogs for a walk.
> Clean house this afternoon.
> Go for a run tomorrow morning.
