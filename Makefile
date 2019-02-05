#!/usr/bin/make
.SILENT:
.PHONY: help
DC=docker-compose
RUN=$(DC) run --rm php-fpm
COMPOSER_BIN=~/.composer/vendor/bin
VENDOR_BIN=./vendor/bin
## Colors
COLOR_RESET   = \033[0m
COLOR_INFO  = \033[32m
COLOR_COMMENT = \033[33m
SHELL := /bin/bash

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

#Go to the bash container of the application
bash:
	@$(RUN) bash
	printf "${COLOR_COMMENT}Container removed.${COLOR_RESET}\n"

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
phploc:
	mkdir -p Resources/statistics;
	printf "${COLOR_COMMENT}Running PHP Lines of code statistics on library folder${COLOR_RESET}\n"
	${COMPOSER_BIN}/phploc --count-tests src/ tests/ | grep -v Warning | tee Resources/statistics/lines-of-codes.txt

## PHP Static Analysis Tool
phpstan:
	printf "${COLOR_COMMENT}Running PHP Static Analysis Tool${COLOR_RESET}\n"
	${COMPOSER_BIN}/phpstan analyse -c config/phpstan.neon -l 4 src

## Apply CS fixers and QA watchers
qa: cs phploc phpstan phpmd phan

## Apply Php CS fixer and PHPCBF fix rules
cs: php-cs-fixer phpcbf

## Apply Php CS fixer rules
php-cs-fixer:
	 ${COMPOSER_BIN}/php-cs-fixer fix --verbose

## Apply PHPCBF fix rules
phpcbf:
	 ${COMPOSER_BIN}/phpcbf -i;
	 ${COMPOSER_BIN}/phpcbf -v

## Run PHP Mess Detector on the test code
phpmd:
	${COMPOSER_BIN}/phpmd src text codesize,unusedcode,naming,design --exclude vendor,tests,Resources

## Clean temporary files
clean:
	printf "${COLOR_COMMENT}Remove temporary files${COLOR_RESET}\n"
	rm -rfv ./vendor/* ./var/* ./*.lock ./*.cache
	git checkout ./var/cache/.gitignore ./var/data/.gitignore

## Run Phan checkup
phan:
	${COMPOSER_BIN}/phan --config-file config/phan.php

## Run phpunit testcases
phpunit:
	${VENDOR_BIN}/phpunit --testdox

## Update make file
selfupdate:
	cp -f vendor/gpupo/common/Makefile Makefile

## Build and publish a github gh-pages branch
gh-page:
	mkdir -p var/cache;
	echo "---" > var/cache/index.md;
	echo "layout: default" >> var/cache/index.md;
	echo "---" >> var/cache/index.md;
	cat README.md  >> var/cache/index.md;
	git checkout gh-pages || (git checkout --orphan gh-pages && git ls-files -z | xargs -0 git rm --cached);
	mkdir -p _layouts;
	cp -f vendor/gpupo/common/Resources/gh-pages-template/default.html _layouts/
	cp -f vendor/gpupo/common/Resources/gh-pages-template/_config.yml .;
	cp var/cache/index.md  .;
	git add -f index.md _config.yml _layouts/default.html;
	git commit -m "Website recreated by gpupo/common";
	git push -f origin gh-pages:gh-pages;
	git checkout -f master;
