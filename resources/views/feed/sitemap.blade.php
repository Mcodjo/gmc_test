@php echo '<?xml version="1.0" encoding="UTF-8"?>'; @endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url><loc>{{ url('/') }}</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>daily</changefreq><priority>1.0</priority></url>
    <url><loc>{{ url('/categories') }}</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>weekly</changefreq><priority>0.9</priority></url>
    <url><loc>{{ url('/a-propos') }}</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>monthly</changefreq><priority>0.6</priority></url>
    <url><loc>{{ url('/contact') }}</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>monthly</changefreq><priority>0.6</priority></url>
    <url><loc>{{ url('/politique-de-confidentialite') }}</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>yearly</changefreq><priority>0.4</priority></url>
    <url><loc>{{ url('/conditions-generales-de-vente') }}</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>yearly</changefreq><priority>0.4</priority></url>
    <url><loc>{{ url('/politique-de-retour') }}</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>yearly</changefreq><priority>0.5</priority></url>
    <url><loc>{{ url('/livraison') }}</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>
    @foreach($categories as $category)
    <url><loc>{{ url('/categorie/' . $category->slug) }}</loc><lastmod>{{ $category->updated_at->toAtomString() }}</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>
    @endforeach
    @foreach($products as $product)
    <url><loc>{{ url('/produit/' . $product->slug) }}</loc><lastmod>{{ $product->updated_at->toAtomString() }}</lastmod><changefreq>weekly</changefreq><priority>0.9</priority></url>
    @endforeach
</urlset>
