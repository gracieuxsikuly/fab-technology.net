# 🎨 FAB-TECHNOLOGY - Modernisation & Dynamisation

> Système de gestion de contenu entièrement dynamique pour le site vitrine FAB-TECHNOLOGY

![Status](https://img.shields.io/badge/status-ready--for--production-green)
![Version](https://img.shields.io/badge/version-1.0-blue)
![Laravel](https://img.shields.io/badge/laravel-11+-red)
![Bootstrap](https://img.shields.io/badge/bootstrap-5.3-blueviolet)

---

## 🚀 À propos

Cette modernisation transforme le site FAB-TECHNOLOGY d'une architecture statique à une **plateforme administrable complète** avec:

- ✅ Design moderne **Bleu & Blanc** (remplace Vert)
- ✅ Contenu **100% dynamique** (Base de données)
- ✅ Panneau d'**administration intuitif**
- ✅ **CRUD complet** (Create, Read, Update, Delete)
- ✅ **Upload d'images sécurisé** (Logo, Favicon, Sliders)
- ✅ Gestion des **menus, footer, réseaux sociaux**
- ✅ **Carousel Hero dynamique** (max 3 images)
- ✅ **Responsive design** (Mobile, Tablette, Desktop)

---

## 📋 Contenu livré

### 🗄️ Base de données (5 tables)
| Table | Rôle |
|-------|------|
| `site_settings` | Infos globales du site (logo, email, phone, SEO) |
| `menus` | Navigation dynamique (ordre, activation/désactivation) |
| `footer_infos` | Infos du pied de page (adresses, contacts) |
| `social_links` | Réseaux sociaux (Twitter, FB, LinkedIn, etc.) |
| `sliders` | Carousel Hero (images, max 3 affichées) |

### 🎯 Modèles Laravel (5 Models)
```
SiteSetting   → Singleton (1 seul enregistrement)
Menu          → Gestion menus de navigation
FooterInfo    → Infos pied de page
SocialLink    → Réseaux sociaux
Slider        → Images carrousel
```

### 🎮 Contrôleurs (6 Controllers)
```
HomeController             → Affichage frontend dynamique
SiteSettingController     → Paramètres du site
MenuController            → CRUD menus complète
FooterInfoController      → CRUD pied de page
SocialLinkController      → CRUD réseaux sociaux
SliderController          → CRUD + upload images
```

### 👁️ Vues (20+ templates)
- **Frontend**: Menu dynamique, Footer dynamique, Hero Sliders
- **Admin**: Layout Bootstrap + CRUD views (index, create, edit)
- **Layout**: Layout principal avec sidebar navigation

### 🔒 Routes sécurisées
```
/                          → Homepage (data dynamiques)
/langue/{lang}            → Changement de langue
/admin/*                  → Admin panel (auth:verified)
```

---

## ⚡ Installation rapide

### 1️⃣ Exécuter le script (Windows)
```bash
cd d:\LARAVEL\fab-technology.net
install.bat
```

### 2️⃣ Exécuter le script (Linux/Mac)
```bash
bash install.sh
```

### 3️⃣ Ou manuellement
```bash
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan cache:clear
```

### 4️⃣ Vérifier l'installation
```bash
# Accéder à l'admin
http://localhost/admin/settings

# Vérifier les données chargées
php artisan tinker
>>> Menu::count()       # Doit retourner 6
>>> SocialLink::count() # Doit retourner 4
exit
```

---

## 🎨 Design

### Palette de couleurs

| Élément | Couleur ancienne | Couleur nouvelle | Code |
|---------|------------------|------------------|------|
| Accent principal | Vert | Bleu | #1976d2 |
| Accent foncé | - | Bleu foncé | #0d47a1 |
| Accent clair | - | Bleu ciel | #42a5f5 |
| Titres | Noir | Bleu foncé | #0d47a1 |
| Texte | Gris moyen | Gris clair | #555555 |

### Composants redesignés
- 🎨 **Boutons** → Bleus au lieu de verts
- 🎨 **Navbar** → Logo bleu, liens bleus en hover
- 🎨 **Cards** → Fond gris clair, accents bleus
- 🎨 **Footer** → Texte blanc sur fond sombre, liens bleus

---

## 📁 Structure du projet

```
fab-technology.net/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php              ← Frontend
│   │   ├── SiteSettingController.php      ← Admin
│   │   ├── MenuController.php             ← Admin
│   │   ├── FooterInfoController.php       ← Admin
│   │   ├── SocialLinkController.php       ← Admin
│   │   └── SliderController.php           ← Admin
│   └── Models/
│       ├── SiteSetting.php
│       ├── Menu.php
│       ├── FooterInfo.php
│       ├── SocialLink.php
│       └── Slider.php
│
├── database/
│   ├── migrations/
│   │   ├── 2025_04_16_000001_create_site_settings_table.php
│   │   ├── 2025_04_16_000002_create_menus_table.php
│   │   ├── 2025_04_16_000003_create_footer_infos_table.php
│   │   ├── 2025_04_16_000004_create_social_links_table.php
│   │   └── 2025_04_16_000005_create_sliders_table.php
│   └── seeders/
│       ├── SiteSettingSeeder.php
│       ├── MenuSeeder.php
│       ├── FooterInfoSeeder.php
│       ├── SocialLinkSeeder.php
│       └── DatabaseSeeder.php
│
├── resources/views/
│   ├── layouts/app.blade.php                   ← Layout admin
│   ├── welcome.blade.php                       ← Homepage (modifié)
│   ├── partials/
│   │   ├── menu.blade.php         ← Navigation dynamique
│   │   └── footer.blade.php       ← Footer dynamique
│   └── backend/
│       ├── settings/edit.blade.php
│       ├── menus/
│       ├── footer-infos/
│       ├── social-links/
│       └── sliders/
│
├── routes/web.php                             ← Routes (modifiées)
├── public/assets/css/main.css                 ← Couleurs (modifiées: vert → bleu)
│
├── install.bat                                ← Script Windows
├── install.sh                                 ← Script Linux/Mac
│
├── QUICK_START.md                             ← Démarrage rapide ⭐
├── INTEGRATION_GUIDE.md                       ← Guide complet
├── ARCHITECTURE.md                            ← Flux de données
├── VERIFICATION_CHECKLIST.md                  ← Checklist de test
└── README.md                                  ← Ce fichier
```

---

## 🎯 Cas d'usage

### 📝 Gestion des paramètres du site
```
Admin → /admin/settings
├── Upload logo
├── Upload favicon
├── Modifier email/phone
├── Ajouter SEO description/keywords
└── Valider
```

### 📌 Gestion des menus
```
Admin → /admin/menus
├── Créer/Éditer/Supprimer items
├── Gérer l'ordre d'affichage
├── Activer/Désactiver liens
└── Valider
```

### 🖼️ Gestion du carrousel Hero
```
Admin → /admin/sliders
├── Upload images (max 3 affichées)
├── Ajouter titre et description
├── Gérer l'ordre d'affichage
├── Activer/Désactiver sliders
└── Valider
```

### 🔗 Gestion des réseaux sociaux
```
Admin → /admin/social-links
├── Ajouter plateformes (Twitter, FB, LinkedIn, etc.)
├── Remplir URLs réelles
├── Personnaliser icônes Bootstrap
├── Gérer l'ordre d'affichage
└── Valider
```

### 📍 Gestion du pied de page
```
Admin → /admin/footer-infos
├── Ajouter adresses
├── Ajouter emails/téléphones
├── Gérer l'ordre d'affichage
└── Valider
```

---

## 🔐 Sécurité

✅ **Routes admin protégées** par `auth:verified`  
✅ **CSRF tokens** sur tous les formulaires  
✅ **Validation côté serveur** (emails, URLs, types de fichiers)  
✅ **Upload sécurisé** avec whitelist MIME types  
✅ **Suppression automatique des fichiers** lors de la suppression de l'enregistrement  
✅ **Permission middleware** pour certaines routes  

---

## 📚 Documentation

| Document | Contenu |
|----------|---------|
| **QUICK_START.md** | 🟢 Démarrage rapide (lire en premier) |
| **INTEGRATION_GUIDE.md** | 📋 Guide d'installation complet |
| **ARCHITECTURE.md** | 🏗️ Flux de données & architecture |
| **VERIFICATION_CHECKLIST.md** | ✅ Checklist de test exhaustive |

---

## 🧪 Tests

### Exécuter la checklist
1. Ouvrir `VERIFICATION_CHECKLIST.md`
2. Cocher les éléments testés
3. Documenter les issues trouvées

### Tests manuels
```bash
# Accéder à l'admin
http://localhost/admin/settings

# Tester les CRUD
http://localhost/admin/menus
http://localhost/admin/sliders
http://localhost/admin/social-links
http://localhost/admin/footer-infos

# Vérifier le frontend
http://localhost/
```

---

## 🐛 Troubleshooting

### Erreur: "Class not found"
```bash
composer dump-autoload
```

### Erreur: "Table not found"
```bash
php artisan migrate:fresh --seed
```

### Images ne s'affichent pas
```bash
php artisan storage:link
```

### Routes 404
```bash
php artisan route:clear
php artisan cache:clear
```

### Perms de fichier
```bash
chmod -R 755 storage bootstrap/cache
```

---

## 📊 Données par défaut

À la première exécution des seeders:

✅ **1 Site Setting**
- Nom: "Fab-Technology"
- Email: "info@fab-technology.net"
- Phone: "+243847451389"

✅ **6 Menus**
- Accueil, À Propos, Services, Galerie, Équipe, Contact

✅ **2 Footer Infos**
- Goma: +243847451389 | Lubumbashi: +243995502421

✅ **4 Social Links**
- Twitter, Facebook, LinkedIn, Instagram (URLs à remplir)

✅ **0 Sliders**
- Aucun par défaut (à créer dans l'admin)

---

## 🛠️ Stack technique

| Composant | Version | Rôle |
|-----------|---------|------|
| **Laravel** | 11+ | Framework MVC |
| **PHP** | 8.2+ | Langage serveur |
| **MySQL/PostgreSQL** | Latest | Base de données |
| **Bootstrap** | 5.3 | Framework CSS |
| **Blade** | Latest | Moteur templates |
| **Eloquent ORM** | Latest | ORM Laravel |

---

## 📈 Prochaines améliorations

- [ ] Cache du contenu côté frontend
- [ ] Page content management système (CMS pages)
- [ ] Blog avec catégories/tags
- [ ] Email newsletter
- [ ] Analytics dashboard
- [ ] API REST pour mobile app
- [ ] Webhooks pour intégrations externes
- [ ] Multi-language support (i18n amélioré)

---

## 📞 Support

Pour toute question ou problème:

1. **Consulter la documentation**
   - QUICK_START.md
   - INTEGRATION_GUIDE.md
   - ARCHITECTURE.md

2. **Tester avec la checklist**
   - VERIFICATION_CHECKLIST.md

3. **Code commenté**
   - Chaque fichier est bien documenté

---

## 📄 License

Propriété de FAB-TECHNOLOGY  
Usage: Internal use only

---

## 👤 Informations

**Version**: 1.0  
**Date**: Avril 2026  
**Status**: ✅ Production Ready  
**Créé par**: Premium Coding Assistant  

---

## 📝 Notes

- ✅ Aucune dépendance FilamentPHP
- ✅ Architecture Laravel pure & clean
- ✅ Responsive design appliqué
- ✅ Sécurité fortifiée
- ✅ Prêt pour production immédiate

---

<div align="center">

### 🎉 Prêt à lancer!

**[Guide rapide](QUICK_START.md)** • **[Installation](INTEGRATION_GUIDE.md)** • **[Tests](VERIFICATION_CHECKLIST.md)**

</div>
