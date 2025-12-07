#!/bin/bash

# Super Admin Panel - Quick Setup Script
# This script automates the setup of the Super Admin Panel

echo "========================================="
echo "   Super Admin Panel - Quick Setup"
echo "========================================="
echo ""

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Project directory
PROJECT_DIR=~/Desktop/Matjarak/matjarak-backend

echo -e "${YELLOW}► Navigating to project directory...${NC}"
cd "$PROJECT_DIR" || { echo -e "${RED}✗ Error: Project directory not found!${NC}"; exit 1; }
echo -e "${GREEN}✓ Done${NC}"
echo ""

# Step 1: Run migration
echo -e "${YELLOW}► Running migration to add channel_id to admins table...${NC}"
php artisan migrate --path=database/migrations/2024_12_07_000001_add_channel_id_to_admins_table.php --force
if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Migration completed successfully${NC}"
else
    echo -e "${RED}✗ Migration failed (column might already exist)${NC}"
fi
echo ""

# Step 2: Set existing admin as super admin
echo -e "${YELLOW}► Setting existing admin as Super Admin...${NC}"
mysql -u root -p12345678 matjarak_db <<EOF
UPDATE admins SET channel_id = NULL WHERE email = 'admin@matjarak.test';
EOF

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Admin user updated successfully${NC}"
else
    echo -e "${RED}✗ Failed to update admin user${NC}"
fi
echo ""

# Step 3: Clear all caches
echo -e "${YELLOW}► Clearing application caches...${NC}"
php artisan cache:clear > /dev/null 2>&1
php artisan config:clear > /dev/null 2>&1
php artisan route:clear > /dev/null 2>&1
php artisan view:clear > /dev/null 2>&1
echo -e "${GREEN}✓ Caches cleared${NC}"
echo ""

# Step 4: Dump autoload
echo -e "${YELLOW}► Updating Composer autoload...${NC}"
composer dump-autoload > /dev/null 2>&1
echo -e "${GREEN}✓ Autoload updated${NC}"
echo ""

# Step 5: Verify setup
echo -e "${YELLOW}► Verifying setup...${NC}"
echo ""

# Check if migration ran
mysql -u root -p12345678 matjarak_db -e "DESCRIBE admins;" 2>/dev/null | grep channel_id > /dev/null
if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ channel_id column exists in admins table${NC}"
else
    echo -e "${RED}✗ channel_id column NOT found in admins table${NC}"
fi

# Check if super admin is set
SUPER_ADMIN_COUNT=$(mysql -u root -p12345678 matjarak_db -N -e "SELECT COUNT(*) FROM admins WHERE channel_id IS NULL;")
if [ "$SUPER_ADMIN_COUNT" -gt 0 ]; then
    echo -e "${GREEN}✓ Super Admin account configured${NC}"
else
    echo -e "${RED}✗ No Super Admin account found${NC}"
fi

echo ""
echo "========================================="
echo "          Setup Complete! 🎉"
echo "========================================="
echo ""
echo -e "${GREEN}Next Steps:${NC}"
echo ""
echo "1. Start your Laravel server:"
echo "   ${YELLOW}php artisan serve --port=8000${NC}"
echo ""
echo "2. Access the Super Admin Panel:"
echo "   ${YELLOW}http://127.0.0.1:8000/admin/super-admin${NC}"
echo ""
echo "3. Login with:"
echo "   Email: ${YELLOW}admin@matjarak.test${NC}"
echo "   Password: ${YELLOW}admin123456${NC}"
echo ""
echo "4. Click '${GREEN}Add New Seller${NC}' to create your first seller!"
echo ""
echo "========================================="
echo ""

# Optional: Start the server
read -p "Do you want to start the Laravel server now? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]
then
    echo ""
    echo -e "${GREEN}Starting Laravel server...${NC}"
    echo -e "${YELLOW}Press Ctrl+C to stop the server${NC}"
    echo ""
    php artisan serve --port=8000
fi
