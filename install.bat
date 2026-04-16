@echo off
REM FAB-TECHNOLOGY Migration & Seeding Script for Windows
REM Execute this script from the project root directory (using Command Prompt or PowerShell)

echo.
echo ================================
echo 🚀 FAB-TECHNOLOGY Modernization
echo ================================
echo.

REM Check if PHP is available
php -v >nul 2>&1
if %errorlevel% neq 0 (
    echo ❌ Error: PHP is not available. Please check your PHP installation.
    pause
    exit /b 1
)

REM Step 1: Run migrations
echo 1️⃣  Running migrations...
call php artisan migrate --force

if %errorlevel% neq 0 (
    echo ❌ Migration failed. Exiting.
    pause
    exit /b 1
) else (
    echo ✅ Migrations completed successfully!
)

echo.

REM Step 2: Run seeders
echo 2️⃣  Seeding database with default data...
call php artisan db:seed --force

if %errorlevel% neq 0 (
    echo ⚠️  Seeding had issues (this might be OK)
) else (
    echo ✅ Database seeding completed!
)

echo.

REM Step 3: Link storage
echo 3️⃣  Creating storage link...
call php artisan storage:link

echo.

REM Step 4: Clear cache
echo 4️⃣  Clearing application cache...
call php artisan cache:clear
call php artisan config:clear
call php artisan route:clear
call php artisan view:clear

echo.

REM Step 5: Success message
echo ================================
echo ✅ Installation Complete!
echo ================================
echo.
echo 📋 Next steps:
echo   1. Visit: http://localhost/admin/settings
echo   2. Log in with your admin credentials
echo   3. Upload a logo and favicon
echo   4. Configure social links
echo   5. Add sliders for the homepage
echo.
echo 🎨 Design changes applied:
echo   • Color scheme: Green (#18d26e) ^→ Blue (#1976d2) + White
echo   • All dynamic content from database
echo   • Modern Bootstrap 5 admin interface
echo.
echo 📚 Documentation: INTEGRATION_GUIDE.md
echo.
echo Press any key to continue...
pause >nul
