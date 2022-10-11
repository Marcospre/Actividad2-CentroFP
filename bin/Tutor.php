<?php
class Tutor{
    private string $DNI;
    public string $Nombre;
    private string $contrasenia;
    
    
    /**
     * @return string
     */
    public function getDNI()
    {
        return $this->DNI;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param string $DNI
     */
    public function setDNI($DNI)
    {
        $this->DNI = $DNI;
    }

    /**
     * @param mixed $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    function __construct(string $dni, string $Nombre, string $contrasenia){
        $this->DNI = $dni;
        $this->Nombre = $Nombre;
        $this->contrasenia = $contrasenia;
    }
    
    
}