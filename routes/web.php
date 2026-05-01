<?php

use App\Http\Controllers\ProfileController;
use App\Models\Document;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $page = Page::resolvePublicPage('home', 'Inicio');

    return view('welcome', compact('page'));
});

Route::get('/formacion', function () {
    $page = Page::resolvePublicPage('formacion', 'Formacion');

    try {
        $documents = Document::where('section', 'formacion')->where('is_visible', true)->latest()->get();
    } catch (\Throwable) {
        $documents = collect();
    }

    return view('formacion', compact('documents', 'page'));
})->name('formacion');

Route::get('/ingenieria', function () {
    $page = Page::resolvePublicPage('ingenieria', 'Ingenieria');
    return view('ingenieria', compact('page'));
})->name('ingenieria');

Route::get('/proyecto/{project}', function ($project) {
    try {
        $project = Project::with('images')->where('slug', $project)->firstOrFail();
    } catch (\Throwable) {
        abort(404);
    }

    return view('projects.show', compact('project'));
})->name('proyecto');

Route::get('/estudios-tecnicos', function () {
    $page = Page::resolvePublicPage('estudios-tecnicos', 'Estudios Tecnicos');
    return view('estudios-tecnicos', compact('page'));
})->name('estudios.tecnicos');

Route::get('/proyectos', function () {
    try {
        $projects = Project::ordered()->get();
    } catch (\Throwable) {
        $projects = collect();
    }

    try {
        $documents = Document::where('section', 'proyectos')->where('is_visible', true)->get();
    } catch (\Throwable) {
        $documents = collect();
    }

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
    return "Cache de produccion borrada.";
})->middleware('auth');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/diseno-estructuras', function () {
    $page = Page::resolvePublicPage('diseno-estructuras', 'Diseno de Estructuras');
    return view('diseno-estructuras', compact('page'));
})->name('diseno-estructuras');

Route::get('/descargas', function () {
    $page = Page::resolvePublicPage('descargas', 'Descargas');
    return view('descargas', compact('page'));
})->name('descargas');

Route::get('/transportes-especiales', function () {
    return view('transportes-especiales');
})->name('transportes-especiales');

Route::get('/media/public/{path}', function (string $path) {
    abort_unless(Storage::disk('public')->exists($path), 404);

    return response()->file(Storage::disk('public')->path($path));
})->where('path', '.*')->name('media.public');

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

    Route::resource('admin/messages', \App\Http\Controllers\Admin\MessageController::class)->except(['create', 'store', 'edit', 'update']);
    Route::resource('admin/documents', \App\Http\Controllers\Admin\DocumentController::class)->except(['show']);
    Route::patch('admin/documents/{document}/toggle', [\App\Http\Controllers\Admin\DocumentController::class, 'toggleVisibility'])->name('documents.toggle');

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

    try {
        $projects = Project::whereNotNull('slug')->get();
        foreach ($projects as $project) {
            $urls[] = [
                'loc' => url("/proyecto/{$project->slug}"),
                'priority' => '0.6',
                'changefreq' => 'monthly',
            ];
        }
    } catch (\Throwable) {
        // Serve static URLs when the database is not ready.
    }

    $content = view('sitemap', compact('urls'))->render();
    return response($content, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');

require __DIR__ . '/auth.php';
