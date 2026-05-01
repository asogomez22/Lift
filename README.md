# Lift

Aplicacion Laravel preparada para desplegarse en Dokploy con Docker.

## Despliegue En Dokploy

Dokploy puede construir directamente el repositorio usando el `Dockerfile` de este proyecto.

Variables minimas:

- `APP_NAME=Lift`
- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL=https://tu-dominio`
- `APP_KEY=base64:...`
- `DB_CONNECTION=sqlite`
- `DB_DATABASE=/var/www/html/database/database.sqlite`
- `FILESYSTEM_DISK=public`
- `SESSION_DRIVER=file`
- `CACHE_STORE=file`
- `QUEUE_CONNECTION=sync`

Variable opcional:

- `RUN_MIGRATIONS=true` para ejecutar `php artisan migrate --force` al arrancar.

Puerto expuesto:

- `80`

Volumenes recomendados en Dokploy:

- `/var/www/html/storage`
- `/var/www/html/bootstrap/cache`
- `/var/www/html/database`

## Que Hace El Contenedor

- Instala dependencias PHP sin `dev`
- Compila assets de Vite en build
- Sirve Laravel con Apache apuntando a `public/`
- Recrea el symlink de `storage`
- Limpia y regenera caches de Laravel al arrancar

## Preparacion Recomendada

Genera el `APP_KEY` antes de configurar el despliegue:

```bash
php artisan key:generate --show
```

Si quieres que el contenedor cree o actualice el esquema al arrancar, activa `RUN_MIGRATIONS=true`.

## Desarrollo Local

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run dev
php artisan serve
```
