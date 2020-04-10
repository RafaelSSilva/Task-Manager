<?php 
    interface TaskRepositoryInterface{
        public function add(Task $task);
        public function remove(int $id);
        public function update(Task $task);
        public function get(int $id);
        public function getList();
}

?>