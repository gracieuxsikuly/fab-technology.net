<?php

namespace App\Console\Commands;

use App\Models\Menu;
use App\Models\Slider;
use App\Models\FooterInfo;
use App\Models\SocialLink;
use App\Models\SiteSetting;
use Illuminate\Console\Command;

class ClearFrontendCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clear-frontend';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Clear all frontend content caches (menus, sliders, footer info, social links, and site settings)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Clearing frontend caches...');

        Menu::clearCache();
        $this->info('✓ Menus cache cleared');

        Slider::clearCache();
        $this->info('✓ Sliders cache cleared');

        FooterInfo::clearCache();
        $this->info('✓ Footer info cache cleared');

        SocialLink::clearCache();
        $this->info('✓ Social links cache cleared');

        SiteSetting::clearCache();
        $this->info('✓ Site settings cache cleared');

        $this->info('All frontend caches have been cleared successfully!');
    }
}
