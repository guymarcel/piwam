# Introduction #

Où en est le projet Piwam, et quelles sont les futures fonctionnalités et efforts de développement ? Cette _roadmap_ définit les axes généraux et les objectifs pour les futures versions.


---

# Axe général #

Piwam est destiné à 95% aux petites associations. Des associations qui n'ont pas besoin d'une comptabilité trop avancée et complexe. Des associations à la recherche d'un outil facile à utiliser, et capable de répondre aux problèmatiques courantes :

  * Gérer les membres et leurs cotisations
  * Tenir à jour une trésorerie et pouvoir lire un bilan

L'architecture de Piwam est cependant extrêmement modulaire. Derrière cette structure à la base du projet, il est possible de venir greffer des modules permettant de gérer des problèmatiques très spécifiques ou très complexes. La philosophie de développement, ou plutôt de packaging, à conserver constamment à l'esprit, sera la suivante :

  * Les nouvelles fonctionnalités "génériques" pourront être intégrées en standard dans Piwam.
  * Les fonctionnalités spécifiques, ou complexifiant de manière non négligeable l'utilisation de Piwam, seront distribuées sous forme de modules. Ces modules seront intégrés dans le projet mais désactivés par défaut.


---

# Évolutions #


## Version 1.2 - Été 2010 ##
| **Résumé**     | **Description** |  **État** |
|:---------------|:----------------|:----------|
| symfony 1.4    | Portage du projet sous symfony 1.3 (sortie prévue fin novembre | fini      |
| Doctrine       | Passage du projet sous Doctrine (?) | fini      |
| Comptabilité   | Fin de la réflexion auteur du [moteur de comptabilité](http://code.google.com/p/piwam/wiki/ReflexionCompta). Nouvelles fonctionnalités (génération annuelle, export PDF) | en cours  |
| Documentation développeur | Génération d'une documentation visant à aider les développeurs à contribuer à Piwam | en cours  |
| Plugin         | Distribution de Piwam sous forme de plugin symfony | fini      |
| Standalone     | Packaging et distribution de Piwam sous forme de version autonome, distribuable par exemple sur clé USB | à faire   |


## Version 1.1.2 - Novembre 2009 ##
| **Résumé**      | **Description** |  **État** |
|:----------------|:----------------|:----------|
| Trombinoscope   | Possibilité d'associer une photo aux membres pour générer un trombinoscope | base finie |
| Mode mono association | Possibilité de paramétrer le mode "multi association", par défaut Piwam sera configuré pour ne gérer qu'une unique association | fini      |
| Adhésions       | Possibilité pour les non-membres d'effectuer des demandes d'adhésion, validée ensuite par un administrateur | OK pour le mode mono-association |
| Tests           | Écriture de nouveaux tests pour faciliter le contrôle du portage vers Doctrine dans la version 1.2 | en cours  |
| Vidéo d'installation FTP | Réalisation d'un nouveau screencast expliquant l'installation de Piwam via FTP | À faire   |