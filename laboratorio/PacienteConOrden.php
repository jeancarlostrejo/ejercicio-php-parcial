<?php
namespace parcialProgra1\laboratorio;

use parcialProgra1\examenes\Bacteriologia;
use parcialProgra1\examenes\Examen;
use parcialProgra1\laboratorio\Persona;

// require_once "Persona.php";
// require_once "../examenes/Examen.php";
// require_once "../examenes/Bacteriologia.php";
class PacienteConOrden extends Persona
{
    public function __construct(string $cedula, string $apellido, string $nombre, string $sexo, int $edad, string $telf, private string $fecha, private array $orden, private float $montoPagado = 0)
    {
        parent::__construct($cedula, $apellido, $nombre, $sexo, $edad, $telf);
    }

    public function getFecha(): string
    {
        return $this->fecha;
    }

    public function getOrden(): array
    {
        return $this->orden;
    }

    public function getMontoPagado(): float
    {
        foreach ($this->orden as $examen) {
            $this->montoPagado += $examen->getPrecio();
        }

        if (count($this->orden) > 3) {
            $this->montoPagado -= $this->montoPagado * 0.08;

        }

        return $this->montoPagado;
    }

    public function setFecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }

    public function setOrden(Examen $orden): void
    {
        $this->orden[] = $orden;
    }

    public function setMontoPagado(float $montoPagado): void
    {
        $this->montoPagado = $montoPagado;
    }

    public function getNombreCompleto(): string
    {
        return $this->getCedula() . parent::getNombre() . " " . parent::getApellido();
    }

    public function calcularSensibilidad(): string
    {

        foreach ($this->orden as $examen) {

            if (($examen instanceof Bacteriologia) && $examen->getResultado() === true) {
                return "Es sensible";
            }

        }

        return "No es sensible";
    }

    public function calcularMontoPagado(): void
    {
        foreach ($this->orden as $examen) {
            $this->montoPagado += $examen->precio;
        }

        if (count($this->orden) > 3) {
            $this->montoPagado -= $this->montoPagado * 0.08;

        }
    }

}
