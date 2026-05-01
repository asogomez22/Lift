<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait HandlesPublicUploads
{
    /**
     * Normaliza rutas para el disco 'public'.
     * Elimina prefijos como '/storage/', 'storage/', etc.
     * Si es URL externa (http/https), devuelve null.
     */
    protected function normalizePublicPath(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        // Si es URL externa, no tocamos
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return null;
        }

        // Quita prefijos típicos
        $path = preg_replace('#^/?storage/#', '', $path); // /storage/... o storage/...
        $path = ltrim($path, '/');

        return $path;
    }

    /**
     * Guarda el nuevo archivo en public disk y, si va bien, borra el antiguo.
     * Devuelve el nuevo path relativo (ej: "clients/xxx.webp").
     *
     * @param UploadedFile $file El archivo a subir
     * @param string $dir Directorio donde guardar (ej: 'clients', 'projects')
     * @param string|null $oldPath Ruta del archivo antiguo a borrar (opcional)
     * @return string Ruta del nuevo archivo guardado
     * @throws \RuntimeException Si no se puede guardar el archivo
     */
    protected function storeAndReplace(
        UploadedFile $file,
        string $dir,
        ?string $oldPath = null
    ): string {
        // 1) Guardar nuevo primero
        $newPath = $file->store($dir, 'public');

        if (!$newPath) {
            throw new \RuntimeException("No se pudo guardar el archivo en {$dir}.");
        }

        // 2) Borrar antiguo después (si procede)
        $old = $this->normalizePublicPath($oldPath);

        if ($old && $old !== $newPath) {
            try {
                if (Storage::disk('public')->exists($old)) {
                    Storage::disk('public')->delete($old);
                }
            } catch (\Throwable $e) {
                // No rompemos la subida si el borrado falla
                Log::warning("No se pudo borrar el archivo antiguo", [
                    'old' => $old,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return $newPath;
    }
}
