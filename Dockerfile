# PHP base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    gnupg \
    lsb-release \
    libonig-dev \
    libzip-dev \
    libpng-dev \
    libxml2-dev \
    libwebp-dev \
    libjpeg-dev \
    zip \
    unzip

# Install Node.js based on architecture
RUN ARCH=$(dpkg --print-architecture) && \
    if [ "$ARCH" = "amd64" ]; then \
      NODE_ARCH=x64; \
    elif [ "$ARCH" = "arm64" ]; then \
      NODE_ARCH=arm64; \
    fi && \
    curl -fsSL https://nodejs.org/dist/v18.18.0/node-v18.18.0-linux-$NODE_ARCH.tar.xz | tar -xJf - -C /usr/local --strip-components=1

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-webp --with-jpeg
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl soap xml zip
RUN docker-php-ext-configure intl


# Add user for Laravel application
RUN useradd -ms /bin/bash nxlog

RUN mkdir -p /var/www/bootstrap/cache \
    && chown -R nxlog:nxlog /var/www/bootstrap/cache \
    && chmod -R 777 /var/www/bootstrap/cache

# Add permission to storage folder
RUN mkdir -p /var/www/storage \
    && chown -R nxlog:nxlog /var/www/storage \
    && chmod -R 777 /var/www/storage

RUN chown -R nxlog:nxlog /var/www
RUN chmod -R 777 /var/www

# Install Xdebug
RUN pecl install xdebug and docker-php-ext-enable xdebug
ADD docker/xdebug/xdebug.ini /usr/local/etc/php/disabled/docker-php-ext-xdebug.ini

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Add alias for bash
RUN echo "\
    alias pa='php artisan'\n\
    alias migrate='php artisan migrate'\n\
    alias seed='php artisan db:seed'\n\
    alias tinker='php artisan tinker'\n\
    alias reverb='php artisan reverb:start'\n\
    alias horizon='php artisan horizon'\n\
    alias dev='npm run dev'\n\
    " >> /home/nxlog/.bashrc

# Save command history bash (only user root)
RUN SNIPPET="export PROMPT_COMMAND='history -a' && export HISTFILE=/commandhistory/.bash_history" \
    && echo $SNIPPET >> ~/.bashrc

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

EXPOSE 9000

# Install Starship
RUN curl -sS https://starship.rs/install.sh | sh -s -- --yes

# Add Starship init script to .bashrc
RUN echo 'eval "$(starship init bash)"' >> /home/nxlog/.bashrc

# Switch back to the non-root user
USER nxlog
