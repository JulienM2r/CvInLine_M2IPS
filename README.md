﻿# CvInLine_M2IPS
Projet de Site WEB Responsive permettant la création et l'hébergement de CV orienté Métiers de l'informatique.
Développé en PHP à l'aide des Framework Symfony4, PhpMyAdmin, Boostrap 4 et WAMP.
La gestion des utilisateurs se fait via un Token écrit en base et vérifié à chaque requête http. les routes entre User et Admin se font sur une double vérification entre le User.Username et le CV.getUser().Username ainsi que sur le User.id et le CV.getUser().id.
Si le User est sur la page de son propre CV alors il voit les options de création et de modification, sinon il ne peut que consulter la page. 
