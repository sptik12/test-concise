FROM yiisoftware/yii2-php:8.0-apache

ARG PHP_ENV=Development

ENV FE_HOST fe.local
ENV BE_HOST be.local

# Make both frontend and backend as vhosts of one container
RUN set -ex; \
	apt-get update; \
	apt-get install -y --no-install-recommends default-mysql-client ca-certificates git unzip mc; \

	if [ "$PHP_ENV" = "Production" ]; then \
	  ini_file="$PHP_INI_DIR/php.ini-production"; \
	else \
	  ini_file="$PHP_INI_DIR/php.ini-development"; \
	fi; \
	cp $ini_file "$PHP_INI_DIR/php.ini"

COPY ./docker-run.sh /
RUN chmod +x /docker-run.sh

CMD /docker-run.sh
