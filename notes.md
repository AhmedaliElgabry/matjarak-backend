Repository: https://github.com/AhmedaliElgabry/matjarak-backend.git


Run application:
php artisan serve --port=8000
php artisan db:quick-schema

logs:
echo "" > storage/logs/laravel.log
 cat storage/logs/laravel.log
tail -f storage/logs/laravel.log


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




after each resstart update the folloine file
/Users/ahmedali/Desktop/Matjarak/packages/Webkul/Admin/src/Http/Controllers/Catalog/ProductController.php
to 
<?php

namespace Webkul\Admin\Http\Controllers\Catalog;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Webkul\Admin\DataGrids\Catalog\ProductDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Http\Requests\InventoryRequest;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Admin\Http\Requests\ProductForm;
use Webkul\Admin\Http\Resources\AttributeResource;
use Webkul\Admin\Http\Resources\ProductResource;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Core\Rules\Slug;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Product\Helpers\Product;
use Webkul\Product\Helpers\ProductType;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Product\Repositories\ProductDownloadableLinkRepository;
use Webkul\Product\Repositories\ProductDownloadableSampleRepository;
use Webkul\Product\Repositories\ProductInventoryRepository;
use Webkul\Product\Repositories\ProductRepository;

class ProductController extends Controller
{
    /**
     * Using const variable for status.
     */
    const ACTIVE_STATUS = 1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected AttributeFamilyRepository $attributeFamilyRepository,
        protected ProductAttributeValueRepository $productAttributeValueRepository,
        protected ProductDownloadableLinkRepository $productDownloadableLinkRepository,
        protected ProductDownloadableSampleRepository $productDownloadableSampleRepository,
        protected ProductInventoryRepository $productInventoryRepository,
        protected ProductRepository $productRepository,
        protected CustomerRepository $customerRepository,
    ) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return datagrid(ProductDataGrid::class)->process();
        }

        $families = $this->attributeFamilyRepository->all();

        return view('admin::catalog.products.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $families = $this->attributeFamilyRepository->all();

        $configurableFamily = null;

        if ($familyId = request()->get('family')) {
            $configurableFamily = $this->attributeFamilyRepository->find($familyId);
        }

        return view('admin::catalog.products.create', compact('families', 'configurableFamily'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $this->validate(request(), [
            'type'                => 'required',
            'attribute_family_id' => 'required',
            'sku'                 => ['required', 'unique:products,sku', new Slug],
            'super_attributes'    => 'array|min:1',
            'super_attributes.*'  => 'array|min:1',
        ]);

        if (
            ProductType::hasVariants(request()->input('type'))
            && ! request()->has('super_attributes')
        ) {
            $configurableFamily = $this->attributeFamilyRepository
                ->find(request()->input('attribute_family_id'));

            return new JsonResponse([
                'data' => [
                    'attributes' => AttributeResource::collection($configurableFamily->configurable_attributes),
                ],
            ]);
        }

        Event::dispatch('catalog.product.create.before');

        $product = $this->productRepository->create(request()->only([
            'type',
            'attribute_family_id',
            'sku',
            'super_attributes',
            'family',
        ]));

        Event::dispatch('catalog.product.create.after', $product);

        session()->flash('success', trans('admin::app.catalog.products.create-success'));

        // FIX: Get current channel and locale to maintain context in redirect
        $currentChannel = core()->getRequestedChannel();
        $currentLocale = core()->getRequestedLocale();
        
        // Fallback to defaults if context is missing
        if (empty($currentChannel)) {
            $currentChannel = core()->getDefaultChannel();
        }
        if (empty($currentLocale)) {
            $currentLocale = core()->getDefaultLocale();
        }
        
        // Build redirect URL with channel and locale parameters to maintain context
        $redirectUrl = route('admin.catalog.products.edit', [
            'id' => $product->id,
        ]) . '?' . http_build_query([
            'channel' => $currentChannel->code,
            'locale' => $currentLocale->code,
        ]);

        return new JsonResponse([
            'data' => [
                'redirect_url' => $redirectUrl,
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $product = $this->productRepository->findOrFail($id);

        // FIX: Ensure channel and locale context is established
        // If not in URL, redirect with proper parameters
        if (!request()->has('channel') || !request()->has('locale')) {
            $currentChannel = core()->getRequestedChannel() ?? core()->getDefaultChannel();
            $currentLocale = core()->getRequestedLocale() ?? core()->getDefaultLocale();
            
            return redirect()->route('admin.catalog.products.edit', [
                'id' => $id,
                'channel' => $currentChannel->code,
                'locale' => $currentLocale->code,
            ]);
        }

        return view('admin::catalog.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProductForm $request, int $id)
    {
        Event::dispatch('catalog.product.update.before', $id);

        $product = $this->productRepository->update($request->all(), $id);

        Event::dispatch('catalog.product.update.after', $product);

        session()->flash('success', trans('admin::app.catalog.products.update-success'));

        // FIX: Maintain context in redirect after update
        $channel = request()->get('channel', core()->getRequestedChannel()->code);
        $locale = request()->get('locale', core()->getRequestedLocale()->code);
        
        return redirect()->route('admin.catalog.products.edit', [
            'id' => $id,
            'channel' => $channel,
            'locale' => $locale,
        ]);
    }

    /**
     * Update inventories.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateInventories(InventoryRequest $inventoryRequest, int $id)
    {
        $product = $this->productRepository->findOrFail($id);

        Event::dispatch('catalog.product.update.before', $id);

        $this->productInventoryRepository->saveInventories(request()->all(), $product);

        Event::dispatch('catalog.product.update.after', $product);

        return response()->json([
            'message'      => __('admin::app.catalog.products.saved-inventory-message'),
            'updatedTotal' => $this->productInventoryRepository->where('product_id', $product->id)->sum('qty'),
        ]);
    }

    /**
     * Uploads downloadable file.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadLink(int $id)
    {
        return response()->json(
            $this->productDownloadableLinkRepository->upload(request()->all(), $id)
        );
    }

    /**
     * Copy a given Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function copy(int $id)
    {
        try {
            Event::dispatch('catalog.product.create.before');

            $product = $this->productRepository->copy($id);

            Event::dispatch('catalog.product.create.after', $product);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());

            return redirect()->to(route('admin.catalog.products.index'));
        }

        return response()->json([
            'message' => trans('admin::app.catalog.products.product-copied'),
        ]);
    }

    /**
     * Uploads downloadable sample file.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadSample(int $id)
    {
        return response()->json(
            $this->productDownloadableSampleRepository->upload(request()->all(), $id)
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            Event::dispatch('catalog.product.delete.before', $id);

            $this->productRepository->delete($id);

            Event::dispatch('catalog.product.delete.after', $id);

            return new JsonResponse([
                'message' => trans('admin::app.catalog.products.delete-success'),
            ]);
        } catch (\Exception $e) {
            report($e);
        }

        return new JsonResponse([
            'message' => trans('admin::app.catalog.products.delete-failed'),
        ], 500);
    }

    /**
     * Mass delete the products.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $productIds = $massDestroyRequest->input('indices');

        try {
            foreach ($productIds as $productId) {
                $product = $this->productRepository->find($productId);

                if (isset($product)) {
                    Event::dispatch('catalog.product.delete.before', $productId);

                    $this->productRepository->delete($productId);

                    Event::dispatch('catalog.product.delete.after', $productId);
                }
            }

            return new JsonResponse([
                'message' => trans('admin::app.catalog.products.index.datagrid.mass-delete-success'),
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Mass update the products.
     */
    public function massUpdate(MassUpdateRequest $massUpdateRequest): JsonResponse
    {
        $productIds = $massUpdateRequest->input('indices');

        foreach ($productIds as $productId) {
            Event::dispatch('catalog.product.update.before', $productId);

            $product = $this->productRepository->update([
                'status'  => $massUpdateRequest->input('value'),
            ], $productId, ['status']);

            Event::dispatch('catalog.product.update.after', $product);
        }

        return new JsonResponse([
            'message' => trans('admin::app.catalog.products.index.datagrid.mass-update-success'),
        ], 200);
    }

    /**
     * To be manually invoked when data is seeded into products.
     *
     * @return \Illuminate\Http\Response
     */
    public function sync()
    {
        Event::dispatch('products.datagrid.sync', true);

        return redirect()->route('admin.catalog.products.index');
    }

    /**
     * Result of search product.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search()
    {
        $query = trim(request('query'));

        if (empty($query)) {
            return response()->json([
                'data' => [],
            ]);
        }

        $searchEngine = 'database';

        if (
            core()->getConfigData('catalog.products.search.engine') == 'elastic'
            && core()->getConfigData('catalog.products.search.admin_mode') == 'elastic'
        ) {
            $searchEngine = 'elastic';

            $indexNames = core()->getAllChannels()->map(function ($channel) {
                return Product::formatElasticSearchIndexName($channel->code, app()->getLocale());
            })->toArray();
        }

        $channelId = $this->customerRepository->find(request('customer_id'))->channel_id ?? null;

        $params = [
            'index'      => $indexNames ?? null,
            'name'       => request('query'),
            'sort'       => 'created_at',
            'order'      => 'desc',
            'channel_id' => $channelId,
        ];

        if (request()->has('type')) {
            $params['type'] = request('type');
        }

        if (request()->has('exclude_customizable_products')) {
            $params['exclude_customizable_products'] = request('exclude_customizable_products');
        }

        $products = $this->productRepository
            ->setSearchEngine($searchEngine)
            ->getAll($params);

        return ProductResource::collection($products);
    }

    /**
     * Download image or file.
     *
     * @param  int  $productId
     * @param  int  $attributeId
     * @return \Illuminate\Http\Response
     */
    public function download($productId, $attributeId)
    {
        $productAttribute = $this->productAttributeValueRepository->findOneWhere([
            'product_id'   => $productId,
            'attribute_id' => $attributeId,
        ]);

        return Storage::download($productAttribute['text_value']);
    }
}