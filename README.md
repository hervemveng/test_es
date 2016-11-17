

#*********************************#
#*        Installation ws        *#
#*********************************#

 - Recupération des sources en ligne
         * Client SVN : TortoiseSVN 1.9.4 dans mon cas
         * authentification (https://github.com/hervemveng/test_es.git) si c'est par SVN ou alors directement sur https://github.com/hervemveng/test_es

 - Pre-requis :
     * PHP >= 5.5.12
     * Apache >= 2.4.9
     * phpmyadmin
     * si sous windows il faut ajouter une variable d'environnement de PHP dans les paramètres systèmes de votre PC

 - Installation (les suivre en ordre):
    * creer manuellement une base de donnée : ws_es_test
    * définir les identidiants de connexion à la base de donnéeset son nom dans : ws/app/config/parameters.yml
    * vider le cache : php bin/console cache:clear
    * installer la structure de la base de données : php bin/console doctrine:schema:update et ensuite php bin/console doctrine:schema:update --force
    * ouvrez l'application selon l'url suivante : http://votre_adresse/chemin_vers_application/web/app_dev.php ou http://votre_adresse/chemin_vers_application/web/

 - Utilisation de l'api lors de l'enregistrement
    * ne pas oublier de réferencier l'url de l'api distante dans la création de l'app

#****************************************#
#*        Installation newsletter       *#
#****************************************#

 ouvrir juste le fichier newsletter.html se trouvant dans /newsletter

 Mettre des liens absolu sur les images car je les ai mis en relatif puisque je l'ai avait juste en local.



