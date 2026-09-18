FILES = /etc/nftables.conf /var/www/html/ /etc/skel/ /etc/apache2/ /etc/php/8.4/fpm/php-fpm-user.conf /etc/systemd/system/php8.4-fpm@.service /etc/nginx/ /etc/systemd/system-generators/php-fpm-user-generator
RSYNC_ARGS =

.PHONY: help
help:
	@echo ""
	@echo "Usage: make [target] [variables]"
	@echo ""
	@echo "Available targets:"
	@echo "  help: This help text (default)"
	@echo "  deploy: Copy local files known to git to the server"
	@echo "  sync: Copy remote files to the local repo"
	@echo ""
	@echo "Supported variables:"
	@echo "  RSYNC_ARGS: Extra arguments passed to rsync"

.PHONY: deploy
deploy:
	@for f in $(FILES); do \
		rsync -vrltE --no-owner --no-group $(RSYNC_ARGS) "./$${f#/}" "root@gingras.family:$$f"; \
	done

.PHONY: sync
sync:
	@for f in $(FILES); do \
		rsync -vrltE --no-owner --no-group $(RSYNC_ARGS) "root@gingras.family:$$f" "./$${f#/}" ; \
	done
