<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class LangController extends Controller
{
    public function switch($lang)
    {
        if (!in_array($lang, ['fr', 'en'])) {
            $lang = 'fr';
        }
        session(['locale' => $lang]);
        App::setLocale($lang);
        return Redirect::back();
    }
}
