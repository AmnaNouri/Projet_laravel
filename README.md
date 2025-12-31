# Todo List Laravel - Mini Projet API

## 1️⃣ Description du projet

Ce projet est une **application Todo List** réalisée avec **Laravel** pour le back-end (API REST) et un **front-end HTML/JS/CSS**.  
L'objectif est de permettre à un utilisateur de gérer ses tâches avec les fonctionnalités suivantes :  

- Ajouter une tâche  
- Modifier le titre d'une tâche  
- Marquer une tâche comme complétée ou non complétée  
- Supprimer une tâche  
- Filtrer les tâches : toutes / complétées / non complétées  

Le projet est conçu pour être **léger**, **responsive**, et **facile à utiliser** pour un mini-projet ou examen.

---

## 2️⃣ Fonctionnement général

1. L’utilisateur ouvre le front-end dans son navigateur (`index.html`).  
2. Les tâches sont récupérées depuis l’**API Laravel** via fetch AJAX.  
3. Les actions CRUD (Create, Read, Update, Delete) sont effectuées via les endpoints API :  
   - Ajouter une tâche  
   - Modifier une tâche  
   - Supprimer une tâche  
   - Changer le statut complété/non complété  
4. Les filtres permettent d’afficher uniquement certaines tâches selon leur statut.

---

## 3️⃣ Installation

1. Cloner le projet :  
```bash

Installer les dépendances Laravel :

composer install


Créer le fichier .env à partir de .env.example :

cp .env.example .env


Générer la clé de l’application :

php artisan key:generate


(Optionnel) Si vous utilisez une base de données : configurer .env avec vos infos DB et lancer :

php artisan migrate


Lancer le serveur Laravel :

php artisan serve


Ouvrir le front-end dans le navigateur :

http://127.0.0.1:8000/index.html

4️⃣ Commandes utiles

php artisan serve : lance le serveur local Laravel

php artisan route:list : liste toutes les routes de l’API

5️⃣ Documentation API
Base URL
http://127.0.0.1:8000/api/todos
git clone <URL_DE_VOTRE_PROJET>
cd todo-api
