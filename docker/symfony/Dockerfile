# https://registry.hub.docker.com/_/php/
FROM php:7.0-cli

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN buildRequirements="libicu-dev g++ zlib1g-dev" \
    exts="intl mbstring pcntl zip" \
    && apt-get update \
    && apt-get install -qq -y ${buildRequirements} \
    && docker-php-ext-install ${exts} \
    && runtimeRequirements="libicu52 git" \
    && apt-get install -y --auto-remove ${runtimeRequirements} \
    && apt-get purge -y ${buildRequirements} \
    && rm -rf /var/lib/apt/lists/*

COPY php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www

ARG UID=1000
ARG GID=1000
ARG SYMFONY__CACHE_DIR=/dev/shm/symfony/cache
ARG SYMFONY__LOGS_DIR=/var/log/symfony
ENV SYMFONY__CACHE_DIR $SYMFONY__CACHE_DIR
ENV SYMFONY__LOGS_DIR SYMFONY__LOGS_DIR

# Create user
RUN groupadd -f -g $GID symfony
RUN useradd -m -s /bin/bash -u $UID -g $GID symfony

# Create directories
RUN mkdir -p $SYMFONY__CACHE_DIR && \
    mkdir -p $SYMFONY__LOGS_DIR && \
    chown symfony:symfony $SYMFONY__CACHE_DIR && \
    chown symfony:symfony $SYMFONY__LOGS_DIR

USER symfony