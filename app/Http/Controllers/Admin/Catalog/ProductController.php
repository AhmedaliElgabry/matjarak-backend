<?php

namespace App\Http\Controllers\Admin\Catalog;

use Webkul\Admin\Http\Controllers\Catalog\ProductController as BaseProductController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;

/**
 * Product Controller Override
 * 
 * This overrides the package ProductController to add context preservation
 */
class ProductController extends BaseProductController
{
    /**
     * Store a newly created resource in storage.
     * 
     * OVERRIDE: Adds channel/locale context to redirect URL
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $this->validate(request(), [
            'type'                => 'required',
            'attribute_family_id' => 'required',
            'sku'                 => ['required', 'unique:products,sku', new \Webkul\Core\Rules\Slug],
            'super_attributes'    => 'array|min:1',
            'super_attributes.*'  => 'array|min:1',
        ]);

        if (
            \Webkul\Product\Helpers\ProductType::hasVariants(request()->input('type'))
            && ! request()->has('super_attributes')
        ) {
            $configurableFamily = $this->attributeFamilyRepository
                ->find(request()->input('attribute_family_id'));

            return new JsonResponse([
                'data' => [
                    'attributes' => \Webkul\Admin\Http\Resources\AttributeResource::collection($configurableFamily->configurable_attributes),
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
     * OVERRIDE: Validates and enforces channel/locale context
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
     * OVERRIDE: Maintains context in redirect after update
     *
     * @return \Illuminate\Http\Response
     */
    public function update(\Webkul\Admin\Http\Requests\ProductForm $request, int $id)
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
}