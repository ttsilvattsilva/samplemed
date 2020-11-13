# Teste Blog

[Banco de dados] - encontrasse - /app/Config/Schema/teste_samplemed.sql 

    * Modelo do banco na raiz do projeto "shema_ERR.png"
    * No teste usei o banco MysqlServer

[Routes] - Router::mapResources('posts');  
           Router::mapResources('users');
           Router::mapResources('categories');

Exemplo rota web - localhost/namedoprojeto/posts            
Exemplo rota api - localhost/namedoprojeto/posts.json             

[API]
| HTTP format | URL format      | Controller action invoked  |
|-------------|-----------------|----------------------------|
| GET         | /posts.format   | PostsController::index()   |
| GET         | /posts/1.format | PostsController::view(1)   |
| POST        | /posts.format   | PostsController::add()     |
| POST        | /posts/1.format | PostsController::edit(1)   |
| PUT         | /posts/1.format | PostsController::edit(1)   |
| DELETE      | /posts/1.format | PostsController::delete(1) |
|             |                 |                            |

https://book.cakephp.org/2/pt/development/rest.html

 




