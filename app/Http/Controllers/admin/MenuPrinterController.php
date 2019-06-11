<?php

namespace App\Http\Controllers\admin;

use App\model\admin\Menu;
use App\model\admin\Category;

class MenuPrinterController 
{
    private $menus;
    public function __construct($menus){
        $this->menus=$menus;
    }
    function hasChild($menuCategory){
        return Category::where('parent_id',$menuCategory->id)->count()>0;
    }
    function getChild($menuCategory){
        return Category::where('parent_id',$menuCategory->id)->get();
    }
    public function buildMenu(){
        foreach ($this->menus as  $menu) {
            $name="";
            $cat= Category::where('cat_id',$menu->category_id)->first();            
            if($menu->menu_name==null || $menu->menu_name==""){
                $name=$cat->cat_name;
            }else{
                $name=$menu->menu_name;
            }
           
            if($this->hasChild($cat)){
                echo  '<li class="nav-item dropdown position-static" >';
                echo  '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                echo  $name . $cat->cat_id;
                echo  "</a>";
                echo  '<div class="dropdown-menu pos-absolute-md" style="width: 100%;min-height:calc(100vh - 70px);min-width: 100%;position:absolute;left:0px;border:none;border-radius:0px;border-top:#4657B8 1px solid;padding:10px 5%;background:white;"  aria-labelledby="navbarDropdownMenuLink"><div class="row">';
                foreach ($cat->descendants as $childcat) {
                    echo  "<div class='col-md-3 col-sm-12'>";
                    if($this->hasChild($childcat)){
                       
                        echo  '<a style="margin:0px;padding:0px;font-size:20px;font-weight:bold;color:#EE5F73;;" href="/category/'.$childcat->cat_id.'/">';
                        echo   $childcat->cat_name;
                        echo  '</a>';
                        echo  "<div style='height:0px;background-color:#000000;'></div>";
                        foreach ($childcat->descendants as $childchildcat) {
                        echo  '<a style="margin: 0px;padding:0px;color:#000000;" href="/category/'.$childchildcat->cat_id.'/">';
                        echo   $childchildcat->cat_name;
                        echo  '</a><br>';
                            
                        }
                    }else{
                        
                        echo  '<a style="margin:0px; padding:0px;font-size:20px;font-weight:bold;color:#EE5F73;;" href="/category/'.$childcat->cat_id.'/">';
                        echo   $childcat->cat_name .$childcat->id;
                        echo  '</a>';
                        
                    }
                    echo  "</div>";
                }
                echo  "</div></div></li>";
            }else{
                echo  '<li class="nav-item">';
                echo  '<a class="nav-link" href="/category/'.$cat->id.'/">';
                echo   $name;
                echo  '</a>';
                echo  '</li>';
            }

        }

    }
}

//
