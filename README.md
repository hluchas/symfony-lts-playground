### Stack
 - Symfony LTS
 - VueJS 3.2
### Req
 - PHP 8.2
 - MySQL 8
 - Node v20.2.0
### Installation (dev)
```bash
cp .env.dist .env && cp .env.test.dist .env.test
composer install
bin/console doctrine:database:create && bin/console doctrine:schema:create 
yarn install
yarn watch
```
### Testing
```bash
bin/console doctrine:database:create --env=test && bin/console doctrine:schema:create --env=test
composer all #run all checks
composer fix #run CS Fixer
composer stan #run PHPStan
composer test #run PHPUnit tests
```
