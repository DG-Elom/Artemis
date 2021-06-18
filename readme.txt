@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@	  ARTEMIS	  @@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@

Pour bien mettre en production ce dossier de site web,
il faut:
1 => Installer soit WAMPP, XAMPP ou MAMPP

* WAMPP
 -> Copier ce dossier dans le répertoire C:\\wamp64\www\

* MAMPP ou XAMPP
 -> Copier ce dossier dans le répertoire .../htdocs/

2 => Créer une base de donnée nommée "bdd"
  -> Importer la table "user" à partir du fichier 'user.sql' qui se trouve dans ce dossier
  NB: Se rendre dans le fichier 'config.php' et s'assurer que le nom d'utilisitateur et le
  		mot de passe correspondent à ceux de la base de donnée

3 => Aller dans un navigateur et taper: 'localhost/Artemis/index.php' pour accéder à la 
 	page d'accueil du site.

4 => On va voir la suite plutard (*_*)
