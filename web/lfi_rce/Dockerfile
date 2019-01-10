FROM ubuntu:16.04

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install nginx php-fpm supervisor -y
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
 && ln -sf /dev/stderr /var/log/nginx/error.log

RUN sed -i "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g" /etc/php/7.0/fpm/php.ini
COPY default /etc/nginx/sites-available/default

#RUN ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default 

COPY flag /flag_yoyoyoyoyoyoyo
COPY supervisord.conf /etc/supervisord.conf
CMD ["/usr/bin/supervisord", "-n"]
RUN service php7.0-fpm start
