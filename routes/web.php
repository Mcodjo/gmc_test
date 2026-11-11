<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produit/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/categories', [ProductController::class, 'allCategories'])->name('categories.index');
Route::get('/categorie/{slug}', [ProductController::class, 'category'])->name('category.show');

Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
Route::post('/panier/ajouter', [CartController::class, 'add'])->name('cart.add');
Route::post('/panier/supprimer', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/panier/vider', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/commander', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/commander', [CheckoutController::class, 'process'])->name('checkout.process');

Route::get('/a-propos', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');
Route::get('/politique-de-confidentialite', [PageController::class, 'privacy'])->name('privacy');
Route::get('/conditions-generales-de-vente', [PageController::class, 'terms'])->name('terms');
Route::get('/politique-de-retour', [PageController::class, 'returns'])->name('returns');
Route::get('/livraison', [PageController::class, 'shipping'])->name('shipping');

Route::get('/feed.xml', [FeedController::class, 'googleShopping'])->name('feed.google');
Route::get('/sitemap.xml', [FeedController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [FeedController::class, 'robots'])->name('robots');
