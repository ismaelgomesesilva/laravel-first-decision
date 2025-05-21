fix-perms:
	sudo chown -R $(USER):www-data laravel-app
	sudo find laravel-app -type f -exec chmod 644 {} \;
	sudo find laravel-app -type d -exec chmod 755 {} \;
	sudo chmod -R 775 laravel-app/storage laravel-app/bootstrap/cache
