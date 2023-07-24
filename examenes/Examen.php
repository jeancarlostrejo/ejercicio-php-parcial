<?php
namespace parcialProgra1\examenes;

class Examen
{

    public function __construct(private int $id, private string $descripcion, private float $precio)
    {

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function setId(int $id): void
    {
        $this->$id = $id;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    public function CalcularPrecioReal(): float
    {
        return $this->precio += $this->precio * 0.12;
    }

}
