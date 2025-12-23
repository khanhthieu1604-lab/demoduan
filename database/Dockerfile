FROM mysql:5.7

RUN echo "USE mysql;" > /docker-entrypoint-initdb.d/timezones.sql &&  mysql_tzinfo_to_sql /usr/share/zoneinfo >> /docker-entrypoint-initdb.d/timezones.sql
ADD ./my.cnf /etc/mysql/conf.d/my.cnf

EXPOSE 3306

CMD [ "mysqld" ]
