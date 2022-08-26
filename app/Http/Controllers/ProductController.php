<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Validator; //Class ใช้ตรวจสอบข้อมูลในฟอร์ม
use Image; // ไลบรารี่ สำหรับจัดการรูปภาพ

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // อ่านข้อมูลสินค้า
        $products = Product::orderBy('id','desc')->limit(50)->get();
        // $products = Product::orderBy('id','desc')->paginate(25);
        return view('backend.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";

        // สร้างกฏสำหรับการตรวจสอบ
        $rules = [
            'prd_name' => 'required',
            'prd_slug' => 'required',
            'prd_description' => 'required',
            'prd_price' => 'required|numeric',
        ];

        $messages = [
            'required' => 'ฟิลด์ :attribute นี้จำเป็น',
            'numeric' => 'ฟิลด์นี้ต้องเป็นตัวเลขเท่านั้น'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){ // ตรวจสอบฟอร์มยังไม่ผ่าน
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $data_product = array(
                'name' => $request->prd_name,
                'slug' => $request->prd_slug,
                'description' => $request->prd_description,
                'price' => $request->prd_price,
                //'image' => "https://via.placeholder.com/800x600.png/008876?text=samsung"
            );
    
            // การอัพโหลด images

            try{
                //ขนาดไฟล์ ชื่อของไฟล์ และ นามสกุลไฟล์ ที่ต้องตรวจสอบ 
                //1.รับค่ารูป
                $image =$request-> file('prd_image');
                
                //ตรวจสอบว่าต้องมีไฟล์ภาพส่งมา
                if(!empty($image)){
                    //กำหนดชื่อไฟล์ให้ซ้ำกัน
                    $file_name="product_".$request->prd_name.time(). ".".
                    $image ->getClientOriginalExtension();
                    
                    // เช็คนามสกุลไฟล์
                    if($image ->getClientOriginalExtension()=="jpg" or 
                    $image ->getClientOriginalExtension()=="png" or
                    $image ->getClientOriginalExtension()=="JPEG"){

                        // resize รูป
                        $imgwidth =300; //ขนาดของรูป (ความกว้างจากการ crop)
                        $folderupload = 'assets/backend/images/products';
                      
                        //รวมพาธกับชื่อไฟล์ภาพที่ตั้ง
                        $path = $folderupload."/".$file_name;

                        //upload to folder
                        $img = Image::make($image->getRealPath());

                        if ($img->width() > $imgwidth) {
                            $img->resize($imgwidth, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                        }

                        $img->save($path);
                        $data_product['image'] = $file_name;
                        
                    }else{
                        
                        return redirect()->back()->withErrors($validator)->withInput()->with('status','<div class="alert alert-danger">ไฟล์ภาพไม่รองรับ อนุญาตเฉพาะ .jpg และ .png</div>');

                    }

                 }


            } catch(Exeption $e){
                //หากผิดพลาด
                report($e);
                return false;
            }


            $status = Product::create($data_product);
            return redirect()->route('products.create')->with('success','Add Product Succcess');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.pages.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.pages.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Delete Success');
    }
}