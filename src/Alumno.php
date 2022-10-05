<?php
class Alumno {
    private string $dni;
    private string $name;
    private string $codMatricula;
    private string $email;
    
    public function getDni()
    {
        return $this->dni;
    }

   
    public function getName()
    {
        return $this->name;
    }

    
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCodMatricula()
    {
        return $this->codMatricula;
    }

    
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function setCodMatricula($codMatricula)
    {
        $this->codMatricula = $codMatricula;
    }
     
   
    function __construct($name, $DNI, $email, $codMatricula){
      $this->name = $name;
      $this->dni = $DNI;
      $this->email = $email;
      $this->codMatricula = $codMatricula;
    }
    
    
}