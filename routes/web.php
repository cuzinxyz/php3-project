<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\NewsCategoriesController;

// CLIENT
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/property/{property}', 'show')->name('show');
    Route::get('/property', 'list')->name('list');
    # begin search
    Route::post('/property', 'list')->name('searchProperty');
    # end search
    Route::get('/blog/{slug}', 'blog')->name('blog');
    Route::get('/blog', 'news')->name('news');
    Route::get('/property-type/{type}', 'type')->name('type');
    Route::get('/category/{category}', 'category')->name('category');
});

// UserController
Route::controller(UserController::class)->group(function () {
    // Login
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginSubmit')->name('loginSubmit');
    // Register
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerSubmit')->name('registerSubmit');
    // Verify email
    Route::get('/register/verify/{token}/{email}', 'register_verify')->name('registerVerify');
    // Logout
    Route::get('/logout', 'destroy')->name('logout');
});

# ADMIN
Route::middleware(['auth', 'check.admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        // Homepage admin
        Route::get('/', [HomeController::class, 'admin'])->name('admin.home');

        // Property Manager
        Route::controller(PropertyController::class)->group(function () {
            Route::prefix('property')->group(function () {
                Route::name('property.')->group(function () {
                    # List
                    Route::get('/', 'index')->name('list');
                    # Create
                    Route::get('/create', 'create')->name('create');
                    Route::post('/create', 'store')->name('store');
                    # Edit
                    Route::get('/edit/{property}', 'edit')->name('edit');
                    Route::post('/edit/{property}', 'update')->name('update');
                    # Delete
                    Route::delete('/delete/{property}', 'destroy')->name('destroy');
                });
            });
        });

        // Property Type Manager
        Route::controller(PropertyTypeController::class)->group(function () {
            Route::prefix('property-type')->group(function () {
                Route::name('property-type.')->group(function () {
                    # List
                    Route::get('/', 'index')->name('list');
                    # Create
                    Route::get('/create', 'create')->name('create');
                    Route::post('/create', 'store')->name('store');
                    # Edit
                    Route::get('/edit/{type}', 'edit')->name('edit');
                    Route::post('/edit/{type}', 'update')->name('update');
                    # Delete
                    Route::delete('/delete/{type}', 'destroy')->name('destroy');
                });
            });
        });

        // Blog Category Manager
        Route::controller(NewsCategoriesController::class)->group(function () {
            Route::prefix('categories')->group(function () {
                Route::name('categories.')->group(function () {
                    # List
                    Route::get('/', 'index')->name('list');
                    # Create
                    Route::get('/create', 'create')->name('create');
                    Route::post('/create', 'store')->name('store');
                    # Edit
                    Route::get('/edit/{category}', 'edit')->name('edit');
                    Route::post('/edit/{category}', 'update')->name('update');
                    # Delete
                    Route::delete('/delete/{category}', 'destroy')->name('destroy');
                });
            });
        });

        // Blog
        Route::controller(BlogController::class)->group(function () {
            Route::prefix('blog')->group(function () {
                Route::name('blog.')->group(function () {
                    # List
                    Route::get('/', 'index')->name('list');
                    # Create
                    Route::get('/create', 'create')->name('create');
                    Route::post('/create', 'store')->name('store');
                    # Edit
                    Route::get('/edit/{post}', 'edit')->name('edit');
                    Route::post('/edit/{post}', 'update')->name('update');
                    # Delete
                    Route::delete('/delete/{post}', 'destroy')->name('destroy');
                });
            });
        });

        // Banner
        Route::controller(BannerController::class)->group(function () {
            Route::prefix('banner')->group(function () {
                Route::name('banner.')->group(function () {
                    # List
                    Route::get('/', 'index')->name('list');
                    # Create
                    Route::get('/create', 'create')->name('create');
                    Route::post('/create', 'store')->name('store');
                    # Edit
                    Route::get('/edit/{banner}', 'edit')->name('edit');
                    Route::post('/edit/{banner}', 'update')->name('update');
                    # Delete
                    Route::delete('/delete/{banner}', 'destroy')->name('destroy');
                });
            });
        });
    });
});

# API
Route::prefix('api')->group(function () {
    Route::get('properties', [PropertyController::class, 'getAllProperties']);
});
