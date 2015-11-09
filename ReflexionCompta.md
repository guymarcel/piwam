# Introduction #

La comptabilité est certainement l'aspect de gestion le plus technique au sein des associations. Pour autant, toute association se doit de tenir une comptabilité minimum et lorsque cette dernière reçoit des subventions publiques, il peut lui être demandé de fournir un bilan comptable respectant le [plan comptable associatif](http://www.associanet.com/docs/plan-compt.html).

Piwam 1.1 est livré avec des outils comptables minimaux permettant d'ores et déjà de tenir une comptabilité simple. Cette page a pour objectif de poser les besoins et les idées discutés pour améliorer les outils comptables livrés dans Piwam.


---


# Demandes à considérer #

  * L'ajout d'un champ "solde de départ" à un compte. En effet, l'association qui utilise Piwam peut avoir un compte créditeur ou débiteur au début d'un exercice et pouvoir utiliser une valeur de départ != de 0. J'ai pensé au départ utiliser une dépense ou une recette mais du coup cela gène la sortie d'un bilan.

  * La capacité à sortir un bilan qui prenne en compte ou non les valeurs de dépenses créditées ou débitées (payées ou reçues) ce qui permettrait d'avoir un bilan virtuel et un bilan réel de l'état des comptes (genre case à cocher pour prendre en compte les non-reçues, non-payée).

  * La gestion d'écritures comptables récurrentes (mensuelles, notamment) : proposition énoncé dans le cadre des cotisations.

  * Intégration et contraintes du plan comptable association

  * Comptabilité journalisée à double champs

  * Génération de tous les bilans selon le détail de la comptabilité : compte de résultat (produits et charges) + bilan (actif et passif)

  * Sélection de l'année sur laquelle afficher le bilan

  * Export du bilan au format PDF

  * Import/Export des données comptables ([QIF](http://en.wikipedia.org/wiki/Quicken_Interchange_Format) ? [OFE](http://en.wikipedia.org/wiki/Open_Financial_Exchange) ?)

# Scénarios d'utilisation #

## Achat de consommables : DVD-R ##

Une association achète pour 40€ des DVD-R afin de produire des DVDs qu'elle revend. Les DVD-R sont donc des fourniture stockées dont le stock évolue au fil de l'exercice ou des années. Le paiement se fait en liquide.

  * Actuellement :
    1. On insère une nouvelle dépense dans le compte en banque d'une valeur de 40€, on l'affecte éventuellement à l'activité "Vente de DVDs"
    1. Lorsque l'on vend les DVDs, on insère une recette dans le compte banque ou caisse selon le type de paiement lié à l'activité "Vente de DVDs"
  * Proposition :
    1. Nouvelle écriture pour l'achat des DVDs : crédit de 40€ du compte "Banque (512)" (oui, quand on dépense de l'argent, ça crédite) et débit de 40€ du compte "Fournitures (317)" + sauvegarde la facture des DVD-R comme pièce-justificative de l'écriture
    1. Si on veut jouer avec les stocks, on peut faire varier le compte de "Fourniture (317)" et de "Produits finis (355)", mais ça dépend du détail de la comptabilité que l'on souhaite effectuer
    1. Lors de la vente des DVDs, nouvelle écriture : on crédite le compte "Ventes de produits finis (701)" et on débite le compte "Banque (512)" + émission de la facture (enregistrement comme pièce comptable)
    1. Lors de la génération du bilan :
      * Compte de résultat : on prend en compte les écritures du compte "Banque (512)" et on ajoute le crédit/débit au passif/actif du compte de bilan
      * Compte de bilan : on ajoute à l'actif le restant des fournitures

# Modélisation #

[Proposition de modélisation envoyée sur la liste de diffusion](http://piwam.googlegroups.com/attach/82e489d7835176d3/compta-v20091028.png?view=1&part=3) ([source](http://groups.google.com/group/piwam/attach/82e489d7835176d3/compta-v20091028.dia?part=2))