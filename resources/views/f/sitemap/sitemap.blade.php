<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
  <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
      <loc>{{ url('sitemap/posts.xml') }}</loc>
      <lastmod>{{ $post->created_at->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
      <loc>{{ url('sitemap/kategori.xml') }}</loc>
      <lastmod>{{ $kategori->created_at->toAtomString() }}</lastmod>
    </sitemap>
  </sitemapindex>
