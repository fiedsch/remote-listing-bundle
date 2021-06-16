# Remote Listing Bundle

Much like Contao's [ListingBundle](https://github.com/contao/contao/tree/4.x/listing-bundle)
but for a database other than the one from the contao installation.


## Installation

Make sure, you have configured the `romote` database connection (see next section; don't forget to clear/rebuild
Symfony's cache after the config change). Then run `composer require fiedsch/remote-listing-bundle`.


## Configuration 

Provide a database connection named `remote` in `config/config.yml` like so:
```
doctrine:
    dbal:
        default_connection: default
        connections:
            default:
                driver: pdo_mysql
                host: '%database_host%'
                port: '%database_port%'
                dbname: '%database_name%'
                user: '%database_user%'
                password: '%database_password%'
                charset: UTF8
            remote:
                driver: pdo_mysql
                host: 'your_database_host'
                port: 'your_database_port'
                dbname: 'your_database_name'
                user: 'your_database_user'
                password: 'your_database_password'
```

## Template

The template provided is just an example. Adapt to your needs in the Contao back end.
