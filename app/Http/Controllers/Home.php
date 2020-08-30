<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

use DB;
use Validator;
use Session;


class Home extends Controller
{
    //Get Product List
	
	public function index(Request $request){
		
		$data["productsList"] = Products::orderBy("id","ASC")->paginate(20);
		
		
		return view('welcome')->with($data);
		
	}
	
	// Add Product
	
	public function addProducts(Request $request){
		
		$data["editID"] = false;
		return view('addProduct')->with($data);
		
	}
	
	// Save Product Data
	
	public function saveProductData(Request $request){
		
		$validator = Validator::make($request->all(), [
						"name"    => "required",
						"code"  => 'required',
					]);
		
		if($validator->fails()){  
			
			return back()->with('success',$validator->getMessageBag());
		}else {
			
			$name = $request->input("name");
			$code = $request->input("code");
			
			$editid = $request->input("editid");
			
			// update Product data
			if(!empty($editid)){
				
				$data = array("name"=>$name,"code"=>$code);
				$upda_data = Products::where('id', $editid)->update($data);
					
				return back()->with('success','You have successfully updated Product data.');
				
			}else{
				
				// insert Product Data
				$data = array("name"=>$name,"code"=>$code);
				$inserted_data = Products::insert($data);
				
				return back()->with('success','You have successfully added Product.');
				
				
				
			}
			
		}
	
		
	}
	
	
	
	// Delete Product List
	
	public function deleteProduct(Request $request){
		
		$id = $request->input("id");
		if(!empty($id)){
			
			$res = Products::where('id', $id)->delete();
			
			if($res == TRUE){
				echo 1;
				
			}else{
				echo 2;
			}
		}else{
			echo 3;
		}
		
	}
	
	
	// Edit Product info
	
	public function editProduct(Request $request,$id){
		
		
		$data["productsList"] = Products::where("id","=",$id)->first();
		$data["editID"] = $id;
		
		return view('addProduct')->with($data);
		
	}
	
	
	 //Get Product List For API
	
	public function getProductsList(Request $request){
		
		$productsList = Products::orderBy("id","ASC")->get();
		$codesList = array();
		if(count($productsList) > 0){
			foreach($productsList as $res){
				$codesList[] = $res->code;
				// increment count 
				Products::where('id','=',$res->id)->increment('count', 1);
				//Products::where('id', $res->id)->update(['count' => DB::raw('count + 1')]);
			}
		}
		
		return response()->json(['codesList' => $codesList],200);
		
		
	}
	
	// Scan product code API
	
	public function scanProductCode(Request $request){
		
		
		$validator = Validator::make($request->all(), [
						"product_code"    => "required",
						
					]);
		
		if($validator->fails()){  
			return response()->json(['message' => "Product code is required"],200);
		}else{
			
			$code = $request->input("product_code");
			// check product code exist or not in product table
			$result = Products::where('code', $code)->get();
			if(count($result)> 0){
				foreach($result as $res){
					
					// increment count 
					Products::where('id','=',$res->id)->increment('count', 1);
				}
				return response()->json(['message' => "User scaned Product"],200);
			}else{
				return response()->json(['message' => "Product code not found"],200);
			}
		}
	
		
	}
	
	

	
}
