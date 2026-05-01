<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $page = \App\Models\Page::with('contentBlocks')->where('slug', 'home')->firstOrCreate([
        'slug' => 'home'
    ], [
        'name' => 'Inicio'
    ]);

    return view('welcome', compact('page'));
});

Route::get('/formacion', function () {
    $page = \App\Models\Page::with('contentBlocks')->where('slug', 'formacion')->firstOrCreate([
        'slug' => 'formacion'
    ], [
        'name' => 'Formación'
    ]);
    $documents = \App\Models\Document::where('section', 'formacion')->where('is_visible', true)->latest()->get();
    return view('formacion', compact('documents', 'page'));
})->name('formacion');

Route::get('/ingenieria', function () {
    $page = \App\Models\Page::with('contentBlocks')->where('slug', 'ingenieria')->firstOrCreate([
        'slug' => 'ingenieria'
    ], [
        'name' => 'Ingeniería'
    ]);
    return view('ingenieria', compact('page'));
})->name('ingenieria');

Route::get('/proyecto/{project}', function ($project) {
    $project = \App\Models\Project::with('images')->where('slug', $project)->firstOrFail();
    return view('projects.show', compact('project'));
})->name('proyecto');

Route::get('/estudios-tecnicos', function () {
    $page = \App\Models\Page::with('contentBlocks')->where('slug', 'estudios-tecnicos')->firstOrCreate([
        'slug' => 'estudios-tecnicos'
    ], [
        'name' => 'Estudios Técnicos'
    ]);
    return view('estudios-tecnicos', compact('page'));
})->name('estudios.tecnicos');

Route::get('/proyectos', function () {
    $projects = \App\Models\Project::ordered()->get();
    $documents = \App\Models\Document::where('section', 'proyectos')->where('is_visible', true)->get();
    return view('proyectos', compact('projects', 'documents'));
})->name('proyectos');

Route::get('/proyectos/{project:slug}', function (\App\Models\Project $project) {
    return redirect(route('proyecto', $project->slug), 301);
})->name('projects.show');

Route::view('/calculadora', 'calculadora')->name('calculadora');

// Clear cache (protected - requires login)
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Caché de producción borrada.";
})->middleware('auth');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/diseno-estructuras', function () {
    $page = \App\Models\Page::with('contentBlocks')->where('slug', 'diseno-estructuras')->firstOrCreate([
        'slug' => 'diseno-estructuras'
    ], [
        'name' => 'Diseño de Estructuras'
    ]);
    return view('diseno-estructuras', compact('page'));
})->name('diseno-estructuras');

Route::get('/descargas', function () {
    $page = \App\Models\Page::with('contentBlocks')->where('slug', 'descargas')->firstOrCreate([
        'slug' => 'descargas'
    ], [
        'name' => 'Descargas'
    ]);
    return view('descargas', compact('page'));
})->name('descargas');

Route::get('/transportes-especiales', function () {
    return view('transportes-especiales');
})->name('transportes-especiales');

Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['es', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('set.locale');

Route::post('/contact/send', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::resource('admin/messages', \App\Http\Controllers\Admin\MessageController::class)->except(['create', 'store', 'edit', 'update']);
    Route::resource('admin/documents', \App\Http\Controllers\Admin\DocumentController::class)->except(['show']);
    Route::patch('admin/documents/{document}/toggle', [\App\Http\Controllers\Admin\DocumentController::class, 'toggleVisibility'])->name('documents.toggle');

    // Dedicated routes for AJAX block image uploads
    Route::post('admin/pages/{page}/blocks/{block}/image', [\App\Http\Controllers\Admin\PageController::class, 'uploadBlockImage'])->name('pages.blocks.image.upload');
    Route::delete('admin/pages/{page}/blocks/{block}/image', [\App\Http\Controllers\Admin\PageController::class, 'deleteBlockImage'])->name('pages.blocks.image.delete');

    Route::resource('admin/pages', \App\Http\Controllers\Admin\PageController::class)->only(['index', 'edit', 'update']);
    Route::resource('admin/clients', \App\Http\Controllers\Admin\ClientController::class)->except(['show']);

    Route::resource('admin/projects', \App\Http\Controllers\Admin\ProjectController::class)->names([
        'index' => 'projects.index',
        'create' => 'projects.create',
        'store' => 'projects.store',
        'show' => 'admin.projects.show',
        'edit' => 'projects.edit',
        'update' => 'projects.update',
        'destroy' => 'projects.destroy',
    ]);

    Route::resource('admin/formulas', \App\Http\Controllers\Admin\FormulaController::class)->except(['show']);
    Route::patch('admin/formulas/{formula}/toggle', [\App\Http\Controllers\Admin\FormulaController::class, 'toggleActive'])->name('formulas.toggle');
});

// Dynamic XML Sitemap
Route::get('/sitemap.xml', function () {
    $urls = [
        ['loc' => url('/'), 'priority' => '1.0', 'changefreq' => 'weekly'],
        ['loc' => url('/ingenieria'), 'priority' => '0.9', 'changefreq' => 'monthly'],
        ['loc' => url('/formacion'), 'priority' => '0.9', 'changefreq' => 'monthly'],
        ['loc' => url('/diseno-estructuras'), 'priority' => '0.8', 'changefreq' => 'monthly'],
        ['loc' => url('/estudios-tecnicos'), 'priority' => '0.8', 'changefreq' => 'monthly'],
        ['loc' => url('/transportes-especiales'), 'priority' => '0.7', 'changefreq' => 'monthly'],
        ['loc' => url('/proyectos'), 'priority' => '0.8', 'changefreq' => 'weekly'],
        ['loc' => url('/calculadora'), 'priority' => '0.7', 'changefreq' => 'monthly'],
        ['loc' => url('/descargas'), 'priority' => '0.6', 'changefreq' => 'monthly'],
        ['loc' => url('/contacto'), 'priority' => '0.7', 'changefreq' => 'yearly'],
    ];

    // Add individual project pages (safe — if DB fails, skip)
    try {
        $projects = \App\Models\Project::whereNotNull('slug')->get();
        foreach ($projects as $project) {
            $urls[] = [
                'loc' => url("/proyecto/{$project->slug}"),
                'priority' => '0.6',
                'changefreq' => 'monthly',
            ];
        }
    } catch (\Exception $e) {
        // DB unavailable — serve static URLs only
    }

    $content = view('sitemap', compact('urls'))->render();
    return response($content, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');

require __DIR__ . '/auth.php';