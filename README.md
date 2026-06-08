**Repair Shop**

Proyecto Laravel para gestionar reparaciones y su historial de auditoría.

**Requisitos:**
- **PHP:** ^8.2 (ver [composer.json](composer.json))
- **Composer**
- **Node.js & npm**
- Base de datos compatible con Laravel (MySQL, PostgreSQL, SQLite)

**Instalación local (rápida)**

1. Clonar el repositorio y entrar en la carpeta del proyecto:

```bash
git clone https://github.com/matiascelentano/tp2-repair-shop repair-shop
cd repair-shop
```

2. Instalar dependencias PHP y JS:

```bash
composer install
npm install
```

3. Copiar el archivo de entorno y generar la clave de aplicación:

```bash
cp .env.example .env    # en Windows: copy .env.example .env
php artisan key:generate
```

4. Configurar la conexión de base de datos en el archivo `.env` (variables `DB_*`).

5. Ejecutar migraciones y seeders:

```bash
php artisan migrate --seed
```

6. Compilar los assets y arrancar el servidor de desarrollo:

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

**Cómo iniciar sesión**

- Asegúrate de haber ejecutado las migraciones y seeders (`php artisan migrate --seed`).
- Arranca la aplicación (`php artisan serve`) y abre `http://127.0.0.1:8000/login` en el navegador. La ruta principal redirige a `repairs.index` y requiere autenticación.
- Credenciales de prueba incluidas en el seeder:
	- **Usuario 1:** `test@example.com` / `123456`
	- **Usuario 2:** `second@example.com` / `123456`
- No hay registro público en la app: para crear usuarios adicionales usa `DatabaseSeeder` ([database/seeders/DatabaseSeeder.php](database/seeders/DatabaseSeeder.php)) o crea uno con Tinker:

```bash
php artisan tinker
User::factory()->create(['name'=>'Nuevo','email'=>'nuevo@example.com','password'=>bcrypt('secret')]);
```


**Funcionalidades principales**
- **Autenticación:** inicio de sesión y gestión básica de usuarios (ver [resources/views/login.blade.php](resources/views/login.blade.php)).
- **CRUD de reparaciones:** crear, listar, editar y eliminar reparaciones (vistas en [resources/views/*.blade.php](resources/views)).
- **Historial de auditoría:** registros de cambios en reparaciones guardados en el modelo `RepairAudit` (ver [app/Models/RepairAudit.php](app/Models/RepairAudit.php)).
- **Seeders y factories:** datos de ejemplo para desarrollo en [database/seeders](database/seeders) y [database/factories](database/factories).

**Rutas y controladores relevantes**
- Rutas web: [routes/web.php](routes/web.php)
- Controlador principal: [app/Http/Controllers/RepairController.php](app/Http/Controllers/RepairController.php)
- Modelos: [app/Models/Repair.php](app/Models/Repair.php), [app/Models/User.php](app/Models/User.php)

**Notas de despliegue**
- Ajustar `.env` con credenciales de producción y `APP_ENV=production`.
- Ejecutar `php artisan migrate --force` al desplegar.
- Compilar assets con `npm run build`.

---
