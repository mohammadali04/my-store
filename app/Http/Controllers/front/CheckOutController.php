<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\front\Code;
use App\Models\front\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Evryn\LaravelToman\Facades\Toman;
use Route;
use App\Http\helpers\Shipping;
use Evryn\LaravelToman\CallbackRequest;
use Auth;
class CheckOutController extends Controller
{
   
   public function index(){

      $basketInfo=parent::getBasket();
      $baskets=$basketInfo[0];
      $totalPrice=$basketInfo[1];
      $totalDiscount=$basketInfo[2];
      $userId=Auth::user()->id;
      $user=User::where('id',$userId)->get();
      $userAddress=Address::where('user_id',$userId)->get();    
     return view('front.checkout.index',compact('baskets','totalPrice','totalDiscount','userAddress'));
   }
   public function checkCode($code){
      $result=Code::where('code',$code)->where('used',0)->where('user_id',Auth::user()->id)->pluck('darsad');
      if(sizeof($result)>0){
        return $result[0];
      }else{
         return 0;
      }
      

   }
   public function checkCodeResponse(Request $request){
$response= $this->checkCode($request->code);
$totalPrice=$this->calculateTotalPrice($request->code);
$responseAll=[$response,$totalPrice];
echo json_encode($responseAll);

   }
   public function calculateTotalPriceAll(Request $request){
      $totalPrice= $this->calculateTotalPrice($request->code);
      return $totalPrice;
   }
   public function calculateTotalPrice($code){
      $request=new Request();
      $basketInfo=parent::getBasket();
      $totalPrice=$basketInfo[1];
      $totalDiscount=$basketInfo[2];
      $totalPriceDiscount=$totalPrice-$totalDiscount;
      // $postPrice=$this->calculatePostPrice();
      if(session('post_price')){
         $postPrice=session()->get('post_price');
      };
      $code=$this->checkCode($code);
      $codeDiscount = 0;
        if ($code != 0) {
            $codeDiscount = ($code * $totalPriceDiscount) / 100;
            $codeDiscount = intval($codeDiscount);
        }
      $totalPriceAll = $totalPriceDiscount-$codeDiscount+$postPrice;
      return $totalPriceAll;
   }
   public function calculatePostPrice(){
      return parent::calculatePostPrice();
   }
   public function saveOrder(Request $request){
      
      // $order = new zarinpal();
      // $res = $order->pay($request->price,"myroxo24@gmail.com","0912111111");
      // return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
      $userId=Auth::user()->id;
      $addressInfo=Address::where('user_id',$userId)->get();
      $addressInfo=$addressInfo[0];
      if(isset($request->accept))
      {
      $basketInfo=parent::getBasket();
      $basket=$basketInfo[0];
      $basket=serialize($basket);
   $ostan=$addressInfo['ostan'];
   $city=$addressInfo['city'];
   $family=$addressInfo['family'];
   $code_posti=$addressInfo['post_code'];
   $mobile=$addressInfo['mobile'];
   $tel=$addressInfo['tel'];
   $address=$addressInfo['address'];
   $amount=$request->amount;
   $post_type=1;
   $postPrice=$request->post_price;
   $userId=Auth::user()->id;
   $status=1;
   $payType=$request->pay_type;
   $request_zar = Toman::amount($amount)
      ->description('Subscribing to Plan A')
      ->callback(route('zarinpal.varify'))
      ->mobile('09350000000')
      ->email('amirreza@example.com')
      ->request();
   $orderObject=new Order();
   $transactionId = $request_zar->transactionId();
   $orderObject->create(['refrence_id'=>'','bank_name'=>'klfss','pay_card'=>1,'authority'=>$transactionId,'family'=>$family,'ostan'=>$ostan,'city'=>$city,'code_posti'=>$code_posti,'mobile'=>$mobile,'tel'=>$tel,'address'=>$address,'basket'=>$basket,'amount'=>$amount,'post_type'=>$post_type,'post_price'=>$postPrice,'user_id'=>$userId,'status'=>$status,'pay_type'=>$payType]);
   if ($request_zar->successful()) {
      // Store created transaction details for verification
      $transactionId = $request_zar->transactionId();
      
      // Redirect to payment URL
      return $request_zar->pay();
  }
  
  if ($request_zar->failed()) {
      // Handle transaction request failure.
      echo 'no';
  }      
}
      else{
         $msg='لطفا قوانین را خوانده و تیک مربوطه را بزنید';
         return redirect()->back()->with('warning',$msg);
      }
   }
   public function addOrder(Request $request)
    {
      $request = Toman::amount(1000000)
      ->description('Subscribing to Plan A')
      ->callback(route('zarinpal.varify'))
      ->mobile('09350000000')
      ->email('amirreza@example.com')
      ->request();
  
  if ($request->successful()) {
      // Store created transaction details for verification
      $transactionId = $request->transactionId();
      
      // Redirect to payment URL
      return $request->pay();
  }
  
  if ($request->failed()) {
      // Handle transaction request failure.
      echo 'no';
  }

    }
    public function order(CallbackRequest $request){
  // Use $request->transactionId() to match the payment record stored
        // in your persistence database and get expected amount, which is required
        // for verification. Take care of Double Spending.
        $authority=request()->query('Authority');
        $verify_values=Order::where('authority',$authority)->first();
        $authority=$verify_values->authority;
        $amount=$verify_values->amount;
        $payment = $request->transactionId($authority)->amount($amount)->verify();

        if ($payment->successful()) {
            // Store the successful transaction details
            $referenceId = $payment->referenceId();
            $message ='پرداخت با موفقیت انجام شد';
            Order::where('authority',$authority)->update(['status'=>4,'refrence_id'=>$referenceId]);
            $order=Order::where('authority',$authority)->first();
            return view('front.checkout.order-result',compact('order','message'));
         }
        
        if ($payment->alreadyVerified()) {
         $message = $payment->alreadyVerified();
         return redirect(Route('checkout.checkout'))->with('warning',$message);
         }
         
         if ($payment->failed()) {
            $message = $payment->failed();
         return redirect(Route('checkout.checkout'))->with('warning',$message);
        }

  }
}