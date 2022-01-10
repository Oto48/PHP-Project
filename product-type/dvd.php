<?php
class DVD extends Model{
    public function add(){
        if(isset($_POST['size']))
        {
            $this->attribute = $_POST['size'].' MB';
            $this->insert();
        }
    }
}
?>