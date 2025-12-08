<?php

namespace App\Models;

use Webkul\User\Models\Admin as BaseAdmin;
use Webkul\Core\Models\ChannelProxy;
use Webkul\User\Models\RoleProxy; // Import RoleProxy

class Admin extends BaseAdmin
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'api_token',
        'role_id',
        'status',
        'channel_id',
        'role', // This is the column causing the conflict
    ];

    // ==========================================
    // FIX THE CONFLICT
    // ==========================================

    /**
     * We must override the original 'role' relationship.
     * Since we have a column named 'role', calling $this->role returns a string.
     * Bagisto's Bouncer expects an object.
     * * Solution: We don't change the relationship name (because Bagisto core uses ->role),
     * but we ensure that when accessing the relationship, it works correctly.
     * * However, the safest way in Laravel when a column name collides with a relation
     * is to use a DIFFERENT name for the relation, but we can't change Bagisto core calls.
     * * ALTERNATIVE FIX: 
     * We will create a robust accessor that checks if we have the object or the string.
     */
    
    public function getRoleAttribute()
    {
        // If the relation is already loaded, return it
        if ($this->relationLoaded('role')) {
            return $this->getRelation('role');
        }

        // If 'role_id' is set, fetch the Role model manually to satisfy Bouncer
        if ($this->role_id) {
            $roleModel = app(RoleProxy::modelClass());
            return $roleModel->find($this->role_id);
        }

        return null;
    }

    // ==========================================
    // SAAS RELATIONSHIPS
    // ==========================================

    public function channel()
    {
        return $this->belongsTo(ChannelProxy::modelClass(), 'channel_id');
    }

    // ==========================================
    // SAAS HELPER METHODS
    // ==========================================

    public function isSuperAdmin(): bool
    {
        // Use array attributes to bypass the accessor we just wrote
        return ($this->attributes['role'] ?? null) === 'super_admin';
    }

    public function isSeller(): bool
    {
        return ($this->attributes['role'] ?? null) === 'seller';
    }

    public function getChannelName(): ?string
    {
        return $this->channel?->translations->first()?->name;
    }
}