#!/bin/bash
# FAB-TECHNOLOGY Migration & Seeding Script
# Execute this script from the project root directory

echo "================================"
echo "🚀 FAB-TECHNOLOGY Modernization"
echo "================================"
echo ""

# Step 1: Run migrations
echo "1️⃣  Running migrations..."
php artisan migrate --force

if [ $? -eq 0 ]; then
    echo "✅ Migrations completed successfully!"
else
    echo "❌ Migration failed. Exiting."
    exit 1
fi

echo ""

# Step 2: Run seeders
echo "2️⃣  Seeding database with default data..."
php artisan db:seed --force

if [ $? -eq 0 ]; then
    echo "✅ Database seeding completed!"
else
    echo "⚠️  Seeding had issues (this might be OK)"
fi

echo ""

# Step 3: Link storage
echo "3️⃣  Creating storage link..."
php artisan storage:link

echo ""

# Step 4: Clear cache
echo "4️⃣  Clearing application cache..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo ""

# Step 5: Success message
echo "================================"
echo "✅ Installation Complete!"
echo "================================"
echo ""
echo "📋 Next steps:"
echo "  1. Visit: http://localhost/admin/settings"
echo "  2. Log in with your admin credentials"
echo "  3. Upload a logo and favicon"
echo "  4. Configure social links"
echo "  5. Add sliders for the homepage"
echo ""
echo "🎨 Design changes applied:"
echo "  • Color scheme: Green (#18d26e) → Blue (#1976d2) + White"
echo "  • All dynamic content from database"
echo "  • Modern Bootstrap 5 admin interface"
echo ""
echo "📚 Documentation: INTEGRATION_GUIDE.md"
echo ""
