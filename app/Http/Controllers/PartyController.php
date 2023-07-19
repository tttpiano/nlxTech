<?php

namespace App\Http\Controllers;

class PartyController extends Controller
{
    //------------------------------ Category_child -----------------------------
    public function indexCategory_child(){
        $pageTitle = "Category_child";
        return view('front/admins/party/category_child', ['pageTitle' => $pageTitle]);
    }
    public function addCategory_child(){
        $pageTitle = "ADD_Category_child";
        return view('front/admins/party/category_child_add', ['pageTitle' => $pageTitle]);
    }
    public function editCategory_child(){
        $pageTitle = "EDIT_Category_child";
        return view('front/admins/party/category_child_edit', ['pageTitle' => $pageTitle]);
    }



    //------------------------------ Brand -----------------------------
    public function indexBrand(){
        $pageTitle = "Brand";
        return view('front/admins/party/brand', ['pageTitle' => $pageTitle]);
    }
    public function addBrand(){
        $pageTitle = "";
        return view('front/admins/party/brand_add', ['pageTitle' => $pageTitle]);
    }
    public function editBrand(){
        $pageTitle = "";
        return view('front/admins/party/brand_edit', ['pageTitle' => $pageTitle]);
    }

    //------------------------------ Wattage -----------------------------
    public function indexWattage(){
        $pageTitle = "";
        return view('front/admins/party/wattage', ['pageTitle' => $pageTitle]);
    }
    public function addWattage(){
        $pageTitle = "";
        return view('front/admins/party/wattage_add', ['pageTitle' => $pageTitle]);
    }
    public function editWattage(){
        $pageTitle = "";
        return view('front/admins/party/wattage_edit', ['pageTitle' => $pageTitle]);
    }

    //------------------------------ Category -----------------------------

    public function indexCategory(){
        $pageTitle = "";
        return view('front/admins/party/category', ['pageTitle' => $pageTitle]);
    }
    public function addCategory(){
        $pageTitle = "";
        return view('front/admins/party/category_add', ['pageTitle' => $pageTitle]);
    }
    public function editCategory(){
        $pageTitle = "";
        return view('front/admins/party/category_edit', ['pageTitle' => $pageTitle]);
    }


}
