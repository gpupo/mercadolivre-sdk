# This file has settings for the Make of this project.
# Targets must exist in the bin/make-file/targets/ directory.

.SILENT:
CURRENT_DIR := $(shell pwd)

## Install vendor
install:
	COMPOSER_MEMORY_LIMIT=9G composer install --prefer-dist --no-scripts

## Install vendor
install@force:
	test -f composer.lock && rm -f composer.lock
	COMPOSER_MEMORY_LIMIT=9G composer install --prefer-dist --no-scripts --ignore-platform-req True

update:
	test -f composer.lock && rm composer.lock
	COMPOSER_MEMORY_LIMIT=9G composer update --prefer-dist --no-scripts