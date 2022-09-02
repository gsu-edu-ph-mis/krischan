# Deploy to AWS Lightsail

- https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-ubuntu-18-04
- https://www.digitalocean.com/community/tutorials/how-to-install-wordpress-with-lemp-on-ubuntu-18-04
- https://www.digitalocean.com/community/tutorials/how-to-set-up-nginx-server-blocks-virtual-hosts-on-ubuntu-16-04


sudo chown -R www-data:www-data /var/www/cjp/wp-content/themes/krischan


`sudo nano /etc/nginx/sites-available/journals.gsu.edu.ph`


    server {
        server_name journals.gsu.edu.ph;
        root /home/ubuntu/cjp;
        index index.php index.html;

        location / {
            try_files $uri $uri/ /index.php$is_args$args;
        }

        location ~ \.php$ {
            include snippets/fastcgi-php.conf;
            fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
        }

        location ~ /\.ht {
            deny all;
        }

        location = /favicon.ico { log_not_found off; access_log off; }
        location = /robots.txt { log_not_found off; access_log off; allow all; }
        location ~* \.(css|gif|ico|jpeg|jpg|js|png)$ {
            expires max;
            log_not_found off;
        }

        client_max_body_size 10M;
    }

`sudo ln -s /etc/nginx/sites-available/journals.gsu.edu.ph /etc/nginx/sites-enabled/`