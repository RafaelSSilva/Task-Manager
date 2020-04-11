<?php 
    class RepositoryAnexo{
        private $connection;

        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        /**Obtem a lista de anexos da tarefa. */
        public function list ($task_id){
            $task_id = $this->connection->real_escape_string($task_id); 


            $anexos = [];
            $sql = "SELECT * FROM anexos WHERE task_id = {$task_id}";

            $result = $this->connection->query($sql);
            
            while($anexo = $result->fetch_object('Anexo')){
                $anexos[] = $anexo;
            }

            return $anexos;
        }

        /**Obtem o anexo. */
        public function get ($anexo_id){
            $anexo_id = $this->connection->real_escape_string($anexo_id); 
            $sql = "SELECT * FROM anexos WHERE id = {$anexo_id}";

            $result = $this->connection->query($sql);
            
            return $result->fetch_object('Anexo');
        }      
        

         /**adiciona anexo. */
         public function add (Anexo $anexo){
            $name = strip_tags($this->connection->real_escape_string($anexo->getName()));
            $file = $this->connection->real_escape_string($anexo->getFile());

            $sql = "INSERT INTO anexos 
                (
                    task_id, 
                    name, 
                    file
                ) 
                VALUES 
                (
                     {$anexo->getTask_id()},
                    '{$name}',
                    '{$file}'
                )";

            $this->connection->query($sql);
            
        }
        
        /** remove anexo. */
        public function remove ($id){
            $id = $this->connection->real_escape_string($id);

            $sql = "DELETE FROM anexos WHERE id =" . $id;
            $this->connection->query($sql);
        }
    }
