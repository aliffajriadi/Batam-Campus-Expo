<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait ClearCacheOnMutation
{
    /**
     * Map model classes to their cache tags to flush.
     */
    protected static function getCacheTagsToFlush(): array
    {
        return static::$cacheTagsToFlush ?? [];
    }

    protected static function bootClearCacheOnMutation()
    {
        static::saved(function () {
            static::flushCache();
        });

        static::deleted(function () {
            static::flushCache();
        });
    }

    protected static function flushCache()
    {
        $tags = static::getCacheTagsToFlush();
        if (!empty($tags)) {
            Cache::tags($tags)->flush();
        }
    }
}
