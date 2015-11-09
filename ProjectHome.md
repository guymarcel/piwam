![http://adrien.frenchcomp.net/images/piwam.png](http://adrien.frenchcomp.net/images/piwam.png)

# Piwam : Gestionnaire d'associations #

## What's Piwam ? ##

Association Manager, written in PHP with Symfony framework. But it has been developped for **French** associations only, which respect specific French _laws_. That is why this project space will be only in French.

## Que puis-je gérer avec Piwam ? ##
Piwam vous permet de gérer tout ce qu'une association loi 1901 peut être amené à gérer :
  * membres
  * cotisations
  * recettes / dépenses
  * activités

## Quels sont les avantages à utiliser Piwam ? ##

En quelques mots :
  * _gratuit_ : et donc moins cher que toutes les solutions payantes du marché
  * _libre_ : un code source ouvert, gage de qualité et vous offrant toutes les possibilités pour venir greffer vos propres fonctionnalités
  * _évolutif_ : de nombreuses mises à jour voient le jour, des nouvelles fonctionnalités...

## Dernières nouvelles... ##

Découvrez comment installer Piwam en vidéo :

| Sous UNIX | Par un client FTP |
|:----------|:------------------|
|[![](http://ts.vimeo.com.s3.amazonaws.com/275/113/27511322_100.jpg)](http://www.vimeo.com/6856043) | [![](http://ts.vimeo.com.s3.amazonaws.com/345/237/34523750_100.jpg)](http://www.vimeo.com/7784965) |

Piwam évolue au fil des versions... Voici un petit aperçu de ce qui change :

  * **version 1.1.2** (25 novembre 2009)
    * trombinoscope
    * mode multi-associations paramétrable
    * possibilité de retrouver un mot de passe perdu
    * message d'erreur explicite en cas d'erreur d'identification
    * le nom d'utilisateur n'est pas sensible à la casse
    * possibilité d'effectuer des demandes d'adhésion
    * formatage des numéros de téléphone
    * lien vers les activités et comptes mentionnés dans le bilan
    * les membres sans droit peuvent voir et éditer leurs propres informations
    * correction des liens vers les adresses emails dans les profils utilisateurs
    * le lien pour enregistrer une nouvelle association est masqué si le mode multi-associations est désactivé
    * message d'erreur lorsqu'on tente d'utiliser un login déjà pris
    * correction d'un bug lors de la récupération de paramètres en mode multi-associations
    * correction d'un bug lors du calcul du nombre de membres ayant un certain statut
    * début de la documentation développeur
    * documentations README, README-FR et UPDATE-FR à jour
    * les valeurs des préférences peuvent être supprimées
    * la valeur "0" est affichée si une somme est nulle (au lieu de rien)
    * correction de bugs lors du contrôle de la version du logiciel

  * **version 1.1.1** (8 octobre 2009)
    * fichiers UPDATE-FR, TROUBLESHOOTING-FR et README-FR mis à jour
    * La clé Google Map est définie comme préférence et non plus dans le fichier de settings
    * possibilité de lancer l'installation et les mises à jour par le menu de gauche
    * bug fixé dans l'envoi d'emails

  * **version 1.1** (1er octobre 2009)
    * messages d'erreur explicites lors de l'installation
    * Interface d'installation en ligne
    * Correction de nombreux bugs
    * Amélioration du système de suppression de données
    * Pagination lors de l'affichage des listes de recettes et dépenses
    * Mise à jour de la documentation d'installation
    * Système de gestion des droits (ACL)
    * Gestion de dettes/créances (en tant que recette non perçue ou dépense non payée)
    * Améloriation de l'interface (onglets pour le profil d'un membre)
    * Interface de configuration
[liste complète](http://code.google.com/p/piwam/wiki/Changements)

### On bosse dessus : ###
Pour que Piwam soit toujours meilleur...
  * Système de gestion de documents
  * Moteur de comptabilité avancée
  * ~~Gestion poussée des droits des utilisateurs~~ <sup>[r61]</sup>
  * ~~Export des dépenses / recettes au format _CSV_~~ <sup>[r39]</sup>
  * Bugs à corriger au sein de la bibliothèque gérant la géo-localisation