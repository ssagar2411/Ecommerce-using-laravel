<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Menu;
use App\model\admin\Category;

class MenuController extends Controller
{
    public function manageMenu(){
        $categories = Category::get();
        $menus = Menu::get();
        // // dd($menus);
        foreach($menus as $menu){
            $result = Category::descendantsAndSelf($menu->category_id)->toTree()->first();
            foreach($result->children as $child){
                dd($child);
            }
            // dd($result);
        }
        $menuPrinter=new MenuPrinterController($menus);
        return view('admin.managemenu')->with(compact('categories','menuPrinter'));
    }
    


    public function addMenu(Request $request){
        $data = $request->all();
        // dd($data);
        // $result = Category::descendantsAndSelf($data['category_id'])->toTree()->first();
        // dd($result->children);
        $menu = new Menu;
        $menu->menu_name = $data['menu_name'];
        $menu->category_id = $data['category_id'];
        $menu->save();
        return redirect()->back();
    }
}
