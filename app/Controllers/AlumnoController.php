<?php

namespace App\Controllers;

use App\Models\AlumnoModel;
use App\Models\DetalleAlumnoCursoModel;

class AlumnoController extends BaseController
{
    protected $alumnoModel;
    protected $detalleModel;

    public function __construct()
    {
        $this->alumnoModel = new AlumnoModel();
        $this->detalleModel = new DetalleAlumnoCursoModel();
    }

    public function index()
    {
        $alumnos = $this->alumnoModel->findAll();
        
        // Obtener información de cursos asignados para cada alumno
        foreach ($alumnos as &$alumno) {
            $cursosAsignados = $this->detalleModel->getCursosByAlumno($alumno['alumno']);
            $alumno['cursos_asignados'] = $cursosAsignados;
            $alumno['total_cursos'] = count($cursosAsignados);
        }

        $data = [
            'title' => 'Gestión de Alumnos',
            'alumnos' => $alumnos
        ];

        return view('alumnos/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Crear Nuevo Alumno'
        ];

        return view('alumnos/create', $data);
    }

    public function store()
    {
        // Agregar logging para debug
        log_message('info', "Datos recibidos en store: " . json_encode($this->request->getPost()));
        
        // Validar datos
        if (!$this->validate($this->alumnoModel->getValidationRules(), $this->alumnoModel->getValidationMessages())) {
            log_message('error', "Errores de validación: " . json_encode($this->validator->getErrors()));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $datos = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
            'inactivo' => $this->request->getPost('inactivo') ?? 0
        ];

        log_message('info', "Datos a guardar: " . json_encode($datos));

        if ($this->alumnoModel->save($datos)) {
            log_message('info', "Alumno creado exitosamente");
            return redirect()->to('/alumnos')->with('success', 'Alumno creado exitosamente');
        } else {
            log_message('error', "Error al crear alumno: " . json_encode($this->alumnoModel->errors()));
            return redirect()->back()->withInput()->with('error', 'Error al crear el alumno');
        }
    }

    public function edit($id = null)
    {
        if ($id === null) {
            return redirect()->to('/alumnos')->with('error', 'ID de alumno no especificado');
        }

        $alumno = $this->alumnoModel->find($id);
        
        if (!$alumno) {
            return redirect()->to('/alumnos')->with('error', 'Alumno no encontrado');
        }

        $data = [
            'title' => 'Editar Alumno',
            'alumno' => $alumno
        ];

        return view('alumnos/edit', $data);
    }

    public function update($id = null)
    {
        if ($id === null) {
            return redirect()->to('/alumnos')->with('error', 'ID de alumno no especificado');
        }

        // Validar datos
        if (!$this->validate($this->alumnoModel->getValidationRules(), $this->alumnoModel->getValidationMessages())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $datos = [
            'alumno' => $id,
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
            'inactivo' => $this->request->getPost('inactivo') ?? 0
        ];

        if ($this->alumnoModel->save($datos)) {
            return redirect()->to('/alumnos')->with('success', 'Alumno actualizado exitosamente');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al actualizar el alumno');
        }
    }

    public function delete($id = null)
    {
        if ($id === null) {
            return redirect()->to('/alumnos')->with('error', 'ID de alumno no especificado');
        }

        // Verificar si el alumno tiene cursos asignados
        $cursosAsignados = $this->detalleModel->getCursosByAlumno($id);
        if (!empty($cursosAsignados)) {
            return redirect()->to('/alumnos')->with('error', 'No se puede eliminar el alumno porque tiene cursos asignados');
        }

        // Agregar logging para debug
        log_message('info', "Intentando eliminar alumno con ID: $id");
        
        try {
            if ($this->alumnoModel->delete($id)) {
                log_message('info', "Alumno eliminado exitosamente con ID: $id");
                return redirect()->to('/alumnos')->with('success', 'Alumno eliminado exitosamente');
            } else {
                log_message('error', "Error al eliminar alumno con ID: $id");
                return redirect()->to('/alumnos')->with('error', 'Error al eliminar el alumno');
            }
        } catch (Exception $e) {
            log_message('error', "Excepción al eliminar alumno con ID: $id - " . $e->getMessage());
            return redirect()->to('/alumnos')->with('error', 'Error al eliminar el alumno: ' . $e->getMessage());
        }
    }
}
