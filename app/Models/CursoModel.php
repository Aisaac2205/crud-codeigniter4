<?php

namespace App\Models;

use CodeIgniter\Model;

class CursoModel extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'curso';
    protected $allowedFields = ['nombre', 'profesor', 'inactivo'];
    protected $useTimestamps = false;
    protected $returnType = 'array';

    // Reglas de validación
    protected $validationRules = [
        'nombre' => 'required|min_length[3]|max_length[100]',
        'profesor' => 'required|min_length[2]|max_length[100]',
        'inactivo' => 'permit_empty|in_list[0,1]'
    ];

    // Mensajes de validación personalizados
    protected $validationMessages = [
        'nombre' => [
            'required' => 'El nombre del curso es obligatorio',
            'min_length' => 'El nombre del curso debe tener al menos 3 caracteres',
            'max_length' => 'El nombre del curso no puede exceder 100 caracteres'
        ],
        'profesor' => [
            'required' => 'El nombre del profesor es obligatorio',
            'min_length' => 'El nombre del profesor debe tener al menos 2 caracteres',
            'max_length' => 'El nombre del profesor no puede exceder 100 caracteres'
        ]
    ];

    // Obtener todos los cursos activos
    public function getCursosActivos()
    {
        return $this->where('inactivo', 0)->findAll();
    }

    // Obtener curso por nombre
    public function getCursoByNombre($nombre)
    {
        return $this->where('nombre', $nombre)->first();
    }

    // Buscar cursos por nombre o profesor
    public function buscarCursos($termino)
    {
        return $this->like('nombre', $termino)
                   ->orLike('profesor', $termino)
                   ->findAll();
    }

    // Obtener cursos disponibles para asignar a un alumno
    public function getCursosDisponibles($alumnoId)
    {
        $db = \Config\Database::connect();
        
        $sql = "SELECT c.* FROM cursos c 
                WHERE c.inactivo = 0 
                AND c.curso NOT IN (
                    SELECT dac.curso_id 
                    FROM detalle_alumno_curso dac 
                    WHERE dac.alumno_id = ?
                )";
        
        $query = $db->query($sql, [$alumnoId]);
        return $query->getResultArray();
    }
}