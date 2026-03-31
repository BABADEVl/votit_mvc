# Projet php VotIT

## Installation
* Faire un fork de ce dépôt
* Cloner VOTRE dépôt
* Ouvrir le dossier dans VSCode
* Dans le terminal faire un:
    * `composer install`
* Créer une base de donnée et importer le fichier sql
* Dupliquer le fichier .env et nommer .env.local et modifier la configuration
* Dans le terminal, se place dans le dossier /public et lancer un 
    * `php -S localhost:8080`

## A faire
* Créer une page about
    * Modifier PageController
    * Créer le template dans le dossier /templates/page
    * Modifier le menu dans header.php (en haut)
* Modifier la page d'accueil pour afficher dynamiquement les trois derniers sondages
    * Modifier PageController méthode home
    * Modifier templates/poll/poll_part.php pour afficher les données
    * Modifier templates/home.php pour gérer la boucle foreach
* Gérer la page Liste des sondages
    * Modifier PollController méthode list
    * Modifier templates/poll/list.php pour gérer la boucle foreach
* Gérer le vote
    * Modifier PollController pour ajouter une méthode vote
    * La méthode doit rediriger vers login si l'utilisateur n'est pas connecté
    * Appeler la méthode removeVotesForUserAndPoll
    * La méthode doit récupérer les données de formulaire et ajouter le vote (méthode addVote déjà présente dans UserPollItemRepository)
* Gérer le formulaire de création de sondage
    * Pour simplifier, les options du sondage seront ajoutés dans un textarea (un par ligne)
    * Gérer la partie controller et repository
* Créer une page Catégories
    * Cette page affiche la liste des catégories
    * Quand on clique sur une catégorie cela affiche une page qui affiche le nom de la catégorie et les sondages de cette catégorie

## Bonus
* Ajouter un système de commentaire sur les sondages
* Ajouter un champ de recherche de sondages
* Permettre à un utilisateur de modifier SES sondages
