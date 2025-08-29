# 📚 Instrucciones para Subir el Proyecto a GitHub

## 🚀 Pasos para Subir el Proyecto a GitHub

### **1. Preparar el Repositorio Local**

```bash
# Navegar al directorio del proyecto
cd crud-codeigniter4

# Inicializar repositorio Git (si no existe)
git init

# Agregar todos los archivos
git add .

# Hacer el primer commit
git commit -m "🎉 Proyecto inicial: Sistema CRUD de Alumnos y Cursos con CodeIgniter 4"
```

### **2. Crear Repositorio en GitHub**

1. **Ir a GitHub.com** y hacer login
2. **Crear nuevo repositorio**:
   - Nombre: `crud-codeigniter4` o similar
   - Descripción: "Sistema de gestión de alumnos y cursos con CodeIgniter 4"
   - Público o privado según preferencia
   - **NO inicializar** con README, .gitignore o licencia

### **3. Conectar Repositorio Local con GitHub**

```bash
# Agregar el repositorio remoto (reemplazar USERNAME y REPO_NAME)
git remote add origin https://github.com/USERNAME/REPO_NAME.git

# Verificar que se agregó correctamente
git remote -v

# Cambiar a la rama principal (main o master)
git branch -M main

# Subir el código a GitHub
git push -u origin main
```

### **4. Verificar la Subida**

1. **Ir al repositorio en GitHub**
2. **Verificar que todos los archivos estén presentes**:
   - ✅ `app/` - Código de la aplicación
   - ✅ `public/` - Archivos públicos
   - ✅ `system/` - Framework CodeIgniter
   - ✅ `script.sql` - Script de base de datos
   - ✅ `composer.json` - Dependencias
   - ✅ `env` - Variables de entorno

### **5. Configurar GitHub Pages (Opcional)**

Si quieres mostrar la documentación en GitHub Pages:

1. **Ir a Settings** del repositorio
2. **Scroll down a GitHub Pages**
3. **Source**: Seleccionar `main` branch
4. **Folder**: Seleccionar `/docs` (carpeta docs en la raíz)
5. **Save**

## 📁 Estructura del Repositorio

```
crud-codeigniter4/
├── 📁 app/                    # Código de la aplicación
│   ├── 📁 Controllers/        # Controladores MVC
│   ├── 📁 Models/            # Modelos de datos
│   ├── 📁 Views/             # Vistas de la interfaz
│   └── 📁 Config/            # Configuraciones
├── 📁 public/                 # Archivos públicos
│   ├── 📁 docs/              # Documentación
│   └── index.php             # Punto de entrada
├── 📁 system/                 # Framework CodeIgniter 4
├── 📁 writable/               # Archivos temporales
├── 📄 script.sql              # Script de base de datos
├── 📄 composer.json           # Dependencias PHP
├── 📄 env                     # Variables de entorno
└── 📄 README.md               # Documentación principal
```

## 🔧 Archivos Importantes a Verificar

### **Archivos de Configuración**
- ✅ `app/Config/Database.php` - Configuración de base de datos
- ✅ `app/Config/Routes.php` - Rutas de la aplicación
- ✅ `app/Config/App.php` - Configuración general
- ✅ `env` - Variables de entorno

### **Archivos de Código**
- ✅ `app/Controllers/` - Todos los controladores
- ✅ `app/Models/` - Todos los modelos
- ✅ `app/Views/` - Todas las vistas
- ✅ `public/index.php` - Punto de entrada

### **Documentación**
- ✅ `public/docs/README.md` - Documentación completa
- ✅ `public/docs/INSTRUCCIONES_GITHUB.md` - Este archivo
- ✅ `script.sql` - Estructura de base de datos

## 🚨 Consideraciones Importantes

### **Archivos que NO deben subirse**
- ❌ `writable/` - Archivos temporales (agregar a .gitignore)
- ❌ `.env` - Variables de entorno locales
- ❌ `vendor/` - Dependencias de Composer (si existe)

### **Archivos que SÍ deben subirse**
- ✅ `env` - Archivo de ejemplo de variables de entorno
- ✅ `script.sql` - Script de base de datos
- ✅ `composer.json` - Dependencias del proyecto

## 📝 Comandos Git Útiles

```bash
# Ver estado del repositorio
git status

# Ver cambios en archivos
git diff

# Ver historial de commits
git log --oneline

# Crear nueva rama para desarrollo
git checkout -b feature/nueva-funcionalidad

# Cambiar entre ramas
git checkout main

# Actualizar repositorio local
git pull origin main

# Subir cambios
git add .
git commit -m "📝 Descripción del cambio"
git push origin main
```

## 🎯 Checklist de Verificación

Antes de hacer push, verificar:

- [ ] ✅ Todos los archivos están agregados (`git add .`)
- [ ] ✅ Commit inicial realizado
- [ ] ✅ Repositorio remoto configurado
- [ ] ✅ Estructura de carpetas correcta
- [ ] ✅ Archivos de configuración presentes
- [ ] ✅ Documentación incluida
- [ ] ✅ Script de base de datos incluido

## 🔗 Enlaces Útiles

- **GitHub Help**: https://help.github.com/
- **Git Cheat Sheet**: https://education.github.com/git-cheat-sheet-education.pdf
- **CodeIgniter 4**: https://codeigniter4.github.io/
- **Materialize CSS**: https://materializecss.com/

---

**¡Proyecto listo para subir a GitHub! 🚀**
