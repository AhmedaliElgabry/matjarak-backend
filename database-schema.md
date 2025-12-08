# Database Schema Documentation

**Database:** `matjarak_db`
**Generated:** 2025-12-08 14:58:54
**Laravel Version:** 11.44.2

---

## 📋 Table of Contents

- [addresses](#addresses)
- [admin_password_resets](#admin_password_resets)
- [admins](#admins)
- [attribute_families](#attribute_families)
- [attribute_group_mappings](#attribute_group_mappings)
- [attribute_groups](#attribute_groups)
- [attribute_option_translations](#attribute_option_translations)
- [attribute_options](#attribute_options)
- [attribute_translations](#attribute_translations)
- [attributes](#attributes)
- [booking_product_appointment_slots](#booking_product_appointment_slots)
- [booking_product_default_slots](#booking_product_default_slots)
- [booking_product_event_ticket_translations](#booking_product_event_ticket_translations)
- [booking_product_event_tickets](#booking_product_event_tickets)
- [booking_product_rental_slots](#booking_product_rental_slots)
- [booking_product_table_slots](#booking_product_table_slots)
- [booking_products](#booking_products)
- [bookings](#bookings)
- [cart](#cart)
- [cart_item_inventories](#cart_item_inventories)
- [cart_items](#cart_items)
- [cart_payment](#cart_payment)
- [cart_rule_channels](#cart_rule_channels)
- [cart_rule_coupon_usage](#cart_rule_coupon_usage)
- [cart_rule_coupons](#cart_rule_coupons)
- [cart_rule_customer_groups](#cart_rule_customer_groups)
- [cart_rule_customers](#cart_rule_customers)
- [cart_rule_translations](#cart_rule_translations)
- [cart_rules](#cart_rules)
- [cart_shipping_rates](#cart_shipping_rates)
- [catalog_rule_channels](#catalog_rule_channels)
- [catalog_rule_customer_groups](#catalog_rule_customer_groups)
- [catalog_rule_product_prices](#catalog_rule_product_prices)
- [catalog_rule_products](#catalog_rule_products)
- [catalog_rules](#catalog_rules)
- [categories](#categories)
- [category_filterable_attributes](#category_filterable_attributes)
- [category_translations](#category_translations)
- [channel_currencies](#channel_currencies)
- [channel_inventory_sources](#channel_inventory_sources)
- [channel_locales](#channel_locales)
- [channel_translations](#channel_translations)
- [channels](#channels)
- [cms_page_channels](#cms_page_channels)
- [cms_page_translations](#cms_page_translations)
- [cms_pages](#cms_pages)
- [compare_items](#compare_items)
- [core_config](#core_config)
- [countries](#countries)
- [country_state_translations](#country_state_translations)
- [country_states](#country_states)
- [country_translations](#country_translations)
- [currencies](#currencies)
- [currency_exchange_rates](#currency_exchange_rates)
- [customer_groups](#customer_groups)
- [customer_notes](#customer_notes)
- [customer_password_resets](#customer_password_resets)
- [customer_social_accounts](#customer_social_accounts)
- [customers](#customers)
- [datagrid_saved_filters](#datagrid_saved_filters)
- [downloadable_link_purchased](#downloadable_link_purchased)
- [failed_jobs](#failed_jobs)
- [gdpr_data_request](#gdpr_data_request)
- [import_batches](#import_batches)
- [imports](#imports)
- [inventory_sources](#inventory_sources)
- [invoice_items](#invoice_items)
- [invoices](#invoices)
- [job_batches](#job_batches)
- [jobs](#jobs)
- [locales](#locales)
- [marketing_campaigns](#marketing_campaigns)
- [marketing_events](#marketing_events)
- [marketing_templates](#marketing_templates)
- [migrations](#migrations)
- [notifications](#notifications)
- [order_comments](#order_comments)
- [order_items](#order_items)
- [order_payment](#order_payment)
- [order_transactions](#order_transactions)
- [orders](#orders)
- [password_resets](#password_resets)
- [personal_access_tokens](#personal_access_tokens)
- [product_attribute_values](#product_attribute_values)
- [product_bundle_option_products](#product_bundle_option_products)
- [product_bundle_option_translations](#product_bundle_option_translations)
- [product_bundle_options](#product_bundle_options)
- [product_categories](#product_categories)
- [product_channels](#product_channels)
- [product_cross_sells](#product_cross_sells)
- [product_customer_group_prices](#product_customer_group_prices)
- [product_customizable_option_prices](#product_customizable_option_prices)
- [product_customizable_option_translations](#product_customizable_option_translations)
- [product_customizable_options](#product_customizable_options)
- [product_downloadable_link_translations](#product_downloadable_link_translations)
- [product_downloadable_links](#product_downloadable_links)
- [product_downloadable_sample_translations](#product_downloadable_sample_translations)
- [product_downloadable_samples](#product_downloadable_samples)
- [product_flat](#product_flat)
- [product_grouped_products](#product_grouped_products)
- [product_images](#product_images)
- [product_inventories](#product_inventories)
- [product_inventory_indices](#product_inventory_indices)
- [product_ordered_inventories](#product_ordered_inventories)
- [product_price_indices](#product_price_indices)
- [product_relations](#product_relations)
- [product_review_attachments](#product_review_attachments)
- [product_reviews](#product_reviews)
- [product_super_attributes](#product_super_attributes)
- [product_up_sells](#product_up_sells)
- [product_videos](#product_videos)
- [products](#products)
- [refund_items](#refund_items)
- [refunds](#refunds)
- [roles](#roles)
- [search_synonyms](#search_synonyms)
- [search_terms](#search_terms)
- [shipment_items](#shipment_items)
- [shipments](#shipments)
- [sitemaps](#sitemaps)
- [subscribers_list](#subscribers_list)
- [tax_categories](#tax_categories)
- [tax_categories_tax_rates](#tax_categories_tax_rates)
- [tax_rates](#tax_rates)
- [theme_customization_translations](#theme_customization_translations)
- [theme_customizations](#theme_customizations)
- [url_rewrites](#url_rewrites)
- [users](#users)
- [visits](#visits)
- [wishlist](#wishlist)
- [wishlist_items](#wishlist_items)

---

## 📊 Database Statistics

| Metric | Value |
|--------|-------|
| Total Tables | 131 |
| Total Rows | 1,382 |

---

## 🔑 Critical Tables Overview

| Table | Purpose | Row Count |
|-------|---------|----------|
| `admins` | Admin users and their channel assignments | 7 |
| `channels` | Multi-tenant channels/stores | 4 |
| `channel_translations` | Channel names and descriptions per locale | 4 |
| `channel_locales` | Locales linked to channels | 7 |
| `channel_currencies` | Currencies linked to channels | 10 |
| `channel_inventory_sources` | Inventory sources for each channel | 5 |
| `categories` | Product categories | 3 |
| `category_translations` | Category names per locale | 4 |
| `products` | Products | 2 |
| `product_channels` | Products linked to channels | 2 |
| `product_categories` | Products linked to categories | 2 |
| `inventory_sources` | Warehouse/inventory locations | 10 |
| `locales` | Available languages | 2 |
| `currencies` | Available currencies | 3 |
| `roles` | User roles and permissions | 1 |

---

## 📑 Detailed Table Schemas

### addresses

**Rows:** 16

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `address_type` | varchar(255) | NO | NULL |  |  |
| `parent_address_id` | int unsigned | YES | NULL | MUL |  |
| `customer_id` | int unsigned | YES | NULL | MUL |  |
| `cart_id` | int unsigned | YES | NULL | MUL |  |
| `order_id` | int unsigned | YES | NULL | MUL |  |
| `first_name` | varchar(255) | NO | NULL |  |  |
| `last_name` | varchar(255) | NO | NULL |  |  |
| `gender` | varchar(255) | YES | NULL |  |  |
| `company_name` | varchar(255) | YES | NULL |  |  |
| `address` | varchar(255) | NO | NULL |  |  |
| `city` | varchar(255) | NO | NULL |  |  |
| `state` | varchar(255) | YES | NULL |  |  |
| `country` | varchar(255) | YES | NULL |  |  |
| `postcode` | varchar(255) | YES | NULL |  |  |
| `email` | varchar(255) | YES | NULL |  |  |
| `phone` | varchar(255) | YES | NULL |  |  |
| `vat_id` | varchar(255) | YES | NULL |  |  |
| `default_address` | tinyint(1) | NO | 0 |  |  |
| `use_for_shipping` | tinyint(1) | NO | 0 |  |  |
| `additional` | json | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| addresses_customer_id_foreign | customer_id | No | BTREE |
| addresses_cart_id_foreign | cart_id | No | BTREE |
| addresses_order_id_foreign | order_id | No | BTREE |
| addresses_parent_address_id_foreign | parent_address_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| addresses_cart_id_foreign | `cart_id` | `cart` | `id` |
| addresses_customer_id_foreign | `customer_id` | `customers` | `id` |
| addresses_order_id_foreign | `order_id` | `orders` | `id` |
| addresses_parent_address_id_foreign | `parent_address_id` | `addresses` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "address_type": "cart_billing",
        "parent_address_id": null,
        "customer_id": null,
        "cart_id": 1,
        "order_id": null,
        "first_name": "Ali",
        "last_name": "Elgaabry",
        "gender": null,
        "company_name": "Ahmed",
        "address": "egyot",
        "city": "gixa",
        "state": "cairo",
        "country": "EG",
        "postcode": "42445",
        "email": "gabry@gmail.com",
        "phone": "01065513801",
        "vat_id": null,
        "default_address": 0,
        "use_for_shipping": 1,
        "additional": null,
        "created_at": "2025-12-06 21:16:16",
        "updated_at": "2025-12-06 21:16:16"
    },
    {
        "id": 2,
        "address_type": "cart_shipping",
        "parent_address_id": null,
        "customer_id": null,
        "cart_id": 1,
        "order_id": null,
        "first_name": "Ali",
        "last_name": "Elgaabry",
        "gender": null,
        "company_name": "Ahmed",
        "address": "egyot",
        "city": "gixa",
        "state": "cairo",
        "country": "EG",
        "postcode": "42445",
        "email": "gabry@gmail.com",
        "phone": "01065513801",
        "vat_id": null,
        "default_address": 0,
        "use_for_shipping": 0,
        "additional": null,
        "created_at": "2025-12-06 21:16:16",
        "updated_at": "2025-12-06 21:16:16"
    },
    {
        "id": 5,
        "address_type": "cart_billing",
        "parent_address_id": null,
        "customer_id": 4,
        "cart_id": 3,
        "order_id": null,
        "first_name": "Ali",
        "last_name": "Elgaabry",
        "gender": null,
        "company_name": "Ahmed",
        "address": "egyot",
        "city": "gixa",
        "state": "cairo",
        "country": "AF",
        "postcode": "42445",
        "email": "gabry@gmail.com",
        "phone": "01065513801",
        "vat_id": null,
        "default_address": 0,
        "use_for_shipping": 1,
        "additional": null,
        "created_at": "2025-12-06 21:44:01",
        "updated_at": "2025-12-06 21:44:01"
    }
]
```

---

### admin_password_resets

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `email` | varchar(255) | NO | NULL | MUL |  |
| `token` | varchar(255) | NO | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| admin_password_resets_email_index | email | No | BTREE |

---

### admins

**Rows:** 7

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `name` | varchar(255) | NO | NULL |  |  |
| `email` | varchar(255) | NO | NULL | UNI |  |
| `password` | varchar(255) | YES | NULL |  |  |
| `api_token` | varchar(80) | YES | NULL | UNI |  |
| `status` | tinyint(1) | NO | 0 |  |  |
| `role_id` | int unsigned | NO | NULL |  |  |
| `channel_id` | int unsigned | YES | NULL | MUL |  |
| `image` | varchar(255) | YES | NULL |  |  |
| `remember_token` | varchar(100) | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| admins_email_unique | email | Yes | BTREE |
| admins_api_token_unique | api_token | Yes | BTREE |
| admins_channel_id_index | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| admins_channel_id_foreign | `channel_id` | `channels` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "name": "Super Admin",
        "email": "super@matjarak.test",
        "password": "$2y$12$JbpqahfIl2RxGLZHic3NYOezOXFJ\/2YD3MZCElXy8lZWkXE4kGuka",
        "api_token": "71o4NEzXFn7KCZBTU4Y9TLzPgDuzM4YF15hgRuB5EOt564EOaVlbYPwRzTgC44K1gwGfLY5UNbU17GgK",
        "status": 1,
        "role_id": 1,
        "channel_id": null,
        "image": null,
        "remember_token": null,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 17:18:33"
    },
    {
        "id": 4,
        "name": "Ahmed Ali",
        "email": "ahmed@matjarak.test",
        "password": "$2y$12$sHMWv\/u2oQqGrthM2T\/cVOH1Hw7ViXgRz9DUMgsoXJ0q6ZZFgYoya",
        "api_token": null,
        "status": 1,
        "role_id": 1,
        "channel_id": null,
        "image": null,
        "remember_token": null,
        "created_at": "2025-12-07 12:53:23",
        "updated_at": "2025-12-07 14:55:44"
    },
    {
        "id": 6,
        "name": "RAM",
        "email": "t@test.com",
        "password": "$2y$12$7QMxzbly1ReQwQiVgA.w3eVyk2iAXHacDEcv574v8njoUCXcQRyV2",
        "api_token": null,
        "status": 1,
        "role_id": 1,
        "channel_id": null,
        "image": null,
        "remember_token": null,
        "created_at": "2025-12-07 14:11:08",
        "updated_at": "2025-12-07 14:11:08"
    }
]
```

---

### attribute_families

**Rows:** 1

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `code` | varchar(255) | NO | NULL |  |  |
| `name` | varchar(255) | NO | NULL |  |  |
| `status` | tinyint(1) | NO | 0 |  |  |
| `is_user_defined` | tinyint(1) | NO | 1 |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "code": "default",
        "name": "الافتراضي",
        "status": 0,
        "is_user_defined": 1
    }
]
```

---

### attribute_group_mappings

**Rows:** 29

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `attribute_id` | int unsigned | NO | NULL | PRI |  |
| `attribute_group_id` | int unsigned | NO | NULL | PRI |  |
| `position` | int | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | attribute_id | Yes | BTREE |
| attribute_group_mappings_attribute_group_id_foreign | attribute_group_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| attribute_group_mappings_attribute_group_id_foreign | `attribute_group_id` | `attribute_groups` | `id` |
| attribute_group_mappings_attribute_id_foreign | `attribute_id` | `attributes` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "attribute_id": 1,
        "attribute_group_id": 1,
        "position": 1
    },
    {
        "attribute_id": 2,
        "attribute_group_id": 1,
        "position": 3
    },
    {
        "attribute_id": 3,
        "attribute_group_id": 1,
        "position": 4
    }
]
```

---

### attribute_groups

**Rows:** 8

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `code` | varchar(255) | YES | NULL |  |  |
| `attribute_family_id` | int unsigned | NO | NULL | MUL |  |
| `name` | varchar(255) | NO | NULL |  |  |
| `column` | int | NO | 1 |  |  |
| `position` | int | NO | NULL |  |  |
| `is_user_defined` | tinyint(1) | NO | 1 |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| attribute_groups_attribute_family_id_name_unique | attribute_family_id | Yes | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| attribute_groups_attribute_family_id_foreign | `attribute_family_id` | `attribute_families` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "code": "general",
        "attribute_family_id": 1,
        "name": "عام",
        "column": 1,
        "position": 1,
        "is_user_defined": 0
    },
    {
        "id": 2,
        "code": "description",
        "attribute_family_id": 1,
        "name": "الوصف",
        "column": 1,
        "position": 3,
        "is_user_defined": 0
    },
    {
        "id": 3,
        "code": "meta_description",
        "attribute_family_id": 1,
        "name": "الوصف الواجب",
        "column": 1,
        "position": 4,
        "is_user_defined": 0
    }
]
```

---

### attribute_option_translations

**Rows:** 9

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `attribute_option_id` | int unsigned | NO | NULL | MUL |  |
| `locale` | varchar(255) | NO | NULL |  |  |
| `label` | text | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| attribute_option_locale_unique | attribute_option_id | Yes | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| attribute_option_translations_attribute_option_id_foreign | `attribute_option_id` | `attribute_options` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "attribute_option_id": 1,
        "locale": "ar",
        "label": "أحمر"
    },
    {
        "id": 2,
        "attribute_option_id": 2,
        "locale": "ar",
        "label": "أخضر"
    },
    {
        "id": 3,
        "attribute_option_id": 3,
        "locale": "ar",
        "label": "أصفر"
    }
]
```

---

### attribute_options

**Rows:** 9

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `attribute_id` | int unsigned | NO | NULL | MUL |  |
| `admin_name` | varchar(255) | YES | NULL |  |  |
| `sort_order` | int | YES | NULL |  |  |
| `swatch_value` | varchar(255) | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| attribute_options_attribute_id_foreign | attribute_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| attribute_options_attribute_id_foreign | `attribute_id` | `attributes` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "attribute_id": 23,
        "admin_name": "أحمر",
        "sort_order": 1,
        "swatch_value": null
    },
    {
        "id": 2,
        "attribute_id": 23,
        "admin_name": "أخضر",
        "sort_order": 2,
        "swatch_value": null
    },
    {
        "id": 3,
        "attribute_id": 23,
        "admin_name": "أصفر",
        "sort_order": 3,
        "swatch_value": null
    }
]
```

---

### attribute_translations

**Rows:** 29

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `attribute_id` | int unsigned | NO | NULL | MUL |  |
| `locale` | varchar(255) | NO | NULL |  |  |
| `name` | text | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| attribute_translations_attribute_id_locale_unique | attribute_id | Yes | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| attribute_translations_attribute_id_foreign | `attribute_id` | `attributes` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "attribute_id": 1,
        "locale": "ar",
        "name": "رمز المنتج"
    },
    {
        "id": 2,
        "attribute_id": 2,
        "locale": "ar",
        "name": "الاسم"
    },
    {
        "id": 3,
        "attribute_id": 3,
        "locale": "ar",
        "name": "الرابط المميز"
    }
]
```

---

### attributes

**Rows:** 29

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `code` | varchar(255) | NO | NULL | UNI |  |
| `admin_name` | varchar(255) | NO | NULL |  |  |
| `type` | varchar(255) | NO | NULL |  |  |
| `swatch_type` | varchar(255) | YES | NULL |  |  |
| `validation` | varchar(255) | YES | NULL |  |  |
| `regex` | varchar(255) | YES | NULL |  |  |
| `position` | int | YES | NULL |  |  |
| `is_required` | tinyint(1) | NO | 0 |  |  |
| `is_unique` | tinyint(1) | NO | 0 |  |  |
| `is_filterable` | tinyint(1) | NO | 0 |  |  |
| `is_comparable` | tinyint(1) | NO | 0 |  |  |
| `is_configurable` | tinyint(1) | NO | 0 |  |  |
| `is_user_defined` | tinyint(1) | NO | 1 |  |  |
| `is_visible_on_front` | tinyint(1) | NO | 0 |  |  |
| `value_per_locale` | tinyint(1) | NO | 0 |  |  |
| `value_per_channel` | tinyint(1) | NO | 0 |  |  |
| `default_value` | int | YES | NULL |  |  |
| `enable_wysiwyg` | tinyint(1) | NO | 0 |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| attributes_code_unique | code | Yes | BTREE |
| attributes_code_index | code | No | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "code": "sku",
        "admin_name": "رمز المنتج",
        "type": "text",
        "swatch_type": null,
        "validation": null,
        "regex": null,
        "position": 1,
        "is_required": 1,
        "is_unique": 1,
        "is_filterable": 0,
        "is_comparable": 0,
        "is_configurable": 0,
        "is_user_defined": 0,
        "is_visible_on_front": 0,
        "value_per_locale": 0,
        "value_per_channel": 0,
        "default_value": null,
        "enable_wysiwyg": 0,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 20:43:08"
    },
    {
        "id": 2,
        "code": "name",
        "admin_name": "الاسم",
        "type": "text",
        "swatch_type": null,
        "validation": null,
        "regex": null,
        "position": 3,
        "is_required": 1,
        "is_unique": 0,
        "is_filterable": 0,
        "is_comparable": 1,
        "is_configurable": 0,
        "is_user_defined": 0,
        "is_visible_on_front": 0,
        "value_per_locale": 1,
        "value_per_channel": 0,
        "default_value": null,
        "enable_wysiwyg": 0,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 20:43:08"
    },
    {
        "id": 3,
        "code": "url_key",
        "admin_name": "الرابط المميز",
        "type": "text",
        "swatch_type": null,
        "validation": null,
        "regex": null,
        "position": 4,
        "is_required": 1,
        "is_unique": 1,
        "is_filterable": 0,
        "is_comparable": 0,
        "is_configurable": 0,
        "is_user_defined": 0,
        "is_visible_on_front": 0,
        "value_per_locale": 1,
        "value_per_channel": 0,
        "default_value": null,
        "enable_wysiwyg": 0,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 20:43:08"
    }
]
```

---

### booking_product_appointment_slots

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `booking_product_id` | int unsigned | NO | NULL | MUL |  |
| `duration` | int | YES | NULL |  |  |
| `break_time` | int | YES | NULL |  |  |
| `same_slot_all_days` | tinyint(1) | YES | NULL |  |  |
| `slots` | json | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| booking_product_appointment_slots_booking_product_id_foreign | booking_product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| booking_product_appointment_slots_booking_product_id_foreign | `booking_product_id` | `booking_products` | `id` |

---

### booking_product_default_slots

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `booking_product_id` | int unsigned | NO | NULL | MUL |  |
| `booking_type` | varchar(255) | NO | NULL |  |  |
| `duration` | int | YES | NULL |  |  |
| `break_time` | int | YES | NULL |  |  |
| `slots` | json | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| booking_product_default_slots_booking_product_id_foreign | booking_product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| booking_product_default_slots_booking_product_id_foreign | `booking_product_id` | `booking_products` | `id` |

---

### booking_product_event_ticket_translations

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `booking_product_event_ticket_id` | bigint unsigned | NO | NULL | MUL |  |
| `locale` | varchar(255) | NO | NULL |  |  |
| `name` | text | YES | NULL |  |  |
| `description` | text | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| bpet_locale_unique | booking_product_event_ticket_id | Yes | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| bpet_translations_fk | `booking_product_event_ticket_id` | `booking_product_event_tickets` | `id` |

---

### booking_product_event_tickets

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `booking_product_id` | int unsigned | NO | NULL | MUL |  |
| `price` | decimal(12,4) | YES | 0.0000 |  |  |
| `qty` | int | YES | 0 |  |  |
| `special_price` | decimal(12,4) | YES | NULL |  |  |
| `special_price_from` | datetime | YES | NULL |  |  |
| `special_price_to` | datetime | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| booking_product_event_tickets_booking_product_id_foreign | booking_product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| booking_product_event_tickets_booking_product_id_foreign | `booking_product_id` | `booking_products` | `id` |

---

### booking_product_rental_slots

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `booking_product_id` | int unsigned | NO | NULL | MUL |  |
| `renting_type` | varchar(255) | NO | NULL |  |  |
| `daily_price` | decimal(12,4) | YES | 0.0000 |  |  |
| `hourly_price` | decimal(12,4) | YES | 0.0000 |  |  |
| `same_slot_all_days` | tinyint(1) | YES | NULL |  |  |
| `slots` | json | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| booking_product_rental_slots_booking_product_id_foreign | booking_product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| booking_product_rental_slots_booking_product_id_foreign | `booking_product_id` | `booking_products` | `id` |

---

### booking_product_table_slots

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `booking_product_id` | int unsigned | NO | NULL | MUL |  |
| `price_type` | varchar(255) | NO | NULL |  |  |
| `guest_limit` | int | NO | 0 |  |  |
| `duration` | int | NO | NULL |  |  |
| `break_time` | int | NO | NULL |  |  |
| `prevent_scheduling_before` | int | NO | NULL |  |  |
| `same_slot_all_days` | tinyint(1) | YES | NULL |  |  |
| `slots` | json | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| booking_product_table_slots_booking_product_id_foreign | booking_product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| booking_product_table_slots_booking_product_id_foreign | `booking_product_id` | `booking_products` | `id` |

---

### booking_products

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `type` | varchar(255) | NO | NULL |  |  |
| `qty` | int | YES | 0 |  |  |
| `location` | varchar(255) | YES | NULL |  |  |
| `show_location` | tinyint(1) | NO | 0 |  |  |
| `available_every_week` | tinyint(1) | YES | NULL |  |  |
| `available_from` | datetime | YES | NULL |  |  |
| `available_to` | datetime | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| booking_products_product_id_foreign | product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| booking_products_product_id_foreign | `product_id` | `products` | `id` |

---

### bookings

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `product_id` | int unsigned | YES | NULL | MUL |  |
| `order_item_id` | int unsigned | YES | NULL | MUL |  |
| `order_id` | int unsigned | YES | NULL | MUL |  |
| `qty` | int | YES | 0 |  |  |
| `from` | int | YES | NULL |  |  |
| `to` | int | YES | NULL |  |  |
| `booking_product_event_ticket_id` | bigint unsigned | YES | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| bookings_order_item_id_foreign | order_item_id | No | BTREE |
| bookings_booking_product_event_ticket_id_foreign | booking_product_event_ticket_id | No | BTREE |
| bookings_order_id_foreign | order_id | No | BTREE |
| bookings_product_id_foreign | product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| bookings_booking_product_event_ticket_id_foreign | `booking_product_event_ticket_id` | `booking_product_event_tickets` | `id` |
| bookings_order_id_foreign | `order_id` | `orders` | `id` |
| bookings_order_item_id_foreign | `order_item_id` | `order_items` | `id` |
| bookings_product_id_foreign | `product_id` | `products` | `id` |

---

### cart

**Rows:** 7

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `customer_email` | varchar(255) | YES | NULL |  |  |
| `customer_first_name` | varchar(255) | YES | NULL |  |  |
| `customer_last_name` | varchar(255) | YES | NULL |  |  |
| `shipping_method` | varchar(255) | YES | NULL |  |  |
| `coupon_code` | varchar(255) | YES | NULL |  |  |
| `is_gift` | tinyint(1) | NO | 0 |  |  |
| `items_count` | int | YES | NULL |  |  |
| `items_qty` | decimal(12,4) | YES | NULL |  |  |
| `exchange_rate` | decimal(12,4) | YES | NULL |  |  |
| `global_currency_code` | varchar(255) | YES | NULL |  |  |
| `base_currency_code` | varchar(255) | YES | NULL |  |  |
| `channel_currency_code` | varchar(255) | YES | NULL |  |  |
| `cart_currency_code` | varchar(255) | YES | NULL |  |  |
| `grand_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_grand_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `sub_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_sub_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `tax_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_tax_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `shipping_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_shipping_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `shipping_amount_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_shipping_amount_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `sub_total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_sub_total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `checkout_method` | varchar(255) | YES | NULL |  |  |
| `is_guest` | tinyint(1) | YES | NULL |  |  |
| `is_active` | tinyint(1) | YES | 1 |  |  |
| `applied_cart_rule_ids` | varchar(255) | YES | NULL |  |  |
| `customer_id` | int unsigned | YES | NULL | MUL |  |
| `channel_id` | int unsigned | NO | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| cart_customer_id_foreign | customer_id | No | BTREE |
| cart_channel_id_foreign | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| cart_channel_id_foreign | `channel_id` | `channels` | `id` |
| cart_customer_id_foreign | `customer_id` | `customers` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "customer_email": "gabry@gmail.com",
        "customer_first_name": "Ali",
        "customer_last_name": "Elgaabry",
        "shipping_method": "flatrate_flatrate",
        "coupon_code": null,
        "is_gift": 0,
        "items_count": 1,
        "items_qty": "1.0000",
        "exchange_rate": null,
        "global_currency_code": "EGP",
        "base_currency_code": "EGP",
        "channel_currency_code": "EGP",
        "cart_currency_code": "EGP",
        "grand_total": "63010.0000",
        "base_grand_total": "63010.0000",
        "sub_total": "63000.0000",
        "base_sub_total": "63000.0000",
        "tax_total": "0.0000",
        "base_tax_total": "0.0000",
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "shipping_amount": "10.0000",
        "base_shipping_amount": "10.0000",
        "shipping_amount_incl_tax": "10.0000",
        "base_shipping_amount_incl_tax": "10.0000",
        "sub_total_incl_tax": "63000.0000",
        "base_sub_total_incl_tax": "63000.0000",
        "checkout_method": null,
        "is_guest": 1,
        "is_active": 1,
        "applied_cart_rule_ids": null,
        "customer_id": null,
        "channel_id": 1,
        "created_at": "2025-12-06 21:14:55",
        "updated_at": "2025-12-06 21:16:27"
    },
    {
        "id": 2,
        "customer_email": null,
        "customer_first_name": null,
        "customer_last_name": null,
        "shipping_method": null,
        "coupon_code": null,
        "is_gift": 0,
        "items_count": 1,
        "items_qty": "1.0000",
        "exchange_rate": null,
        "global_currency_code": "EGP",
        "base_currency_code": "EGP",
        "channel_currency_code": "EGP",
        "cart_currency_code": "EGP",
        "grand_total": "63000.0000",
        "base_grand_total": "63000.0000",
        "sub_total": "63000.0000",
        "base_sub_total": "63000.0000",
        "tax_total": "0.0000",
        "base_tax_total": "0.0000",
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "shipping_amount": "0.0000",
        "base_shipping_amount": "0.0000",
        "shipping_amount_incl_tax": "0.0000",
        "base_shipping_amount_incl_tax": "0.0000",
        "sub_total_incl_tax": "63000.0000",
        "base_sub_total_incl_tax": "63000.0000",
        "checkout_method": null,
        "is_guest": 1,
        "is_active": 1,
        "applied_cart_rule_ids": null,
        "customer_id": null,
        "channel_id": 1,
        "created_at": "2025-12-06 21:31:42",
        "updated_at": "2025-12-06 21:36:29"
    },
    {
        "id": 3,
        "customer_email": "t@test.com",
        "customer_first_name": "ahmed",
        "customer_last_name": "ali",
        "shipping_method": "flatrate_flatrate",
        "coupon_code": null,
        "is_gift": 0,
        "items_count": 1,
        "items_qty": "1.0000",
        "exchange_rate": null,
        "global_currency_code": "EGP",
        "base_currency_code": "EGP",
        "channel_currency_code": "EGP",
        "cart_currency_code": "EGP",
        "grand_total": "63010.0000",
        "base_grand_total": "63010.0000",
        "sub_total": "63000.0000",
        "base_sub_total": "63000.0000",
        "tax_total": "0.0000",
        "base_tax_total": "0.0000",
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "shipping_amount": "10.0000",
        "base_shipping_amount": "10.0000",
        "shipping_amount_incl_tax": "10.0000",
        "base_shipping_amount_incl_tax": "10.0000",
        "sub_total_incl_tax": "63000.0000",
        "base_sub_total_incl_tax": "63000.0000",
        "checkout_method": null,
        "is_guest": 0,
        "is_active": 0,
        "applied_cart_rule_ids": null,
        "customer_id": 4,
        "channel_id": 1,
        "created_at": "2025-12-06 21:43:24",
        "updated_at": "2025-12-06 21:44:07"
    }
]
```

---

### cart_item_inventories

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `qty` | int unsigned | NO | 0 |  |  |
| `inventory_source_id` | int unsigned | YES | NULL |  |  |
| `cart_item_id` | int unsigned | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

---

### cart_items

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `quantity` | int unsigned | NO | 0 |  |  |
| `sku` | varchar(255) | YES | NULL |  |  |
| `type` | varchar(255) | YES | NULL |  |  |
| `name` | varchar(255) | YES | NULL |  |  |
| `coupon_code` | varchar(255) | YES | NULL |  |  |
| `weight` | decimal(12,4) | NO | 0.0000 |  |  |
| `total_weight` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_total_weight` | decimal(12,4) | NO | 0.0000 |  |  |
| `price` | decimal(12,4) | NO | 1.0000 |  |  |
| `base_price` | decimal(12,4) | NO | 0.0000 |  |  |
| `custom_price` | decimal(12,4) | YES | NULL |  |  |
| `total` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_total` | decimal(12,4) | NO | 0.0000 |  |  |
| `tax_percent` | decimal(12,4) | YES | 0.0000 |  |  |
| `tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_percent` | decimal(12,4) | NO | 0.0000 |  |  |
| `discount_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_discount_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `price_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_price_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `applied_tax_rate` | varchar(255) | YES | NULL |  |  |
| `parent_id` | int unsigned | YES | NULL | MUL |  |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `cart_id` | int unsigned | NO | NULL | MUL |  |
| `tax_category_id` | int unsigned | YES | NULL | MUL |  |
| `applied_cart_rule_ids` | varchar(255) | YES | NULL |  |  |
| `additional` | json | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| cart_items_parent_id_foreign | parent_id | No | BTREE |
| cart_items_product_id_foreign | product_id | No | BTREE |
| cart_items_cart_id_foreign | cart_id | No | BTREE |
| cart_items_tax_category_id_foreign | tax_category_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| cart_items_cart_id_foreign | `cart_id` | `cart` | `id` |
| cart_items_parent_id_foreign | `parent_id` | `cart_items` | `id` |
| cart_items_product_id_foreign | `product_id` | `products` | `id` |
| cart_items_tax_category_id_foreign | `tax_category_id` | `tax_categories` | `id` |

---

### cart_payment

**Rows:** 5

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `method` | varchar(255) | NO | NULL |  |  |
| `method_title` | varchar(255) | YES | NULL |  |  |
| `cart_id` | int unsigned | YES | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| cart_payment_cart_id_foreign | cart_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| cart_payment_cart_id_foreign | `cart_id` | `cart` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "method": "cashondelivery",
        "method_title": "Cash On Delivery",
        "cart_id": 1,
        "created_at": "2025-12-06 21:16:26",
        "updated_at": "2025-12-06 21:16:26"
    },
    {
        "id": 2,
        "method": "cashondelivery",
        "method_title": "Cash On Delivery",
        "cart_id": 3,
        "created_at": "2025-12-06 21:44:06",
        "updated_at": "2025-12-06 21:44:06"
    },
    {
        "id": 3,
        "method": "cashondelivery",
        "method_title": "Cash On Delivery",
        "cart_id": 4,
        "created_at": "2025-12-07 00:27:05",
        "updated_at": "2025-12-07 00:27:05"
    }
]
```

---

### cart_rule_channels

**Rows:** 1

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `cart_rule_id` | int unsigned | NO | NULL | PRI |  |
| `channel_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | cart_rule_id | Yes | BTREE |
| cart_rule_channels_channel_id_foreign | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| cart_rule_channels_cart_rule_id_foreign | `cart_rule_id` | `cart_rules` | `id` |
| cart_rule_channels_channel_id_foreign | `channel_id` | `channels` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "cart_rule_id": 1,
        "channel_id": 1
    }
]
```

---

### cart_rule_coupon_usage

**Rows:** 1

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `times_used` | int | NO | 0 |  |  |
| `cart_rule_coupon_id` | int unsigned | NO | NULL | MUL |  |
| `customer_id` | int unsigned | NO | NULL | MUL |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| cart_rule_coupon_usage_cart_rule_coupon_id_foreign | cart_rule_coupon_id | No | BTREE |
| cart_rule_coupon_usage_customer_id_foreign | customer_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| cart_rule_coupon_usage_cart_rule_coupon_id_foreign | `cart_rule_coupon_id` | `cart_rule_coupons` | `id` |
| cart_rule_coupon_usage_customer_id_foreign | `customer_id` | `customers` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "times_used": 1,
        "cart_rule_coupon_id": 1,
        "customer_id": 5
    }
]
```

---

### cart_rule_coupons

**Rows:** 1

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `code` | varchar(255) | YES | NULL |  |  |
| `usage_limit` | int unsigned | NO | 0 |  |  |
| `usage_per_customer` | int unsigned | NO | 0 |  |  |
| `times_used` | int unsigned | NO | 0 |  |  |
| `type` | int unsigned | NO | 0 |  |  |
| `is_primary` | tinyint(1) | NO | 0 |  |  |
| `expired_at` | date | YES | NULL |  |  |
| `cart_rule_id` | int unsigned | NO | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| cart_rule_coupons_cart_rule_id_foreign | cart_rule_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| cart_rule_coupons_cart_rule_id_foreign | `cart_rule_id` | `cart_rules` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "code": "123",
        "usage_limit": 1,
        "usage_per_customer": 1,
        "times_used": 1,
        "type": 0,
        "is_primary": 1,
        "expired_at": null,
        "cart_rule_id": 1,
        "created_at": "2025-12-07 02:27:26",
        "updated_at": "2025-12-07 02:28:19"
    }
]
```

---

### cart_rule_customer_groups

**Rows:** 1

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `cart_rule_id` | int unsigned | NO | NULL | PRI |  |
| `customer_group_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | cart_rule_id | Yes | BTREE |
| cart_rule_customer_groups_customer_group_id_foreign | customer_group_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| cart_rule_customer_groups_cart_rule_id_foreign | `cart_rule_id` | `cart_rules` | `id` |
| cart_rule_customer_groups_customer_group_id_foreign | `customer_group_id` | `customer_groups` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "cart_rule_id": 1,
        "customer_group_id": 3
    }
]
```

---

### cart_rule_customers

**Rows:** 1

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `times_used` | bigint unsigned | NO | 0 |  |  |
| `customer_id` | int unsigned | NO | NULL | MUL |  |
| `cart_rule_id` | int unsigned | NO | NULL | MUL |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| cart_rule_customers_cart_rule_id_foreign | cart_rule_id | No | BTREE |
| cart_rule_customers_customer_id_foreign | customer_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| cart_rule_customers_cart_rule_id_foreign | `cart_rule_id` | `cart_rules` | `id` |
| cart_rule_customers_customer_id_foreign | `customer_id` | `customers` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "times_used": 1,
        "customer_id": 5,
        "cart_rule_id": 1
    }
]
```

---

### cart_rule_translations

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `locale` | varchar(255) | NO | NULL |  |  |
| `label` | text | YES | NULL |  |  |
| `cart_rule_id` | int unsigned | NO | NULL | MUL |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| cart_rule_translations_cart_rule_id_locale_unique | cart_rule_id | Yes | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| cart_rule_translations_cart_rule_id_foreign | `cart_rule_id` | `cart_rules` | `id` |

---

### cart_rules

**Rows:** 1

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `name` | varchar(255) | YES | NULL |  |  |
| `description` | varchar(255) | YES | NULL |  |  |
| `starts_from` | datetime | YES | NULL |  |  |
| `ends_till` | datetime | YES | NULL |  |  |
| `status` | tinyint(1) | NO | 0 |  |  |
| `coupon_type` | int | NO | 1 |  |  |
| `use_auto_generation` | tinyint(1) | NO | 0 |  |  |
| `usage_per_customer` | int | NO | 0 |  |  |
| `uses_per_coupon` | int | NO | 0 |  |  |
| `times_used` | int unsigned | NO | 0 |  |  |
| `condition_type` | tinyint(1) | NO | 1 |  |  |
| `conditions` | json | YES | NULL |  |  |
| `end_other_rules` | tinyint(1) | NO | 0 |  |  |
| `uses_attribute_conditions` | tinyint(1) | NO | 0 |  |  |
| `action_type` | varchar(255) | YES | NULL |  |  |
| `discount_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `discount_quantity` | int | NO | 1 |  |  |
| `discount_step` | varchar(255) | NO | 1 |  |  |
| `apply_to_shipping` | tinyint(1) | NO | 0 |  |  |
| `free_shipping` | tinyint(1) | NO | 0 |  |  |
| `sort_order` | int unsigned | NO | 0 |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "name": "offer",
        "description": "",
        "starts_from": null,
        "ends_till": null,
        "status": 1,
        "coupon_type": 1,
        "use_auto_generation": 0,
        "usage_per_customer": 1,
        "uses_per_coupon": 1,
        "times_used": 1,
        "condition_type": 1,
        "conditions": "[]",
        "end_other_rules": 0,
        "uses_attribute_conditions": 0,
        "action_type": "by_percent",
        "discount_amount": "10.0000",
        "discount_quantity": 0,
        "discount_step": "0",
        "apply_to_shipping": 0,
        "free_shipping": 0,
        "sort_order": 0,
        "created_at": "2025-12-07 02:22:11",
        "updated_at": "2025-12-07 02:28:19"
    }
]
```

---

### cart_shipping_rates

**Rows:** 10

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `carrier` | varchar(255) | NO | NULL |  |  |
| `carrier_title` | varchar(255) | NO | NULL |  |  |
| `method` | varchar(255) | NO | NULL |  |  |
| `method_title` | varchar(255) | NO | NULL |  |  |
| `method_description` | varchar(255) | YES | NULL |  |  |
| `price` | double | YES | 0 |  |  |
| `base_price` | double | YES | 0 |  |  |
| `discount_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_discount_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `tax_percent` | decimal(12,4) | NO | 0.0000 |  |  |
| `tax_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_tax_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `price_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_price_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `applied_tax_rate` | varchar(255) | YES | NULL |  |  |
| `is_calculate_tax` | tinyint(1) | NO | 1 |  |  |
| `cart_address_id` | int unsigned | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |
| `cart_id` | int unsigned | YES | NULL | MUL |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| cart_shipping_rates_cart_id_foreign | cart_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| cart_shipping_rates_cart_id_foreign | `cart_id` | `cart` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 3,
        "carrier": "flatrate",
        "carrier_title": "Flat Rate",
        "method": "flatrate_flatrate",
        "method_title": "Flat Rate",
        "method_description": "Flat Rate Shipping",
        "price": 10,
        "base_price": 10,
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "tax_percent": "0.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "price_incl_tax": "10.0000",
        "base_price_incl_tax": "10.0000",
        "applied_tax_rate": null,
        "is_calculate_tax": 1,
        "cart_address_id": 2,
        "created_at": "2025-12-06 21:16:22",
        "updated_at": "2025-12-06 21:16:22",
        "cart_id": 1
    },
    {
        "id": 4,
        "carrier": "free",
        "carrier_title": "Free Shipping",
        "method": "free_free",
        "method_title": "Free Shipping",
        "method_description": "Free Shipping",
        "price": 0,
        "base_price": 0,
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "tax_percent": "0.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "price_incl_tax": "0.0000",
        "base_price_incl_tax": "0.0000",
        "applied_tax_rate": null,
        "is_calculate_tax": 1,
        "cart_address_id": 2,
        "created_at": "2025-12-06 21:16:22",
        "updated_at": "2025-12-06 21:16:22",
        "cart_id": 1
    },
    {
        "id": 7,
        "carrier": "flatrate",
        "carrier_title": "Flat Rate",
        "method": "flatrate_flatrate",
        "method_title": "Flat Rate",
        "method_description": "Flat Rate Shipping",
        "price": 10,
        "base_price": 10,
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "tax_percent": "0.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "price_incl_tax": "10.0000",
        "base_price_incl_tax": "10.0000",
        "applied_tax_rate": null,
        "is_calculate_tax": 1,
        "cart_address_id": 6,
        "created_at": "2025-12-06 21:44:04",
        "updated_at": "2025-12-06 21:44:04",
        "cart_id": 3
    }
]
```

---

### catalog_rule_channels

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `catalog_rule_id` | int unsigned | NO | NULL | PRI |  |
| `channel_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | catalog_rule_id | Yes | BTREE |
| catalog_rule_channels_channel_id_foreign | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| catalog_rule_channels_catalog_rule_id_foreign | `catalog_rule_id` | `catalog_rules` | `id` |
| catalog_rule_channels_channel_id_foreign | `channel_id` | `channels` | `id` |

---

### catalog_rule_customer_groups

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `catalog_rule_id` | int unsigned | NO | NULL | PRI |  |
| `customer_group_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | catalog_rule_id | Yes | BTREE |
| catalog_rule_customer_groups_customer_group_id_foreign | customer_group_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| catalog_rule_customer_groups_catalog_rule_id_foreign | `catalog_rule_id` | `catalog_rules` | `id` |
| catalog_rule_customer_groups_customer_group_id_foreign | `customer_group_id` | `customer_groups` | `id` |

---

### catalog_rule_product_prices

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `price` | decimal(12,4) | NO | 0.0000 |  |  |
| `rule_date` | date | NO | NULL |  |  |
| `starts_from` | datetime | YES | NULL |  |  |
| `ends_till` | datetime | YES | NULL |  |  |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `customer_group_id` | int unsigned | NO | NULL | MUL |  |
| `catalog_rule_id` | int unsigned | NO | NULL | MUL |  |
| `channel_id` | int unsigned | NO | NULL | MUL |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| catalog_rule_product_prices_product_id_foreign | product_id | No | BTREE |
| catalog_rule_product_prices_customer_group_id_foreign | customer_group_id | No | BTREE |
| catalog_rule_product_prices_catalog_rule_id_foreign | catalog_rule_id | No | BTREE |
| catalog_rule_product_prices_channel_id_foreign | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| catalog_rule_product_prices_catalog_rule_id_foreign | `catalog_rule_id` | `catalog_rules` | `id` |
| catalog_rule_product_prices_channel_id_foreign | `channel_id` | `channels` | `id` |
| catalog_rule_product_prices_customer_group_id_foreign | `customer_group_id` | `customer_groups` | `id` |
| catalog_rule_product_prices_product_id_foreign | `product_id` | `products` | `id` |

---

### catalog_rule_products

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `starts_from` | datetime | YES | NULL |  |  |
| `ends_till` | datetime | YES | NULL |  |  |
| `end_other_rules` | tinyint(1) | NO | 0 |  |  |
| `action_type` | varchar(255) | YES | NULL |  |  |
| `discount_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `sort_order` | int unsigned | NO | 0 |  |  |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `customer_group_id` | int unsigned | NO | NULL | MUL |  |
| `catalog_rule_id` | int unsigned | NO | NULL | MUL |  |
| `channel_id` | int unsigned | NO | NULL | MUL |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| catalog_rule_products_product_id_foreign | product_id | No | BTREE |
| catalog_rule_products_customer_group_id_foreign | customer_group_id | No | BTREE |
| catalog_rule_products_catalog_rule_id_foreign | catalog_rule_id | No | BTREE |
| catalog_rule_products_channel_id_foreign | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| catalog_rule_products_catalog_rule_id_foreign | `catalog_rule_id` | `catalog_rules` | `id` |
| catalog_rule_products_channel_id_foreign | `channel_id` | `channels` | `id` |
| catalog_rule_products_customer_group_id_foreign | `customer_group_id` | `customer_groups` | `id` |
| catalog_rule_products_product_id_foreign | `product_id` | `products` | `id` |

---

### catalog_rules

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `name` | varchar(255) | YES | NULL |  |  |
| `description` | varchar(255) | YES | NULL |  |  |
| `starts_from` | date | YES | NULL |  |  |
| `ends_till` | date | YES | NULL |  |  |
| `status` | tinyint(1) | NO | 0 |  |  |
| `condition_type` | tinyint(1) | NO | 1 |  |  |
| `conditions` | json | YES | NULL |  |  |
| `end_other_rules` | tinyint(1) | NO | 0 |  |  |
| `action_type` | varchar(255) | YES | NULL |  |  |
| `discount_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `sort_order` | int unsigned | NO | 0 |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

---

### categories

**Rows:** 3

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `position` | int | NO | 0 |  |  |
| `logo_path` | text | YES | NULL |  |  |
| `status` | tinyint(1) | NO | 0 |  |  |
| `display_mode` | varchar(255) | YES | products_and_description |  |  |
| `_lft` | int unsigned | NO | 0 | MUL |  |
| `_rgt` | int unsigned | NO | 0 |  |  |
| `parent_id` | int unsigned | YES | NULL |  |  |
| `additional` | json | YES | NULL |  |  |
| `banner_path` | text | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| categories__lft__rgt_parent_id_index | _lft | No | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "position": 1,
        "logo_path": null,
        "status": 1,
        "display_mode": "products_and_description",
        "_lft": 1,
        "_rgt": 6,
        "parent_id": null,
        "additional": null,
        "banner_path": null,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 20:43:08"
    },
    {
        "id": 4,
        "position": 1,
        "logo_path": "category\/4\/IrtSQTqmjG5tdH8Xah7UbJXmmDcw8EWuxBzoCAZ9.webp",
        "status": 1,
        "display_mode": "products_and_description",
        "_lft": 2,
        "_rgt": 3,
        "parent_id": 1,
        "additional": null,
        "banner_path": null,
        "created_at": "2025-12-06 23:15:13",
        "updated_at": "2025-12-06 23:15:37"
    },
    {
        "id": 16,
        "position": 1,
        "logo_path": "category\/16\/vtFPiyW7OuCkzLOZZA5SZpHIsIWorRyMJR3W9D0F.webp",
        "status": 1,
        "display_mode": "products_and_description",
        "_lft": 4,
        "_rgt": 5,
        "parent_id": 1,
        "additional": null,
        "banner_path": null,
        "created_at": "2025-12-07 22:27:22",
        "updated_at": "2025-12-07 22:31:55"
    }
]
```

---

### category_filterable_attributes

**Rows:** 2

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `category_id` | int unsigned | NO | NULL | MUL |  |
| `attribute_id` | int unsigned | NO | NULL | MUL |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| category_filterable_attributes_category_id_foreign | category_id | No | BTREE |
| category_filterable_attributes_attribute_id_foreign | attribute_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| category_filterable_attributes_attribute_id_foreign | `attribute_id` | `attributes` | `id` |
| category_filterable_attributes_category_id_foreign | `category_id` | `categories` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "category_id": 4,
        "attribute_id": 11
    },
    {
        "category_id": 16,
        "attribute_id": 11
    }
]
```

---

### category_translations

**Rows:** 4

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `category_id` | int unsigned | NO | NULL | MUL |  |
| `name` | text | NO | NULL |  |  |
| `slug` | varchar(255) | NO | NULL |  |  |
| `url_path` | varchar(2048) | NO | NULL |  |  |
| `description` | text | YES | NULL |  |  |
| `meta_title` | text | YES | NULL |  |  |
| `meta_description` | text | YES | NULL |  |  |
| `meta_keywords` | text | YES | NULL |  |  |
| `locale_id` | int unsigned | YES | NULL | MUL |  |
| `locale` | varchar(255) | NO | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| category_translations_category_id_slug_locale_unique | category_id | Yes | BTREE |
| category_translations_locale_id_foreign | locale_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| category_translations_category_id_foreign | `category_id` | `categories` | `id` |
| category_translations_locale_id_foreign | `locale_id` | `locales` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "category_id": 1,
        "name": "الرئيسية",
        "slug": "root",
        "url_path": "",
        "description": "وصف الفئة الرئيسية",
        "meta_title": "",
        "meta_description": "",
        "meta_keywords": "",
        "locale_id": null,
        "locale": "ar"
    },
    {
        "id": 4,
        "category_id": 4,
        "name": "Iphones",
        "slug": "iphones",
        "url_path": "",
        "description": "<p>Iphones<\/p>",
        "meta_title": "",
        "meta_description": "",
        "meta_keywords": "",
        "locale_id": 1,
        "locale": "ar"
    },
    {
        "id": 14,
        "category_id": 16,
        "name": "football",
        "slug": "football-football",
        "url_path": "",
        "description": "<p>football<\/p>",
        "meta_title": null,
        "meta_description": null,
        "meta_keywords": null,
        "locale_id": 1,
        "locale": "ar"
    }
]
```

---

### channel_currencies

**Rows:** 10

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `channel_id` | int unsigned | NO | NULL | PRI |  |
| `currency_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | channel_id | Yes | BTREE |
| channel_currencies_currency_id_foreign | currency_id | No | BTREE |
| channel_currencies_cid_cyid_idx | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| channel_currencies_channel_id_foreign | `channel_id` | `channels` | `id` |
| channel_currencies_currency_id_foreign | `currency_id` | `currencies` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "channel_id": 1,
        "currency_id": 1
    },
    {
        "channel_id": 19,
        "currency_id": 1
    },
    {
        "channel_id": 20,
        "currency_id": 1
    }
]
```

---

### channel_inventory_sources

**Rows:** 5

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `channel_id` | int unsigned | NO | NULL | PRI |  |
| `inventory_source_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| channel_inventory_source_unique | channel_id | Yes | BTREE |
| channel_inventory_sources_inventory_source_id_foreign | inventory_source_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| channel_inventory_sources_channel_id_foreign | `channel_id` | `channels` | `id` |
| channel_inventory_sources_inventory_source_id_foreign | `inventory_source_id` | `inventory_sources` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "channel_id": 1,
        "inventory_source_id": 1
    },
    {
        "channel_id": 1,
        "inventory_source_id": 2
    },
    {
        "channel_id": 19,
        "inventory_source_id": 9
    }
]
```

---

### channel_locales

**Rows:** 7

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `channel_id` | int unsigned | NO | NULL | PRI |  |
| `locale_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | channel_id | Yes | BTREE |
| channel_locales_locale_id_foreign | locale_id | No | BTREE |
| channel_locales_cid_lid_idx | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| channel_locales_channel_id_foreign | `channel_id` | `channels` | `id` |
| channel_locales_locale_id_foreign | `locale_id` | `locales` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "channel_id": 1,
        "locale_id": 1
    },
    {
        "channel_id": 19,
        "locale_id": 1
    },
    {
        "channel_id": 20,
        "locale_id": 1
    }
]
```

---

### channel_translations

**Rows:** 4

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `channel_id` | int unsigned | NO | NULL | MUL |  |
| `locale` | varchar(255) | NO | NULL | MUL |  |
| `name` | varchar(255) | NO | NULL |  |  |
| `description` | text | YES | NULL |  |  |
| `maintenance_mode_text` | text | YES | NULL |  |  |
| `home_seo` | json | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| channel_translations_channel_id_locale_unique | channel_id | Yes | BTREE |
| channel_translations_locale_index | locale | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| channel_translations_channel_id_foreign | `channel_id` | `channels` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "channel_id": 1,
        "locale": "ar",
        "name": "افتراضي",
        "description": "",
        "maintenance_mode_text": "",
        "home_seo": "{\"meta_title\": \"متجر تجريبي\", \"meta_keywords\": \"الكلمات الرئيسية للمتجر التجريبي\", \"meta_description\": \"وصف متجر تجريبي\"}",
        "created_at": null,
        "updated_at": "2025-12-07 00:28:03"
    },
    {
        "id": 24,
        "channel_id": 19,
        "locale": "ar",
        "name": "Pro Electronics",
        "description": null,
        "maintenance_mode_text": null,
        "home_seo": null,
        "created_at": "2025-12-07 17:04:40",
        "updated_at": "2025-12-07 17:04:40"
    },
    {
        "id": 25,
        "channel_id": 20,
        "locale": "ar",
        "name": "Extreme Sports",
        "description": null,
        "maintenance_mode_text": null,
        "home_seo": null,
        "created_at": "2025-12-07 17:05:34",
        "updated_at": "2025-12-07 17:05:34"
    }
]
```

---

### channels

**Rows:** 4

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `code` | varchar(255) | NO | NULL |  |  |
| `timezone` | varchar(255) | YES | NULL |  |  |
| `theme` | varchar(255) | YES | NULL |  |  |
| `hostname` | varchar(255) | YES | NULL | MUL |  |
| `logo` | varchar(255) | YES | NULL |  |  |
| `favicon` | varchar(255) | YES | NULL |  |  |
| `home_seo` | json | YES | NULL |  |  |
| `is_maintenance_on` | tinyint(1) | NO | 0 |  |  |
| `allowed_ips` | text | YES | NULL |  |  |
| `root_category_id` | int unsigned | YES | NULL | MUL |  |
| `default_locale_id` | int unsigned | NO | NULL | MUL |  |
| `base_currency_id` | int unsigned | NO | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| channels_root_category_id_foreign | root_category_id | No | BTREE |
| channels_default_locale_id_foreign | default_locale_id | No | BTREE |
| channels_base_currency_id_foreign | base_currency_id | No | BTREE |
| channels_hostname_idx | hostname | No | BTREE |
| channels_hostname_index | hostname | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| channels_base_currency_id_foreign | `base_currency_id` | `currencies` | `id` |
| channels_default_locale_id_foreign | `default_locale_id` | `locales` | `id` |
| channels_root_category_id_foreign | `root_category_id` | `categories` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "code": "default",
        "timezone": null,
        "theme": "default",
        "hostname": "http:\/\/localhost:8000",
        "logo": null,
        "favicon": null,
        "home_seo": null,
        "is_maintenance_on": 0,
        "allowed_ips": "",
        "root_category_id": 1,
        "default_locale_id": 1,
        "base_currency_id": 1,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-07 00:28:03"
    },
    {
        "id": 19,
        "code": "electronics",
        "timezone": null,
        "theme": "default",
        "hostname": "electronics.localhost:8000",
        "logo": null,
        "favicon": null,
        "home_seo": null,
        "is_maintenance_on": 0,
        "allowed_ips": null,
        "root_category_id": 1,
        "default_locale_id": 1,
        "base_currency_id": 1,
        "created_at": "2025-12-07 17:04:40",
        "updated_at": "2025-12-07 17:04:40"
    },
    {
        "id": 20,
        "code": "sports",
        "timezone": null,
        "theme": "default",
        "hostname": "sports.localhost:8000",
        "logo": null,
        "favicon": null,
        "home_seo": null,
        "is_maintenance_on": 0,
        "allowed_ips": null,
        "root_category_id": 1,
        "default_locale_id": 1,
        "base_currency_id": 1,
        "created_at": "2025-12-07 17:05:34",
        "updated_at": "2025-12-07 17:05:34"
    }
]
```

---

### cms_page_channels

**Rows:** 10

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `cms_page_id` | int unsigned | NO | NULL | PRI |  |
| `channel_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| cms_page_channels_cms_page_id_channel_id_unique | cms_page_id | Yes | BTREE |
| cms_page_channels_channel_id_foreign | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| cms_page_channels_channel_id_foreign | `channel_id` | `channels` | `id` |
| cms_page_channels_cms_page_id_foreign | `cms_page_id` | `cms_pages` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "cms_page_id": 1,
        "channel_id": 1
    },
    {
        "cms_page_id": 2,
        "channel_id": 1
    },
    {
        "cms_page_id": 3,
        "channel_id": 1
    }
]
```

---

### cms_page_translations

**Rows:** 10

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `page_title` | varchar(255) | NO | NULL |  |  |
| `url_key` | varchar(255) | NO | NULL |  |  |
| `html_content` | longtext | YES | NULL |  |  |
| `meta_title` | text | YES | NULL |  |  |
| `meta_description` | text | YES | NULL |  |  |
| `meta_keywords` | text | YES | NULL |  |  |
| `locale` | varchar(255) | NO | NULL |  |  |
| `cms_page_id` | int unsigned | NO | NULL | MUL |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| cms_page_translations_cms_page_id_url_key_locale_unique | cms_page_id | Yes | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| cms_page_translations_cms_page_id_foreign | `cms_page_id` | `cms_pages` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "page_title": "من نحن",
        "url_key": "about-us",
        "html_content": "<div class=\"static-container\"><div class=\"mb-5\">محتوى صفحة من نحن<\/div><\/div>",
        "meta_title": "about us",
        "meta_description": "",
        "meta_keywords": "aboutus",
        "locale": "ar",
        "cms_page_id": 1
    },
    {
        "id": 2,
        "page_title": "سياسة الإرجاع",
        "url_key": "return-policy",
        "html_content": "<div class=\"static-container\"><div class=\"mb-5\">محتوى صفحة سياسة الإرجاع<\/div><\/div>",
        "meta_title": "return policy",
        "meta_description": "",
        "meta_keywords": "return, policy",
        "locale": "ar",
        "cms_page_id": 2
    },
    {
        "id": 3,
        "page_title": "سياسة الاسترداد",
        "url_key": "refund-policy",
        "html_content": "<div class=\"static-container\"><div class=\"mb-5\">محتوى صفحة سياسة الاسترداد<\/div><\/div>",
        "meta_title": "Refund policy",
        "meta_description": "",
        "meta_keywords": "refund, policy",
        "locale": "ar",
        "cms_page_id": 3
    }
]
```

---

### cms_pages

**Rows:** 10

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `layout` | varchar(255) | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "layout": null,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 20:43:08"
    },
    {
        "id": 2,
        "layout": null,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 20:43:08"
    },
    {
        "id": 3,
        "layout": null,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 20:43:08"
    }
]
```

---

### compare_items

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `customer_id` | int unsigned | NO | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| compare_items_product_id_foreign | product_id | No | BTREE |
| compare_items_customer_id_foreign | customer_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| compare_items_customer_id_foreign | `customer_id` | `customers` | `id` |
| compare_items_product_id_foreign | `product_id` | `products` | `id` |

---

### core_config

**Rows:** 20

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `code` | varchar(255) | NO | NULL |  |  |
| `value` | text | NO | NULL |  |  |
| `channel_code` | varchar(255) | YES | NULL |  |  |
| `locale_code` | varchar(255) | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "code": "sales.checkout.shopping_cart.allow_guest_checkout",
        "value": "1",
        "channel_code": null,
        "locale_code": null,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 20:43:08"
    },
    {
        "id": 2,
        "code": "emails.general.notifications.emails.general.notifications.registration",
        "value": "1",
        "channel_code": null,
        "locale_code": null,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 20:43:08"
    },
    {
        "id": 3,
        "code": "emails.general.notifications.emails.general.notifications.customer_registration_confirmation_mail_to_admin",
        "value": "0",
        "channel_code": null,
        "locale_code": null,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 20:43:08"
    }
]
```

---

### countries

**Rows:** 254

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `code` | varchar(255) | NO | NULL |  |  |
| `name` | varchar(255) | NO | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "code": "AF",
        "name": "Afghanistan"
    },
    {
        "id": 2,
        "code": "AX",
        "name": "Åland Islands"
    },
    {
        "id": 3,
        "code": "AL",
        "name": "Albania"
    }
]
```

---

### country_state_translations

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `country_state_id` | int unsigned | NO | NULL | MUL |  |
| `locale` | varchar(255) | NO | NULL |  |  |
| `default_name` | text | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| country_state_translations_country_state_id_foreign | country_state_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| country_state_translations_country_state_id_foreign | `country_state_id` | `country_states` | `id` |

---

### country_states

**Rows:** 586

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `country_id` | int unsigned | YES | NULL | MUL |  |
| `country_code` | varchar(255) | YES | NULL |  |  |
| `code` | varchar(255) | YES | NULL |  |  |
| `default_name` | varchar(255) | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| country_states_country_id_foreign | country_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| country_states_country_id_foreign | `country_id` | `countries` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "country_id": 244,
        "country_code": "US",
        "code": "AL",
        "default_name": "Alabama"
    },
    {
        "id": 2,
        "country_id": 244,
        "country_code": "US",
        "code": "AK",
        "default_name": "Alaska"
    },
    {
        "id": 3,
        "country_id": 244,
        "country_code": "US",
        "code": "AS",
        "default_name": "American Samoa"
    }
]
```

---

### country_translations

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `country_id` | int unsigned | NO | NULL | MUL |  |
| `locale` | varchar(255) | NO | NULL |  |  |
| `name` | text | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| country_translations_country_id_foreign | country_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| country_translations_country_id_foreign | `country_id` | `countries` | `id` |

---

### currencies

**Rows:** 3

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `code` | varchar(255) | NO | NULL |  |  |
| `name` | varchar(255) | NO | NULL |  |  |
| `symbol` | varchar(255) | YES | NULL |  |  |
| `decimal` | int unsigned | NO | 2 |  |  |
| `group_separator` | varchar(255) | NO | , |  |  |
| `decimal_separator` | varchar(255) | NO | . |  |  |
| `currency_position` | varchar(255) | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "code": "EGP",
        "name": "الجنيه المصري",
        "symbol": "E£",
        "decimal": 2,
        "group_separator": ",",
        "decimal_separator": ".",
        "currency_position": null,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "code": "USD",
        "name": "US Dollar",
        "symbol": "$",
        "decimal": 2,
        "group_separator": ",",
        "decimal_separator": ".",
        "currency_position": null,
        "created_at": "2025-12-07 14:46:12",
        "updated_at": "2025-12-07 14:46:12"
    },
    {
        "id": 3,
        "code": "SAR",
        "name": "Saudi Riyal",
        "symbol": "SR",
        "decimal": 2,
        "group_separator": ",",
        "decimal_separator": ".",
        "currency_position": null,
        "created_at": "2025-12-07 14:57:08",
        "updated_at": "2025-12-07 14:57:08"
    }
]
```

---

### currency_exchange_rates

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `rate` | decimal(24,12) | NO | NULL |  |  |
| `target_currency` | int unsigned | NO | NULL | UNI |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| currency_exchange_rates_target_currency_unique | target_currency | Yes | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| currency_exchange_rates_target_currency_foreign | `target_currency` | `currencies` | `id` |

---

### customer_groups

**Rows:** 3

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `code` | varchar(255) | NO | NULL | UNI |  |
| `name` | varchar(255) | NO | NULL |  |  |
| `is_user_defined` | tinyint(1) | NO | 1 |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| customer_groups_code_unique | code | Yes | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "code": "guest",
        "name": "زائر",
        "is_user_defined": 0,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "code": "general",
        "name": "عام",
        "is_user_defined": 0,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 3,
        "code": "wholesale",
        "name": "جملة",
        "is_user_defined": 0,
        "created_at": null,
        "updated_at": null
    }
]
```

---

### customer_notes

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `customer_id` | int unsigned | YES | NULL | MUL |  |
| `note` | text | NO | NULL |  |  |
| `customer_notified` | tinyint(1) | NO | 0 |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| customer_notes_customer_id_foreign | customer_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| customer_notes_customer_id_foreign | `customer_id` | `customers` | `id` |

---

### customer_password_resets

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `email` | varchar(255) | NO | NULL | MUL |  |
| `token` | varchar(255) | NO | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| customer_password_resets_email_index | email | No | BTREE |

---

### customer_social_accounts

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `customer_id` | int unsigned | NO | NULL | MUL |  |
| `provider_name` | varchar(255) | YES | NULL |  |  |
| `provider_id` | varchar(255) | YES | NULL | UNI |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| customer_social_accounts_provider_id_unique | provider_id | Yes | BTREE |
| customer_social_accounts_customer_id_foreign | customer_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| customer_social_accounts_customer_id_foreign | `customer_id` | `customers` | `id` |

---

### customers

**Rows:** 5

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `first_name` | varchar(255) | NO | NULL |  |  |
| `last_name` | varchar(255) | NO | NULL |  |  |
| `gender` | varchar(50) | YES | NULL |  |  |
| `date_of_birth` | date | YES | NULL |  |  |
| `email` | varchar(255) | YES | NULL | UNI |  |
| `phone` | varchar(255) | YES | NULL | UNI |  |
| `image` | varchar(255) | YES | NULL |  |  |
| `status` | tinyint | NO | 1 |  |  |
| `password` | varchar(255) | YES | NULL |  |  |
| `api_token` | varchar(80) | YES | NULL | UNI |  |
| `customer_group_id` | int unsigned | YES | NULL | MUL |  |
| `channel_id` | int unsigned | YES | NULL | MUL |  |
| `subscribed_to_news_letter` | tinyint(1) | NO | 0 |  |  |
| `is_verified` | tinyint(1) | NO | 0 |  |  |
| `is_suspended` | tinyint unsigned | NO | 0 |  |  |
| `token` | varchar(255) | YES | NULL |  |  |
| `remember_token` | varchar(100) | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| customers_email_unique | email | Yes | BTREE |
| customers_phone_unique | phone | Yes | BTREE |
| customers_api_token_unique | api_token | Yes | BTREE |
| customers_customer_group_id_foreign | customer_group_id | No | BTREE |
| customers_channel_id_index | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| customers_channel_id_foreign | `channel_id` | `channels` | `id` |
| customers_customer_group_id_foreign | `customer_group_id` | `customer_groups` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "first_name": "ahmed",
        "last_name": "ali",
        "gender": null,
        "date_of_birth": null,
        "email": "test@test.com",
        "phone": null,
        "image": null,
        "status": 1,
        "password": "$2y$12$INpZG8ON8tqFx3zDfcAlLOlgjisPe.TzxenDUWrmVFM4LL9nwx9ae",
        "api_token": "sdZLoSlc3ejHHFx41RKtNC2gyUcQtwlZrLH0dIPDs6PR5Ud0cqdNfVTh3BzFbvJVc9umreWqqW4aoubL",
        "customer_group_id": 2,
        "channel_id": 19,
        "subscribed_to_news_letter": 0,
        "is_verified": 1,
        "is_suspended": 0,
        "token": "701d8c76384c8623e462a517c28005b0",
        "remember_token": null,
        "created_at": "2025-12-06 17:37:04",
        "updated_at": "2025-12-06 17:37:04"
    },
    {
        "id": 2,
        "first_name": "ahmed",
        "last_name": "ali",
        "gender": null,
        "date_of_birth": null,
        "email": "t@t.com",
        "phone": null,
        "image": null,
        "status": 1,
        "password": "$2y$12$UT2S8CpsFlbjfvwvx4hhgODu4033DTy4jhKNXarrJbqcEROifvf1S",
        "api_token": "1COnNKHNqSzaiGjinMIo3vYYHBDfF8TDkAKrhPIv9XblDSjZd1Sly85w25bbspxYk6Z0tV2zvoBxZtbk",
        "customer_group_id": 2,
        "channel_id": 19,
        "subscribed_to_news_letter": 0,
        "is_verified": 1,
        "is_suspended": 0,
        "token": "8d6ad94d52ea18800e3316dc6608fc0f",
        "remember_token": null,
        "created_at": "2025-12-06 21:32:43",
        "updated_at": "2025-12-06 21:32:43"
    },
    {
        "id": 3,
        "first_name": "ahmed",
        "last_name": "ali",
        "gender": null,
        "date_of_birth": null,
        "email": "gabryjabry@gmail.com",
        "phone": null,
        "image": null,
        "status": 1,
        "password": "$2y$12$GJeMfQzuaORwhRnpYxGy2uaiOMOjbKNLnJo\/4EMX54E6LLiitBp8W",
        "api_token": "KjtU6BPRsA88KDMPdNcz7bn1bnVcnNzNg309YXfDJ4Q2VM0aoZSFWlXejMcs9LeisVDrJgwbwmCNNx4h",
        "customer_group_id": 2,
        "channel_id": 19,
        "subscribed_to_news_letter": 0,
        "is_verified": 1,
        "is_suspended": 0,
        "token": "073af173600f3de3c50005dd67cce7e1",
        "remember_token": null,
        "created_at": "2025-12-06 21:37:02",
        "updated_at": "2025-12-06 21:37:02"
    }
]
```

---

### datagrid_saved_filters

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `user_id` | int unsigned | NO | NULL | MUL |  |
| `name` | varchar(255) | NO | NULL |  |  |
| `src` | varchar(255) | NO | NULL |  |  |
| `applied` | json | NO | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| datagrid_saved_filters_user_id_name_src_unique | user_id | Yes | BTREE |

---

### downloadable_link_purchased

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `product_name` | varchar(255) | YES | NULL |  |  |
| `name` | varchar(255) | YES | NULL |  |  |
| `url` | varchar(255) | YES | NULL |  |  |
| `file` | varchar(255) | YES | NULL |  |  |
| `file_name` | varchar(255) | YES | NULL |  |  |
| `type` | varchar(255) | NO | NULL |  |  |
| `download_bought` | int | NO | 0 |  |  |
| `download_used` | int | NO | 0 |  |  |
| `status` | varchar(255) | YES | NULL |  |  |
| `customer_id` | int unsigned | NO | NULL | MUL |  |
| `order_id` | int unsigned | NO | NULL | MUL |  |
| `order_item_id` | int unsigned | NO | NULL | MUL |  |
| `download_canceled` | int | NO | 0 |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| downloadable_link_purchased_customer_id_foreign | customer_id | No | BTREE |
| downloadable_link_purchased_order_id_foreign | order_id | No | BTREE |
| downloadable_link_purchased_order_item_id_foreign | order_item_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| downloadable_link_purchased_customer_id_foreign | `customer_id` | `customers` | `id` |
| downloadable_link_purchased_order_id_foreign | `order_id` | `orders` | `id` |
| downloadable_link_purchased_order_item_id_foreign | `order_item_id` | `order_items` | `id` |

---

### failed_jobs

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `uuid` | varchar(255) | NO | NULL | UNI |  |
| `connection` | text | NO | NULL |  |  |
| `queue` | text | NO | NULL |  |  |
| `payload` | longtext | NO | NULL |  |  |
| `exception` | longtext | NO | NULL |  |  |
| `failed_at` | timestamp | NO | CURRENT_TIMESTAMP |  | DEFAULT_GENERATED |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| failed_jobs_uuid_unique | uuid | Yes | BTREE |

---

### gdpr_data_request

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `customer_id` | int unsigned | NO | NULL | MUL |  |
| `email` | varchar(255) | NO | NULL |  |  |
| `status` | varchar(255) | NO | NULL |  |  |
| `type` | varchar(255) | NO | NULL |  |  |
| `message` | varchar(500) | NO | NULL |  |  |
| `revoked_at` | timestamp | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| gdpr_data_request_customer_id_foreign | customer_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| gdpr_data_request_customer_id_foreign | `customer_id` | `customers` | `id` |

---

### import_batches

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `state` | varchar(255) | NO | pending |  |  |
| `data` | json | NO | NULL |  |  |
| `summary` | json | YES | NULL |  |  |
| `import_id` | int unsigned | NO | NULL | MUL |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| import_batches_import_id_foreign | import_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| import_batches_import_id_foreign | `import_id` | `imports` | `id` |

---

### imports

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `state` | varchar(255) | NO | pending |  |  |
| `process_in_queue` | tinyint(1) | NO | 1 |  |  |
| `type` | varchar(255) | NO | NULL |  |  |
| `action` | varchar(255) | NO | NULL |  |  |
| `validation_strategy` | varchar(255) | NO | NULL |  |  |
| `allowed_errors` | int | NO | 0 |  |  |
| `processed_rows_count` | int | NO | 0 |  |  |
| `invalid_rows_count` | int | NO | 0 |  |  |
| `errors_count` | int | NO | 0 |  |  |
| `errors` | json | YES | NULL |  |  |
| `field_separator` | varchar(255) | NO | NULL |  |  |
| `file_path` | varchar(255) | NO | NULL |  |  |
| `images_directory_path` | varchar(255) | YES | NULL |  |  |
| `error_file_path` | varchar(255) | YES | NULL |  |  |
| `summary` | json | YES | NULL |  |  |
| `started_at` | datetime | YES | NULL |  |  |
| `completed_at` | datetime | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

---

### inventory_sources

**Rows:** 10

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `code` | varchar(255) | NO | NULL | UNI |  |
| `name` | varchar(255) | NO | NULL |  |  |
| `description` | text | YES | NULL |  |  |
| `contact_name` | varchar(255) | NO | NULL |  |  |
| `contact_email` | varchar(255) | NO | NULL |  |  |
| `contact_number` | varchar(255) | NO | NULL |  |  |
| `contact_fax` | varchar(255) | YES | NULL |  |  |
| `country` | varchar(255) | NO | NULL |  |  |
| `state` | varchar(255) | NO | NULL |  |  |
| `city` | varchar(255) | NO | NULL |  |  |
| `street` | varchar(255) | NO | NULL |  |  |
| `postcode` | varchar(255) | NO | NULL |  |  |
| `priority` | int | NO | 0 |  |  |
| `latitude` | decimal(10,5) | YES | NULL |  |  |
| `longitude` | decimal(10,5) | YES | NULL |  |  |
| `status` | tinyint(1) | NO | 1 |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| inventory_sources_code_unique | code | Yes | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "code": "default",
        "name": "افتراضي",
        "description": null,
        "contact_name": "افتراضي",
        "contact_email": "warehouse@example.com",
        "contact_number": "1234567899",
        "contact_fax": null,
        "country": "US",
        "state": "MI",
        "city": "Detroit",
        "street": "12th Street",
        "postcode": "48127",
        "priority": 0,
        "latitude": null,
        "longitude": null,
        "status": 1,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "code": "store2",
        "name": "store 2",
        "description": "",
        "contact_name": "store 2",
        "contact_email": "store@gmail.com",
        "contact_number": "0124321433",
        "contact_fax": "",
        "country": "EG",
        "state": "sa",
        "city": "da",
        "street": "sas",
        "postcode": "12312",
        "priority": 0,
        "latitude": "0.00000",
        "longitude": "0.00000",
        "status": 1,
        "created_at": "2025-12-07 00:22:05",
        "updated_at": "2025-12-07 00:22:11"
    },
    {
        "id": 4,
        "code": "seller3_warehouse",
        "name": "seller3 Warehouse",
        "description": "Main warehouse for seller3",
        "contact_name": "Warehouse Manager",
        "contact_email": "warehouse@seller3.com",
        "contact_number": "1234567890",
        "contact_fax": null,
        "country": "EG",
        "state": "Cairo",
        "city": "Cairo",
        "street": "123 Main St",
        "postcode": "11511",
        "priority": 0,
        "latitude": null,
        "longitude": null,
        "status": 1,
        "created_at": "2025-12-07 14:11:08",
        "updated_at": "2025-12-07 14:11:08"
    }
]
```

---

### invoice_items

**Rows:** 3

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `parent_id` | int unsigned | YES | NULL | MUL |  |
| `name` | varchar(255) | YES | NULL |  |  |
| `description` | varchar(255) | YES | NULL |  |  |
| `sku` | varchar(255) | YES | NULL |  |  |
| `qty` | int | YES | NULL |  |  |
| `price` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_price` | decimal(12,4) | NO | 0.0000 |  |  |
| `total` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_total` | decimal(12,4) | NO | 0.0000 |  |  |
| `tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_percent` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `price_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_price_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `product_id` | int unsigned | YES | NULL |  |  |
| `product_type` | varchar(255) | YES | NULL |  |  |
| `order_item_id` | int unsigned | YES | NULL |  |  |
| `invoice_id` | int unsigned | YES | NULL | MUL |  |
| `additional` | json | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| invoice_items_invoice_id_foreign | invoice_id | No | BTREE |
| invoice_items_parent_id_foreign | parent_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| invoice_items_invoice_id_foreign | `invoice_id` | `invoices` | `id` |
| invoice_items_parent_id_foreign | `parent_id` | `invoice_items` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "parent_id": null,
        "name": "Iphone 17",
        "description": null,
        "sku": "12141",
        "qty": 1,
        "price": "63000.0000",
        "base_price": "63000.0000",
        "total": "63000.0000",
        "base_total": "63000.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "discount_percent": "0.0000",
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "price_incl_tax": "63000.0000",
        "base_price_incl_tax": "63000.0000",
        "total_incl_tax": "63000.0000",
        "base_total_incl_tax": "63000.0000",
        "product_id": 12,
        "product_type": "Webkul\\Product\\Models\\Product",
        "order_item_id": 2,
        "invoice_id": 1,
        "additional": "{\"locale\": \"ar\", \"cart_id\": 3, \"quantity\": 1, \"is_buy_now\": \"0\", \"product_id\": \"12\"}",
        "created_at": "2025-12-06 21:44:56",
        "updated_at": "2025-12-06 21:44:56"
    },
    {
        "id": 2,
        "parent_id": null,
        "name": "Iphone 17",
        "description": null,
        "sku": "12141",
        "qty": 6,
        "price": "63000.0000",
        "base_price": "63000.0000",
        "total": "378000.0000",
        "base_total": "378000.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "discount_percent": "0.0000",
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "price_incl_tax": "63000.0000",
        "base_price_incl_tax": "63000.0000",
        "total_incl_tax": "378000.0000",
        "base_total_incl_tax": "378000.0000",
        "product_id": 12,
        "product_type": "Webkul\\Product\\Models\\Product",
        "order_item_id": 3,
        "invoice_id": 2,
        "additional": "{\"locale\": \"ar\", \"cart_id\": 4, \"quantity\": 6, \"product_id\": 12}",
        "created_at": "2025-12-07 00:28:41",
        "updated_at": "2025-12-07 00:28:41"
    },
    {
        "id": 3,
        "parent_id": null,
        "name": "Iphone 17",
        "description": null,
        "sku": "12141",
        "qty": 1,
        "price": "63000.0000",
        "base_price": "63000.0000",
        "total": "63000.0000",
        "base_total": "63000.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "discount_percent": "0.0000",
        "discount_amount": "6300.0000",
        "base_discount_amount": "6300.0000",
        "price_incl_tax": "63000.0000",
        "base_price_incl_tax": "63000.0000",
        "total_incl_tax": "63000.0000",
        "base_total_incl_tax": "63000.0000",
        "product_id": 12,
        "product_type": "Webkul\\Product\\Models\\Product",
        "order_item_id": 4,
        "invoice_id": 3,
        "additional": "{\"locale\": \"ar\", \"cart_id\": 6, \"quantity\": 1, \"product_id\": 12}",
        "created_at": "2025-12-07 02:28:52",
        "updated_at": "2025-12-07 02:28:52"
    }
]
```

---

### invoices

**Rows:** 3

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `increment_id` | varchar(255) | YES | NULL |  |  |
| `state` | varchar(255) | YES | NULL |  |  |
| `email_sent` | tinyint(1) | NO | 0 |  |  |
| `total_qty` | int | YES | NULL |  |  |
| `base_currency_code` | varchar(255) | YES | NULL |  |  |
| `channel_currency_code` | varchar(255) | YES | NULL |  |  |
| `order_currency_code` | varchar(255) | YES | NULL |  |  |
| `sub_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_sub_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `grand_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_grand_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `shipping_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_shipping_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `shipping_tax_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_shipping_tax_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `sub_total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_sub_total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `shipping_amount_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_shipping_amount_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `order_id` | int unsigned | YES | NULL | MUL |  |
| `transaction_id` | varchar(255) | YES | NULL |  |  |
| `reminders` | int | NO | 0 |  |  |
| `next_reminder_at` | timestamp | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| invoices_order_id_foreign | order_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| invoices_order_id_foreign | `order_id` | `orders` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "increment_id": "1",
        "state": "paid",
        "email_sent": 1,
        "total_qty": 1,
        "base_currency_code": "EGP",
        "channel_currency_code": "EGP",
        "order_currency_code": "EGP",
        "sub_total": "63000.0000",
        "base_sub_total": "63000.0000",
        "grand_total": "63010.0000",
        "base_grand_total": "63010.0000",
        "shipping_amount": "10.0000",
        "base_shipping_amount": "10.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "shipping_tax_amount": "0.0000",
        "base_shipping_tax_amount": "0.0000",
        "sub_total_incl_tax": "63000.0000",
        "base_sub_total_incl_tax": "63000.0000",
        "shipping_amount_incl_tax": "10.0000",
        "base_shipping_amount_incl_tax": "10.0000",
        "order_id": 2,
        "transaction_id": null,
        "reminders": 0,
        "next_reminder_at": null,
        "created_at": "2025-12-06 21:44:56",
        "updated_at": "2025-12-07 02:28:52"
    },
    {
        "id": 2,
        "increment_id": "2",
        "state": "paid",
        "email_sent": 1,
        "total_qty": 6,
        "base_currency_code": "EGP",
        "channel_currency_code": "EGP",
        "order_currency_code": "EGP",
        "sub_total": "378000.0000",
        "base_sub_total": "378000.0000",
        "grand_total": "378000.0000",
        "base_grand_total": "378000.0000",
        "shipping_amount": "0.0000",
        "base_shipping_amount": "0.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "shipping_tax_amount": "0.0000",
        "base_shipping_tax_amount": "0.0000",
        "sub_total_incl_tax": "378000.0000",
        "base_sub_total_incl_tax": "378000.0000",
        "shipping_amount_incl_tax": "0.0000",
        "base_shipping_amount_incl_tax": "0.0000",
        "order_id": 3,
        "transaction_id": null,
        "reminders": 0,
        "next_reminder_at": null,
        "created_at": "2025-12-07 00:28:41",
        "updated_at": "2025-12-07 02:28:52"
    },
    {
        "id": 3,
        "increment_id": "3",
        "state": "paid",
        "email_sent": 1,
        "total_qty": 1,
        "base_currency_code": "EGP",
        "channel_currency_code": "EGP",
        "order_currency_code": "EGP",
        "sub_total": "63000.0000",
        "base_sub_total": "63000.0000",
        "grand_total": "56710.0000",
        "base_grand_total": "56710.0000",
        "shipping_amount": "10.0000",
        "base_shipping_amount": "10.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "discount_amount": "6300.0000",
        "base_discount_amount": "6300.0000",
        "shipping_tax_amount": "0.0000",
        "base_shipping_tax_amount": "0.0000",
        "sub_total_incl_tax": "63000.0000",
        "base_sub_total_incl_tax": "63000.0000",
        "shipping_amount_incl_tax": "10.0000",
        "base_shipping_amount_incl_tax": "10.0000",
        "order_id": 4,
        "transaction_id": null,
        "reminders": 0,
        "next_reminder_at": null,
        "created_at": "2025-12-07 02:28:52",
        "updated_at": "2025-12-07 02:28:52"
    }
]
```

---

### job_batches

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | varchar(255) | NO | NULL | PRI |  |
| `name` | varchar(255) | NO | NULL |  |  |
| `total_jobs` | int | NO | NULL |  |  |
| `pending_jobs` | int | NO | NULL |  |  |
| `failed_jobs` | int | NO | NULL |  |  |
| `failed_job_ids` | text | NO | NULL |  |  |
| `options` | mediumtext | YES | NULL |  |  |
| `cancelled_at` | int | YES | NULL |  |  |
| `created_at` | int | NO | NULL |  |  |
| `finished_at` | int | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

---

### jobs

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `queue` | varchar(255) | NO | NULL | MUL |  |
| `payload` | longtext | NO | NULL |  |  |
| `attempts` | tinyint unsigned | NO | NULL |  |  |
| `reserved_at` | int unsigned | YES | NULL |  |  |
| `available_at` | int unsigned | NO | NULL |  |  |
| `created_at` | int unsigned | NO | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| jobs_queue_index | queue | No | BTREE |

---

### locales

**Rows:** 2

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `code` | varchar(255) | NO | NULL | UNI |  |
| `name` | varchar(255) | NO | NULL |  |  |
| `direction` | enum('ltr','rtl') | NO | ltr |  |  |
| `logo_path` | varchar(255) | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| locales_code_unique | code | Yes | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "code": "ar",
        "name": "العربية",
        "direction": "rtl",
        "logo_path": null,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "code": "en",
        "name": "English",
        "direction": "ltr",
        "logo_path": null,
        "created_at": "2025-12-07 14:46:01",
        "updated_at": "2025-12-07 14:46:01"
    }
]
```

---

### marketing_campaigns

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `name` | varchar(255) | NO | NULL |  |  |
| `subject` | varchar(255) | NO | NULL |  |  |
| `status` | tinyint(1) | NO | 0 |  |  |
| `type` | varchar(255) | NO | NULL |  |  |
| `mail_to` | varchar(255) | NO | NULL |  |  |
| `spooling` | varchar(255) | YES | NULL |  |  |
| `channel_id` | int unsigned | YES | NULL | MUL |  |
| `customer_group_id` | int unsigned | YES | NULL | MUL |  |
| `marketing_template_id` | int unsigned | YES | NULL | MUL |  |
| `marketing_event_id` | int unsigned | YES | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| marketing_campaigns_channel_id_foreign | channel_id | No | BTREE |
| marketing_campaigns_customer_group_id_foreign | customer_group_id | No | BTREE |
| marketing_campaigns_marketing_template_id_foreign | marketing_template_id | No | BTREE |
| marketing_campaigns_marketing_event_id_foreign | marketing_event_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| marketing_campaigns_channel_id_foreign | `channel_id` | `channels` | `id` |
| marketing_campaigns_customer_group_id_foreign | `customer_group_id` | `customer_groups` | `id` |
| marketing_campaigns_marketing_event_id_foreign | `marketing_event_id` | `marketing_events` | `id` |
| marketing_campaigns_marketing_template_id_foreign | `marketing_template_id` | `marketing_templates` | `id` |

---

### marketing_events

**Rows:** 1

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `name` | varchar(255) | NO | NULL |  |  |
| `description` | text | YES | NULL |  |  |
| `date` | date | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "name": "Birthday",
        "description": "Birthday",
        "date": null,
        "created_at": null,
        "updated_at": null
    }
]
```

---

### marketing_templates

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `name` | varchar(255) | NO | NULL |  |  |
| `status` | varchar(255) | NO | NULL |  |  |
| `content` | text | NO | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

---

### migrations

**Rows:** 166

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `migration` | varchar(255) | NO | NULL |  |  |
| `batch` | int | NO | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "migration": "2014_10_12_000000_create_users_table",
        "batch": 1
    },
    {
        "id": 2,
        "migration": "2014_10_12_100000_create_admin_password_resets_table",
        "batch": 1
    },
    {
        "id": 3,
        "migration": "2014_10_12_100000_create_password_resets_table",
        "batch": 1
    }
]
```

---

### notifications

**Rows:** 3

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `type` | varchar(255) | NO | NULL |  |  |
| `read` | tinyint(1) | NO | 0 |  |  |
| `order_id` | int unsigned | NO | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| notifications_order_id_foreign | order_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| notifications_order_id_foreign | `order_id` | `orders` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "type": "order",
        "read": 1,
        "order_id": 2,
        "created_at": "2025-12-06 21:44:07",
        "updated_at": "2025-12-06 22:30:02"
    },
    {
        "id": 2,
        "type": "order",
        "read": 0,
        "order_id": 3,
        "created_at": "2025-12-07 00:27:07",
        "updated_at": "2025-12-07 00:27:07"
    },
    {
        "id": 3,
        "type": "order",
        "read": 0,
        "order_id": 4,
        "created_at": "2025-12-07 02:28:19",
        "updated_at": "2025-12-07 02:28:19"
    }
]
```

---

### order_comments

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `order_id` | int unsigned | YES | NULL | MUL |  |
| `comment` | text | NO | NULL |  |  |
| `customer_notified` | tinyint(1) | NO | 0 |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| order_comments_order_id_foreign | order_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| order_comments_order_id_foreign | `order_id` | `orders` | `id` |

---

### order_items

**Rows:** 3

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `sku` | varchar(255) | YES | NULL |  |  |
| `type` | varchar(255) | YES | NULL |  |  |
| `name` | varchar(255) | YES | NULL |  |  |
| `coupon_code` | varchar(255) | YES | NULL |  |  |
| `weight` | decimal(12,4) | YES | 0.0000 |  |  |
| `total_weight` | decimal(12,4) | YES | 0.0000 |  |  |
| `qty_ordered` | int | YES | 0 |  |  |
| `qty_shipped` | int | YES | 0 |  |  |
| `qty_invoiced` | int | YES | 0 |  |  |
| `qty_canceled` | int | YES | 0 |  |  |
| `qty_refunded` | int | YES | 0 |  |  |
| `price` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_price` | decimal(12,4) | NO | 0.0000 |  |  |
| `total` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_total` | decimal(12,4) | NO | 0.0000 |  |  |
| `total_invoiced` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_total_invoiced` | decimal(12,4) | NO | 0.0000 |  |  |
| `amount_refunded` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_amount_refunded` | decimal(12,4) | NO | 0.0000 |  |  |
| `discount_percent` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_discount_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_discount_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `tax_percent` | decimal(12,4) | YES | 0.0000 |  |  |
| `tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `tax_amount_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_tax_amount_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `tax_amount_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_tax_amount_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `price_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_price_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `product_id` | int unsigned | YES | NULL |  |  |
| `product_type` | varchar(255) | YES | NULL |  |  |
| `order_id` | int unsigned | YES | NULL | MUL |  |
| `tax_category_id` | int unsigned | YES | NULL | MUL |  |
| `parent_id` | int unsigned | YES | NULL | MUL |  |
| `additional` | json | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| order_items_order_id_foreign | order_id | No | BTREE |
| order_items_parent_id_foreign | parent_id | No | BTREE |
| order_items_tax_category_id_foreign | tax_category_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| order_items_order_id_foreign | `order_id` | `orders` | `id` |
| order_items_parent_id_foreign | `parent_id` | `order_items` | `id` |
| order_items_tax_category_id_foreign | `tax_category_id` | `tax_categories` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 2,
        "sku": "12141",
        "type": "simple",
        "name": "Iphone 17",
        "coupon_code": null,
        "weight": "123.0000",
        "total_weight": "123.0000",
        "qty_ordered": 1,
        "qty_shipped": 1,
        "qty_invoiced": 1,
        "qty_canceled": 0,
        "qty_refunded": 0,
        "price": "63000.0000",
        "base_price": "63000.0000",
        "total": "63000.0000",
        "base_total": "63000.0000",
        "total_invoiced": "63000.0000",
        "base_total_invoiced": "63000.0000",
        "amount_refunded": "0.0000",
        "base_amount_refunded": "0.0000",
        "discount_percent": "0.0000",
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "discount_invoiced": "0.0000",
        "base_discount_invoiced": "0.0000",
        "discount_refunded": "0.0000",
        "base_discount_refunded": "0.0000",
        "tax_percent": "0.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "tax_amount_invoiced": "0.0000",
        "base_tax_amount_invoiced": "0.0000",
        "tax_amount_refunded": "0.0000",
        "base_tax_amount_refunded": "0.0000",
        "price_incl_tax": "63000.0000",
        "base_price_incl_tax": "63000.0000",
        "total_incl_tax": "63000.0000",
        "base_total_incl_tax": "63000.0000",
        "product_id": 12,
        "product_type": "Webkul\\Product\\Models\\Product",
        "order_id": 2,
        "tax_category_id": null,
        "parent_id": null,
        "additional": "{\"locale\": \"ar\", \"cart_id\": 3, \"quantity\": 1, \"is_buy_now\": \"0\", \"product_id\": \"12\"}",
        "created_at": "2025-12-06 21:44:07",
        "updated_at": "2025-12-06 23:36:05"
    },
    {
        "id": 3,
        "sku": "12141",
        "type": "simple",
        "name": "Iphone 17",
        "coupon_code": null,
        "weight": "123.0000",
        "total_weight": "738.0000",
        "qty_ordered": 6,
        "qty_shipped": 6,
        "qty_invoiced": 6,
        "qty_canceled": 0,
        "qty_refunded": 0,
        "price": "63000.0000",
        "base_price": "63000.0000",
        "total": "378000.0000",
        "base_total": "378000.0000",
        "total_invoiced": "378000.0000",
        "base_total_invoiced": "378000.0000",
        "amount_refunded": "0.0000",
        "base_amount_refunded": "0.0000",
        "discount_percent": "0.0000",
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "discount_invoiced": "0.0000",
        "base_discount_invoiced": "0.0000",
        "discount_refunded": "0.0000",
        "base_discount_refunded": "0.0000",
        "tax_percent": "0.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "tax_amount_invoiced": "0.0000",
        "base_tax_amount_invoiced": "0.0000",
        "tax_amount_refunded": "0.0000",
        "base_tax_amount_refunded": "0.0000",
        "price_incl_tax": "63000.0000",
        "base_price_incl_tax": "63000.0000",
        "total_incl_tax": "378000.0000",
        "base_total_incl_tax": "378000.0000",
        "product_id": 12,
        "product_type": "Webkul\\Product\\Models\\Product",
        "order_id": 3,
        "tax_category_id": null,
        "parent_id": null,
        "additional": "{\"locale\": \"ar\", \"cart_id\": 4, \"quantity\": 6, \"product_id\": 12}",
        "created_at": "2025-12-07 00:27:07",
        "updated_at": "2025-12-07 00:28:41"
    },
    {
        "id": 4,
        "sku": "12141",
        "type": "simple",
        "name": "Iphone 17",
        "coupon_code": null,
        "weight": "123.0000",
        "total_weight": "123.0000",
        "qty_ordered": 1,
        "qty_shipped": 1,
        "qty_invoiced": 1,
        "qty_canceled": 0,
        "qty_refunded": 0,
        "price": "63000.0000",
        "base_price": "63000.0000",
        "total": "63000.0000",
        "base_total": "63000.0000",
        "total_invoiced": "63000.0000",
        "base_total_invoiced": "63000.0000",
        "amount_refunded": "0.0000",
        "base_amount_refunded": "0.0000",
        "discount_percent": "10.0000",
        "discount_amount": "6300.0000",
        "base_discount_amount": "6300.0000",
        "discount_invoiced": "0.0000",
        "base_discount_invoiced": "0.0000",
        "discount_refunded": "0.0000",
        "base_discount_refunded": "0.0000",
        "tax_percent": "0.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "tax_amount_invoiced": "0.0000",
        "base_tax_amount_invoiced": "0.0000",
        "tax_amount_refunded": "0.0000",
        "base_tax_amount_refunded": "0.0000",
        "price_incl_tax": "63000.0000",
        "base_price_incl_tax": "63000.0000",
        "total_incl_tax": "63000.0000",
        "base_total_incl_tax": "63000.0000",
        "product_id": 12,
        "product_type": "Webkul\\Product\\Models\\Product",
        "order_id": 4,
        "tax_category_id": null,
        "parent_id": null,
        "additional": "{\"locale\": \"ar\", \"cart_id\": 6, \"quantity\": 1, \"product_id\": 12}",
        "created_at": "2025-12-07 02:28:19",
        "updated_at": "2025-12-07 02:28:52"
    }
]
```

---

### order_payment

**Rows:** 3

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `order_id` | int unsigned | YES | NULL | MUL |  |
| `method` | varchar(255) | NO | NULL |  |  |
| `method_title` | varchar(255) | YES | NULL |  |  |
| `additional` | json | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| order_payment_order_id_foreign | order_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| order_payment_order_id_foreign | `order_id` | `orders` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 2,
        "order_id": 2,
        "method": "cashondelivery",
        "method_title": "Cash On Delivery",
        "additional": null,
        "created_at": "2025-12-06 21:44:07",
        "updated_at": "2025-12-06 21:44:07"
    },
    {
        "id": 3,
        "order_id": 3,
        "method": "cashondelivery",
        "method_title": "Cash On Delivery",
        "additional": null,
        "created_at": "2025-12-07 00:27:07",
        "updated_at": "2025-12-07 00:27:07"
    },
    {
        "id": 4,
        "order_id": 4,
        "method": "cashondelivery",
        "method_title": "Cash On Delivery",
        "additional": null,
        "created_at": "2025-12-07 02:28:19",
        "updated_at": "2025-12-07 02:28:19"
    }
]
```

---

### order_transactions

**Rows:** 1

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `transaction_id` | varchar(255) | NO | NULL |  |  |
| `status` | varchar(255) | YES | NULL |  |  |
| `type` | varchar(255) | YES | NULL |  |  |
| `amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `payment_method` | varchar(255) | YES | NULL |  |  |
| `data` | json | YES | NULL |  |  |
| `invoice_id` | int unsigned | NO | NULL |  |  |
| `order_id` | int unsigned | NO | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| order_transactions_order_id_foreign | order_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| order_transactions_order_id_foreign | `order_id` | `orders` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "transaction_id": "dca0d9432c7dadfffc35d9fb086fe4a5",
        "status": "paid",
        "type": "cashondelivery",
        "amount": "56710.0000",
        "payment_method": "cashondelivery",
        "data": null,
        "invoice_id": 3,
        "order_id": 4,
        "created_at": "2025-12-07 02:28:52",
        "updated_at": "2025-12-07 02:28:52"
    }
]
```

---

### orders

**Rows:** 3

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `increment_id` | varchar(255) | NO | NULL | UNI |  |
| `status` | varchar(255) | YES | NULL |  |  |
| `channel_name` | varchar(255) | YES | NULL |  |  |
| `is_guest` | tinyint(1) | YES | NULL |  |  |
| `customer_email` | varchar(255) | YES | NULL |  |  |
| `customer_first_name` | varchar(255) | YES | NULL |  |  |
| `customer_last_name` | varchar(255) | YES | NULL |  |  |
| `shipping_method` | varchar(255) | YES | NULL |  |  |
| `shipping_title` | varchar(255) | YES | NULL |  |  |
| `shipping_description` | varchar(255) | YES | NULL |  |  |
| `coupon_code` | varchar(255) | YES | NULL |  |  |
| `is_gift` | tinyint(1) | NO | 0 |  |  |
| `total_item_count` | int | YES | NULL |  |  |
| `total_qty_ordered` | int | YES | NULL |  |  |
| `base_currency_code` | varchar(255) | YES | NULL |  |  |
| `channel_currency_code` | varchar(255) | YES | NULL |  |  |
| `order_currency_code` | varchar(255) | YES | NULL |  |  |
| `grand_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_grand_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `grand_total_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_grand_total_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `grand_total_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_grand_total_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `sub_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_sub_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `sub_total_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_sub_total_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `sub_total_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_sub_total_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_percent` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_discount_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_discount_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `tax_amount_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_tax_amount_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `tax_amount_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_tax_amount_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `shipping_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_shipping_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `shipping_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_shipping_invoiced` | decimal(12,4) | YES | 0.0000 |  |  |
| `shipping_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_shipping_refunded` | decimal(12,4) | YES | 0.0000 |  |  |
| `shipping_discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_shipping_discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `shipping_tax_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_shipping_tax_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `shipping_tax_refunded` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_shipping_tax_refunded` | decimal(12,4) | NO | 0.0000 |  |  |
| `sub_total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_sub_total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `shipping_amount_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_shipping_amount_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `customer_id` | int unsigned | YES | NULL | MUL |  |
| `customer_type` | varchar(255) | YES | NULL |  |  |
| `channel_id` | int unsigned | YES | NULL | MUL |  |
| `channel_type` | varchar(255) | YES | NULL |  |  |
| `cart_id` | int | YES | NULL |  |  |
| `applied_cart_rule_ids` | varchar(255) | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| orders_increment_id_unique | increment_id | Yes | BTREE |
| orders_customer_id_foreign | customer_id | No | BTREE |
| orders_channel_id_index | channel_id | No | BTREE |
| orders_channel_status_idx | channel_id | No | BTREE |
| orders_channel_date_idx | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| orders_channel_id_foreign | `channel_id` | `channels` | `id` |
| orders_customer_id_foreign | `customer_id` | `customers` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 2,
        "increment_id": "1",
        "status": "completed",
        "channel_name": "افتراضي",
        "is_guest": 0,
        "customer_email": "t@test.com",
        "customer_first_name": "ahmed",
        "customer_last_name": "ali",
        "shipping_method": "flatrate_flatrate",
        "shipping_title": "Flat Rate - Flat Rate",
        "shipping_description": "Flat Rate Shipping",
        "coupon_code": null,
        "is_gift": 0,
        "total_item_count": 1,
        "total_qty_ordered": 1,
        "base_currency_code": "EGP",
        "channel_currency_code": "EGP",
        "order_currency_code": "EGP",
        "grand_total": "63010.0000",
        "base_grand_total": "63010.0000",
        "grand_total_invoiced": "63010.0000",
        "base_grand_total_invoiced": "63010.0000",
        "grand_total_refunded": "0.0000",
        "base_grand_total_refunded": "0.0000",
        "sub_total": "63000.0000",
        "base_sub_total": "63000.0000",
        "sub_total_invoiced": "63000.0000",
        "base_sub_total_invoiced": "63000.0000",
        "sub_total_refunded": "0.0000",
        "base_sub_total_refunded": "0.0000",
        "discount_percent": "0.0000",
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "discount_invoiced": "0.0000",
        "base_discount_invoiced": "0.0000",
        "discount_refunded": "0.0000",
        "base_discount_refunded": "0.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "tax_amount_invoiced": "0.0000",
        "base_tax_amount_invoiced": "0.0000",
        "tax_amount_refunded": "0.0000",
        "base_tax_amount_refunded": "0.0000",
        "shipping_amount": "10.0000",
        "base_shipping_amount": "10.0000",
        "shipping_invoiced": "10.0000",
        "base_shipping_invoiced": "10.0000",
        "shipping_refunded": "0.0000",
        "base_shipping_refunded": "0.0000",
        "shipping_discount_amount": "0.0000",
        "base_shipping_discount_amount": "0.0000",
        "shipping_tax_amount": "0.0000",
        "base_shipping_tax_amount": "0.0000",
        "shipping_tax_refunded": "0.0000",
        "base_shipping_tax_refunded": "0.0000",
        "sub_total_incl_tax": "63000.0000",
        "base_sub_total_incl_tax": "63000.0000",
        "shipping_amount_incl_tax": "10.0000",
        "base_shipping_amount_incl_tax": "10.0000",
        "customer_id": 4,
        "customer_type": "Webkul\\Customer\\Models\\Customer",
        "channel_id": 19,
        "channel_type": "Webkul\\Core\\Models\\Channel",
        "cart_id": 3,
        "applied_cart_rule_ids": null,
        "created_at": "2025-12-06 21:44:07",
        "updated_at": "2025-12-06 23:36:05"
    },
    {
        "id": 3,
        "increment_id": "3",
        "status": "completed",
        "channel_name": "افتراضي",
        "is_guest": 0,
        "customer_email": "t@test.com",
        "customer_first_name": "ahmed",
        "customer_last_name": "ali",
        "shipping_method": "free_free",
        "shipping_title": "Free Shipping - Free Shipping",
        "shipping_description": "Free Shipping",
        "coupon_code": null,
        "is_gift": 0,
        "total_item_count": 1,
        "total_qty_ordered": 6,
        "base_currency_code": "EGP",
        "channel_currency_code": "EGP",
        "order_currency_code": "EGP",
        "grand_total": "378000.0000",
        "base_grand_total": "378000.0000",
        "grand_total_invoiced": "378000.0000",
        "base_grand_total_invoiced": "378000.0000",
        "grand_total_refunded": "0.0000",
        "base_grand_total_refunded": "0.0000",
        "sub_total": "378000.0000",
        "base_sub_total": "378000.0000",
        "sub_total_invoiced": "378000.0000",
        "base_sub_total_invoiced": "378000.0000",
        "sub_total_refunded": "0.0000",
        "base_sub_total_refunded": "0.0000",
        "discount_percent": "0.0000",
        "discount_amount": "0.0000",
        "base_discount_amount": "0.0000",
        "discount_invoiced": "0.0000",
        "base_discount_invoiced": "0.0000",
        "discount_refunded": "0.0000",
        "base_discount_refunded": "0.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "tax_amount_invoiced": "0.0000",
        "base_tax_amount_invoiced": "0.0000",
        "tax_amount_refunded": "0.0000",
        "base_tax_amount_refunded": "0.0000",
        "shipping_amount": "0.0000",
        "base_shipping_amount": "0.0000",
        "shipping_invoiced": "0.0000",
        "base_shipping_invoiced": "0.0000",
        "shipping_refunded": "0.0000",
        "base_shipping_refunded": "0.0000",
        "shipping_discount_amount": "0.0000",
        "base_shipping_discount_amount": "0.0000",
        "shipping_tax_amount": "0.0000",
        "base_shipping_tax_amount": "0.0000",
        "shipping_tax_refunded": "0.0000",
        "base_shipping_tax_refunded": "0.0000",
        "sub_total_incl_tax": "378000.0000",
        "base_sub_total_incl_tax": "378000.0000",
        "shipping_amount_incl_tax": "0.0000",
        "base_shipping_amount_incl_tax": "0.0000",
        "customer_id": 4,
        "customer_type": "Webkul\\Customer\\Models\\Customer",
        "channel_id": 19,
        "channel_type": "Webkul\\Core\\Models\\Channel",
        "cart_id": 4,
        "applied_cart_rule_ids": null,
        "created_at": "2025-12-07 00:27:07",
        "updated_at": "2025-12-07 00:28:41"
    },
    {
        "id": 4,
        "increment_id": "4",
        "status": "completed",
        "channel_name": "افتراضي",
        "is_guest": 0,
        "customer_email": "ahmed@test.com",
        "customer_first_name": "ahmed",
        "customer_last_name": "ali",
        "shipping_method": "flatrate_flatrate",
        "shipping_title": "Flat Rate - Flat Rate",
        "shipping_description": "Flat Rate Shipping",
        "coupon_code": "123",
        "is_gift": 0,
        "total_item_count": 1,
        "total_qty_ordered": 1,
        "base_currency_code": "EGP",
        "channel_currency_code": "EGP",
        "order_currency_code": "EGP",
        "grand_total": "56710.0000",
        "base_grand_total": "56710.0000",
        "grand_total_invoiced": "56710.0000",
        "base_grand_total_invoiced": "56710.0000",
        "grand_total_refunded": "0.0000",
        "base_grand_total_refunded": "0.0000",
        "sub_total": "63000.0000",
        "base_sub_total": "63000.0000",
        "sub_total_invoiced": "63000.0000",
        "base_sub_total_invoiced": "63000.0000",
        "sub_total_refunded": "0.0000",
        "base_sub_total_refunded": "0.0000",
        "discount_percent": "0.0000",
        "discount_amount": "6300.0000",
        "base_discount_amount": "6300.0000",
        "discount_invoiced": "6300.0000",
        "base_discount_invoiced": "6300.0000",
        "discount_refunded": "0.0000",
        "base_discount_refunded": "0.0000",
        "tax_amount": "0.0000",
        "base_tax_amount": "0.0000",
        "tax_amount_invoiced": "0.0000",
        "base_tax_amount_invoiced": "0.0000",
        "tax_amount_refunded": "0.0000",
        "base_tax_amount_refunded": "0.0000",
        "shipping_amount": "10.0000",
        "base_shipping_amount": "10.0000",
        "shipping_invoiced": "10.0000",
        "base_shipping_invoiced": "10.0000",
        "shipping_refunded": "0.0000",
        "base_shipping_refunded": "0.0000",
        "shipping_discount_amount": "0.0000",
        "base_shipping_discount_amount": "0.0000",
        "shipping_tax_amount": "0.0000",
        "base_shipping_tax_amount": "0.0000",
        "shipping_tax_refunded": "0.0000",
        "base_shipping_tax_refunded": "0.0000",
        "sub_total_incl_tax": "63000.0000",
        "base_sub_total_incl_tax": "63000.0000",
        "shipping_amount_incl_tax": "10.0000",
        "base_shipping_amount_incl_tax": "10.0000",
        "customer_id": 5,
        "customer_type": "Webkul\\Customer\\Models\\Customer",
        "channel_id": 19,
        "channel_type": "Webkul\\Core\\Models\\Channel",
        "cart_id": 6,
        "applied_cart_rule_ids": "1",
        "created_at": "2025-12-07 02:28:19",
        "updated_at": "2025-12-07 02:28:52"
    }
]
```

---

### password_resets

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `email` | varchar(255) | NO | NULL | MUL |  |
| `token` | varchar(255) | NO | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| password_resets_email_index | email | No | BTREE |

---

### personal_access_tokens

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `tokenable_type` | varchar(255) | NO | NULL | MUL |  |
| `tokenable_id` | bigint unsigned | NO | NULL |  |  |
| `name` | varchar(255) | NO | NULL |  |  |
| `token` | varchar(64) | NO | NULL | UNI |  |
| `abilities` | text | YES | NULL |  |  |
| `last_used_at` | timestamp | YES | NULL |  |  |
| `expires_at` | timestamp | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| personal_access_tokens_token_unique | token | Yes | BTREE |
| personal_access_tokens_tokenable_type_tokenable_id_index | tokenable_type | No | BTREE |

---

### product_attribute_values

**Rows:** 13

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `locale` | varchar(255) | YES | NULL |  |  |
| `channel` | varchar(255) | YES | NULL | MUL |  |
| `text_value` | text | YES | NULL |  |  |
| `boolean_value` | tinyint(1) | YES | NULL |  |  |
| `integer_value` | int | YES | NULL |  |  |
| `float_value` | decimal(12,4) | YES | NULL |  |  |
| `datetime_value` | datetime | YES | NULL |  |  |
| `date_value` | date | YES | NULL |  |  |
| `json_value` | json | YES | NULL |  |  |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `attribute_id` | int unsigned | NO | NULL | MUL |  |
| `unique_id` | varchar(255) | YES | NULL | UNI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| chanel_locale_attribute_value_index_unique | channel | Yes | BTREE |
| product_attribute_values_unique_id_unique | unique_id | Yes | BTREE |
| product_attribute_values_attribute_id_foreign | attribute_id | No | BTREE |
| prod_attr_product_id_idx | product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_attribute_values_attribute_id_foreign | `attribute_id` | `attributes` | `id` |
| product_attribute_values_product_id_foreign | `product_id` | `products` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 155,
        "locale": null,
        "channel": null,
        "text_value": null,
        "boolean_value": 1,
        "integer_value": null,
        "float_value": null,
        "datetime_value": null,
        "date_value": null,
        "json_value": null,
        "product_id": 20,
        "attribute_id": 5,
        "unique_id": "20|5"
    },
    {
        "id": 156,
        "locale": null,
        "channel": null,
        "text_value": null,
        "boolean_value": 1,
        "integer_value": null,
        "float_value": null,
        "datetime_value": null,
        "date_value": null,
        "json_value": null,
        "product_id": 20,
        "attribute_id": 6,
        "unique_id": "20|6"
    },
    {
        "id": 157,
        "locale": null,
        "channel": null,
        "text_value": null,
        "boolean_value": 1,
        "integer_value": null,
        "float_value": null,
        "datetime_value": null,
        "date_value": null,
        "json_value": null,
        "product_id": 20,
        "attribute_id": 7,
        "unique_id": "20|7"
    }
]
```

---

### product_bundle_option_products

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `product_bundle_option_id` | int unsigned | NO | NULL | MUL |  |
| `qty` | int | NO | 0 |  |  |
| `is_user_defined` | tinyint(1) | NO | 1 |  |  |
| `is_default` | tinyint(1) | NO | 0 |  |  |
| `sort_order` | int | NO | 0 |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| bundle_option_products_product_id_bundle_option_id_unique | product_id | Yes | BTREE |
| pbop_option_id_idx | product_bundle_option_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_bundle_option_id_foreign | `product_bundle_option_id` | `product_bundle_options` | `id` |
| product_bundle_option_products_product_id_foreign | `product_id` | `products` | `id` |

---

### product_bundle_option_translations

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `locale` | varchar(255) | NO | NULL | MUL |  |
| `label` | varchar(255) | YES | NULL |  |  |
| `product_bundle_option_id` | int unsigned | NO | NULL | MUL |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| product_bundle_option_translations_option_id_locale_unique | product_bundle_option_id | Yes | BTREE |
| bundle_option_translations_locale_label_bundle_option_id_unique | locale | Yes | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_bundle_option_translations_option_id_foreign | `product_bundle_option_id` | `product_bundle_options` | `id` |

---

### product_bundle_options

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `type` | varchar(255) | NO | NULL |  |  |
| `is_required` | tinyint(1) | NO | 1 |  |  |
| `sort_order` | int | NO | 0 |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| product_bundle_options_product_id_foreign | product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_bundle_options_product_id_foreign | `product_id` | `products` | `id` |

---

### product_categories

**Rows:** 2

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `product_id` | int unsigned | NO | NULL | PRI |  |
| `category_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| product_categories_product_id_category_id_unique | product_id | Yes | BTREE |
| product_categories_category_id_foreign | category_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_categories_category_id_foreign | `category_id` | `categories` | `id` |
| product_categories_product_id_foreign | `product_id` | `products` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "product_id": 20,
        "category_id": 4
    },
    {
        "product_id": 20,
        "category_id": 16
    }
]
```

---

### product_channels

**Rows:** 2

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `product_id` | int unsigned | NO | NULL | PRI |  |
| `channel_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| product_channels_product_id_channel_id_unique | product_id | Yes | BTREE |
| pc_product_id_channel_id_idx | product_id | No | BTREE |
| product_channels_channel_product_index | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_channels_channel_id_foreign | `channel_id` | `channels` | `id` |
| product_channels_product_id_foreign | `product_id` | `products` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "product_id": 16,
        "channel_id": 19
    },
    {
        "product_id": 20,
        "channel_id": 20
    }
]
```

---

### product_cross_sells

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `parent_id` | int unsigned | NO | NULL | PRI |  |
| `child_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| product_cross_sells_parent_id_child_id_unique | parent_id | Yes | BTREE |
| product_cross_sells_child_id_foreign | child_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_cross_sells_child_id_foreign | `child_id` | `products` | `id` |
| product_cross_sells_parent_id_foreign | `parent_id` | `products` | `id` |

---

### product_customer_group_prices

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `qty` | int | NO | 0 |  |  |
| `value_type` | varchar(255) | NO | NULL |  |  |
| `value` | decimal(12,4) | NO | 0.0000 |  |  |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `customer_group_id` | int unsigned | YES | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |
| `unique_id` | varchar(255) | YES | NULL | UNI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| product_customer_group_prices_unique_id_unique | unique_id | Yes | BTREE |
| product_customer_group_prices_product_id_foreign | product_id | No | BTREE |
| product_customer_group_prices_customer_group_id_foreign | customer_group_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_customer_group_prices_customer_group_id_foreign | `customer_group_id` | `customer_groups` | `id` |
| product_customer_group_prices_product_id_foreign | `product_id` | `products` | `id` |

---

### product_customizable_option_prices

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `label` | text | YES | NULL |  |  |
| `price` | decimal(12,4) | NO | 0.0000 |  |  |
| `product_customizable_option_id` | int unsigned | NO | NULL | MUL |  |
| `sort_order` | int | NO | 0 |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| pcop_product_customizable_option_id_foreign | product_customizable_option_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| pcop_product_customizable_option_id_foreign | `product_customizable_option_id` | `product_customizable_options` | `id` |

---

### product_customizable_option_translations

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `locale` | varchar(255) | NO | NULL |  |  |
| `label` | text | YES | NULL |  |  |
| `product_customizable_option_id` | int unsigned | NO | NULL | MUL |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| product_customizable_option_id_locale_unique | product_customizable_option_id | Yes | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| pcot_product_customizable_option_id_foreign | `product_customizable_option_id` | `product_customizable_options` | `id` |

---

### product_customizable_options

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `type` | varchar(255) | NO | NULL |  |  |
| `is_required` | tinyint(1) | NO | 1 |  |  |
| `max_characters` | text | YES | NULL |  |  |
| `supported_file_extensions` | text | YES | NULL |  |  |
| `sort_order` | int | NO | 0 |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| product_customizable_options_product_id_foreign | product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_customizable_options_product_id_foreign | `product_id` | `products` | `id` |

---

### product_downloadable_link_translations

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `product_downloadable_link_id` | int unsigned | NO | NULL | MUL |  |
| `locale` | varchar(255) | NO | NULL |  |  |
| `title` | text | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| link_translations_link_id_foreign | product_downloadable_link_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| link_translations_link_id_foreign | `product_downloadable_link_id` | `product_downloadable_links` | `id` |

---

### product_downloadable_links

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `url` | varchar(255) | YES | NULL |  |  |
| `file` | varchar(255) | YES | NULL |  |  |
| `file_name` | varchar(255) | YES | NULL |  |  |
| `type` | varchar(255) | NO | NULL |  |  |
| `price` | decimal(12,4) | NO | 0.0000 |  |  |
| `sample_url` | varchar(255) | YES | NULL |  |  |
| `sample_file` | varchar(255) | YES | NULL |  |  |
| `sample_file_name` | varchar(255) | YES | NULL |  |  |
| `sample_type` | varchar(255) | YES | NULL |  |  |
| `downloads` | int | NO | 0 |  |  |
| `sort_order` | int | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| product_downloadable_links_product_id_foreign | product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_downloadable_links_product_id_foreign | `product_id` | `products` | `id` |

---

### product_downloadable_sample_translations

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `product_downloadable_sample_id` | int unsigned | NO | NULL | MUL |  |
| `locale` | varchar(255) | NO | NULL |  |  |
| `title` | text | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| sample_translations_sample_id_foreign | product_downloadable_sample_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| sample_translations_sample_id_foreign | `product_downloadable_sample_id` | `product_downloadable_samples` | `id` |

---

### product_downloadable_samples

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `url` | varchar(255) | YES | NULL |  |  |
| `file` | varchar(255) | YES | NULL |  |  |
| `file_name` | varchar(255) | YES | NULL |  |  |
| `type` | varchar(255) | NO | NULL |  |  |
| `sort_order` | int | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| product_downloadable_samples_product_id_foreign | product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_downloadable_samples_product_id_foreign | `product_id` | `products` | `id` |

---

### product_flat

**Rows:** 2

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `sku` | varchar(255) | NO | NULL |  |  |
| `type` | varchar(255) | YES | NULL |  |  |
| `product_number` | varchar(255) | YES | NULL |  |  |
| `name` | varchar(255) | YES | NULL |  |  |
| `short_description` | text | YES | NULL |  |  |
| `description` | text | YES | NULL |  |  |
| `url_key` | varchar(255) | YES | NULL |  |  |
| `new` | tinyint(1) | YES | NULL |  |  |
| `featured` | tinyint(1) | YES | NULL |  |  |
| `status` | tinyint(1) | YES | NULL |  |  |
| `meta_title` | text | YES | NULL |  |  |
| `meta_keywords` | text | YES | NULL |  |  |
| `meta_description` | text | YES | NULL |  |  |
| `price` | decimal(12,4) | YES | NULL |  |  |
| `special_price` | decimal(12,4) | YES | NULL |  |  |
| `special_price_from` | date | YES | NULL |  |  |
| `special_price_to` | date | YES | NULL |  |  |
| `weight` | decimal(12,4) | YES | NULL |  |  |
| `created_at` | datetime | YES | NULL |  |  |
| `locale` | varchar(255) | YES | NULL |  |  |
| `channel` | varchar(255) | YES | NULL |  |  |
| `attribute_family_id` | int unsigned | YES | NULL | MUL |  |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `updated_at` | datetime | YES | NULL |  |  |
| `parent_id` | int unsigned | YES | NULL | MUL |  |
| `visible_individually` | tinyint(1) | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| product_flat_unique_index | product_id | Yes | BTREE |
| product_flat_attribute_family_id_foreign | attribute_family_id | No | BTREE |
| product_flat_parent_id_foreign | parent_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_flat_attribute_family_id_foreign | `attribute_family_id` | `attribute_families` | `id` |
| product_flat_parent_id_foreign | `parent_id` | `product_flat` | `id` |
| product_flat_product_id_foreign | `product_id` | `products` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 22,
        "sku": "football",
        "type": "simple",
        "product_number": null,
        "name": "football",
        "short_description": "<p>football<\/p>",
        "description": "<p>football<\/p>",
        "url_key": "football",
        "new": 1,
        "featured": 1,
        "status": 1,
        "meta_title": null,
        "meta_keywords": null,
        "meta_description": null,
        "price": "230.0000",
        "special_price": null,
        "special_price_from": null,
        "special_price_to": null,
        "weight": "12.0000",
        "created_at": "2025-12-07 22:24:11",
        "locale": "ar",
        "channel": "sports",
        "attribute_family_id": 1,
        "product_id": 20,
        "updated_at": "2025-12-07 22:29:51",
        "parent_id": null,
        "visible_individually": 1
    },
    {
        "id": 23,
        "sku": "football",
        "type": "simple",
        "product_number": null,
        "name": null,
        "short_description": null,
        "description": null,
        "url_key": null,
        "new": 1,
        "featured": 1,
        "status": 1,
        "meta_title": null,
        "meta_keywords": null,
        "meta_description": null,
        "price": "230.0000",
        "special_price": null,
        "special_price_from": null,
        "special_price_to": null,
        "weight": "12.0000",
        "created_at": "2025-12-07 22:24:11",
        "locale": "en",
        "channel": "sports",
        "attribute_family_id": 1,
        "product_id": 20,
        "updated_at": "2025-12-07 22:29:51",
        "parent_id": null,
        "visible_individually": 1
    }
]
```

---

### product_grouped_products

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `associated_product_id` | int unsigned | NO | NULL | MUL |  |
| `qty` | int | NO | 0 |  |  |
| `sort_order` | int | NO | 0 |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| grouped_products_product_id_associated_product_id_unique | product_id | Yes | BTREE |
| product_grouped_products_associated_product_id_foreign | associated_product_id | No | BTREE |
| pgp_product_id_idx | product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_grouped_products_associated_product_id_foreign | `associated_product_id` | `products` | `id` |
| product_grouped_products_product_id_foreign | `product_id` | `products` | `id` |

---

### product_images

**Rows:** 1

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `type` | varchar(255) | YES | NULL |  |  |
| `path` | varchar(255) | NO | NULL |  |  |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `position` | int unsigned | NO | 0 |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| prod_img_product_id_idx | product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_images_product_id_foreign | `product_id` | `products` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 21,
        "type": "images",
        "path": "product\/20\/m4o58Pl138UhCxhSp2H2O4w8MwdApiaLxPnqEtub.webp",
        "product_id": 20,
        "position": 1
    }
]
```

---

### product_inventories

**Rows:** 10

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `qty` | int | NO | 0 |  |  |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `vendor_id` | int | NO | 0 |  |  |
| `inventory_source_id` | int unsigned | NO | NULL | MUL |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| product_source_vendor_index_unique | product_id | Yes | BTREE |
| product_inventories_inventory_source_id_foreign | inventory_source_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_inventories_inventory_source_id_foreign | `inventory_source_id` | `inventory_sources` | `id` |
| product_inventories_product_id_foreign | `product_id` | `products` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 15,
        "qty": 0,
        "product_id": 20,
        "vendor_id": 0,
        "inventory_source_id": 1
    },
    {
        "id": 16,
        "qty": 0,
        "product_id": 20,
        "vendor_id": 0,
        "inventory_source_id": 2
    },
    {
        "id": 17,
        "qty": 0,
        "product_id": 20,
        "vendor_id": 0,
        "inventory_source_id": 4
    }
]
```

---

### product_inventory_indices

**Rows:** 4

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `qty` | int | NO | 0 |  |  |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `channel_id` | int unsigned | NO | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| product_inventory_indices_product_id_channel_id_unique | product_id | Yes | BTREE |
| product_inventory_indices_channel_id_foreign | channel_id | No | BTREE |
| prod_inv_product_id_idx | product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_inventory_indices_channel_id_foreign | `channel_id` | `channels` | `id` |
| product_inventory_indices_product_id_foreign | `product_id` | `products` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 17,
        "qty": 0,
        "product_id": 20,
        "channel_id": 1,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 18,
        "qty": 0,
        "product_id": 20,
        "channel_id": 19,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 19,
        "qty": 30,
        "product_id": 20,
        "channel_id": 20,
        "created_at": null,
        "updated_at": null
    }
]
```

---

### product_ordered_inventories

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `qty` | int | NO | 0 |  |  |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `channel_id` | int unsigned | NO | NULL | MUL |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| product_ordered_inventories_product_id_channel_id_unique | product_id | Yes | BTREE |
| product_ordered_inventories_channel_id_foreign | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_ordered_inventories_channel_id_foreign | `channel_id` | `channels` | `id` |
| product_ordered_inventories_product_id_foreign | `product_id` | `products` | `id` |

---

### product_price_indices

**Rows:** 12

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `customer_group_id` | int unsigned | YES | NULL | MUL |  |
| `channel_id` | int unsigned | NO | 1 | MUL |  |
| `min_price` | decimal(12,4) | NO | 0.0000 |  |  |
| `regular_min_price` | decimal(12,4) | NO | 0.0000 |  |  |
| `max_price` | decimal(12,4) | NO | 0.0000 |  |  |
| `regular_max_price` | decimal(12,4) | NO | 0.0000 |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| price_indices_product_id_customer_group_id_channel_id_unique | product_id | Yes | BTREE |
| product_price_indices_customer_group_id_foreign | customer_group_id | No | BTREE |
| product_price_indices_channel_id_foreign | channel_id | No | BTREE |
| ppi_product_id_customer_group_id_idx | product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_price_indices_channel_id_foreign | `channel_id` | `channels` | `id` |
| product_price_indices_customer_group_id_foreign | `customer_group_id` | `customer_groups` | `id` |
| product_price_indices_product_id_foreign | `product_id` | `products` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 55,
        "product_id": 20,
        "customer_group_id": 1,
        "channel_id": 1,
        "min_price": "230.0000",
        "regular_min_price": "230.0000",
        "max_price": "230.0000",
        "regular_max_price": "230.0000",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 56,
        "product_id": 20,
        "customer_group_id": 2,
        "channel_id": 1,
        "min_price": "230.0000",
        "regular_min_price": "230.0000",
        "max_price": "230.0000",
        "regular_max_price": "230.0000",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 57,
        "product_id": 20,
        "customer_group_id": 3,
        "channel_id": 1,
        "min_price": "230.0000",
        "regular_min_price": "230.0000",
        "max_price": "230.0000",
        "regular_max_price": "230.0000",
        "created_at": null,
        "updated_at": null
    }
]
```

---

### product_relations

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `parent_id` | int unsigned | NO | NULL | PRI |  |
| `child_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| product_relations_parent_id_child_id_unique | parent_id | Yes | BTREE |
| product_relations_child_id_foreign | child_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_relations_child_id_foreign | `child_id` | `products` | `id` |
| product_relations_parent_id_foreign | `parent_id` | `products` | `id` |

---

### product_review_attachments

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `review_id` | int unsigned | NO | NULL | MUL |  |
| `type` | varchar(255) | NO | image |  |  |
| `mime_type` | varchar(255) | YES | NULL |  |  |
| `path` | varchar(255) | NO | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| product_review_images_review_id_foreign | review_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_review_images_review_id_foreign | `review_id` | `product_reviews` | `id` |

---

### product_reviews

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `name` | varchar(255) | NO |  |  |  |
| `title` | varchar(255) | NO | NULL |  |  |
| `rating` | int | NO | NULL |  |  |
| `comment` | text | YES | NULL |  |  |
| `status` | varchar(255) | NO | NULL |  |  |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `customer_id` | int | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| prod_rev_product_id_idx | product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_reviews_product_id_foreign | `product_id` | `products` | `id` |

---

### product_super_attributes

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `product_id` | int unsigned | NO | NULL | PRI |  |
| `attribute_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| product_super_attributes_product_id_attribute_id_unique | product_id | Yes | BTREE |
| product_super_attributes_attribute_id_foreign | attribute_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_super_attributes_attribute_id_foreign | `attribute_id` | `attributes` | `id` |
| product_super_attributes_product_id_foreign | `product_id` | `products` | `id` |

---

### product_up_sells

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `parent_id` | int unsigned | NO | NULL | PRI |  |
| `child_id` | int unsigned | NO | NULL | PRI |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| product_up_sells_parent_id_child_id_unique | parent_id | Yes | BTREE |
| product_up_sells_child_id_foreign | child_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_up_sells_child_id_foreign | `child_id` | `products` | `id` |
| product_up_sells_parent_id_foreign | `parent_id` | `products` | `id` |

---

### product_videos

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `type` | varchar(255) | YES | NULL |  |  |
| `path` | varchar(255) | NO | NULL |  |  |
| `position` | int unsigned | NO | 0 |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| prod_vid_product_id_idx | product_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| product_videos_product_id_foreign | `product_id` | `products` | `id` |

---

### products

**Rows:** 2

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `sku` | varchar(255) | NO | NULL | UNI |  |
| `type` | varchar(255) | NO | NULL |  |  |
| `parent_id` | int unsigned | YES | NULL | MUL |  |
| `attribute_family_id` | int unsigned | YES | NULL | MUL |  |
| `additional` | json | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| products_sku_unique | sku | Yes | BTREE |
| products_attribute_family_id_foreign | attribute_family_id | No | BTREE |
| products_parent_id_foreign | parent_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| products_attribute_family_id_foreign | `attribute_family_id` | `attribute_families` | `id` |
| products_parent_id_foreign | `parent_id` | `products` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 16,
        "sku": "S1-FIX-TINKER",
        "type": "simple",
        "parent_id": null,
        "attribute_family_id": 1,
        "additional": null,
        "created_at": "2025-12-07 05:46:25",
        "updated_at": "2025-12-07 05:46:25"
    },
    {
        "id": 20,
        "sku": "football",
        "type": "simple",
        "parent_id": null,
        "attribute_family_id": 1,
        "additional": null,
        "created_at": "2025-12-07 22:22:35",
        "updated_at": "2025-12-07 22:22:35"
    }
]
```

---

### refund_items

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `parent_id` | int unsigned | YES | NULL | MUL |  |
| `name` | varchar(255) | YES | NULL |  |  |
| `description` | varchar(255) | YES | NULL |  |  |
| `sku` | varchar(255) | YES | NULL |  |  |
| `qty` | int | YES | NULL |  |  |
| `price` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_price` | decimal(12,4) | NO | 0.0000 |  |  |
| `total` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_total` | decimal(12,4) | NO | 0.0000 |  |  |
| `tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_percent` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `price_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_price_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `product_id` | int unsigned | YES | NULL |  |  |
| `product_type` | varchar(255) | YES | NULL |  |  |
| `order_item_id` | int unsigned | YES | NULL | MUL |  |
| `refund_id` | int unsigned | YES | NULL | MUL |  |
| `additional` | json | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| refund_items_parent_id_foreign | parent_id | No | BTREE |
| refund_items_order_item_id_foreign | order_item_id | No | BTREE |
| refund_items_refund_id_foreign | refund_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| refund_items_order_item_id_foreign | `order_item_id` | `order_items` | `id` |
| refund_items_parent_id_foreign | `parent_id` | `refund_items` | `id` |
| refund_items_refund_id_foreign | `refund_id` | `refunds` | `id` |

---

### refunds

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `increment_id` | varchar(255) | YES | NULL |  |  |
| `state` | varchar(255) | YES | NULL |  |  |
| `email_sent` | tinyint(1) | NO | 0 |  |  |
| `total_qty` | int | YES | NULL |  |  |
| `base_currency_code` | varchar(255) | YES | NULL |  |  |
| `channel_currency_code` | varchar(255) | YES | NULL |  |  |
| `order_currency_code` | varchar(255) | YES | NULL |  |  |
| `adjustment_refund` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_adjustment_refund` | decimal(12,4) | YES | 0.0000 |  |  |
| `adjustment_fee` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_adjustment_fee` | decimal(12,4) | YES | 0.0000 |  |  |
| `sub_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_sub_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `grand_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_grand_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `shipping_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_shipping_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_tax_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_percent` | decimal(12,4) | YES | 0.0000 |  |  |
| `discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_discount_amount` | decimal(12,4) | YES | 0.0000 |  |  |
| `shipping_tax_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_shipping_tax_amount` | decimal(12,4) | NO | 0.0000 |  |  |
| `sub_total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_sub_total_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `shipping_amount_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_shipping_amount_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `order_id` | int unsigned | YES | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| refunds_order_id_foreign | order_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| refunds_order_id_foreign | `order_id` | `orders` | `id` |

---

### roles

**Rows:** 1

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `name` | varchar(255) | NO | NULL |  |  |
| `description` | varchar(255) | YES | NULL |  |  |
| `permission_type` | varchar(255) | NO | NULL |  |  |
| `permissions` | json | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "name": "مدير",
        "description": "سيكون لدى مستخدمي هذا الدور وصولًا كاملاً",
        "permission_type": "all",
        "permissions": null,
        "created_at": null,
        "updated_at": null
    }
]
```

---

### search_synonyms

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `name` | varchar(255) | NO | NULL |  |  |
| `terms` | text | NO | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

---

### search_terms

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `term` | varchar(255) | NO | NULL |  |  |
| `results` | int | NO | 0 |  |  |
| `uses` | int | NO | 0 |  |  |
| `redirect_url` | varchar(255) | YES | NULL |  |  |
| `display_in_suggested_terms` | tinyint(1) | NO | 0 |  |  |
| `locale` | varchar(255) | NO | NULL |  |  |
| `channel_id` | int unsigned | NO | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| search_terms_channel_id_foreign | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| search_terms_channel_id_foreign | `channel_id` | `channels` | `id` |

---

### shipment_items

**Rows:** 3

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `name` | varchar(255) | YES | NULL |  |  |
| `description` | varchar(255) | YES | NULL |  |  |
| `sku` | varchar(255) | YES | NULL |  |  |
| `qty` | int | YES | NULL |  |  |
| `weight` | decimal(12,4) | YES | NULL |  |  |
| `price` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_price` | decimal(12,4) | YES | 0.0000 |  |  |
| `total` | decimal(12,4) | YES | 0.0000 |  |  |
| `base_total` | decimal(12,4) | YES | 0.0000 |  |  |
| `price_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `base_price_incl_tax` | decimal(12,4) | NO | 0.0000 |  |  |
| `product_id` | int unsigned | YES | NULL |  |  |
| `product_type` | varchar(255) | YES | NULL |  |  |
| `order_item_id` | int unsigned | YES | NULL |  |  |
| `shipment_id` | int unsigned | NO | NULL | MUL |  |
| `additional` | json | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| shipment_items_shipment_id_foreign | shipment_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| shipment_items_shipment_id_foreign | `shipment_id` | `shipments` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "name": "Iphone 17",
        "description": null,
        "sku": "12141",
        "qty": 1,
        "weight": "123.0000",
        "price": "63000.0000",
        "base_price": "63000.0000",
        "total": "63000.0000",
        "base_total": "63000.0000",
        "price_incl_tax": "63000.0000",
        "base_price_incl_tax": "63000.0000",
        "product_id": 12,
        "product_type": "Webkul\\Product\\Models\\Product",
        "order_item_id": 2,
        "shipment_id": 1,
        "additional": "{\"locale\": \"ar\", \"cart_id\": 3, \"quantity\": 1, \"is_buy_now\": \"0\", \"product_id\": \"12\"}",
        "created_at": "2025-12-06 23:36:05",
        "updated_at": "2025-12-06 23:36:05"
    },
    {
        "id": 2,
        "name": "Iphone 17",
        "description": null,
        "sku": "12141",
        "qty": 6,
        "weight": "738.0000",
        "price": "63000.0000",
        "base_price": "63000.0000",
        "total": "378000.0000",
        "base_total": "378000.0000",
        "price_incl_tax": "63000.0000",
        "base_price_incl_tax": "63000.0000",
        "product_id": 12,
        "product_type": "Webkul\\Product\\Models\\Product",
        "order_item_id": 3,
        "shipment_id": 2,
        "additional": "{\"locale\": \"ar\", \"cart_id\": 4, \"quantity\": 6, \"product_id\": 12}",
        "created_at": "2025-12-07 00:28:35",
        "updated_at": "2025-12-07 00:28:35"
    },
    {
        "id": 3,
        "name": "Iphone 17",
        "description": null,
        "sku": "12141",
        "qty": 1,
        "weight": "123.0000",
        "price": "63000.0000",
        "base_price": "63000.0000",
        "total": "63000.0000",
        "base_total": "63000.0000",
        "price_incl_tax": "63000.0000",
        "base_price_incl_tax": "63000.0000",
        "product_id": 12,
        "product_type": "Webkul\\Product\\Models\\Product",
        "order_item_id": 4,
        "shipment_id": 3,
        "additional": "{\"locale\": \"ar\", \"cart_id\": 6, \"quantity\": 1, \"product_id\": 12}",
        "created_at": "2025-12-07 02:28:45",
        "updated_at": "2025-12-07 02:28:45"
    }
]
```

---

### shipments

**Rows:** 3

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `status` | varchar(255) | YES | NULL |  |  |
| `total_qty` | int | YES | NULL |  |  |
| `total_weight` | decimal(12,4) | YES | NULL |  |  |
| `carrier_code` | varchar(255) | YES | NULL |  |  |
| `carrier_title` | varchar(255) | YES | NULL |  |  |
| `track_number` | text | YES | NULL |  |  |
| `email_sent` | tinyint(1) | NO | 0 |  |  |
| `customer_id` | int unsigned | YES | NULL |  |  |
| `customer_type` | varchar(255) | YES | NULL |  |  |
| `order_id` | int unsigned | NO | NULL | MUL |  |
| `order_address_id` | int unsigned | YES | NULL |  |  |
| `inventory_source_id` | int unsigned | YES | NULL | MUL |  |
| `inventory_source_name` | varchar(255) | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| shipments_order_id_foreign | order_id | No | BTREE |
| shipments_inventory_source_id_foreign | inventory_source_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| shipments_inventory_source_id_foreign | `inventory_source_id` | `inventory_sources` | `id` |
| shipments_order_id_foreign | `order_id` | `orders` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "status": null,
        "total_qty": 1,
        "total_weight": "123.0000",
        "carrier_code": null,
        "carrier_title": "Mohamed Ali",
        "track_number": "2020",
        "email_sent": 1,
        "customer_id": 4,
        "customer_type": "Webkul\\Customer\\Models\\Customer",
        "order_id": 2,
        "order_address_id": 7,
        "inventory_source_id": 1,
        "inventory_source_name": "افتراضي",
        "created_at": "2025-12-06 23:36:05",
        "updated_at": "2025-12-07 02:28:46"
    },
    {
        "id": 2,
        "status": null,
        "total_qty": 6,
        "total_weight": "738.0000",
        "carrier_code": null,
        "carrier_title": "",
        "track_number": "2020",
        "email_sent": 1,
        "customer_id": 4,
        "customer_type": "Webkul\\Customer\\Models\\Customer",
        "order_id": 3,
        "order_address_id": 11,
        "inventory_source_id": 2,
        "inventory_source_name": "store 2",
        "created_at": "2025-12-07 00:28:35",
        "updated_at": "2025-12-07 02:28:46"
    },
    {
        "id": 3,
        "status": null,
        "total_qty": 1,
        "total_weight": "123.0000",
        "carrier_code": null,
        "carrier_title": "sada",
        "track_number": "fdsafas",
        "email_sent": 1,
        "customer_id": 5,
        "customer_type": "Webkul\\Customer\\Models\\Customer",
        "order_id": 4,
        "order_address_id": 15,
        "inventory_source_id": 2,
        "inventory_source_name": "store 2",
        "created_at": "2025-12-07 02:28:45",
        "updated_at": "2025-12-07 02:28:46"
    }
]
```

---

### sitemaps

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `file_name` | varchar(255) | NO | NULL |  |  |
| `path` | varchar(255) | NO | NULL |  |  |
| `additional` | json | YES | NULL |  |  |
| `generated_at` | datetime | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |

---

### subscribers_list

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `email` | varchar(255) | NO | NULL |  |  |
| `is_subscribed` | tinyint(1) | NO | 0 |  |  |
| `token` | varchar(255) | YES | NULL |  |  |
| `customer_id` | int unsigned | YES | NULL | MUL |  |
| `channel_id` | int unsigned | NO | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| subscribers_list_customer_id_foreign | customer_id | No | BTREE |
| subscribers_list_channel_id_foreign | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| subscribers_list_channel_id_foreign | `channel_id` | `channels` | `id` |
| subscribers_list_customer_id_foreign | `customer_id` | `customers` | `id` |

---

### tax_categories

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `code` | varchar(255) | NO | NULL | UNI |  |
| `name` | varchar(255) | NO | NULL |  |  |
| `description` | longtext | NO | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| tax_categories_code_unique | code | Yes | BTREE |

---

### tax_categories_tax_rates

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `tax_category_id` | int unsigned | NO | NULL | MUL |  |
| `tax_rate_id` | int unsigned | NO | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| tax_map_index_unique | tax_category_id | Yes | BTREE |
| tax_categories_tax_rates_tax_rate_id_foreign | tax_rate_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| tax_categories_tax_rates_tax_category_id_foreign | `tax_category_id` | `tax_categories` | `id` |
| tax_categories_tax_rates_tax_rate_id_foreign | `tax_rate_id` | `tax_rates` | `id` |

---

### tax_rates

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `identifier` | varchar(255) | NO | NULL | UNI |  |
| `is_zip` | tinyint(1) | NO | 0 |  |  |
| `zip_code` | varchar(255) | YES | NULL |  |  |
| `zip_from` | varchar(255) | YES | NULL |  |  |
| `zip_to` | varchar(255) | YES | NULL |  |  |
| `state` | varchar(255) | NO | NULL |  |  |
| `country` | varchar(255) | NO | NULL |  |  |
| `tax_rate` | decimal(12,4) | NO | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| tax_rates_identifier_unique | identifier | Yes | BTREE |

---

### theme_customization_translations

**Rows:** 12

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `theme_customization_id` | int unsigned | NO | NULL | MUL |  |
| `locale` | varchar(255) | NO | NULL |  |  |
| `options` | json | NO | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| theme_customization_id_foreign | theme_customization_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| theme_customization_id_foreign | `theme_customization_id` | `theme_customizations` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "theme_customization_id": 1,
        "locale": "ar",
        "options": "{\"images\": [{\"link\": \"\", \"image\": \"storage\/theme\/1\/ItQPXdmReoxL1KE0MyevIuOYg6yvVC5UIkDTy9dG.webp\", \"title\": \"استعد للمجموعة الجديدة\"}, {\"link\": \"\", \"image\": \"storage\/theme\/1\/2U6MPUUZVfTycbgO7onQ5cS2D2EV8Dz4DHJQ6jGt.webp\", \"title\": \"استعد للمجموعة الجديدة\"}, {\"link\": \"\", \"image\": \"storage\/theme\/1\/LYWjv38u0FBzZ0CKaRoC77rpRAAfO1pnuDzGa1TG.webp\", \"title\": \"استعد للمجموعة الجديدة\"}, {\"link\": \"\", \"image\": \"storage\/theme\/1\/gj0sdCNKc5uU9TCvyBJtv9SVcZFYd66OpFRxLZTF.webp\", \"title\": \"استعد للمجموعة الجديدة\"}]}"
    },
    {
        "id": 2,
        "theme_customization_id": 2,
        "locale": "ar",
        "options": "{\"css\": \".home-offer h1 {display: block;font-weight: 500;text-align: center;font-size: 22px;font-family: DM Serif Display;background-color: #E8EDFE;padding-top: 20px;padding-bottom: 20px;}@media (max-width:768px){.home-offer h1 {font-size:18px;padding-top: 10px;padding-bottom: 10px;}@media (max-width:525px) {.home-offer h1 {font-size:14px;padding-top: 6px;padding-bottom: 6px;}}\", \"html\": \"<div class=\\\"home-offer\\\"><h1>احصل على خصم يصل إلى 40% على طلبك الأول. تسوق الآن<\/h1><\/div>\"}"
    },
    {
        "id": 3,
        "theme_customization_id": 3,
        "locale": "ar",
        "options": "{\"filters\": {\"sort\": \"asc\", \"limit\": 10, \"parent_id\": 1}}"
    }
]
```

---

### theme_customizations

**Rows:** 12

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `theme_code` | varchar(255) | YES | default |  |  |
| `type` | varchar(255) | NO | NULL |  |  |
| `name` | varchar(255) | NO | NULL |  |  |
| `sort_order` | int | NO | NULL |  |  |
| `status` | tinyint(1) | NO | 0 |  |  |
| `channel_id` | int unsigned | NO | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| theme_customizations_channel_id_foreign | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| theme_customizations_channel_id_foreign | `channel_id` | `channels` | `id` |

#### Sample Data (First 3 Rows)

```json
[
    {
        "id": 1,
        "theme_code": "default",
        "type": "image_carousel",
        "name": "عرض الصور",
        "sort_order": 1,
        "status": 1,
        "channel_id": 1,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 20:43:08"
    },
    {
        "id": 2,
        "theme_code": "default",
        "type": "static_content",
        "name": "معلومات العرض",
        "sort_order": 2,
        "status": 1,
        "channel_id": 1,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 20:43:08"
    },
    {
        "id": 3,
        "theme_code": "default",
        "type": "category_carousel",
        "name": "تصنيفات المجموعات",
        "sort_order": 3,
        "status": 1,
        "channel_id": 1,
        "created_at": "2025-12-06 20:43:08",
        "updated_at": "2025-12-06 20:43:08"
    }
]
```

---

### url_rewrites

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `entity_type` | varchar(255) | NO | NULL | MUL |  |
| `request_path` | varchar(255) | NO | NULL |  |  |
| `target_path` | varchar(255) | NO | NULL |  |  |
| `redirect_type` | varchar(255) | YES | NULL |  |  |
| `locale` | varchar(255) | NO | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| url_rewrites_et_rp_lc_idx | entity_type | No | BTREE |

---

### users

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `name` | varchar(255) | NO | NULL |  |  |
| `email` | varchar(255) | NO | NULL | UNI |  |
| `password` | varchar(255) | NO | NULL |  |  |
| `remember_token` | varchar(100) | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| users_email_unique | email | Yes | BTREE |

---

### visits

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | bigint unsigned | NO | NULL | PRI | auto_increment |
| `method` | varchar(255) | YES | NULL |  |  |
| `request` | mediumtext | YES | NULL |  |  |
| `url` | mediumtext | YES | NULL |  |  |
| `referer` | mediumtext | YES | NULL |  |  |
| `languages` | text | YES | NULL |  |  |
| `useragent` | text | YES | NULL |  |  |
| `headers` | text | YES | NULL |  |  |
| `device` | text | YES | NULL |  |  |
| `platform` | text | YES | NULL |  |  |
| `browser` | text | YES | NULL |  |  |
| `ip` | varchar(45) | YES | NULL |  |  |
| `visitable_type` | varchar(255) | YES | NULL | MUL |  |
| `visitable_id` | bigint unsigned | YES | NULL |  |  |
| `visitor_type` | varchar(255) | YES | NULL | MUL |  |
| `visitor_id` | bigint unsigned | YES | NULL |  |  |
| `channel_id` | int unsigned | YES | NULL | MUL |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| visits_visitable_type_visitable_id_index | visitable_type | No | BTREE |
| visits_visitor_type_visitor_id_index | visitor_type | No | BTREE |
| visits_cid_ip_m_vid_vt_ca_idx | channel_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| visits_channel_id_foreign | `channel_id` | `channels` | `id` |

---

### wishlist

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `channel_id` | int unsigned | NO | NULL | MUL |  |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `customer_id` | int unsigned | NO | NULL | MUL |  |
| `item_options` | json | YES | NULL |  |  |
| `moved_to_cart` | date | YES | NULL |  |  |
| `shared` | tinyint(1) | YES | NULL |  |  |
| `time_of_moving` | date | YES | NULL |  |  |
| `additional` | json | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| wishlist_channel_id_foreign | channel_id | No | BTREE |
| wishlist_product_id_foreign | product_id | No | BTREE |
| wishlist_customer_id_foreign | customer_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| wishlist_channel_id_foreign | `channel_id` | `channels` | `id` |
| wishlist_customer_id_foreign | `customer_id` | `customers` | `id` |
| wishlist_product_id_foreign | `product_id` | `products` | `id` |

---

### wishlist_items

**Rows:** 0

#### Structure

| Column | Type | Nullable | Default | Key | Extra |
|--------|------|----------|---------|-----|-------|
| `id` | int unsigned | NO | NULL | PRI | auto_increment |
| `channel_id` | int unsigned | NO | NULL | MUL |  |
| `product_id` | int unsigned | NO | NULL | MUL |  |
| `customer_id` | int unsigned | NO | NULL | MUL |  |
| `additional` | json | YES | NULL |  |  |
| `moved_to_cart` | date | YES | NULL |  |  |
| `shared` | tinyint(1) | YES | NULL |  |  |
| `created_at` | timestamp | YES | NULL |  |  |
| `updated_at` | timestamp | YES | NULL |  |  |

#### Indexes

| Key Name | Column | Unique | Type |
|----------|--------|--------|------|
| PRIMARY | id | Yes | BTREE |
| wishlist_items_channel_id_foreign | channel_id | No | BTREE |
| wishlist_items_product_id_foreign | product_id | No | BTREE |
| wishlist_items_customer_id_foreign | customer_id | No | BTREE |

#### Foreign Keys

| Constraint | Column | References | Referenced Column |
|------------|--------|------------|------------------|
| wishlist_items_channel_id_foreign | `channel_id` | `channels` | `id` |
| wishlist_items_customer_id_foreign | `customer_id` | `customers` | `id` |
| wishlist_items_product_id_foreign | `product_id` | `products` | `id` |

---

## 🔗 Key Relationships

### Core Multi-Tenant Relationships

```
channels (1) -----> (many) admins [via channel_id]
channels (1) -----> (many) channel_translations [via channel_id]
channels (many) <---> (many) locales [via channel_locales]
channels (many) <---> (many) currencies [via channel_currencies]
channels (many) <---> (many) inventory_sources [via channel_inventory_sources]
channels (1) -----> (1) categories [via root_category_id]

categories (1) -----> (many) category_translations [via category_id]
categories (many) <---> (many) products [via product_categories]

products (many) <---> (many) channels [via product_channels]
products (many) <---> (many) categories [via product_categories]

admins (many) -----> (1) roles [via role_id]
admins (many) -----> (1) channels [via channel_id]
  - channel_id = NULL → Super Admin
  - channel_id = value → Seller Admin
```

### Important Notes

- **Multi-tenancy:** Sellers are isolated by `channel_id`
- **Super Admin:** Identified by `admins.channel_id = NULL`
- **Categories:** Global (not channel-specific in structure)
- **Products:** Linked to channels via `product_channels` pivot table
- **Translations:** Most entities support multi-language via separate translation tables

