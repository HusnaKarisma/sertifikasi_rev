<?php namespace App\Http\Controllers;

	use Session;
	// use Request;
	use DB;
	use CRUDBooster;
	use Perpus;
	use Illuminate\Http\Request;
	
	
	class AdminUjianMandiriController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "ujian_mandiri";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Sertifikasi Id","name"=>"sertifikasi_id","join"=>"data_sertifikasi,id"];
			$this->col[] = ["label"=>"Unit Id","name"=>"unit_id","join"=>"unit_kompetensi,id"];
			$this->col[] = ["label"=>"Unit Detail Id","name"=>"unit_detail_id","join"=>"unit_kluster_details,id"];
			$this->col[] = ["label"=>"Assesmen Id","name"=>"assesmen_id","join"=>"assesments,id"];
			$this->col[] = ["label"=>"Kompetensi","name"=>"kompetensi"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Sertifikasi Id','name'=>'sertifikasi_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'data_sertifikasi,id'];
			$this->form[] = ['label'=>'Unit Id','name'=>'unit_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'unit_kompetensi,unit_title'];
			$this->form[] = ['label'=>'Unit Detail Id','name'=>'unit_detail_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'unit_kluster_details,id'];
			$this->form[] = ['label'=>'Assesmen Id','name'=>'assesmen_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'assesments,question'];
			$this->form[] = ['label'=>'Kompetensi','name'=>'kompetensi','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Sertifikasi Id","name"=>"sertifikasi_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"sertifikasi,id"];
			//$this->form[] = ["label"=>"Unit Id","name"=>"unit_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"unit,id"];
			//$this->form[] = ["label"=>"Unit Detail Id","name"=>"unit_detail_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"unit_detail,id"];
			//$this->form[] = ["label"=>"Assesmen Id","name"=>"assesmen_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"assesmen,id"];
			//$this->form[] = ["label"=>"Kompetensi","name"=>"kompetensi","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Modified At","name"=>"modified_at","type"=>"datetime","required"=>TRUE,"validation"=>"required|date_format:Y-m-d H:i:s"];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



		//By the way, you can still create your own method in here... :) 
		public function getIndex(){
			$sertifikasi = Perpus::getActiveRegistration();
			$units = Perpus::getUnitList($sertifikasi->kluster_id);
			$done = Perpus::isAlreadyAsesmentMandiri($sertifikasi->id);
			
			return view('peserta.um.um', compact('units','sertifikasi','done'));
		}

		public function getUnitList($kluster_id){
			$result = Perpus::getUnitList($kluster_id);
			$units = json_decode(json_encode($result), true);
			return response() -> json($units, 200);
		}

		public function getUnitDetails($unit_id){
			$result = Perpus::getUnitDetail($unit_id);
			$details = json_decode(json_encode($result), true);
			return response() -> json($details, 200);
		}

		public function getAssesment($detail_id){
			$result = Perpus::getAssesment($detail_id);
			$details = json_decode(json_encode($result), true);
			return response() -> json($details, 200);
		}

		public function sumbit(Request $request){
			$sertifikasi_id = $request->sertifikasiId;
			$units = $request->unit;
			$unit_details = $request->unit_detail;
			$asesments = $request->asesment;
			$checks = $request->kompetensi;

			$ums = array();

		    $valid = true;

			foreach($units as $key => $value){
				
				if($checks[$key] === 0) $valid = false;

				$ums[] = array( 'sertifikasi_id' => $sertifikasi_id,
								'unit_id' => $units[$key], 
								'unit_detail_id' => $unit_details[$key],
								'assesmen_id' => $asesments[$key],
								'kompetensi' => $checks[$key],
								'created_at' => date("Y-m-d H:i:s"));
			}


			DB::table('ujian_mandiri')->insert($ums);
			DB::table('data_sertifikasi')->where('id', $sertifikasi_id)->update(['submit_status' => 5]);
			Perpus::logHistory($sertifikasi_id,'Asesmen Mandiri',5,CRUDBooster::myId());
			

			CRUDBooster::redirect(config('crudbooster.ADMIN_PATH').'/ujian_mandiri','Data Asesmen Mandiri Sukses disubmit!','info');
	
		}


	}