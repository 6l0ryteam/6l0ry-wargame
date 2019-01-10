FROM ubuntu:16.04

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install nginx php-fpm supervisor -y
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
 && ln -sf /dev/stderr /var/log/nginx/error.log

RUN sed -i "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g" /etc/php/7.0/fpm/php.ini
COPY default /etc/nginx/sites-available/default
COPY flag.php /flag.php
COPY passwd.php /etc/

#RUN ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default 

COPY flag /flag_390gj3904gj390g34
RUN chmod 666 /flag_390gj3904gj390g34
RUN mkdir /sandbox
RUN chmod 777 /sandbox
COPY supervisord.conf /etc/supervisord.conf
CMD ["/usr/bin/supervisord", "-n"]
RUN service php7.0-fpm start
