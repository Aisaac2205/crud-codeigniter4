<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleAlumnoCursoModel extends Model
{
    protected $table = 'detalle_alumno_curso';
    protected $primaryKey = 'id';
    protected $allowedFields = ['alumno_id', 'curso_id'];
    protected $useTimestamps = false;
    protected $returnType = 'array';

    // Obtener todos los cursos asignados a un alumno
    public function getCursosByAlumno($alumnoId)
    {
        $db = \Config\Database::connect();
        
        $sql = "SELECT c.*, dac.fecha_asignacion 
                FROM detalle_alumno_curso dac
                INNER JOIN cursos c ON dac.curso_id = c.curso
                WHERE dac.alumno_id = ? AND c.inactivo = 0
                ORDER BY c.nombre";
        
        $query = $db->query($sql, [$alumnoId]);
        return $query->getResultArray();
    }

    // Obtener todos los alumnos asignados a un curso
    public function getAlumnosByCurso($cursoId)
    {
        $db = \Config\Database::connect();
        
        $sql = "SELECT a.*, dac.fecha_asignacion 
                FROM detalle_alumno_curso dac
                INNER JOIN alumnos a ON dac.alumno_id = a.alumno
                WHERE dac.curso_id = ? AND a.inactivo = 0
                ORDER BY a.apellido, a.nombre";
        
        $query = $db->query($sql, [$cursoId]);
        return $query->getResultArray();
    }

    // Verificar si un curso ya está asignado a un alumno
    public function cursoAsignado($alumnoId, $cursoId)
    {
        return $this->where('alumno_id', $alumnoId)
                   ->where('curso_id', $cursoId)
                   ->first() !== null;
    }

    // Asignar un curso a un alumno
    public function asignarCurso($alumnoId, $cursoId)
    {
        // Verificar que no esté ya asignado
        if ($this->cursoAsignado($alumnoId, $cursoId)) {
            return false;
        }

        $data = [
            'alumno_id' => $alumnoId,
            'curso_id' => $cursoId
        ];

        return $this->insert($data);
    }

    // Desasignar un curso de un alumno
    public function desasignarCurso($alumnoId, $cursoId)
    {
        return $this->where('alumno_id', $alumnoId)
                   ->where('curso_id', $cursoId)
                   ->delete();
    }

    // Obtener el total de cursos asignados a un alumno
    public function getTotalCursosByAlumno($alumnoId)
    {
        return $this->where('alumno_id', $alumnoId)->countAllResults();
    }

    // Obtener el total de alumnos asignados a un curso
    public function getTotalAlumnosByCurso($cursoId)
    {
        return $this->where('curso_id', $cursoId)->countAllResults();
    }
}
