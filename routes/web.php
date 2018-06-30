<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/
use App\Product;

// Route::get('/', function () {
//     // factory('App\Product', 20)->create();
//     // dd(\App\Category::first()->product()->get());
//     // return str_slug('How to work with laravel', '+');
//     return view('welcome');
// });

// Route::get('/blog/{slug}', function ($slug) {
//     dd($slug);
// })->name('blog');


Route::get('/product/create', 'ProductController@create');
Route::get('/product/edit/{product}', 'ProductController@edit');
Route::put('/product/update/{product}', 'ProductController@update')->name('product_update');
Route::post('/product', 'ProductController@store')->name('product_store');
// Route::get('/post/{post}', 'PostController@show');
// route('product_store') lienApplication/product POST

// Route::view('/', 'welcome');

// Route::view('/', 'welcome', [ 'product' => Product::first()]);

// Route::get('/', 'HomeController@index');

// Route::post('/', 'HomeController@index');

// Route::put('/', 'HomeController@index');
// Route::patch('/', 'HomeController@index');

// Route::delete('/', 'HomeController@index');

// Route::any('/', 'HomeController@index');

// Route::resource('/', 'HomeController');

// Route::resource('/product','ProductController');

// Route::apiresource('/', 'HomeController');

// Route::group(['prefix' => 'home'], function () {
//     Route::get('/', function () {
//         return 'index product';
//     });
//     Route::get('/homecreate', function () {
//         return 'create';
//     });
// })->middleware('auth');


// Working on UI For Product CRUD

/*
|--------------------------------------------------------------------------
| CRUD
|--------------------------------------------------------------------------
*/
//Create - Read - Update - Delete

// Example Of Products
// Product => 'name' , 'price' , 'category_id' , 'description'
// Category => 'name'


//Each Product has one category
//Each Category has many products

// Route::get('/product/{product}', function (\App\Product $product) {
    // $product = \App\Product::findorFail($productID);
    // abort(404);
    // dd($example, $category);
    // dd('in');
    // return $product;
// });



/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

//Store Method with validation

// $product->create([
//     'name' => 'ProductName',
//     'price' => 100000,
//     'description' => 'Product Description'
// ]);

// tap(new Product)->create([
//     'name' => 'ProductName',
//     'price' => 100000,
//     'description' => 'Product Description'
// ]);

// tap(new Product,function($product) {
//     $product->create([
//         'name' => 'ProductName',
//         'price' => 100000,
//         'description' => 'Product Description'
//     ]);
// });

// tap(new Product,function($product) {
//     $product->name = 'Product Name';
//     $product->price = 100000;
//     $product->description = 'Product Description';

//     $product->save();
// });


//Show Method

//Update Method with validation

//Delete method



/*
|--------------------------------------------------------------------------
| Models
|--------------------------------------------------------------------------
*/

//php artisan make:model ModelName
// -m migration
// -c controller
// -r ressource controller
// -f factory
// -a all above

//Get Parameters

//custom toArray

//change the route key

//appends new parameters

//Queries

//->toSql()

//get product with price is 2000
//get product with price is between 1000 - 2000




/*
|--------------------------------------------------------------------------
| Migrations
|--------------------------------------------------------------------------
*/

//Migrate

//Fresh migration





/*
|--------------------------------------------------------------------------
| Collections
|--------------------------------------------------------------------------
*/

Route::get('contains_collection', function () {
    $collection = collect(['name' => 'John', 'age' => 23]);
    $array = collect(['john','laravel','doe']);
    // dd($array->contains('laravel'));
    dd($collection->contains('John'));
});

Route::get('count_collection', function () {
    $collection = collect([1,2,3,4,5,6]);

    
    return $collection->count();
});

Route::get('diff_collection', function () {
    $collection = collect([1, 2, 3, 4, 5]);
    $array = [1, 4, 2, 8];

    $diff = $collection->diff($array);
    
    return $diff->all();
});


Route::get('sum_collection', function () {
    $collection = collect([1, 2, 3, 4, 5]);

    return $collection->sum();
});

Route::get('sum_collection1', function () {
    return collect([
            ['product_id' => 1, 'price' => 100],
            ['product_id' => 2, 'price' => 200],
            ['product_id' => 3, 'price' => 400],
        ])->sum('price');
});


Route::get('every_collection', function () {
    $collection = collect([1, 2, 3, 4])->every(function ($value, $key) {
        return $value > 0;
    });
    dd($collection);
});


Route::get('except_collection', function () {
    return collect(['product_id' => 1, 'price' => 100, 'discount' => false])->except(['price']);
});


Route::get('only_collection', function () {
    return collect(['product_id' => 1, 'price' => 100, 'discount' => false])->only(['price']);
});

Route::get('forget_collection', function () {
    return collect(['product_id' => 1, 'price' => 100, 'discount' => false])->forget(['price']);
});


Route::get('map_collection', function () {
    return collect(['john','doe','taylor','mohamed'])->map(function ($name) {
        return ucfirst($name);
    });
});

Route::get('filter_collection', function () {
    return collect([
            ['name' => 'John','age' => 16],
            ['name' => 'Doe','age' => 10],
            ['name' => 'Mohamed','age' => 23],
            ['name' => 'Someone','age' => 25]
        ])
        ->filter(function ($value, $key) {
            return $value['age'] > 20;
        });
});


Route::get('filter_collection', function () {
    return collect([
            ['name' => 'John','age' => 16],
            ['name' => 'Doe','age' => 10],
            ['name' => 'Mohamed','age' => 23],
            ['name' => 'Someone','age' => 25]
        ])
        ->filter(function ($value, $key) {
            return $value['age'] > 20;
        });
});

Route::get('reject_collection', function () {
    return collect(['Taylor','Mohamed','John',null])->reject(function ($name) {
        return empty($name);
    })->map(function ($value, $key) {
        return "Mr .{$value}";
    });
});



/*
|--------------------------------------------------------------------------
| Resources
|--------------------------------------------------------------------------
*/

use App\Http\Resources\Product as ProductResource;

Route::get('/product', function () {
    //Create Products
    return new ProductResource(Product::first());
});

//Get Collection with Product Resource
Route::get('/resource_collection', function () {
    return ProductResource::collection(Product::all());
});


//Get Collection of Product

use App\Http\Resources\ProductCollection;

Route::get('/product_collection', function () {
    return new ProductCollection(Product::all());
});


//Custom Wrapping
Route::get('/custom-wrap', function () {
    ProductResource::$wrap = "json";
    
    return new ProductCollection(Product::all());
});

//No Wrapping
Route::get('/no-wrap', function () {
    ProductResource::withoutWrapping();
    return new ProductCollection(Product::all());
});

/*
|--------------------------------------------------------------------------
| Blade/Vuejs
|--------------------------------------------------------------------------
*/
























// ---------------------------------- Macros

use Illuminate\Database\Query\Builder;

Builder::macro('price', function ($min, $max) {
    $this->where('price', '>=', $min)->where('price', '<=', $max);
    return $this;
});

Builder::macro('oldest', function ($column) {
    $this->orderBy($column, 'asc');
    return $this;
});
