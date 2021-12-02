<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
          '/',
        //   'product_details',
        //   'products',
        //   'login_register',
        //   'search',
        //   'add_to_cart',
        //   'add_to_wishlist',
        //   'about',
          'api/products',
          'api/products_details'
          
    ];
}
