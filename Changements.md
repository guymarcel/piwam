# Liste des changements #

Au fil des versions, Piwam évolue...

  * **version 1.2** (_en développement_)
    * Des droits sont requis pour modifier le statut ou l'exemption de cotisation d'un membre
    * La page de détails d'un membre affiche le nombre de jours avant l'expiration de la cotisation
    * Des filtres permettent de sélectionner les membres :
      * À jour de cotisation
      * Non à jour de leur cotisation
      * Dont la cotisation expire d'ici un mois
    * Lors de la récupération d'un mot de passe perdu, l'identifiant est également rappelé par email
    * Lors de l'édition d'une cotisation d'un membre qui n'existe plus, la liste de sélection du membre n'est plus affichée
    * Le champ "date d'inscription" des fiches membres permet de remonter jusqu'à 1900
    * **Possibilité de rajouter ses propres champs personnalisés aux fiches membres**
      * Listes de choix
      * Cases à cocher
      * Champs textuels classique (courts ou longs)
      * Dates
    * Le menu est généré en fonction des droits de l'utilisateur
    * Documentation README-PLUGIN pour déployer le plugin pwCorePlugin dans une autre application symfony
    * Alignement des nombres à droite dans les différents tableaux
    * Possibilité de définir des périodes de cotisation
    * Enregistrement des emails envoyés, avec la possibilité de les consulter ultérieurement
    * Gestion d'une comptabilité


  * **version 1.1.2 - XMas edition** (20 décembre 2009)
    * correction de quelques fautes de frappe
    * correction de l'export des dépenses et recettes
    * repackagé avec la dernière version de [symfony](http://www.symfony-project.org)

  * **version 1.1.2** (25 novembre 2009)
    * trombinoscope
    * mode multi-associations paramétrable
    * possibilité de retrouver un mot de passe perdu
    * message d'erreur explicite en cas d'erreur d'identification
    * le nom d'utilisateur n'est pas sensible à la casse
    * possibilité d'effectuer des demandes d'adhésion
    * formatage des numéros de téléphone
    * les membres sans droit peuvent voir et éditer leurs propres informations
    * correction des liens vers les adresses emails dans les profils utilisateurs
    * le lien pour enregistrer une nouvelle association est masqué si le mode multi-associations est désactivé
    * message d'erreur lorsqu'on tente d'utiliser un login déjà pris
    * correction d'un bug lors de la récupération de paramètres en mode multi-associations
    * correction d'un bug lors du calcul du nombre de membres ayant un certain statut
    * début de la documentation développeur
    * lien vers les activités et comptes mentionnés dans le bilan
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

  * **Version 1.1.0 beta2** (14 août 2009)
    * Interface d'installation en ligne
    * Correction de nombreux bugs
    * Amélioration du système de suppression de données
    * Pagination lors de l'affichage des listes de recettes et dépenses
    * Mise à jour de la documentation d'installation
    * Système de gestion des droits (ACL)
    * Gestion de dettes/créances (en tant que recette non perçue ou dépense non payée)
    * Améloriation de l'interface (onglets pour le profil d'un membre)
    * Interface de configuration

  * **Version 1.1.0 beta** (10 mai 2009)
    * Bugs critiques corrigés lors de la création de nouveaux comptes associatifs
    * Bugs d'encodage corrigés
    * Formats de date français dans les formulaires
    * Icône "calendrier" affichée même pour les utilisateurs n'utilisant pas de Virtual Host
    * Export des _recettes_ et des _dépenses_ au format _CSV_
    * Les cotisations sont prises en compte dans l'écran _bilan_
    * README et documentation mis à jour

  * **Version 1.1.0 alpha3.2** (8 mai 2009)
    * Correction d'un bug critique introduit dans la version 3.1, empêchant tout enregistrement d'une nouvelle association

  * **Version 1.1.0 alpha3.1** (7 mai 2009)
    * Nouveau bug fixé avec l'information "mis a jour par" dans le formulaire d'enregistrement d'un nouveau membre
    * Bug fixé avec l'inclusion d'une bibliotheque JavaScript mal orthographiée
    * <b>Note :</b> Je publie souvent les mises a jour des versions alpha en version packagée pour faciliter le travail aux personnes préférant cette solution a celle des dépot SVN

  * **Version 1.1.0 alpha3** (6 mai 2009)
    * Bugs fixés avec l'information "mis a jour par" au sein des formulaires
    * Pages d'erreur personnalisées
    * Le pseudo et le mot de passe ne sont plus obligatoires lors de l'enregistrement  d'un nouvel utilisateur
    * Début de documentation utilisateur (repertoire `/doc/html`)
    * Bugs majeurs fixés dans la gestion de plusieurs associations


  * **Version 1.1.0 alpha2** (3 mai 2009) :
    * Système d'envoi de mails amélioré
    * Bugs fixés pour la gestion multi-associations
    * Système de bulles d'aides pour certains formulaires
    * Script de création de tables SQL présent dans le repertoire /doc
    * Documentation d'installation _technique_ (en anglais) dans le repertoire /doc