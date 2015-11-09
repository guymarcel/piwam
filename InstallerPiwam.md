# Installer et utiliser Piwam #

Vous trouverez ici la procédure à suivre pour installer _Piwam_ au sein de votre infrastructure.

## Pré-requis ##

  * [PHP](http://www.php.net/) >= 5.2.4
    * module `mb_string`
    * module `php_openssl` (pour envoyer des e-mails _via_ un canal sécurisé)
    * module `php_smtp` (pour l'envoi d'e-mails via un serveur smtp)
    * paramètre `memory_limit` >= 128 Mo
  * [MySQL](http://www.mysql.com/)
  * [Apache](http://www.apache.org/)
    * module `mod_rewrite`



&lt;hr /&gt;


## A- Installation ##

  1. Récupérez une version fonctionnelle de Piwam depuis une tarball ou depuis le dépôt SVN
  1. Lancez Apache/MySQL
  1. Nous supposerons par la suite que Piwam est installé dans le répertoire /var/www/piwam
  1. Rendez les répertoire `log` et `cache` inscriptibles, ainsi que le fichier`/config/databases.yml` et tous les répertoires contenus dans `/web/uploads/`. Cela correspond à la commande suivante :
```
cd /var/www/piwam
chmod 777 cache log config/databases.yml web/uploads/*
```

> Si le serveur tourne sous Windows, vous pouvez oublier cette étape.




&lt;hr /&gt;


## B- Configurer un Virtual Host ##

Si vous utilisez  Piwam  sur votre serveur web,  il est fortement recommandé  de configurer un accès par VirtualHost.  Par exemple, "http://piwam.mon-domaine.com"  doit faire référence au répertoire `/path/to/piwam/web`.

Voici  un exemple de configuration que vous  devriez placer  dans votre fichier de configuration Apache (`apache/conf/httpd.conf` ou `apache2/sites-available/piwam` par exemple) :

```
<VirtualHost *:80>
    ServerName piwam.my-domain.com
    DocumentRoot "/home/foobar/piwam/web"
    DirectoryIndex index.php
    <Directory "/home/foobar/piwam/web">
        AllowOverride All
        Allow from All
        # Forcer la configuration PHP pour Piwam
        <IfModule mod_php5.c>
            php_value magic_quotes_gpc                0
            php_value register_globals                0
            php_value session.auto_start              0
            php_value mbstring.http_input             pass
            php_value mbstring.http_output            pass
            php_value mbstring.encoding_translation   0
        </IfModule>
    </Directory>
</VirtualHost>
```

Si vous souhaitez juste essayer Piwam,  ou si Piwam est installé sur  votre  ordinateur personnel  est  n'est pas  accessible  par Internet,  vous   pouvez  sans  soucis   ne  pas configurer  de VirtualHost.





&lt;hr /&gt;


## C- Accéder à Piwam ##

Lancez  votre navigateur Internet - essayez de choisir Firefox ou Google Chrome ;-)   Si un  VirtualHost a été  configuré,  allez à l'adresse configuré (ici: http://piwam.mon-domaine.com). Autrement,  vous  pouvez  accéder  à Piwam  directement  par  une adresse telle que http://your-server.com/piwam/web





&lt;hr /&gt;


## D- Finir l'installation depuis l'interface web ##

Maintenant  que vous savez comment accéder à Piwam,  il est temps de  vérifier votre configuration  et  de finir  quelques réglages. Cette partie se déroule en 2 étapes :

  1. Piwam vérifie votre configuration.  Est-ce que les modules PHP nécessaires  sont bien activés, est-ce que les répertoires qui doivent être inscriptibles le sont bien, etc.

| ![http://adrien.frenchcomp.net/images/piwam/screenshots/install_step1.png](http://adrien.frenchcomp.net/images/piwam/screenshots/install_step1.png) |
|:----------------------------------------------------------------------------------------------------------------------------------------------------|

  1. Configuration de  l'accès à  votre base de  données MySQL. Une vérification  des  paramètres  est  effectuée  et  un  message d'erreur apparaîtra si ceux-ci sont incorrects.

| ![http://adrien.frenchcomp.net/images/piwam/screenshots/install_step2.png](http://adrien.frenchcomp.net/images/piwam/screenshots/install_step2.png) |
|:----------------------------------------------------------------------------------------------------------------------------------------------------|

| ![http://adrien.frenchcomp.net/images/piwam/screenshots/install_step2_error.png](http://adrien.frenchcomp.net/images/piwam/screenshots/install_step2_error.png) |
|:----------------------------------------------------------------------------------------------------------------------------------------------------------------|

| ![http://adrien.frenchcomp.net/images/piwam/screenshots/install_end.png](http://adrien.frenchcomp.net/images/piwam/screenshots/install_end.png) |
|:------------------------------------------------------------------------------------------------------------------------------------------------|




&lt;hr /&gt;


## E- Configurer Piwam ##
Créez une association, identifiez-vous, puis dans le menu choisissez "préférences Piwam".




&lt;hr /&gt;


## Installer Piwam chez 1&1 ##
Pour installer Piwam chez l'hébergeur 1&1, il y a quelques petites modifications à effectuer. Ouvrez le fichier `/web/.htaccess` et décommentez les lignes comme suit :
```
Options +FollowSymLinks +ExecCGI

<IfModule mod_rewrite.c>
  RewriteEngine On

  # uncomment the following line, if you are having trouble
  # getting no_script_name to work
  RewriteBase /

  # we skip all files with .something
  RewriteCond %{REQUEST_URI} \..+$
  RewriteCond %{REQUEST_URI} !\.html$
  RewriteRule .* - [L]

  # we check if the .html version is here (caching)
  RewriteRule ^$ index.html [QSA]
  RewriteRule ^([^.]+)$ $1.html [QSA]
  RewriteCond %{REQUEST_FILENAME} !-f

  # no, so we redirect to our front web controller
  RewriteRule ^(.*)$ index.php [QSA,L]
</IfModule>
```

Puis ouvrez le fichier `/apps/front/config/settings.yml`. Modifiez la ligne 30 de cette manière.

Avant :
```
    no_script_name:         off
```

Après :
```
    no_script_name:         on
```

Videz intégralement le cache (supprimez tous les répertoires qui se trouvent dans `/cache`). Vous pouvez maintenant accéder à Piwam en accédant explicitement à "index.php". Par exemple : `http://monsite.1and1.com/piwam/index.php`.



&lt;hr /&gt;


## En cas de problème... ##

Si vous rencontrez des soucis, vous pouvez :
  1. Vérifier que vous avez correctement suivi ce `README`
  1. Vérifier que vos serveurs Apache/MySQL fonctionnent normalement
  1. Lancer `/web/check_configuration.php`
  1. Vous abonner et écrire à http://groups.google.com/group/piwam
  1. Rapporter un bug sur http://code.google.com/p/piwam/issues/entry





&lt;hr /&gt;


## À voir aussi ##

  * Comment déployer une application Symfony :
> > http://www.symfony-project.org/jobeet/1_2/Propel/en/23
  * Commencer avec Symfony (configuration de VirtualHost) :
> > http://www.symfony-project.org/book/1_2/03-Running-Symfony