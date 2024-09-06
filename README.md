# Description

Ce projet permet d'avoir un environnement de développement pour le PHP avec des drivers Oracles !
Il est prévu d'être installé dans votre répertoire /www

| image      | port (depuis le PC) | description                                                                        |
|------------|---------------------|------------------------------------------------------------------------------------|
| php74      | 1074                | PHP 7.4, xdebug, composer, symfony cli, node js, npm,yarn, phpStan, robotFramework |
| php81      | 1081                | PHP 8.1, xdebug, composer, symfony cli, node js, npm,yarn, phpStan, robotFramework |
| php82      | 1082 & 80           | PHP 8.2, xdebug, composer, symfony cli, node js, npm,yarn, phpStan, robotFramework |
| phpmyadmin | 1079                | web appli PhpMyAdmin pour mysql                                                    |
| adminer    | 1078                | web appli Adminer pour mysql, pgsql, sqlLite                                       |
| mysql      | 13306               | Serveur DB mySql                                                                   |
| postgres   | 15432               | Serveur DB postgres                                                                |
| saml2      | 1050                | Saml 2                                                                             |
| mailhog    | 1025 & 8025         | mailhog                                                                            |       
| opensearch | 9200 & 9600         | Open search                                                                        |

Depuis le répertoire d:\www

    git clone https://github.com/athos99/docker.git

Copier le fichier .htaccess dans le répertoire dwww, il vous permet de lister fichiers et répertoires.

### Pour déployer et créer les images

Il fait utiliser le wifi public, le proxy de l'état empêche l'installation !!! Mais on génère des images qui sont
utilisables avec le proxy px

    docker-compose build --pull  
    docker-compose up --build -d

Il m'y a rien d'immuables et des changements sont opérés sur les images et distributions linux, il se peut que
déploiement d'une image de container ne fonctionne plus !
En plus le proxy coince et les downloads échouent

Pour forcer la construction des images et recharger sans utiliser le cache

    docker-compose build --pull  --no-cache

Pour forcer la construction d'une image spécifique

    docker-compose build --pull  php82

## Pour accéder aux ressources depuis le PHP

Pour accéder au db de docker depuis docker

    DATABASE_URL="mysql://user:root@mysql:3306/db_name?serverVersion=5.7"
    DATABASE_URL="postgresql://postgres:root@postgres:5432/db_name?serverVersion=13&charset=utf8"

Pour accéder au db du pc hébergeant docker

    DATABASE_URL="mysql://user:root@host.docker.internal:3306/db_name?serverVersion=5.7"

Pour accéder à une Db sur le réseau

    DATABASE_URL="mysql://user:root@dev19:3306/db_name?serverVersion=5.7"

Pour accéder au db de docker en dehors de docker

    DATABASE_URL="mysql://user:root@localhost:13306/db_name?serverVersion=5.7"

## XDEBUG & PHPStorm

Avec phpstrom il est possible de debugger, metre PHPStorm en mode écoute XDEBUG et activer le debug depuis le browser.
PHP strom peut demander de préciser le mapping.

Depuis PHPstorm activer l'écoute XDebug (symbole téléphone barre du haut) ou depuis le menu Run /Start Listening for PHP
Connexion

Mettre un breakpoint dans index.php ou depuis le menu activer Run/Break at firstline of code

Depuis le browser charger votre page

Une popup s'ouvre et demande de renseigner ou se trouve la source sur docker. Saisir : /var/www/htdocs/public ensuite
valider.

Une fois la page lue, ouvrez le settings menu File/Setting

Chercher "servers", il propose PHP/Debug/Server, il peut avoir plusieurs configs choisir celle avec la connexion avec
docker (port 8082)

Pour le directory htdocs mettre /var/www/htdocs/, cela permet de debugger les répertoires src et vendor !
