@php echo '<?xml version="1.0" encoding="UTF-8"?>'; @endphp
<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">
    <channel>
        <title>ShopAfrica — Google Shopping Feed</title>
        <link>{{ url('/') }}</link>
        <description>Catalogue produits ShopAfrica pour Google Merchant Center</description>
        <language>fr</language>
        <lastBuildDate>{{ now()->format('D, d M Y H:i:s O') }}</lastBuildDate>

        @foreach($products as $product)
        <item>
            <g:id>{{ $product->id }}</g:id>
            <g:title><![CDATA[{{ $product->title }}]]></g:title>
            <g:description><![CDATA[{{ html_entity_decode(Str::limit(strip_tags(str_replace(['<br>', '<br/>', '<br />'], ' ', $product->description)), 5000)) }}]]></g:description>
            <g:link>{{ url('/produit/' . $product->slug) }}</g:link>
            <g:image_link>{{ url($product->image_link) }}</g:image_link>
            @if($product->additional_image_link)
            <g:additional_image_link>{{ url($product->additional_image_link) }}</g:additional_image_link>
            @endif
            <g:price>{{ $product->price }} {{ $product->currency }}</g:price>
            <g:availability>{{ $product->availability }}</g:availability>
            <g:condition>{{ $product->condition }}</g:condition>
            <g:brand><![CDATA[{{ $product->brand }}]]></g:brand>
            @if($product->gtin)
            <g:gtin>{{ $product->gtin }}</g:gtin>
            @endif
            @if($product->mpn)
            <g:mpn>{{ $product->mpn }}</g:mpn>
            @endif
            <g:identifier_exists>{{ $product->identifier_exists }}</g:identifier_exists>
            <g:google_product_category>{{ $product->google_product_category }}</g:google_product_category>
            <g:product_type><![CDATA[{{ html_entity_decode($product->product_type) }}]]></g:product_type>
            @if(!$product->is_digital && $product->shipping_country)
            <g:shipping>
                <g:country>{{ $product->shipping_country }}</g:country>
                <g:service>{{ $product->shipping_service ?? 'Standard' }}</g:service>
                <g:price>{{ $product->shipping_price }} {{ $product->currency }}</g:price>
            </g:shipping>
            @endif
        </item>
        @endforeach
    </channel>
</rss>
