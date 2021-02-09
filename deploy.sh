#!/usr/bin/env bash

#== Bash helpers ==

function info {
echo " "
echo "--> $1"
echo " "
}

#== Provision script ==

info "Provision-script user: `whoami`"


info "Init app"
# YII_ENV=dev php ./init --env=Development --overwrite=All
YII_ENV=prod php ./init --env=Production --overwrite=All


info "Apply migrations"
YII_ENV=prod php ./yii migrate --interactive=0


#info "Updating dependencies with Composer"
#composer update --no-dev

