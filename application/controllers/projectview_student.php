<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_student extends CI_Controller {
	var $data = array();
	function __construct()
	{
		parent::__construct();	
		$this->load->model('Project_model');
		session_start();
		$this->load->helper(array('form','url'));
		$this->load->library('Deczip');
		$this->load->library('Datamodel');
		$this->load->library('Uploadfiles');
		$this->load->model('test_models');
		$this->load->model('Project_model');
	}
	public function projectview(){
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$project_list =  new Project_model();
		$member_id = $_SESSION['id'];
		$this->data = $project_list->getProject_List($member_id);
		$this->load->view("project_home_student",$this->data);
	}
	
	public function project_home_ajax(){
		
		$member_id = $_SESSION['id'];
	
		$this->load->model('project_mysql_data');
		$project = new project_mysql_data();
		
		$data['project']=$project->select_project_all($member_id);
		
		$this->load->view("project_home_ajax",$data);
		
	}
	
	public function project_board(){
		
		$name = new Project_model();
		$data = $this->uri->uri_to_assoc(3);
		$data['name'] = $name->getProjectName($data['project_id']);
		$this->load->view("project_board_student",$data);
		
	}
	
	public function project_board_ajax(){
		
		$test_models = new test_models();
		
		$data = $this->uri->uri_to_assoc(3);
		$this->load->model('project_mysql_data');
		$project = new project_mysql_data();
		$data['surveying']=$project->select_project_surveying($data['project_id'],$_SESSION['id']);
		$array = $data['surveying']->result();
		
		$idx = 0;
		foreach($array as $row)
		{
			if($test_models->upload_tempcheck($row->id))
			{
				$data['uploadshow'][$idx] = "確認音檔";
			}
			else
			{
				$data['uploadshow'][$idx] = "上傳";
			}
			$idx++;
		}
		
		$this->load->view("project_board_ajax",$data);
	}
	
	public function project_upload(){
		
		$test_models = new test_models();
		$deczip = new Deczip();
		
		$get_id = $this->uri->uri_to_assoc(3);
		
		$project_id = $get_id['project_id'];
		$testing_id = $get_id['testing_id'];
		
		if ($test_models->upload_tempcheck($testing_id))//如果這個zip檔案已經上傳過了 去撈資料表的內容
		{
			$data = array('upload_data' => true);
			
			$zippath = $test_models->upload_tempcheck($testing_id);
			$path = $zippath[0]->zippath;
			
			$zipresult = $deczip->dec($path);//解壓縮zip 回傳編碼是UTF-8
				
			/*$patharr[] = $path;//移除zip的
			$uploadfile->rmFiles($patharr);*/
			
			for($x=0;$x < count($zipresult);$x++)
			{
				for($y=0;$y < count($zipresult[$x+1]);$y+=2)
				{
					$wav_arr = explode("\\",$zipresult[$x+1][$y]);
					//將檔名用"\"切割 存在wav_arr陣列裡
					$wav_name[$x][] = mb_convert_encoding($wav_arr[count($wav_arr)-1],"utf8","big5");
					//撈zipresult音檔資料夾+檔名 wav_arr陣列最後一筆 把UTF-8轉成big5
				}
			}
			
			$data['wav_name'] =$wav_name;//把音檔路徑存在$data['wav_name']
			
			$data['testfile']=$test_models->upload_test_file($zipresult);
			
			for($i=0;$i < count($zipresult);$i++)
			{
				for($j=0;$j < count($zipresult[$i+1]);$j+=2)
				{
					$file_arr = explode(".",$zipresult[$i+1][$j+1]);
					$file_name[$i][] = $file_arr[count($file_arr)-2];//撈zipresult檔名
				}
			}
			
			for($d=0;$d < count($zipresult);$d++)
			{
				$topic_id[$d] = $d+1;
			}
			$data['file_name'] = $file_name;//把檔名存在$data['file_name']
			$data['topic_id'] = $topic_id;//把題號存在$data['topic_id']
			
			$data['project_id'] = $project_id;
			$data['testing_id'] = $testing_id;
			$data['topics_num'] = $test_models->count_topics();
			
			$this->load->view('project_upload',$data);
		}
		else
		{
			$this->load->view("project_upload",$get_id);
		}
	}
	
	public function upload()
	{	
		$test_models = new test_models();
		
		$get_id = $this->uri->uri_to_assoc(3);
		
		$project_id = $get_id['project_id'];
		$testing_id = $get_id['testing_id'];
		
		$deczip = new Deczip;
		$uploadfile = new Uploadfiles();
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types']='zip|jpg';
		$config['max_size']	= '100000';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';
		
		$this->load->library('upload',$config);
		
		if (!$this->upload->do_upload())
		{
			$error = array(
			'error' => $this->upload->display_errors(),
			'project_id' => $project_id,
			'testing_id' => $testing_id
			);

			$this->load->view('project_upload',$error);
		}
		else
		{
			$uploadfile_name = $_FILES["userfile"]["name"];
			
			$upfile_arr = explode(".",$uploadfile_name );
			$upfile_name = $upfile_arr[count($upfile_arr)-2];
			
			$upfile_arr2 = explode("_",$upfile_name );
			$upfile_name2 = $upfile_arr2[count($upfile_arr2)-1];
			
			$result = $test_models->upload_file_identification($testing_id);
			
			$children_id = $result[0]->children_id;
			
			if ($children_id != $upfile_name2)
			{
				$data['project_id'] = $project_id;
				$data['testing_id'] = $testing_id;
				$data['error'] = "此檔案不屬於這個小孩，請上傳正確的壓縮檔";
				$this->load->view("project_upload",$data);
			}
			else
			{
			
				/*system/library/Upload.php line202 暴力破解法!!!*/
				$data = array('upload_data' => $this->upload->data());
				
				$path = $data['upload_data']['full_path'];
				
				$tempfile->testing_id = $testing_id;
				$tempfile->zippath = $path;
				
				//print_r($tempfile);
				
				$test_models->upload_tempfile($tempfile);
				
				
				$zipresult = $deczip->dec($path);//解壓縮zip 回傳編碼是UTF-8
				
				
				
				for($x=0;$x < count($zipresult);$x++)
				{
					for($y=0;$y < count($zipresult[$x+1]);$y+=2)
					{
						$wav_arr = explode("\\",$zipresult[$x+1][$y]);
						//將檔名用"\"切割 存在wav_arr陣列裡
						$wav_name[$x][] = mb_convert_encoding($wav_arr[count($wav_arr)-1],"utf8","big5");
						//撈zipresult音檔資料夾+檔名 wav_arr陣列最後一筆 把UTF-8轉成big5
					}
				}
				
				$data['wav_name'] =$wav_name;//把音檔路徑存在$data['wav_name']
				
				$data['testfile']=$test_models->upload_test_file($zipresult);
				
				for($i=0;$i < count($zipresult);$i++)
				{
					for($j=0;$j < count($zipresult[$i+1]);$j+=2)
					{
						$file_arr = explode(".",$zipresult[$i+1][$j+1]);
						$file_name[$i][] = $file_arr[count($file_arr)-2];//撈zipresult檔名
					}
				}
				for($d=0;$d < count($zipresult);$d++)
				{
					$topic_id[$d] = $d+1;
				}
				
				$data['file_name'] = $file_name;//把檔名存在$data['file_name']
				$data['topic_id'] = $topic_id;//把題號存在$data['topic_id']
				
				$data['project_id'] = $project_id;
				$data['testing_id'] = $testing_id;
				$data['topics_num'] = $test_models->count_topics();
				
				$this->load->view('project_upload',$data);
			}
		}
	}
	
	public function uploading()
	{
		//$data = new Datamodel();
		$test_models = new test_models();
		$array = array();
		$data[] = new stdClass();
		$uploadfile = new Uploadfiles();
		
		$get_id = $this->uri->uri_to_assoc(3);
		
		$project_id = $get_id['project_id'];
		$testing_id = $get_id['testing_id'];
		
		$rmwavpath = array();
		$svwavpath = array();
		$svwav_id[0] = 0;
		
		$selectwav = $this->input->post('score_values');
		
		for($i=0;$i < count($selectwav);$i++)
		{
			for($j=0;$j < count($selectwav[$i]);$j++)
			{
				$wav_arr = explode("=",$selectwav[$i]);
				$wav_name = $wav_arr[count($wav_arr)-3];//切割selectwav不要的選項 1要 0不要
				$svwav_name = $wav_arr[count($wav_arr)-1];//撈wav_arr陣列1 base_url路徑
				$rmwav_name = $wav_arr[count($wav_arr)-2];//撈wav_arr陣列2 ./upload/路徑
				
				if ($wav_name == 0)
				{
					$rmwavpath[] = $wav_arr[count($wav_arr)-2];//存要移除的檔案路徑
				}
				else
				{
					$svwavpath[] = $wav_arr[count($wav_arr)-2];//存要寫進資料庫的檔案路徑
					$svbasewavpath[] = $wav_arr[count($wav_arr)-1];
					$svwav_arr[] = $wav_arr[count($wav_arr)-4];
				}
			}
			
		}
		for ($k=0;$k < count($svwav_arr);$k++)
		{
			$data[$k]->testing_id = $testing_id; //在data物件陣列存testing_id topic filepath
			$data[$k]->topic_id = $svwav_arr[$k];
			$data[$k]->filepath = $svbasewavpath[$k];
			
			$array[$k] = $data[$k];
		}
		$uploadfile->uploadFiles($array);
		
		$zippath = $test_models->upload_tempcheck($testing_id);
		$path = $zippath[0]->zippath;
		
		$patharr[] = $path; //移除zip的
		$uploadfile->rmFiles($patharr);//移除zip的
		

		
		$uploadfile->rmFiles($svwavpath);//移除音檔的
		$uploadfile->rmFiles($rmwavpath);
	}
	
	public function subjects_view_group_student(){
		/*$category=$_GET['category'];
		if($category=='檢視'){
			$this->data['category']=$_GET['category']."類別";
			$this->data['name']="(".$_GET['name'].")";
		}
		elseif($category=="評測"){
			$this->data['category']=$_GET['category']."類別";
			$this->data['name']="(案例".$_GET['name'].")";
		}*/
		$data = $this->uri->uri_to_assoc(3);
		//print_r($data);
		$this->load->view("subjects-view-group-student",$data);
	}
	
	public function subjects_view_glossary_student(){
	
		
		
		$data = $this->uri->uri_to_assoc(3);
		$data['name']=$_GET['name'];
		//print_r($data);
		$this->load->view("subjects-view-glossary-student",$data);
		
	}
	
	public function testview(){
		$name=$_GET['name'];
		$this->data['name']=$name;
		$this->load->view("testview",$this->data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */