<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalog = $this->getCatalog();

        return view('catalog.index', [
            'catalog' => $catalog
        ]);
    }

    public function show($id)
    {
        $catalogItem = $this->getCatalogItemById($id);

        return view('catalog.show', [
            'catalogItem' => $catalogItem[0]
        ]);
    }
}
