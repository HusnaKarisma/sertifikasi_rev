<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;
		use Illuminate\Support\Facades\Hash;
		use Log;

		class ApiPostPustakawanController extends \crocodicstudio\crudbooster\controllers\ApiController {

				var $data = array();

		    function __construct() {    
				$this->table       = "cms_users";        
				$this->permalink   = "post_pustakawan";    
				$this->method_type = "post";
		    }

		    public function hook_validate(&$postdata) {

		    	// check email
		    	$email = $postdata['email'];
				$checkmail = DB::table('cms_users')->where('email',$email)->first();

					if($checkmail) {
						$this->hook_api_message = 'Email already registered!';
						$this->validate = true;
					}

		    	// check NIP
		    	// $nip = $postdata['nip'];
				// 	$checknip = DB::table('cms_users')->where('nip',$nip)->first();;

				// 	if($checknip) {
				// 		$this->hook_api_message = 'NIP registered!';
				// 		$this->validate = true;
				// 	}
		    }

		    public function hook_before(&$postdata) {
	        //This method will be execute before run the main process

		    	$passwd = substr(md5(microtime()),rand(0,26),5);
		    	$postdata['password'] 					= Hash::make($passwd);
		    	$postdata['id_cms_privileges'] 	= 2;

		    	$this->data = $postdata;
				$this->data['passwd'] = $passwd;

				Log::info('ini pwd '.$passwd);

				
				// Console::info($passwd);
				// $this->line('ini pwd '.$passwd);
		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

				// send email
				Log::info($data);
		    	$data = $this->data;
          		CRUDBooster::sendEmail(['to'=>$data['email'],'data'=>$data,'template'=>'konfirmasi-pendaftaran']);
		    }

		}