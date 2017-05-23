# Laravel Blog


## Laravel Blog Installation

To successfully install on the server, you need to do the following:

1. <strong>Clone a project;</strong>
1. <strong>Run composer install in project directory;</strong>
1. <strong>Create .env file (fill only necessary fields);</strong>
1. <strong>Run php artisan key:generate in project folder;</strong>
1. <strong>Project permissions:</strong> sudo chgrp -R www-data storage bootstrap/cache | sudo chmod -R ug+rwx storage bootstrap/cache

## Nginx config example:

```
server {
        listen 80;
        server_name blog.dev www.blog.dev;
        root /home/user/develop/laravel_blog/public;
	    index index.html index.htm index.php;

        charset utf-8;

        client_max_body_size 100m;
     
        gzip on;
        gzip_disable "msie6";
        gzip_types text/plain text/css application/json application/x-javascript text/xml application/xml application/xml+rss text/javascript application/javascript;

        location / {
                try_files $uri $uri/ /index.php?$query_string;
        }

	    location ~ \.php$ {
        		fastcgi_split_path_info ^(.+?\.php)(/.*)$;
        		fastcgi_pass unix:/var/run/php5-fpm.sock;
        		fastcgi_index index.php;
        		fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        		include fastcgi_params;

                fastcgi_intercept_errors off;
                fastcgi_buffer_size 16k;
                fastcgi_buffers 4 16k;
                fastcgi_connect_timeout 75;
                fastcgi_send_timeout 300;
                fastcgi_read_timeout 300;
	}

        location ~ /\.ht {
                deny all;
        }
}
```
