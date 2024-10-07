staging.setup:
	@make staging.update
	@make staging.up
    @make staging.boost

staging.update:
    cd code
	git pull origin -ff
    cd ../
staging.up:
    # CURRENT_UID=$(id -u):$(id -g)
	docker-compose up --force-recreate --build -d
staging.boost:
	docker exec  staging-reg-events-v2 bash -c "php artisan config:clear"
	docker exec  staging-reg-events-v2 bash -c "php artisan config:cache"
staging.stop:
	docker compose stop
staging.migrate:
	docker exec  staging-reg-events-v2 bash -c "php artisan migrate"
staging.bash:
	docker exec -it  staging-reg-events-v2
staging.start:
	docker compose restart
staging.logs:
	docker logs -f staging-reg-events-v2

#================
#=== Production
#================

production.setup:
	@make production.build
	@make production.up
	@make production.composer-update
	@make production.boost
	@make production.yarn

production.reload:
	cd ../ && git pull origin production
	@make production.stop
	@make production.build
	@make production.up
	@make production.boost

production.build:
	docker compose -f docker-compose.prod.yml build

production.stop:
	docker compose -f docker-compose.prod.yml stop

production.up:
	docker compose -f docker-compose.prod.yml up -d

production.composer-update:
	docker exec  events-app-api bash -c "composer update"

production.data:
	docker exec  events-app-api bash -c "php artisan migrate:fresh --seed"

production.bash:
	docker exec -it  events-app-api bash
production.start:
	docker compose -f docker-compose.prod.yml restart

production.boost:
	#docker exec  events-app-api bash -c "php artisan migrate"
	docker exec  events-app-api bash -c "php artisan optimize"
	docker exec  events-app-api bash -c "composer dump-autoload"
	docker exec  events-app-api bash -c "chown -R www-data:www-data /var/www/html/storage /var/www/html/public /var/www/html/bootstrap/cache"
	docker exec  events-app-api bash -c "chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache"
production.rmi:
	docker image rm -f events-app-api-events-app-api
production.logs:
	docker logs -f events-app-api

production.fronts:
	cd ../frontend-app && yarn build && pm2 restart production.config.cjs &&  cd  ../backend-api && make production.start
production.site:
	cd ../taic-website && yarn build && pm2 restart ecosystem.config.cjs &&  cd  ../backend-api
# Define the directory and the command
DIR1 := ../frontend-app
DIR2 := ../taic-website
CMD := yarn && yarn build
CMD1 := pm2 restart production.config.cjs
CMD2 := pm2 restart ecosystem.config.cjs


# Target to change to the specified directory and execute the command
production.yarn:
	@cd $(DIR1) && $(CMD) && $(CMD1)
	@cd $(DIR2) && $(CMD) && $(CMD2)
	@echo "Command executed in $(DIR1) and in $(DIR2)"

git-merge:
	git checkout main; git fetch origin; git merge staging && git commit ; git push origin  main
	git checkout production; git fetch origin; git merge main && git commit && git push origin  production
	git checkout staging
