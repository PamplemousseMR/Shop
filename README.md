# Shop

Website that sell items.

## CI

![Build Status](https://github.com/PamplemousseMR/Shop/actions/workflows/build.yml/badge.svg)

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- [Composer](https://getcomposer.org/doc/00-intro.md) :  Composer is a tool for dependency management in PHP.

### Generation

- composer install
- composer update
- php vendor/bin/doctrine orm:convert-mapping --namespace="" --force --from-database yml ./config/yaml
- php vendor/bin/doctrine orm:generate-entities --generate-annotations=false --update-entities=true --generate-methods=false ./model
- composer update
- php vendor/bin/doctrine orm:schema-tool:update --force
- php vendor/bin/doctrine orm:validate-schema
- php vendor/bin/doctrine orm:clear-cache:metadata

## Authors

* **MANCIAUX Romain** - *Initial work* - [PamplemousseMR](https://github.com/PamplemousseMR).

## License

This project is licensed under the GNU Lesser General Public License v3.0 - see the [LICENSE.md](LICENSE.md) file for details.