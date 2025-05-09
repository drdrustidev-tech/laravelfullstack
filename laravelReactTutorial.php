composer global remove laravel/installer
composer global update
composer global require laravel/installer

composer create-project --prefer-dist laravel/laravel laravelreact
composer require laravel/breeze --dev
php artisan breeze:install

Now you need to install React Bootstrap using the following command.
npm install react-bootstrap
After installation, import the Bootstrap CSS in your src/index.js or src/main.jsx file:

import 'bootstrap/dist/css/bootstrap.min.css';


php artisan make:model Role -m
php artisan make:model Permission -m
php artisan make:migration create_role_user_table
php artisan make:migration create_permission_role_table
php artisan make:seeder UserSeeder
php artisan make:seeder RoleSeeder
php artisan make:seeder PermissionSeeder
php artisan make:seeder RoleUserSeeder
php artisan make:seeder PermissionRoleSeeder
php artisan make:controller PermissionController --model=Permission --resource
php artisan make:controller RoleController --model=Role --resource



// app/Models/Role.php
protected $fillable = ['role_name'];

// database/migrations/xxxx_xx_xx_create_roles_table.php
public function up()
{
    Schema::create('roles', function (Blueprint $table) {
        $table->id();
        $table->string('role_name');
        $table->string('permission_name');
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
// method to check if a role is in user
public function hasRole(string $role): bool
{
    
    return $this->roles->contains('role_name', $role);
}
// permission relation via roles
public function permissions()
{   
   return $this->roles()
            ->with('permissions')
            ->get()
            ->flatMap->permissions
            ->unique('id');
}
// method to check if a permission is in user
public function hasPermission(string $permission): bool
{
    
    return $this->permissions()->pluck('permission_name')->contains($permission);
}

php artisan make:seeder UserSeeder
// database/seeders/UserSeeder
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

php artisan make:seeder RoleSeeder
// database/seeders/RoleSeeder.php
public function run()
{
    $roles = [
        [
            'id' => 1,
            'role_name' => 'Admin',
        ],
        [
            'id' => 2,
            'role_name' => 'User',
        ],
    ];
    Role::insert($roles);
}


php artisan make:seeder RoleUserSeeder

// database/seeders/RoleUserSeeder.php
User::findOrFail(1)->roles()->sync(1);
User::findOrFail(2)->roles()->sync(2);


php artisan make:seeder PermissionSeeder
// database/seeders/PermissionSeeder.php
public function run()
{
    $permissions = [
        [
            'id' => 1,
            'permission_name' => 'task_create',
        ],
        [
            'id' => 2,
            'permission_name' => 'task_edit',
        ],
        [
            'id' => 3,
            'permission_name' => 'task_destroy',
        ],
    ];
    Permission::insert($permissions);
}


php artisan make:seeder PermissionRoleSeeder
// database/seeders/PermissionRoleTableSeeder.php
Role::findOrFail(1)->permissions()->sync([1, 2, 3]);
Role::findOrFail(2)->permissions()->sync([1]);

$this->call([
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            RoleUserSeeder::class,
            PermissionRoleSeeder::class
        ]);



php artisan migrate:fresh --seed


// app/Providers/AuthServiceProvider.php
public function boot(): void
    {
        //

        // Dynamic override for super admin
    Gate::before(function (User $user, $ability) {
        // You could hardcode or check by role
        
        if ($user->hasRole('Admin')) {
            return true; // Full access
        }

        // Dynamic check via permission
        if ($user->hasPermission($ability)) {
            return true;
        }

        return null; // Let other gates handle if needed
    });

    }

Inertia provides shared data through Laravel middleware called HandleInertiaRequests. Here's how to add a new 'can' key to 'auth' and pass all user permissions:

public function share(Request $request): array
    {
        [$message, $author] = str(Inspiring::quotes()->random())->explode('-');

        return [
            ...parent::share($request),
            'name' => config('app.name'),
            'quote' => ['message' => trim($message), 'author' => trim($author)],
            'auth' => [
                'user' => $request->user(),
                'roles' => fn() => $request->user()?->roles->pluck('role_name') ?? [],
                'permissions' => fn () => $request->user()?->permissions()->pluck('permission_name') ?? [],
            ],
            'flash' => fn() => $request->session()->get('flash'),
        ];
    }
}


Route::resource('permissions', PermissionController::class);


In your resources/js/Pages/Tasks/Index.vue file:

<div class="mb-4" v-if="$page.props.auth.can.task_create">
    <Link :href="route('tasks.create')" class="bg-green-500 hover:bg-green-700 text-white border border-transparent font-bold px-4 py-2 text-xs uppercase tracking-widest rounded-md">
        Create
    </Link>
</div>
<Link v-if="$page.props.auth.can.task_edit" :href="route('tasks.edit', task)" class="bg-green-500 hover:bg-green-700 text-white border border-transparent font-bold px-4 py-2 text-xs uppercase tracking-widest rounded-md">
    Edit
</Link>
<PrimaryButton v-if="$page.props.auth.can.task_destroy" @click="destroy(task.id)">
    Delete
</PrimaryButton>

Now, In your app/Http/Controllers/TasksController.php, we'll add authorization checks to each method using the $this->authorize() method.

// app/Http/Controllers/TasksController.php
public function index()
{
    $tasks = Task::all();
    return Inertia::render('Tasks/Index', [
        'tasks' => $tasks,
        'can' => [
            'createTask' => auth()->user()->can('task_create'),
            'editTask' => auth()->user()->can('task_edit'),
            'destroyTask' => auth()->user()->can('task_destroy'),
        ],
    ]);
}
public function create()
{
    $this->authorize('task_create');
    return Inertia::render('Tasks/Create');
}
public function store(StoreTaskRequest $request)
{
    $this->authorize('task_create');
    Task::create($request->validated());
    return redirect()->route('tasks.index');
}
public function edit(Task $task)
{
    $this->authorize('task_edit');
    return Inertia::render('Tasks/Edit', compact('task'));
}
public function update(UpdateTaskRequest $request, Task $task)
{
    $this->authorize('task_edit');
    $task->update($request->validated());
    return redirect()->route('tasks.index');
}
public function destroy(Task $task)
{
    $this->authorize('task_destroy');
    $task->delete();
    return redirect()->route('tasks.index');
}
dd debaug format
dd([
            'role' => $this->role,
            'type' => gettype($this->role),
            'email' => $value,
            'exists' => DB::table('student_admissions')->where('email', $value)->exists(),
        ]);

CUSTOM VALIDATION RULE FOR SOMETHING
class EmailExistsInAnyTable implements ValidationRule
{
    protected int $role;
     /**
     * Create a new rule instance.
     */
    public function __construct(int $role)
    {
        $this->role = $role;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {        
        $exists = match ($this->role) {
            5 => DB::table('student_admissions')->where('email', $value)->exists(),
            //6 => DB::table('teachers')->where('email', $value)->exists(),
            //7 => DB::table('employees')->where('email', $value)->exists(),
            default => false,
        };        

        if (! $exists) {
            //$fail("The {$attribute} must exist in the {$this->role}s table.");
            $fail("This Email is not in Database contact Admin.");
        }

    }
}




















