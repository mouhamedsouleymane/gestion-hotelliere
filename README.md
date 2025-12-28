<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
# Gestion Hôtelière

Un système de gestion hôtelière développé avec Laravel. Cette application couvre la gestion des chambres, des réservations, des clients et des employés, avec migrations, seeders et une interface frontale minimale.

**Statut:** Prototype / Application prête pour développement

## Fonctionnalités principales

-   Gestion des chambres (création, modification, disponibilité)
-   Gestion des réservations (création, annulation, historique)
-   Gestion des clients
-   Gestion des employés
-   Seeders pour données de démonstration
-   Tests unitaires et fonctionnels basiques

## Structure du projet (raccourci)

-   Code applicatif: [app/](app/)
-   Routes: [routes/web.php](routes/web.php)
-   Vues Blade: [resources/views/](resources/views/)
-   Migrations: [database/migrations/](database/migrations/)
-   Seeders: [database/seeders/](database/seeders/)
-   Tests: [tests/](tests/)

## Prérequis

-   PHP 8.1 ou supérieur
-   Composer
-   Node.js (version LTS recommandée) et npm/yarn
-   Une base de données MySQL, MariaDB, PostgreSQL ou SQLite

Remarque: le projet suit la structure d'une application Laravel standard.

## Installation locale

1. Clonez le dépôt:

```
git clone <votre-repo-url> gestion-hotelliere
cd gestion-hotelliere
```

2. Installez les dépendances PHP:

```
composer install
```

3. Installez les dépendances Node et compilez les assets (dev):

```
npm install
npm run dev
```

4. Copier le fichier d'environnement et générer la clé d'application:

```
cp .env.example .env
php artisan key:generate
```

5. Configurez la connexion base de données dans le fichier `.env` (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).

6. Exécutez les migrations et seeders:

```
php artisan migrate --seed
```

7. (Optionnel) Lier le dossier de stockage public:

```
php artisan storage:link
```

## Commandes utiles

-   Lancer le serveur de développement:

```
php artisan serve
```

-   Exécuter les tests:

```
php artisan test
```

-   Réexécuter les migrations proprement (attention: supprime les données):

```
php artisan migrate:fresh --seed
```

-   Exécuter les seeders individuellement, par exemple:

```
php artisan db:seed --class=RoomSeeder
```

## Base de données et seeders

Le dossier [database/migrations/](database/migrations/) contient les migrations pour `rooms`, `reservations`, `clients`, `employees`, etc. Les seeders se trouvent dans [database/seeders/](database/seeders/) et permettent de remplir la base pour le développement.

## Tests

Les tests sont placés dans le dossier [tests/](tests/). Pour lancer tous les tests:

```
php artisan test
```

Pour exécuter une suite PHPUnit directement:

```
vendor/bin/phpunit
```

## Développement et bonnes pratiques

-   Réutiliser une instance unique de `CosmosClient` ou du client de BD si vous utilisez des connexions externes.
-   Gérer les erreurs 429 / quota en ajoutant une logique de retry si vous appelez des services externes.
-   Préférer les requêtes paginées pour éviter les gros chargements en mémoire.

## Déploiement

-   Configurer correctement les variables d'environnement sur le serveur (productions keys, DB, mail, queue).
-   Lancer les migrations et seeders en environnement contrôlé.
-   Configurer un gestionnaire de queue (Supervisor, systemd) si vous utilisez des jobs en arrière-plan.
-   Configurer les tâches planifiées (`php artisan schedule:run`) via cron.

## Sécurité

-   Ne pas committer de secrets dans le dépôt; utilisez des variables d'environnement.
-   Assurez-vous que `APP_KEY` soit défini.

## Contribution

Les contributions sont bienvenues. Avant d'ouvrir une pull request:

1. Créez une branche décrivant la modification (`feature/ma-feature` ou `fix/bug-desc`).
2. Assurez-vous que les tests passent localement.
3. Ouvrez une PR avec une description claire des changements.

## Ressources et fichiers importants

-   Routes principales: [routes/web.php](routes/web.php)
-   Modèles: [app/Models/](app/Models/)
-   Contrôleurs: [app/Http/Controllers/](app/Http/Controllers/)
-   Vues: [resources/views/](resources/views/)

## Licence

Ce dépôt n'inclut pas d'en-tête de licence explicite. Ajoutez un fichier `LICENSE` si vous souhaitez en définir une.

## Contact

Pour toute question, ouvrez une issue sur le dépôt ou contactez le mainteneur.

---

Fichier mis à jour: [README.md](README.md#L1)

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Redberry](https://redberry.international/laravel-development)**
-   **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
