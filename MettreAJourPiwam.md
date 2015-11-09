# Depuis le dépôt SVN #

  1. lancez la commande `svn up`
  1. Si un conflit  est  détecté  sur  `/config/databases.yml`, conservez votre fichier
  1. Si un conflit est détecté sur `/config/projectConfiguration.yml` remplacez votre fichier par le nouveau
  1. Cliquez sur `mise à jour` dans le menu.

## Passage de la 1.1.1 à la 1.1.2 ##

  1. Symfony est directement intégré dans Piwam. Vous pouvez donc supprimer éventuellement votre ancienne installation de symfony

# Depuis une archive #

  1. Sauvegardez votre fichier `/config/databases/yml`. Si vous avez modifié le fichier `/apps/front/config/app.yml`, sauvegardez le également
  1. Sauvegardez également le contenu du dossier `/web/uploads/`
  1. Décompressez la nouvelle tarball
  1. Remplacez le répertoire de la version actuellement utilisée par celui de la nouvelle version (pensez à renommer le nom du répertoire principal si besoin)
  1. Remettez en place votre fichier `/config/databases.yml` et le cas échéant, le fichier `app.yml`
  1. Replacez le contenu sauvegardé dans `/web/uploads/`
  1. Rendez inscriptibles les répertoires  `cache` et `log`,  ainsi que les répertoires dans '/web/uploads/' (sous un serveur Windows, vous pouvez oublier cette étape !)
  1. Cliquez sur `mise à jour` dans le menu.
  1. **Attention** : Un bug étrange peut subvenir. Aucun message d'erreur apparaît mais la mise à jour n'est pas totalement finie. Cliquez à nouveau sur `mise à jour` pour vérifier que tout s'est correctement déroulé.