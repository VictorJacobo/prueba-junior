
# 🛍️ Prueba Técnica -Desarrollador Junior


## 📋 Requisitos del sistema

| Requisito     | Versión mínima recomendada |
|---------------|----------------------------|
| PHP           | 8.2+                       |
| Composer      | 2.8.8                      |
| Laravel       | 12.20                      |
| Node.js       | 18.x                       |
| NPM           | 9.x                        |
| Navegador     | Chrome, Firefox, Edge      |

> ⚠️ Laravel 12 requiere **PHP 8.2 o superior**.

---

## ⚙️ Instalación y ejecución

Sigue estos pasos para ejecutar el proyecto localmente:

### 1. Clonar el repositorio
```bash
git clone https://github.com/tu-usuario/prueba-junior.git
cd prueba-junior
```

Cambiar a la rama de la demo
```bash
git switch victor-jacobo
```
### 2. Instalar dependencias de PHP
```bash
composer install
```

### 3. Instalar dependencias de frontend (Tailwind, Vite)
```bash
npm install
```
### 4. Copiar y configurar el archivo `.env`
```bash
cp .env.example .env
```
Edita `.env` y configura tu base de datos:


```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=prueba_tecnica
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_clave
```
### 5. Generar la clave de la aplicación
```bash
php artisan key:generate
```

### 6. Migrar la base de datos con datos de ejemplo
```bash
php artisan migrate --seed
```

### 7. Ejecutar Vite en modo desarrollo
```bash
npm run dev
```

### 8. Iniciar el servidor de desarrollo
En otra terminal inicial el modo de desarrollo
```bash
php artisan serve
```
### 9. Iniciar sesión
Por defecto el servidor se crea en http://127.0.0.1:8000/
Puedes iniciar sesión con las credenciales  admin@example.com y la contraseña **password**

# 🧠 Decisiones técnicas

## Pantalla de inicio
- Implementé el formulario de **login directamente en la pantalla principal** al considerar que no hay contenido más relevante para mostrar inicialmente.
- En el dashboard, para evitar que se viera vacío:
  - Muestro métricas de **cantidad de productos y categorías** creadas
  - Incluí **gráficos interactivos** usando Chart.js para una mejor visualización de datos

## Flujo de trabajo
- **Validación de dependencias**: 
  - El sistema impide agregar productos si no existen categorías previamente creadas
  - La interfaz incluye mensajes claros y redirección automática para crear categorías cuando es necesario
- **Flexibilidad en medios**:
  - Tanto productos como categorías pueden crearse inicialmente sin imágenes
  - Las imágenes pueden añadirse posteriormente mediante edición

# 📝 Notas
- **Tiempo de desarrollo**: 15 horas
- **Dificultades técnicas**: 
  - Mayor experiencia con React en frontend
  - Adaptación al modelo de Blade en Laravel (usado previamente solo para APIs)

# ✨ Features adicionales
1. Visualización de datos con **Chart.js**
2. Funcionalidad para **cambio de contraseña**
3. **Exportación a Excel** tanto de productos como categorías

# 📸 Capturas de pantalla
- Login
![Login](/docs/login.png)

- Registro
![Registro](/docs/registro.png)

- Dashboard
![Dashboard](/docs/dashboard.png)

- Perfil
![Perfil](/docs/perfil.png)

- Productos
![Productos](/docs/productos.png)

- Categorias
![Categorías](/docs/categorias.png)

Video de la demo técnica https://drive.google.com/file/d/1MH2XQniORVeAvMIQhn6YrGVorkwPEQtM/view?usp=sharing
