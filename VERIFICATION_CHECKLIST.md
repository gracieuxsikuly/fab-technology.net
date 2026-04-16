# ✅ CHECKLIST DE VÉRIFICATION

## Phase 1: Installation & Migrations

### ☐ Migrations exécutées
```bash
php artisan migrate
```
**Vérifications:**
- ☐ Tables créées dans la base: `site_settings`, `menus`, `footer_infos`, `social_links`, `sliders`
```bash
# Pour vérifier:
php artisan tinker
>>> DB::table('menus')->count()  # Devrait retourner 6
>>> DB::table('sliders')->count() # Devrait retourner 0
exit
```

### ☐ Seeders exécutés
```bash
php artisan db:seed
```
**Vérifications:**
- ☐ Paramètres site chargés
- ☐ 6 menus en base de données
- ☐ 2 footer infos (Goma + Lubumbashi)
- ☐ 4 social links (Twitter, FB, LinkedIn, Instagram)

---

## Phase 2: Fichiers créés

### ☐ Migrations
```
database/migrations/
├── 2025_04_16_000001_create_site_settings_table.php
├── 2025_04_16_000002_create_menus_table.php
├── 2025_04_16_000003_create_footer_infos_table.php
├── 2025_04_16_000004_create_social_links_table.php
└── 2025_04_16_000005_create_sliders_table.php
```

### ☐ Modèles
```
app/Models/
├── SiteSetting.php
├── Menu.php
├── FooterInfo.php
├── SocialLink.php
└── Slider.php
```

### ☐ Contrôleurs
```
app/Http/Controllers/
├── HomeController.php
├── SiteSettingController.php
├── MenuController.php
├── FooterInfoController.php
├── SocialLinkController.php
└── SliderController.php
```

### ☐ Vues
```
resources/views/
├── layouts/app.blade.php        (Layout admin)
├── partials/menu.blade.php      (Menu dynamique)
├── partials/footer.blade.php    (Footer dynamique)
├── welcome.blade.php             (Modifié - Sliders dyn)
└── backend/
    ├── settings/edit.blade.php
    ├── menus/create.blade.php
    ├── menus/edit.blade.php
    ├── menus/index.blade.php
    ├── footer-infos/create.blade.php
    ├── footer-infos/edit.blade.php
    ├── footer-infos/index.blade.php
    ├── social-links/create.blade.php
    ├── social-links/edit.blade.php
    ├── social-links/index.blade.php
    ├── sliders/create.blade.php
    ├── sliders/edit.blade.php
    └── sliders/index.blade.php
```

### ☐ Routes
```
routes/web.php - Contient:
✓ Route GET / → HomeController@index
✓ Route prefix /admin/ avec middleware auth:verified
  ✓ admin/settings (GET/PUT)
  ✓ admin/menus (resource)
  ✓ admin/footer-infos (resource)
  ✓ admin/social-links (resource)
  ✓ admin/sliders (resource)
```

### ☐ Seeders
```
database/seeders/
├── SiteSettingSeeder.php
├── MenuSeeder.php
├── FooterInfoSeeder.php
├── SocialLinkSeeder.php
└── DatabaseSeeder.php (modifié)
```

### ☐ CSS modifié
```
public/assets/css/main.css
- ✓ --accent-color: #18d26e → #1976d2 (bleu)
- ✓ --heading-color: #333333 → #0d47a1 (bleu foncé)
- ✓ --nav-hover-color: #18d26e → #1976d2
- ✓ Tous les boutons maintenant bleus
```

---

## Phase 3: Test de l'interface admin

### ☐ Accès à `/admin/settings`
```
URL: http://localhost/admin/settings
Expected: Formulaire avec:
  - Champ "Nom du site" (Fab-Technology)
  - Champ email (info@fab-technology.net)
  - Upload logo/favicon
  - SEO description/keywords
```

### ☐ Accès à `/admin/menus`
```
URL: http://localhost/admin/menus
Expected: Tableau avec 6 menus:
  1. Accueil (/)
  2. À Propos (/#about)
  3. Services (/#services)
  4. Galerie (/#portfolio)
  5. Équipe (/#team)
  6. Contact (/#contact)
```

### ☐ Test créer un menu
```
http://localhost/admin/menus/create
- Remplir: Name = "Blog", URL = "/blog"
- Is_active = checked
- Order = 7
- Cliquer "Créer"
- Expected: Redirection vers /admin/menus avec le nouveau menu
```

### ☐ Test éditer un menu
```
http://localhost/admin/menus/1/edit
- Changer "Accueil" en "Home"
- Cliquer "Mettre à jour"
- Expected: Menu updated (vérifier en allant à /admin/menus)
```

### ☐ Test supprimer un menu
```
/admin/menus
- Cliquer "Supprimer" sur le dernier menu créé
- Expected: Menu removed de la liste
```

### ☐ Accès à `/admin/sliders`
```
URL: http://localhost/admin/sliders
Expected: Message "Aucun slider" (normal au départ)
```

### ☐ Test créer un slider
```
http://localhost/admin/sliders/create
- Title: "Services IT"
- Description: "Découvrez nos services informatiques"
- Image: Upload une image .jpg/png
- Order: 1
- Is_active: checked
- Cliquer "Créer"
- Expected: Slider shows in gallery view, appears on homepage
```

### ☐ Accès à `/admin/social-links`
```
URL: http://localhost/admin/social-links
Expected: 4 réseaux sociaux actifs (Twitter, FB, LinkedIn, Instagram)
```

### ☐ Test éditer un lien social
```
/admin/social-links
- Éditer Twitter
- Remplir URL réelle: https://twitter.com/fabtech
- Cliquer "Mettre à jour"
- Expected: Footer du site show le lien cliquable avec icône
```

### ☐ Accès à `/admin/footer-infos`
```
URL: http://localhost/admin/footer-infos
Expected: 2 locations avec infos
  - Goma: +243847451389
  - Lubumbashi: +243995502421
```

---

## Phase 4: Test du frontend

### ☐ Homepage affiche layout correct
```
GET /
Expected:
- Header avec logo + menu bleu
- Hero carrousel avec image (si slider créé)
- Contenu du site
- Footer avec infos + réseaux sociaux
```

### ☐ Menu dynamique fonctionnel
```
Homepage
- Cliquer sur "À Propos"
- Expected: Scroll vers section #about ou redirection
- Cliquer sur "Contact"
- Expected: Scroll vers section #contact
```

### ☐ Footer affiche les données
```
Footer de la homepage
- ☐ Nom site visible: "Fab-Technology"
- ☐ Description visible
- ☐ Infos Goma (adresse, email, téléphone)
- ☐ Infos Lubumbashi(adresse, email, téléphone)
- ☐ Réseaux sociaux avec icônes cliquables
- ☐ Liens ouvrent en nouveau tab (target="_blank")
```

### ☐ Couleurs changées
```
Navigation bar
- ☐ Couleur des liens: bleu (#1976d2) au survol
- ☐ Boutons: bleu
- ☐ Texte: cohérent

Slider hero
- ☐ Couleur boutons: bleu (#1976d2)

Footer
- ☐ Fond sombre (#060606)
- ☐ Texte blanc
- ☐ Liens: bleu (#1976d2)
```

### ☐ Responsive design
```
Desktop (1200px+)
- ☐ Menu horizontal en haut
- ☐ 3 colonnes footer
- ☐ Carousel normal

Tablet (768px-1199px)
- ☐ Menu adapté
- ☐ Footer 2-3 colonnes
- ☐ Images responsive

Mobile (< 768px)
- ☐ Menu hamburger
- ☐ Footer 1 colonne
- ☐ Images full-width
```

---

## Phase 5: Test des uploads

### ☐ Upload logo
```
/admin/settings
- Upload logo.png
- Vérifier le fichier exists: /storage/logos/
- Vérifier affichage: <img src="{{ asset($setting->logo) }}">
```

### ☐ Upload favicon
```
/admin/settings
- Upload favicon.ico
- Vérifier fichier: /storage/favicon/
```

### ☐ Upload slider image
```
/admin/sliders/create
- Upload image > 1MB et < 5MB
- Vérifier: /storage/sliders/
- Vérifier affichage sur homepage
```

### ☐ Suppression avec fichier cleanup
```
/admin/sliders
- Supprimer un slider avec image
- Vérifier fichier supprimé: /storage/sliders/
- Vérifier plus visible sur le site
```

---

## Phase 6: Test de sécurité

### ☐ Routes admin protégées
```
Sans être connecté:
- GET /admin/settings
  Expected: Redirection vers /login

Connecté:
- GET /admin/settings
  Expected: Affichage du formulaire
```

### ☐ Email verification required
```
Compte non vérifié:
- POST /admin/menus
  Expected: Redirection vers verify email

Compte vérifié:
- POST /admin/menus
  Expected: Création du menu
```

### ☐ CSRF protection
```
POST /admin/menus sans token CSRF
- Expected: Erreur 419 ou 403

POST /admin/menus avec @csrf
- Expected: Succès
```

### ☐ File type validation
```
Upload un .exe en tant qu'image
- Expected: Erreur "The image must be an image"

Upload un .jpg valide
- Expected: Upload succès
```

---

## Phase 7: Base de données

### ☐ Intégrité des données
```
php artisan tinker

>>> Menu::where('is_active', true)->count() >= 6
>>> FooterInfo::where('is_active', true)->count() == 2
>>> SocialLink::where('is_active', true)->count() >= 3
>>> Slider::where('is_active', true)->count() >= 0
>>> SiteSetting::count() == 1

exit
```

### ☐ Relations OK (sans relation explicite)
```
>>> Menu::first()->url
=> "/"

>>> Slider::first()?->title
=> "Services IT"
```

### ☐ Seeders idempotents
```
php artisan db:seed
php artisan db:seed
# Pas de duplicates, pas d'erreur
```

---

## Phase 8: Logs & Erreurs

### ☐ Pas d'erreurs dans logs
```bash
tail -f storage/logs/laravel.log
# Dois être vide ou montrer que des infos (pas d'erreurs)
```

### ☐ Network tab clair
```
F12 → Network tab
GET / 
- Status: 200
- Time: < 3 secondes
- Pas de requêtes 404/500
```

### ☐ Console JavaScript propre
```
F12 → Console
# Pas d'erreurs rouges
# Peut avoir des warnings normaux
```

---

## 🎯 Critères d'acceptation complète

### ✅ Tous les fichiers présents
- [ ] 5 migrations
- [ ] 5 modèles
- [ ] 6 contrôleurs
- [ ] 20+ vues
- [ ] 4 seeders
- [ ] Layout app.blade.php

### ✅ Admin fonctionnel
- [ ] CRUD complet pour chaque resource
- [ ] Uploads sécurisés
- [ ] Messages flash visibles
- [ ] Validation affichée
- [ ] Ordre modifiable

### ✅ Frontend dynamique
- [ ] Menu depuis DB
- [ ] Footer depuis DB
- [ ] Sliders depuis DB
- [ ] Réseaux sociaux depuis DB
- [ ] Paramètres depuis DB

### ✅ Design moderne
- [ ] Couleur bleu/blanc appliquée
- [ ] Bootstrap 5 utilisé
- [ ] Responsive OK
- [ ] Interface cohérente

### ✅ Sécurité
- [ ] Auth requise
- [ ] Email verification required
- [ ] CSRF tokens
- [ ] Validation inputs
- [ ] File type checks

---

## 📝 Template de rapport

```markdown
# ✅ Rapport de vérification

Date: [YYYY-MM-DD]
Testeur: [Nom]

## Résumé
- Installation: ✅ / ❌
- Admin Interface: ✅ / ❌
- Frontend dynamique: ✅ / ❌
- Design: ✅ / ❌
- Sécurité: ✅ / ❌

## Issues trouvées
1. [Description]
   - Impact: 🔴 Critique / 🟡 Majeur / 🟢 Mineur
   - Solution: [Description]

## Notes
[Autres observations]

## Signature
[Nom] - [Date] - [Heure]
```

---

**Version**: 1.0  
**Last Updated**: Avril 2026  
**Status**: Ready for testing  
