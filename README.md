# Tp Noté Symfony Yaëlle Jehu

## Introduction

Ce projet Symfony est conçu pour gérer les utilisateurs et les réservations avec une interface moderne stylisée avec Tailwind CSS.

D'accord, voici la version mise à jour :

markdown
# Tp Noté Symfony

## Introduction

Ce projet Symfony est conçu pour gérer les utilisateurs et les réservations avec une interface moderne stylisée avec Tailwind CSS.


## Étapes de Configuration

### 1. Créer le Projet Symfony

composer create-project symfony/skeleton tp_systeme_reservation
cd tp_systeme_reservation
composer require orm maker security
Dans le fichier .env :

env
DATABASE_URL="mysql://root:@127.0.0.1:3306/tp_note?serverVersion=8.0"


2. Créer la Base de Données
bash
php bin/console doctrine:database:create


4. Migrer les Informations des Entités dans la Base de Donées
bash
php bin/console make:migration
php bin/console doctrine:migrations:migrate


5. Ajouter le CDN de Tailwind CSS
Ajouter cette ligne dans le fichier base.html.twig pour le style :
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

6. Démarrer le Serveur Symfony
symfony serve


7. Générer les Contrôleurs CRUD (Create Read Update Delete) pour Booking et User
php bin/console make:crud Booking
php bin/console make:crud User

8. Démarrer le Serveur Symfony
symfony serve


9. Tester le Projet
Accédez à l'adresse de votre serveur de développement dans votre navigateur. Vous devriez voir la page d'accueil avec des liens vers les différentes pages de gestion des utilisateurs et des réservations.

Gestion des Réservations : /app_booking_index

Gestion des Utilisateurs : /app_user_index

Créer une Nouvelle Réservation : /app_booking_new

Créer un Nouvel Utilisateur : /app_user_new


Note : J'ai passé 1h30 bloquée sur l'étape d'authentification à cause de nombreuses erreurs et des boucles infinies lors de la connexion. 
Finalement, j'ai décidé de supprimer la configuration de sécurité pour éviter ces problèmes.


