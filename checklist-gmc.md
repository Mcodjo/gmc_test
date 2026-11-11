# Checklist Google Merchant Center — ShopAfrica GMC Test

**Projet :** Boutique e-commerce de test pour validation Google Merchant Center (GMC)  
**Date :** Novembre 2024  
**URL du feed :** `https://votre-domaine.com/feed.xml`

---

## Couvert et conforme GMC

### Infrastructure technique
- [x] **HTTPS obligatoire** — Le site doit être déployé avec un certificat SSL valide
- [x] **Robots.txt** — Accessible à `/robots.txt` : autorise Googlebot, lien vers sitemap
- [x] **Sitemap XML** — Accessible à `/sitemap.xml` : toutes les URLs avec `lastmod`
- [x] **Feed XML Google Shopping** — Accessible à `/feed.xml` au format RSS 2.0
- [x] **Content-Type application/xml** — Feed servi avec le bon Content-Type

### Produits — Données obligatoires
- [x] **g:id** — Identifiant unique par produit
- [x] **g:title** — Titre descriptif
- [x] **g:description** — Description complète
- [x] **g:link** — URL canonique HTTPS
- [x] **g:image_link** — Image principale (URL absolue)
- [x] **g:price** — Prix avec devise (format : `49900 XOF`)
- [x] **g:availability** — Disponibilité (`in_stock` / `out_of_stock`)
- [x] **g:condition** — État du produit (`new`)
- [x] **g:brand** — Marque du produit
- [x] **g:google_product_category** — ID taxonomie Google
- [x] **g:identifier_exists** — `yes` ou `no`

### Produits — Données recommandées
- [x] **g:additional_image_link** — Image secondaire
- [x] **g:product_type** — Catégorie personnalisée
- [x] **g:shipping** — Livraison pour produits physiques
- [x] **g:gtin** — GTIN-13 pour TimePro X1
- [x] **g:mpn** — MPN pour CarryMax Pro et Guide Dev Backend

### Pages légales
- [x] Politique de confidentialité `/politique-de-confidentialite`
- [x] CGV `/conditions-generales-de-vente`
- [x] Politique de retour `/politique-de-retour`
- [x] Livraison `/livraison`
- [x] Contact `/contact`
- [x] À propos `/a-propos`

### Schema.org / JSON-LD
- [x] Balise JSON-LD Product sur chaque page produit
- [x] name, image, description, brand, gtin13 (TimePro X1), mpn
- [x] offers : url, priceCurrency, price, availability, itemCondition

---

## Écarts intentionnels pour tester le diagnostic GMC

### Produit 2 : CarryMax Pro (Sac à dos)
| Champ | Valeur | Raison |
|-------|--------|--------|
| `g:gtin` | *(absent)* | Fabricant propre, pas de code-barres standard |
| `g:identifier_exists` | `no` | Indique explicitement l'absence |
| `g:mpn` | `CMP-30L-BLK-2024` | Référence fabricant fournie |

**Avertissement attendu :** `Identifiant de produit manquant [identifier_exists]`  
Les produits sans GTIN avec `identifier_exists=no` peuvent apparaître mais avec visibilité réduite.

### Produit 3 : Guide Dev Backend (E-Book)
| Champ | Valeur | Raison |
|-------|--------|--------|
| `g:shipping` | *(absent)* | Produit numérique, aucune livraison physique |
| `is_digital` | `true` | Marqué comme produit digital |

**Solution si GMC requiert la livraison :**
```xml
<g:shipping>
    <g:country>CI</g:country>
    <g:service>Téléchargement numérique</g:service>
    <g:price>0 XOF</g:price>
</g:shipping>
```

---

## Points à vérifier lors de la soumission GMC

1. Vérifier le domaine dans Google Search Console
2. Soumettre `https://votre-domaine.com/feed.xml` dans GMC > Produits > Feeds
3. Tester pages produits avec l'outil Vérificateur d'URL GMC
4. Valider JSON-LD sur `https://search.google.com/test/rich-results`
5. Consulter GMC > Produits > Diagnostics après soumission
6. Configurer la politique de retour dans GMC > Paramètres > Expédition et retours
