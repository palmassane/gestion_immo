<?php

use App\Models\Banner;
use App\Models\Category;
use App\Models\Country;
use App\Models\Listing;
use App\Models\Location;
use App\Models\Region;
use App\Models\Setting;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Admin Dashboard
Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push(__('Tableau de board'), route('admin.dashboard'));
});

// Settings
Breadcrumbs::for('admin.settings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Paramètres du site'), route('admin.settings.index'));
});

Breadcrumbs::for('admin.settings.edit', function (BreadcrumbTrail $trail, Setting $setting) {
    $trail->parent('admin.settings.index');
    $trail->push(__('Mettre à jour les paramètres'), route('admin.settings.edit', $setting));
});

// Countries
Breadcrumbs::for('admin.countries.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Tous les pays'), route('admin.countries.index'));
});

Breadcrumbs::for('admin.countries.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.countries.index');
    $trail->push(__('Ajouter un nouveau pays'), route('admin.countries.create'));
});

Breadcrumbs::for('admin.countries.edit', function (BreadcrumbTrail $trail, Country $country) {
    $trail->parent('admin.countries.index');
    $trail->push($country->title, route('admin.countries.edit', $country));
});

// Regions
Breadcrumbs::for('admin.regions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Regions'), route('admin.regions.index'));
});

Breadcrumbs::for('admin.regions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.regions.index');
    $trail->push(__('Ajouter une nouvelle region'), route('admin.regions.create'));
});

Breadcrumbs::for('admin.regions.edit', function (BreadcrumbTrail $trail, Region $region) {
    $trail->parent('admin.regions.index');
    $trail->push($region->title, route('admin.regions.edit', $region));
});

// Locations
Breadcrumbs::for('admin.locations.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Toutes les localités'), route('admin.locations.index'));
});

Breadcrumbs::for('admin.locations.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.locations.index');
    $trail->push(__('Ajouter un nouvelle localité'), route('admin.locations.create'));
});

Breadcrumbs::for('admin.locations.edit', function (BreadcrumbTrail $trail, Location $location) {
    $trail->parent('admin.locations.index');
    $trail->push($location->title, route('admin.locations.edit', $location));
});

// Categories
Breadcrumbs::for('admin.categories.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Toutes les catégories'), route('admin.categories.index'));
});

Breadcrumbs::for('admin.categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.categories.index');
    $trail->push(__('Ajouter un nouvelle catégorie'), route('admin.categories.create'));
});

Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('admin.categories.index');
    $trail->push($category->title, route('admin.categories.edit', $category));
});

// Listings
Breadcrumbs::for('admin.listings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Tous les bien immobiliers'), route('admin.listings.index'));
});

Breadcrumbs::for('admin.listings.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.listings.index');
    $trail->push(__('Ajouter un nouvelle annonce'), route('admin.listings.create'));
});

Breadcrumbs::for('admin.listings.photos.index', function (BreadcrumbTrail $trail, Listing $listing) {
    $trail->parent('admin.listings.create', $listing);
    $trail->push(__('Téléchargez les photos'), route('admin.listings.photos.index', $listing));
});

Breadcrumbs::for('admin.listings.edit', function (BreadcrumbTrail $trail, Listing $listing) {
    $trail->parent('admin.listings.index');
    $trail->push($listing->title, route('admin.listings.edit', $listing));
});

// users
Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Tous les utilisateurs'), route('admin.users.index'));
});

Breadcrumbs::for('admin.users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users.index');
    $trail->push(__('Ajouter un utilisateur'), route('admin.users.create'));
});

Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('admin.users.index');
    $trail->push($user->full_name, route('admin.users.edit', $user));
});

// Profile
Breadcrumbs::for('admin.profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Modifier mon profil'), route('admin.profile.edit'));
});

Breadcrumbs::for('admin.profile.update-password', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Changer mon mot de passe'), route('admin.profile.update-password'));
});

// Banners
Breadcrumbs::for('admin.banners.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Toutes les bannières'), route('admin.banners.index'));
});

Breadcrumbs::for('admin.banners.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.banners.index');
    $trail->push(__('Ajouter une nouvelle bannière'), route('admin.banners.create'));
});

Breadcrumbs::for('admin.banners.edit', function (BreadcrumbTrail $trail, Banner $banner) {
    $trail->parent('admin.banners.index');
    $trail->push($banner->title, route('admin.banners.edit', $banner));
});

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Accueil', route('home'));
});

// Listings
Breadcrumbs::for('listings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Dernières annonces'), route('listings.index'));
});

// Listings Search
Breadcrumbs::for('listings.search', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Resultats de la recherche'), route('listings.search'));
});

// Category
Breadcrumbs::for('listings.category', function (BreadcrumbTrail $trail, $dbCategory) {
    $trail->parent('home');
    $trail->push($dbCategory->title, route('listings.category', [
        'dbCategory' => $dbCategory->slug
    ]));
});

// Listing
Breadcrumbs::for('listings.show', function (BreadcrumbTrail $trail, $slug, $id) {
    $listing = Listing::query()
        ->where('slug', $slug)
        ->where('id', $id)
        ->active()
        ->firstOrFail();

    $trail->parent('listings.category', $listing->category);

    $trail->push($listing->title, route('listings.show', [
        'slug' => $listing->slug,
        'id' => $listing->id,
    ]));
});
