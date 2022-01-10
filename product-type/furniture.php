<?php
class Furniture extends Model{
    public function add(){
        if(isset($_POST['height']) && isset($_POST['width']) && isset($_POST['length']))
        {
            $this->attribute = $_POST['height'].'x'.$_POST['width'].'x'.$_POST['length'];
            $this->insert();
        }
    }
}
?>