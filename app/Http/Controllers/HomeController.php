<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Dwij\Laraadmin\Models\Module;
use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $roleCount = \App\Role::count();
		if($roleCount != 0) {
			if($roleCount != 0) {
				return view('home');
			}
		} else {
			return view('errors.error', [
				'title' => 'Migration not completed',
				'message' => 'Please run command <code>php artisan db:seed</code> to generate required table data.',
			]);
		}
    }
    public function appointment(Request $request)
    {
        if (!$this->is_login()) {
			return redirect('user_login');
		}
       
        $data['appointment'] = DB::table('appointments')->select('appointments.*')->get();

        $data['states'] = DB::table('states')->select('states.*')->where('states.country_id', 101)->get();

        $city ="Madhya Pradesh";

        $data['cities'] = DB::table('cities')->select('cities.*')->where('cities.state_id',$city)->get();

        return view('apoitment',$data);
    }

    public function create_appointment(Request $request){
        
        if (!$this->is_login()) {
			return redirect('user_login');
		}
        $currentdate = date("Y/m/d H:i:s");
        $data1 = array(
            'date' => $request->date,
            'time' => $request->time,
            'car_model' => $request->car_model,
            'name'=>$request->name,
            'email'=>$request->email,
            'state' =>$request->state,
            'city' => $request->city,
            'created_at' => $currentdate,
            'updated_at' => $currentdate,
        );
        DB::table('appointments')->insert($data1);

        return redirect('/payment')->with('data submit success');

    }
    public function signup(){


        return view('signup');
    }
    public function create_signup(Request $request){
       // print_r($request->all());die;
        
        $currentdate = date("Y/m/d H:i:s");
        $data1 = array(
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'gender' =>$request->gender,
            'mobile2' =>$request->mobile,
            'dept' =>'1',
            'city' =>'indore',
            'address' =>$request->first_name.' '.$request->last_name,
            'about'=>$request->first_name.' '.$request->last_name,
            'date_birth'=>$currentdate,
            'date_hire'=>$currentdate,
            'date_left'=>$currentdate,
            'password' => $request->password,
            'salary_cur'=>'35000',
            'created_at' => $currentdate,
            'updated_at' => $currentdate,
        );
        DB::table('employees')->insert($data1);

        $id = DB::getPdo()->lastInsertId();

        $data2 = array(
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'context_id' =>$id,
            'type' =>'Employee',
            'created_at' => $currentdate,
            'updated_at' => $currentdate,
        );
        DB::table('users')->insert($data2);


        return redirect('/signup');


    }

    public function new_login(Request $request) {
		

				return view('login');
		
	}

    public function new_calendar(Request $request) {
		

        return view('calendar.calendar');

}

    public function login_user(Request $request) {

		$email = $request->input('email');
		$password = $request->input('password');
		

		$users_context_id = DB::table('users')->where('email', $email)->first();

      

		if (!empty($users_context_id)) {
			$users_context_id_del = DB::table('users')->join('employees', 'employees.id', '=', 'users.context_id')->where('users.email', $email)->where('employees.deleted_at', NULL)->first();

			$users_context_id_delete_date = DB::table('users')->select('employees.deleted_at')->join('employees', 'employees.id', '=', 'users.context_id')->where('users.email', $email)->first();
			$delete_date = $users_context_id_delete_date->deleted_at;

			if (!empty($users_context_id_del)) {

				$user_context_id = $users_context_id->context_id;

				$checkLogin = DB::table('users')->where(['email' => $email, 'password' => $password])->get();

				if (auth()->attempt(['email' => $email, 'password' => $password])) {
					$id = Auth::user()->id;
					

					
                        return redirect('/appointment');
						}
				
			}
		}
		return redirect('/user_login');

	}

    function is_login() {
		return Auth::user();
	}
    public function payment_gatway(Request $request) {
		$data['appointment'] = DB::table('appointments')->select('appointments.*')->get();

        $data['states'] = DB::table('states')->select('states.*')->where('states.country_id', 101)->get();

        $city ="Madhya Pradesh";

        $data['cities'] = DB::table('cities')->select('cities.*')->where('cities.state_id',$city)->get();

        return view('/payment',$data);

}
public function order_place(Request $request) {
    $data['appointment'] = DB::table('appointments')->select('appointments.*')->get();

    $data['states'] = DB::table('states')->select('states.*')->where('states.country_id', 101)->get();

    $city ="Madhya Pradesh";

    $data['cities'] = DB::table('cities')->select('cities.*')->where('cities.state_id',$city)->get();

    return view('/order',$data);

}
public function payment(Request $request){
    // print_r( $request->all());die;
    $data2 = array(
        'card' => $request->card,
        'cv' => $request->cv,
        'pay' =>$request->pay,
        'order'=>$request->order,
        'create_date' => date('y-m-d'),
        
    );
    DB::table('payments')->insert($data2);
    return view('/success')->with('data submit success');

}
    public function order(Request $request){

        // We define our address
           $address1 = $request->pickup;
           $address2 = $request->dropup;
           
          $dist= $this->getdistance($request);
          
            // $pickup=$this->get_lat_long_pickup($address1);
            // $dropup=$this->get_lat_long_dropup($address2);
            // print_r();
           

        // $pickup_lat=$pickup['lat'];
        // $dropup_lat=$dropup['lat'];
        // $pickup_log=$pickup['lng'];
        // $dropup_log=$dropup['lng'];
        // $unit= 'km';
        // $theta = $pickup_log - $dropup_log;
        // $dist = sin(deg2rad($pickup_lat)) * sin(deg2rad($dropup_lat)) +  cos(deg2rad($pickup_lat)) * cos(deg2rad($dropup_lat)) * cos(deg2rad($theta));
        // $dist = acos($dist);
        // $dist = rad2deg($dist);
        // $miles = $dist * 60 * 1.1515;
        // $unit = strtoupper($unit);

        // if ($unit == "K") {payment
        //     $kilometers= ($miles * 1.609344);
        //     } else if ($unit == "N") {
        //     return ($miles * 0.8684);
        //     } else {
        //     return $miles;
        //     }
        $pr_dat = str_replace(' km', '', $dist); //Remove 
        $price= $pr_dat*5;
        
        $data2 = array(
            'name' => $request->name,
            'email' => $request->email,
            'order' => $request->order,
            'pickup' =>$request->pickup,
            'dropup' =>$request->dropup,
            'price' =>$price,
            'distance'=>$dist,
            'create_date' => date('y-m-d'),
            
        );
        DB::table('orders')->insert($data2);
    //    $id = DB::getPdo()->lastInsertId();
        $city ="Madhya Pradesh";
        $data['cities'] = DB::table('cities')->select('cities.*')->where('cities.state_id',$city)->get();
        
// print_r($data);die;
        return view('/payment',$data);

           
    }
    function get_lat_long_pickup($address1) {
        $apiKey ='AIzaSyBWw7nuWmfNgSvo1yiueaRRLX37726AsWU';
        $array = array();
        $address = urlencode($address1);
         $api='https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key='.$apiKey.'';
        $geo = file_get_contents($api);
        $geo = json_decode($geo, true);
        // print_r($geo);die;
        if ($geo['status'] = 'OK') {
           $latitude = $geo['results'][0]['geometry']['location']['lat'];
           $longitude = $geo['results'][0]['geometry']['location']['lng'];
           $array = array('lat'=> $latitude ,'lng'=>$longitude);
        }
     
        return $array;
     }
     function get_lat_long_dropup($address2) {
        $apiKey ='AIzaSyBWw7nuWmfNgSvo1yiueaRRLX37726AsWU';
        $array = array();
        $address = urlencode($address2);
         $api='https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key='.$apiKey.'';
        $geo = file_get_contents($api);
        $geo = json_decode($geo, true);
                // print_r($geo);die;

        if ($geo['status'] = 'OK') {
           $latitude = $geo['results'][0]['geometry']['location']['lat'];
           $longitude = $geo['results'][0]['geometry']['location']['lng'];
           $array = array('lat'=> $latitude ,'lng'=>$longitude);
        }
     
        return $array;
     }
     public function getdistance(Request $request)
 {
   
    // $apiKey ='AIzaSyBWw7nuWmfNgSvo1yiueaRRLX37726AsWU';
  $currentaddress1 =$request->pickup;
  $currentaddress2 =$request->dropup;
//   $from = '4429 North Broadway, Chicago, IL, United States';
  $remFrom = str_replace(',', '', $currentaddress1); //Remove Commas
 $from = urlencode($remFrom);
$to = $currentaddress2;
$remTo = str_replace(',', '', $to); //Remove Commas
  $to = urlencode($remTo);
 $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false&key=AIzaSyBWw7nuWmfNgSvo1yiueaRRLX37726AsWU");
  $data = json_decode($data,true);
//   print_r($data);die;
 $distance = $data['rows'][0]['elements'][0]['distance']['text'];

  return $distance;
   }

}