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
