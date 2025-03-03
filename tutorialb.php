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







