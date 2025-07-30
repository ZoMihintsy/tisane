# Tisane-Lontan

Tisane-Lontan est une application web robuste, développée avec le framework PHP Laravel, conçue pour optimiser la gestion des opérations commerciales. Elle intègre des fonctionnalités complètes pour l'administration et le front-end, couvrant un large éventail de besoins allant de la gestion des stocks et des commandes à l'interaction client et à la présentation des produits. Que ce soit pour un site e-commerce ou un système de gestion de points de vente physiques, Tisane-Lontan offre une solution complète et modulable.

## Table des matières

- [Fonctionnalités](#fonctionnalités)
- [Structure du projet](#structure-du-projet)
- [Installation et Configuration](#installation-et-configuration)
- [Utilisation](#utilisation)
- [Contribution](#contribution)
- [Licence](#licence)

## Fonctionnalités

Tisane-Lontan offre les fonctionnalités clés suivantes :

**Administration/Backend :**
* **Tableau de bord :** Un aperçu centralisé et clair des métriques essentielles pour une gestion efficace.
* **Gestion des catégories :** Outils complets pour créer, modifier, organiser et supprimer les catégories de produits.
* **Gestion des clients :** Administration détaillée des informations client.
* **Gestion des commandes :** Suivi et gestion des commandes à toutes les étapes :
    * Affichage de toutes les commandes.
    * Gestion spécifique des commandes en attente.
    * Gestion des commandes finalisées.
* **Gestion des stocks :** Suivi précis et gestion des niveaux de stock de tous les produits.
* **Gestion des points de vente :** Enregistrement et gestion des différents points de vente.
* **Gestion des produits :** Ajout, modification et suppression de produits avec leurs détails associés.
* **Rapports :** Génération de rapports variés pour l'analyse des performances.

**Invité/Frontend (Interface utilisateur publique) :**
* **Blog :** Section dédiée à la publication d'articles et d'actualités.
* **Catalogue de produits :** Navigation intuitive et présentation détaillée des produits.
* **Navigation par catégories :** Filtrage des produits pour une recherche facilitée.
* **Panier d'achat :** Système de panier fluide pour la sélection des articles.
* **Promotions :** Affichage des offres spéciales et des promotions en cours.
* **Page d'accueil :** La page d'atterrissage principale de l'application.
* **Pied de page :** Informations de contact et liens utiles.
* **Fenêtres modales :** Affichage de contenu dynamique pour une meilleure interaction utilisateur.

**Utilisateur (Interface utilisateur authentifiée) :**
* **Tableau de bord personnel :** Un tableau de bord personnalisé pour chaque utilisateur connecté.
* **Gestion du profil :** Outils pour que l'utilisateur puisse gérer ses informations personnelles.
* **Historique des commandes :** Accès à l'historique complet des commandes passées.
* Accès aux fonctionnalités de blog, catégories, panier, points et produits, mais personnalisées pour l'expérience de l'utilisateur authentifié.

## Structure du projet

Voici une vue d'ensemble de l'organisation des fichiers et des répertoires de Tisane-Lontan :
Tisane-Lontan/
├── app/                      
│   ├── Console/              
│   ├── Exceptions/           
│   ├── Http/                
│   │   ├── Controllers/      # Logique des requêtes entrantes
│   │   │   ├── Auth/         
│   │   │   └── Controller.php         
│   │   │   └── TisaneController.php #controlleur de l'application
│   │   ├── Middleware/       
│   │   └── Kernel.php        
│   ├── Livewire/             
│   │   ├── Actions/          
│   │   ├── Admin/            # Composants Livewire pour l'interface admin
│   │   │   ├── Categorie.php
│   │   │   ├── Client.php
│   │   │   ├── CommandeAll.php
│   │   │   ├── CommandeOk.php
│   │   │   ├── CommandeWait.php
│   │   │   ├── Dashboard.php
│   │   │   ├── Gstock.php
│   │   │   ├── Point.php
│   │   │   ├── Produit.php
│   │   │   └── Report.php
│   │   ├── Forms/            
│   │   ├── Guest/            # Composants Livewire pour les utilisateurs non connectés
│   │   │   ├── Blog.php
│   │   │   ├── Categorie.php
│   │   │   ├── Categories.php
│   │   │   ├── Panier.php
│   │   │   ├── Point.php
│   │   │   └── Produit.php
│   │   ├── Layout/           
│   │   ├── User/             # Composants Livewire pour les utilisateurs connectés
│   │   │   ├── Blog.php
│   │   │   ├── Categorie.php
│   │   │   ├── Categories.php
│   │   │   ├── Commande.php
│   │   │   ├── Dashboard.php
│   │   │   ├── Panier.php
│   │   │   ├── Point.php
│   │   │   ├── Produit.php
│   │   │   └── Welcome/
│   │   │       └── Navigation.php
│   ├── Models/               # Modèles Eloquent pour l'interaction avec la base de données
│   │   ├── Blog.php
│   │   ├── Categorie.php
│   │   ├── Commande.php
│   │   ├── Point.php
│   │   ├── Produit.php
│   │   └── User.php
│   └── Providers/            
├── bootstrap/                 
│   └── app.php
├── config/                   
├── database/                 
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── lang/                     # Fichiers de localisation (langues)
├──             # Dépendances Node.js (peuvent exister même si non utilisées pour la compilation finale)
├── public/                   # Le "point d'entrée" de l'application, accessible publiquement
│   ├── build/                # Fichiers compilés (souvent par Vite/Webpack)
│   ├── img/                  # Répertoire pour les images
│   ├── logo/                 # Répertoire pour le logo du projet (ex: icon.png)
│   │   └── 
etc...

## Installation et Configuration

Pour démarrer avec Tisane-Lontan, suivez ces étapes détaillées pour configurer l'environnement de développement et lancer l'application :

1.  **Cloner le dépôt :**
    Ouvrez votre terminal et exécutez la commande suivante pour cloner le projet :
    ```bash
    git clone <url_du_depot>
    cd Tisane-Lontan
    ```

2.  **Installer les dépendances PHP :**
    Utilisez Composer pour installer toutes les dépendances PHP requises par le projet :
    ```bash
    composer install
    ```

3.  **Copier le fichier d'environnement :**
    Le fichier `.env.example` contient un modèle pour la configuration de votre environnement. Copiez-le pour créer votre fichier `.env` local :
    ```bash
    cp .env.example .env
    ```

4.  **Générer une clé d'application :**
    Laravel utilise une clé d'application unique pour la sécurité (chiffrement des sessions, etc.). Générez-la avec la commande Artisan :
    ```bash
    php artisan key:generate
    ```

5.  **Configurer votre base de données :**
    Ouvrez le fichier `.env` avec votre éditeur de texte préféré et mettez à jour les détails de connexion à votre base de données. Assurez-vous que le `DB_CONNECTION` correspond à votre SGBD (ex: `mysql`, `pgsql`, `sqlite`) et renseignez les informations d'hôte, de port, de nom de base de données, d'utilisateur et de mot de passe.
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=votre_nom_de_base_de_donnees
    DB_USERNAME=votre_nom_utilisateur
    DB_PASSWORD=votre_mot_de_passe
    ```
    Assurez-vous que la base de données spécifiée (`votre_nom_de_base_de_donnees`) existe sur votre serveur de base de données.

6.  **Exécuter les migrations de la base de données :**
    Cette commande va créer toutes les tables nécessaires dans votre base de données, basées sur les fichiers de migration définis dans `database/migrations/` :
    ```bash
    php artisan migrate
    ```

7.  **Lier le stockage :**
    Laravel nécessite un lien symbolique pour rendre les fichiers stockés publiquement accessibles. Cette commande crée un lien de `public/storage` vers `storage/app/public` :
    ```bash
    php artisan storage:link
    ```

8.  **Vérification des assets frontend :**
    Les styles CSS (`app-Ca8PHox1.css`) et les scripts JavaScript (`app-DNxiirP_js`) sont déjà présents et pré-compilés dans le répertoire `public/style/assets/`. Il n'est donc pas nécessaire d'exécuter des commandes `npm` pour la compilation des assets. L'application utilisera directement ces fichiers pour l'affichage.

## Utilisation

Pour lancer l'application Tisane-Lontan, utilisez le serveur de développement intégré de Laravel :

```bash
php artisan serve