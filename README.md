# gingras.family

This is the source repo for the gingras.family server. The `./etc` directory contains configuration copied from the server via the `make sync` target. The `./var/www/html` directory is deployed to the server via the `make deploy` target. Only the relevant files are copied here, which basically means only files/directories under `/etc` on the server which have been editted from the defaults.

## Software

The server has the following packages installed above the Debian 13 base. Many of these are using the default configuration and thus are not replicated here. If you need extra software please file an issue so I can install it on the server and get it listed here.

- `acme.sh` Automatic TLS certificate management
- `apparmor`, `apparmor-profiles`, `apparmor-profiles-extra`, `apparmor-utils` Mandatory access control
- `fail2ban` Brute force prevention
- `nginx` Webserver
- `php-fpm` PHP FastCGI Process Manager
- `slapd` Standalone LDAP Daemon (Identity management)
- [`openssh-lpk`](https://code.google.com/archive/p/openssh-lpk/) Centralize SSH authorizedkeys
- `ldapscripts` LDAP User and Group management
- `pwgen` Soft dependency of `ldapscripts`
- `sssd`, `sssd-tools` For syncing user information with ldap

## Infrastructure

1. Hetzner Cloud, `gingras.family` project
2. Network `us-east-net-1` 10.0.1.0/24
3. Server `fw-1.east.us.gingras.family` pfSense 2.9.0 router. 5.161.237.121 -> 10.0.1.2
4. Network route 0.0.0.0/0 via `fw-1`
4. Server `web-1.east.us.gingras.family` Debian 13 server 10.0.1.3. DNS to `fw-1`. Network configured with cloud-config.yml
5. Ports 22, 80, 443/tcp port forwarded to `web-1`
6. Firewall SSH set to `122/tcp` and Web UI to `8443/tcp`
7. pfSense Acme package installed. Configures an IP cert for 5.161.237.121 for the WebUI using a password-based SFTP-only account copying the challenge directly to the account-owned directory at /var/www/html/.well-known/acme-challenge on web-1. The SFTP gets chrooted to /var/www/html which needs to remain root:root 0644 to keep this working.
