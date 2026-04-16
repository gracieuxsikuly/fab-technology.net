# 📋 Documentation - CRUD Utilisateurs et fixes du Logo

## 📌 Modifications Apportées

### 1. **Système de Gestion des Utilisateurs (CRUD)**

#### Contrôleur Créé: `UserController`
- `index()` - Liste tous les utilisateurs avec pagination (10 par page)
- `create()` - Affiche le formulaire de création
- `store()` - Sauvegarde un nouvel utilisateur
- `edit()` - Affiche le formulaire d'édition
- `update()` - Met à jour un utilisateur existant
- `destroy()` - Supprime un utilisateur (protection: impossible de supprimer son propre compte)
- `profile()` - Affiche le profil de l'utilisateur connecté
- `updateProfile()` - Met à jour le profil de l'utilisateur connecté

#### Vues Créées: `resources/views/backend/users/`
- `index.blade.php` - TableauHTML avec liste des utilisateurs
  - Affiche: ID, Nom, Email, Statut de vérification, Date d'inscription
  - Actions: Éditer, Supprimer
  - Pagination: 10 utilisateurs par page
  
- `create.blade.php` - Formulaire de création d'utilisateur
  - Champs: Nom complet, Email, Mot de passe, Confirmer mot de passe
  - Validation: Email unique, Mot de passe min 8 caractères avec confirmation
  - Utilisateur créé est automatiquement marqué comme "Vérifié"
  
- `edit.blade.php` - Formulaire d'édition d'utilisateur
  - Permet de changer nom et email
  - Changement optionnel du mot de passe
  - Affiche la date d'inscription
  - Protections: Email unique, Différent du modèle create
  
- `profile.blade.php` - Profil de l'utilisateur connecté
  - Affichage des informations personnelles
  - Formulaire pour modifier le nom et email
  - Lien vers le changement de mot de passe

#### Routes Ajoutées (dans `routes/web.php`)
```php
// Routes CRUD complètes pour les utilisateurs
Route::resource('admin/users', UserController::class);

// Routes additionnelles pour le profil
Route::put('admin/profile/update', [UserController::class, 'updateProfile'])->name('admin.users.updateProfile');
Route::get('admin/profile', [UserController::class, 'profile'])->name('admin.users.profile');
```

**URIs Disponibles:**
- `GET /admin/users` - Liste des utilisateurs
- `GET /admin/users/create` - Formulaire de création
- `POST /admin/users` - Créer un utilisateur
- `GET /admin/users/{user}/edit` - Formulaire d'édition
- `PUT /admin/users/{user}` - Mettre à jour un utilisateur
- `DELETE /admin/users/{user}` - Supprimer un utilisateur
- `GET /admin/profile` - Mon profil
- `PUT /admin/profile/update` - Mettre à jour mon profil

#### Navigation Mise à Jour
- **Sidebar**: Nouveau lien "👥 Utilisateurs" pointant vers `/admin/users`
- **Sidebar**: Nouveau lien "👤 Mon Profil" pointant vers `/admin/profile`
- **Navbar Dropdown**: Le lien "Profil" pointe maintenant vers `/admin/profile`

---

### 2. **Corrections du Problème d'Affichage du Logo**

#### ✅ Symlink Storage Créé
```bash
php artisan storage:link
# Résultat: [D:\LARAVEL\fab-technology.net\public\storage] 
#           → [D:\LARAVEL\fab-technology.net\storage\app/public]
```

Cela permet d'accéder aux fichiers stockés à travers le web en utilisant l'URL `/storage/...`

#### ✅ Chemins d'Upload Corrigés
**Dans `SiteSettingController`:**
- Logo: Stocké dans `storage/app/public/logos/`
- Favicon: Stocké dans `storage/app/public/favicon/`

Les chemins sont sauvegardés comme: `storage/logos/filename.png`

#### ✅ Utilisation de `asset()` Partout
Toutes les vues utilisant des images de storage utilisent le helper `asset()`:

```blade
{{-- Logo dans les paramètres --}}
<img src="{{ asset($setting->logo) }}" alt="Logo">

{{-- Logo dans la navbar admin --}}
<img src="{{ asset($siteSetting->logo) }}" alt="{{ $siteSetting->site_name }}">

{{-- Logo dans le sidebar admin --}}
<img src="{{ asset($siteSetting->logo) }}" alt="{{ $siteSetting->site_name }}" class="sidebar-header-logo">
```

#### ✅ Gestion Améliorée de la Suppression de Fichiers
```php
// Ancien code (incorrect):
if (file_exists(public_path($setting->logo))) {
    unlink(public_path($setting->logo));
}

// Nouveau code (correct):
if ($setting->logo) {
    $oldPath = str_replace('storage/', 'storage/app/public/', $setting->logo);
    if (file_exists(base_path($oldPath))) {
        unlink(base_path($oldPath));
    }
}
```

---

## 🚀 Comment ça Marche Maintenant

### Upload de Logo (avec affichage correct)
1. Accédez à `/admin/settings`
2. Uploadez une image (format: JPEG, PNG, GIF - Max 2MB)
3. L'image est sauvegardée dans `storage/app/public/logos/`
4. Le chemin `storage/logos/filename.png` est stocké en BD
5. Avec le symlink, le fichier est accessible via `/storage/logos/filename.png`
6. Avec `asset()`, l'URL complète est générée automatiquement
7. ✅ Le logo s'affiche dans:
   - La barre de paramètres
   - La navbar de l'admin
   - Le sidebar de l'admin

### Créer un Utilisateur
1. Allez à `/admin/users`
2. Cliquez "Ajouter un utilisateur"
3. Remplissez le formulaire (Nom, Email, Mot de passe)
4. Cliquez "Créer l'utilisateur"
5. L'utilisateur apparaît dans la liste avec le statut "Vérifié"

### Éditer un Utilisateur
1. Dans la liste `/admin/users`
2. Cliquez le bouton pencil pour éditer
3. Modifiez les données souhaitées
4. Le mot de passe est optionnel (laissez vide pour ne pas changer)
5. Cliquez "Mettre à jour"

### Supprimer un Utilisateur
1. Dans la liste `/admin/users`
2. Cliquez le bouton trash 🗑️
3. Confirmez la suppression
4. ⚠️ Vous ne pouvez pas supprimer votre propre compte

### Mon Profil
1. Cliquez sur **"Mon Profil"** dans le sidebar
2. Ou depuis la navbar: dropdown utilisateur → "Mon Profil"
3. Modifiez votre nom et email
4. Pour changer le mot de passe: cliquez le bouton "Changer le mot de passe"

---

## 📊 Structure des Données

### Table `users` (existante, modifiée)
```sql
- id (PK)
- name (string, 255)
- email (string, 255, unique)
- password (string, hashed)
- email_verified_at (timestamp, nullable)
- remember_token (string, nullable)
- created_at (timestamp)
- updated_at (timestamp)
```

### Stockage des Fichiers
```
public/
├── storage/              [SYMLINK vers storage/app/public]
│   ├── logos/            [Images de logo du site]
│   │   ├── fab-logo.png
│   │   └── ...
│   └── favicon/          [Favicons du site]
│       ├── fab-favicon.ico
│       └── ...
```

---

## 🔒 Sécurité

### Authentification
- Toutes les routes `/admin/**` sont protégées par le middleware `auth` et `verified`
- Seuls les utilisateurs authentifiés et vérifiés peuvent accéder

### Validation
- **Email**: Unique, format email valide
- **Mot de passe**: Minimum 8 caractères, confirmation requise
- **Fichiers**: Image seulement (JPEG, PNG, GIF), Max 2MB pour logo, 1MB pour favicon

### Protection de Compte
- Impossible de supprimer son propre compte
- Possible de modifier son profil et mot de passe

---

## ✅ Vérification

### Pour tester l'affichage du logo:
1. Accédez à `/admin/settings`
2. Uploadez une image
3. Le logo doit apparaître dans:
   - La page des paramètres
   - La navbar administrative
   - Le sidebar administratif

### Pour tester le CRUD utilisateurs:
1. Liste: `/admin/users`
2. Créer: `/admin/users/create`
3. Éditer: `/admin/users/{id}/edit`
4. Supprimer: Button dans la liste
5. Profil: `/admin/profile`

---

## 🎨 Interface

### Couleurs
- Primaire: Bleu `#1976d2`
- Secondary: Blanc
- Danger: Rouge (suppression)
- Success: Vert (validation)

### Components Bootstrap
- Tables avec hover effect
- Forms avec validation visuelle
- Badges pour les statuts
- Pagination pour les listes
- Modals de confirmation

---

## 📚 Fichiers Modifiés/Créés

### Créés:
- `app/Http/Controllers/UserController.php`
- `resources/views/backend/users/index.blade.php`
- `resources/views/backend/users/create.blade.php`
- `resources/views/backend/users/edit.blade.php`
- `resources/views/backend/users/profile.blade.php`

### Modifiés:
- `routes/web.php` - Ajout import UserController et routes
- `resources/views/layouts/app.blade.php` - Ajout liens utilisateurs et profil
- `app/Http/Controllers/SiteSettingController.php` - Correction chemins fichiers

### Système:
- Symlink créé: `public/storage` → `storage/app/public`

---

## 🚨 Troubleshooting

### Le logo ne s'affiche pas?
1. Vérifiez que le symlink existe: `public/storage` doit être un lien vers `storage/app/public`
2. Vérifiez les permissions des dossiers
3. Vérifiez que le chemin en BD commence par `storage/`
4. Videz les caches: `php artisan cache:clear`

### Les routes ne fonctionnent pas?
1. Vérifiez que `UserController` est importé dans `web.php`
2. Videz le cache des routes: `php artisan route:clear`
3. Vérifiez les noms des routes avec: `php artisan route:list`

### Les vues ne s'affichent pas?
1. Vérifiez que les fichiers `.blade.php` existent
2. Vérifiez le chemin des vues dans le retour du contrôleur
3. Vérifiez les noms des routes utilisées dans les liens

---

Vous êtes maintenant prêt à gérer les utilisateurs et le branding du site! 🎉
