<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\asset;
use App\Models\image;
use App\Models\category;
use Illuminate\Support\Facades\DB;


class assetcate extends Controller
{
    //inserting data in db assets
    /* with validation*/
    public function insert(Request $req)
    {
        //return"shdygdy";
        $validationasset = $req->validate([
        'title' =>'required|max:200|unique:assets',
        'description' =>'required|max:500'
        ]);
        if($validationasset)
        {
            //return "jsdusgdusgd";
            $title = $req->title;
            $description = $req->description;

            $data = new asset();
            $data->title = $title;
            $data->description = $description;

            if($data->save())
            {
                return back()->with('msg','successfully added');
            }
            else
            {
                return back()->with('err','uploading error');
            }
        }
    }
   //showing data in tables
    public function showass()
    {
        $data = asset::paginate(2);
         //return $data;
        return view('showass',compact('data'));
       //print_r($data);
    }
    //edit table in assets table
    public function editass($id)
    {
        $data = asset::all()->where('id',$id)->first();
        return view('editass',compact('data'));
    }
    //deleting data from assets table
    public function del($id)
    {
    $data = asset::find($id)->delete();
    return redirect('/showass');
    }
    //updating data in assets table
    public function update(Request $req)
    {
     $validateass = $req->validate([
        'title'=>'required',
        'description'=>'required',
     ]);
     if($validateass)
     {
       $data= asset::where('id',$req->pid)->update([
       'title'=>$req->title,
       'description'=>$req->description,
         ]);
     }
         return redirect('/showass');
     }
    //showing category table
     public function addcate()
     {
          $data = asset::all();
          return view('addcate',compact('data'));
     }
     //inserting data in category table
     /*validation*/
     public function insertcate(Request $req)
     {
         $validatecate = $req->validate([
            'name' => 'required|max:200',
            'category' =>'required',
            'status' => 'required',
            'image'=>'required|mimes:jpg,png,jpeg'
         ]);
         if($validatecate){
            $category = $req->category;
            $code=rand(1000000000000000,9999999999999999);
            $status = $req->status;
            $name = $req->name;
            $filename="Image-".time().".".$req->image->extension();
            if($req->image->move(public_path('uploads'),$filename))
            {
                $product = new category();
                $product->Aid =$category;
                $product->name = $name;
                $product->code = $code;
                $product->type = $category;
                $product->status = $status;
                $product->image = $filename;
  
                if($product->save())
                {
                    return back()->with('err','successfully inserted data');
                }
                else{
                    return back()->with('err','somwthing went wrong');
                }
  
            }
            else{
                return back()->with('err','something went wrong');
            }
        }
    }
    //showing tables
     public function showcate()
     {
         $data = category::paginate(2);
         return view('showcate',compact('data'));
     }
    // deleting category data 
     public function delcate($id)
     {
        $data = category::where('id',$id)->delete();
        return redirect('/showcate');
     }
    //edit table category
     public function editcate($id)
     {
         $ass = asset::all();
         $data = category::all()->where('id',$id)->first();
         return view('editcate',compact('data','ass'));
     }
    //update category table
     public function updatecate(Request $req)
     {
         $filename = $req->file('image');//if want to update file then
        if($filename)
           {
            $filename="Image-".time().".".$req->image->extension();
             if($req->image->move(public_path('uploads'),$filename))
            {
                $data= category::where('id',$req->uid)->update([
                'name'=>$req->name,
                'status'=>$req->status,
                 // 'category'=>$req->category,
                'image'=>$filename
                 ]);
             }
                return redirect('/showcate');
             }
            else{
               $data= category::where('id',$req->uid)->update([ 
                   'name'=>$req->name,
                   'status'=>$req->status,
                   //'category'=>$req->category,
                   ]);
            }
            return redirect('/showcate');
        }
    //uploads images
      public function uploads($id)
     {
      $data = category::where('id',$id)->first();
      return view('uploads',compact('data'));
     }
    //uploading images
    public function insertimg(Request $req){
        if ($req->hasfile('image')) {
            $images = $req->file('image');
            foreach($images as $i) {
                $name = rand().$i->getClientOriginalName();
                $i->move(public_path('uploads/'), $name);
                   image::insert([
                    'image'=>$name,
                    'category_id'=>$req->uid,
                ]);
            }
        }
        return redirect('/showcate');
        }
     
    //showing image page
    public function showimg($id)
    {
    $image = category::find($id)->images;//classs name
    return view('showimg',compact('image'));
    } 
}   


