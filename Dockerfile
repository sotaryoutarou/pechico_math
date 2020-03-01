FROM php:7.4-cli
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apt-get update && apt-get install -y \
  git vim unzip \
  && apt-get clean
