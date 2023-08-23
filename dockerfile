FROM ubuntu:20.04

RUN apt-get update && \
    apt-get install -y nginx php8.0-fpm

WORKDIR /app

COPY . /app

COPY config/bbs.conf /etc/nginx/conf.d/

EXPOSE 3006

CMD service php8.0-fpm start && nginx -g 'daemon off;'
