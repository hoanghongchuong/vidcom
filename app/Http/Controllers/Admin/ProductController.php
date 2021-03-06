<?php 
namespace App\Http\Controllers\Admin;

//use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Color;
use App\Images;
use App\ThuongHieu;
use App\ProductCate;
use Input, File;
use Validator;
use Auth;

class ProductController extends Controller
{
    public function getList()
    {
        //$data = Products::select('id','name','photo','price','parent_id','alias')->orderBy('id','DESC')->get()->toArray();
        $data = Products::orderBy('id','desc')->get();
        return view('admin.product.list', compact('data'));
    }
    public function getAdd()
    {
        $data = Products::all();
        $parent = ProductCate::all();
        $colors = Color::all();
        return view('admin.product.add', compact('data','parent', 'colors'));
    }
    public function postAdd(ProductRequest $request)
    {
        $img = $request->file('fImages');
        $path_img='upload/product';
        $img_name='';
        if(!empty($img)){
            $img_name=time().'_'.$img->getClientOriginalName();
            $img->move($path_img,$img_name);
        }
        $product = new Products;
        $product->name = $request->txtName;
        if($request->txtPrice!=''){
            $product->price = str_replace(",", "", $request->txtPrice);
        }else{
            $product->price =0;
        }
        if($request->txtPriceOld!=''){
            $product->price_old = str_replace(",", "", $request->txtPriceOld);
        }else{
            $product->price_old =0;
        }
        if($request->txtProductCate>0){
            $product->cate_id = $request->txtProductCate;
        }else{
            $product->cate_id = 0;
        }

        if($request->txtAlias){
            $product->alias = $request->txtAlias;
        }else{
            $product->alias = changeTitle($request->txtName);
        }
        $product->mota = $request->txtDesc;
        $product->photo = $img_name;
        $product->ratepoint = $request->ratedpoint;
        $product->baohanh = $request->txtBaohanh;
        $product->vanchuyen = $request->txtVanchuyen;
        $product->huongdan = $request->txtHuongdan;
        $product->namsanxuat = $request->txtNamsanxuat;
        $product->quatang = $request->txtQuatang;
        $product->model = $request->txtModel;
        $product->code = $request->txtCode;

        $product->title = $request->txtTitle;
        $product->content = $request->txtContent;
        $product->keyword = $request->txtKeyword;
        $product->description = $request->txtDescription;
        $product->stt = intval($request->stt);
        if($request->status=='on'){
            $product->status = 1;
        }else{
            $product->status = 0;
        }
        if($request->noibat=='on'){
            $product->noibat = 1;
        }else{
            $product->noibat = 0;
        }
        if($request->spbc=='on'){
            $product->spbc = 1;
        }else{
            $product->spbc = 0;
        }
        if($request->tinhtrang=='on'){
            $product->tinhtrang = 1;
        }else{
            $product->tinhtrang = 0;
        }
        $product->user_id = Auth::user()->id;
       

       $product->color_id = json_encode($request->colors, JSON_NUMERIC_CHECK);
        
        //     if(isset($_POST['number'])){
        //     $number = $_POST['number'];
        //     $product->number_id = implode(',', $number);
        // }
        // dd($product) ;
        $product->save();
        $product_id = $product->id;
        if ($request->hasFile('detailImg')) {
            foreach ($request->file('detailImg') as $file) {
                $product_img = new Images();
                if (isset($file)) {
                    $product_img->photo = time().'_'.$file->getClientOriginalName();
                    $product_img->product_id = $product_id;
                    $file->move('upload/hasp/',time().'_'.$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
        return redirect()->route('admin.product.index')->with('status','Thêm mới thành công !');
        /*
        echo 'Tên hinh:'.$request->file('fImages')->getClientOriginalName();
        echo 'Kích thước:'.$request->file('fImages')->getSize();
        echo 'Đường dẫn:'.$request->file('fImages')->getRealPath();
        echo 'Loại hình:'.$request->file('fImages')->getMimeType();
        */
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit(Request $request)
    {
        $id= $request->get('id');
        //Tìm article thông qua mã id tương ứng
        //$data = Products::findOrFail($id);
        $colors = Color::all();
        $data = Products::find($id);       
        if(!empty($data)){
            if($request->get('hienthi')>0){
                if($data->status == 1){
                    $data->status = 0; 
                }else{
                    $data->status = 1; 
                }
                $data->update();
                return redirect()->route('admin.product.index')->with('status','Cập nhật thành công !');
            }
            if($request->get('noibat')>0){
                if($data->noibat == 1){
                    $data->noibat = 0; 
                }else{
                    $data->noibat = 1; 
                }
                $data->update();
                return redirect()->route('admin.product.index')->with('status','Cập nhật thành công !');
            }
            if($request->get('spbc')>0){
                if($data->spbc == 1){
                    $data->spbc = 0; 
                }else{
                    $data->spbc = 1; 
                }
                $data->update();
                return redirect()->route('admin.product.index')->with('status','Cập nhật thành công !');
            }
            $parent = ProductCate::orderBy('stt', 'asc')->get()->toArray();
            $product = Products::select('stt')->orderBy('id','asc')->get()->toArray();
            $product_img = Products::find($id)->pimg;
            $color_product =  json_decode($data->color_id);
            // Gọi view edit.blade.php hiển thị bải viết
            return view('admin.product.edit',compact('data','product','id','parent','product_img','colors', 'color_product'));
        }else{
            $data = Products::all();
            $parent = ProductCate::orderBy('stt', 'asc')->get()->toArray();
            return redirect()->route('admin.product.index')->with('status','Dữ liệu không có thực');
        }
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request,
            ["txtName" => "required"],
            ["txtName.required" => "Bạn chưa nhập tên danh mục"]
        );
        $id= $request->get('id');
        if($id){
            $product = Products::findOrFail($id);

            $img = $request->file('fImages');
            $img_current = 'upload/product/'.$request->img_current;
            if(!empty($img)){
                $path_img='upload/product';
                $img_name=time().'_'.$img->getClientOriginalName();
                $img->move($path_img,$img_name);
                $product->photo = $img_name;
            }
            if ($request->hasFile('detailImg')) {
                foreach ($request->file('detailImg') as $file) {
                    $product_img = new Images();
                    if (isset($file)) {
                        $product_img->photo = time().'_'.$file->getClientOriginalName();
                        $product_img->product_id = $id;
                        $file->move('upload/hasp/',time().'_'.$file->getClientOriginalName());
                        $product_img->save();
                    }
                }
            }
            $product->name = $request->txtName;
            if($request->txtProductCate>0){
                $product->cate_id = $request->txtProductCate;
            }else{
                $product->cate_id = 0;
            }
            
           
            if($request->txtAlias){
                $product->alias = $request->txtAlias;
            }else{
                $product->alias = changeTitle($request->txtName);
            }
            if($request->txtPrice!=''){
                $product->price = str_replace(",", "", $request->txtPrice);
            }else{
                $product->price =0;
            }
            if($request->txtPriceOld!=''){
                $product->price_old = str_replace(",", "", $request->txtPriceOld);
            }else{
                $product->price_old =0;
            }
            $product->baohanh = $request->txtBaohanh;
            $product->ratepoint = $request->ratedpoint;
            $product->vanchuyen = $request->txtVanchuyen;
            $product->huongdan = $request->txtHuongdan;
            $product->namsanxuat = $request->txtNamsanxuat;
            $product->quatang = $request->txtQuatang;
            $product->model = $request->txtModel;
            $product->code = $request->txtCode;
            if(!empty($request->properties)){
                $product->properties = implode('###',$request->properties);
            }
            $product->mota = $request->txtDesc;
            $product->title = $request->txtTitle;
            $product->content = $request->txtContent;
            $product->keyword = $request->txtKeyword;
            $product->description = $request->txtDescription;
            $product->color_id = json_encode($request->colors, JSON_NUMERIC_CHECK);
            $product->stt = intval($request->stt);

            if($request->status=='on'){
                $product->status = 1;
            }else{
                $product->status = 0;
            }
            if($request->noibat=='on'){
                $product->noibat = 1;
            }else{
                $product->noibat = 0;
            }
            if($request->spbc=='on'){
                $product->spbc = 1;
            }else{
                $product->spbc = 0;
            }
            if($request->tinhtrang=='on'){
                $product->tinhtrang = 1;
            }else{
                $product->tinhtrang = 0;
            }
            $product->user_id       = Auth::user()->id;

            $product->save();
            return redirect()->back()->with('status','Cập nhật thành công !');
            //return redirect('admin/product/edit?id='.$id)->with('status','Cập nhật thành công');
        }else{
            return redirect('backend/product/')->with('status','Dữ liệu không có thực');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDelete($id)
    {
        $product_img = Products::find($id)->pimg->toArray();
        foreach ($product_img as $value) {
           File::delete('upload/hasp/'.$value['photo']);
        }
        $product = Products::findOrFail($id);
        $product->delete();
        File::delete('upload/product/'.$product->photo);
        return redirect()->route('admin.product.index');
    }
    public function getDeleteList($id){
        $listid = explode(",",$id);
        foreach($listid as $listid_item){
            $product_img = Products::find($listid_item)->pimg->toArray();
            foreach ($product_img as $value) {
               File::delete('upload/hasp/'.$value['photo']);
            }
            $product = Products::findOrFail($listid_item);

            $product->delete();
            File::delete('upload/product/'.$product->photo);
        }
        return redirect()->route('admin.product.index');
    }
    public function getDelImg(Request $request,$id){         // use Request;
        if ($request->ajax()) {      
            $idImg = (int)$request->get('idImg');
            $image_detail = Images::find($idImg);
            if (!empty($image_detail)) {
                $img = 'upload/hasp/'.$image_detail->photo;
                if (File::exists($img)) {
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return 'OK';
        }
    }
   
}
