# Lift

Aplicacion Laravel preparada para CI/CD con GitHub Actions y despliegue Docker.

## Que Incluye Para La AEA2

- Proyecto Laravel con frontend compilado mediante Vite.
- `Dockerfile` multi-stage: instala dependencias PHP, compila assets y sirve Laravel con Apache.
- Workflow `.github/workflows/ci-cd.yml`:
  - construye la imagen Docker en cada push o pull request contra `main`;
  - arranca el contenedor y comprueba `/up`;
  - publica la imagen en GitHub Container Registry en push a `main`;
  - puede desplegar automaticamente a un VPS si se activan los secrets.

Imagen generada:

```text
ghcr.io/asogomez22/lift:latest
```

## CI/CD Con GitHub Actions

El workflow se ejecuta automaticamente al hacer `push` a `main`, al abrir una pull request o manualmente desde `Actions > CI/CD Docker > Run workflow`.

Pasos que realiza:

1. Descarga el repositorio.
2. Construye la imagen Docker de produccion.
3. Levanta un contenedor temporal con SQLite.
4. Verifica que Laravel responde correctamente en `/up`.
5. Publica `latest` y el tag corto del commit en `ghcr.io`.

Para que la publicacion funcione, en el repositorio de GitHub debe estar permitido escribir paquetes con `GITHUB_TOKEN`:

```text
Settings > Actions > General > Workflow permissions > Read and write permissions
```

## Despliegue En VPS Con GitHub Actions

El despliegue a VPS es opcional y se activa con una variable:

```text
Settings > Secrets and variables > Actions > Variables
DEPLOY_VPS=true
```

Secrets necesarios:

- `VPS_HOST`: IP o dominio del servidor.
- `VPS_PORT`: puerto SSH del servidor si no usas `22` por defecto.
- `VPS_USER`: usuario SSH con permisos para ejecutar Docker.
- `VPS_SSH_KEY`: clave privada SSH.
- `APP_URL`: URL publica, por ejemplo `https://lift.tu-dominio.com`.
- `APP_KEY`: clave Laravel estable, generada con `php artisan key:generate --show`.
- `DEPLOY_PORT`: puerto del VPS donde quedara publicada la app. En este servidor conviene `4321`.
- `GHCR_USERNAME`: usuario de GitHub con acceso al paquete en `ghcr.io` si la imagen es privada.
- `GHCR_TOKEN`: token de GitHub con permiso `read:packages` si la imagen es privada.

El servidor debe tener Docker instalado. El workflow descarga la ultima imagen y recrea el contenedor `lift` conservando tres volumenes:

- `lift_storage`
- `lift_database`
- `lift_cache`

Si el paquete de `ghcr.io` es publico, `GHCR_USERNAME` y `GHCR_TOKEN` no son necesarios.
Si el paquete es privado, el workflow iniciara sesion en `ghcr.io` dentro del VPS antes de hacer `docker pull`.

## Lo Que Te Falta Configurar En GitHub

1. Sube el repo a GitHub y trabaja sobre la rama `main`.
2. En `Settings > Actions > General`, activa `Read and write permissions` para `GITHUB_TOKEN`.
3. En `Settings > Secrets and variables > Actions > Variables`, crea `DEPLOY_VPS=true`.
4. En `Settings > Secrets and variables > Actions > Secrets`, crea al menos:
   - `VPS_HOST`
   - `VPS_PORT`
   - `VPS_USER`
   - `VPS_SSH_KEY`
   - `APP_URL`
   - `APP_KEY`
   - `DEPLOY_PORT`
5. Si la imagen de `ghcr.io` va a ser privada, añade tambien:
   - `GHCR_USERNAME`
   - `GHCR_TOKEN`

## Lo Que Te Falta Preparar En El VPS

1. Instala Docker.
2. Abre el puerto `80` o pon un proxy inverso delante del contenedor.
3. Asegurate de que el usuario SSH puede ejecutar `docker`.
4. Si usas imagen privada en `ghcr.io`, crea un token con `read:packages` y guardalo en los secrets del repo.

Cuando hagas `push` a `main`, GitHub Actions construira la imagen, la probara, la subira a `ghcr.io` y despues actualizara el contenedor del servidor.

## Despliegue En Dokploy

Variables minimas:

- `APP_NAME=Lift`
- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL=https://tu-dominio`
- `APP_KEY=base64:...` recomendado para mantener sesiones/cookies estables entre despliegues
- `DB_CONNECTION=sqlite`
- `DB_DATABASE=/var/www/html/database/database.sqlite`
- `FILESYSTEM_DISK=public`
- `SESSION_DRIVER=file`
- `CACHE_STORE=file`
- `QUEUE_CONNECTION=sync`

Variables opcionales:

- `RUN_MIGRATIONS=true` para ejecutar `php artisan migrate --force` al arrancar con bases no SQLite.

Con SQLite, el contenedor ejecuta migraciones al arrancar para evitar una base vacia sin tablas.
Si no se define `APP_KEY`, el contenedor genera una clave en `.env` para evitar errores 500 por clave de aplicacion ausente.

Puerto expuesto:

- `80`

Volumenes recomendados en Dokploy:

- `/var/www/html/storage`
- `/var/www/html/bootstrap/cache`
- `/var/www/html/database`

Si montas un volumen vacio en `/var/www/html/database`, el contenedor restaurara automaticamente el `database.sqlite` incluido en el proyecto en el primer arranque.

## Que Hace El Contenedor

- Instala dependencias PHP sin `dev`
- Compila assets de Vite en build
- Sirve Laravel con Apache apuntando a `public/`
- Recrea el symlink de `storage`
- Limpia y regenera caches de Laravel al arrancar
- Omite la cache de rutas si Laravel detecta rutas con closures

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

## Guion Corto Para El Video

1. Mostrar la web funcionando en produccion.
2. Enseñar el repositorio y explicar que es un proyecto Laravel propio.
3. Abrir el `Dockerfile` y explicar que empaqueta Laravel, dependencias PHP, assets Vite y Apache.
4. Abrir `Actions` en GitHub y mostrar el workflow ejecutado correctamente.
5. Explicar que el workflow construye la imagen, hace smoke test y publica en GHCR.
6. Si usas VPS, mostrar el contenedor `lift` corriendo con `docker ps` y la URL publica.
