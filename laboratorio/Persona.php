<?php
namespace parcialProgra1\laboratorio;

abstract class Persona
{
    public function __construct(private string $cedula, private string $apellido, private string $nombre, private string $sexo, private int $edad, private string $telf)
    {

    }

    public function getCedula(): string
    {
        return $this->cedula;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getSexo(): string
    {
        return $this->sexo;
    }

    public function getEdad(): int
    {
        return $this->edad;
    }

    public function getTelf(): string
    {
        return $this->telf;
    }

    abstract public function getNombreCompleto(): string;

}
