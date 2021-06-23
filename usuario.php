<?php

/**
 * sdasd dasdasdsa dsad
 * sdasdjkasjasdjaskasd
 * 
 */
class Usuario {
    
    private $id;
    
    /**
     * sdmasnsa asjsahjs ashjsgshsasda sads s sda
     * @var string
     */
    private $email, $senha;
    private $tabela;
    
    public function __construct($data=null){
       $this->tabela="usuarios";
       
       if ( ! empty($data)  ) {
            $this->hydration($data);
       }
        
    }
    
    public function hydration($data) {
        
        if (isset($data["id"])) {
            $this->id = $data["id"];
        }
        if (isset($data["email"])) {
            $this->email = $data["email"];
        }
        if (isset($data["senha"])) {
            $this->senha = $data["senha"];
        }
        
    }
    
    function getInsert() {
        $sql = "insert into ".$this->tabela." (email,senha) 
        values ('".$this->email."','".$this->senha."')";
        
        return $sql;
    }
    function getUpdate() {
        return "update ".$this->tabela.
                " set email='".$this->email."', senha='".$this->senha."'
                  where id = ".$this->id;
    }
    function getDelete() {
        return "delete  from ".$this->tabela.
                " where id = ".$this->id;
    }
    
    function getSelect() {
        $sql = "select * from ".$this->tabela;
    }
    
    function getSelectById($id) {
        return "select * from ".$this->tabela." where id = $id ";
    }
}


?>