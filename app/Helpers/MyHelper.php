<?php
class MyHelper{

    private $session;
    private $file;

    public function __construct(){
        $this->session  = session();
        $this->file     = new \CodeIgniter\Files\File($path);
    }

   /*set view day*/
    public function header_tanggal(){
        $tanggal = date('Y-m-d');
        $hari = array ( 1 => 'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu'
        );
        $bulan = array (1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
        );
        $split      = explode('-', $tanggal);
        $tgl_indo   = $split[2].'-'.$bulan[(int)$split[1]].'-'.$split[0];
        $num        = date('N', strtotime($tanggal));
        return $hari[$num].', '.$tgl_indo;
    }

    public function getHari($date){
        $hari = array ( 1 => 'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu'
        );
        $num = date('N', strtotime($date));
        return $hari[$num];
    }
    /*set view day*/

    public function print_rv($var){
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }

    public function scan_sanitize($var){
        if (is_array($var)) {
			foreach ($var as $key => $val) {
				$return[$key] = scan_sanitize($val);
			}
		} elseif (is_object($var)) {
			foreach ($var as $obj => $val) {
				$return = new stdClass();
				$return->{$obj} = scan_sanitize($val);
			}
		} else {
			$var 	= $CI->security->xss_clean(trim($var));
			$return = filter_var($var, FILTER_SANITIZE_STRING);
		}
		return $return;
    }
    function nextDay($day){
        $tomorrow = date("Y-m-d", strtotime($day." day"));
        return $tomorrow;
    }
    /*next day */

    function convertToRupiah($angka,$prefix){
        $to_rupiah = $prefix." " . number_format($angka,3,',','.');
	    return $to_rupiah;
    }
    /*convert 0000 to rupiah *
    
    /* file view */
    function file_view($filename,$path){
        $res = array();
        $filename = scan_sanitize(json_decode($filename));
        if(is_array($filename)){
            if(count($filename) > 0){
                foreach($filename as $item){
                    $tahun = substr($item,0 ,4);
                    $bulan = substr($item,4 ,2);
                    if($tahun != '' && $bulan != ''){
                        $res[] = array(
                            'path'          => $path.$tahun.'/'.$bulan.'/'.$item,
                            'filename'      => substr($item, 16),
                            'filename_full' => $item
                        );
                    }
                }
            }
        }
        return $res;
    }
    /* file view */

    /* redirect session */
    function getPageAttr($alt){
        $allMenu = $this->session->get('menu');
        if($allMenu != ''){
            $res = array();
            foreach($allMenu as $item){
                if($item->Menu_link == $alt){
                    $res = array(
                        'alt'       => $item->Menu_link,
                        'icon'      => $item->Menu_icon,
                        'title'     => $item->Menu_title 
					);
					break;
                }
            }
            return $res;
        }
    }
    /* redirect session */

    /*replace filename */
    public function replace_filename_string($string){
        $arr_system = array("fputs", "filemtime", "is_dir", "is_executable", "is_file", "is_link", "realpath", "basename", "filesize","script");
        $string = str_ireplace($arr_system,"",$string);
        $string = preg_replace("/[^0-9a-zA-Z .,-_()]/","",$string);
        $string = basename($string);
		return $string;
    }
    /*replace filename */

    /* function fileupload */
    public function upload_file($file_upload, $path){
        $cek_err_upload = 0;
        $data = array();

        for($i=0; $i < count($file_upload['size']); $i++){
            if($file_upload['size'][$i] > 0 ){
                $path_upload = $path;
                
                if(!file_exists($path_upload)){
                    mkdir($path_upload, 0755, true);
                }

                $rule = [
                    'file' => 'uploaded[file]|max_size[file,2048]ext_in['.getEnv('app.upload_allowed_ext'),
                    'errors' => [
                        'uploaded' => 'Harus Ada File yang diupload',
                        'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                        'max_size' => 'Ukuran File Maksimal 2 MB'
                    ],
                ]
                ;
                
                $data = array();
                if(!$this->validate($rule)){
                    $data['success']        = false;
                    array_push($data,[$rule['errors'] => $this->validate->getError()]);
                }
                else{
                    $filename = date("Ymd_His").'_'.replace_filename_string($this->getName());
                    if(!$this->file->move($path_upload,$filename)){
                        $cek_err_upload += 1;
                    }
                }
            }
        }
        if($cek_err_upload > 1){
            $data['success'] = false;
            $data['message'] = 'upload gagal';
        }
        else{
            $data['success'] = true;
            $data['message'] = 'upload gagal';
        }

        echo json_encode($data);
    }
    /* function fileupload */

    /* unlink file */
    public function unlink_file($file, $path){
        if(count($lampiran) > 0 ){
            foreach($lampiran as $item){
                $item = replace_filename_string($item);
                $item = trim(scan_sanitize($item));
                $tahun = trim(substr($item, 0,4));
                $bulan = trim(substr($item, 4,2));
                if($tahun!='' && $bulan!='' && $item!=''){
                    $filepath = FCPATH.$path.$tahun.'/'.$bulan.'/'.$item;
                    if(file_exists($filepath) && is_readable($filepath)){
                        unlink($filepath);
                    }
                }
            }
        }
    }
    /* unlink file */
}
?>