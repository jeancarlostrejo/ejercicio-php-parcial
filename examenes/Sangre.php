<?php
namespace parcialProgra1\examenes;

use parcialProgra1\examenes\Examen;

class Sangre extends Examen
{
    public function __construct(int $id, string $descripcion, float $precio, private string $perfil, private int $resultado)
    {
        parent::__construct($id, $descripcion, $precio);
    }

    public function getPerfil(): string
    {
        return $this->perfil;
    }

    public function getResultado(): int
    {
        return $this->resultado;
    }

    public function setPerfil(string $perfil): void
    {
        $this->perfil = $perfil;
    }

    public function setResultado(): int
    {
        return $this->resultado;
    }

}
