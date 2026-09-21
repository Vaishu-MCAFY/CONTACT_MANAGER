```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
use App\Models\Contact;
use App\Models\Group;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/dashboard', function () {

    $totalContacts = \App\Models\Contact::count();

    $totalGroups = \App\Models\Group::count();

    $totalPhoneNumbers = \App\Models\PhoneNumber::count();

    $recentContacts = \App\Models\Contact::with('group')
        ->latest()
        ->take(5)
        ->get();

    $groups = \App\Models\Group::withCount('contacts')
        ->orderByDesc('contacts_count')
        ->get();

    return view(
        'dashboard',
        compact(
            'totalContacts',
            'totalGroups',
            'totalPhoneNumbers',
            'recentContacts',
            'groups'
        )
    );

})->name('dashboard');


Route::get('/contacts', [ContactController::class, 'index'])
->name('contacts.index');

Route::get('/contacts/create', [ContactController::class, 'create'])
->name('contacts.create');

Route::post('/contacts', [ContactController::class, 'store'])
->name('contacts.store');

Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])
->name('contacts.edit');

Route::put('/contacts/{contact}', [ContactController::class, 'update'])
->name('contacts.update');

Route::get('/contacts/{contact}', [ContactController::class, 'show'])
->name('contacts.show');

Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])
->name('contacts.destroy');

Route::get('/groups', [GroupController::class, 'index'])
    ->name('groups.index');


Route::get('/groups/create', [GroupController::class, 'create'])
    ->name('groups.create');


Route::post('/groups', [GroupController::class, 'store'])
    ->name('groups.store');


Route::get('/groups/{group}', [GroupController::class, 'show'])
    ->name('groups.show');


Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])
    ->name('groups.edit');


Route::put('/groups/{group}', [GroupController::class, 'update'])
    ->name('groups.update');


Route::delete('/groups/{group}', [GroupController::class, 'destroy'])
    ->name('groups.destroy');
