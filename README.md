<table align="center">
    <tr>
        <td valign="center">
            <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
        </td>
        <td valign="center">
            <img src="https://learnence.com/storage/logos/logo-learnence.jpg" width="100" alt="Learnence Logo">
        </td>
    </tr>
</table>

# Learnence Test

Bonjour, voici le test pour la candidature de "Développeur FullStack" chez Learnence SRL.

Quelques exercices vous seront demandés afin de tester vos compétences. Ceux-ci seront testées via une application de "gestion de sondages" créée au préalable.

## Prérequis

Avant de commencer, voici quelques informations pour l'installation de l'application.

- git clone git@github.com:michael-lurquin/LearnenceTest.git
- composer install
- php artisan migrate:fresh --seed
- npm install
- npm run build
- php artisan serve (pour lancer le serveur PHP, ou bien vous pouvez le faire fonctionner à le serveur web de votre choix)

## Avant utilisation

Après avoir effectué ces opérations, 2 utilisateurs ont été générés ainsi que des fausses données pour peupler la base de donnée. Voici les 2 utilisateurs créés :

| Email                  | Password | Role  |
|------------------------|----------|-------|
| john.doe@learnence.com | password | Admin |
| jane.doe@learnence.com | password | User  |

Vous pouvez vous connecter avec ceux-ci depuis la page "/login".

L'application se compose de 2 onglets principalements, les voicis :

- **Polls** : Gestion des sondages uniquement disponible pour l'admin
- **Votes** : Liste des sondages et vote possible depuis cet onglet.

## Exercices

- Dans l'onglet "Votes", trop de requêtes sont exécutées. Pouvez-vous corriger ce problème afin d'améliorer la plateforme. Vous pouvez vous aider du package "barryvdh/laravel-debugbar" pour débugger les requêtes qui sont exécutées.

- Créez de manière automatique plusieurs utilisateurs (en utilisant les seeder de Laravel), et ce, afin de pouvoir aussi les utiliser pour générer des votes de différents utilisateurs.

- Affichez le nombre de votant sous forme de pourcentage dans la page du sondage afin d'indiquer à l'utilisateur qui vient de voter, les résultats en cours du sondage. **Attention**, l'utilisateur ne peut pas voir les résultat avant d'avoir voté.

- Créez un sondage avec la possbilité de pouvoir rajouter une image, cette image devra être visible dans le sondage (donc dans la vue de l'utilisateur). **Attention**, cette image doit être du format "JPG", "JPEG" ou "PNG" et ne doit pas dépasser les "5 Mo". Afficher l'erreur si l'utilisateur tente de passer au-delà de ces règles de validation. **Bonus**, si vous affichez l'aperçu de l'image avant de l'uploader.

- Adaptez le format des dates dans les onglets "Polls" et "Votes", le format de dates devrait être présentés sous cette forme "Wednesday 19th Oct 2022 AM 10:29".

- Ajoutez une colonne dans la table "polls" (en utilisant les migrations de Laravel) afin d'indiquer si le vote est clos ou non, et afficher cette information dans la liste des sondages. **Attention**, ne pas afficher de sondages clos aux utilisateurs.

- Après avoir voté à un sondage, si l'utilisateur re vote, son vote doit s'annuler. **Attention**, l'utilisateur ne peut voter qu'à une seule réponse maximum au sondage.

- Corrigez le fait de pouvoir créer des votes sans propositions de réponses, il faudrait vérifier qu'il y a bien 2 réponses au minimum à chaque sondage créé et modifié.

## Questions

Si vous avez des questions, vous pouvez me les envoyer à l'adresse mail : **michael.l@learnence.com**