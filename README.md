# online-clothing-store
An E-Commerce website to sell cloths


## Installation
First install the dependencies
```bash
composer install
```

Then create a .env file and copy the content of .env.example to .env
```bash
cp .env.example .env
```

Add your database credentials to the .env file

Then sipn up the PHP development server
```bash
php -S 127.0.0.1:8000
```

## Phinx
### Migrations
To run the migrations, first create a database and add the credentials to the .env file

Then run the migrations
```bash
vendor/bin/phinx migrate
```

To create a new migration
```bash
vendor/bin/phinx create MyNewMigration
```

### Seeding
To seed the database
```bash
vendor/bin/phinx seed:run
```

To create a new seed
```bash
vendor/bin/phinx seed:create MyNewSeed
```

