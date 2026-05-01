#!/bin/bash
# Diagnóstico de Vite en Producción
# Ejecuta esto en el servidor de producción

echo "=== DIAGNÓSTICO VITE PRODUCCIÓN ==="
echo ""

echo "1. Verificando archivo hot:"
if [ -f public/hot ]; then
    echo "❌ ERROR: public/hot existe (debe ser eliminado)"
    cat public/hot
else
    echo "✅ OK: public/hot no existe"
fi
echo ""

echo "2. Verificando archivos build:"
ls -lh public/build/
echo ""

echo "3. Verificando assets compilados:"
ls -lh public/build/assets/
echo ""

echo "4. Verificando APP_ENV en .env:"
grep "APP_ENV" .env
echo ""

echo "5. Verificando APP_DEBUG en .env:"
grep "APP_DEBUG" .env
echo ""

echo "6. Limpiando cachés:"
php artisan config:clear
php artisan cache:clear
php artisan view:clear
echo "✅ Cachés limpiados"
echo ""

echo "7. Re-optimizando para producción:"
php artisan config:cache
echo "✅ Config cacheada"
echo ""

echo "=== FIN DIAGNÓSTICO ==="
echo ""
echo "Si APP_ENV no es 'production', ejecuta:"
echo "  sed -i 's/APP_ENV=.*/APP_ENV=production/' .env"
echo "  sed -i 's/APP_DEBUG=.*/APP_DEBUG=false/' .env"
echo "  php artisan config:clear && php artisan config:cache"
