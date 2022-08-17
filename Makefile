#!/usr/bin/make
# Makefile readme (ru): <http://linux.yaroslavl.ru/docs/prog/gnu_make_3-79_russian_manual.html>
# Makefile readme (en): <https://www.gnu.org/software/make/manual/html_node/index.html#SEC_Contents>

SHELL = /bin/bash

ifeq (,$(wildcard ./.env))
$(shell cp ./docker/.env.development.example ./.env)
$(shell sed -i "s/^DOCKER_USER=.*/DOCKER_USER=$(shell id -un)/" ./.env)
$(shell sed -i "s/^DOCKER_USER_UID=.*/DOCKER_USER_UID=$(shell id -u)/" ./.env)
$(shell sed -i "s/^DOCKER_USER_GID=.*/DOCKER_USER_GID=$(shell id -g)/" ./.env)
endif

include ./.env

.DEFAULT_GOAL: help

# This will output the help for each task. thanks to https://marmelab.com/blog/2016/02/29/auto-documented-makefile.html
.PHONY: help
help: ## Show this help
	@printf "\033[33m%s:\033[0m\n" 'Available commands'
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z0-9_-]+:.*?## / {printf "  \033[32m%-18s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.PHONY: build
build: ## Build containers
	@$(MAKE) down
	docker compose build

.PHONY: init
init: ## Make full application initialization
	docker compose up -d application
	docker compose exec application composer install --ansi --prefer-dist
ifeq (,$(wildcard ./src/.env))
	$(shell cp ./src/.env.example ./src/.env)
	docker compose exec application php artisan key:generate
endif
	@rm -rf ./src/storage/faker_photo
	@rm -rf ./src/storage/public
	docker compose exec application php artisan migrate --force --seed
	@rm -f ./src/public/storage
	docker compose exec application php artisan storage:link
	@$(MAKE) --no-print-directory up

.PHONY: up
up: ## Create and start containers
	docker compose up -d --remove-orphans
	@printf "\n ⠿\e[30;32m %s \033[0m\n" 'Application available at http://$(APP_DOMAIN):$(FORWARD_HTTP_PORT) or https://$(APP_DOMAIN):$(FORWARD_HTTPS_PORT)';

.PHONY: down
down: ## Stop containers
	docker compose down --remove-orphans

.PHONY: shell sh
shell: ## Start shell into app container
	@(docker compose run --rm application ash) || true
sh: shell

.PHONY: tinker ti
tinker: ## Start shell into app container (press CTRL+D for restart or CTRL+C for exit)
	@(docker compose run --rm application ash -c "while true; do php artisan tinker; echo Reloading; done") || true
ti: tinker

.PHONY: enable-xdebug on-xdebug
enable-xdebug: ## Enable XDebug (it makes app works slow)
	$(shell sed -i --regexp-extended 's/^[#]?XDEBUG_MODE=.*/XDEBUG_MODE=debug/' ./.env)
	docker compose up -d application
on-xdebug: enable-xdebug

.PHONY: disable-xdebug off-xdebug
disable-xdebug: ## Disable XDebug
	$(shell sed -i --regexp-extended 's/^[#]?XDEBUG_MODE=.*/#XDEBUG_MODE=debug/' ./.env)
	docker compose up -d application
off-xdebug: disable-xdebug

.PHONY: enable-telescope on-telescope
enable-telescope: ## Enable telescope profile tools (it makes app works very slow)
	$(shell sed -i --regexp-extended 's/^[#]?TELESCOPE_ENABLED=.*/TELESCOPE_ENABLED=true/' ./.env)
	docker compose up -d application
on-telescope: enable-telescope

.PHONY: disable-telescope off-telescope
disable-telescope: ## Disable telescope profile tools
	$(shell sed -i --regexp-extended 's/^[#]?TELESCOPE_ENABLED=.*/#TELESCOPE_ENABLED=true/' ./.env)
	docker compose up -d application
off-telescope: disable-telescope

.PHONY: test
test: up ## Execute app tests
	docker compose exec app composer test

.PHONY: test-cover
test-cover: ## Execute app tests with coverage
	docker compose run --rm -e 'XDEBUG_MODE=coverage' app composer phpunit

.PHONY: clear
clear: ## Make artisan clear (helps in develop env)
	-docker compose run --rm --no-deps application ash -c "\
		php ./artisan config:clear; \
		php ./artisan route:clear; \
		php ./artisan view:clear; \
		php ./artisan cache:clear file"
