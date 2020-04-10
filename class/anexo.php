<?php 
    class Anexo {
        /**
         * @var int
         */
        private $id;
        
         /**
         * @var int
         */
        private $task_id;
        
         /**
         * @var string
         */
        private $name;
        
        /**
         * @var string
         */
        private $file;


        /**
         * Get the value of id
         *
         * @return  int
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @param  int  $id
         *
         * @return  self
         */ 
        public function setId(int $id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of task_id
         *
         * @return  int
         */ 
        public function getTask_id()
        {
                return $this->task_id;
        }

        /**
         * Set the value of task_id
         *
         * @param  int  $task_id
         *
         * @return  self
         */ 
        public function setTask_id(int $task_id)
        {
                $this->task_id = $task_id;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of file
         *
         * @return  string
         */ 
        public function getFile()
        {
                return $this->file;
        }

        /**
         * Set the value of file
         *
         * @param  string  $file
         *
         * @return  self
         */ 
        public function setFile(string $file)
        {
                $this->file = $file;

                return $this;
        }
    }

?>