<?php

namespace App\Services;

class ChannelContext
{
    private static ?int $channelId = null;
    private static bool $isSuperAdmin = false;
    private static bool $initialized = false;

    /**
     * Initialize context from admin user
     */
    public static function initialize(): void
    {
        if (self::$initialized) {
            return;
        }

        $admin = auth()->guard('admin')->user();

        if (!$admin) {
            self::$channelId = null;
            self::$isSuperAdmin = false;
        } else {
            self::$isSuperAdmin = $admin->channel_id === null;
            self::$channelId = $admin->channel_id;
        }

        self::$initialized = true;
    }

    /**
     * Get current channel ID
     */
    public static function getId(): ?int
    {
        self::initialize();
        return self::$channelId;
    }

    /**
     * Check if super admin
     */
    public static function isSuperAdmin(): bool
    {
        self::initialize();
        return self::$isSuperAdmin;
    }

    /**
     * Should queries be filtered?
     */
    public static function shouldFilter(): bool
    {
        return !self::isSuperAdmin() && self::getId() !== null;
    }

    /**
     * Get channel IDs (array for compatibility)
     */
    public static function getIds(): array
    {
        $id = self::getId();
        return $id ? [$id] : [];
    }

    /**
     * Reset context (for testing)
     */
    public static function reset(): void
    {
        self::$channelId = null;
        self::$isSuperAdmin = false;
        self::$initialized = false;
    }
}