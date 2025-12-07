#!/bin/bash

echo "🔄 Assigning Data to Channels"
echo "============================="
echo ""
echo "Current Channels:"
echo "  19: electronics (admin@electronics.com)"
echo "  20: sports (admin@sports.com)"
echo "  21: kids (admin@kids.com)"
echo ""

# Channel IDs
ELECTRONICS_ID=19
SPORTS_ID=20
KIDS_ID=21

echo "Choose distribution strategy:"
echo ""
echo "1) Assign ALL data to Electronics (recommended for testing)"
echo "2) Distribute data evenly across all three stores"
echo ""
read -p "Enter choice (1-2): " choice

case $choice in
    1)
        echo ""
        echo "📦 Assigning all data to Electronics store..."
        mysql -u root -p12345678 matjarak_db << SQL
        -- Remove existing product_channels for these products
        DELETE FROM product_channels WHERE channel_id IN (1, 19, 20, 21);

        -- Link all products to Electronics channel
        INSERT INTO product_channels (product_id, channel_id)
        SELECT DISTINCT id, $ELECTRONICS_ID
        FROM products;

        -- Assign all orders to Electronics (no channel_code column)
        UPDATE orders 
        SET channel_id = $ELECTRONICS_ID
        WHERE channel_id IS NULL OR channel_id != $ELECTRONICS_ID;
        
        -- Assign all customers to Electronics
        UPDATE customers 
        SET channel_id = $ELECTRONICS_ID
        WHERE channel_id IS NULL OR channel_id != $ELECTRONICS_ID;
SQL
        echo "✅ All data assigned to Electronics channel"
        ;;
    2)
        echo ""
        echo "�� Distributing data evenly across all stores..."
        mysql -u root -p12345678 matjarak_db << SQL
        -- Remove existing product_channels
        DELETE FROM product_channels WHERE channel_id IN (1, 19, 20, 21);

        -- Distribute products (every 3rd product to each channel)
        INSERT INTO product_channels (product_id, channel_id)
        SELECT id, CASE 
            WHEN MOD(id, 3) = 0 THEN $ELECTRONICS_ID
            WHEN MOD(id, 3) = 1 THEN $SPORTS_ID
            ELSE $KIDS_ID
        END
        FROM products;

        -- Distribute orders
        UPDATE orders 
        SET channel_id = CASE 
            WHEN MOD(id, 3) = 0 THEN $ELECTRONICS_ID
            WHEN MOD(id, 3) = 1 THEN $SPORTS_ID
            ELSE $KIDS_ID
        END;

        -- Distribute customers
        UPDATE customers 
        SET channel_id = CASE 
            WHEN MOD(id, 3) = 0 THEN $ELECTRONICS_ID
            WHEN MOD(id, 3) = 1 THEN $SPORTS_ID
            ELSE $KIDS_ID
        END;
SQL
        echo "✅ Data distributed evenly across all channels"
        ;;
    *)
        echo "Invalid choice!"
        exit 1
        ;;
esac

echo ""
echo "🔄 Clearing cache..."
php artisan cache:clear > /dev/null 2>&1
php artisan config:clear > /dev/null 2>&1

echo ""
echo "📊 Final Distribution:"
echo "===================="

mysql -u root -p12345678 matjarak_db << 'SQL'
-- Products per channel
SELECT 
    CONCAT('📦 ', c.code, ': ', COUNT(DISTINCT pc.product_id), ' products') as result
FROM channels c
LEFT JOIN product_channels pc ON c.id = pc.channel_id
WHERE c.id IN (19, 20, 21)
GROUP BY c.id, c.code
ORDER BY c.id;

-- Orders per channel
SELECT 
    CONCAT('🛒 ', c.code, ': ', COUNT(o.id), ' orders (', COALESCE(SUM(o.grand_total), 0), ' total)') as result
FROM channels c
LEFT JOIN orders o ON c.id = o.channel_id
WHERE c.id IN (19, 20, 21)
GROUP BY c.id, c.code
ORDER BY c.id;

-- Customers per channel
SELECT 
    CONCAT('👥 ', c.code, ': ', COUNT(cu.id), ' customers') as result
FROM channels c
LEFT JOIN customers cu ON c.id = cu.channel_id
WHERE c.id IN (19, 20, 21)
GROUP BY c.id, c.code
ORDER BY c.id;
SQL

echo ""
echo "✅ Assignment Complete!"
echo ""
echo "🧪 Next Steps:"
echo "1. Run: ./verify-isolation.sh"
echo "2. Login as: admin@electronics.com at http://electronics.localhost:8000/admin"
echo "3. Check that you only see electronics data"
echo "4. Try accessing: http://sports.localhost:8000/admin (should be blocked)"
