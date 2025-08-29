<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumnoModel extends Model
{
    protected $table = 'alumnos';
    protected $primaryKey = 'alumno';
    protected $allowedFields = ['nombre', 'apellido', 'email', 'telefono', 'inactivo'];
    protected $useTimestamps = false;
    protected $returnType = 'array';

    // Reglas de validación
    protected $validationRules = [
        'nombre' => 'required|min_length[2]|max_length[100]',
        'apellido' => 'required|min_length[2]|max_length[100]',
        'email' => 'required|valid_email|is_unique[alumnos.email,alumno,{alumno}]',
        'telefono' => 'permit_empty|max_length[20]',
        'inactivo' => 'permit_empty|in_list[0,1]'
    ];

    // Mensajes de validación personalizados
    protected $validationMessages = [
        'nombre' => [
            'required' => 'El nombre es obligatorio',
            'min_length' => 'El nombre debe tener al menos 2 caracteres',
            'max_length' => 'El nombre no puede exceder 100 caracteres'
        ],
        'apellido' => [
            'required' => 'El apellido es obligatorio',
            'min_length' => 'El apellido debe tener al menos 2 caracteres',
            'max_length' => 'El apellido no puede exceder 100 caracteres'
        ],
        'email' => [
            'required' => 'El email es obligatorio',
            'valid_email' => 'El email debe tener un formato válido',
            'is_unique' => 'Este email ya está registrado'
        ]
    ];

    // Obtener todos los alumnos activos
    public function getAlumnosActivos()
    {
        return $this->where('inactivo', 0)->findAll();
    }

    // Obtener alumno por email
    public function getAlumnoByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    // Buscar alumnos por nombre o apellido
    public function buscarAlumnos($termino)
    {
        return $this->like('nombre', $termino)
                   ->orLike('apellido', $termino)
                   ->orLike('email', $termino)
                   ->findAll();
    }
}