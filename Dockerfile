FROM ubuntu

# Actualiza la lista de paquetes
RUN apt-get update

# Establece la variable de entorno DEBIAN_FRONTEND como noninteractive
ENV DEBIAN_FRONTEND=noninteractive

# Instala PHP
RUN apt-get install -y php-cli
RUN apt-get install -y php-zip
RUN apt-get install -y php-mysql
RUN apt-get install -y unzip
RUN apt-get install -y git

# Actualiza la lista de paquetes e instala curl
RUN apt-get update && apt-get install -y curl

# Instala nvm
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash

# Fuente de nvm para que esté disponible en este shell
SHELL ["/bin/bash", "--login", "-c"]

# Instala la versión deseada de Node.js y npm
RUN source ~/.nvm/nvm.sh && nvm install 20.7.0



# Instala Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

# Instala la extensión DOM
RUN apt-get install -y php-xml

RUN apt-get install -y php-curl


# Limpia los archivos temporales y caché
RUN apt-get clean && rm -rf /var/lib/apt/lists/*




# Crea un directorio para tu proyecto
RUN mkdir /project

# Copia los archivos de tu proyecto al directorio creado
COPY . /project

# Establece el directorio de trabajo
WORKDIR /project

# Instala las dependencias de tu proyecto PHP
COPY composer.json /project/composer.json
COPY composer.lock /project/composer.lock

RUN composer install

# Ejecuta el comando 'php artisan serve' para iniciar el servidor
CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "8000"]