<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use Validator;
use Illuminate\Support\Facades\Input;
use App\model\admin\Attribute_group;
use Session;

class AttributegroupController extends Controller
{
    public function manageAttributegroup(){
        $groups = new Attribute_group;
        $attribute_groups = Attribute_group::get();
        //dd(json_decode($attribute_groups));
        return view('admin.attributegroup')->with(compact('attribute_groups'));
    }
    public function addAttributegroup(Request $request){
        $group = $request->all();
        
        $rules = array(
            'attribute_group_name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else{
        $data = new Attribute_group;
        $data->attribute_group_name = $group['attribute_group_name'];
        $data->save();
        return response()->json($data);
        }
        //return redirect()->route('admin.manage-attribute-group')->with('flash_message','Group Added Successfully');

    }
    Public function editAttributegroup(Request $request){
        $group = Attribute_group::find($request->attribute_group_id);
        $group->attribute_group_name = $request->attribute_group_name;
        $group->save();
        $group->sn = $request->sn;
        return response()->json($group);
    }
    Public function deleteAttributegroup(Request $request){
        //dd($request->all());
        $group = Attribute_group::find($request->attribute_group_id)->delete();
        return response()->json($group);
    }
    //
}
