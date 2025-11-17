# Membres du groupe:

## LIN Xingtong

## ZHANG Anxian

# Mise en contexte:

Dans ce projet, nous devons utiliser un framework: [Symfony](https://symfony.com/). <br>
Pour nous mettre au défi, nous sommes contraints d'utiliser toutes les fonctionnalités proposées par celui-ci.

# Installation:

### 1. Cloner le répertoire

### 2. Installer les dépendances avec: <ins>composer install</ins>

### 3. Configuration des variables  d'enronnement <ins>.env</ins>, notamment ceux conernant les accès à la base de données

### 5. Créer les tables avec:

```bash
php bin/console doctrine:schema:update --force
```

### 6. Lancer le server avec

```bash
symfony serve
```

Le serveur est alors censé tourner en localement sur le port 8000. [http://127.0.0.1:8000/user/ident](http://127.0.0.1:8000/user/ident) étant la page par défaut.

# Si ça ne marche toujours pas, exécuter ces commandes:

composer require symfony/apache-pack<br>
composer require symfony/orm-pack<br>
composer require --dev symfony/maker-bundle<br>
composer require symfony/form<br>
composer require symfony/security-bundle<br>

# Outils Symfony utiliser:

https://twig.symfony.com/<br>
https://symfony.com/doc/current/forms.html<br>
https://symfony.com/doc/current/doctrine.html<br>
https://symfony.com/doc/current/validation.html

# Ceux que nous prévoyons d'utiliser:

https://symfony.com/doc/6.3/mailer.html<br>
https://symfony.com/doc/current/security.html<br>
https://symfony.com/doc/current/testing.html
