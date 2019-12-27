<?php

namespace App\Helpers;
 
use DB;
use CRUDBooster;

 
class Perpus {

    public static function checkLatestPengajuan($user_id=0) {
      $pengajuan  = self::getPengajuan($user_id);
    //   $dokumen    = DB::table('v_dokumen')->where('user_id',CRUDBooster::myId())->first();

      $latest     = $pengajuan->first();
      $log        = self::getLog($latest->id);

      $data=array();
      $data['latest']   = $latest;
      $data['count']    = count($pengajuan->get());
      $data['dokumen']  = $dokumen;
      $data['log']      = $log;
      
      return $data;
    }

    public static function getPengajuan($user_id=0)
    {
      $pengajuan  = DB::table('data_sertifikasi')->where('user_id',$user_id)->orderBy('id','desc');

      return $pengajuan;
    }

    public static function getLog($sertifikasi_id=0)
    {
        $log  = DB::table('sertifikasi_log')
                  ->select('sertifikasi_log.*','ref_status.*','cms_users.name')
                  ->leftJoin('ref_status','ref_status.id','=','sertifikasi_log.status_id')
                  ->leftJoin('cms_users','cms_users.id','=','sertifikasi_log.created_by')
                  ->where('sertifikasi_id',$sertifikasi_id)->get();

        return $log;
    }

    public static function getAdmin(){
      $data = DB::table('cms_users')
              ->whereIn('id_cms_privileges',[4,1])
              ->select('id')
              ->get();
      return $data;
    }

    

    public static function getSertifikasi($sertifikasi_id=0)
    {
        $data  = DB::table('data_sertifikasi')
                  ->where('id',$kompetensi_id)
                  ->first();

        return $data;
    }

    public static function getListPendidikan(){
      $db = env('DB_PERPUS');
      $pendidikan = DB::table($db.'.list_Pendidikan')->get();

      return $pendidikan;
    }

    public static function importPustakawan($nip=0)
    {
      $db = env('DB_PERPUS');

      $pustakawan  = DB::table($db.'.tb_Pustakawan')
          ->leftJoin($db.'.list_TempatLahir', 'list_TempatLahir.id', '=', 'tb_Pustakawan.IDTempatLahir')
          ->leftJoin($db.'.list_Pendidikan', 'list_Pendidikan.id', '=', 'tb_Pustakawan.IDPendidikan')
          ->leftJoin($db.'.list_Bidang', 'list_Bidang.id', '=', 'tb_Pustakawan.IDBidang')
          ->leftJoin($db.'.list_Pangkat', 'list_Pangkat.id', '=', 'tb_Pustakawan.IDPangkat')
          ->leftJoin($db.'.list_Jabatan', 'list_Jabatan.id', '=', 'tb_Pustakawan.IDJabatan')
          ->leftJoin($db.'.list_JenisInstansi', 'list_JenisInstansi.id', '=', 'tb_Pustakawan.IDInstansi')
          ->leftJoin($db.'.list_TenagaTeknis', 'list_TenagaTeknis.id', '=', 'tb_Pustakawan.IDTenagaTeknis')
          ->leftJoin($db.'.list_direktorat', 'list_direktorat.id', '=', 'tb_Pustakawan.IDDirektorat')
          ->leftJoin($db.'.list_JabatanSwasta', 'list_JabatanSwasta.id', '=', 'tb_Pustakawan.IDDirektorat')
          ->select($db.'.tb_Pustakawan.*', $db.'.list_TempatLahir.TempatLahir', $db.'.list_Pendidikan.Pendidikan' )
          ->where('nip', $nip)
          ->first();

        return $pustakawan;
    }

    public static function getInstansi($id=0)
    {
      $instansi  = DB::table($db.'.tb_Instansi')
          ->leftJoin($db.'.list_Propinsi','list_Propinsi.id','=','IDPropinsi')
          ->leftJoin($db.'.list_Kota','list_Kota.id','=','IDKota')        
          ->where('tb_Instansi.id',$id);

      return $instansi;
    }

    public static function copyFromLatest($user_id=0, $latest_id=0) {
      // return new kompetensi id
      $new_id = 1; 
      return $new_id;
    }

    public static function getActiveRegistration(){
      $sertifikasi = DB::table('data_sertifikasi')
                     ->join('klusters', 'klusters.id', '=', 'data_sertifikasi.kluster_id')
                     ->select('data_sertifikasi.*', 'klusters.kluster_code','klusters.kluster_name')
                     ->whereIn('data_sertifikasi.submit_status',[3,5])->first();
                
      return $sertifikasi;               
    }

    public static function isAlreadyAsesmentMandiri($sertifikasi_id){
      $um = DB::table('ujian_mandiri')->where('sertifikasi_id', $sertifikasi_id)->count();
      if($um === 0) return false;
      return true;
    }

    public static function getUnitList($kluster_id){
      $units = DB::table('unit_kompetensi')
              ->join('unit_klusters', 'unit_kompetensi.id','=', 'unit_klusters.unit_id')
              ->select('unit_kompetensi.*')
              ->where('unit_klusters.kluster_id',$kluster_id)->get();
      return $units;
    }
   
    public static function logHistory($kompetensi_id=0,$message='',$status=0,$created_by=0)
    {
      // for api
      $created_by = ($created_by!==0)?$created_by:CRUDBooster::myId();

      $data=array(
                  'sertifikasi_id'=>$kompetensi_id,
                  'status_id'=>$status,
                  'message'=>$message,
                  'created_at'=>date("Y-m-d H:i:s"),
                  'created_by'=>$created_by
                );

      $log = DB::table('sertifikasi_log')->insertGetId($data);

      return $log;
    }

    public static function getUnitDetail($unit_id){
      $details =  DB::table('unit_kluster_details')->where('unit_kluster_id', $unit_id)->get();
      return $details;
    }

    public static function getAssesment($detail_unit_id){
      $assesments = DB::table('assesments')->where('unit_detail_id', $detail_unit_id)->get();
      return $assesments;
    }

   
}