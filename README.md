# Sistema de Gestión de Inventario

Este proyecto es un sistema web desarrollado en PHP para la gestión de inventario de productos en una empresa. Permite a los empleados administrar productos de forma eficiente, incluyendo funcionalidades como agregar, editar, eliminar, buscar, filtrar, y visualizar productos. Además, cuenta con un sistema de autenticación de usuarios con roles diferenciados.

## Características Principales

1. **Gestión de Productos**:

   - Agregar nuevos productos con nombre, descripción, categoría y cantidad.
   - Editar y eliminar productos existentes.
   - Visualizar detalles de los productos.

2. **Búsqueda y Filtrado**:

   - Buscar productos por nombre.
   - Filtrar productos por categoría.

3. **Gestión de Usuarios**:

   - Registro de nuevos usuarios (solo para administradores).
   - Inicio de sesión con control de acceso basado en roles.
   - Cierre de sesión seguro.

4. **Interfaz Amigable**:
   - Diseño responsivo para una experiencia óptima en dispositivos móviles y de escritorio.
   - Navegación intuitiva para todas las funcionalidades.

## Requisitos del Sistema

- Servidor web Apache (se recomienda usar XAMPP).
- PHP 7.4 o superior.
- Base de datos MySQL.

## Instalación

1. Clona este repositorio en tu servidor local:
   ```bash
   git clone https://github.com/tu-usuario/nombre-repositorio.git
   ```

### **Importa la base de datos**

1. **Abre phpMyAdmin**.
2. **Crea una nueva base de datos** llamada `inventario_db`.
3. **Importa el archivo** `inventario_db.sql` ubicado en el directorio principal del proyecto.

---

### **Configura la conexión a la base de datos**

Edita el archivo `bd/config.php` con los datos de tu servidor MySQL:

```php
<?php
$host = "localhost";
$dbname = "inventario_db";
$username = "tu_usuario";
$password = "tu_contraseña";
?>
```

### **Inicia el servidor local con XAMPP**

1. Asegúrate de que **Apache** y **MySQL** estén activos.
2. Accede al sistema en tu navegador:

---

### **Uso**

#### **Inicio de Sesión**

- Accede con tus credenciales para ingresar al sistema.

#### **Gestión de Productos**

- Usa el menú para:
- Agregar productos.
- Editar productos.
- Eliminar productos.
- Visualizar productos.

#### **Búsqueda y Filtrado**

- Utiliza las opciones para:
- Buscar productos por nombre.
- Filtrar productos por categoría.

#### **Cierre de Sesión**

- Haz clic en **"Cerrar Sesión"** para salir del sistema.

- **Bryan Cordero** - Desarrollo y documentación.
