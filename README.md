#GEOIP#
wget https://geolite.maxmind.com/download/geoip/database/GeoLite2-City.mmdb.gz
gzip -d GeoLite2-City.mmdb.gz
mv GeoLite2-City.mmdb storage/app/geoip.mmdb

### Ide-helper
```bash
php artisan ide-helper:models -W --reset "App\Eloquents\User"
```
### Composer
Use composer.phar because of different PHP version until upgrade and old L5.4
```bash
php72 composer.phar composer install
etc....
```

# README #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

* This repository is for hosting the blueprint of Getoncode's MLM software
* 1.0
* [Learn Markdown](https://bitbucket.org/tutorials/markdowndemo)

### How do I get set up? ###

* Summary of set up
* Configuration
* Dependencies
* Database configuration
* How to run tests
* Deployment instructions

### Contribution guidelines ###

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact
