fix-perms:
	sudo chown -R $(USER):www-data laravel-app
	sudo find laravel-app -type f -exec chmod 644 {} \;
	sudo find laravel-app -type d -exec chmod 755 {} \;
	sudo chmod -R 775 laravel-app/storage laravel-app/bootstrap/cache

node-install:
	docker exec -it node_app npm install

node-dev:
	docker exec -u node -it node_app npm run dev

node-build:
	docker exec -it node_app npm run build

laravel-serve:
	docker exec -it laravel_app php artisan serve

migrate-seed:
	docker exec -it laravel_app php artisan migrate --seed

clone:
	git clone https://github.com/ismaelgomesesilva/laravel-first-decision.git
	cd laravel-first-decision

docker-up:
	docker-compose up -d --build

test:
	docker exec -it laravel_app php artisan test

install:
	make clone
	make docker-up
	make fix-perms
	make node-install
	make node-build
	make migrate-seed

