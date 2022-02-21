<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Pengguna;
use App\Models\Product;
use App\Models\Tax; 
use App\Models\Discount;
use App\Models\Marketing;
use App\Models\Quotation;
use App\Models\Vendor;
use App\Models\DetailQuotation;
use Facade\Ignition\QueryRecorder\Query;
use GuzzleHttp\Handler\Proxy;
use PDF;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class PageController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboardOverview1()
    {
        return view('pages/dashboard-overview-1', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
        ]);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboardOverview2()
    {
        return view('pages/dashboard-overview-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboardOverview3()
    {
        return view('pages/dashboard-overview-3');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inbox()
    {
        return view('pages/inbox');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileManager()
    {
        return view('pages/file-manager');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pointOfSale()
    {
        return view('pages/point-of-sale');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function chat()
    {
        return view('pages/chat');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post()
    {
        return view('pages/post');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calendar()
    {
        return view('pages/calendar');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invoiceList()
    {
        return view('pages/invoice-list');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invoiceForm()
    {
        return view('pages/invoice-form');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function quoteList()
    {
        $quotation = Quotation::all();
        return view('pages.quotation-list',compact('quotation'));
        // return view('pages/quotation-list');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function quoteForm()
    {
        $customers = Customer::all();
        $marketings = Marketing::all();
        $vendors = Vendor::all();
        $products = Product::all();
        $discounts = Discount::all()->sortBy('nilai_discount');
        $taxs = Tax::all()->sortBy('tax_value');
        return view('pages/quotation-form',compact('customers','marketings','products','discounts','taxs','vendors'));
    }

    public function findProductName(Request $request){
        $data = Product::select('product_name','id')->where('vendor_id',$request->id)->take(100)->get();
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function findPrice(Request $request){
		$p = Product::select('price')->where('id',$request->id)->first();
	    return response()->json([
            'data'=>$p,
        ]);
	}


    public function quoteStore(Request $request){
        $request->validate([
            'marketing_id' => 'required',
            'customer_id' => 'required',
            'refrensi'=>'required',
            'duedate'=>'required',
            'discount_id'=>'required',
            'tax_id'=>'required',
            'total'=>'required|numeric',
            'note'=>'required',
        ]);
        $data = $request->all();
        // dd($data);

        $quotation = new Quotation();
        $quotation->marketing_id = $data['marketing_id'];
        $quotation->customer_id = $data['customer_id'];
        $quotation->refrensi = $data['refrensi'];
        $quotation->duedate = $data['duedate'];
        $quotation->discount_id = $data['discount_id'];
        $quotation->tax_id = $data['tax_id'];
        $quotation->pengiriman = $data['pengiriman'];
        $quotation->total = $data['total'];
        $quotation->note = $data['note'];
        $quotation->save();

        // $detailquotation = new DetailQuotation();
        // $detailquotation->quotation_id = $quotation->id;
        // $detailquotation->vendor_id = $data['vendor_id'];
        // $detailquotation->product_id = $data['product_id'];
        // $detailquotation->quantity = $data['quantity'];
        // $detailquotation->sum_product = $data['sum_product'];
        // $detailquotation->save();
        if (count($data['vendor_id']) > 0) {
            foreach ($data['vendor_id'] as $item => $value) {
                $data2 = array(
                    'quotation_id'=> $quotation->id,
                    'vendor_id'=> $data['vendor_id'][$item],
                    'product_id'=> $data['product_id'][$item],
                    'quantity'=> $data['quantity'][$item],
                    'sum_product'=> $data['sum_product'][$item],
                );
                DetailQuotation::create($data2);
            }
            return redirect('quote-list-page')->with('status', 'Quotation Berhasil Di Tambah');
        }
    }

    public function quoteshow($id){
        $quotation = Quotation::with('detailquotation')->where('id',$id)->first();
        $detailquotation = DetailQuotation::where('quotation_id',$id)->sum("sum_product");
        if ($quotation == NULL) {
            return abort(404);
        } else {
            return view('pages.quotation-detail',compact('quotation','detailquotation'));
        }
        
        // return view('pages.quotation-detail',compact('quotation'));
    }

    public function quotesedit($id){
        $quotation = Quotation::with('detailquotation')->where('id',$id)->first();
        $marketings = Marketing::all();
        $customers = Customer::all();
        $discounts = Discount::all();
        $taxs = Tax::all();
        $vendors = Vendor::all();

        if ($quotation == NULL) {
            return abort(404);
        } else {
            return view('pages.quotation-edit',compact('quotation','marketings','customers','discounts','taxs','vendors'));
        }
        
        // return view('pages.quotation-detail',compact('quotation'));
    }

    public function quotesupdate($id, Request $request){
        // dd($request->$id);
        $quotation = Quotation::find($id);
        $quotation->marketing_id = $request->marketing_id;
        $quotation->customer_id = $request->customer_id;
        $quotation->refrensi = $request->refrensi;
        $quotation->duedate = $request->duedate;
        $quotation->discount_id = $request->discount_id;
        $quotation->tax_id = $request->tax_id;
        $quotation->pengiriman = $request->pengiriman;
        $quotation->total = $request->total;
        $quotation->note = $request->note;

        $quotation->save();

        if (count($request->id) > 0) {
            foreach ($request->id as $item => $value) {
                $datad = array(
                    'quotation_id'=>$request->quotation_id[$item],
                    'vendor_id'=>$request->vendor_id[$item],
                    'product_id'=>$request->product_id[$item],
                    'quantity'=>$request->quantity[$item],
                    'sum_product'=>$request->sum_product[$item]
                );
                $dquotation = DetailQuotation::where('id',$request->id[$item])->first();
                $dquotation->update($datad);
            }
            return redirect('quote-list-page')->with('status', 'Quotation Berhasil Di Edit');
        }
    }

    public function quotationdelete($id){
        $quotation = Quotation::where('id',$id);
        $detailquotation = DetailQuotation::where('quotation_id',$id);
        if ($detailquotation && $detailquotation == null) {
            return abort(404);
        } else {
            $quotation->delete();
            $detailquotation->delete();
            return redirect('quote-list-page')->with('status', 'Quotation Berhasil Di Hapus');
        }
    }

    public function quotationpdf($id){
        $quotation = Quotation::with('detailquotation')->where('id',$id)->first();
        $detailquotation = DetailQuotation::where('quotation_id',$id)->sum("sum_product");

        $pdf = PDF::loadview('pages.quotationpdf',compact('quotation','detailquotation'));
        return $pdf->stream();
    }



    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersLayout1()
    {
        return view('pages/customers-form');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersLayout2()
    {
        $customer = Customer::all();

        return view('pages/customers-list', ['customer' => $customer]);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function customerStore(Request $request)
    {
        $this->validate($request,[
    		'instance' => 'required',
    		'customer_name' => 'required',
            'contact' => 'required'
    	]);

        Customer::create([
    		'instance' => $request->instance,
    		'customer_name' => $request->customer_name,
            'contact' => $request->contact
    	]);
 
    	return redirect('customers-list-page')->with('status', 'customer berhasil di tambah');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function customerEdit($id)
    {
        $customer = Customer::find($id);

        return view('pages/customers-edit', ['customer' => $customer]);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function customerUpdate($id, Request $request)
    {
        $this->validate($request,[
            'instance' => 'required',
    		'customer_name' => 'required',
            'contact' => 'required'
         ]);
      
         $customer = Customer::find($id);
         $customer->instance = $request->instance;
         $customer->customer_name = $request->customer_name;
         $customer->contact = $request->contact;
         $customer->save();
         return redirect('customers-list-page')->with('status', 'customer berhasil di edit');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function customerDelete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('customers-list-page')->with('status', 'customer berhasil di hapus');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersLayout3()
    {
        return view('pages/users-form');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersLayout4()
    {
        $user = Pengguna::all();
    	return view('pages/users-list', ['user' => $user]);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersStore(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'required',
    		'password' => 'required',
            'name' => 'required',
            'roles' => 'required'
    	]);
 
        Pengguna::create([
    		'email' => $request->email,
    		'password' => $request->password,
            'name' => $request->name,
            'roles' => $request->roles,
    	]);
 
    	return redirect('users-list-page');
    } 

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersEdit($id)
    {
        $user = Pengguna::find($id);

        return view('pages/users-edit', ['user' => $user]);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersUpdate($id, Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'roles' => 'required'
        ]);

        $user = Pengguna::find($id);
        $user->email = $request->email;
        $user->password = $request->password;
        $user->name = $request->name;
        $user->roles = $request->roles;
        $user->save();
        return redirect('users-list-page');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersDelete($id)
    {
        $user = Pengguna::find($id);
        $user->delete();
        return redirect('users-list-page');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileOverview1()
    {
        $vendors = Vendor::all();
        return view('pages/product-form',compact('vendors'));
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileOverview2()
    {
        $product = Product::with('vendor')->paginate();
        
        return view('pages/product-list', ['product' => $product]);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productStore(Request $request)
    {
        $this->validate($request,[
    		'product_name' => 'required',
            'vendor_id' => 'required',
    		'price' => 'required',
            'stock' => 'required',
            'deskripsi'=>'required'   
    	]);
 
        Product::create([   
    		'product_name' => $request->product_name,
            'vendor_id' => $request->vendor_id,
    		'price' => $request->price,
            'stock' => $request->stock,
            'deskripsi'=>$request->deskripsi
    	]);
 
    	return redirect('product-list-page')->with('status','produk berhasil di tambah');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productEdit($id)
    {
        $product = Product::find($id);

        return view('pages/product-edit', ['product' => $product]);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productUpdate($id, Request $request)
    {
        $this->validate($request,[
    		'product_name' => 'required',
            'vendor_id' => 'required',
    		'price' => 'required',
            'stock' => 'required',
            'deskripsi'=>'required'  
    	]);
 
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->vendor_id = $request->vendor_id;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->deskripsi = $request->deskripsi;
        $product->save();
        return redirect('product-list-page')->with('status','produk berhasil di edit');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('product-list-page')->with('status','produk berhasil di hapus');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function taxForm()
    {
        return view('pages/tax-form');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function taxList()
    {
        $tax = Tax::all();
    	return view('pages/tax-list', ['tax' => $tax]);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function taxStore(Request $request)
    {
        $this->validate($request,[
    		'name' => 'required',
            'tax_value' => 'required',
    		// 'percentage' => 'required',   
    	]);
 
        Tax::create([   
    		'name' => $request->name,
            'tax_value' => $request->tax_value,
    		// 'percentage' => $request->percentage,
    	]);
        // dd($request);
        // if ($request->tax_value <= 100) {
        //     dd("lebih dari 100");
        // } else {
        //     dd("kurang dari 100");
        // }
        
 
    	return redirect('tax-list-page');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function taxEdit($id)
    {
        $tax = Tax::find($id);

        return view('pages/tax-edit', ['tax' => $tax]);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function taxUpdate($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
    		'tax_value' => 'required',
            // 'percentage' => 'required'
         ]);
      
         $tax = Tax::find($id);
         $tax->name = $request->name;
         $tax->tax_value = $request->tax_value;
        //  $tax->percentage = $request->percentage;
         $tax->save();
         return redirect('tax-list-page');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function taxDelete($id)
    {
        $tax = Tax::find($id);
        $tax->delete();
        return redirect('tax-list-page');
    }

        /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function discountForm()
    {
        return view('pages/discount-form');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function discountList()
    {
        $discount = Discount::all();
    	return view('pages/discount-list', ['discount' => $discount]);
    }

        /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function discountStore(Request $request)
    {
        $this->validate($request,[
    		'name' => 'required',
            'nilai_discount' => 'required',
    		// 'percentage' => 'required',   
    	]);
 
        Discount::create([   
    		'name' => $request->name,
            'nilai_discount' => $request->nilai_discount,
    		// 'percentage' => $request->percentage,
    	]);
 
    	return redirect('discount-list-page')->with('status','Diskon Berhasil Ditambah');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function discountEdit($id)
    {
        $discount = Discount::find($id);

        return view('pages/discount-edit', ['discount' => $discount]);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function discountUpdate($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
    		'nilai_discount' => 'required',
            // 'percentage' => 'required'
         ]);
      
         $discount = Discount::find($id);
         $discount->name = $request->name;
         $discount->nilai_discount = $request->nilai_discount;
        //  $tax->percentage = $request->percentage;
         $discount->save();
         return redirect('discount-list-page');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function discountDelete($id)
    {
        $discount = Discount::find($id);
        $discount->delete();
        return redirect('discount-list-page');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function profileOverview3()
    // {
    //     return view('pages/profile-overview-3');
    // }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wizardLayout1()
    {
        return view('pages/wizard-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wizardLayout2()
    {
        return view('pages/wizard-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wizardLayout3()
    {
        return view('pages/wizard-layout-3');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blogLayout1()
    {
        return view('pages/blog-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blogLayout2()
    {
        return view('pages/blog-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blogLayout3()
    {
        return view('pages/blog-layout-3');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pricingLayout1()
    {
        return view('pages/pricing-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pricingLayout2()
    {
        return view('pages/pricing-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invoiceLayout1()
    {
        return view('pages/invoice-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invoiceLayout2()
    {
        return view('pages/invoice-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function faqLayout1()
    {
        return view('pages/faq-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function faqLayout2()
    {
        return view('pages/faq-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function faqLayout3()
    {
        return view('pages/faq-layout-3');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('pages/login');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('pages/register');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function errorPage()
    {
        return view('pages/error-page');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile()
    {
        return view('pages/update-profile');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        return view('pages/change-password');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function regularTable()
    {
        return view('pages/regular-table');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tabulator()
    {
        return view('pages/tabulator');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function modal()
    {
        return view('pages/modal');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function slideOver()
    {
        return view('pages/slide-over');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function notification()
    {
        return view('pages/notification');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function accordion()
    {
        return view('pages/accordion');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function button()
    {
        return view('pages/button');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function alert()
    {
        return view('pages/alert');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function progressBar()
    {
        return view('pages/progress-bar');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tooltip()
    {
        return view('pages/tooltip');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dropdown()
    {
        return view('pages/dropdown');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function typography()
    {
        return view('pages/typography');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function icon()
    {
        return view('pages/icon');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loadingIcon()
    {
        return view('pages/loading-icon');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function regularForm()
    {
        return view('pages/regular-form');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datepicker()
    {
        return view('pages/datepicker');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tailSelect()
    {
        return view('pages/tail-select');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileUpload()
    {
        return view('pages/file-upload');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wysiwygEditor()
    {
        return view('pages/wysiwyg-editor');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validation()
    {
        return view('pages/validation');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function chart()
    {
        return view('pages/chart');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function slider()
    {
        return view('pages/slider');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageZoom()
    {
        return view('pages/image-zoom');
    }
}
