Travaux Pratiques : Création d'APIs pour un Blog avec Laravel 
 
Objectif :
L'objectif de ce TP est de créer des APIs pour un blog simple en utilisant le framework Laravel. Vous allez mettre en place des routes pour afficher une liste d'articles, ainsi que pour afficher un article individuel. De plus, vous allez implémenter des fonctionnalités CRUD pour les articles de blog et intégrer une fonctionnalité de gestion des commentaires pour chaque article. 
 
Prérequis :
- Connaissance de base de PHP et de Laravel.
- Environnement de développement Laravel configuré. 
 
Étapes : 
 
1. Définir le modèle pour les articles de blog : 
  - Créez un modèle Eloquent nommé `Article` avec les champs suivants : `titre`, `contenu`, `date_de_publication`, etc. 
 
2. Mettre en place des routes pour les APIs : 
  - Ouvrez le fichier `routes/api.php`. 
  - Définissez les routes suivantes : 
    - `GET /api/articles` : Renvoie la liste de tous les articles. 
    - `GET /api/articles/{id}` : Renvoie les détails d'un article spécifique en fonction de son ID. 
 
3. Implémenter les fonctionnalités CRUD : 
  - Créez un contrôleur `ArticleController`. 
  - Implémentez les méthodes suivantes dans le contrôleur pour gérer les fonctionnalités CRUD : 
    - `index` : Pour afficher la liste des articles. 
    - `show` : Pour afficher les détails d'un article. 
    - `store` : Pour créer un nouvel article. 
    - `update` : Pour mettre à jour un article existant. 
    - `destroy` : Pour supprimer un article. 
 
4. Intégrer la gestion des commentaires : 
  - Créez un modèle Eloquent nommé `Comment` avec les champs nécessaires (par exemple : `contenu`, `date`, `article_id`). 
  - Définissez les routes pour gérer les commentaires (par exemple : `POST /api/articles/{id}/comments` pour ajouter un commentaire à un article spécifique). 
  - Implémentez les méthodes nécessaires dans le contrôleur `CommentController` pour gérer la création, la lecture, la mise à jour et la suppression des commentaires. 
 
Ressources :
- Documentation Laravel : [https://laravel.com/docs](https://laravel.com/docs)
- Postman : [https://www.postman.com/](https://www.postman.com/) 
 
Livrables :
- Code source de votre application Laravel.
- Capture(s) d'écran de l'API en action à l'aide de Postman ou d'un autre outil similaire.
 
 
Remarque :
- Assurez-vous de tester vos APIs pour vérifier qu'elles fonctionnent correctement avant de soumettre vos livrables. 

database name :blog-db ![Get one Article](https://github.com/Alloul-o/Blog_formation/assets/99086462/2e4355cc-55ff-449c-8348-4e4850da6321)
![Delete Article](https://github.com/Alloul-o/Blog_formation/assets/99086462/e0075463-59f8-4be4-b42b-8b0e63a28bd3)
![Updated Article](https://github.com/Alloul-o/Blog_formation/assets/99086462/f38a1892-e4c5-4b1a-bcef-0c20398264fc)
![Update Comment](https://github.com/Alloul-o/Blog_formation/assets/99086462/be349765-15da-424e-b490-7549e292aa75)
![Post Comment](https://github.com/Alloul-o/Blog_formation/assets/99086462/a8e1f195-ce86-42b2-840c-a544489582a2)
![Post Article](https://github.com/Alloul-o/Blog_formation/assets/99086462/f6e170e6-0b3e-49ec-bb90-53441915ffbe)
![Get One Comment](https://github.com/Alloul-o/Blog_formation/assets/99086462/cb9a5f86-9fc5-4751-aa0f-b19ec90cfd54)
![Get one Article](https://github.com/Alloul-o/Blog_formation/assets/99086462/bb6d3206-e2f7-43af-98da-9f7e309c2a6b)
![Get Comments](https://github.com/Alloul-o/Blog_formation/assets/99086462/9674c8ce-4328-49b7-ba73-6ac18fa3eabb)
![Get all comments for an article](https://github.com/Alloul-o/Blog_formation/assets/99086462/0d946394-c372-43f7-a755-0793258faac5)
![Get all article](https://github.com/Alloul-o/Blog_formation/assets/99086462/b88ae53a-d584-4479-a26e-d27443ff640e)
