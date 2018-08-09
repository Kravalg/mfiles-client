M-Files Client
==============

This library provides access to [M-Files](https://www.m-files.com/en), the intelligent Information Management which
introduces the Intelligent Metadata Layer (IML) that unifies information across systems like shared network folders SharePoint, OpenText, Documentum, Box, Dropbox and more. 

Here is a link to [M-Files's API documentation](https://www.m-files.com/mfws/).  
The API samples is available [here](https://www.m-files.com/mfws/samples.html).

## Usage

### 1. Integrate M-Files to your app

Check out [how to integrate this M-Files client in your app](docs/how-to-integrate.md).

[Methods documentation](docs/MFilesClient.md)
 
## Development

### Installation

The development environment runs on [Docker](https://www.docker.com/) and uses [docker-compose](https://docs.docker.com/compose/).

```
$ cp docker-compose.yml.dist docker-compose.yml

# Edit docker-compose.yml to customize data (UID and GID of your working user) 
$ vim docker-compose.yml

# Run composer
$ ./bin/docker-run composer install
```

### Coding Standards

This project uses [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) to maintain coding standards and homogeneity.

To use it:

```
$ ./bin/docker-run vendor/bin/php-cs-fixer fix
```

Please add [PHPDoc](https://www.phpdoc.org/) wherever you can.

### Testing

This project is tested with [PHPSpec](http://www.phpspec.net/en/stable/) and [Behat](http://behat.org/en/latest/).

Before launching Behat tests, copy `.env.dist` to `.env` and customize the parameters for your M-Files test account (all `TESTS_***` fields).

```
### PHPSpec
$ ./bin/docker-phpspec run
# which is a shortcut for:
$ docker-compose run --rm symfony vendor/bin/phpspec run -f pretty

### Behat
$ ./bin/docker-behat
# which is a shortcut for:
$ docker-compose run --rm symfony vendor/bin/behat
```
