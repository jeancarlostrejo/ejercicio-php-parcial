<?php
namespace parcialProgra1\examenes;

use parcialProgra1\examenes\Examen;

class Bacteriologia extends Examen
{
    public function __construct(int $id, string $descripcion, float $precio, private int $nroHoras, private bool $resultado)
    {
        parent::__construct($id, $descripcion, $precio);

    }

    public function getNroHoras(): int
    {
        return $this->nroHoras;
    }

    public function getResultado(): bool
    {
        return $this->resultado;
    }

    public function setNroHoras(int $nroHoras): void
    {
        $this->nroHoras = $nroHoras;
    }

    public function setResultado(bool $esultado): void
    {
        $this->resultado = $esultado;
    }
}
