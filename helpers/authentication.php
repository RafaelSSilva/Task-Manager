<?php
    /**
     * Gerência a autenticação do usuário
     * @author Rafael Santos Da Silva
     * 
    */
    
    class Authentication{
        
        /**
         * @var PDO $pdo Objeto de conexão com o banco de dados.
         * @access private
         */
        private $pdo;
        
        public function __construct(PDO $pdo){
            $this->pdo = $pdo;
        }

        /**
        *Verifica se o usuário está logado
        *@return bool
        *@access public 
        */

        public function is_logged(): bool{
            $logged = false;
            
            if(array_key_exists('name', $_SESSION) && array_key_exists('email', $_SESSION)){
                $logged = true;
            }

            return $logged;
        }

        /**
         * Faz Autenticação do usuário
         * @param  string $email
         * @param  string $password
         * @return bool
         * @access public
         */
        
        public function login(string $email, string $password){
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        
            //preparando a query
            $query = $this->pdo->prepare($sql);

            $query->bindParam(":email", $email);
            $query->bindParam(":email", $email, PDO::PARAM_STR);
            $query->bindParam(":password", $password);
            $query->bindParam(":password", $password, PDO::PARAM_STR);

            $query->execute();

            foreach($query->fetchAll(PDO::FETCH_CLASS, "User") as $user){
                $_SESSION['id'] = $user->getId();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['name'] = $user->getName();
                $_SESSION['last_name'] = $user->getLast_name();

            }
           
            return $query->rowCount() > 0;
        }

         /**
         * Desloga, destrói a sessão do usuário.
         * @return void
         * @access public
         */
        
        public function logout(){
            session_unset();
            session_destroy();
        }
    }


?>