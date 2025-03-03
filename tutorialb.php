In vite.config.js, ensure your configuration allows network access:

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0', // Allow connections from any IP
        port: 5173,      // Default Vite port
        hmr: {
            host: '192.168.x.x', // Replace with your local IP address
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});

npm run dev -- --host
php artisan serve --host=0.0.0.0 --port=8000


To rollback a single migration, use the code below

php artisan migrate:rollback --path=/database/migrations/2024_12_24_053358_create_prof_year_sessions_table.php

php artisan make:model Catagory -mcr
public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('full_name');
            $table->string('medium_name');
            $table->string('short_name');
            $table->foreign('parent_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }


 protected $fillable = [
        'parent_id',
        'full_name',
        'medium_name',
        'short_name',

    ];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }
 public function index()
    {
        //
        $catagories = Category::with('children')->whereNull('parent_id')->get();
        return Inertia::render('Catagories/Index', compact('catagories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $catagories = Category::with('children')->whereNull('parent_id')->get();
        return Inertia::render('Catagories/Create', compact('catagories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'medium_name' => 'required|string|max:255',
            'short_name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($validatedData);
        return redirect()->route('catagories.index')->with('message', 'Catagory Created successfully.');







    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }






