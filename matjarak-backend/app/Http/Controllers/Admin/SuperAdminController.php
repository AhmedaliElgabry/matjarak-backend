<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SellerService;
use Webkul\Core\Models\Channel;
use Webkul\User\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    protected $sellerService;

    public function __construct(SellerService $sellerService)
    {
        $this->sellerService = $sellerService;
    }

    /**
     * Display listing of sellers
     */
    public function index()
    {
        // Get all channels except default
        $channels = Channel::where('code', '!=', 'default')
            ->with(['locales', 'currencies'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Get admin counts and attach admin info to each channel
        $sellers = $channels->map(function ($channel) {
            // Get the first admin for this channel
            $admin = Admin::where('channel_id', $channel->id)->first();
            
            // Get count of admins for this channel
            $adminCount = Admin::where('channel_id', $channel->id)->count();

            // Attach admin info to channel
            $channel->admin = $admin;
            $channel->admin_count = $adminCount;

            return $channel;
        });

        return view('admin.super-admin.index', compact('sellers'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.super-admin.create');
    }

    /**
     * Store new seller
     */
    public function store(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string|max:255',
            'store_code' => 'required|string|max:255|unique:channels,code',
            'hostname' => 'required|string|max:255',
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|unique:admins,email',
            'admin_password' => 'required|string|min:8|confirmed',
            'default_locale_id' => 'required|exists:locales,id',
            'base_currency_id' => 'required|exists:currencies,id',
        ]);

        $result = $this->sellerService->createSeller($request->all());

        if ($result['success']) {
            return redirect()
                ->route('admin.super-admin.index')
                ->with('success', "Seller '{$request->store_name}' created successfully!");
        }

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Failed to create seller: ' . $result['error']);
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $channel = Channel::findOrFail($id);
        $admin = Admin::where('channel_id', $channel->id)->first();

        return view('admin.super-admin.edit', compact('channel', 'admin'));
    }

    /**
     * Update seller
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'store_name' => 'required|string|max:255',
            'hostname' => 'required|string|max:255',
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|unique:admins,email,' . Admin::where('channel_id', $id)->first()?->id,
            'admin_password' => 'nullable|string|min:8|confirmed',
        ]);

        $result = $this->sellerService->updateSeller($id, $request->all());

        if ($result['success']) {
            return redirect()
                ->route('admin.super-admin.index')
                ->with('success', $result['message']);
        }

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Failed to update seller: ' . $result['error']);
    }

    /**
     * Delete seller
     */
    public function destroy($id)
    {
        $channel = Channel::findOrFail($id);
        
        // Prevent deletion of default channel
        if ($channel->code === 'default') {
            return redirect()
                ->back()
                ->with('error', 'Cannot delete the default channel!');
        }

        $result = $this->sellerService->deleteSeller($id);

        if ($result['success']) {
            return redirect()
                ->route('admin.super-admin.index')
                ->with('success', $result['message']);
        }

        return redirect()
            ->back()
            ->with('error', 'Failed to delete seller: ' . $result['error']);
    }

    /**
     * Toggle seller status
     */
    public function toggleStatus($id)
    {
        $admin = Admin::where('channel_id', $id)->first();

        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'Admin not found'
            ]);
        }

        $admin->status = !$admin->status;
        $admin->save();

        return response()->json([
            'success' => true,
            'status' => $admin->status,
            'message' => 'Status updated successfully'
        ]);
    }
}