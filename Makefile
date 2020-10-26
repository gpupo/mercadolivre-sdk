# This file has settings for the Make of this project.
# Targets must exist in the bin/make-file/targets/ directory.

.SILENT:
CURRENT_DIR := $(shell pwd)

install:
	COMPOSER_MEMORY_LIMIT=9G composer install --prefer-dist --no-scripts
update:
	test -f composer.lock && rm composer.lock
	COMPOSER_MEMORY_LIMIT=9G composer update --prefer-dist --no-scripts