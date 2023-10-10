FROM docker.io/wardenenv/php-fpm:8.2-magento2
RUN set -eux \
	&& sudo dnf install -y php-pgsql \
	&& sudo rm -rf /var/cache/dnf
