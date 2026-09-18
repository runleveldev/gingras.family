# gingras.family

This is the source repo for the gingras.family server. The `./etc` directory contains configuration copied from the server via the `make sync` target. The `./var/www/html` directory is deployed to the server via the `make deploy` target. Only the relevant files are copied here, which basically means only files/directories under `/etc` on the server which have been editted from the defaults.

## Software

The server has the following packages installed above the Debian 13 base. Many of these are using the default configuration and thus are not replicated here. If you need extra software please file an issue so I can install it on the server and get it listed here.

- `acme.sh`
- `apparmor`, `apparmor-profiles`, `apparmor-profiles-extra`, `apparmor-utils`
- `fail2ban`
- `nginx`
- `php-fpm`
