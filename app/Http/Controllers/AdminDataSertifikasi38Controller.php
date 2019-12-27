<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use Log;
	use Perpus;

	class AdminDataSertifikasi38Controller extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->col[] = ["label"=>"Peserta","name"=>"user_id","join"=>"cms_users,name"];
			$this->col[] = ["label"=>"Submit Status","name"=>"submit_status"];
			$this->col[] = ["label"=>"Kluster Id","name"=>"kluster_id","join"=>"klusters,kluster_name"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'User','name'=>'user_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'user,id'];
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
			$check = Perpus::checkLatestPengajuan(CRUDBooster::myId());

			$history = DB::table('data_sertifikasi')
						->select('data_sertifikasi.*','ref_status.status', 'klusters.kluster_code')
						->leftJoin('ref_status', 'ref_status.id','=','data_sertifikasi.submit_status')
						->leftJoin('klusters', 'klusters.id','=', 'data_sertifikasi.kluster_id')
						->where('user_id',CRUDBooster::myId())
						->get();
			$active = DB::table('data_sertifikasi')
						->leftJoin('jadwal_asesmen', 'jadwal_asesmen.id','=', 'data_sertifikasi.jadwal_id')
						->where('data_sertifikasi.user_id',CRUDBooster::myId())	
						->orderByRaw('data_sertifikasi.id desc')
						->select('data_sertifikasi.*', 'jadwal_asesmen.*')
						->limit(1)
						->first();		
			
			return view('peserta.index',compact('history','check','active'));
		}

		public function getPustakawan($nip){
			$result = Perpus::importPustakawan($nip);
			$pustakawan = json_decode(json_encode($result), true);
			$time = strtotime($pustakawan['TanggalLahir']);

			$newformat = date('Y-m-d',$time);

			$pustakawan['TanggalLahir'] = $newformat;
			return response() -> json($pustakawan, 200);
		}

		public function getKabutpaten($prop){
			$result = DB::table('geo_regencies')->where('province_id', $prop)->orderByRaw('name')->get();
			$kabupaten = json_decode(json_encode($result), true);
			return response() -> json($kabupaten, 200);
		}
		public function getKecamatan($kab){
			$result = DB::table('geo_districts')->where('regency_id', $kab)->orderByRaw('name')->get();
			$kabupaten = json_decode(json_encode($result), true);
			return response() -> json($kabupaten, 200);
		}
		public function getKelurahan($kec){
			$result = DB::table('geo_villages')->where('district_id', $kec)->orderByRaw('name')->get();
			$kabupaten = json_decode(json_encode($result), true);
			return response() -> json($kabupaten, 200);
		}

		public function getAdd(){
			$klusters = DB::table('klusters')->get();
			$propinsi = DB::table('geo_provinces')->orderByRaw('name')->get();
			$tujuan = array('RPL', 'Pencapaian Proses Pembelajaran', 'RCC', 'Sertifikasi','Lainnya');
			$pendidikan = Perpus::getListPendidikan();

			return view('peserta.daftar', compact('klusters','tujuan','propinsi', 'pendidikan'));
		}

		public function viewSertifikasi($id){
			$peserta = DB::table('data_sertifikasi')
							->leftJoin('data_pribadi', 'data_sertifikasi.id', '=', 'data_pribadi.sertifikasi_id')
							->leftJoin('klusters','klusters.id', '=', 'data_sertifikasi.kluster_id')
							->leftJoin('dokumen_sertifikasi','data_sertifikasi.id','=','dokumen_sertifikasi.sertifikasi_id')
							->leftJoin('jadwal_asesmen', 'jadwal_asesmen.id','=', 'data_sertifikasi.jadwal_id')
							->select('data_sertifikasi.*', 'data_pribadi.nama', 'klusters.kluster_name',
									 'klusters.kluster_code', 'dokumen_sertifikasi.photo', 'dokumen_sertifikasi.scan_ktp',
									 'dokumen_sertifikasi.scan_ijazah','dokumen_sertifikasi.scan_sk','jadwal_asesmen.tanggal_selesai',
									 'dokumen_sertifikasi.id as document_id', 'jadwal_asesmen.tanggal_mulai')
							->where('data_sertifikasi.id',$id)
							->first();

			$sqlUnit = "select unit_kompetensi.*, dokumen_pendukung.id as id_dokumen_pendukung, "
					   ."dokumen_pendukung.dokumen_pendukung from data_sertifikasi join klusters "
					   ."on klusters.id=data_sertifikasi.kluster_id join unit_klusters "
					   ."on klusters.id=unit_klusters.kluster_id join unit_kompetensi "
					   ."on unit_kompetensi.id=unit_klusters.unit_id left join dokumen_pendukung "
					   ."on data_sertifikasi.id=dokumen_pendukung.sertifikasi_id and "
					   ."klusters.id=dokumen_pendukung.kluster_id and "
					   ."unit_kompetensi.id=dokumen_pendukung.unit_id "
					   ."where data_sertifikasi.id=:ser_id";
			$units =  collect(DB::select($sqlUnit, array('ser_id'=>$id)));	
			
			$logs = DB::table('sertifikasi_log')
						->where('sertifikasi_id', $id)
						->where('status_id', '<>', 1)
						->get();

			$jadwal = DB::table('jadwal_asesmen')->whereRaw('tanggal_mulai > now() and deleted_at is null')->get();

			// dd($logs);
			return view('peserta.sertifikasi', compact('peserta','units','jadwal','logs'));
		}

		public function register(){
			$check = Perpus::checkLatestPengajuan(CRUDBooster::myId());

			if($check['count'] == 0){

				$kluster_id = request('kluster_id');

				$units = DB::table('unit_klusters')->where('kluster_id', $kluster_id)->get();

				$sertifikasi = array('user_id'=>CRUDBooster::myId(), 'kluster_id'=>$kluster_id,
				'tujuan_sertifikasi'=>request('tujuan_id'),'tujuan_lainnya'=>request('inputTujuan'),
				'tipe'=>request('tipeSertifikasi'),'nip'=>request('inputNip'), 'ktp'=>request('inputKtp'),
				'submit_status'=>1, 'created_at'=>date("Y-m-d H:i:s"));

				$id_sertifikasi = DB::table('data_sertifikasi')->insertGetId($sertifikasi);

				$data_pribadi = array('nama'=>request('inputNama'),'tanggal_lahir'=>request('inputTanggalLahir'),
				'tempat_lahir'=>request('inputTempatLahir'),'jk'=>request('jkSelect'), 'province_id'=>request('propinsi_id'),
				'regency_id'=>request('kabupaten_id'),'district_id'=>request('kecamatan_id'), 'alamat'=>request('inputAlamat'),
				'village_id'=>request('desa_id'),'kodepos'=>request('inputPos'), 'telp_rumah'=>request('noTelp'),
				'telp_kantor'=>request('inputTelpKantor'),'telp'=>request('inputHP'), 'sertifikasi_id'=> $id_sertifikasi,
				'pendidikan_terakhir'=>request('pendidikan'),'created_at'=>date("Y-m-d H:i:s"),'kebangsaan' =>
				request('kebangsaanInput'),);

				DB::table('data_pribadi')->insertGetId($data_pribadi);

				$data_pekerjaan = array('sertifikasi_id'=>$id_sertifikasi, 'nama_instansi'=>request('inputInstansi'),
				'jabatan'=>request('inputJabatan'), 'desa_id'=>request('desa_id_instansi'), 'kecamatan_id'=>
				request('kecamatan_id_instansi'),'kabupaten_id'=>request('kabupaten_id_instansi'), 'propinsi_id'=>
				request('propinsi_id_instansi'), 'alamat'=>request('inputAlamatInstansi'), 'kode_pos'=>
				request('inputPosInstansi'), 'no_telp'=>request('inputTelpInstansi'), 'no_fax'=>request('inputFaxInstansi'));

				DB::table('data_pekerjaan')->insertGetId($data_pekerjaan);

				$contact = array('sertifikasi_id'=>$id_sertifikasi);
				DB::table('dokumen_sertifikasi')->insertGetId($contact);

				foreach($units as $unit){
					$pendukung = array('sertifikasi_id'=>$id_sertifikasi, 'kluster_id'=>$kluster_id, 
										'unit_id'=>$unit->unit_id);
					DB::table('dokumen_pendukung')->insertGetId($pendukung);						
				}

				Perpus::logHistory($id_sertifikasi,'',1);

				CRUDBooster::redirect(config('crudbooster.ADMIN_PATH').'/data_sertifikasi38','Draft Sertifikasi Berhasil ditambahkan!','info');
			}

			// 1 draft
			// 2 submit
			// 3 review
			// 4 reject  [reject back to 1]
			// 5 approve
			// 6 ujian
			// 7 gak lulus nunggu kebijakan
			// 8 lulus

			return view('peserta.test');

			//Log::info('masuk sisni  '.request('kluster_id'));

			// CRUDBooster::redirect(config('crudbooster.ADMIN_PATH').'/data_sertifikasi38');
		}

		public function submit(){
			$id_sertifikasi = request('sertifikasi_id');
			$nama = request('nama_peserta');

			$admin = array();
			$datas = Perpus::getAdmin();
			foreach($datas as $data){
				array_push($admin, $data->id);
			}
			//update status to submit
			DB::table('data_sertifikasi')->where('id', $id_sertifikasi)->update(array('submit_status'=>2));
			
			Perpus::logHistory($id_sertifikasi,'Submitted',2);

			//send notification to admin
			$config = [];
			$config['content'] = $nama.' Daftar Sertifikasi Kompetensi';
			$config['to'] = '/admin/sertifikasi/view/'.$id_sertifikasi;
			$config['id_cms_users'] = $admin;

			CRUDBooster::sendNotification($config);

			CRUDBooster::redirect(config('crudbooster.ADMIN_PATH').'/data_sertifikasi38','Data Sertifikasi Berhasil Disubmit!','info');

		}

	}