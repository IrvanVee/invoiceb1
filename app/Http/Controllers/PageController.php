<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Models\Product;
use App\Models\Tax; 
use App\Models\Discount;
use App\Models\Marketing;
use App\Models\Quotation;
use App\Models\Vendor;
use App\Models\DetailInvoice;
use App\Models\DetailQuotation;
use App\Models\Invoice;
use Facade\Ignition\QueryRecorder\Query;
use GuzzleHttp\Handler\Proxy;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $invoices = Invoice::all();
        $users = User::all();
        $dibayar = Invoice::where('status','LIKE',"Dibayar")->count("id");
        $pending = Invoice::where('status','LIKE',"Pending")->count("id");
        $terlambat = Invoice::where('status','LIKE',"Terlambat")->count("id");
        $dibatalkan = Invoice::where('status','LIKE',"Dibatalkan")->count("id");
        // return view('pages/dashboard-overview-1',compact('invoices','dibayar','pending','terlambat','dibatalkan'));

        // return view('pages/dashboard-overview-1', [
        //     // Specify the base layout.
        //     // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
        //     // The default value is 'side-menu'

        $result=DB::select(DB::raw("select count(*) as total_status, status from invoice group by status"));
        $chartData="";
        foreach($result as $list){
            $chartData.="['".$list->status."',     ".$list->total_status."],";
        }
        $arr['chartData']=rtrim($chartData,",");

        return view('pages/dashboard-overview-1',compact('invoices','users','dibayar','pending','terlambat','dibatalkan'),$arr);

    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function chart()
    // {

    // }
    
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
        $invoices = Invoice::all();
        return view('pages/invoice-list',compact('invoices'));
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invoiceForm()
    {
        // return view('pages/invoice-form');
        $customers = Customer::all();
        $vendors = Vendor::all();
        $products = Product::all();
        $discounts = Discount::all()->sortBy('nilai_discount');
        $taxs = Tax::all()->sortBy('tax_value');
        return view('pages/invoice-form',compact('vendors','customers','products','discounts','taxs'));
    }

    public function invoiceStore(Request $request){
        $request->validate([
            'vendor_id' => 'required',
            'customer_id' => 'required',
            'refrensi' => 'required',
            'duedate' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'sum_product' => 'required',
            'discount_id' => 'required',
            'tax_id' => 'required',
            'pengiriman' => 'required',
            'total' => 'required',
            'status' => 'required',
            'note' => 'required'
        ]);

        $data = $request->all();
        // dd($data)
        $invoice = new Invoice();
        $invoice->vendor_id = $data['vendor_id'];
        $invoice->customer_id = $data['customer_id'];
        $invoice->refrensi = $data['refrensi'];
        $invoice->duedate = $data['duedate'];
        $invoice->discount_id = $data['discount_id'];
        $invoice->tax_id = $data['tax_id'];
        $invoice->pengiriman = $data['pengiriman'];
        $invoice->total = $data['total'];
        $invoice->status = $data['status'];
        $invoice->note = $data['note'];
        $invoice->save();

        // untuk menambahkan ke detail invoice
        if (count($data['product_id']) > 0) {
            foreach ($data['product_id'] as $item => $value) {
                $data3 = array(
                    'invoice_id'=> $invoice->id,
                    // 'vendor_id'=> $invoice->vendor_id,
                    'product_id'=> $data['product_id'][$item],
                    'quantity'=> $data['quantity'][$item],
                    'sum_product'=> $data['sum_product'][$item],
                );
                DetailInvoice::create($data3);
            }
            return redirect('invoice-list-page')->with('status', 'Invoice Berhasil Di Tambah');
        }
    }

    public function invoiceshow($id){
        $invoice = Invoice::with('detailinvoice')->where('id',$id)->first();
        $detailinvoice = DetailInvoice::where('invoice_id',$id)->sum("sum_product");
        if ($invoice == NULL) {
            return abort(404);
        } else {
            return view('pages.invoice-detail',compact('invoice','detailinvoice'));
        }

    }

    public function invoicepdf($id){
        $invoice = Invoice::with('detailinvoice')->where('id',$id)->first();
        $detailinvoice = DetailInvoice::where('invoice_id',$id)->sum("sum_product");

        $pdf = PDF::loadview('pages.invoicepdf',compact('invoice','detailinvoice'));
        return $pdf->stream();
    }

    public function invoiceedit($id){
        $invoice = invoice::with('detailinvoice')->where('id',$id)->first();
        $customers = Customer::all();
        $discounts = Discount::all();
        $taxs = Tax::all();
        $vendors = Vendor::all();
        $products  = Product::all();
        $detailinvoice = DetailInvoice::where('invoice_id',$id)->sum("sum_product");

        if ($invoice == NULL) {
            return abort(404);
        } else {
            return view('pages.invoice-edit',compact('invoice','customers','discounts','taxs','vendors','products','detailinvoice'));
        }

        // return view('pages.quotation-detail',compact('quotation'));
    }

    public function invoiceupdate($id, Request $request){
        // dd($request->$id);
        $invoice = Invoice::find($id);
        $invoice->vendor_id = $request->vendor_id;
        $invoice->customer_id = $request->customer_id;
        $invoice->refrensi = $request->refrensi;
        $invoice->duedate = $request->duedate;
        $invoice->discount_id = $request->discount_id;
        $invoice->tax_id = $request->tax_id;
        $invoice->pengiriman = $request->pengiriman;
        $invoice->total = $request->total;
        $invoice->dibayar = $request->dibayar;
        $invoice->tunggakan = $invoice->total - $invoice->dibayar;
        $invoice->status = $request->status;
        $invoice->note = $request->note;
        $invoice->save();


        if (count($request->id) > 0) {
            foreach ($request->id as $item => $value) {
                $datai = array(
                    'invoice_id'=>$request->invoice_id[$item],
                    // 'vendor_id'=>$request->vendor_id[$item],
                    'product_id'=>$request->product_id[$item],
                    'quantity'=>$request->quantity[$item],
                    'sum_product'=>$request->sum_product[$item]
                );
                $dinvoice = DetailInvoice::where('id',$request->id[$item])->first();
                $dinvoice->update($datai);
            }
            return redirect('invoice-list-page')->with('status', 'Invoice Berhasil Di Edit');
        }
    }

    public function invoicedelete($id){
        $invoice = Invoice::where('id',$id);
        $detailinvoice = DetailInvoice::where('invoice_id',$id);
        if ($detailinvoice && $detailinvoice == null) {
            return abort(404);
        } else {
            $invoice->delete();
            $detailinvoice->delete();
            return redirect('invoice-list-page')->with('status', 'Invoice Berhasil Di Hapus');
        }
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
            'vendor_id'=>'required',
            'product_id'=>'required',
            'quantity'=>'required',
            'sum_product'=>'required'
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
        $detailquotation = DetailQuotation::where('quotation_id',$id)->sum("sum_product");
        $marketings = Marketing::all();
        $customers = Customer::all();
        $discounts = Discount::all();
        $taxs = Tax::all();
        $vendors = Vendor::all();
 
        if ($quotation == NULL) {
            return abort(404);
        } else {
            return view('pages.quotation-edit',compact('quotation','marketings','customers','discounts','taxs','vendors','detailquotation'));
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

    public function quotationinvoice($id){
        // return Quotation::find($id);
        $quotation = Quotation::with('detailquotation')->where('id',$id)->first();
        $detailquotation = DetailQuotation::where('quotation_id',$id)->sum("sum_product");
        $marketings = Marketing::all();
        $customers = Customer::all();
        $discounts = Discount::all();
        $taxs = Tax::all();
        $vendors = Vendor::all();
        if ($quotation == NULL) {
            return abort(404);
        } else {
            return view('pages.quotation-invoice',compact('quotation','marketings','customers','discounts','taxs','vendors','detailquotation'));
        }
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
            'contact' => 'required',
            'address' => 'required'
    	]);
 
        Customer::create([
    		'instance' => $request->instance,
    		'customer_name' => $request->customer_name,
            'contact' => $request->contact,
            'address' => $request->address
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
            'contact' => 'required',
            'address' => 'required'
         ]);
 
         $customer = Customer::find($id);
         $customer->instance = $request->instance;
         $customer->customer_name = $request->customer_name;
         $customer->contact = $request->contact;
         $customer->address = $request->address;
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
        $customerquotation = Quotation::where('customer_id',$id);
        $customer->delete();
        $customerquotation->delete();
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
        $user = User::all();
    	return view('pages/users-list', ['user' => $user]);
    }
 
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profilePage()
    {
        return view('pages/profile-page');
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
            // 'roles' => 'required'
    	]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = date("Y-m-d h:i:s");
        $user->password = Hash::make($request->password);
        $user->save();
        // dd($request->all());

    	return redirect('users-list-page')->with('status','user baru telah di tambahkan');
    } 

    public function usersShow($id){
        $roles = Role::all();
        $permissions = Permission::all();
        $user = User::find($id);
        return view('pages.user-role',compact('user','roles','permissions'));
    }
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersEdit($id)
    {
        $user = User::find($id);
 
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
            // 'password' => 'required',
            'name' => 'required',
            // 'roles' => 'required'
        ]);
 
        $user = User::find($id);
        $user->email = $request->email;
        // $user->password = $request->password;
        $user->name = $request->name;
        // $user->roles = $request->roles;
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
        $user = User::find($id);
        if ($user->hasRole('admin')) {
            return redirect('users-list-page')->with('status','anda adalah admin');
        }
        $user->delete();
        return redirect('users-list-page')->with('status','user berhasil di hapus');
    }
    public function assignRoleuser(Request $request,$id){
        $user = User::find($id);
        if ($user->hasRole($request->role)) {
            return redirect()->back()->with('status','Role Exists');
        }
        $user->assignRole($request->role);
        return redirect()->back()->with('status','Role Asigned');
    }

    public function removeRoleUser(User $user, Role $role){
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return redirect()->back()->with('status','Role Remove');
        }
        return redirect()->back()->with('status','Role Not Exists');
    }

    public function givePermissionUser(Request $request,$id){
        $user = User::find($id);
        if ($user->hasPermissionTo($request->permission)) {
            return redirect()->back()->with('status','izin hak akses di tolak');
        }
        $user->givePermissionTo($request->permission);
        return redirect()->back()->with('status','izin hak akses di tambahkan');
    }

    public function revokePermissionUser(User $user ,Permission $permission){
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return redirect()->back()->with('status','Revoke Di Izinkan');
        }
        return redirect()->back()->with('status','Revoke Tidak Di izinkan');
    }

    public function permissionLayout(){
        $permissions = Permission::all();
        return view('pages.permission-list',compact('permissions'));
    }
    
    public function permissionform(){
        return view('pages.permission-form');
    }

    public function permissionStore(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:permissions',
        ]);
        Permission::create($request->all());
        return redirect('permission-list')->with('status','hak akses berhasil di tambah');
    }

    public function permissionEdit($id){
        $roles = Role::all();
        $permission = Permission::find($id);
        return view('pages.permission-edit',compact('permission','roles'));
    }

    public function permissionUpdate(Request $request,$id){
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->save();
        return redirect('permission-list')->with('status','hak akses berhasil di ubah');
    }

    public function permissionDelete($id){
        $permision = Permission::find($id);
        $permision->delete();
        return redirect('permission-list')->with('status','hak akses berhasil di hapus');
    }

    public function assignRole(Request $request,$id){
        $permission = Permission::find($id);
        if ($permission->hasRole($request->role)) {
            return redirect()->back()->with('status','Role Exists');
        }
        $permission->assignRole($request->role);
        return redirect()->back()->with('status','Role Asigned');
    }

    public function removeRole(Permission $permission, Role $role){
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return redirect()->back()->with('status','Role Remove');
        }
        return redirect()->back()->with('status','Role Not Exists');
    }

    public function roleLayout(){
        $roles = Role::whereNotIn('name',['admin'])->get();
        return view('pages.role-list',compact('roles'));
    }
    public function roleForm(){
        return view('pages.role-form');
    }
    public function roleStore(Request $request){
        $request->validate([
            'name' => 'required|unique:roles',
        ]);
        Role::create($request->all());
        return redirect('role-list')->with('status','Role Berhasil Di Tambah');
    }
    public function roleEdit($id){
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('pages.role-edit',compact('role','permissions'));
    }
    public function roleUpdate(Request $request,$id){
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        return redirect('role-list')->with('status','Role Berhasil Di Edit');
    }
    public function roleDelete($id){
        $role = Role::find($id);
        $role->delete();
        return redirect('role-list')->with('status','Role Berhasil Di Hapus');
    }

    public function givePermission(Request $request,$id){
        $role = Role::find($id);
        if ($role->hasPermissionTo($request->permission)) {
            return redirect()->back()->with('status','izin hak akses di tolak');
        }
        $role->givePermissionTo($request->permission);
        return redirect()->back()->with('status','izin hak akses di tambahkan');
    }

    public function revokePermission(Role $role ,Permission $permission){
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return redirect()->back()->with('status','Revoke Di Izinkan');
        }
        return redirect()->back()->with('status','Revoke Tidak Di izinkan');
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
        $vendors = Vendor::all();
        if ($product == NULL) {
            return abort(404);
        } else {
            // echo "tidak bisa";
            return view('pages/product-edit', compact('product','vendors'));
        }
        
    }

    public function productDetail($id){
        $product = Product::findorFail($id);
        return view('pages.product-detail',compact('product'));
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
        $productdetailinvoice = DetailInvoice::where('product_id',$id);
        $productdetailquotation = DetailQuotation::where('product_id',$id);
        $product->delete();
        $productdetailinvoice->delete();
        $productdetailquotation->delete();
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
    public function marketingForm()
    {
        return view('pages/marketing-form');
    }

    public function marketingList()
    {
        $marketing = Marketing::all();
    	return view('pages/marketing-list', ['marketing' => $marketing]);
    }

    public function marketingStore(Request $request)
    {
        $this->validate($request,[
    		'marketing_name' => 'required',
            'address' => 'required'
    	]);
 
        Marketing::create([   
    		'marketing_name' => $request->marketing_name,
            'address' => $request->address
    	]);
 
    	return redirect('marketing-list-page')->with('status','Marketing Berhasil Ditambah');
    }

    public function marketingEdit($id)
    {
        $marketing = Marketing::find($id);
        return view('pages/marketing-edit', ['marketing' => $marketing]);
    }

    public function marketingUpdate($id, Request $request)
    {
        $this->validate($request,[
            'marketing_name' => 'required',
            'address' => 'required'
         ]);
 
         $marketing = Marketing::find($id);
         $marketing->marketing_name = $request->marketing_name;
         $marketing->address = $request->address;
         $marketing->save();
         return redirect('marketing-list-page');
    }

    public function marketingDelete($id)
    {
        $marketing = Marketing::find($id);
        $marketingquotation = Quotation::where('marketing_id',$id);
        $marketing->delete();
        $marketingquotation->delete();
        return redirect('marketing-list-page');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function vendorForm()
    {
        return view('pages/vendor-form');
    }

    public function vendorList()
    {
        $vendor = Vendor::all();
    	return view('pages/vendor-list', ['vendor' => $vendor]);
    }

    public function vendorStore(Request $request)
    {
        $this->validate($request,[
    		'vendor_name' => 'required',
            'address' => 'required'
    	]);
 
        Vendor::create([   
    		'vendor_name' => $request->vendor_name,
            'address' => $request->address
    	]);
 
    	return redirect('vendor-list-page')->with('status','Vendor Berhasil Ditambah');
    }

    public function vendorEdit($id)
    {
        $vendor = Vendor::find($id);
        return view('pages/vendor-edit', ['vendor' => $vendor]);
    }

    public function vendorUpdate($id, Request $request)
    {
        $this->validate($request,[
            'vendor_name' => 'required',
            'address' => 'required'
         ]);
 
         $vendor = Vendor::find($id);
         $vendor->vendor_name = $request->vendor_name;
         $vendor->address = $request->address;
         $vendor->save();
         return redirect('vendor-list-page')->with('status','vendor berhasil di update');
    }
 
    public function vendorDelete($id)
    {
        $vendor = Vendor::find($id);
        $vendorinvoice = Invoice::where('vendor_id',$id);
        $vendorproduct = Product::where('vendor_id',$id);
        $vendordquotation = DetailQuotation::where('vendor_id',$id);
        $vendor->delete();
        $vendorinvoice->delete();
        $vendorproduct->delete();
        $vendordquotation->delete();
        return redirect('vendor-list-page')->with('status','Vendor Berhasil Di Hapus');
    }

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
