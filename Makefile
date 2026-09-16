.PHONY: deploy
deploy:
	rsync -av ./var/www/html/. root@gingras.family:/var/www/html/.
	rsync -av ./etc/skel/. root@gingras.family:/etc/skel/.
