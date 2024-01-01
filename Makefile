.PHONY: help

help:
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

install:##install project
	composer install
	npm install
	npm run dev
	symfony console doctrine:database:create
	make rebuild

rebuild:##rebuild database
	symfony console doctrine:database:drop --force
	symfony console doctrine:database:create
	symfony console doctrine:schema:update --force
	symfony console doctrine:fixtures:load -n
