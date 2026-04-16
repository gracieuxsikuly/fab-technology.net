# Cache Implementation Documentation

## Overview

This document describes the caching implementation for frontend content in the fab-technology.net Laravel application. The implementation significantly improves performance by caching frequently accessed data that doesn't change often.

## What Was Cached

The following data is now cached with a 24-hour duration:

### 1. **Menus** (`menus.active`)
- **Model**: `App\Models\Menu`
- **Method**: `Menu::getActiveMenus()`
- **Used in**: Frontend navigation menu, header
- **Cache Key**: `menus.active`
- **Cache Duration**: 24 hours

### 2. **Sliders** (`sliders.active`)
- **Model**: `App\Models\Slider`
- **Method**: `Slider::getActiveSliders()`
- **Used in**: Hero section carousel
- **Cache Key**: `sliders.active`
- **Cache Duration**: 24 hours
- **Limit**: 3 active sliders maximum

### 3. **Site Settings** (`site_setting`)
- **Model**: `App\Models\SiteSetting`
- **Method**: `SiteSetting::getSetting()`
- **Used in**: Meta tags, site metadata, branding
- **Cache Key**: `site_setting`
- **Cache Duration**: 24 hours

### 4. **Footer Information** (`footer_infos.active`)
- **Model**: `App\Models\FooterInfo`
- **Method**: `FooterInfo::getActiveFooterInfos()`
- **Used in**: Footer section
- **Cache Key**: `footer_infos.active`
- **Cache Duration**: 24 hours

### 5. **Social Links** (`social_links.active`)
- **Model**: `App\Models\SocialLink`
- **Method**: `SocialLink::getActiveSocialLinks()`
- **Used in**: Footer, social sharing
- **Cache Key**: `social_links.active`
- **Cache Duration**: 24 hours

## Implementation Details

### Cache Clear Methods

Each model has a static `clearCache()` method that removes the corresponding cache entry:

```php
// Example usage
Menu::clearCache();
Slider::clearCache();
FooterInfo::clearCache();
SocialLink::clearCache();
SiteSetting::clearCache();
```

### Automatic Cache Invalidation

Cache is automatically cleared when data is modified through the administration panel:

#### Menu Controller (`MenuController`)
- `store()` - creates new menu
- `update()` - updates existing menu
- `destroy()` - deletes menu
- `updateOrder()` - changes menu order

#### Slider Controller (`SliderController`)
- `store()` - creates new slider
- `update()` - updates existing slider
- `destroy()` - deletes slider

#### Footer Info Controller (`FooterInfoController`)
- `store()` - creates new footer info
- `update()` - updates existing footer info
- `destroy()` - deletes footer info

#### Social Link Controller (`SocialLinkController`)
- `store()` - creates new social link
- `update()` - updates existing social link
- `destroy()` - deletes social link

#### Site Setting Controller (`SiteSettingController`)
- `update()` - updates site settings

## Manual Cache Clearing

### Using Artisan Command

A custom Artisan command has been created to manually clear all frontend caches:

```bash
php artisan cache:clear-frontend
```

This command will:
- Clear menus cache
- Clear sliders cache
- Clear footer info cache
- Clear social links cache
- Clear site settings cache

### Using Cache Facade

You can also clear caches programmatically:

```php
use Illuminate\Support\Facades\Cache;

// Clear specific cache
Cache::forget('menus.active');

// Or use the model methods
use App\Models\Menu;
Menu::clearCache();
```

## Performance Impact

### Before Implementation
- **Database Hits per Page Load**: 5 queries
  - 1 for menus (every page)
  - 1 for sliders (home page)
  - 1 for footer info (every page)
  - 1 for social links (every page)
  - 1 for site settings (every page)

### After Implementation
- **Database Hits per Page Load**: 0 queries (after first request)
  - All data served from cache
  - Cache refreshed every 24 hours automatically
  - Cache invalidated immediately upon admin changes

### Expected Benefits
- **Faster Page Load Times**: Eliminates 5 database queries per request
- **Reduced Database Load**: Significant reduction in concurrent database connections
- **Better User Experience**: Faster frontend response times
- **Improved SEO**: Faster page load times contribute to better search rankings

## Cache Storage

By default, Laravel caches to the configured cache store. Check your `.env` file:

```env
CACHE_DRIVER=file  # or redis, memcached, database, etc.
```

The cache implementation works with all Laravel cache drivers.

## Troubleshooting

### Cache Not Working

1. Verify the cache driver is configured correctly in `config/cache.php`
2. Check that `CACHE_DRIVER` is set in `.env`
3. Ensure the cache directory has proper write permissions (if using file driver)
4. Clear all caches using: `php artisan cache:clear`

### Changes Not Appearing on Frontend

If you make changes in the admin panel and don't see them on the frontend:

1. Wait up to 24 hours for the cache to expire naturally
2. Or clear the specific cache using one of the methods above
3. Or use the custom command: `php artisan cache:clear-frontend`

### Disable Caching for Development

To disable caching during development, you can temporarily modify the cache duration in the model methods:

```php
// In your model, change:
return Cache::remember('menus.active', 60 * 60 * 24, function () {
    // ...
});

// To (no caching):
return self::where('is_active', true)
    ->orderBy('order')
    ->get();
```

## Cache Keys Reference

| Component | Cache Key | Duration |
|-----------|-----------|----------|
| Menus | `menus.active` | 24h |
| Sliders | `sliders.active` | 24h |
| Site Settings | `site_setting` | 24h |
| Footer Info | `footer_infos.active` | 24h |
| Social Links | `social_links.active` | 24h |

## Files Modified

1. **Models**:
   - `app/Models/Menu.php`
   - `app/Models/Slider.php`
   - `app/Models/FooterInfo.php`
   - `app/Models/SocialLink.php`
   - `app/Models/SiteSetting.php`

2. **Controllers**:
   - `app/Http/Controllers/MenuController.php`
   - `app/Http/Controllers/SliderController.php`
   - `app/Http/Controllers/FooterInfoController.php`
   - `app/Http/Controllers/SocialLinkController.php`
   - `app/Http/Controllers/SiteSettingController.php`

3. **Commands**:
   - `app/Console/Commands/ClearFrontendCache.php` (new)

## Best Practices

1. **Cache Invalidation**: Always clear the appropriate cache after making changes via the admin panel (this is automatic through the controllers)

2. **Monitoring**: Monitor your application logs for any cache-related issues

3. **Cache Expiry**: The 24-hour cache duration is configurable - adjust based on your needs:
   - Lower duration = more frequent database hits but fresher data
   - Higher duration = fewer database hits but potentially stale data

4. **Testing**: When testing changes, remember to clear the cache if needed

## Future Enhancements

Consider implementing:
- Event-driven cache invalidation using Laravel Events
- Cache tagging for more granular control
- Real-time cache updates when admin makes changes (push notifications)
- Cache warming on deployment to pre-populate cache
