<?php

namespace DoctrineProxies\__CG__\models;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Nota extends \models\Nota implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'models\\Nota' . "\0" . 'id', '' . "\0" . 'models\\Nota' . "\0" . 'nota', '' . "\0" . 'models\\Nota' . "\0" . 'data', '' . "\0" . 'models\\Nota' . "\0" . 'aluno', '' . "\0" . 'models\\Nota' . "\0" . 'curso', '' . "\0" . 'models\\Nota' . "\0" . 'modulo');
        }

        return array('__isInitialized__', '' . "\0" . 'models\\Nota' . "\0" . 'id', '' . "\0" . 'models\\Nota' . "\0" . 'nota', '' . "\0" . 'models\\Nota' . "\0" . 'data', '' . "\0" . 'models\\Nota' . "\0" . 'aluno', '' . "\0" . 'models\\Nota' . "\0" . 'curso', '' . "\0" . 'models\\Nota' . "\0" . 'modulo');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Nota $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getNota()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNota', array());

        return parent::getNota();
    }

    /**
     * {@inheritDoc}
     */
    public function getData()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getData', array());

        return parent::getData();
    }

    /**
     * {@inheritDoc}
     */
    public function getAluno()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAluno', array());

        return parent::getAluno();
    }

    /**
     * {@inheritDoc}
     */
    public function getCurso()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCurso', array());

        return parent::getCurso();
    }

    /**
     * {@inheritDoc}
     */
    public function getModulo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModulo', array());

        return parent::getModulo();
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function setNota($nota)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNota', array($nota));

        return parent::setNota($nota);
    }

    /**
     * {@inheritDoc}
     */
    public function setData($data)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setData', array($data));

        return parent::setData($data);
    }

    /**
     * {@inheritDoc}
     */
    public function setAluno(\models\Aluno $aluno)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAluno', array($aluno));

        return parent::setAluno($aluno);
    }

    /**
     * {@inheritDoc}
     */
    public function setCurso(\models\Curso $curso)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCurso', array($curso));

        return parent::setCurso($curso);
    }

    /**
     * {@inheritDoc}
     */
    public function setModulo(\models\Modulo $modulo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setModulo', array($modulo));

        return parent::setModulo($modulo);
    }

    /**
     * {@inheritDoc}
     */
    public function adicionar($dados = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'adicionar', array($dados));

        return parent::adicionar($dados);
    }

    /**
     * {@inheritDoc}
     */
    public function editar($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'editar', array($id));

        return parent::editar($id);
    }

    /**
     * {@inheritDoc}
     */
    public function pesquisaPor($dados)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'pesquisaPor', array($dados));

        return parent::pesquisaPor($dados);
    }

    /**
     * {@inheritDoc}
     */
    public function pesquisar($id = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'pesquisar', array($id));

        return parent::pesquisar($id);
    }

    /**
     * {@inheritDoc}
     */
    public function remover($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'remover', array($id));

        return parent::remover($id);
    }

}
