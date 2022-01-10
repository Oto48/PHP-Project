<?php
class Book extends Model{
    public function add(){
        if(isset($_POST['weight']))
        {
            $this->attribute = $_POST['weight'].' KG';
            $this->insert();
        }
    }
}
?>