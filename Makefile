.PHONY: deploy
deploy:
	rsync -av ./var/www/html/. root@gingras.family:/var/www/html/.
