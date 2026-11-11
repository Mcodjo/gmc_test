# Checklist Google Merchant Center — ShopAfrica GMC Test

**Projet :** Boutique e-commerce de test pour validation Google Merchant Center (GMC)  
**Date :** Novembre 2024  
**URL du feed :** `https://votre-domaine.com/feed.xml`

---

## Points couverts et conformes GMC

### Infrastructure technique
- [x] **HTTPS obligatoire** — Le site doit être déployé avec un certificat SSL valide (Let's Encrypt ou commercial). La variable `APP_URL` dans `.env` doit être `https://...`
- [x] **Robots.txt** — Accessible à `/robots.txt` : autorise Googlebot et Googlebot-Image sur tout le site, contient le lien vers le sitemap
- [x] **Sitemap XML** — Accessible à `/sitemap.xml` : liste toutes les URLs (pages statiques, catégories, produits) avec `lastmod` et `changefreq`
- [x] **Feed XML Google Shopping** — Accessible à `/feed.xml` au format RSS 2.0 avec namespace `xmlns:g="http://base.google.com/ns/1.0"`
- [x] **Content-Type application/xml** — Le feed est servi avec le bon Content-Type

### Produits — Données obligatoires
- [x] **g:id** — Identifiant unique par produit (clé primaire DB)
- [x] **g:title** — Titre descriptif (≤ 150 caractères)
- [x] **g:description** — Description complète (≤ 5000 caractères)
- [x] **g:link** — URL canonique de la page produit en HTTPS
- [x] **g:image_link** — Image principale (URL absolue, format JPEG/PNG, min 100x100 px recommandé 800x800)
- [x] **g:price** — Prix avec devise (format : `49900 XOF`)
- [x] **g:availability** — Disponibilité (`in_stock` / `out_of_stock` / `preorder`)
- [x] **g:condition** — État du produit (`new`)
- [x] **g:brand** — Marque du produit renseignée pour tous les produits
- [x] **g:google_product_category** — ID numérique de la taxonomie Google (ex: 543676 pour montres connectées)
- [x] **g:identifier_exists** — `yes` ou `no` selon présence d'identifiant standard

### Produits — Données recommandées
- [x] **g:additional_image_link** — Image secondaire pour tous les produits
- [x] **g:product_type** — Catégorie personnalisée (chemin de navigation)
- [x] **g:shipping** — Bloc livraison avec pays, service et prix pour produits physiques
- [x] **g:gtin** — GTIN-13 renseigné pour le produit TimePro X1 (montre connectée)
- [x] **g:mpn** — MPN renseigné pour CarryMax Pro et Guide Dev Backend

### Pages légales (exigées par GMC)
- [x] **Politique de confidentialité** — `/politique-de-confidentialite`
- [x] **Conditions générales de vente** — `/conditions-generales-de-vente`
- [x] **Politique de retour** — `/politique-de-retour` : délai 30 jours, procédure, remboursement
- [x] **Page Livraison** — `/livraison` : zones, délais, frais
- [x] **Contact** — `/contact` : formulaire, email visible, téléphone visible
- [x] **À propos** — `/a-propos` : description boutique, pays d'activité, contact

### Accessibilité des pages
- [x] Toutes les pages légales sont accessibles depuis le footer
- [x] **Aucune popup bloquante** au chargement (pas de cookie wall, age gate, etc.)
- [x] Email de contact visible : `contact@shopafrica.ci`
- [x] Numéro de téléphone visible : `+225 07 00 00 00 00`

### Pages produit
- [x] **Prix affiché TTC** avec mention "TTC" sur chaque page produit
- [x] **Disponibilité affichée** (En stock / Rupture)
- [x] **Bouton "Ajouter au panier"** fonctionnel
- [x] **Images produit** affichées (principale + secondaire)
- [x] **Titre, description longue** sur chaque page produit
- [x] **Marque et état** ("Neuf") affichés

### Schema.org / JSON-LD
- [x] **Balise JSON-LD Product** sur chaque page produit
- [x] **name** — Titre du produit
- [x] **image** — URL(s) de l'image
- [x] **description** — Description du produit
- [x] **brand** — Marque (`@type: Brand`)
- [x] **gtin13** — Pour TimePro X1
- [x] **mpn** — Pour CarryMax Pro et Guide Dev Backend
- [x] **offers.url** — URL canonique
- [x] **offers.priceCurrency** — Devise (XOF)
- [x] **offers.price** — Prix numérique
- [x] **offers.availability** — `https://schema.org/InStock`
- [x] **offers.itemCondition** — `https://schema.org/NewCondition`

### SEO
- [x] **Meta title unique** sur chaque page
- [x] **Meta description unique** sur chaque page
- [x] **Balise canonical** sur chaque page
- [x] **Open Graph tags** sur les pages produit
- [x] **Sitemap soumis** via `/sitemap.xml`

### Panier & Checkout
- [x] Panier fonctionnel (session Laravel)
- [x] Ajout et suppression d'articles
- [x] Page checkout avec formulaire complet (nom, adresse, email, téléphone)
- [x] Logos de paiement visibles (Visa, Mastercard, Orange Money, MTN MoMo)

---

## Ecarts intentionnels pour tester le diagnostic GMC

### Produit 2 : CarryMax Pro (Sac à dos)
| Champ | Valeur | Raison de l'écart |
|-------|--------|-------------------|
| `g:gtin` | *(absent)* | Le sac à dos est un produit sans code-barres standard (fabricant propre) |
| `g:identifier_exists` | `no` | Indique explicitement l'absence d'identifiant GTIN |
| `g:mpn` | `CMP-30L-BLK-2024` | Référence fabricant fournie en remplacement du GTIN |

**Avertissement attendu dans GMC :** `Identifiant de produit manquant [identifier_exists]`  
-> GMC affichera un avertissement non bloquant. Les produits sans GTIN avec `identifier_exists=no` peuvent quand meme apparaitre dans Shopping, mais avec une visibilité réduite.

**Comment corriger :** Ajouter un GTIN-13 valide ou obtenir un EAN auprès d'un organisme GS1.

---

### Produit 3 : Guide du Dev Backend (E-Book numérique)
| Champ | Valeur | Raison de l'écart |
|-------|--------|-------------------|
| `g:shipping` | *(absent)* | Produit numérique : aucune livraison physique |
| `is_digital` | `true` | Marqué comme produit digital dans la base de données |

**Comportement attendu dans GMC :** GMC peut demander des informations de livraison meme pour les produits numériques selon les paramètres du compte marchand.  

**Solution recommandée pour produits numériques :**
```xml
<g:shipping>
    <g:country>CI</g:country>
    <g:service>Telechargement numerique</g:service>
    <g:price>0 XOF</g:price>
</g:shipping>
```

---

## Points a verifier lors de la soumission GMC

1. **Vérification du domaine** — Revendiquer le domaine dans Google Search Console avant de soumettre le feed
2. **URL du feed** — Soumettre `https://votre-domaine.com/feed.xml` dans GMC > Produits > Feeds
3. **Vérificateur d'URL GMC** — Tester chaque URL produit avec l'outil de vérification GMC
4. **Rich Results Test** — Tester sur `https://search.google.com/test/rich-results`
5. **Diagnostic du feed** — Dans GMC > Produits > Diagnostics, vérifier les erreurs et avertissements
6. **Politique de retour** — Configurer la politique de retour dans GMC > Paramètres

---

## Commandes de validation technique

```bash
# Verifier le feed XML
curl -s https://votre-domaine.com/feed.xml | xmllint --noout - 2>&1

# Verifier le robots.txt
curl -s https://votre-domaine.com/robots.txt

# Verifier le sitemap
curl -s https://votre-domaine.com/sitemap.xml | xmllint --noout - 2>&1

# Verifier les headers HTTP
curl -I https://votre-domaine.com/feed.xml
# -> Doit retourner: Content-Type: application/xml; charset=utf-8
```

---

*Ce fichier est destiné au suivi des conformités techniques pour la validation Google Merchant Center.*
