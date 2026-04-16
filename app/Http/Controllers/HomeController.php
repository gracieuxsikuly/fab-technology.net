<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\FooterInfo;
use App\Models\SocialLink;
use App\Models\Slider;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the home page with dynamic data.
     */
    public function index()
    {
        $sliders = Slider::getActiveSliders();
        $menus = Menu::getActiveMenus();
        $footerInfos = FooterInfo::getActiveFooterInfos();
        $socialLinks = SocialLink::getActiveSocialLinks();
        $siteSetting = SiteSetting::getSetting();

        return view('welcome', [
            'sliders' => $sliders,
            'menus' => $menus,
            'footerInfos' => $footerInfos,
            'socialLinks' => $socialLinks,
            'siteSetting' => $siteSetting,
        ]);
    }
}
