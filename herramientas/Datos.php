<?php
namespace parcialProgra1\herramientas;

class Datos
{
    //apellido nombre cedula sexo edad telefono cantidad de examenes
    private array $pacientes = [
        "Chacon Luis 20456789 M 32 04166769999 2",
        "Perez Maria 21345678 F 25 04125463561 4",
        "Mora Doris 22123456 F 36 04146764567 3",
        "Alvarez Jose 19876543 M 21 04267564636 2",
        "Suarez Rosana 27768456 F 50 04243456789 1",
    ];

    //cedula-fecha-tipoEXamen(S: Sangre, B: Bacteriologo)-idExamen-descripcion-precio,[Si es de sangre: perfil-resultado | Si Bacteriológico: nroHoras-Resultado]
    private array $examenes = [
        "20456789-01/01/2018-S-101-Hematologia completa-350.0-Hematologia-12",
        "20456789-01/01/2018-S-105-Contaje de plaquetas-310.0-Hematologia-800",
        "21345678-01/01/2018-S-202-Glicemia basal-550.0-Quimica clinica-85",
        "21345678-01/01/2018-S-301-Anticuerpo antinucleares-850.0-Autoinmunidad-85",
        "21345678-10/01/2018-S-102-Hemoglobina y hematocrito-620.0-Hematologia-8",
        "21345678-10/01/2018-B-406-Cultivo de esputos-1050.0-48-true",
        "22123456-12/01/2018-B-409-Cultivo de LCR-2500.0-72-false",
        "22123456-12/01/2018-S-506-TSH libre-1900.0-Hormonal-120",
        "22123456-12/01/2018-B-401-Coloracion de Gram-1530.0-120-true",
        "19876543-15/01/2018-S-505-T4 libre-1600.0-Hormonal-120",
        "19876543-15/01/2018-S-504-T3 libre-1600.0-Hormonal-50",
        "27768456-19/01/2018-B-402-Coloracion de Ziehl y Neelsen-3530.0-120-false",
    ];

    public function longPacientes(): int
    {
        return count($this->pacientes);
    }

    public function longExamenes(): int
    {
        return count($this->examenes);
    }

    public function getPaciente(int $indice): ?string
    {
        if ($indice < 0 || $indice > $this->longPacientes()) {
            return null;
        }

        return $this->pacientes[$indice];
    }

    public function getExamen($indice): ?string
    {
        if (($indice) < 0 || ($indice) > $this->longExamenes()) {
            return null;
        }
        return $this->examenes[$indice];
    }
}
