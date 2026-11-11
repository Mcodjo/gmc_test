# Guide de déploiement — ShopAfrica GMC Test

## Prérequis serveur

- PHP 8.2+ avec extensions : `mbstring`, `openssl`, `pdo`, `pdo_mysql`, `tokenizer`, `xml`, `ctype`, `fileinfo`, `bcmath`
- MySQL 8.0+ ou MariaDB 10.4+
- Apache 2.4+ avec `mod_rewrite`
- Composer 2.x
- Certificat SSL (Let's Encrypt recommandé)

---

## 1. Upload des fichiers

```bash
# Via FTP/SFTP ou Git
git clone https://github.com/votre-repo/gmc_test.git /home/votre-user/public_html/shopafrica
```

Ou uploadez le dossier complet via cPanel File Manager dans `public_html/shopafrica`.

**Important :** Le dossier `public/` de Laravel doit être le document root Apache.

---

## 2. Configuration du Virtual Host Apache (cPanel)

Dans cPanel > Domains > Create New Domain, pointez vers `/home/votre-user/public_html/shopafrica/public`.

Ou créez manuellement dans `/etc/apache2/sites-available/shopafrica.conf` :

```apache
<VirtualHost *:80>
    ServerName votre-domaine.com
    ServerAlias www.votre-domaine.com
    DocumentRoot /home/votre-user/public_html/shopafrica/public

    <Directory /home/votre-user/public_html/shopafrica/public>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/shopafrica-error.log
    CustomLog ${APACHE_LOG_DIR}/shopafrica-access.log combined

    # Redirect HTTP to HTTPS
    RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</VirtualHost>

<VirtualHost *:443>
    ServerName votre-domaine.com
    ServerAlias www.votre-domaine.com
    DocumentRoot /home/votre-user/public_html/shopafrica/public

    <Directory /home/votre-user/public_html/shopafrica/public>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    SSLEngine on
    SSLCertificateFile /etc/letsencrypt/live/votre-domaine.com/fullchain.pem
    SSLCertificateKeyFile /etc/letsencrypt/live/votre-domaine.com/privkey.pem

    ErrorLog ${APACHE_LOG_DIR}/shopafrica-ssl-error.log
    CustomLog ${APACHE_LOG_DIR}/shopafrica-ssl-access.log combined
</VirtualHost>
```

Le fichier `.htaccess` dans `public/` est déjà fourni par Laravel.

---

## 3. Configuration de la base de données MySQL

Dans cPanel > MySQL Databases :
1. Créer une base de données : `shopafrica`
2. Créer un utilisateur MySQL et lui accorder tous les privilèges sur `shopafrica`

---

## 4. Configuration du fichier .env

Copiez le fichier exemple et configurez :

```bash
cp .env.example .env
nano .env
```

Modifiez les valeurs suivantes :

```env
APP_NAME=ShopAfrica
APP_ENV=production
APP_KEY=    # Sera généré automatiquement
APP_DEBUG=false
APP_URL=https://votre-domaine.com
APP_LOCALE=fr

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shopafrica
DB_USERNAME=votre_user_mysql
DB_PASSWORD=votre_mot_de_passe

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

---

## 5. Installation des dépendances Composer

```bash
cd /home/votre-user/public_html/shopafrica
composer install --no-dev --optimize-autoloader
```

---

## 6. Commandes Artisan

Exécutez les commandes dans l'ordre suivant :

```bash
# Générer la clé d'application
php artisan key:generate

# Créer le lien symbolique storage
php artisan storage:link

# Exécuter les migrations
php artisan migrate --force

# Remplir la base de données avec les produits
php artisan db:seed --force

# Optimiser pour la production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 7. Permissions des fichiers

```bash
# Permissions correctes
chmod -R 755 /home/votre-user/public_html/shopafrica
chmod -R 775 /home/votre-user/public_html/shopafrica/storage
chmod -R 775 /home/votre-user/public_html/shopafrica/bootstrap/cache

# Propriétaire Apache (selon votre config)
chown -R www-data:www-data storage/ bootstrap/cache/
```

---

## 8. Installation du SSL Let's Encrypt

**Via cPanel AutoSSL :**
Dans cPanel > Security > SSL/TLS > AutoSSL, cliquez "Run AutoSSL" pour votre domaine.

**Via Certbot (si accès SSH root) :**
```bash
apt install certbot python3-certbot-apache
certbot --apache -d votre-domaine.com -d www.votre-domaine.com
```

Le certificat se renouvelle automatiquement tous les 90 jours.

---

## 9. Mise à jour du robots.txt

Après déploiement, mettez à jour `public/robots.txt` avec votre vrai domaine :

```
User-agent: *
Allow: /

User-agent: Googlebot
Allow: /

User-agent: Googlebot-Image
Allow: /

Sitemap: https://votre-domaine.com/sitemap.xml
```

---

## 10. Soumission dans Google Merchant Center

1. Vérifiez votre domaine dans **Google Search Console**
2. Dans **Google Merchant Center** :
   - Allez dans **Produits > Feeds**
   - Cliquez **Ajouter un feed principal**
   - Type : **Scheduled fetch**
   - URL du feed : `https://votre-domaine.com/feed.xml`
   - Fréquence : Quotidienne
3. Dans **Outils > Vérificateur d'URL**, testez vos pages produits pour valider le Schema.org

---

## 11. Checklist post-déploiement

- [ ] `https://votre-domaine.com` charge correctement
- [ ] `https://votre-domaine.com/feed.xml` retourne du XML valide
- [ ] `https://votre-domaine.com/sitemap.xml` retourne du XML valide
- [ ] `https://votre-domaine.com/robots.txt` pointe vers le sitemap
- [ ] Les 3 pages produits s'affichent avec leur JSON-LD Schema.org
- [ ] Le panier fonctionne (ajouter/supprimer un article)
- [ ] Le formulaire checkout s'affiche
- [ ] Toutes les pages légales sont accessibles depuis le footer
- [ ] Google Rich Results Test valide les pages produits
- [ ] Le SSL est actif (cadenas HTTPS dans le navigateur)

---

## URLs importantes après déploiement

| URL | Description |
|-----|-------------|
| `https://votre-domaine.com/` | Page d'accueil |
| `https://votre-domaine.com/feed.xml` | Feed Google Shopping |
| `https://votre-domaine.com/sitemap.xml` | Sitemap XML |
| `https://votre-domaine.com/robots.txt` | Robots.txt |
| `https://votre-domaine.com/produit/timepro-x1-montre-connectee` | Produit 1 (avec GTIN) |
| `https://votre-domaine.com/produit/carrymax-pro-sac-a-dos` | Produit 2 (sans GTIN — warning GMC) |
| `https://votre-domaine.com/produit/guide-dev-backend-ebook` | Produit 3 (numérique) |
