# TOUT SUR LES MATHS
## Description
ToutSurLesMaths est un site pour réviser ses cours de manière simple

Les niveau vont de la 6e à la 3e

Vous avez aussi la possibilité de vous inscrire sur notre site pour enregistrer votre niveau et montrer votre profil à qui vous le souhaitez

## Création de la base de données
Rendez vous sur [phpMyAdmin](http://localhost/mysql/), dans la rubrique SQL et importez le fichier quizmaths.sql dans le dossier.

## Lien de la page
[ToutSurLesMaths](http://localhost/quizmaths/)

## Support
Pour tout bug éventuel veuillez vous adresser aux adresses emails suivantes :
omaimaskalli@yahoo.com,
jadeg2003@icloud.com,
kevin.kameni77500@gmail.com

## Credits
Ce site a été créé par les personnes suivantes :

Omaima SKALLI BOUAZIZA

Jade Gay

Kévin KAMENI

## Précisions
A chaque :
```php
session_start();
```
cela signifie que le site ouvre une session qui nous servira à stocker des infos sur l'utilisateur avec par exemple :
```php
$_SERVER['username']
```
Le fichier .htaccess avec des commandes comme :

```apache
RewriteEngine On

RewriteRule ^heracles$ /quizmaths/users/heracles.php
```
sert à créer un URL qui redirige vers un fichier du site, ici, l'URL http://localhost/quizmaths/heracles va en réalité m'ammener vers http://localhost/quizmaths/users/heracles.php

C'est plus joli !