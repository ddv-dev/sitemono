#!/bin/bash

# show-structure.sh - Скрипт для отображения структуры проекта

echo "========================================="
echo "СТРУКТУРА ПРОЕКТА SITEMONO"
echo "========================================="
echo ""

# 1. Основные директории
echo "📁 КОРНЕВЫЕ ДИРЕКТОРИИ:"
echo "-----------------------------------------"
ls -la | grep "^d" | awk '{print "   📂 " $NF}'
echo ""

# 2. Маршруты
echo "📋 МАРШРУТЫ (routes/web.php):"
echo "-----------------------------------------"
if [ -f "routes/web.php" ]; then
    grep -E "Route::(get|post|put|delete|resource|any|match)" routes/web.php | \
    sed 's/^/   /' | \
    head -20
else
    echo "   ❌ Файл routes/web.php не найден"
fi
echo ""

# 3. Контроллеры
echo "🎮 КОНТРОЛЛЕРЫ:"
echo "-----------------------------------------"
if [ -d "app/Http/Controllers" ]; then
    ls -la app/Http/Controllers/ | grep ".php$" | awk '{print "   🎯 " $NF}'
else
    echo "   ❌ Директория app/Http/Controllers не найдена"
fi
echo ""

# 4. Модели
echo "📊 МОДЕЛИ:"
echo "-----------------------------------------"
if [ -d "app/Models" ]; then
    ls -la app/Models/ | grep ".php$" | awk '{print "   📊 " $NF}'
else
    echo "   ❌ Директория app/Models не найдена"
fi
echo ""

# 5. Миграции
echo "🗄️ МИГРАЦИИ (последние 10):"
echo "-----------------------------------------"
if [ -d "database/migrations" ]; then
    ls -lt database/migrations/ | grep ".php$" | head -10 | awk '{print "   🗄️  " $NF}'
else
    echo "   ❌ Директория database/migrations не найдена"
fi
echo ""

# 6. Сидеры
echo "🌱 СИДЕРЫ:"
echo "-----------------------------------------"
if [ -d "database/seeders" ]; then
    ls -la database/seeders/ | grep ".php$" | awk '{print "   🌱 " $NF}'
else
    echo "   ❌ Директория database/seeders не найдена"
fi
echo ""

# 7. Ресурсы Filament
echo "⚡ РЕСУРСЫ FILAMENT:"
echo "-----------------------------------------"
if [ -d "app/Filament/Resources" ]; then
    ls -la app/Filament/Resources/ | grep ".php$" | awk '{print "   ⚡ " $NF}'
else
    echo "   ❌ Директория app/Filament/Resources не найдена"
fi
echo ""

# 8. Blade шаблоны
echo "📄 BLADE ШАБЛОНЫ:"
echo "-----------------------------------------"
if [ -d "resources/views" ]; then
    echo "   📁 resources/views/"
    find resources/views -name "*.blade.php" -type f | head -15 | while read file; do
        echo "      📄 $file"
    done
else
    echo "   ❌ Директория resources/views не найдена"
fi
echo ""

# 9. Композиция проекта (composer.json)
echo "📦 ЗАВИСИМОСТИ (composer.json):"
echo "-----------------------------------------"
if [ -f "composer.json" ]; then
    grep -E "\"(laravel|filament|livewire|spatie)\"" composer.json | head -10 | sed 's/^/   /'
else
    echo "   ❌ Файл composer.json не найден"
fi
echo ""

# 10. Файлы конфигурации
echo "⚙️  КОНФИГУРАЦИЯ:"
echo "-----------------------------------------"
if [ -f ".env" ]; then
    echo "   ✅ .env файл существует"
    grep -E "^APP_NAME|^APP_ENV|^APP_DEBUG|^DB_" .env | sed 's/^/   /'
else
    echo "   ❌ .env файл не найден"
fi
echo ""

# 11. Проверка наличия ключевых файлов
echo "🔍 ПРОВЕРКА КЛЮЧЕВЫХ ФАЙЛОВ:"
echo "-----------------------------------------"
files_to_check=(
    "routes/web.php"
    "app/Http/Controllers/CalculatorController.php"
    "app/Models/ConcreteType.php"
    "app/Models/ConcreteGrade.php"
    "app/Models/ConcretePrice.php"
    "app/Models/AdditionalService.php"
    "app/Filament/Resources/ConcreteTypeResource.php"
    "app/Filament/Resources/ConcreteGradeResource.php"
    "app/Filament/Resources/ConcretePriceResource.php"
    "app/Filament/Resources/AdditionalServiceResource.php"
    "resources/views/welcome.blade.php"
)

for file in "${files_to_check[@]}"; do
    if [ -f "$file" ]; then
        echo "   ✅ $file"
    else
        echo "   ❌ $file"
    fi
done
echo ""

# 12. Таблицы в базе данных
echo "🗃️ ТАБЛИЦЫ В БАЗЕ ДАННЫХ:"
echo "-----------------------------------------"
if [ -f ".env" ]; then
    DB_NAME=$(grep DB_DATABASE .env | cut -d '=' -f2)
    DB_USER=$(grep DB_USERNAME .env | cut -d '=' -f2)
    DB_PASS=$(grep DB_PASSWORD .env | cut -d '=' -f2)
    
    if [ ! -z "$DB_NAME" ] && [ ! -z "$DB_USER" ]; then
        if [ -z "$DB_PASS" ]; then
            mysql -u "$DB_USER" -e "USE $DB_NAME; SHOW TABLES;" 2>/dev/null | grep -v "Tables_in" | sed 's/^/   📊 /'
        else
            mysql -u "$DB_USER" -p"$DB_PASS" -e "USE $DB_NAME; SHOW TABLES;" 2>/dev/null | grep -v "Tables_in" | sed 's/^/   📊 /'
        fi
    else
        echo "   ⚠️ Не удалось получить данные для подключения к БД"
    fi
else
    echo "   ❌ .env файл не найден"
fi
echo ""

echo "========================================="
echo "✅ СТРУКТУРА ПРОЕКТА ПОКАЗАНА"
echo "========================================="