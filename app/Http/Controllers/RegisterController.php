<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Request;
use DB;
use CRUDbooster;
use Schema;

class RegisterController extends \crocodicstudio\crudbooster\controllers\CBController {

  public function cbInit() {
    # START CONFIGURATION DO NOT REMOVE THIS LINE
    $this->table               = 'cms_users';
    $this->primary_key         = 'id';
    $this->title_field         = "name";
    $this->button_action_style = 'button_icon'; 
    $this->button_import     = FALSE; 
    $this->button_export     = FALSE; 
    # END CONFIGURATION DO NOT REMOVE THIS LINE
  
    # START COLUMNS DO NOT REMOVE THIS LINE
    $this->col = array();
    $this->col[] = array("label"=>"Name","name"=>"name");
    // $this->col[] = array("label"=>"NIP","name"=>"nip");
    $this->col[] = array("label"=>"Email","name"=>"email");
    $this->col[] = array("label"=>"Privilege","name"=>"id_cms_privileges","join"=>"cms_privileges,name");
    $this->col[] = array("label"=>"Photo","name"=>"photo","image"=>1);    
    # END COLUMNS DO NOT REMOVE THIS LINE

    # START FORM DO NOT REMOVE THIS LINE
    $this->form = array();    
    // $this->form[] = array("label"=>"Name","name"=>"nip",'required'=>true,'validation'=>'required|alpha_num|min:3');
    $this->form[] = array("label"=>"Email","name"=>"email",'required'=>true,'type'=>'email','validation'=>'required|email|unique:cms_users,email,'.CRUDBooster::getCurrentId());    
    $this->form[] = array("label"=>"Password","name"=>"password","type"=>"password","help"=>"Please leave empty if not change");
    # END FORM DO NOT REMOVE THIS LINE
        
  }

  public function add() {
    $data = [];
    $subpage = 'Registration';
    
    return view('register.form',compact('subpage'));
  }

  public function confirm() {
    $page_title = $subpage = 'Register Success';
    return view('register.success',compact('page_title', 'subpage'));
 }

  public function postadd() {
        $this->cbLoader();

        $this->validation();
        $this->input_assignment();      
        $this->arr[$this->primary_key] = $id = CRUDBooster::newId($this->table);        

        DB::table($this->table)->insert($this->arr);        

        //Looping Data Input Again After Insert
        foreach($this->data_inputan as $ro) {
            $name = $ro['name'];
            if(!$name) continue;

            $inputdata = Request::get($name);
            
        }


        $this->hook_after_add($this->arr[$this->primary_key]);


        $this->return_url = ($this->return_url)?$this->return_url:Request::get('return_url');

        //insert log
        CRUDBooster::insertLog(trans("crudbooster.log_add",['name'=>$this->arr[$this->title_field],'module'=>CRUDBooster::getCurrentModule()->name]));

        if($this->return_url) {
            if(Request::get('submit') == trans('crudbooster.button_save_more')) {
                CRUDBooster::redirect(Request::server('HTTP_REFERER'),trans("crudbooster.alert_add_data_success"),'success');
            }else{
                CRUDBooster::redirect($this->return_url,trans("crudbooster.alert_add_data_success"),'success');
            }

        }else{
            if(Request::get('submit') == trans('crudbooster.button_save_more')) {
                CRUDBooster::redirect(CRUDBooster::mainpath('add'),trans("crudbooster.alert_add_data_success"),'success');
            }else{
                CRUDBooster::redirect(CRUDBooster::mainpath(),trans("crudbooster.alert_add_data_success"),'success');
            }
        }
    }
}