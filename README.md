  # ConnectAndVisualizeSecurity
 
## Les membres du projet (groupe 201):
- Lin Xingtong 
- Zhang Anxian  <br>

# Quels sont les différents services que nous avons mis en place ?
- "/": la page de connexion <br>
- "user/register": page d'inscription <br>
- "user/contact": page de contact de l'utilisateur connecté <br>
- "user/contact/removecontact/{contactId}": suppression d'un contact <br>
- "user/contact/addcontact": page d'ajout de contacts <br>
- "user/mailer": page de qui permet d'envoyer un mail aux développeurs <br>
- "user/logout": deconnexion de l'utilisateur <br>

# Quels sont les rôles qui sont attribués aux utilisateurs ?
Nous avons pour le moment que 2 rôles, ROLE_USER et ROLE_ADMIN.
Le rôle ROLE_USER est attribué à tout le monde, contrairement au rôle ROLE_ADMIN qui n'est qu'attribué aux développeurs de l'application, c'est à dire Zhang Anxian et Lin Xingtong.

# Les bibliothèques Symfony qui ont été utilisé
- Security [(dans un autre répertoire)](https://github.com/AnxianZhang/ConnectAndVisualizeSecurity)<br>
- Form <br>
- Mailer <br>
- Validator (Constraints) <br>
- Doctrine (ORM) <br>
- PasswordHasher <br>
- OptionResolver <br>
- Routing <br>
- User <br>
- HttpFoundation <br>
- Authentificator <br>
- CSRF Token <br>


# Mise en contexte:
  Dans ce projet, nous devons utiliser un framework: [Symfony](https://symfony.com/). <br>
  Pour nous mettre au défi, nous sommes contraints d'utiliser toutes les fonctionnalités proposées par celui-ci.
  
# Installation:
  ### 1. Cloner le répertoire
  ### 2. Installer les dépendances avec: <ins>composer install</ins>
  ### 3. Configuration des variables  d'enronement <ins>.env</ins> si besoin
  ### 4. Créer une BDD avec pour <ins>nom bdcontact</ins>
 
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
