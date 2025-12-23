FROM phpmyadmin/phpmyadmin

ENV PMA_ARBITRARY=1
ENV PMA_HOSTS=mysql
ENV PMA_USER=root
ENV PMA_PASSWORD=password
