## Step 1

#### Demo

1. Placer les fichiers du site web dans le dossier public-html

2. Contruire l'image :
`docker build -t httpinfra/apache2-php-server .` ou `./build-image.sh`

3. Démarrer le conteneur :
`docker-compose up -d`

4. Le site web est accessible à l'adresse http://localhost:8080/index.php :
![](img/site.jpg)

#### Explications du Dockerfile

Je ne me suis pas basé sur une image existante de httpd. Je suis parti sur une base Ubuntu et j'ai installé les packages nécessaire à Apache et PHP à la main. Ceci permet une granularité fine sur les paquets installés :
```
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt install -y apache2 php php-cli php-fpm php-json php-common php-mysql \
 php-zip php-gd php-mbstring php-curl php-xml php-pear php-bcmath
```

On active ensuite les modules Apache permettant entre autres la réécriture d'URL, l'utilisation d'un proxy, l'activation de SSL et de PHP.
```
RUN a2enmod proxy_fcgi setenvif
RUN ...
```
Le Dockerfile copie le contenu du dossier `public-html` au répertoire racine d'Apache :
```
COPY ./public-html/ /var/www/html/
```
puis démarre le serveur :

```
CMD ["apachectl", "-D", "FOREGROUND"]
```

#### Explications du docker-compose

Le fichier `docker-compose.yml` détient la configuration a appliquer pour lancer le conteneur. Je spécifie l'image à utiliser, le nom du conteneur, la politique de redémarrage du conteneur (si l'hôte redémarre, je veux que le conteneur le fasse aussi automatiquement), et je fais le port mapping. C'est également dans ce fichier que l'on ferait les configurations nécessaires pour utiliser des volumes.

#### Configuration d'Apache

Par défaut Apache s'installe avec un vhost configuré et lancer avec comme répertoire racine `/var/www/html`. Il n'y a donc pas besoin de faire des configurations particulières.

Les fichiers de configuration Apache se trouvent sous `/etc/apache2` et les vhost se trouve dans le sous-répertoire `sites-available`. C'est là-dedans que l'on configure les vhost et on les active avec la commande `a2ensite vhost.conf`

