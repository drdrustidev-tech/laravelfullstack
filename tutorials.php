<?php

composer create-project --prefer-dist laravel/laravel ddsroganidan
composer create-project --prefer-dist laravel/laravel backendlaravel
composer create-project --prefer-dist laravel/laravel jpgovtbackend
composer require laravel/breeze --dev
php artisan breeze:install react
npm install
npm run dev
php artisan serve
php artisan make:model Post --mcr
php artisan make:model Post -mcr
php artisan make:model Subject -mcr
php artisan make:model Chapter -mcr
php artisan make:model Question -mcr
php artisan make:controller Auth/UserController --resource
php artisan make:controller Auth/RoleController --resource

php artisan make:view auth.roles.index
php artisan make:view auth.roles.create
php artisan make:view auth.roles.edit
php artisan make:view auth.users.index
php artisan make:view auth.users.create
php artisan make:view auth.users.edit

php artisan make:view teachers.edit

php artisan make:view auth.roles --resource



php artisan migrate:rollback

php artisan migrate:rollback --step=5

php artisan migrate:rollback --step=16
php artisan migrate:reset

npm i jquery-validation
npm install --save jquery-validation

npm install sweetalert2
we need to import SweetAlert2 into resources/js/app.js
import swal from 'sweetalert2';
window.Swal = swal;

npm install @fortawesome/fontawesome-free
resources/js/app.js
import '@fortawesome/fontawesome-free/js/all';



composer require laravel/ui
php artisan ui react
php artisan ui bootstrap --auth
npm install && npm run dev

npm i sass@1.77.6 --save-exact

if jquery $ not defined error then
npm install jquery --save-dev
import $ from 'jquery';
window.$ = $;

php artisan optimize
php artisan make:controller UserController --resource
php artisan make:model Faculty --mcr
php artisan make:model Role --mcr
php artisan make:model Department --mcr
php artisan make:model Patron --mcr
php artisan make:model Frontslider --mcr
php artisan make:model SiteAssetImage -mcr
php artisan make:controller TestController --resource

php artisan make:seeder PermissionTableSeeder
php artisan db:seed --class=PermissionTableSeeder

php artisan make:seeder CreateAdminUserSeeder
php artisan db:seed --class=CreateAdminUserSeeder










/*

Use Postman
Make a GET request to any page that has
<meta name="csrf-token" content="{{ csrf_token() }}">
Copy the value from the response.

Add a header field to your POST request:

"X-CSRF-TOKEN: "copied_token_in_previous_get_response"














COMMAND TO MAKE MODELS
php artisan make:controller UserController --resource
php artisan make:model Faculty --mcr
php artisan make:model Department --mcr
php artisan make:model Patron --mcr
php artisan make:model Frontslider --mcr
php artisan make:model Institute -mcr
php artisan make:model Emptype -mcr
php artisan make:model Empclass -mcr
php artisan make:model Noticetype -mcr
php artisan make:model RecFile -mcr
php artisan make:model RecImage -mcr
php artisan make:model RecBody -mcr
php artisan make:model MedicalOfficer -mcr
php artisan make:model Teacher -mcr
teacher_name gender_id teacher_code designation_id subject_id teacher_email teacher_photo

php artisan make:model Student -mcr
php artisan make:model Nurse -mcr
php artisan make:model Pharmacist -mcr
php artisan make:model LabTechnician -mcr
php artisan make:model Subject -mcr
php artisan make:model Professional -mcr
php artisan make:model StaticPage -mcr
php artisan make:model Album -mcr
php artisan make:model AlbumPhoto -mcr
php artisan make:model StudentAdmission --mcr  
admsession name gender email admdate orderno orderdate leaveorder leaveorderdate leavereason
php artisan make:model Gender -mcr
name short_name
php artisan make:model ReleivedReason -mcr
name
php artisan make:model ProfYear --mcr
php artisan make:model AppointmentType -mcr name short_name
php artisan make:model DesignationType -mcr
php artisan make:model Catagory -mcr

php artisan make:model ProfYear --mcr
php artisan make:model ProfYearSession -mcr
name prof_year_id start_date end_date
php artisan make:model ProfYearSessionStudent --mcr
prof_year_session_id student_id student_roll_no group_id

php artisan make:model AcadClassSchedule --mcr
class_date start_time end_time prof_year_session_id lecture_type_id group_id subject_id teacher_id class_topic teaching_method tools_used
php artisan make:model Attendence -m
acad_class_schedule_id prof_year_session_student_id  attendence_status
php artisan make:controller AcadClassScheduleAttendenceController --model=Attendence --resource



prof_year_session_id lecture_type_id group_id name class_type_id efffective_date end_date

php artisan make:model AcadClassSheduleSession -mcr
acad_class_schudle_id prof_year_session_id

php artisan make:model AcadClassSheduleStudents -mcr
acad_class_schudle_id prof_year_session_student_id student_roll_no group_id

php artisan make:model Attendence -mcr
class_date start_time end_time acad_class_schudle_id subject_id teacher_id topic

php artisan make:model AttendenceDetail --mcr
attendence_id academic_class_schedule_student_id attendence_status

php artisan make:controller Settings/MyDetailsController





class_date start_time end_time acad_class_schudle_student_id subject_id teacher_id topic
php artisan make:model Attendence -mcr
attendence_date start_time end_time class_type_id teacher_id topic
php artisan make:model AttendenceDetail --mcr
attendence_id academic_class_schedule_student_id attendence_status
php artisan make:enum Enums/ProfYear



php artisan make:model Purinvoice -mcr
php artisan make:model Product -mcr


php artisan make:controller AdminController

*/


/*
COMMAND TO MAKE MIGRATIONS
php artisan make:migration add_paid_to_users_table --table=users
php artisan make:migration add_column_to_faculties_table

php artisan make:model Faculty --mcr
php artisan make:model Department --mcr
php artisan make:model Patron --mcr
php artisan make:model Frontslider --mcr
php artisan migrate:rollback --step=1

BEFORE DEPLOYEE PROJCET
php artisan cache:clear
php artisan view:clear
rm -rf storage/sessions

//invoice_date, invoice_number, vendor_id, due_amount
//purinvoice_id, product_name, product_description, product_unit, price_unit, quantity, price_total 



Open /.env. Copy APP_KEY value without base64:

9. Go to /config/app.php, find ‘key’ and replace the line with the 
following code: ‘key’ => env(‘APP_KEY’, base64_decode(‘%YOUR_COPIED_APPKEY%’));

10. Update the database credentials from /config/database.php or .env file. 
Lookup for mysql vector and update the database, username, password properly.

*/
//php artisan make:migration add_paid_to_users_table --table=users
public function up()
{
    Schema::table('users', function($table) {
        $table->integer('paid');
    });
}

public function down()
{
    Schema::table('users', function($table) {
        $table->dropColumn('paid');
    });
}
public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->string('invoice_number');
            $table->string('reference_number')->nullable();
            $table->string('status');
            $table->string('paid_status');
            $table->string('tax_per_item');
            $table->string('discount_per_item');
            $table->text('notes')->nullable();
            $table->string('discount_type')->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->unsignedBigInteger('discount_val')->nullable();
            $table->unsignedBigInteger('sub_total');
            $table->unsignedBigInteger('total');
            $table->unsignedBigInteger('tax');
            $table->unsignedBigInteger('due_amount');
            $table->boolean('sent')->default(false);
            $table->boolean('viewed')->default(false);
            $table->string('unique_hash')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
	public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('discount_type');
            $table->unsignedBigInteger('price');
            $table->decimal('quantity', 15, 2);
            $table->decimal('discount', 15, 2)->nullable();
            $table->unsignedBigInteger('discount_val');
            $table->unsignedBigInteger('tax');
            $table->unsignedBigInteger('total');
            $table->integer('invoice_id')->unsigned();
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->integer('item_id')->unsigned()->nullable();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_items');
    }


/**

.htaccess in root file to redirect
RewriteEngine on

RewriteCond %{REQUEST_URI} !^/jpgovt
RewriteRule ^(.*)$ /jpgovt/$1 [NC,L]





 composer create-project laravel/laravel --prefer-dist laravel-react
 composer require -w laravel/passport
 composer create-project laravel/laravel --prefer-dist ddsroganidan-backend
 composer create-project laravel/laravel --prefer-dist dds-ayurnidan
 composer create-project laravel/laravel --prefer-dist laravelfresh
	 npm install react@latest react-dom@latest
	 npm i @vitejs/plugin-react
	 
	 
	 
	 
	 composer require laravel/ui
	 php artisan ui react
	npm install
	
	npm install --save-dev react react-dom
	
	# npm 6.x
npm create vite@latest frontend --template react

# npm 7+, extra double-dash is needed:
npm create vite@latest frontend -- --template react
npm create vite@latest frontend -- --template react


npx create-react-app react-bootstrap-app
npm install react-bootstrap bootstrap

npm i react-router-dom
npm install bootstrap
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min';
npm install jquery popper.js
import $ from 'jquery';
import Popper from 'popper.js';


php artisan make:model Blog -mcr
php artisan make:model Product -m
php artisan make:model Image -m
php artisan make:model Employee -m
php artisan make:model Role -m
php artisan make:controller Auth/UserAuthController
php artisan make:controller Auth/SetRoleController
php artisan make:resource EmployeeResource
php artisan make:migration create_employees_table
php artisan make:controller API/EmployeeController --api --model=Employee
php artisan make:controller API/ProductControllerb --api --model=Product
php artisan make:controller Api\AuthbController --model=User --api
php artisan make:controller Api\AuthController --model=User --api
php artisan make:resource ProductResource
php artisan make:resource ProductCollection
php artisan make:controller API/BaseController --resource
php artisan make:controller API/AuthController --resource
php artisan make:controller API/BlogController --resource
php artisan make:controller PassportAuthController --resource
php artisan make:controller PostController --resource

php artisan make:controller PhotoController --model=Photo --resource
php artisan make:controller PhotoController --model=Photo --resource --requests
php artisan make:controller AsignroleController --model=User --resource




composer require laravel/passport ^v11.8.3
composer require laravel/passport -w ^v10.4.2


php artisan make:middleware CheckRole
php artisan route:list


// Validate request data
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|image'
        ]);
        // Return errors if validation error occur.
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }



<?php

// Show all information, defaults to INFO_ALL
phpinfo();

// Show just the module information.
// phpinfo(8) yields identical results.
phpinfo(INFO_MODULES);

?>



if ( false === function_exists('gettext') ) {
    echo "You do not have the gettext library installed with PHP.";
    exit(1);
}

if (!function_exists("gettext")){ echo "gettext is not installed\n"; } 
else{ echo "gettext is supported\n"; }

systemctl restart httpd.service
; Enable gettext extension module
extension=gettext.so


mysql -u root -p gaac_urja < "F:\COLLEGE AHMEDAVAD\WEBSITE\BACKUP\20230915/gaac_urja.sql"







sudo apt-get install php7.4-PACKAGE_NAME

sudo apt-get install -y php7.4-cli php7.4-json php7.4-common php7.4-mysql php7.4-zip php7.4-gd php7.4-mbstring php7.4-curl php7.4-xml php7.4-bcmath

sudo apt-get install php7.3-gettext


<IfModule mod_php5.c>
    php_value php_extension php_curl.so
</IfModule>

<IfModule mod_php7.c>
    php_value php_extension curl
</IfModule>





***/



/**

.htaccess in root file to redirect
RewriteEngine on

RewriteCond %{REQUEST_URI} !^/jpgovt
RewriteRule ^(.*)$ /jpgovt/$1 [NC,L]

certbot certonly --manual -d *.gaac.co.in -d gaac.co.in --agree-tos --manual-public-ip-logging-ok --preferred-challenges dns-01 --server https://acme-v02.api.letsencrypt.org/directory --register-unsafely-without-email --rsa-key-size 4096

certbot certonly renew --manual -d *.gaac.co.in -d gaac.co.in --agree-tos --manual-public-ip-logging-ok --preferred-challenges dns-01 --server https://acme-v02.api.letsencrypt.org/directory --register-unsafely-without-email --rsa-key-size 4096


certbot certonly --manual -d *.urja.gaac.co.in -d urja.gaac.co.in --agree-tos --manual-public-ip-logging-ok --preferred-challenges dns-01 --server https://acme-v02.api.letsencrypt.org/directory --register-unsafely-without-email --rsa-key-size 4096

check record by following
nslookup -type=TXT _acme-challenge.gaac.co.in
nslookup -type=TXT _acme-challenge.urja.gaac.co.in

_acme-challenge
_acme-challenge.urja







GET|HEAD        api/products .................................................................... products.index › API\ProductController@index
  POST            api/products .................................................................... products.store › API\ProductController@store  
  GET|HEAD        api/products/create ........................................................... products.create › API\ProductController@create  
  GET|HEAD        api/products/{product} ............................................................ products.show › API\ProductController@show  
  PUT|PATCH       api/products/{product} ........................................................ products.update › API\ProductController@update  
  DELETE          api/products/{product} ...................................................... products.destroy › API\ProductController@destroy  
  GET|HEAD        api/products/{product}/edit ...


GET|HEAD        pages ..................................................................................... pages.index › PageController@index
  POST            pages ..................................................................................... pages.store › PageController@store  
  GET|HEAD        pages/create ............................................................................ pages.create › PageController@create  
  GET|HEAD        pages/{page} ................................................................................ pages.show › PageController@show  
  PUT|PATCH       pages/{page} ............................................................................ pages.update › PageController@update  
  DELETE          pages/{page} .......................................................................... pages.destroy › PageController@destroy  
  GET|HEAD        pages/{page}/edit ........................................................................... pages.edit › PageController@edit 
  
  Route::resource('photos.comments', PhotoCommentController::class);
  Verb	URI	Action	Route Name
GET	/photos/{photo}/comments	index	photos.comments.index
GET	/photos/{photo}/comments/create	create	photos.comments.create
POST	/photos/{photo}/comments	store	photos.comments.store
GET	/comments/{comment}	show	comments.show
GET	/comments/{comment}/edit	edit	comments.edit
PUT/PATCH	/comments/{comment}	update	comments.update
DELETE	/comments/{comment}	destroy	comments.destroy
  
  
  
  
  Listing and getting resources: 200 (OK).
Creating resources: 201 (Created).
Updating resources: 200 (OK).
Deleting resources: 204 (No Content).
Need to be authenticated to access resources: 401 (Forbidden).
Unauthorized access to resources: 403 (Unauthorized).
Missing resources: 404 (Not Found).
Something went wrong: 500 (Internal Server Error).



LARAVEL REACT INTEGRATION

02: Install react and vite react-plugin

npm i
npm install react@latest react-dom@latest
npm i @vitejs/plugin-react
03: Update vite.config.js

import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/js/app.jsx"],
            refresh: true,
        }),
        react(),
    ],
});
          
04: Create a route
Route::get('/', function () {
    return view('app');
});

Route::any('{any}', [UserController::class,'index'])->where('any', '^(?!api).*$');

Route::get('/{any}', function () {
    return view('reactentry');
})->where('any', '.*');

Route::get('/{any}', function () {
    return view('reactentry');
})->where('any', '^(?!api).*$');







05: Update Layout blade file

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel 9 vite with react</title>

    @viteReactRefresh
    @vite('resources/js/app.jsx')
</head>

<body>
    <div id="app"></div>
</body>

</html>
          
06: Update resources/js/app.jsx
import "./bootstrap";
import "../css/app.css";

import ReactDOM from "react-dom/client";
import Home from "./Pages/Home";

ReactDOM.createRoot(document.getElementById("app")).render(<Home />);


07: Create new page
resources/js/Pages/Home.jsx

import React from "react";

const Home = () => {
    return <div>Home</div>;
};

export default Home;

class PostController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
		// $books = App\Book::with('author.contacts')->get(); multilevel relation get
        $posts = Post::all();
        return response()->json(['status' => 'success', 'posts' => $posts], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(['title' => 'required', 'description' => 'required']);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        //return response(['status' => 'success', 'post' => $post, 'code' => 200]);
		$response = [
		'status' => 'success', 
		'post' => $post
		];
		return response()->json($response, 200);
		
        return response()->json(['status' => 'success', 'post' => $post], 200);
        



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::find($id);        
        return response()->json(['status' => 'success', 'post' => $post], 200);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(['title' => 'required', 'description' => 'required']);
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();        
        return response()->json(['status' => 'success', 'post' => $post], 200);
        





    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        return response()->json(['status' => 'success', 'message' => 'deleted successfully'], 200);
       

    }








}



namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductResource; 



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        try {
            return ProductResource::collection(Product::with('imagefield')->get());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something goes wrong while retriving all products!!'
            ], 500);
        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate request data
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);
        // Return errors if validation error occur.
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }

        // Try Catch Block Processing.

        try {

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images', $imageName);
            $newproduct = Product::create($request->post());
            $newproduct->imagefield()->create([
                'imagefield' => $imageName,
            ]);

            return response()->json([
                'message' => 'Product Created Successfully!!'
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something goes wrong while creating a product!!'
            ], 500);
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $product = Product::with('imagefield')->where('id', $id)->get();
        return new ProductResource($product);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something goes wrong while retriving the product!!'
            ], 500);
        }

        //$product = Product::with('imagefield')->where('id', $id)->get();
        //return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::find($id);
       // $oldimagepath = asset('public/images').$product->image;
        //$oldimagepath = Storage::path('public/images/').$product->imagefield->imagefield;
        $oldimagepath = 'public/images/'.$product->imagefield->imagefield;
        //return response()->json(['message'=>$oldimagepath]);

        // Validate request data
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|image'
        ]);
        // Return errors if validation error occur.
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }
        
       

        try{
            
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();            
            $request->image->storeAs('public/images', $imageName);            
            $product->update($request->post());
            $product->imagefield()->update([
               'imagefield' => $imageName,                
            ]);
            //Delete the Old Image
            Storage::delete($oldimagepath);

            return response()->json([
                'message'=>'Product UpdATED Successfully!!'
            ]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while updating the product!!'
            ],500);
        }







    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $product = Product::find($id);
            $oldimagepath = 'public/images/'.$product->imagefield->imagefield;
            $product->imagefield()->delete();
            //Delete the Old Image
            Storage::delete($oldimagepath);
            $product->delete();
            return response()->json([
                'message'=>'Product DELETED Successfully!!'
            ]);
            
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something goes wrong while deleting the product!!'
            ], 500);
        }

    }
}


//import React from 'react'
import React, { useEffect, useState } from "react";
import { NavLink, Link, useNavigate } from 'react-router-dom';
import axios from "../../axios";
import Table from 'react-bootstrap/Table';
import ButtonGroup from 'react-bootstrap/ButtonGroup';

function ShowProducts() {
  const showProductApi = "http://localhost/DUSTIDEV/myappdds/backendlaravel/public/api/products";

  const [products, setProducts] = useState([]);
  const [isLoading, setIsLoading] = useState(false);
  // const [error, setError] = useState(null);
  // const navigate = useNavigate();

  const handleDelete = async(id)=>{
    axios
      .delete(showProductApi.concat("/") + id)
      .then((res) => {
        getProducts();        
        
      })
      .catch((err) => {
        console.log(err);
      });

  }

  useEffect(() => {
    getProducts();
    
  }, [])
  


  const getProducts = ()=>{

    axios
      .get(showProductApi)
      .then((res) => {
        console.log(res.data.products);
        setProducts(res.data.products);
      })
      .catch((err) => {
        console.log(err);
      });


  }



  if (products.length < 0) {
    return <h1>no user found</h1>;
    
  } else {
    return (
      <>
      <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="float-start">
                  <h2>List of Available Products</h2>
              </div>
              <div class="float-end">
              <NavLink to="/products/create" className="btn btn-success">Add New Product</NavLink>                
              </div>
          </div>
      </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              <Table striped bordered hover>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name of Product</th>
                    <th>Description of Product</th>
                    <th>Image of Product</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  {products?.map((item, i) => {
                    return (
                      <tr key={i + 1}>
                        <td>{i + 1}</td>
                        <td>{item.name}</td>
                        <td>{item.description}</td>
                        <td>{item.image.imgfield}</td>
                        <td>
                          <ButtonGroup aria-label="Basic example">
                            <Link className="btn btn-primary btn-sm mx-2" to={`/products/edit/${item.id}`}>Edit </Link>
                            <Link className="btn btn-success btn-sm mx-2" to={`/user/${item.id}`}> Show </Link>
                            <Link className="btn btn-danger btn-sm mx-2" onClick={() => handleDelete(item.id)} > Delete </Link>
                          </ButtonGroup>

                        </td>
                      </tr>
                    );
                  })}

                </tbody>
              </Table>
            </div>
          </div>
        </div>
  
      <div>ShowProducts</div>
      
      
      
      
      </>
      
    )
    
  }

  
}

export default ShowProducts


//import React from 'react'
import React, { useState } from 'react'
import {useNavigate } from "react-router-dom";
import { NavLink } from 'react-router-dom';
import Loader from '../Common/Loader';
import Form from 'react-bootstrap/Form';
import Button from 'react-bootstrap/Button';
import Axios from 'axios';

function CreateProduct() {  
  const navigate = useNavigate();
  const [error, setError] = useState(null);
  const [isLoading, setIsLoading] = useState(false);
  const [name, setName] = useState("");
  const [description, setDescription] = useState(""); 
  const [selectedFile, setSelectedFile] = useState(null); 
  const api = Axios.create({
    baseURL: "http://localhost/DUSTIDEV/myappdds/backendlaravel/public/api/",
    headers: {
      "Content-Type": 'multipart/form-data',
      "Accept": "application/json",
      'Access-Control-Allow-Origin': '*',
    }
  });

  const handelSubmit = async (event) => {
    setIsLoading(true);
    event.preventDefault();     
    const formData = new FormData();
    formData.append("name", name);
    formData.append("description", description);
    formData.append("imgfield", selectedFile);
    
    

    try {
     
			const resp = await api.post('/products', formData);
      
			if (resp.status === 200) {
				//setLcUser(resp.data.user);
        navigate("/products");				
			}		

		} catch (err) {
      //console.log(err);

			if (err.response.status === 400) {
        setError(err.response.data.errors);				
			}
    }finally {
      setIsLoading(false);
      
    }

}


  return (
    <>
      <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Create New Product Products</h2>
            </div>
            <div class="float-end">
            <NavLink to="/products" className="btn btn-success">Back to Product List</NavLink>                
            </div>
        </div>
    </div>
      <div className='heading'>
        {isLoading && <Loader />}
        
      </div>

      <Form onSubmit={handelSubmit} >
        <Form.Group className="mb-3" controlId="formBasicEmail">
          <Form.Label>Name of Product</Form.Label>
          <Form.Control type="text" name="name" placeholder="Enter product Name"
            isInvalid={error && error.name ? true : false}
             onChange={(e) => setName(e.target.value)} />
          {error && error.name &&
            <Form.Control.Feedback type="invalid">
              {error.name}
            </Form.Control.Feedback>
          }
        </Form.Group>
        <Form.Group className="mb-3" controlId="formBasicEmail">
          <Form.Label>Description of Product</Form.Label>
          <Form.Control type="text" name="description" placeholder="Enter product Name"
            isInvalid={error && error.description ? true : false}
             onChange={(e) => setDescription(e.target.value)} />
          {error && error.description &&
            <Form.Control.Feedback type="invalid">
              {error.description}
            </Form.Control.Feedback>
          }
        </Form.Group>
        <Form.Group controlId="formFile" className="mb-3">
          <Form.Label>Select the Product Image</Form.Label>
          <Form.Control type="file" name="imgfield" onChange={(e) => setSelectedFile(e.target.files[0])}
            isInvalid={error && error.imgfield ? true : false} />
          {error && error.imgfield &&
            <Form.Control.Feedback type="invalid">
              {error.imgfield}
            </Form.Control.Feedback>
          }
        </Form.Group>
        <Button variant="primary" type="submit">
          Submit
        </Button>
      </Form>    
    
    </>
   
  )
}

export default CreateProduct



//import React from 'react'
import { NavLink, useParams, useNavigate } from 'react-router-dom';
import React, { useEffect, useState } from "react";
import Form from 'react-bootstrap/Form';
import Button from 'react-bootstrap/Button';
import Axios from 'axios';
import axios from '../../axios';


function EditProducts() {
  const [error, setError] = useState(null);
  const [isLoading, setIsLoading] = useState(false);
  const { id } = useParams();
  const navigate = useNavigate();
  const [name, setName] = useState("");
  const [description, setDescription] = useState("");
  const [oldimg, setOldimg] = useState(""); 
  const [selectedFile, setSelectedFile] = useState(null); 
  const api = Axios.create({
    baseURL: "http://localhost/DUSTIDEV/myappdds/backendlaravel/public/api/",
    headers: {
      "Content-Type": 'multipart/form-data',
      "Accept": "application/json",
      'Access-Control-Allow-Origin': '*',
    }
  });
  const getProductApi = "http://localhost/DUSTIDEV/myappdds/backendlaravel/public/api/products";
  const getImageUrl = "http://localhost/DUSTIDEV/myappdds/backendlaravel/public/storage/images/";
  

  
  const handelSubmit = async (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append("name", name);
    formData.append("description", description);
    formData.append("imgfield", selectedFile);
    formData.append('_method', 'PUT');
    console.log(formData);

    try {

			const resp = await api.post('/products/'+id, formData);
      
			if (resp.status === 200) {
				//setLcUser(resp.data.user);
        navigate("/products");				
			}		

		} catch (err) {
      //console.log(err);

			if (err.response.status === 400) {
        setError(err.response.data.errors);				
			}
    }finally {
      setIsLoading(false);
      
    }  


  }


  useEffect(() => {
    getProduct();
  }, []);


  const getProduct = async () => {
    axios
      .get(getProductApi.concat("/") + id)
      .then((item) => {             
        setName(item.data.product[0]['name']);
        setDescription(item.data.product[0]['description']);
        setOldimg(item.data.product[0]['image']['imgfield']);
        //console.log(product);
      })
      .catch((err) => {
        console.log(err);
      });
  }





  return (
    <>
    <div className="row">
        <div className="col-lg-12 margin-tb">
            <div className="float-start">
                <h2>Edit the Product Products </h2>
            </div>
            <div className="float-end">
            <NavLink to="/products" className="btn btn-success">Back to Product List</NavLink>                
            </div>
        </div>
    </div>
    <Form onSubmit={handelSubmit} >
        <Form.Group className="mb-3" >
          <Form.Label>Name of Product</Form.Label>
          <Form.Control type="text" name="name" placeholder="Enter product Name"
            isInvalid={error && error.name ? true : false}
             value = {name} onChange={(e) => setName(e.target.value)} />
          {error && error.name &&
            <Form.Control.Feedback type="invalid">
              {error.name}
            </Form.Control.Feedback>
          }
        </Form.Group>
        <Form.Group className="mb-3" >
          <Form.Label>Description of Product</Form.Label>
          <Form.Control type="text" name="description" placeholder="Enter product Name"
            isInvalid={error && error.description ? true : false}
             value = {description} onChange={(e) => setDescription(e.target.value)} />
          {error && error.description &&
            <Form.Control.Feedback type="invalid">
              {error.description}
            </Form.Control.Feedback>
          }
        </Form.Group>
        <Form.Group controlId="formFile" className="mb-3">
          
          <Form.Label>Select the Product Image</Form.Label>
          <img 
            src={getImageUrl+oldimg} 
            alt="Edit" 
            className="object-cover" />
          <Form.Control type="file" name="imgfield" onChange={(e) => setSelectedFile(e.target.files[0])}
            isInvalid={error && error.imgfield ? true : false} />
          {error && error.imgfield &&
            <Form.Control.Feedback type="invalid">
              {error.imgfield}
            </Form.Control.Feedback>
          }
        </Form.Group>
        <Button variant="primary" type="submit">
          Submit
        </Button>
      </Form>    

<div>EditProducts</div>
    
    
    </>
    
  )
}

export default EditProducts




php artisan make:model Company -m

$table->id();
$table->string('name');
$table->string('email');
$table->string('address')->nullable();
$table->string('website')->nullable();
$table->timestamps();
			
protected $fillable = ['name', 'email', 'address', 'website'];

php artisan make:controller Api/CompanyController --resource --api --model=Company

php artisan make:resource CompanyResource

php artisan make:request CompanyRequest


//STORE AND RETRIVE IMAGE

$request->image->storeAs('public/images', $imageName);
<img src="{{ asset('storage/images/siteassetimages/' . $assetimage->image_path) }}" 
                        alt="Bootstrap" width="100" height="100">
						
// GET PHP VARIABLE IN LAYOUT file
<?php
use App\Models\SiteAssetImage;
$assetimage = SiteAssetImage::find(1)->first();
?>






$(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                function fetchEmployees() {

                    var table = $('.data-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('employees.index') }}",
                        columns: [{
                                data: 'DT_RowIndex',
                                name: 'DT_RowIndex'
                            },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'detail',
                                name: 'detail'
                            },
                            {
                                data: 'action',
                                name: 'action',
                                orderable: false,
                                searchable: false
                            },
                        ]
                    });

                }



            });
			
			
			
			
			
			
			
			$(function() {
    fetchAllProducts();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function fetchAllProducts() {

    alert("Hi");

}



});


          
         npm i sass@1.77.6 --save-exact
		 
		 $result = Post::query();

if (!empty($text)) {
    $result = $result->where('text', 'like', '%'.$text.'%');
}

if (!empty($date)) {
    $result = $result->whereDate('created_at', \Carbon\Carbon::parse($date));
}

if (!empty($category)) {
    $result = $result->where('category', $category);
}

if (!empty($city)) {
    $result = $result->where('city', 'like', '%'.$city.'%');
}

$result = $result->get();




You have two options:

OR using orWhere() :

Model::query()->where([])->orWhere([])->get();
AND using 2nd array :

Model::query()->where([['column1' , '!=' , 'value1'] , ['column2' , '=' , 'value2'] , ['column3' , '<' , 'value3']])->get();
		 
		 
		 
		 
		 






***/
