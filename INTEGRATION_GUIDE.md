# 🚀 Modernisation FAB-TECHNOLOGY - Guide d'intégration

## ✅ Récapitulatif des modifications

### 1️⃣ Base de données ajoutée
- ✅ Table `site_settings` - Paramètres du site (logo, email, téléphone)
- ✅ Table `menus` - Menu de navigation dynamique
- ✅ Table `footer_infos` - Informations du pied de page
- ✅ Table `social_links` - Liens des réseaux sociaux
- ✅ Table `sliders` - Carrousel Hero dynamique (max 3 images)

### 2️⃣ Modèles Laravel créés
```
app/Models/
├── SiteSetting.php        (Paramètres du site)
├── Menu.php               (Navigation)
├── FooterInfo.php         (Pied de page)
├── SocialLink.php         (Réseaux sociaux)
└── Slider.php             (Carrousel)
```

### 3️⃣ Contrôleurs CRUD créés
```
app/Http/Controllers/
├── HomeController.php           (Affichage frontend dynamique)
├── SiteSettingController.php    (Gestion paramètres)
├── MenuController.php           (CRUD menus)
├── FooterInfoController.php     (CRUD pied de page)
├── SocialLinkController.php     (CRUD réseaux sociaux)
└── SliderController.php         (CRUD sliders)
```

### 4️⃣ Vues d'administration créées
```
resources/views/backend/
├── settings/
│   └── edit.blade.php           (Paramètres site avec upload)
├── menus/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── footer-infos/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── social-links/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
└── sliders/
    ├── index.blade.php
    ├── create.blade.php
    └── edit.blade.php
```

### 5️⃣ Layout admin créé
- ✅ `resources/views/layouts/app.blade.php` - Layout Bootstrap moderne avec sidebar

### 6️⃣ Modifications frontend
- ✅ Menu dynamique depuis `Menu::getActiveMenus()`
- ✅ Footer dynamique avec infos et liens sociaux
- ✅ Slider Hero dynamique (fallback aux traductions statiques)
- ✅ Palette de couleurs: **Vert (#18d26e) → Bleu (#1976d2) + Blanc**

### 7️⃣ Routes ajoutées
Toutes les routes admin sont préfixées par `/admin` et sécurisées avec `auth:verified`
```
admin/settings      - Paramètres site
admin/menus/*       - CRUD menus
admin/footer-infos/* - CRUD pied de page
admin/social-links/* - CRUD réseaux sociaux
admin/sliders/*     - CRUD sliders
```

---

## 📋 Étapes d'installation

### 1. Exécuter les migrations
```bash
php artisan migrate
```

### 2. Remplir la base de données avec les données par défaut
```bash
php artisan db:seed
```

Ou exécuter les seeders spécifiques :
```bash
php artisan db:seed --class=SiteSettingSeeder
php artisan db:seed --class=MenuSeeder
php artisan db:seed --class=FooterInfoSeeder
php artisan db:seed --class=SocialLinkSeeder
```

### 3. Créer un lien symbolique pour les fichiers uploadés (si nécessaire)
```bash
php artisan storage:link
```

### 4. Accéder à l'administration
- URL: `/admin/*`
- Sécurité: Authentification requise + Email verified
- Exemple: `http://localhost/admin/settings`

---

## 🎨 Palette de couleurs

**Ancien thème:**
- Couleur principale: Vert (#18d26e)
- Logo + Accent: Vert

**Nouveau thème:**
- Couleur principale: Bleu (#1976d2)
- Couleur foncée: Bleu marine (#0d47a1)
- Couleur claire: Bleu ciel (#42a5f5)
- Fond secondaire: Gris clair (#f5f7fa)
- Texte: Gris (#555555)

Tous les boutons, liens actifs, et éléments d'interface utilisent maintenant le thème bleu/blanc.

---

## 📁 Structure uploading

Les fichiers uploadés sont sauvegardés dans le dossier `public/storage/` :

```
storage/app/public/
├── logos/           (Logo du site)
├── favicon/         (Favicon)
├── sliders/         (Images carrousel)
└── ...
```

**Validation des uploads:**
- Logo: JPEG, PNG, JPG, GIF (Max 2 MB)
- Favicon: JPEG, PNG, JPG, GIF, ICO (Max 1 MB)
- Sliders: JPEG, PNG, JPG, GIF, WebP (Max 5 MB)

---

## 🔧 Fonctionnalités principales

### Paramètres du site (`/admin/settings`)
- Nom du site
- Description
- Email & Téléphone
- Logo et Favicon (upload)
- Métadonnées SEO
- Description et mots-clés

### Menus (`/admin/menus`)
- Créer/Éditer/Supprimer des éléments de menu
- Gérer l'ordre d'affichage
- Activer/Désactiver des liens
- Support des ancres (#about, #services, etc.)

### Pied de page (`/admin/footer-infos`)
- Ajouter plusieurs sections de contact
- Adresse, Email, Téléphone
- Gérer l'ordre d'affichage
- Activation/Désactivation

### Réseaux sociaux (`/admin/social-links`)
- Platforms: Twitter, Facebook, Instagram, LinkedIn, YouTube, GitHub, TikTok, WhatsApp
- URLs avec validation
- Icônes Bootstrap personnalisables
- Ouverture en nouvel onglet (target="_blank")

### Sliders (`/admin/sliders`)
- Upload d'images (Responsive)
- Titre et description
- Ordre d'affichage
- Max 3 sliders actifs affichés sur le frontend
- Activation/Désactivation

---

## 🚦 Données par défaut (seeding)

À la première exécution, les seeders créent:

✅ **Site Settings**
- Nom: "Fab-Technology"
- Email: "info@fab-technology.net"
- Phone: "+243847451389"

✅ **Menus** (6 items)
- Accueil, À Propos, Services, Galerie, Équipe, Contact

✅ **Footer Infos** (2 locations)
- Goma: +243847451389
- Lubumbashi: +243995502421

✅ **Social Links** (4 platforms)
- Twitter, Facebook, LinkedIn, Instagram
- URLs vierges (à remplir dans l'admin)

---

## 🔐 Sécurité

- ✅ Toutes les routes admin nécessitent une authentification (`auth:verified`)
- ✅ Protection CSRF sur les formulaires
- ✅ Validation des inputs (emails, URLs, types de fichiers)
- ✅ Suppression sécurisée des fichiers uploadés
- ✅ Contrôle des permissions par middleware

---

## 📱 Responsive Design

- ✅ Interface admin 100% Bootstrap 5
- ✅ Adaptation responsive (Mobile, Tablette, Desktop)
- ✅ Sidebar collapsible sur mobile
- ✅ Grilles adaptatives pour les sliders

---

## 🐛 Troubleshooting

### Les images ne s'affichent pas
```bash
# Vérifier le lien symbolique
php artisan storage:link
```

### Les migrations ne s'exécutent pas
```bash
# Vérifier les permissions en base de données
php artisan migration:refresh --seed
```

### Erreur "Class not found"
```bash
# Recharger l'autoloader
composer dump-autoload
```

### Admin routes retournent 404
```bash
# Vérifier que AUTH middleware est configuré
# Vérifier que la route est bien définie
php artisan route:list | grep admin
```

---

## 📊 Prochaines étapes recommandées

1. ✅ Tester l'accès à `/admin/settings`
2. ✅ Uploader un logo et favicon
3. ✅ Configurer les réseaux sociaux réels
4. ✅ Ajouter des sliders carousel
5. ✅ Vérifier le rendu frontend

---

## 📞 Support

Pour toute modification ou amélioration, consultez:
- Documentation Laravel: https://laravel.com
- Bootstrap 5: https://getbootstrap.com
- Bootstrap Icons: https://icons.getbootstrap.com

---

**Version:** 1.0  
**Date:** Avril 2026  
**Thème:** Bleu & Blanc  
**Statut:** ✅ Prêt pour production
