# IndelWeb-BranYGio · Módulo Desarrollo Web

**Estudiantes:** Steven René Bran Alas y German Giovanni Vásquez Sigaran

**Carnet:** INDEL-2026  
**Módulo:** Desarrollo Web con VS Code (10%)

---

## Cómo ejecutar los ejercicios

### Ejercicios 1.1 – 1.5 (frontend)
1. Abrí la carpeta del ejercicio en VS Code.
2. Click derecho sobre `index.html` → "Open with Live Server".
3. Se abre en `http://127.0.0.1:5500`.

### Ejercicios 2.1 – 2.5 (backend)
1. Iniciá XAMPP (Apache + MySQL en puerto 3307).
2. Las carpetas ya están en `htdocs/IndelWeb-BranYGio/`.
3. Abrí phpMyAdmin e importá el archivo SQL correspondiente (ver abajo).
4. Visitá `http://localhost:81/IndelWeb-BranYGio/ej-2.x/`.

---

## Base de datos

Todos los ejercicios backend usan la misma base: `indel_inventario`.

| Ejercicio | Archivo SQL |
|-----------|-------------|
| ej-2.2 | `ej-2.2/esquema.sql` |
| ej-2.3 | `ej-2.3/usuarios.sql` |
| ej-2.5 | `ej-2.5/esquema.sql` (incluye todo) |

Para restaurar desde cero: se importá `ej-2.5/esquema.sql` en phpMyAdmin — ese ya tiene todas las tablas y datos de ejemplo.

---

## Qué hace cada carpeta

| Carpeta | Contenido |
|---------|-----------|
| `ej-1.1` | Setup VS Code + Hola mundo con Live Server |
| `ej-1.2` | Portafolio HTML5 semántico (3 páginas) |
| `ej-1.3` | Portafolio con CSS moderno, Grid, Flexbox |
| `ej-1.4` | Calculadora de notas con JavaScript vanilla |
| `ej-1.5` | Buscador de Pokémon con Fetch API |
| `ej-2.1` | Formulario de contacto con PHP |
| `ej-2.2` | CRUD de productos con PHP + MySQL + PDO |
| `ej-2.3` | Sistema de login con sesiones y password_hash |
| `ej-2.4` | Refactor del CRUD en capas (MVC) |
| `ej-2.5` | Proyecto integrador: sistema de apuntes completo |
| `images` | Capturas y GIFs de evidencia por ejercicio |

## Video de demo — Ej 2.5

Ver `images/' para la evidencia

videos de la demo del proyecto y gif: https://drive.google.com/drive/folders/15H5-g-TvdH4a5AiyoCY0Mv34SMKFm93H?usp=drive_link
