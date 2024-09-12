# Description

Ce projet permet d'avoir un environnement de développement pour le PHP a
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

# Installation

1) Depuis le répertoire d:\www faire
    git clone https://git.devops.etat-ge.ch/gitlab/DEVELOPPEUR-PHP/composants/docker_www.git

2) Copier le fichier .htaccess dans le répertoire d:/www, il vous permet de lister fichiers et répertoires.


### Pour déployer et créer les images

Depuis la console windows power shell

    docker-compose build --pull  
    docker-compose up --build -d

Il m'y a rien d'immuables et des changements sont opérés sur les images et distributions linux, il se peut que
déploiement d'une image de container ne fonctionne plus !


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
docker (port 1082)

Pour le directory htdocs mettre /var/www/htdocs/, cela permet de debugger les répertoires src et vendor !




## Xdebug avec vscode

Refaire toutes les images avec la dernière version du fichier docker-compose.yml ( il est modifié pour avoir le debug)

1) Depuis la console windows normal avec le réesau sur le wifi et docker sans proxy. (Attention avec les dernière version de docker il faut aussi désactivé le proxy. Aller dans Setup Ressources Proxy, choisissez manuel configuration et laissez vide web server et secure web server.)

        cd \\wsl.localhost\Ubuntu\home\user\www\docker_www
        docker-compose build --pull  
        docker-compose up --build -d


2) Depuis la console windows lancée avec les droits admin
   
        New-NetFirewallRule -DisplayName "WSL" -Direction Outbound  -InterfaceAlias "vEthernet (WSL (Hyper-V firewall))"  -Action Allow

Ca doit ouvrir des ports que le firewall de windows bloque

## Installer et configurer dans VsCode

1) Installer le plugin PHP XDebug
2) Dans l'écran principal de l'extension XDebug, presser sur la petite roue dentée / Extension setting pour configurer l'extension ou File/Prefrence/Settings  @ext:xdebug.php-debug.
Signet remote[WSL unbuntu]

        PHP>Debug:Ide key  ->  XDEBUG_ECLIPSE

3) Créer ou modifier le fichier .vscode/lauch.json en ajoutant
        {

            {
                "version": "0.2.0",
                "configurations": [
                    {
                        "name": "Listen for Xdebug",
                        "type": "php",
                        "request": "launch",
                        "port": 9003,
                        "pathMappings": {
                            "/var/www/mon_projet/": "${workspaceRoot}/"
                    },
                "hostname": "localhost"
                }
            ]   
        }



### Lancer le debugger
Par défaut le debugger est désactivé il y a 3 possibilités :

- Utiliser sur chorme l'extension Xdebug Helper. Il doit être configuré pour avoir la IDE Key à la valeur XDEBUG_ECLIPSE
- Dans votre code ajouter l'instruction xdebug_connect_to_client(); qui active le debugger. (Partique quand on debug un web service)
- Modifier le fichier config/php/docker-php.ini rempalcer la valeur

        xdebug.start_with_request=yes


Et sur vscode activer le debugger en ouvrant le signet de debug et lancer Listen for X Debug

Mettre des break point dans votre code

Charger la page depuis le browser

