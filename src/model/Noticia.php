<?php

require_once("../dao/NoticiaDAO.php");

class Noticia extends NoticiaDAO
{

    private $id;
    private $titulo;
    private $descricao;
    private $texto;
    private $autor;
    private $imagem;

    public static function completeObject(array $row)
    {
        $instance = new static();
        $instance->fill($row);
        return $instance;
    }

    protected function fill(array $row)
    {
        $this->titulo = $row["titulo"];
        $this->descricao = $row["descricao"];
        $this->texto = $row["texto"];
        $this->autor = $row["autor"];
        $this->imagem = $row["imagem"];
    }

    public function toDataContract()
    {
        return array(
            "titulo" => $this->getTitulo(),
            "descricao" => $this->getDescricao(),
            "texto" => $this->getTexto(),
            "autor" => $this->getAutor(),
            "imagem" => $this->getImagem(),
        );
    }


    //Metodos Set
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    public function setAutor( $autor)
    {
        $this->autor = $autor;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    //Metodos Get
    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

}