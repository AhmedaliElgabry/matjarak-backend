#!/bin/bash

echo "🔍 Multi-Tenant Isolation Verification"
echo "======================================"
echo ""

# Test 1: Product Distribution
echo "📦 Products per Channel:"
mysql -u root -p12345678 matjarak_db -sN << 'SQL'
SELECT 
    CONCAT('  ', c.code, ': ', COUNT(DISTINCT pc.product_id), ' products') as result
FROM channels c
LEFT JOIN product_channels pc ON c.id = pc.channel_id
WHERE c.code != 'default'
GROUP BY c.id, c.code
ORDER BY c.id;
SQL

echo ""

# Test 2: Order Distribution  
echo "🛒 Orders per Channel:"
mysql -u root -p12345678 matjarak_db -sN << 'SQL'
SELECT 
    CONCAT('  ', COALESCE(c.code, 'NO CHANNEL'), ': ', COUNT(o.id), ' orders, ', 
           COALESCE(SUM(o.grand_total), 0), ' total') as result
FROM channels c
RIGHT JOIN orders o ON c.id = o.channel_id
GROUP BY c.id, c.code
ORDER BY c.id;
SQL

echo ""

# Test 3: Customer Distribution
echo "👥 Customers per Channel:"
mysql -u root -p12345678 matjarak_db -sN << 'SQL'
SELECT 
    CONCAT('  ', COALESCE(c.code, 'NO CHANNEL'), ': ', COUNT(cu.id), ' customers') as result
FROM channels c
RIGHT JOIN customers cu ON c.id = cu.channel_id
GROUP BY c.id, c.code
ORDER BY c.id;
SQL

echo ""

# Test 4: Index Check
echo "⚡ Performance Indexes:"
mysql -u root -p12345678 matjarak_db -sN << 'SQL'
SELECT CONCAT('  ✓ ', TABLE_NAME, '.', INDEX_NAME) as result
FROM information_schema.STATISTICS
WHERE TABLE_SCHEMA = 'matjarak_db'
AND INDEX_NAME IN (
    'orders_channel_id_index',
    'customers_channel_id_index',
    'channels_hostname_index',
    'pc_channel_product_idx'
)
ORDER BY TABLE_NAME, INDEX_NAME;
SQL

echo ""
echo "✅ Verification Complete!"
