<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	Use Perpus;

	class AdminDataSertifikasiController extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->table = "data_sertifikasi";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Peserta","name"=>"user_id","join"=>"cms_users,id"];
			$this->col[] = ["label"=>"Submit Status","name"=>"submit_status"];
			$this->col[] = ["label"=>"Kluster","name"=>"kluster_id","join"=>"klusters,id"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Peserta','name'=>'user_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'user,id'];
			$this->form[] = ['label'=>'Submit Status','name'=>'submit_status','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kluster','name'=>'kluster_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'kluster,id'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"User Id","name"=>"user_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"user,id"];
			//$this->form[] = ["label"=>"Submit Status","name"=>"submit_status","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Kluster Id","name"=>"kluster_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"kluster,id"];
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
		
		public function getIndex(){
			$data = DB::table('data_sertifikasi')
								->leftJoin('data_pribadi','data_sertifikasi.id','=','data_pribadi.sertifikasi_id')
								->leftJoin('ref_status', 'ref_status.id','=','data_sertifikasi.submit_status')
								->leftJoin('klusters', 'klusters.id','=', 'data_sertifikasi.kluster_id')
								->leftJoin('jadwal_asesmen', 'jadwal_asesmen.id', '=', 'data_sertifikasi.jadwal_id')
								->select('data_sertifikasi.*','ref_status.status', 'klusters.kluster_code',
								  'data_pribadi.nama','jadwal_asesmen.tanggal_mulai','jadwal_asesmen.tanggal_selesai' )
								->whereIn('data_sertifikasi.submit_status',[2,3,5,6,7])
								->get();
			
			return view('dashboard.admin', compact('data'));
		}

		public function approve(){
			$id_sertifikasi = request('sertifikasi_id');
			$peserta_id = request('peserta_id');
			$status = intval(request('status'));
			$note = request('note');


			DB::table('data_sertifikasi')->where('id', $id_sertifikasi)->update(array('submit_status'=>$status));

			Perpus::logHistory($id_sertifikasi,$note,$status);

			$pesan = "";
			if($status === 3 ) $pesan = 'Pengajuan Sertifikasi Diterima!';
			else $pesan = 'Pengajuan Sertifikasi Ditolak!';

			$peserta = array();
			array_push($peserta, $peserta_id);

			//send notification to admin
			$config = [];
			$config['content'] = $pesan;
			$config['to'] = '/admin/data_sertifikasi38';
			$config['id_cms_users'] = $peserta;

			CRUDBooster::sendNotification($config);

			CRUDBooster::redirect(config('crudbooster.ADMIN_PATH').'/data_sertifikasi','Sukses menyimpan perubahan data sertifkasi!','Info');
			
		}

		public function buatJadwal(){
			$id_sertifikasi = request('sertifikasi_id');
			$peserta_id = request('peserta_id');
			$jadwal = request('jadwal_id');

			DB::table('data_sertifikasi')->where('id', $id_sertifikasi)->update(['jadwal_id'=>$jadwal]);

			$peserta = array();
			array_push($peserta, $peserta_id);

			//send notification to admin
			$config = [];
			$config['content'] = $pesan;
			$config['to'] = '/admin/sertifikasi/view/'.$id_sertifikasi;
			$config['id_cms_users'] = $peserta;

			CRUDBooster::sendNotification($config);

			CRUDBooster::redirect(config('crudbooster.ADMIN_PATH').'/data_sertifikasi','Sukses membuat jadwal asesmen!','Info');
		}

		public function inputSertifikat(){
			$sertifikasi_id = request('sertifikasi_id');
			$nama = request('nama_peserta');
			$kluster_id = request('kluster_id');
			$hasil = (int) request('hasil');
			
			if($hasil === 1) {
				$sertifakat = array('nama'=>$nama, 'kluster_id'=>$kluster_id, 'sertifikasi_id'=>$sertifikasi_id);
				$id_sertifikat = DB::table('sertifikat')->insertGetId($sertifakat);

				DB::table('data_sertifikasi')->where('id', $sertifikasi_id)->update(array('submit_status'=>6));
				Perpus::logHistory($sertifikasi_id,'Completed',6);
			
				CRUDBooster::redirect(config('crudbooster.ADMIN_PATH').'/sertifikat/edit/'.$id_sertifikat,null, null);
			}
			else {
				DB::table('data_sertifikasi')->where('id', $sertifikasi_id)->update(array('submit_status'=>7));
				Perpus::logHistory($sertifikasi_id,'Failed',7);
				CRUDBooster::redirect(config('crudbooster.ADMIN_PATH').'/data_sertifikasi',null, null);
			}
		}



	    //By the way, you can still create your own method in here... :) 


	}