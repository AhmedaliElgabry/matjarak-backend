Repository: https://github.com/AhmedaliElgabry/matjarak-backend.git


Run application:
php artisan serve --port=8000

Clear cache:
php artisan optimize:clear
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

Rebuild autoload:
composer dump-autoload

Utility scripts:

- ./verify-isolation.sh
- ./assign-data-to-channels.sh

Accounts and Access

Super Admin:
URL: http://localhost:8000/admin/login ,Email: ahmed@ahmed.ahmed Password: ahmed123

Tenant Admins:

Electronics: Host: electronics.localhost
Admin URL: /admin
Email: admin@electronics.com ,Password: admin123

Sports: Host: sports.localhost Admin URL: /admin

Email: admin@sports.com, Password: admin123

Kids: Host: kids.localhost, Admin URL: /admin

Email: admin@kids.com ,Password: admin123

Furniture:
Host: furniture.localhost ,Admin URL: /admin
Email: admin@furniture.com,Password: admin123

Current Backend Features

Tenant Isolation:
Middleware InitializeChannelContext enforces channel matching
If admin channel does not match the domain, the user is logged out
channel_id added to orders, customers, invoices, shipments

Automatic Query Scoping:
All queries include:
WHERE channel_id = {current tenant}

Applied to:

Eloquent models (Products, Orders, Customers)
Bagisto reporting widgets (Sales charts, top products)
Admin data grids (product lists, order lists)
Admin Panel Restrictions:
Tenant admins cannot access Channels, Currencies, Roles

Remaining Work
Frontend Isolation:
Each subdomain needs its own:
Banners
Homepage content
Product visibility
Theme configuration
Super Admin Dashboard:
Global dashboard to compare tenant performance
Payment and Shipping per Tenant:
Allow payment methods to differ per store
Example: one tenant uses Stripe, another uses COD

Production Deployment:
Configure wildcard subdomains: *.matjarak.com
Configure Nginx/Apache for tenant routing



to connect a dabase:
 mysql -u root -p12345678 matjarak_db
 ALTER TABLE admins 
ADD COLUMN role VARCHAR(20) DEFAULT 'seller' AFTER channel_id;
ALTER TABLE admins 
ADD INDEX idx_role (role);
-- Step 2: Assign roles and channels to existing admins
-- Run this SQL in your database

-- Make the first admin (super@matjarak.test) a super admin
-- Super admin has NO channel_id so they can access all
UPDATE admins 
SET role = 'super_admin', 
    channel_id = NULL 
WHERE id = 1 OR email = 'super@matjarak.test';

-- Electronics admin is already assigned to channel 19 - just update role
UPDATE admins 
SET role = 'seller' 
WHERE id = 12 OR email = 'admin@electronics.com';

-- Assign Ahmed Ali to Default channel (id: 1)
UPDATE admins 
SET role = 'seller', 
    channel_id = 1 
WHERE id = 4 OR email = 'ahmed@matjarak.test';

-- Assign RAM to Sports channel (id: 20)
UPDATE admins 
SET role = 'seller', 
    channel_id = 20 
WHERE id = 6 OR email = 't@test.com';

-- Assign remaining admins to Kids channel (id: 21) as example
-- You can change these assignments based on your needs
UPDATE admins 
SET role = 'seller', 
    channel_id = 21 
WHERE id = 11 OR email = 'ahmed@ahmed.ahmed';

-- Verify the changes
SELECT id, name, email, role, channel_id 
FROM admins 
ORDER BY role DESC, channel_id;

-- Expected result:
-- Super Admin (id=1): role='super_admin', channel_id=NULL
-- Electronics Admin (id=12): role='seller', channel_id=19
-- Ahmed Ali (id=4): role='seller', channel_id=1
-- RAM (id=6): role='seller', channel_id=20
-- Others: role='seller', channel_id=21 (or as you assigned)

