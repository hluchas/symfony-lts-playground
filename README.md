### Req
 - PHP 8.2
 - MySQL 8
 - Node v20.2.0
### Installation (dev)
```bash
composer install
bin/console doctrine:database:create
bin/console doctrine:schema:create
yarn install
yarn watch
```
### Testing
```bash
bin/console doctrine:database:create --env=test
bin/console doctrine:schema:create --env=test
composer all #run all checks
composer test #run PHPUnit tests
```
