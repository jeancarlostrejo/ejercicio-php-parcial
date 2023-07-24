<?php
namespace parcialProgra1\ejecucion;

use parcialProgra1\examenes\Bacteriologia;
use parcialProgra1\examenes\Sangre;
use parcialProgra1\herramientas\Datos;
use parcialProgra1\herramientas\IMaximos;
use parcialProgra1\laboratorio\PacienteConOrden;

class Implementacion implements IMaximos
{
    public $pacientesConOrden = [];

    public function main()
    {

        $data = new Datos();

        for ($i = 0; $i < self::MAX_PACIENTES; $i++) {

            $examenes = [];
            [$apellido, $nombre, $cedula, $sexo, $edad, $telefono, $cantExamenes] = explode(" ", ($data->getPaciente($i)));

            // var_dump($stringValue);
            for ($j = 0; $j < $data->longExamenes(); $j++) {

                [$cedPaciente, $fecha, $tipoExamen, $idExamen, $descripcionExamen, $precio, $extra1, $extra2] = explode("-", $data->getExamen($j));
                if ($cedula === $cedPaciente) {
                    if ($tipoExamen === "S") {
                        $examenes[] = new Sangre($idExamen, $descripcionExamen, (float) $precio, $extra1, (int) $extra2);
                    } else if ($tipoExamen === "B") {
                        $examenes[] = new Bacteriologia((int) $idExamen, $descripcionExamen, (float) $precio, (int) $extra1, filter_var($extra2, FILTER_VALIDATE_BOOL));
                    }
                }

            }

            $this->pacientesConOrden[] = new PacienteConOrden($cedula, $apellido, $nombre, $sexo, (int) $edad, $telefono, $fecha, $examenes);

        }

    }

    public function listadoSensible(): void
    {
        $encabezado = '
        <h1>Listado general de pacientes</h1>
        <table border="1">
            <tr>
                <td><strong>Cedula</strong></td>
                <td><strong>Apellido</strong></td>
                <td><strong>Nombre</strong></td>
                <td><strong>Sens. Bact.</strong></td>
                <td><strong>Monto Pagado</strong></td>
            </tr>
        ';

        echo $encabezado;

        foreach ($this->pacientesConOrden as $paciente) {
            echo '
            <tr>
            <td>' . $paciente->getCedula() . ' </td>
            <td>' . $paciente->getApellido() . '</td>
            <td>' . $paciente->getNombre() . '</td>
            <td>' . $paciente->calcularSensibilidad() . '</td>
            <td>' . $paciente->getMontoPagado() . '</td>
            </tr>';
        }
        echo '</table>';
    }
    public function listadoHormonal(): void
    {
        $encabezado = '
        <h1>Pacientes con perfil hormonal</h1>
        <table border="1">
            <tr>
                <td><strong>nombre</strong></td>
                <td><strong>Apellido</strong></td>
                <td><strong>Descripcion del examen</strong></td>
                <td><strong>Resultado.</strong></td>
            </tr>
        ';

        echo $encabezado;

        foreach ($this->pacientesConOrden as $paciente) {

            foreach ($paciente->getOrden() as $orden) {

                if ($orden instanceof Sangre && $orden->getPerfil() === "Hormonal") {

                    echo '
                    <tr>
                    <td>' . $paciente->getNombre() . ' </td>
                    <td>' . $paciente->getApellido() . '</td>
                    <td>' . $orden->getDescripcion() . '</td>
                    <td>' . $orden->getResultado() . '</td>
                    </tr>';

                }

            }
        }
        echo '</table>';

    }

}
