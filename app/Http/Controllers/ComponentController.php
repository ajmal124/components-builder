<?php

namespace App\Http\Controllers;

use App\Models\type;
use App\Models\Component;
use Illuminate\Http\Request;

class ComponentController extends Controller

{

  public function home(){
    $types=type::all();
    return view('home',[
      'types'=>$types,
    ]);
  }

   public function index($id)
   {
    // dd('htmlcode'=>$component);
     $components= Component::where('type_id', $id)->get();
     return view('display',[
      'components'=>$components,
      

     ]);
   }

   public function View($id)
   {
    // dd('htmlcode'=>$component);
     $components= Component::where('type_id', $id)->get();
     return view('viewItems',[
      'components'=>$components,
      

     ]);
   }


   public function store(Request $request)
    {
      $jscode=null;
      if(strlen($request->jscode)>0){
        $jscode=$request->jscode;
       }
      //   dd($request->type);
       $component= Component::create([
        'htmlcode'=> $request->htmlcode,
        'jscode'=>$jscode,
        'type_id'=> $request->type
        
        
       ]);

       

       return redirect('/');

}
public function typestore(Request $request)
    {
      // dd($request->type);
       $type= type::create([
        'typename'=> $request->text
       ]);
       return redirect('/insert');

}

public function typeupdate($id)
    {
      // dd($request->type);
       return view('typeUpdate',[
        'id'=>$id,
       ]);

}

public function save(Request $request, $id){

  $type = type::find($id);
 
  $type->typename=$request->name;
   
  $type->save();

  return redirect('/');

}

public function updateitem(Request $request, $id){

  $component = component::find($id);
 
  $component->htmlcode=$request->htmlcode;
  $component->jscode=$request->jscode;
   
  $component->save();

  return redirect('/viewItems/'.$component->type_id);

}

public function deleteitem($id){

  $delete = Component::find($id);
 
  $delete->delete();

  return redirect('/viewItems/'.$delete->type_id);

}

public function deletetype($id){

  $delete = type::find($id);
 
  $delete->delete();

  return redirect('/');

}

public function typedisp()
{
  $type= type::all();
  return view('insert',[
   'typename'=>$type
  ]);
}

    public function fetch()
    {
        $type = type::all();
        return $type;
    }

    public function itemType(){
      $types=type::all();
      return view('itemType',[
        'types'=>$types,
      ]);
    }
    
    public function saveitem($id)
    {
      // dd($request->type);
       return view('itemUpdate',[
        'id'=>$id,
       ]);
    
    }
    
}

