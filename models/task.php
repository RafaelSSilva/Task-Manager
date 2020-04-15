<?php 

class Task {
    /** 
    *  @var int
    */
    private $id;
    
     /** 
    *  @var string
    */
    private $name;
   
    /** 
    *  @var string
    */
    private $description;
    
     /** 
    *  @var string
    */
    private $term;

     /** 
    *  @var int
    */
    private $priority;
    
     /** 
    *  @var int
    */
    private $high;





     /** 
    *  @var array
    */
    private $anexos;


    public function __construct()
    {
        $this->anexos = [];
    }


    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of term
     *
     * @return  string
     */ 
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * Set the value of term
     *
     * @param  DateTime  $term
     *
     * @return  self
     */ 
    public function setTerm(DateTime $term)
    {
        $this->term = $term;

        return $this;
    }

    /**
     * Get the value of priority
     *
     * @return  int
     */ 
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set the value of priority
     *
     * @param  int  $priority
     *
     * @return  self
     */ 
    public function setPriority(int $priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get the value of high
     *
     * @return  int
     */ 
    public function getHigh()
    {
        return $this->high;
    }

    /**
     * Set the value of high
     *
     * @param  int  $high
     *
     * @return  self
     */ 
    public function setHigh(int $high)
    {
        $this->high = $high;

        return $this;
    }

    /**
     * Get the value of anexos
     *
     * @return  array
     */ 
    public function getAnexos()
    {
        return $this->anexos;
    }

    /**
     * Set the value of anexos
     *
     * @param  array  $anexos
     *
     * @return  self
     */ 
    public function setAnexos(array $anexos)
    {
        
        foreach($anexos as $anexo){
            $this->addAnexo($anexo);
        }

        return $this;
    }

    public function addAnexo(Anexo $anexo){
        array_push($this->anexos, $anexo);
    }
}