# Contexto Técnico y Documentación: Módulo Tiquete Metro (Sapiencia)

> **Propósito de este documento:**  
> Servir de guía completa de traspaso (handoff) para integrar el módulo de **Tiquete Metro** en el proyecto principal de **Sapiencia**, trabajando en una rama aislada (`feature/tiquete-metro`) sin afectar la rama principal (`main` o `develop`).

---

## 1. Estrategia de Trabajo en Git (Para no afectar el proyecto original)

Cuando recibas el proyecto completo de Sapiencia:

```bash
# 1. Asegurarte de estar en la rama principal actualizada
git checkout main
git pull origin main

# 2. Crear y cambiarte a tu rama de trabajo personal
git checkout -b Luis-Pasante

# 3. Trabajar y hacer pruebas siempre sobre esta rama
# Cuando todo esté verificado por el jefe, se hace Merge o Pull Request a main.
```

---

## 2. Resumen de la Arquitectura Implementada

El módulo fue concebido para dos perfiles independientes (**Estudiante** y **Administrador**) sin vistas intermediarias innecesarias:

```
[ POSTULANTE / ESTUDIANTE ]
     │
     ▼
/login-metro  ──(Ingresa documento)──►  /formulario-metro (Formulario de Postulación)
                                        - Precarga automática de cédula
                                        - Validación por pasos
                                        - Selector dinámico (Municipio > Comuna > Barrio)
                                        - Carga de soportes / documentos

[ ANALISTA / ADMINISTRADOR ]
     │
     ▼
/admin/login-metro  ──(Cédula autorizada)──►  /admin/solicitudes-metro (Bandeja Handsontable)
                                              - Grilla tipo Excel en tiempo real
                                              - Filtros, estados y ordenamiento
                                              - Botón "Validar" por cada estudiante
                                              │
                                              ▼
                             /admin/validar-solicitud/{id}
                             - Pestaña 1: Auditoría de datos y dictamen (Aprobar/Rechazar con SweetAlert2)
                             - Pestaña 2: Visualización de soportes adjuntos
                             - Botón de edición en vivo vía iframe/ventana independiente (/admin/ver-formulario/{id}?edit=true)
```

> **Nota clave de negocio acordada con el jefe:**  
> Se eliminó por completo la vista de bienvenida (`/inicio-metro`). Ningún perfil pasa por un "dashboard" genérico; cada quien entra directo a su herramienta de trabajo.

---

## 3. Mapa de Archivos del Módulo

Todos estos archivos componen el módulo y están listos para ser incorporados al proyecto de Sapiencia:

### 3.1. Rutas
- **`routes/formulariometro/webformulariometro.php`**: Contiene todas las rutas con nombres (`metro.*` y `admin.metro.*`). Se incluye en el `routes/web.php` principal mediante `require __DIR__.'/formulariometro/webformulariometro.php';`.

### 3.2. Controladores
- **`app/Http/Controllers/formulariometro/TiqueteMetroController.php`**:
  - `loginView()` / `loginPost()`: Autenticación del estudiante y redirección a `metro.create`.
  - `create()` / `store()`: Carga de catálogos y persistencia del formulario del estudiante.
  - `obtenerComunas()`, `obtenerBarrios()`: Endpoints AJAX para selects encadenados.
- **`app/Http/Controllers/formulariometro/AdminMetroController.php`**:
  - `loginView()` / `loginPost()`: Validación de administradores (`CEDULAS_ADMIN = ['1001663829']`) y redirección a `admin.metro.solicitudes`.
  - `logout()`: Cierre de sesión de administrador.
  - `index()`: Vista principal de Handsontable.
  - `data()`: Endpoint JSON que alimenta la grilla de Handsontable.
  - `validar($id)`: Vista de auditoría dividida en datos y adjuntos.
  - `guardarDecision($id)`: Dictamen del analista (Aprobado, Rechazado, Inconsistencias) con notas.
  - `verFormularioEstudiante($id)`: Renderiza el formulario en modo administrador para edición o revisión.
  - `guardarEdicionAdmin($id)`: Guarda cambios aplicados por el administrador con SweetAlert2 y recarga del iframe.

### 3.3. Modelos Eloquent
Ubicados en `app/Models/formulariometro/`:
- **Principal:** `MetroDatosPersonalesActual.php` (representa la postulación del estudiante).
- **Catálogos / Tablas maestras:**
  - `Barrio.php`
  - `Comuna.php`
  - `Discapacidad.php`
  - `Estrato.php`
  - `Fondo.php`
  - `Genero.php`
  - `Grado.php`
  - `MotivoDiligenciarFormulario.php`
  - `Municipio.php`
  - `NivelAcademico.php`
  - `Orientacion.php`
  - `Sino.php`
  - `Sisben.php`
  - `TipoDiscapacidad.php`
  - `TipoDocumento.php`
  - `TipoVia.php`

### 3.4. Vistas (Blade)
Ubicadas en `resources/views/formulariometro/`:
- **`login.blade.php`**: Login limpio para estudiantes.
- **`formulario.blade.php`**: Formulario completo de inscripción.
- **`partials/sidebar.blade.php`**: Menú lateral (Formularios y Gestión Administrativa, sin botón de "Inicio").
- **`admin/login.blade.php`**: Login oscuro exclusivo para administradores, limpio y sin sidebar.
- **`admin/solicitudes.blade.php`**: Bandeja interactiva Handsontable.
- **`admin/validar.blade.php`**: Interfaz de dictamen del analista con pestañas, visor de adjuntos y modal de edición.

---

## 4. Base de Datos

Se generó el dump completo con toda la estructura y datos de catálogos y pruebas en:
- **`tiquete_metro_backup.sql`** *(ubicado en la raíz del proyecto)*.

### Tablas clave:
- **`metro_datos_personales_actual`**: Datos del postulante, estado (`PENDIENTE`, `APROBADO`, `RECHAZADO`), notas de auditoría, adjuntos.
- **`t1_*`**: Tablas maestras (`t1_municipio`, `t1_comuna`, `t1_barrio`, etc.).

---

## 5. Prompt Listo para Iniciar la Nueva Conversación en el Proyecto Real

Cuando abras la nueva pestaña en Antigravity con el proyecto completo de Sapiencia, copia y pega el siguiente mensaje para que el asistente tenga el 100% de la información:

```markdown
Hola. Vamos a integrar y continuar el desarrollo del módulo "Tiquete Metro" en este repositorio.

Reglas de trabajo en Git:
- Estamos trabajando en la rama `Luis-Pasante` para no alterar la rama principal hasta validar con el jefe.
- No hagas `git commit` ni `git push` automáticamente; siempre espera a que yo pruebe los cambios y te dé la confirmación.

Resumen del módulo ya desarrollado:
1. Perfiles y Logins Separados:
   - Estudiante (/login-metro): Login limpio sin sidebar que lleva directo a /formulario-metro.
   - Administrador (/admin/login-metro): Login exclusivo sin sidebar para cédulas autorizadas (ej. 1001663829) que lleva directo a la bandeja Handsontable (/admin/solicitudes-metro).
   - No existe vista de bienvenida (/inicio-metro); ambos perfiles van directo a su respectiva herramienta.
2. Bandeja de Auditoría:
   - Implementada con Handsontable en /admin/solicitudes-metro.
   - Cuenta con auditoría y dictamen de adjuntos en /admin/validar-solicitud/{id}.
   - Permite edición administrativa del formulario del estudiante mediante iframe sincronizado.
3. Rutas y Controladores:
   - Se encuentran modularizados bajo routes/formulariometro/webformulariometro.php, app/Http/Controllers/formulariometro/ y app/Models/formulariometro/.

Por favor confirma que comprendes este contexto para proceder con los siguientes ajustes que indique mi jefe.
```
