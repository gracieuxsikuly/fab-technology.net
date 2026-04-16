# 🔍 Checklist de Vérification - CRUD Utilisateurs & Logo

## ✅ Checklist Système

- [x] Symlink storage créé et fonctionnel
- [x] UserController créé avec tous les métodes
- [x] Routes users ajoutées dans web.php
- [x] Vues users créées (index, create, edit, profile)
- [x] Navigation mise à jour (sidebar et navbar)
- [x] SiteSettingController corrigé pour les chemins de fichiers
- [x] Cache des routes/config/app vidé

## 🧪 Tests à Effectuer

### Test 1: Routes des Utilisateurs
```bash
# Vérifier que les routes existent
php artisan route:list | Select-String "admin.users"

# Vous devez voir:
# - admin.users.index
# - admin.users.create
# - admin.users.store
# - admin.users.edit
# - admin.users.update
# - admin.users.show
# - admin.users.destroy
# - admin.users.profile
# - admin.users.updateProfile
```

### Test 2: Navigation Web
1. Accédez à: `http://localhost/admin/users`
   - Les utilisateurs doivent être listés dans un tableau
   - Il doit y avoir un bouton "Ajouter un utilisateur"

2. Cliquez "Ajouter un utilisateur"
   - Vous êtes redirigé vers `/admin/users/create`
   - Le formulaire affiche: Nom, Email, Mot de passe

3. Remplissez et créez un utilisateur
   - Message de succès "Utilisateur créé avec succès."
   - Le nouvel utilisateur apparaît dans la liste

4. Cliquez le bouton pencil pour éditer
   - Vous êtes redirigé vers `/admin/users/{id}/edit`
   - Les données actuelles sont pré-remplies

5. Modifiez et sauvegardez
   - Message de succès "Utilisateur mis à jour avec succès."

6. Essayez de supprimer un utilisateur (pas vous-même!)
   - Cliquez le bouton trash
   - Confirmez dans l'alert
   - L'utilisateur disparaît

7. Accédez à votre profil
   - Cliquez "Mon Profil" dans le sidebar
   - Ou depuis le dropdown de la navbar
   - Vous voyez vos informations

### Test 3: Logo Upload & Affichage
1. Accédez à: `http://localhost/admin/settings`
   - Vous devez voir un formulaire avec:
     - Logo actuel (ou "Aucun logo défini")
     - Champ pour remplacer le logo
     - Favicon actuel (ou "Aucun favicon défini")
     - Champ pour remplacer le favicon

2. Téléchargez une image comme logo
   - Format accepté: JPEG, PNG, GIF
   - Taille max: 2 MB
   - Cliquez "Mettre à jour"

3. Vérifiez que le logo s'affiche maintenant:
   - Dans la section "Logo actuel" de `/admin/settings`
   - Dans la navbar administrative (haut gauche)
   - Dans le sidebar (sous le titre)

### Test 4: Stockage des Fichiers
```bash
# Vérifier que le dossier storage existe
Test-Path "D:\LARAVEL\fab-technology.net\storage\app\public\logos" -PathType Container

# Vérifier que le symlink existe et fonctionne
Test-Path "D:\LARAVEL\fab-technology.net\public\storage" -PathType Container

# Lister les fichiers uploadés
Get-ChildItem "D:\LARAVEL\fab-technology.net\storage\app\public\logos"
```

### Test 5: Base de Données
```bash
# Se connecter à tinker
php artisan tinker

# Vérifier les données
User::all() # Doit montrer au moins 1 utilisateur (vous-même)
SiteSetting::getSetting() # Doit montrer le site avec logo

# Quitter tinker
exit
```

## 🔐 Tests de Sécurité

### Test 1: Authentification
1. Essayez d'accéder à `/admin/users` sans être connecté
   - Vous devez être redirigé vers la page de login

2. Connectez-vous
   - Vous pouvez maintenant accéder à `/admin/users`

### Test 2: Validation des Données
1. Essayez de créer un utilisateur sans email
   - Vous devez voir l'erreur de validation

2. Essayez de créer deux utilisateurs avec le même email
   - Le deuxième devrait échouer avec erreur "Email unique"

3. Essayez un mot de passe inférieur à 8 caractères
   - Vous devez voir l'erreur de validation

### Test 3: Protection de Compte
1. Depuis la page `/admin/users`
2. Essayez de supprimer votre propre utilisateur
   - Le bouton trash ne devrait pas apparaître pour votre compte
   - Ou vous devez voir le message: "Vous ne pouvez pas supprimer votre propre compte"

## 📋 Résultats Attendus

### Affichage du Logo
- ✅ Logo stocké dans: `storage/app/public/logos/filename.ext`
- ✅ URL accessible via: `http://localhost/storage/logos/filename.ext`
- ✅ Affichage via asset(): `{{ asset('storage/logos/filename.ext') }}`
- ✅ Logo visible dans:
  - Navbar administrative (petit logo clickable haut gauche)
  - Sidebar (grand logo à gauche)
  - Page des paramètres

### Gestion des Utilisateurs
- ✅ Liste complète avec pagination
- ✅ Création: Validation email unique + mot de passe
- ✅ Édition: Modification nom/email/password
- ✅ Suppression: Protection compte connecté
- ✅ Profil: Accès et modification infos personnelles

## ⚠️ Problèmes Possibles & Solutions

### Problème: Logo ne s'affiche pas
**Solutions:**
1. Vérifier le symlink: `public/storage` doit exister
2. Vérifier le chemin en BD: doit commencer par `storage/`
3. Vider le cache: `php artisan cache:clear`
4. Vérifier les permissions: `IUSR` et `IIS_IUSRS` doivent pouvoir lire storage

### Problème: Routes utilisateurs ne fonctionnent pas
**Solutions:**
1. Vérifier l'import du contrôleur dans `web.php`
2. Vider le cache routes: `php artisan route:clear`
3. Vérifier les noms de routes: `php artisan route:list`
4. Vérifier que les vues existent dans le bon dossier

### Problème: Erreur 500 sur création d'utilisateur
**Solutions:**
1. Vérifier les logs: `storage/logs/laravel.log`
2. S'assurer que la table users existe
3. Vérifier que HashMake() fonctionne
4. Vérifier les validations du formulaire

### Problème: Pas de pagination sur la liste des utilisateurs
**Solutions:**
1. Vérifier que le contrôleur utilise `User::paginate(10)`
2. Vérifier que la vue contient `{{ $users->links() }}`
3. Vérifier la configuration pagination dans `config/pagination.php`

## 📝 Commandes Utiles

```bash
# Vider tous les caches
php artisan cache:clear && php artisan config:clear && php artisan route:clear

# Lister les routes
php artisan route:list | Select-String "admin"

# Accéder à la BD directement
php artisan tinker

# Voir les erreurs
tail -f storage/logs/laravel.log

# Créer le symlink
php artisan storage:link
```

## 📲 URLs Clés

| Page | URL |
|------|-----|
| Liste utilisateurs | `/admin/users` |
| Créer utilisateur | `/admin/users/create` |
| Éditer utilisateur | `/admin/users/{id}/edit` |
| Mon Profil | `/admin/profile` |
| Paramètres du site | `/admin/settings` |
| Accueil site | `/` |

## 🎉 Après Vérification

Una fois que tous les tests passent:
1. ✅ Le CRUD utilisateurs est fonctionnel
2. ✅ Le logo s'affiche correctement partout
3. ✅ Les permissions et sécurité sont activées
4. ✅ La navigation est complète
5. ✅ Les fichiers sont correctement stockés

Vous pouvez maintenant utiliser le système en production!

---

**Questions?** Consultez le fichier `USERS_CRUD_DOCUMENTATION.md` pour plus de détails.
