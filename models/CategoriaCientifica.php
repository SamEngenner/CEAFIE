<?php


namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriaCientifica
 *
 * @ORM\Table(name="categoria_cientifica")
 * @ORM\Entity
 */
class CategoriaCientifica
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;
    
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }




}
