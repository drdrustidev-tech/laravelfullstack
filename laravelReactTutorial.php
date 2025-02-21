php artisan make:model Role -m
php artisan make:model Permission -m

// app/Models/Role.php
protected $fillable = ['title'];

// database/migrations/xxxx_xx_xx_create_roles_table.php
public function up()
{
    Schema::create('roles', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->timestamps();
    });
}


// app/Models/Role.php
public function permissions(): BelongsToMany
{
    return $this->belongsToMany(Permission::class);
}


php artisan make:migration create_permission_role_table
// database/migrations/xxxx_xx_xx_create_permission_role_table.php
public function up()
{
    Schema::create('permission_role', function (Blueprint $table) {
        $table->foreignId('permission_id')->constrained();
        $table->foreignId('role_id')->constrained();
    });
}

php artisan make:migration create_role_user_table

// database/migrations/xxxx_xx_xx_create_role_user_table.php
public function up()
{
    Schema::create('role_user', function (Blueprint $table) {
        $table->foreignId('role_id')->constrained();
        $table->foreignId('user_id')->constrained();
    });
}

// app/Models/User.php
public function roles(): BelongsToMany
{
    return $this->belongsToMany(Role::class);
}

// database/seeders/UsersTableSeeder.php
public function run()
{
    $users = [
        [
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'remember_token' => null,
        ],
        [
            'id' => 2,
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'remember_token' => null,
        ],
    ];
    User::insert($users);
}

// database/seeders/RolesTableSeeder.php
public function run()
{
    $roles = [
        [
            'id' => 1,
            'title' => 'Admin',
        ],
        [
            'id' => 2,
            'title' => 'User',
        ],
    ];
    Role::insert($roles);
}










