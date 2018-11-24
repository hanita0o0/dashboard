<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Http\Requests\EditTypeRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Type;
use App\Photo;
use Image;

class TypeController extends Controller
{
    //
    public function index(){
    $types=Type::all();
    return view('Type.index',compact('types'));
    }
    public function create(){
        return view('Type.create');
    }

     public function edit($id){
         $type=Type::findOrFail($id);
        return view('Type.edit',compact('type'));
     }
     public function update(EditTypeRequest $request,$id){
        $type=Type::find($id);
        $input=$request->all();

        // $file=$request->file('photo_id');
         if ($request->hasFile('photo_id')) {
             //todo:have to delete the last avatar

             $input['photo_id']= $this->updateAvatar($request, $type);
         }
//

         $type->update($input);
         Session::flash('update_type','نوع آپدیت شد');
         return redirect('types');
//         return $type;
     }
    public function updateAvatar($input, $type)
    {


        if ($id = $type->photo_id) {
            $photo = Photo::find($id);
            $file_name = $photo->path;

            $path_thumbnail = config('constant.path_type_avatar'). $file_name;

            unlink($path_thumbnail);
            $photo->delete();
        }
        if ($file = $input->photo_id) {
            $file_name = time() . '.' . $file->getClientOriginalName();

            $path_thumbnail = config('constant.path_type_avatar'). $file_name;

            Image::make($file)->fit(250, 250)->save($path_thumbnail);
            $photo = Photo::create(['path' => $file_name]);
            return $photo->id;
        } else {
            return null;
        }


    }
     public function show($id){

         $type=Type::findOrFail($id);
        // return $type;
         return view('Type.show',compact('type'));
     }
    public function store(TypeRequest $request){
        $input=$request->all();
        $type=new Type;
        $type->name=$input['name'];
        $type->description=$input['description'];
        $file=$request->file('photo_id');
        if($file){
            $file_name = time() . '.' . $file->getClientOriginalName();

            $path_thumbnail = config('constant.path_type_avatar'). $file_name;

            Image::make($file)->fit(250, 250)->save($path_thumbnail);


            $photo=new Photo;
            $photo->path=$file_name;
            $photo->save();
            $input['photo_id']= $photo->id;
            $type->photo_id = $input['photo_id'];
        }

        $type->save();
        return redirect('types');
    }
    public function destroy($id){
        $type=Type::findOrFail($id);
        //delete photo of previous photo
        if ($id = $type->photo_id) {
            $photo = Photo::find($id);
            $file_name = $photo->path;

            $path_thumbnail = config('constant.path_type_avatar'). $file_name;

            unlink($path_thumbnail);
            $photo->delete();
        }
        $types= $type->events;
      foreach($types as $item){
          $item->pivot->delete();
      }
        $type->delete();
        return redirect('types');
    }
}
