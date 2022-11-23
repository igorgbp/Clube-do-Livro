<?php

class Cliente {
    private $id_produto;
    private $nome;
    private $descricao;
    private $nota;
    private $preco;




    
    public function getId_produto()
    {
        return $this->id_produto;
    }


    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;

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





    public function getDescricao()
    {
        return $this->descricao;
    }

    
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }





    public function getNota()
    {
        return $this->nota;
    }


    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }




    public function getPreco()
    {
        return $this->preco;
    }


    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }
}