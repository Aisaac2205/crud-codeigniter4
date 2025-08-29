<?php

namespace App\Controllers;

use App\Models\AlumnoModel;
use App\Models\CursoModel;
use App\Models\DetalleAlumnoCursoModel;
use CodeIgniter\Controller;

class AsignacionController extends Controller
{
    protected $alumnoModel;
    protected $cursoModel;
    protected $detalleModel;

    public function __construct()
    {
        $this->alumnoModel = new AlumnoModel();
        $this->cursoModel = new CursoModel();
        $this->detalleModel = new DetalleAlumnoCursoModel();
    }

    /**
     * Obtiene los cursos disponibles para asignar a un alumno
     */
    public function getCursosDisponibles($alumnoId)
    {
        // Agregar logging para debug
        log_message('info', "getCursosDisponibles llamado para alumno ID: $alumnoId");
        
        // Usar el método del modelo que está correctamente implementado
        $cursosDisponibles = $this->cursoModel->getCursosDisponibles($alumnoId);
        
        log_message('info', "Cursos disponibles encontrados: " . count($cursosDisponibles));
        log_message('info', "Cursos: " . json_encode($cursosDisponibles));
        
        return $this->response->setJSON($cursosDisponibles);
    }

    /**
     * Obtiene los cursos asignados a un alumno
     */
    public function getCursosAsignados($alumnoId)
    {
        $cursosAsignados = $this->detalleModel->getCursosByAlumno($alumnoId);
        return $this->response->setJSON($cursosAsignados);
    }

    /**
     * Asigna un curso a un alumno
     */
    public function asignarCurso()
    {
        $alumnoId = $this->request->getPost('alumno_id');
        $cursoId = $this->request->getPost('curso_id');
        
        if ($this->detalleModel->asignarCurso($alumnoId, $cursoId)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Curso asignado correctamente']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'El curso ya está asignado']);
        }
    }

    /**
     * Desasigna un curso de un alumno
     */
    public function desasignarCurso()
    {
        $alumnoId = $this->request->getPost('alumno_id');
        $cursoId = $this->request->getPost('curso_id');
        
        if ($this->detalleModel->desasignarCurso($alumnoId, $cursoId)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Curso desasignado correctamente']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Error al desasignar el curso']);
        }
    }
}
