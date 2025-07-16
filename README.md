# CRUD de tarefas
## Descrição
  Projeto de um CRUD(Create,Read,Update,Delete) de tarefas, feito com php, CodeIgniter 4, Boostrap e Mysql.

## Como rodar
  ### 1. Crie a base de dados 'tarefas'  e inclua 
        CREATE TABLE tasks (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(255) NOT NULL,
                    description TEXT,
                    status ENUM('pendente', 'em andamento', 'concluída') DEFAULT 'pendente',
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE
                    CURRENT_TIMESTAMP
        );

 ### 2. Ligue o server com "php spark serve"
 ### 3. Acesse o projeto através de http://localhost:8080 

 ## Para utilizar postman ou outro cliente de api
    Utilize as rotas:
    1. Para Listar: http://localhost:8080/api/list
    2. Para criar: http://localhost:8080/api/create
    3. Para atualizar: http://localhost:8080/api/update
    4. Para deletar: http://localhost:8080/api/delete/(id que deseja apagar)

	

 	