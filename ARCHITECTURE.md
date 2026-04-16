# 📊 Architecture & Flux de Données

## 🏗️ Architecture MVC

```
┌─────────────────────────────────────────────────────────────┐
│                      FRONTEND (Vue Blade)                    │
├─────────────────────────────────────────────────────────────┤
│  welcome.blade.php (Home Page)                              │
│   ├── hero-carousel (Sliders dynamiques)                    │
│   ├── partials/menu (Navigation dynamique)                  │
│   └── partials/footer (Footer dynamique)                    │
└──────────────┬──────────────────────────────────────────────┘
               │ Consomme les données via
               ▼
┌──────────────────────────────────────────────────────────────┐
│               CONTRÔLEURS (Laravel)                          │
├──────────────────────────────────────────────────────────────┤
│  HomeController                                              │
│   └── index() → Récupère données & envoie à welcome.view   │
│                                                              │
│  Admin Controllers:                                          │
│   ├── SiteSettingController (CRUD paramètres)              │
│   ├── MenuController (CRUD menus)                          │
│   ├── FooterInfoController (CRUD pied de page)             │
│   ├── SocialLinkController (CRUD réseaux sociaux)          │
│   └── SliderController (CRUD sliders)                      │
└──────────────┬──────────────────────────────────────────────┘
               │ Interrogent
               ▼
┌──────────────────────────────────────────────────────────────┐
│               MODÈLES (Eloquent ORM)                         │
├──────────────────────────────────────────────────────────────┤
│  SiteSetting        →  site_settings table                   │
│  Menu               →  menus table                           │
│  FooterInfo         →  footer_infos table                    │
│  SocialLink         →  social_links table                    │
│  Slider             →  sliders table                         │
└──────────────┬──────────────────────────────────────────────┘
               │ Accèdent
               ▼
┌──────────────────────────────────────────────────────────────┐
│               BASE DE DONNÉES (MySQL/PostgreSQL)             │
├──────────────────────────────────────────────────────────────┤
│  site_settings  │  menus  │  footer_infos  │  social_links  │
│  sliders        │  ...                                        │
└──────────────────────────────────────────────────────────────┘
```

---

## 🔄 Flux de requête - Exemple: Affichage d'une page

### Utilisateur accède à `/`

```
1. Request → GET /
   ↓
2. Route (routes/web.php)
   → Route::get('/', [HomeController::class, 'index'])
   ↓
3. HomeController::index()
   → Récupère les données:
      - $sliders = Slider::getActiveSliders()
      - $menus = Menu::getActiveMenus()
      - $footerInfos = FooterInfo::getActiveFooterInfos()
      - $socialLinks = SocialLink::getActiveSocialLinks()
      - $siteSetting = SiteSetting::getSetting()
   ↓
4. return view('welcome', $data)
   → Blade affiche les données dynamiquement
   ↓
5. HTML Response → Navigateur
```

---

## 🔒 Flux d'administration - Exemple: Créer un menu

### Admin accède à `/admin/menus/create`

```
1. Request → GET /admin/menus/create
   ↓
2. Auth Middleware
   → Vérifie que l'utilisateur est authentifié
   → Vérifie que l'email est vérifié ('verified')
   ↓
3. Route (routes/web.php)
   → Route::get('menus/create', [MenuController::class, 'create'])
   ↓
4. MenuController::create()
   → return view('backend.menus.create')
   ↓
5. Blade affiche le formulaire
```

### Admin remplit le formulaire et persiste

```
1. Request → POST /admin/menus (avec données du formulaire)
   ↓
2. Auth Middleware + CSRF Protection
   ↓
3. Route → MenuController::store()
   ↓
4. Validation:
   $validated = $request->validate([
       'name' => 'required|string|max:255',
       'url' => 'required|string|max:255',
       'order' => 'nullable|integer',
       'is_active' => 'nullable|boolean',
   ])
   ↓
5. Create Model:
   Menu::create($validated)
   ↓ 
6. Redirect with success message
   → Retour à /admin/menus (index)
```

---

## 📋 Endpoints API

### Frontend Routes (Non-Admin)
```
GET  /                          → HomeController@index
GET  /langue/{lang}             → LangController@switch
GET  /service-details/{slug}    → view detailservice
GET  /fabtech-details/{type}/{id} → view visionmissionprojet
```

### Admin Routes (Protégées par auth:verified)
```
Admin Settings (Paramètres)
  GET    /admin/settings          → SiteSettingController@edit
  PUT    /admin/settings          → SiteSettingController@update

Menus
  GET    /admin/menus             → MenuController@index
  GET    /admin/menus/create      → MenuController@create
  POST   /admin/menus             → MenuController@store
  GET    /admin/menus/{menu}/edit → MenuController@edit
  PUT    /admin/menus/{menu}      → MenuController@update
  DELETE /admin/menus/{menu}      → MenuController@destroy

Footer Infos
  GET    /admin/footer-infos             → FooterInfoController@index
  GET    /admin/footer-infos/create      → FooterInfoController@create
  POST   /admin/footer-infos             → FooterInfoController@store
  GET    /admin/footer-infos/{info}/edit → FooterInfoController@edit
  PUT    /admin/footer-infos/{info}      → FooterInfoController@update
  DELETE /admin/footer-infos/{info}      → FooterInfoController@destroy

Social Links
  GET    /admin/social-links              → SocialLinkController@index
  GET    /admin/social-links/create       → SocialLinkController@create
  POST   /admin/social-links              → SocialLinkController@store
  GET    /admin/social-links/{link}/edit  → SocialLinkController@edit
  PUT    /admin/social-links/{link}       → SocialLinkController@update
  DELETE /admin/social-links/{link}       → SocialLinkController@destroy

Sliders
  GET    /admin/sliders              → SliderController@index
  GET    /admin/sliders/create       → SliderController@create
  POST   /admin/sliders              → SliderController@store
  GET    /admin/sliders/{slider}/edit → SliderController@edit
  PUT    /admin/sliders/{slider}     → SliderController@update
  DELETE /admin/sliders/{slider}     → SliderController@destroy
```

---

## 💾 Persistance des données

### Upload de fichiers

```
Formulaire (form enctype="multipart/form-data")
  ↓
Request::file('image')
  ↓
Validation:
  'image' => 'image|mimes:jpeg,png,jpg|max:2048'
  ↓
Storage:
  $path = $request->file('image')->store('sliders', 'public')
  ↓
Save path to DB:
  $model->update(['image' => 'storage/' . $path])
  ↓
Access via asset():
  <img src="{{ asset($slider->image) }}">
```

### File cleanup (Suppression)

```
Model::destroy()
  ↓
Check if file exists:
  if (file_exists(public_path($model->image)))
  ↓
Delete file:
  unlink(public_path($model->image))
  ↓
Delete DB record:
  $model->delete()
```

---

## 🎨 Données côté Frontend

### Template variables passées

```php
// Par HomeController::index()
[
    'sliders' => Slider::getActiveSliders(),           // Collection
    'menus' => Menu::getActiveMenus(),                 // Collection
    'footerInfos' => FooterInfo::getActiveFooterInfos(), // Collection
    'socialLinks' => SocialLink::getActiveSocialLinks(), // Collection
    'siteSetting' => SiteSetting::getSetting(),        // Single object
]
```

### Utilisation en Blade

```blade
<!-- Afficher le nom du site -->
{{ $siteSetting->site_name }}

<!-- Boucler sur les menus -->
@foreach($menus as $menu)
  <a href="{{ $menu->url }}">{{ $menu->name }}</a>
@endforeach

<!-- Afficher les sliders (max 3) -->
@foreach($sliders as $slider)
  <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}">
@endforeach

<!-- Afficher les réseaux sociaux -->
@foreach($socialLinks as $link)
  <a href="{{ $link->url }}" target="_blank">
    <i class="bi {{ $link->icon }}"></i>
  </a>
@endforeach
```

---

## 🔐 Middleware & Sécurité

### Authentication Middleware
```php
// Toutes les routes admin utilisent:
Route::middleware(['auth', 'verified'])->group(function () {
    // ...
})
```

**Vérifie:**
- ✅ L'utilisateur est authentifié (Login)
- ✅ L'email est vérifié (Email verification)

### CSRF Protection
```php
// Automatiquement sur tous les formulaires POST/PUT/DELETE
<form method="POST">
    @csrf  // Token automatiquement inclus
    ...
</form>
```

### Validation côté serveur
```php
$validated = $request->validate([
    'email' => 'required|email',
    'name' => 'required|string|max:255',
    'is_active' => 'nullable|boolean',
]);
```

---

## 📊 Modèles & Relations

### Pas de relations entre modèles

```php
// Chaque modèle est indépendant:
SiteSetting  // Singleton (1 seul record)
Menu         // Autonomous (listes indépendantes)
FooterInfo   // Autonomous (listes indépendantes)
SocialLink   // Autonomous (listes indépendantes)
Slider       // Autonomous (listes indépendantes)
```

### Helper methods

```php
// Récupère tous les éléments actifs et ordonnés
Menu::getActiveMenus()
FooterInfo::getActiveFooterInfos()
SocialLink::getActiveSocialLinks()
Slider::getActiveSliders()  // Limite à 3

// Récupère l'unique paramètre, ou le crée
SiteSetting::getSetting()
```

---

## 🗂️ Organisation des fichiers

```
app/
├── Http/
│   └── Controllers/
│       ├── HomeController.php                      ← Frontend
│       ├── SiteSettingController.php              ← Admin
│       ├── MenuController.php                     ← Admin
│       ├── FooterInfoController.php               ← Admin
│       ├── SocialLinkController.php               ← Admin
│       └── SliderController.php                   ← Admin
│
├── Models/
│   ├── SiteSetting.php
│   ├── Menu.php
│   ├── FooterInfo.php
│   ├── SocialLink.php
│   └── Slider.php
│
database/
├── migrations/
│   ├── 2025_04_16_000001_create_site_settings_table.php
│   ├── 2025_04_16_000002_create_menus_table.php
│   ├── 2025_04_16_000003_create_footer_infos_table.php
│   ├── 2025_04_16_000004_create_social_links_table.php
│   └── 2025_04_16_000005_create_sliders_table.php
│
├── seeders/
│   ├── SiteSettingSeeder.php
│   ├── MenuSeeder.php
│   ├── FooterInfoSeeder.php
│   ├── SocialLinkSeeder.php
│   └── DatabaseSeeder.php
│
resources/
├── views/
│   ├── welcome.blade.php               ← Frontend (Hero + Sliders)
│   ├── partials/
│   │   ├── menu.blade.php              ← Navigation dynamique
│   │   └── footer.blade.php            ← Footer dynamique
│   ├── layouts/
│   │   └── app.blade.php               ← Admin layout
│   └── backend/
│       ├── settings/edit.blade.php
│       ├── menus/
│       ├── footer-infos/
│       ├── social-links/
│       └── sliders/
│
routes/
└── web.php                             ← Routes frontend + admin

public/assets/css/
└── main.css                            ← Palette couleurs (Bleu/Blanc)
```

---

## 🧪 Cycle de vie - Créer un slider

### Admin UI
```
1. Admin va à /admin/sliders
2. Clique "Ajouter un Slider"
3. Remplit le formulaire:
   - Title: "Nouveaux services"
   - Description: "Découvrez nos services..."
   - Image: (upload .jpg)
   - Order: 1
   - is_active: checked
4. Clique "Créer"
```

### Backend
```
POST /admin/sliders
  ↓ Validation
  ✓ title required
  ✓ image required + image type
  ✓ order nullable integer
  ✓ is_active checkbox
  ↓ File Upload
  → File goes to: storage/app/public/sliders/hash.jpg
  → Path saved: storage/sliders/hash.jpg
  ↓ Model Create
  → Slider::create([
      'title' => 'Nouveaux services',
      'description' => 'Découvrez...',
      'image' => 'storage/sliders/abc123.jpg',
      'order' => 1,
      'is_active' => true,
    ])
  ↓ Redirect
  → 302 /admin/sliders?success=created
```

### Display on Frontend
```
GET / (HomeController@index)
  → Slider::getActiveSliders()  // Récupère max 3 actifs
  → Passe à welcome.blade.php
  ↓ Template
  @foreach($sliders as $slider)
    <img src="{{ asset($slider->image) }}">
    <h2>{{ $slider->title }}</h2>
    <p>{{ $slider->description }}</p>
  @endforeach
```

---

## 📈 Performance & Caching (Recommandations futures)

```php
// Ajouter du cache pour les données statiques:
Menu::getActiveMenus()           // Cache 1 heure
FooterInfo::getActiveFooterInfos() // Cache 1 heure
SocialLink::getActiveSocialLinks() // Cache 1 heure
Slider::getActiveSliders()        // Cache 1 heure
```

---

## 🔄 Flux Complet

```
┌─────────────────┐
│  User Browser   │
└────────┬────────┘
         │ GET /admin/menus/create
         ↓
┌─────────────────────────────┐
│  Route Handler              │
│  + Auth Middleware          │
│  + Verified Middleware      │
└────────┬────────────────────┘
         │
         ↓
┌─────────────────────────────┐
│  MenuController@create      │
│  return view('...create')   │
└────────┬────────────────────┘
         │
         ↓
┌─────────────────────────────┐
│  Blade Template             │
│  form action=/admin/menus   │
└────────┬────────────────────┘
         │ (displays to user)
         ↓
┌─────────────────┐
│  User fills     │
│  & submits form │
└────────┬────────┘
         │ POST /admin/menus
         ↓
┌─────────────────────────────┐
│  Request Handler            │
│  + CSRF Token Verify        │
│  + Auth Check               │
└────────┬────────────────────┘
         │
         ↓
┌─────────────────────────────┐
│  MenuController@store       │
│  - Validate input           │
│  - Menu::create()           │
│  - redirect()->with('msg')  │
└────────┬────────────────────┘
         │ (updates DB)
         ↓
┌─────────────────┐
│  Browser        │
│  302 Redirect   │
│  /admin/menus   │
└────────┬────────┘
         │
         ↓
┌─────────────────────────────┐
│  MenuController@index       │
│  $menus = Menu::all()       │
│  return view('...index')    │
└────────┬────────────────────┘
         │
         ↓
┌─────────────────┐
│  Success Page   │
│  Updated List   │
└─────────────────┘
```

---

**Document Version:** 1.0  
**Last Updated:** Avril 2026
