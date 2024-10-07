setup:
    git clone git@github.com:Apropriare/ictc-event-management-system.git code
	@make update
    @make migrate
    @make filamentuser
    @make superadmin

update:
    cd code && git pull origin -ff
    @make up
    @make boost
up:
    # CURRENT_UID=$(id -u):$(id -g)
	docker-compose up --force-recreate --build -d
boost:
	docker exec  staging-reg-events-v2 bash -c "php artisan config:clear"
	docker exec  staging-reg-events-v2 bash -c "php artisan config:cache"
stop:
	docker compose stop
migrate:
	docker exec  staging-reg-events-v2 bash -c "php artisan migrate"
start:
	docker compose restart
logs:
	docker logs -f staging-reg-events-v2
bash:
	docker exec -it staging-reg-events-v2c exec bash
filamentuser:
    docker exec -it staging-reg-events-v2 exec php artisan make:filament-user
superadmin:
    docker exec -it staging-reg-events-v2 exec php artisan shield:super-admin

