

#*********************************#
#*        Installation ws        *#
#*********************************#

 - Recup�ration des sources en ligne
         * Client SVN : TortoiseSVN 1.9.4 dans mon cas
         * authentification (https://github.com/hervemveng/test_es.git) si c'est par SVN ou alors directement sur https://github.com/hervemveng/test_es

 - Pre-requis :
     * PHP >= 5.5.12
     * Apache >= 2.4.9
     * phpmyadmin

 - Installation (les suivre en ordre):
    * creer manuellement une base de donn�e : ws_es_test
    * d�finir les identidiants de connexion � la base de donn�eset son nom dans : ws/app/config/parameters.yml
    * vider le cache : php bin/console cache:clear
    * installer la structure de la base de donn�es : php bin/console doctrine:schema:update et ensuite php bin/console doctrine:schema:update --force
    * ouvrez l'application selon l'url suivante : http://votre_adresse/chemin_vers_application/web/app_dev.php ou http://votre_adresse/chemin_vers_application/web/

 - Utilisation de l'api lors de l'enregistrement
    * ne pas oublier de r�ferencier l'url de l'api distante dans la cr�ation de l'app

#****************************************#
#*        Installation newsletter       *#
#****************************************#

 ouvrir juste le fichier newsletter.html se trouvant dans /newsletter



