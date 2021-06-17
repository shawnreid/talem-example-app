## Requirements
Docker must be installed on your machine to run this application

## Installation 

- git clone git@github.com:shawnreid/talem-example-app.git
- cd talem example-app
- ./vendor/bin/sail up -d
- ./vendor/bin/sail artisan migrate:fresh --seed
- ./vendor/bin/sail npm install
- ./vendor/bin/sail npm run watch
