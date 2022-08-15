# TrtConseil

Note pour un deploiment en Local :

- Créer une base de donnée et nommé la : trtconseil

Soit vous le faite manuellement avec les étape a suivre ou juste en executant le fichier DB.sql qui va créer les différentes tables.

- Créer 3 Tables avec comme champs :

  - articles

    - id type:int Primary key
    - title type:text
    - lieu type:varchar(150)
    - contrat type:text
    - date type:text
    - horaires type:text
    - description type:text
    - etatArticle type:int(1)
    - postulerArticle type:int(1)
    - par type:varchar(150)

  - membres

    - id type:int Primary key
    - name type:text
    - firstname type:varchar(150)
    - email type:varchar(250)
    - password type:varchar(100)
    - EntrepriseName type:text
    - EntrepriseAdresse type:text
    - role type:varchar(20)
    - etat type:int(1)
    - cvPdf type:blob

  - postulerpar
    - id type:int Primary key
    - nom type:varchar(150)
    - prenom type:varchar(150)
    - email type:varchar(250)
    - idRef type:int(11)

Par défaut l'utilisateur de la base de donnée est 'root' et aucun password est attendu pour se connecter a la base de donnée.

Une fois cela fini vous pouvez ouvrir votre serveur local et aller à la page suivante :

    http://localhost/TRTConseil/

Ceci est la page de connection du site. pour commencer il faut créer un Consultant et il y a que l'administrateur qui a les droit.
Aller sur "Vous êtes un administrateur ?" puis les identifiants sont :

    admin <!-- pour l'identifiant -->
    admin <!-- pour le mot de passe -->

Vous pouvez ainsi rejoindre l'espace "creer une sessions consultant" et lui renseigner un nom, un prénom, une adresse mail et un mot de passe.
