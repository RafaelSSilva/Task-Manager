<?php 
    class RepositoryAnexo{
        private $pdo;

        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        /**Obtem a lista de anexos da tarefa. */
        public function list ($task_id){
            $sql = "SELECT * FROM anexos WHERE task_id = :task_id";
            $query = $this->pdo->prepare($sql);
            $query->execute([
                "task_id" => $task_id,
            ]);

            $anexos = [];

            while($anexo = $query->fetchObject('Anexo')){
                $anexos[] = $anexo;
            }

            return $anexos;
        }

        /**Obtem o anexo. */
        public function get ($anexo_id){
            // definindo sql com prepared statements
            $sql = "SELECT * FROM anexos WHERE id = :id";

            //preparando a query
            $query = $this->pdo->prepare($sql);
        
            // executando a query com os parâmetros nomeados.
            $query->execute(
                [
                'id' => $anexo_id
                ]
            );

            
            $anexo = $query->fetchObject('Anexo');
            
            return $anexo;
        }      
        

         /**adiciona anexo. */
         public function add (Anexo $anexo){
            // definindo sql com prepared statements
            $sql = "
                INSERT INTO anexos 
                    (task_id, name, file)
                    VALUES (:task_id, :name, :file)
            ";

            //preparando a query
            $query = $this->pdo->prepare($sql);

            // executando a query com os parâmetros nomeados.
            $query->execute(
                [
                    'task_id' => strip_tags($anexo->getTask_id()),
                    'name' => strip_tags($anexo->getName()),
                    'file' => $anexo->getFile()
                ]
            );
        }
        
        /** remove anexo. */
        public function remove ($id){
            // definindo sql com prepared statements
            $sql = "DELETE FROM anexos WHERE id = :id";
            
             //preparando a query
             $query = $this->pdo->prepare($sql);

            // executando a query com os parâmetros nomeados.
            $query->execute(
                [
                    'id' => $id,
                ]
            );
        }
    }
