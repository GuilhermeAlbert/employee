# Require nginx and php fpm 
FROM wyveo/nginx-php-fpm:latest

# Define the nginx workdir
WORKDIR /usr/share/nginx

# Remove html repository
RUN rm -rf /usr/share/nginx/html

# Get project files and add to container
COPY . /usr/share/nginx

# Give permissions in folders
RUN chmod -R 775 /usr/share/nginx/storage/*
RUN chmod -R 777 /usr/share/nginx/storage/
# RUN chmod -R 777 .docker

# Create a symbolic link
RUN ln -s public html

# Prepare the project with automation
# CMD bash -c "composer install && cp .env.example .env && php artisan key:generate && php artisan migrate"
