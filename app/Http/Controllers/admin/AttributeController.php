<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Attribute;
use Response;
use App\model\admin\Attribute_group;

class AttributeController extends Controller
{
    public function addAttribute(Request $request){
        $attribute = $request->all();
        // dd($attribute);
        $data = new Attribute;
        $data->attribute_group_id = $attribute['attribute_group'];
        $data->attribute_name = $attribute['attribute_name'];
        $data->attribute_status = $attribute['attribute_status'];
        $attribute_group = Attribute_group::find($attribute['attribute_group']);
        $attribute_group_name = $attribute_group->attribute_group_name;
        $data->save();
        $data->attribute_group_name = $attribute_group_name;
        if($attribute['attribute_status'] == 0 ){
            $attributestatus = "Inactive";
        }else{
            $attributestatus = "Active";
        }
        $data->attribute_status_name = $attributestatus;
        return response()->json($data);

    }

    public function manageAttribute(){
        $attribute_groups = Attribute_group::get();
        $attributes = Attribute::get();
        //dd($attributes);
        /*$groupdropdown = "<option disabled>Select Attribute Group</option>";
        foreach($attribute_groups as $attribute_group){
            $groupdropdown.="<option value='".$attribute_group->attribute_group_id."'>".$attribute_group->attribute_group_name."</option>";
        }
        print_r($groupdropdown); die;*/
        foreach($attributes as $attribute){
            $attributeid = $attribute->attribute_group_id;
            $attributegroup = Attribute_group::find($attributeid);
            $attribute_group_name = $attributegroup->attribute_group_name;
            $attribute->attribute_group_name = $attribute_group_name;
            if($attribute->attribute_status == 0 ){
                $attribute->statusname = "InActive";
            }else{
                $attribute->statusname = "Active";
            }
        }
        //dd($attributes);
        return view('admin.manageattribute')->with(compact('attributes','attribute_groups'));
    }

    public function deleteAttribute(Request $request){
        $data = Attribute::find($request->attribute_id)->delete();
       return response()->json($data);
    }

    public function editAttribute(Request $request){
        // dd($request->all());
        $data = Attribute::find($request->attribute_id);
        $data->attribute_name = $request->attribute_name;
        $data->attribute_group_id = $request->attribute_group;
        $data->attribute_status = $request->attribute_status;
        $data->save();
        $data->sn = $request->sn;
        $attribute_group = Attribute_group::find($request['attribute_group']);
        $attribute_group_name = $attribute_group->attribute_group_name;
        $data->attribute_group_name = $attribute_group_name;
        if($request['attribute_status'] == 0 ){
            $attributestatus = "Inactive";
        }else{
            $attributestatus = "Active";
        }
        $data->attribute_status_name = $attributestatus;
        return response()->json($data);
    }
}
