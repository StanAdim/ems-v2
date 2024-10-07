staging.setup:
    git clone git@github.com:Apropriare/ictc-event-management-system.git code
	@make staging.update
    @make staging.migrate
    @make staging.filamentuser
    @make staging.superadmin

staging.update:
    cd code && git pull origin -ff
    @make staging.up
    @make staging.boost
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
staging.start:
	docker compose restart
staging.logs:
	docker logs -f staging-reg-events-v2
staging.bash:
	docker exec -it staging-reg-events-v2c exec bash
staging.filamentuser:
    docker exec -it staging-reg-events-v2 exec php artisan make:filament-user
staging.superadmin:
    docker exec -it staging-reg-events-v2 exec php artisan shield:super-admin

