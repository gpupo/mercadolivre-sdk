#!/usr/bin/make
.SILENT:
.PHONY: help

## Colors
COLOR_RESET   = \033[0m
COLOR_INFO  = \033[32m
COLOR_COMMENT = \033[33m
SHELL := /bin/bash

export BASH_ENV=bin/.profile

## List Targets and Descriptions
help:
	printf "${COLOR_COMMENT}Usage:${COLOR_RESET}\n"
	printf " make [target]\n\n"
	printf "${COLOR_COMMENT}Available targets:${COLOR_RESET}\n"
	awk '/^[a-zA-Z\-\_0-9\.@]+:/ { \
	helpMessage = match(lastLine, /^## (.*)/); \
	if (helpMessage) { \
	helpCommand = substr($$1, 0, index($$1, ":")); \
	helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
	printf " ${COLOR_INFO}%-16s${COLOR_RESET} %s\n", helpCommand, helpMessage; \
	} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)

## Setup environment
setup:
	mkdir -p Resources/statistics

## Composer Install
install:
	composer self-update
	composer install --prefer-dist

## Composer Update and register packages
update:
	rm -f *.lock
	composer update --no-scripts -n
	composer info > Resources/statistics/composer-packages.txt

## Measure project size using PHPLOC and print human readable output
loc:
	printf "${COLOR_COMMENT}Running PHP Lines of code statistics on library folder${COLOR_RESET}\n"
	phploc --count-tests src/ tests/ | tee Resources/statistics/lines-of-codes.txt

## PHP Static Analysis Tool
stan:
	printf "${COLOR_COMMENT}Running PHP Static Analysis Tool${COLOR_RESET}\n"
	phpstan analyse src | tee Resources/statistics/stan-src.txt;
	phpstan analyse tests | tee Resources/statistics/stan-tests.txt;

## Apply Php CS fixer and PHPCBF fix rules
cs-fixer:
	 php-cs-fixer fix --verbose
	 phpcbf

## Run PHP Mess Detector on the test code
phpmd:
	phpmd src text codesize,unusedcode,naming,design --exclude vendor,tests,Resources

## Clean temporary files
clean:
	printf "${COLOR_COMMENT}Remove temporary files${COLOR_RESET}\n"
	rm -rfv ./vendor/* ./var/* ./*.lock ./*.cache
	git checkout ./var/cache/.gitignore ./var/data/.gitignore

phan:
	phan --config-file config/phan.php
