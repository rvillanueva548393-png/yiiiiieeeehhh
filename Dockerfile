# Use PHP with Apache (a web server)
FROM php:8.2-apache

# Copy all your files (php, images, mp3) to the web server folder
COPY . /var/www/html/

# Tell Render to listen on port 80
EXPOSE 80
