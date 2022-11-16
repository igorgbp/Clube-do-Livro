<?php

class Cliente {
    private $id_cliente;
    private $nome;
    private $cpf;
    private $email;
    private $senha;


    public function getId_cliente()
    {
        return $this->id_cliente;
    }


    public function setId_cliente($id)
    {
        $this->id_cliente = $id;

        return $this;
    }




    public function getNome()
    {
        return $this->nome;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }




    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }





    
    public function getCpf()
    {
        return $this->cpf;
    }


    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }




    
    public function getSenha()
    {
        return $this->senha;
    }


    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
}