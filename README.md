# Minichat-php

Minichat en php (Actualisation avec jquery, intégration de smileys)

Création d'un mini chat en php, avec saisie du pseudo et du message.
Les messages, une fois enregistrés dans la base de données, sont affichés sur la même page.

Mise en place de cookie pour le pseudo.

Conversion de la date du message en format français.

Rajout d'une police, d'une image de fond et d'un peu de css.

Actualisation du code automatiquement avec jquery.
Affiche automatiquement le nouveau message posté par un utlisateur dans la liste des messages affichés.
Ansi les autres utlisateurs du chat pourront voir directement les nouveaux messages sans pour autant actualiser la page.
Il faut commencer par se rendre sur google hosted jquery (hosted librairies) et implémenter le script javascript au niveau du header de son programme. 
Prendre la dernière version.
Ensuite créer son script js, juste avant la fin de la balise body avec setInterval, qui permet d'exécuter une fonction jquery toutes les xxx millisecondes.

Intégration de smilyes au chat avec str_replace. Emojis téléchargés à l'adresse https://goo.gl/RO1BNm en taille 17x17.
Possibilité de le faire en utlisant un bloc avec javascript jquery.
Ne marche pas avec htmlspecialchars ou entities pour l'affichage des smileys.

Sytèmes de grades pour les utlisateurs basés sur le pseudo. Un grade est attribué à chaque utilisateur en fonction du nombre de messages postés sur le chat.
Membre junior pour moins de 10 messages, habitué pour un nombre compris entre 10 et 49, et expert pour 50 et plus.
Système qui a bout but de montrer le fonctionnement de l'attirbution de grades et qui prend tout son sens dans un vrai espace avec contrôle des informations de connection(pesudo, mdp...).

