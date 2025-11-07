composer create-project --prefer-dist laravel/laravel jpgovthospitalxx
composer require guizoxxv/laravel-breeze-bootstrap

php artisan breeze-bootstrap:install
npm i -D sass@1.77.6 --save-exact
npm remove tailwindcss postcss autoprefixer
npm install bootstrap @popperjs/core
Edit resources/css/app.css
@import "bootstrap/dist/css/bootstrap.min.css";
Edit resources/js/app.js
Add this line at the bottom:
import 'bootstrap';


composer require maatwebsite/excel:3.1.67
enable extension gd zip
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config


php artisan migrate:rollback --step=1 

php artisan make:model Department -mcr
short_name, medium_name, full_name

php artisan make:model Designation -mcr
short_name, medium_name, full_name

php artisan make:model Opd -mcr
short_name, medium_name, full_name, opd_no
php artisan make:model Gender -mcr
short_name, medium_name, full_name

php artisan make:model PatientRegister -mcr
unique_id, opd_no, name, age, gender_id, address
php artisan make:model YearlyOpdRegister -mcr
patient_register_id, yearly_opd_register_date, opd_no

php artisan make:model CentralOpdRegister -mcr
patient_register_id, consult_date, old_new, opd_room_no

php artisan make:controller CentralOpdRegisterReportController


php artisan migrate:rollback --path=/database/migrations/2025_10_16_172022_create_opds_table.php

dd(json_encode($report, JSON_PRETTY_PRINT));
dd($report->toArray());
php artisan make:seeder DepartmentTableSeeder
php artisan make:seeder DesignationTableSeeder
php artisan make:seeder OldNewTableSeeder
php artisan make:seeder OpdTableSeeder
php artisan make:seeder GenderTableSeeder
php artisan make:controller UserRoleController
php artisan make:controller RolePermissionController
After deleting any controller model
# Clear cached files
php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear

# Regenerate autoload files
composer dump-autoload

php artisan migrate:fresh --seed

To deployee to host
composer install --optimize-autoloader --no-dev
npm run build   # if you're using Vite
php artisan config:cache
php artisan route:cache
php artisan view:cache

in root folder make htaccess file

# redirect laravel subfolder

RewriteEngine On

RewriteCond %{REQUEST_URI} !^/jpgovthospital/public/

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.*)$ /jpgovthospital/public/$1
#RewriteRule ^ index.php [L]
RewriteRule ^(/)?$ jpgovthospital/public/index.php [L]

# Block xmlrpc.php
<Files xmlrpc.php>
Require all denied
</Files>

# Block wp-cron.php
<Files wp-cron.php>
Require all denied
</Files>

# php -- BEGIN cPanel-generated handler, do not edit
# Set the “ea-php81” package as the default “PHP” programming language.
<IfModule mime_module>
  AddHandler application/x-httpd-ea-php81 .php .php8 .phtml
</IfModule>
# php -- END cPanel-generated handler, do not edit



Skip to content
Chat history

You said:
laravel 12 sanctum cooies javascript auth
ChatGPT said:
Got it 👍 — you want to use Laravel 12 Sanctum authentication with cookies (session-based) for JavaScript (frontend, e.g. React/Vue or plain JS).

Here’s a complete, step-by-step setup for Laravel Sanctum with cookie-based SPA or JS auth.

🧩 1. Sanctum Installation & Config
Install Sanctum if not already:

composer require laravel/sanctum
Publish the Sanctum config & migration:

php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
⚙️ 2. Configure config/sanctum.php
Set your frontend domain for cookie authentication:

'stateful' => [
    'localhost',
    '127.0.0.1',
    'your-frontend-domain.com',
],
🌍 3. Set CORS (Cross-Origin Resource Sharing)
In config/cors.php, configure like this:

'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout'],
'allowed_methods' => ['*'],
'allowed_origins' => ['http://localhost:3000', 'https://your-frontend-domain.com'],
'allowed_headers' => ['*'],
'supports_credentials' => true,
✅ This ensures cookies and CSRF headers are allowed between Laravel & your JS frontend.

🧱 4. Middleware Setup
In app/Http/Kernel.php, ensure:

'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    'throttle:api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],
🔐 5. Routes
In routes/api.php:

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Login route
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Protected route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
🧑‍💻 6. AuthController Example
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $request->session()->regenerate();

        return response()->json(['message' => 'Logged in successfully']);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out']);
    }
}
🍪 7. JavaScript (Frontend) — Using Cookies
Here’s how to use it from JavaScript / Axios:

import axios from 'axios';

axios.defaults.withCredentials = true; // ⬅️ important
axios.defaults.baseURL = 'http://127.0.0.1:8000';

// Step 1: Get CSRF cookie first
await axios.get('/sanctum/csrf-cookie');

// Step 2: Login
await axios.post('/api/login', {
  email: 'user@example.com',
  password: 'password'
});

// Step 3: Get authenticated user
const { data } = await axios.get('/api/user');
console.log(data);

// Step 4: Logout
await axios.post('/api/logout');
⚠️ 8. Common Pitfalls
Issue	Fix
Unauthenticated on /api/user	Forgot axios.get('/sanctum/csrf-cookie')
Cookie not set	Enable withCredentials and CORS supports_credentials = true
Wrong Sanctum domain	Add frontend domain in sanctum.stateful
Using api.php routes	✅ Fine — just make sure EnsureFrontendRequestsAreStateful middleware is used
Would you like me to show the React/Vue login form code that works with this Sanctum cookie setup?

You said:
use plain javascript
ChatGPT said:
Perfect 👍 — let’s do Laravel 12 Sanctum cookie-based auth using plain JavaScript (no framework).

This is a front-to-back working example, showing how to log in, stay authenticated via cookies, fetch user info, and log out — all using fetch().

⚙️ Laravel backend setup (summary)
Make sure you have the following in place:

1️⃣ Sanctum installed
composer require laravel/sanctum
php artisan migrate
2️⃣ config/sanctum.php
Add your frontend origin:

'stateful' => ['localhost', '127.0.0.1'],
3️⃣ config/cors.php
'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout'],
'allowed_methods' => ['*'],
'allowed_origins' => ['http://localhost:5500'], // or your frontend domain
'allowed_headers' => ['*'],
'supports_credentials' => true,
4️⃣ Kernel middleware
Make sure EnsureFrontendRequestsAreStateful is in api middleware group.

👨‍💻 Laravel Routes
In routes/api.php:

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
🔐 AuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $request->session()->regenerate();

        return response()->json(['message' => 'Login successful']);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logout successful']);
    }
}
🌐 Plain JavaScript Frontend (example.html)
Place this in a simple HTML file served at http://localhost:5500 (or any static server).

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Laravel Sanctum Auth - Plain JS</title>
</head>
<body>
  <h2>Laravel Sanctum Login (Plain JS)</h2>
  <form id="loginForm">
    <input type="email" id="email" placeholder="Email" required><br><br>
    <input type="password" id="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
  </form>

  <button id="getUser">Get User</button>
  <button id="logout">Logout</button>

  <pre id="output"></pre>

  <script>
    const baseURL = 'http://127.0.0.1:8000'; // Laravel app URL
    const output = document.getElementById('output');

    // Utility function
    async function api(url, options = {}) {
      const res = await fetch(baseURL + url, {
        ...options,
        credentials: 'include', // ⬅️ send cookies!
        headers: {
          'Content-Type': 'application/json',
          ...(options.headers || {})
        }
      });
      return res.json();
    }

    // Step 1: Login
    document.getElementById('loginForm').addEventListener('submit', async e => {
      e.preventDefault();

      // Get CSRF cookie first
      await fetch(baseURL + '/sanctum/csrf-cookie', { credentials: 'include' });

      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;

      const res = await api('/api/login', {
        method: 'POST',
        body: JSON.stringify({ email, password })
      });

      output.textContent = JSON.stringify(res, null, 2);
    });

    // Step 2: Get authenticated user
    document.getElementById('getUser').addEventListener('click', async () => {
      const res = await api('/api/user');
      output.textContent = JSON.stringify(res, null, 2);
    });

    // Step 3: Logout
    document.getElementById('logout').addEventListener('click', async () => {
      const res = await api('/api/logout', { method: 'POST' });
      output.textContent = JSON.stringify(res, null, 2);
    });
  </script>
</body>
</html>
✅ Test Flow
Start Laravel (php artisan serve)

Serve your HTML (e.g. npx serve . or VS Code Live Server)

Open http://localhost:5500

Enter valid email/password

Click “Login” → should say "Login successful"

Click “Get User” → returns logged-in user info

Click “Logout” → session cleared

🧠 Key Points
Purpose	Important Setting
Allow cookies	credentials: 'include' in JS
Allow CORS + cookies	supports_credentials => true
CSRF protection	Must call /sanctum/csrf-cookie before login
Stateful domains	Add frontend domain to sanctum.stateful
Would you like me to show how to store login state (like showing/hiding buttons) using JavaScript in this example?

You said:
create authcontroller in api/auth folder
ChatGPT said:
Perfect 👌 — let’s properly organize your Laravel 12 Sanctum authentication system so that your AuthController sits neatly in
app/Http/Controllers/Api/Auth/AuthController.php.

Here’s the exact folder structure, controller code, and route setup you need.

📁 Folder structure
app/
 └── Http/
      └── Controllers/
           └── Api/
                └── Auth/
                     └── AuthController.php
If folders don’t exist, create them manually:

mkdir -p app/Http/Controllers/Api/Auth
🧱 AuthController (final version)
File: app/Http/Controllers/Api/Auth/AuthController.php

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle user login with Sanctum (cookie-based).
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $request->session()->regenerate();

        return response()->json([
            'message' => 'Login successful',
            'user' => Auth::user(),
        ]);
    }

    /**
     * Return authenticated user info
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Logout user and destroy session.
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out']);
    }
}
🗺️ Routes setup
File: routes/api.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);
});
✅ Your API endpoints will now be:

Action	Method	Endpoint
Login	POST	/api/auth/login
Logout	POST	/api/auth/logout
Get User	GET	/api/auth/user
🌐 Update JavaScript Frontend URLs
If using the plain JavaScript example from before, just update the API paths:

await fetch(baseURL + '/sanctum/csrf-cookie', { credentials: 'include' });

// Login
await api('/api/auth/login', {
  method: 'POST',
  body: JSON.stringify({ email, password })
});

// Get user
await api('/api/auth/user');

// Logout
await api('/api/auth/logout', { method: 'POST' });
⚙️ Optional improvement
If you plan to add registration, password reset, or OTP login later, you can further organize:

app/Http/Controllers/Api/Auth/
 ├── AuthController.php
 ├── RegisterController.php
 ├── ForgotPasswordController.php
 └── ResetPasswordController.php
Would you like me to include a RegisterController too — so new users can sign up via the same /api/auth/register endpoint (with Sanctum cookie login)?

You said:
add registration, password reset
ChatGPT said:
Excellent 👍 — let’s extend your Laravel 12 Sanctum cookie-based authentication to include:

✅ Registration (Sign Up)

🔁 Forgot Password / Reset Password (email link)

We’ll keep everything neatly inside
app/Http/Controllers/Api/Auth/
so your API is clean and RESTful.

📁 Folder structure
app/
 └── Http/
      └── Controllers/
           └── Api/
                └── Auth/
                     ├── AuthController.php
                     ├── RegisterController.php
                     ├── ForgotPasswordController.php
                     └── ResetPasswordController.php
🧱 1. RegisterController
File: app/Http/Controllers/Api/Auth/RegisterController.php

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // auto-login after registration
        $request->session()->regenerate();

        return response()->json([
            'message' => 'Registration successful',
            'user'    => $user,
        ]);
    }
}
🧠 Note:
Your registration form should include password_confirmation so it matches Laravel’s "confirmed" rule.

🧱 2. ForgotPasswordController
File: app/Http/Controllers/Api/Auth/ForgotPasswordController.php

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => ['required', 'email']]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => __($status)])
            : response()->json(['message' => __($status)], 400);
    }
}
📩 Laravel will email a password-reset link using its built-in mail templates.
Make sure your .env has valid mail settings:

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=you@gmail.com
MAIL_PASSWORD=app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=you@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
🧱 3. ResetPasswordController
File: app/Http/Controllers/Api/Auth/ResetPasswordController.php

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function reset(Request $request)
    {
        $request->validate([
            'token'    => ['required'],
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? response()->json(['message' => __($status)])
            : response()->json(['message' => __($status)], 400);
    }
}
🗺️ 4. Routes
File: routes/api.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;

Route::prefix('auth')->group(function () {
    // 🔐 Login / Logout / User
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);

    // 🆕 Register
    Route::post('/register', [RegisterController::class, 'register']);

    // 🔁 Forgot / Reset Password
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
        ->middleware('guest')
        ->name('password.email');

    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
        ->middleware('guest')
        ->name('password.reset');
});
🧩 5. Frontend endpoints (Plain JavaScript)
Action	Method	URL	Notes
Register	POST	/api/auth/register	{ name, email, password, password_confirmation }
Login	POST	/api/auth/login	{ email, password }
Forgot password	POST	/api/auth/forgot-password	{ email }
Reset password	POST	/api/auth/reset-password	{ email, token, password, password_confirmation }
Get user	GET	/api/auth/user	Cookie-authenticated
Logout	POST	/api/auth/logout	Ends session
⚠️ Tips
Must call /sanctum/csrf-cookie before any POST request.

credentials: 'include' in your JS fetch() calls to send cookies.

Make sure your App\Models\User implements CanResetPassword (default Laravel user already does).

Would you like me to show you a plain JavaScript UI example (HTML + fetch API) for register, forgot password, and reset password — similar to the login example?



No file chosenNo file chosen
ChatGPT can make mistakes. Check important info. See Cookie Preferences.







