<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_admin extends CI_Controller {
	var $data = array();
	var $dato = array();
	function __construct()
	{
		parent::__construct();	
		$this->load->library('Personal_data');
		$this->load->library('Datamodel');
		$this->load->model('Project_model');
		$this->load->model('Member_model');
		$this->load->model('test_models');
		session_start();
	}
	
	public function new_picking(){
		$number_page = $this->input->post('number_page');
		$number_button = $this->input->post('number_button');
		if($number_button==1&&$number_page==2)//新增受測者
			echo'/subjects_data_new';
		elseif($number_button==2&&$number_page==1)//派遣
			echo '/testview';
		elseif(($number_page==1 || $number_page==3 || $number_page==4 )&&$number_button==1)//設置專案成員位置
			echo '/new_personnel_Practitioner';
		
	}
	public function new_personnel_Practitioner()
	{//設置專案成員位置
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$this->load->view('New-personnel-Practitioner');
	}
	public function new_project_board()
	{//新增專案
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$dota = new Datamodel();
		$purview = $this->input->post('purview');
		$project_name = $this->input->post('ProjectName');
		$Counties = $this->input->post('Counties');
		$Area = $this->input->post('Area');
		$date=  date("Y/m/d");
		$dota->name = $project_name;
		$dota->county = $Counties;
		$dota->area = $Area;
		$dota->status = $purview;
		$dota->cr_date = $date;
		$this->load->view('project_home');
	}
	public function project_board()
	{//檢視專案
		$this->data = $this->uri->uri_to_assoc(3);
		$dota = new Datamodel();
		$dota->member_id = $_SESSION['id'];
		$dota->project_id = $this->data['project_id'];
		$cont = array();
		$member_id=$_SESSION["id"];
		$this->load->model('test_models');
		$project_List = new test_models;
		$cont = $project_List->lond_List($_SESSION["id"]);
		$this->data['name'] = $project_List->Project_name($dota->project_id);
		$this->load->view('project_board',$this->data);
	}	
	public function subjects_list()
	{//分頁切換的頁面
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$member_id = $this->input->post('member_id');
		$number_page = $this->input->post('number_page');
		$project_id = $this->input->post('project_id');
		if($number_page == 1){//專案成員
			$pm = new Project_model;
			$this->data = $pm->getPeopleList($project_id);
			$this->load->view('project_members',$this->data);
		}
		elseif($number_page == 2){//受測者
			$pm = new Project_model;
			$this->data = $pm->getTestingList($project_id);
			$this->data['project_id'] = $project_id;
			$this->load->view('subjects_list_admin',$this->data);
		}
		elseif($number_page == 3){//申請者
			$this->load->view('applicant');
		}
		elseif($number_page == 4){//追蹤名單
			$this->load->view('track_list');
		}
		
	}
	public function subjects_data()
	{//新增受測者資料
		$count = 0;
		$child = new Datamodel();
		$basic_data = new Datamodel();
		$project = new Project_model();
		$this->data = $this->uri->uri_to_assoc(3);
		/*
		view未做判斷
		還未作年齡計算
		*/
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$subjects_name=$this->input->post('subjects_name');//*
		$subjects_sex=$this->input->post('subjects_sex');
		$subjects_birth=$this->input->post('subjects_birth');
		$subjects_counties=$this->input->post('subjects_counties');
		$subjects_school=$this->input->post('subjects_school');
		$subjects_grade=$this->input->post('subjects_grade');
		$subjects_class=$this->input->post('subjects_class');
		$subjects_language=$this->input->post('subjects_language');
		$date=  date("Y");
		print_r($date);
		
		
		$child->name = $subjects_name;
		$child->sex = $subjects_sex;
		$child->age = 0;
		$child->grade = $subjects_grade;
		$child->rank = $subjects_class;
		$child->language = $subjects_language;
		$child->county = $subjects_counties;
		$child->school = $subjects_school;
		$child->project_id =  $this->data['project_id'];
		
		if($subjects_name != null && $count == 0){
			$project->addChild($child);
			$this->data['member_id'] = $_SESSION['id'];
			$this->load->model('test_models');
			$project_List = new test_models;
			$this->data['name'] = $project_List->Project_name($this->data['project_id']);
			$this->load->view('project_board',$this->data);
			$count ++;
		}
		else
		{
			setcookie("project_id",$this->data['project_id'],time()+3600);
			$this->load->view('subjects_data_new',$basic_data);
		}
		
		
	}
	public function modification_data_child(){//修改受測者
		$count = 0;
		
		$project = new Project_model();
		$this->data = $this->uri->uri_to_assoc(3);
		
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$subjects_name=$this->input->post('subjects_name');//*
		$subjects_sex=$this->input->post('subjects_sex');
		$subjects_birth=$this->input->post('subjects_birth');
		$subjects_counties=$this->input->post('subjects_counties');
		$subjects_school=$this->input->post('subjects_school');
		$subjects_grade=$this->input->post('subjects_grade');
		$subjects_class=$this->input->post('subjects_class');
		$subjects_language=$this->input->post('subjects_language');
		
		$child = array(
			'name' => $subjects_name,
			'sex' => $subjects_sex,
			'bir' => $subjects_birth,
			'grade' => $subjects_grade,
			'rank' => $subjects_class,
			'language' => $subjects_language,
			'county' => $subjects_counties
		);
		/*$child->name = $subjects_name;
		$child->sex = $subjects_sex;
		$child->birth = $subjects_birth;
		$child->age = 0;
		$child->grade = $subjects_grade;
		$child->rank = $subjects_class;
		$child->language = $subjects_language;
		$child->county = $subjects_counties;
		$child->school = $subjects_school;
		$child->project_id =  $this->data['project_id'];
		$child->id =  $this->data['child_id'];*/
		
		if($count == 0){
			$project->updateChild($this->data['child_id'],$child);
			$this->data['member_id'] = $_SESSION['id'];
			$this->load->model('test_models');
			$project_List = new test_models;
			$this->data['name'] = $project_List->Project_name($this->data['project_id']);
			$this->load->view('project_board',$this->data);
			$count ++;
		}
		else
		{
			setcookie("project_id",$this->data['project_id'],time()+3600);
			$this->load->view('subjects_data_new',$basic_data);
		}
		
	}
	public function subjects_new_data()
	{//修改資料(受測者)]
		$child_data =  new Project_model();
		$this->data = $this->uri->uri_to_assoc(3);
		$this->data = $child_data->getModificationChildrenData($this->data['child_id']);
		$this->dato = $this->uri->uri_to_assoc(3);
		$this->dato['project_name'] = $child_data->getProjectName($this->dato['project_id']);
		$this->load->view('subjects-new-data',$this->dato,$this->data);
	}
	public function subjects_data_new()
	{//新增受測者畫面
		$pn = new Project_model;
		$this->data = $this->uri->uri_to_assoc(3);
		$this->data['project_name'] = $pn->getProjectName($this->data['project_id']);
		$this->load->view('subjects-data',$this->data);
	}
	public function practitioner_alter(){//修改人員(施測者)
		//$this->name=$_GET['name'];
		$this->data['name']=$this->input->post('name');
		$this->load->view('practitioner-alter',$this->data);
	}
	public function subjects_view_group(){
		
		$this->load->view('subjects-view-group',$this->data);
	}
	public function subjects_view_glossary(){
		$this->load->view('subjects-view-glossary',$this->data);
	}
	public function testview(){
		$this->load->view('testview',$this->data);
	}
	public function download_excel(){
		
		$this->load->helper('url');
		$this->load->model('score_model');
		$model = new score_model();
		$test_model = new test_models();
		$pm = new Project_model;
		$this->data = $this->uri->uri_to_assoc(3);
		
		$children['name'] = "";
		$children['score'] = "";
		$office_id = $this->data['office_id'];
		
		$this->data['project_name'] = $pm->getProjectName($this->data['project_id']);
		
		$project_name = $this->data['project_name'];
		$project_id = $this->data['project_id'];
		
		$this->data['children_data'] = $pm->getTestingList($project_id);
		
		$length = count($this->data['children_data']);
		$nb = 0;
		
		for($i = 0;$i < $length; $i++)
		{
			$testing_id = $test_model->excel_change_testing_id($this->data['children_data'][$i]->id);
			
			$testing_list_id = $testing_id[0]->id;
			$member_id = 1;
			
			$data['intern'] = $model->score_intern_speech_ajax($testing_list_id,$member_id,$project_id,$office_id);
			$result['data'] = $data['intern']->result();
			
			if($result['data'] == null)
			{
				
			}
			else
			{
				$children['name'][$nb] = $result['data'][0]->cname;
				
				$length2 = count($result['data']);
				
				for($j = 0;$j < $length2;$j++)
				{
					$children['script'][$nb][$j] = $result['data'][$j]->script;
					$children['score'][$nb][$j] = $result['data'][$j]->wrongcode;
					
					
				}
				$nb++;
			}
			
			
		}
		//print_r($test_model->count_topics());
		for($s = 1;$s <= $test_model->count_topics();$s++)
		{
			$data['script'][$s] = $test_model->excel_equals_topic($s);
		}
		
		//print_r($children);
		
		
		
		
		// Error reporting 
		
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		date_default_timezone_set('Europe/London');

		if (PHP_SAPI == 'cli')
			die('This example should only be run from a Web Browser');
		
		// Include PHPExcel 
		require_once 'Classes/PHPExcel.php';
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
									 ->setLastModifiedBy("Maarten Balliauw")
									 ->setTitle("Office 2007 XLSX Test Document")
									 ->setSubject("Office 2007 XLSX Test Document")
									 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
									 ->setKeywords("office 2007 openxml php")
									 ->setCategory("Test result file");
		
		// Add some data
		$objPHPExcel->getActiveSheet()->setCellValue('A1', $project_name[0]->name);
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'ㄅ 杯子');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'ㄅ 爸爸');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'ㄅ 筆');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'ㄆ 螃蟹');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'ㄆ 葡萄');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'ㄆ 皮球');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'ㄇ 貓咪');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'ㄇ 媽媽');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'ㄇ 蜜蜂');
		$objPHPExcel->getActiveSheet()->setCellValue('K1', 'ㄉ 蛋糕');
		$objPHPExcel->getActiveSheet()->setCellValue('L1', 'ㄉ 弟弟');
		$objPHPExcel->getActiveSheet()->setCellValue('M1', 'ㄉ 大象');
		$objPHPExcel->getActiveSheet()->setCellValue('N1', 'ㄊ 兔子');
		$objPHPExcel->getActiveSheet()->setCellValue('O1', 'ㄊ 太陽');
		$objPHPExcel->getActiveSheet()->setCellValue('P1', 'ㄊ 踢皮球');
		$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'ㄋ 牛奶');
		$objPHPExcel->getActiveSheet()->setCellValue('R1', 'ㄋ 泥巴');
		$objPHPExcel->getActiveSheet()->setCellValue('S1', 'ㄋ 奶奶');
		$objPHPExcel->getActiveSheet()->setCellValue('T1', 'ㄌ 老師');
		$objPHPExcel->getActiveSheet()->setCellValue('U1', 'ㄌ 拉手');
		$objPHPExcel->getActiveSheet()->setCellValue('V1', 'ㄌ 樓梯');
		$objPHPExcel->getActiveSheet()->setCellValue('W1', 'ㄏ 蝴蝶');
		$objPHPExcel->getActiveSheet()->setCellValue('X1', 'ㄏ 花朵');
		$objPHPExcel->getActiveSheet()->setCellValue('Y1', 'ㄏ 喝水');
		$objPHPExcel->getActiveSheet()->setCellValue('Z1', 'ㄍ 狗');
		$objPHPExcel->getActiveSheet()->setCellValue('AA1', 'ㄍ 哥哥');
		$objPHPExcel->getActiveSheet()->setCellValue('AB1', 'ㄍ 國旗');
		$objPHPExcel->getActiveSheet()->setCellValue('AC1', 'ㄎ 筷子');
		$objPHPExcel->getActiveSheet()->setCellValue('AD1', 'ㄎ 可樂');
		$objPHPExcel->getActiveSheet()->setCellValue('AE1', 'ㄎ 卡片');
		$objPHPExcel->getActiveSheet()->setCellValue('AF1', 'ㄐ 剪刀');
		$objPHPExcel->getActiveSheet()->setCellValue('AG1', 'ㄐ 姊姊');
		$objPHPExcel->getActiveSheet()->setCellValue('AH1', 'ㄐ 機器人');
		$objPHPExcel->getActiveSheet()->setCellValue('AI1', 'ㄑ 氣球');
		$objPHPExcel->getActiveSheet()->setCellValue('AJ1', 'ㄑ 青蛙');
		$objPHPExcel->getActiveSheet()->setCellValue('AK1', 'ㄑ 鉛筆');
		$objPHPExcel->getActiveSheet()->setCellValue('AL1', 'ㄒ 西瓜');
		$objPHPExcel->getActiveSheet()->setCellValue('AM1', 'ㄒ 鞋子');
		$objPHPExcel->getActiveSheet()->setCellValue('AN1', 'ㄒ 蝦子');
		$objPHPExcel->getActiveSheet()->setCellValue('AO1', 'ㄗ 嘴巴');
		$objPHPExcel->getActiveSheet()->setCellValue('AP1', 'ㄗ 走路');
		$objPHPExcel->getActiveSheet()->setCellValue('AQ1', 'ㄗ 早安');
		$objPHPExcel->getActiveSheet()->setCellValue('AR1', 'ㄘ 草莓');
		$objPHPExcel->getActiveSheet()->setCellValue('AS1', 'ㄘ 擦擦手');
		$objPHPExcel->getActiveSheet()->setCellValue('AT1', 'ㄘ 彩虹');
		$objPHPExcel->getActiveSheet()->setCellValue('AU1', 'ㄙ 傘');
		$objPHPExcel->getActiveSheet()->setCellValue('AV1', 'ㄙ 四');
		$objPHPExcel->getActiveSheet()->setCellValue('AW1', 'ㄙ 掃地');
		$objPHPExcel->getActiveSheet()->setCellValue('AX1', 'ㄓ 鐘');
		$objPHPExcel->getActiveSheet()->setCellValue('AY1', 'ㄓ 桌子');
		$objPHPExcel->getActiveSheet()->setCellValue('AZ1', 'ㄓ 蜘蛛');
		$objPHPExcel->getActiveSheet()->setCellValue('BA1', 'ㄔ 船');
		$objPHPExcel->getActiveSheet()->setCellValue('BB1', 'ㄔ 吃蛋糕');
		$objPHPExcel->getActiveSheet()->setCellValue('BC1', 'ㄔ 吹喇叭');
		$objPHPExcel->getActiveSheet()->setCellValue('BD1', 'ㄕ 書本');
		$objPHPExcel->getActiveSheet()->setCellValue('BE1', 'ㄕ 獅子');
		$objPHPExcel->getActiveSheet()->setCellValue('BF1', 'ㄕ 鯊魚');
		$objPHPExcel->getActiveSheet()->setCellValue('BG1', 'ㄖ 人');
		$objPHPExcel->getActiveSheet()->setCellValue('BH1', 'ㄖ 熱熱的');
		$objPHPExcel->getActiveSheet()->setCellValue('BI1', 'ㄖ 軟軟的');
		$objPHPExcel->getActiveSheet()->setCellValue('BJ1', 'ㄈ 飛機');
		$objPHPExcel->getActiveSheet()->setCellValue('BK1', 'ㄈ 風箏');
		$objPHPExcel->getActiveSheet()->setCellValue('BL1', 'ㄈ 房子');
		$objPHPExcel->getActiveSheet()->setCellValue('BM1', 'ㄚ 阿姨');
		$objPHPExcel->getActiveSheet()->setCellValue('BN1', 'ㄜ 白鵝');
		$objPHPExcel->getActiveSheet()->setCellValue('BO1', 'ㄨ 烏鴉');
		$objPHPExcel->getActiveSheet()->setCellValue('BP1', 'ㄧ 椅子');
		$objPHPExcel->getActiveSheet()->setCellValue('BQ1', 'ㄩ 魚');
		$objPHPExcel->getActiveSheet()->setCellValue('BR1', 'ㄝ 爺爺');
		$objPHPExcel->getActiveSheet()->setCellValue('BS1', 'ㄛ 我');
		$objPHPExcel->getActiveSheet()->setCellValue('BT1', 'ㄠ 凹凸');
		$objPHPExcel->getActiveSheet()->setCellValue('BU1', 'ㄡ 猴子');
		$objPHPExcel->getActiveSheet()->setCellValue('BV1', 'ㄟ 回家');
		$objPHPExcel->getActiveSheet()->setCellValue('BW1', 'ㄞ 愛心');
		$objPHPExcel->getActiveSheet()->setCellValue('BX1', 'ㄤ 骯髒');
		$objPHPExcel->getActiveSheet()->setCellValue('BY1', 'ㄥ 英國');
		$objPHPExcel->getActiveSheet()->setCellValue('BZ1', 'ㄣ 恩惠');
		$objPHPExcel->getActiveSheet()->setCellValue('CA1', 'ㄢ 安全');
		$objPHPExcel->getActiveSheet()->setCellValue('CB1', 'ㄦ 耳朵');
		$objPHPExcel->getActiveSheet()->setCellValue('CC1', '爸');
		$objPHPExcel->getActiveSheet()->setCellValue('CD1', '爸');
		$objPHPExcel->getActiveSheet()->setCellValue('CE1', '抱');
		$objPHPExcel->getActiveSheet()->setCellValue('CF1', '寶');
		$objPHPExcel->getActiveSheet()->setCellValue('CG1', '寶');
		$objPHPExcel->getActiveSheet()->setCellValue('CH1', '氣');
		$objPHPExcel->getActiveSheet()->setCellValue('CI1', '球');
		$objPHPExcel->getActiveSheet()->setCellValue('CJ1', '輕');
		$objPHPExcel->getActiveSheet()->setCellValue('CK1', '輕');
		$objPHPExcel->getActiveSheet()->setCellValue('CL1', '飄');
		$objPHPExcel->getActiveSheet()->setCellValue('CM1', '弟');
		$objPHPExcel->getActiveSheet()->setCellValue('CN1', '弟');
		$objPHPExcel->getActiveSheet()->setCellValue('CO1', '學');
		$objPHPExcel->getActiveSheet()->setCellValue('CP1', '兔');
		$objPHPExcel->getActiveSheet()->setCellValue('CQ1', '子');
		$objPHPExcel->getActiveSheet()->setCellValue('CR1', '跳');
		$objPHPExcel->getActiveSheet()->setCellValue('CS1', '姊');
		$objPHPExcel->getActiveSheet()->setCellValue('CT1', '姊');
		$objPHPExcel->getActiveSheet()->setCellValue('CU1', '喜');
		$objPHPExcel->getActiveSheet()->setCellValue('CV1', '歡');
		$objPHPExcel->getActiveSheet()->setCellValue('CW1', '吃');
		$objPHPExcel->getActiveSheet()->setCellValue('CX1', '西');
		$objPHPExcel->getActiveSheet()->setCellValue('CY1', '瓜');
		$objPHPExcel->getActiveSheet()->setCellValue('CZ1', '哥');
		$objPHPExcel->getActiveSheet()->setCellValue('DA1', '哥');
		$objPHPExcel->getActiveSheet()->setCellValue('DB1', '愛');
		$objPHPExcel->getActiveSheet()->setCellValue('DC1', '喝');
		$objPHPExcel->getActiveSheet()->setCellValue('DD1', '可');
		$objPHPExcel->getActiveSheet()->setCellValue('DE1', '口');
		$objPHPExcel->getActiveSheet()->setCellValue('DF1', '可');
		$objPHPExcel->getActiveSheet()->setCellValue('DG1', '樂');
		$objPHPExcel->getActiveSheet()->setCellValue('DH1', '一');
		$objPHPExcel->getActiveSheet()->setCellValue('DI1', '二');
		$objPHPExcel->getActiveSheet()->setCellValue('DJ1', '三');
		$objPHPExcel->getActiveSheet()->setCellValue('DK1', '大');
		$objPHPExcel->getActiveSheet()->setCellValue('DL1', '家');
		$objPHPExcel->getActiveSheet()->setCellValue('DM1', '來');
		$objPHPExcel->getActiveSheet()->setCellValue('DN1', '賽');
		$objPHPExcel->getActiveSheet()->setCellValue('DO1', '跑');
		$objPHPExcel->getActiveSheet()->setCellValue('DP1', '警');
		$objPHPExcel->getActiveSheet()->setCellValue('DQ1', '察');
		$objPHPExcel->getActiveSheet()->setCellValue('DR1', '伯');
		$objPHPExcel->getActiveSheet()->setCellValue('DS1', '伯');
		$objPHPExcel->getActiveSheet()->setCellValue('DT1', '吹');
		$objPHPExcel->getActiveSheet()->setCellValue('DU1', '哨');
		$objPHPExcel->getActiveSheet()->setCellValue('DV1', '子');
		$objPHPExcel->getActiveSheet()->setCellValue('DW1', '抓');
		$objPHPExcel->getActiveSheet()->setCellValue('DX1', '小');
		$objPHPExcel->getActiveSheet()->setCellValue('DY1', '偷');
		$objPHPExcel->getActiveSheet()->setCellValue('DZ1', '1');
		$objPHPExcel->getActiveSheet()->setCellValue('EA1', '2');
		$objPHPExcel->getActiveSheet()->setCellValue('EB1', '3');
		$objPHPExcel->getActiveSheet()->setCellValue('EC1', '4');
		$objPHPExcel->getActiveSheet()->setCellValue('ED1', '5');
		$objPHPExcel->getActiveSheet()->setCellValue('EE1', '6');
		$objPHPExcel->getActiveSheet()->setCellValue('EF1', '7');
		$objPHPExcel->getActiveSheet()->setCellValue('EG1', '8');
		$objPHPExcel->getActiveSheet()->setCellValue('EH1', '9');
		$objPHPExcel->getActiveSheet()->setCellValue('EI1', '10');
		$objPHPExcel->getActiveSheet()->setCellValue('EJ1', 'ㄆㄚ');
		$objPHPExcel->getActiveSheet()->setCellValue('EK1', 'ㄊㄚ');
		$objPHPExcel->getActiveSheet()->setCellValue('EL1', 'ㄎㄚ');
		$objPHPExcel->getActiveSheet()->setCellValue('EM1', '次數/秒數');
		$objPHPExcel->getActiveSheet()->setCellValue('EN1', '說故事');
		
		$n = 0;
		for ($i = 2; $i < count($children['name']) + 2; $i++) 
		{
			$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $children['name'][$n]);//小孩姓名
			
			$slide1 = explode(",,",$children['score'][$n][0]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][0]);
			
			if($data['script'][1] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $slide1_result[count($slide1_result)-3]);//ㄅ 杯子
			}
			else if($data['script'][1] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $slide1_result[count($slide1_result)-2]);//ㄅ
			}
			else if($data['script'][1] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $slide1_result[count($slide1_result)-1]);//ㄅ
			}
			
			if($data['script'][2] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $slide1_result[count($slide1_result)-3]);//ㄅ爸爸
			}
			else if($data['script'][2] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $slide1_result[count($slide1_result)-2]);//ㄅ
			}
			else if($data['script'][2] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $slide1_result[count($slide1_result)-1]);//ㄅ
			}
			
			if($data['script'][3] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $slide1_result[count($slide1_result)-3]);//ㄅ筆
			}
			else if($data['script'][3] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $slide1_result[count($slide1_result)-2]);//ㄅ
			}
			else if($data['script'][3] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $slide1_result[count($slide1_result)-1]);//ㄅ
			}
			
			$slide1 = explode(",,",$children['score'][$n][1]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][1]);
			
			if($data['script'][4] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $slide1_result[count($slide1_result)-3]);//ㄆ螃蟹
			}
			else if($data['script'][4] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $slide1_result[count($slide1_result)-2]);//ㄆ
			}
			else if($data['script'][4] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $slide1_result[count($slide1_result)-1]);//ㄆ
			}
			
			if($data['script'][5] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $slide1_result[count($slide1_result)-3]);//ㄆ葡萄
			}
			else if($data['script'][5] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $slide1_result[count($slide1_result)-2]);//ㄆ
			}
			else if($data['script'][5] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $slide1_result[count($slide1_result)-1]);//ㄆ
			}
			
			if($data['script'][6] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $slide1_result[count($slide1_result)-3]);//ㄆ皮球
			}
			else if($data['script'][6] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $slide1_result[count($slide1_result)-2]);//ㄆ
			}
			else if($data['script'][6] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $slide1_result[count($slide1_result)-1]);//ㄆ
			}
			
			$slide1 = explode(",,",$children['score'][$n][2]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][2]);
			
			if($data['script'][7] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $slide1_result[count($slide1_result)-3]);//ㄇ
			}
			else if($data['script'][7] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $slide1_result[count($slide1_result)-2]);//ㄇ
			}
			else if($data['script'][7] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $slide1_result[count($slide1_result)-1]);//ㄇ
			}
			
			if($data['script'][8] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $slide1_result[count($slide1_result)-3]);//ㄇ
			}
			else if($data['script'][8] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $slide1_result[count($slide1_result)-2]);//ㄇ
			}
			else if($data['script'][8] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $slide1_result[count($slide1_result)-1]);//ㄇ
			}
			
			if($data['script'][9] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $slide1_result[count($slide1_result)-3]);//ㄇ
			}
			else if($data['script'][9] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $slide1_result[count($slide1_result)-2]);//ㄇ
			}
			else if($data['script'][9] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $slide1_result[count($slide1_result)-1]);//ㄇ
			}
			
			$slide1 = explode(",,",$children['score'][$n][4]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][4]);
			
			if($data['script'][10] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $slide1_result[count($slide1_result)-3]);//ㄉ
			}
			else if($data['script'][10] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $slide1_result[count($slide1_result)-2]);//ㄉ
			}
			else if($data['script'][10] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $slide1_result[count($slide1_result)-1]);//ㄉ
			}
			
			if($data['script'][11] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $slide1_result[count($slide1_result)-3]);//ㄉ
			}
			else if($data['script'][11] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $slide1_result[count($slide1_result)-2]);//ㄉ
			}
			else if($data['script'][11] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $slide1_result[count($slide1_result)-1]);//ㄉ
			}
			
			if($data['script'][12] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $slide1_result[count($slide1_result)-3]);//ㄉ
			}
			else if($data['script'][12] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $slide1_result[count($slide1_result)-2]);//ㄉ
			}
			else if($data['script'][12] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $slide1_result[count($slide1_result)-1]);//ㄉ
			}
			
			$slide1 = explode(",,",$children['score'][$n][4]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][5]);
			
			if($data['script'][13] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('N' . $i, $slide1_result[count($slide1_result)-3]);//ㄊ
			}
			else if($data['script'][13] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('N' . $i, $slide1_result[count($slide1_result)-2]);//ㄊ
			}
			else if($data['script'][13] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('N' . $i, $slide1_result[count($slide1_result)-1]);//ㄊ
			}
			
			if($data['script'][14] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('O' . $i, $slide1_result[count($slide1_result)-3]);//ㄊ
			}
			else if($data['script'][14] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('O' . $i, $slide1_result[count($slide1_result)-2]);//ㄊ
			}
			else if($data['script'][14] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('O' . $i, $slide1_result[count($slide1_result)-1]);//ㄊ
			}
			
			if($data['script'][15] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('P' . $i, $slide1_result[count($slide1_result)-3]);//ㄊ
			}
			else if($data['script'][15] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('P' . $i, $slide1_result[count($slide1_result)-2]);//ㄊ
			}
			else if($data['script'][15] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('P' . $i, $slide1_result[count($slide1_result)-1]);//ㄊ
			}
			
			$slide1 = explode(",,",$children['score'][$n][5]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][6]);
			
			if($data['script'][16] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('Q' . $i, $slide1_result[count($slide1_result)-3]);//ㄋ
			}
			else if($data['script'][16] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('Q' . $i, $slide1_result[count($slide1_result)-2]);//ㄋ
			}
			else if($data['script'][16] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('Q' . $i, $slide1_result[count($slide1_result)-1]);//ㄋ
			}
			
			if($data['script'][17] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('R' . $i, $slide1_result[count($slide1_result)-3]);//ㄋ
			}
			else if($data['script'][17] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('R' . $i, $slide1_result[count($slide1_result)-2]);//ㄋ
			}
			else if($data['script'][17] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('R' . $i, $slide1_result[count($slide1_result)-1]);//ㄋ
			}
			
			if($data['script'][18] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('S' . $i, $slide1_result[count($slide1_result)-3]);//ㄋ
			}
			else if($data['script'][18] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('S' . $i, $slide1_result[count($slide1_result)-2]);//ㄋ
			}
			else if($data['script'][18] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('S' . $i, $slide1_result[count($slide1_result)-1]);//ㄋ
			}
			
			$slide1 = explode(",,",$children['score'][$n][6]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][7]);
			
			if($data['script'][19] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('T' . $i, $slide1_result[count($slide1_result)-3]);//ㄌ
			}
			else if($data['script'][19] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('T' . $i, $slide1_result[count($slide1_result)-2]);//ㄌ
			}
			else if($data['script'][19] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('T' . $i, $slide1_result[count($slide1_result)-1]);//ㄌ
			}
			
			if($data['script'][20] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('U' . $i, $slide1_result[count($slide1_result)-3]);//ㄌ
			}
			else if($data['script'][20] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('U' . $i, $slide1_result[count($slide1_result)-2]);//ㄌ
			}
			else if($data['script'][20] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('U' . $i, $slide1_result[count($slide1_result)-1]);//ㄌ
			}
			
			if($data['script'][21] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('V' . $i, $slide1_result[count($slide1_result)-3]);//ㄌ
			}
			else if($data['script'][21] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('V' . $i, $slide1_result[count($slide1_result)-2]);//ㄌ
			}
			else if($data['script'][21] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('V' . $i, $slide1_result[count($slide1_result)-1]);//ㄌ
			}
			
			$slide1 = explode(",,",$children['score'][$n][7]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][10]);
			
			if($data['script'][22] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('W' . $i, $slide1_result[count($slide1_result)-3]);//ㄏ
			}
			else if($data['script'][22] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('W' . $i, $slide1_result[count($slide1_result)-2]);//ㄏ
			}
			else if($data['script'][22] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('W' . $i, $slide1_result[count($slide1_result)-1]);//ㄏ
			}
			
			if($data['script'][23] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('X' . $i, $slide1_result[count($slide1_result)-3]);//ㄏ
			}
			else if($data['script'][23] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('X' . $i, $slide1_result[count($slide1_result)-2]);//ㄏ
			}
			else if($data['script'][23] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('X' . $i, $slide1_result[count($slide1_result)-1]);//ㄏ
			}
			
			if($data['script'][24] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('Y' . $i, $slide1_result[count($slide1_result)-3]);//ㄏ
			}
			else if($data['script'][24] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('Y' . $i, $slide1_result[count($slide1_result)-2]);//ㄏ
			}
			else if($data['script'][24] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('Y' . $i, $slide1_result[count($slide1_result)-1]);//ㄏ
			}
			
			$slide1 = explode(",,",$children['score'][$n][8]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][8]);
			
			if($data['script'][25] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('Z' . $i, $slide1_result[count($slide1_result)-3]);//ㄍ
			}
			else if($data['script'][25] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('Z' . $i, $slide1_result[count($slide1_result)-2]);//ㄍ
			}
			else if($data['script'][25] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('Z' . $i, $slide1_result[count($slide1_result)-1]);//ㄍ
			}
			
			if($data['script'][26] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AA' . $i, $slide1_result[count($slide1_result)-3]);//ㄍ
			}
			else if($data['script'][26] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AA' . $i, $slide1_result[count($slide1_result)-2]);//ㄍ
			}
			else if($data['script'][26] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AA' . $i, $slide1_result[count($slide1_result)-1]);//ㄍ
			}
			
			if($data['script'][27] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AB' . $i, $slide1_result[count($slide1_result)-3]);//ㄍ
			}
			else if($data['script'][27] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AB' . $i, $slide1_result[count($slide1_result)-2]);//ㄍ
			}
			else if($data['script'][27] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AB' . $i, $slide1_result[count($slide1_result)-1]);//ㄍ
			}
			
			$slide1 = explode(",,",$children['score'][$n][9]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][9]);
			
			if($data['script'][28] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AC'. $i, $slide1_result[count($slide1_result)-3]);//ㄎ
			}
			else if($data['script'][28] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AC'. $i, $slide1_result[count($slide1_result)-2]);//ㄎ
			}
			else if($data['script'][28] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AC'. $i, $slide1_result[count($slide1_result)-1]);//ㄎ
			}
			
			if($data['script'][29] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AD'. $i, $slide1_result[count($slide1_result)-3]);//ㄎ
			}
			else if($data['script'][29] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AD'. $i, $slide1_result[count($slide1_result)-2]);//ㄎ
			}
			else if($data['script'][29] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AD'. $i, $slide1_result[count($slide1_result)-1]);//ㄎ
			}
			
			if($data['script'][30] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AE'. $i, $slide1_result[count($slide1_result)-3]);//ㄎ
			}
			else if($data['script'][30] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AE'. $i, $slide1_result[count($slide1_result)-2]);//ㄎ
			}
			else if($data['script'][30] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AE'. $i, $slide1_result[count($slide1_result)-1]);//ㄎ
			}
			
			$slide1 = explode(",,",$children['score'][$n][10]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][11]);
			
			if($data['script'][31] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AF'. $i, $slide1_result[count($slide1_result)-3]);//ㄐ
			}
			else if($data['script'][31] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AF'. $i, $slide1_result[count($slide1_result)-2]);//ㄐ
			}
			else if($data['script'][31] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AF'. $i, $slide1_result[count($slide1_result)-1]);//ㄐ
			}
			
			if($data['script'][32] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AG'. $i, $slide1_result[count($slide1_result)-3]);//ㄐ
			}
			else if($data['script'][32] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AG'. $i, $slide1_result[count($slide1_result)-2]);//ㄐ
			}
			else if($data['script'][32] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AG'. $i, $slide1_result[count($slide1_result)-1]);//ㄐ
			}
			
			if($data['script'][33] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AH'. $i, $slide1_result[count($slide1_result)-3]);//ㄐ
			}
			else if($data['script'][33] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AH'. $i, $slide1_result[count($slide1_result)-2]);//ㄐ
			}
			else if($data['script'][33] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AH'. $i, $slide1_result[count($slide1_result)-1]);//ㄐ
			}
			
			$slide1 = explode(",,",$children['score'][$n][11]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][12]);
			
			if($data['script'][34] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AI'. $i, $slide1_result[count($slide1_result)-3]);//ㄑ
			}
			else if($data['script'][34] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AI'. $i, $slide1_result[count($slide1_result)-2]);//ㄑ
			}
			else if($data['script'][34] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AI'. $i, $slide1_result[count($slide1_result)-1]);//ㄑ
			}
			
			if($data['script'][35] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AJ'. $i, $slide1_result[count($slide1_result)-3]);//ㄑ
			}
			else if($data['script'][35] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AJ'. $i, $slide1_result[count($slide1_result)-2]);//ㄑ
			}
			else if($data['script'][35] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AJ'. $i, $slide1_result[count($slide1_result)-1]);//ㄑ
			}
			
			if($data['script'][36] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AK'. $i, $slide1_result[count($slide1_result)-3]);//ㄑ
			}
			else if($data['script'][36] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AK'. $i, $slide1_result[count($slide1_result)-2]);//ㄑ
			}
			else if($data['script'][36] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AK'. $i, $slide1_result[count($slide1_result)-1]);//ㄑ
			}
			
			$slide1 = explode(",,",$children['score'][$n][12]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][13]);
			
			if($data['script'][37] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AL'. $i, $slide1_result[count($slide1_result)-3]);//ㄒ
			}
			else if($data['script'][37] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AL'. $i, $slide1_result[count($slide1_result)-2]);//ㄒ
			}
			else if($data['script'][37] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AL'. $i, $slide1_result[count($slide1_result)-1]);//ㄒ
			}
			
			if($data['script'][38] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AM'. $i, $slide1_result[count($slide1_result)-3]);//ㄒ
			}
			else if($data['script'][38] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AM'. $i, $slide1_result[count($slide1_result)-2]);//ㄒ
			}
			else if($data['script'][38] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AM'. $i, $slide1_result[count($slide1_result)-1]);//ㄒ
			}
			
			if($data['script'][39] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AN'. $i, $slide1_result[count($slide1_result)-3]);//ㄒ
			}
			else if($data['script'][39] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AN'. $i, $slide1_result[count($slide1_result)-2]);//ㄒ
			}
			else if($data['script'][39] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AN'. $i, $slide1_result[count($slide1_result)-1]);//ㄒ
			}
			
			$slide1 = explode(",,",$children['score'][$n][13]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][18]);
			
			if($data['script'][40] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AO'. $i, $slide1_result[count($slide1_result)-3]);//ㄗ
			}
			else if($data['script'][40] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AO'. $i, $slide1_result[count($slide1_result)-2]);//ㄗ
			}
			else if($data['script'][40] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AO'. $i, $slide1_result[count($slide1_result)-1]);//ㄗ
			}
			
			if($data['script'][41] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AP'. $i, $slide1_result[count($slide1_result)-3]);//ㄗ
			}
			else if($data['script'][41] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AP'. $i, $slide1_result[count($slide1_result)-2]);//ㄗ
			}
			else if($data['script'][41] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AP'. $i, $slide1_result[count($slide1_result)-1]);//ㄗ
			}
			
			if($data['script'][42] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AQ'. $i, $slide1_result[count($slide1_result)-3]);//ㄗ
			}
			else if($data['script'][42] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AQ'. $i, $slide1_result[count($slide1_result)-2]);//ㄗ
			}
			else if($data['script'][42] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AQ'. $i, $slide1_result[count($slide1_result)-1]);//ㄗ
			}
			
			$slide1 = explode(",,",$children['score'][$n][14]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][19]);
			
			if($data['script'][43] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AR'. $i, $slide1_result[count($slide1_result)-3]);//ㄘ
			}
			else if($data['script'][43] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AR'. $i, $slide1_result[count($slide1_result)-2]);//ㄘ
			}
			else if($data['script'][43] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AR'. $i, $slide1_result[count($slide1_result)-1]);//ㄘ
			}
			
			if($data['script'][44] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AS'. $i, $slide1_result[count($slide1_result)-3]);//ㄘ
			}
			else if($data['script'][44] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AS'. $i, $slide1_result[count($slide1_result)-2]);//ㄘ
			}
			else if($data['script'][44] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AS'. $i, $slide1_result[count($slide1_result)-1]);//ㄘ
			}
			
			if($data['script'][45] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AT'. $i, $slide1_result[count($slide1_result)-3]);//ㄘ
			}
			else if($data['script'][45] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AT'. $i, $slide1_result[count($slide1_result)-2]);//ㄘ
			}
			else if($data['script'][45] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AT'. $i, $slide1_result[count($slide1_result)-1]);//ㄘ
			}
			
			$slide1 = explode(",,",$children['score'][$n][15]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][20]);
			
			if($data['script'][46] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AU'. $i, $slide1_result[count($slide1_result)-3]);//ㄙ
			}
			else if($data['script'][46] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AU'. $i, $slide1_result[count($slide1_result)-2]);//ㄙ
			}
			else if($data['script'][46] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AU'. $i, $slide1_result[count($slide1_result)-1]);//ㄙ
			}
			
			if($data['script'][47] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AV'. $i, $slide1_result[count($slide1_result)-3]);//ㄙ
			}
			else if($data['script'][47] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AV'. $i, $slide1_result[count($slide1_result)-2]);//ㄙ
			}
			else if($data['script'][47] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AV'. $i, $slide1_result[count($slide1_result)-1]);//ㄙ
			}
			
			if($data['script'][48] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AW'. $i, $slide1_result[count($slide1_result)-3]);//ㄙ
			}
			else if($data['script'][48] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AW'. $i, $slide1_result[count($slide1_result)-2]);//ㄙ
			}
			else if($data['script'][48] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AW'. $i, $slide1_result[count($slide1_result)-1]);//ㄙ
			}
			
			$slide1 = explode(",,",$children['score'][$n][16]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][14]);
			
			if($data['script'][49] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AX'. $i, $slide1_result[count($slide1_result)-3]);//ㄓ
			}
			else if($data['script'][49] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AX'. $i, $slide1_result[count($slide1_result)-2]);//ㄓ
			}
			else if($data['script'][49] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AX'. $i, $slide1_result[count($slide1_result)-1]);//ㄓ
			}
			
			if($data['script'][50] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AY'. $i, $slide1_result[count($slide1_result)-3]);//ㄓ
			}
			else if($data['script'][50] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AY'. $i, $slide1_result[count($slide1_result)-2]);//ㄓ
			}
			else if($data['script'][50] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AY'. $i, $slide1_result[count($slide1_result)-1]);//ㄓ
			}
			
			if($data['script'][51] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AZ'. $i, $slide1_result[count($slide1_result)-3]);//ㄓ
			}
			else if($data['script'][51] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AZ'. $i, $slide1_result[count($slide1_result)-2]);//ㄓ
			}
			else if($data['script'][51] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('AZ'. $i, $slide1_result[count($slide1_result)-1]);//ㄓ
			}
			
			$slide1 = explode(",,",$children['score'][$n][17]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][15]);
			
			if($data['script'][52] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BA'. $i, $slide1_result[count($slide1_result)-3]);//ㄔ
			}
			else if($data['script'][52] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BA'. $i, $slide1_result[count($slide1_result)-2]);//ㄔ
			}
			else if($data['script'][52] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BA'. $i, $slide1_result[count($slide1_result)-1]);//ㄔ
			}
			
			if($data['script'][53] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BB'. $i, $slide1_result[count($slide1_result)-3]);//ㄔ
			}
			else if($data['script'][53] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BB'. $i, $slide1_result[count($slide1_result)-2]);//ㄔ
			}
			else if($data['script'][53] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BB'. $i, $slide1_result[count($slide1_result)-1]);//ㄔ
			}
			
			if($data['script'][54] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BC'. $i, $slide1_result[count($slide1_result)-3]);//ㄔ
			}
			else if($data['script'][54] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BC'. $i, $slide1_result[count($slide1_result)-2]);//ㄔ
			}
			else if($data['script'][54] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BC'. $i, $slide1_result[count($slide1_result)-1]);//ㄔ
			}
			
			$slide1 = explode(",,",$children['score'][$n][18]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][16]);
			
			if($data['script'][55] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BD'. $i, $slide1_result[count($slide1_result)-3]);//ㄕ
			}
			else if($data['script'][55] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BD'. $i, $slide1_result[count($slide1_result)-2]);//ㄕ
			}
			else if($data['script'][55] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BD'. $i, $slide1_result[count($slide1_result)-1]);//ㄕ
			}
			
			if($data['script'][56] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BE'. $i, $slide1_result[count($slide1_result)-3]);//ㄕ
			}
			else if($data['script'][56] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BE'. $i, $slide1_result[count($slide1_result)-2]);//ㄕ
			}
			else if($data['script'][56] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BE'. $i, $slide1_result[count($slide1_result)-1]);//ㄕ
			}
			
			if($data['script'][57] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BF'. $i, $slide1_result[count($slide1_result)-3]);//ㄕ
			}
			else if($data['script'][57] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BF'. $i, $slide1_result[count($slide1_result)-2]);//ㄕ
			}
			else if($data['script'][57] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BF'. $i, $slide1_result[count($slide1_result)-1]);//ㄕ
			}
			
			$slide1 = explode(",,",$children['score'][$n][19]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][17]);
			
			if($data['script'][58] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BG'. $i, $slide1_result[count($slide1_result)-3]);//ㄖ
			}
			else if($data['script'][58] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BG'. $i, $slide1_result[count($slide1_result)-2]);//ㄖ
			}
			else if($data['script'][58] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BG'. $i, $slide1_result[count($slide1_result)-1]);//ㄖ
			}
			
			if($data['script'][59] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BH'. $i, $slide1_result[count($slide1_result)-3]);//ㄖ
			}
			else if($data['script'][59] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BH'. $i, $slide1_result[count($slide1_result)-2]);//ㄖ
			}
			else if($data['script'][59] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BH'. $i, $slide1_result[count($slide1_result)-1]);//ㄖ
			}
			
			if($data['script'][60] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BI'. $i, $slide1_result[count($slide1_result)-3]);//ㄖ
			}
			else if($data['script'][60] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BI'. $i, $slide1_result[count($slide1_result)-2]);//ㄖ
			}
			else if($data['script'][60] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BI'. $i, $slide1_result[count($slide1_result)-1]);//ㄖ
			}
			
			$slide1 = explode(",,",$children['score'][$n][20]);
			$slide1_re = $slide1[count($slide1)-3];
			$slide1_result = explode(",",$slide1_re);
			
			$scriptslide = explode(",",$children['script'][$n][3]);
			
			if($data['script'][61] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BJ'. $i, $slide1_result[count($slide1_result)-3]);//ㄈ
			}
			else if($data['script'][61] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BJ'. $i, $slide1_result[count($slide1_result)-2]);//ㄈ
			}
			else if($data['script'][61] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BJ'. $i, $slide1_result[count($slide1_result)-1]);//ㄈ
			}
			
			if($data['script'][62] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BK'. $i, $slide1_result[count($slide1_result)-3]);//ㄈ
			}
			else if($data['script'][62] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BK'. $i, $slide1_result[count($slide1_result)-2]);//ㄈ
			}
			else if($data['script'][62] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BK'. $i, $slide1_result[count($slide1_result)-1]);//ㄈ
			}
			
			if($data['script'][63] == $scriptslide[count($scriptslide)-3])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BL'. $i, $slide1_result[count($slide1_result)-3]);//ㄈ
			}
			else if($data['script'][63] == $scriptslide[count($scriptslide)-2])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BL'. $i, $slide1_result[count($slide1_result)-2]);//ㄈ
			}
			else if($data['script'][63] == $scriptslide[count($scriptslide)-1])
			{
				$objPHPExcel->getActiveSheet()->setCellValue('BL'. $i, $slide1_result[count($slide1_result)-1]);//ㄈ
			}
			
			$slide1_result = explode(",",$children['score'][$n][21]);
			$objPHPExcel->getActiveSheet()->setCellValue('BM'. $i, $slide1_result[count($slide1_result)-2]);//ㄚ
			
			$slide1_result = explode(",",$children['score'][$n][22]);
			$objPHPExcel->getActiveSheet()->setCellValue('BN'. $i, $slide1_result[count($slide1_result)-2]);//ㄜ
			
			$slide1_result = explode(",",$children['score'][$n][23]);
			$objPHPExcel->getActiveSheet()->setCellValue('BO'. $i, $slide1_result[count($slide1_result)-2]);//ㄨ
			
			$slide1_result = explode(",",$children['score'][$n][24]);
			$objPHPExcel->getActiveSheet()->setCellValue('BP'. $i, $slide1_result[count($slide1_result)-2]);//ㄧ
			
			$slide1_result = explode(",",$children['score'][$n][25]);
			$objPHPExcel->getActiveSheet()->setCellValue('BQ'. $i, $slide1_result[count($slide1_result)-2]);//ㄩ
			
			$slide1_result = explode(",",$children['score'][$n][26]);
			$objPHPExcel->getActiveSheet()->setCellValue('BR'. $i, $slide1_result[count($slide1_result)-2]);//ㄝ
			
			$slide1_result = explode(",",$children['score'][$n][27]);
			$objPHPExcel->getActiveSheet()->setCellValue('BS'. $i, $slide1_result[count($slide1_result)-2]);//ㄛ
			
			$slide1_result = explode(",",$children['score'][$n][28]);
			$objPHPExcel->getActiveSheet()->setCellValue('BT'. $i, $slide1_result[count($slide1_result)-2]);//ㄠ
			
			$slide1_result = explode(",",$children['score'][$n][29]);
			$objPHPExcel->getActiveSheet()->setCellValue('BU'. $i, $slide1_result[count($slide1_result)-2]);//ㄡ
			
			$slide1_result = explode(",",$children['score'][$n][30]);
			$objPHPExcel->getActiveSheet()->setCellValue('BV'. $i, $slide1_result[count($slide1_result)-2]);//ㄟ
			
			$slide1_result = explode(",",$children['score'][$n][31]);
			$objPHPExcel->getActiveSheet()->setCellValue('BW'. $i, $slide1_result[count($slide1_result)-2]);//ㄞ
			
			$slide1_result = explode(",",$children['score'][$n][32]);
			$objPHPExcel->getActiveSheet()->setCellValue('BX'. $i, $slide1_result[count($slide1_result)-2]);//ㄤ
			
			$slide1_result = explode(",",$children['score'][$n][33]);
			$objPHPExcel->getActiveSheet()->setCellValue('BY'. $i, $slide1_result[count($slide1_result)-2]);//ㄥ
			
			$slide1_result = explode(",",$children['score'][$n][34]);
			$objPHPExcel->getActiveSheet()->setCellValue('BZ'. $i, $slide1_result[count($slide1_result)-2]);//ㄣ
			
			$slide1_result = explode(",",$children['score'][$n][35]);
			$objPHPExcel->getActiveSheet()->setCellValue('CA'. $i, $slide1_result[count($slide1_result)-2]);//ㄢ
			
			$slide1_result = explode(",",$children['score'][$n][36]);
			$objPHPExcel->getActiveSheet()->setCellValue('CB'. $i, $slide1_result[count($slide1_result)-2]);//ㄦ
			
			$slide1 = explode(",,",$children['score'][$n][37]);
			
			$scriptslide = explode(",",$children['script'][$n][37]);
			
			if($data['script'][80] == $scriptslide[count($scriptslide)-7])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-7]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-7]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CC'. $i, $topic_slide[0]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CD'. $i, $topic_slide[1]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CE'. $i, $topic_slide[2]);//抱
				$objPHPExcel->getActiveSheet()->setCellValue('CF'. $i, $topic_slide[3]);//寶
				$objPHPExcel->getActiveSheet()->setCellValue('CG'. $i, $topic_slide[4]);//寶
			}
			else if($data['script'][80] == $scriptslide[count($scriptslide)-6])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-6]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-6]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CC'. $i, $topic_slide[0]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CD'. $i, $topic_slide[1]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CE'. $i, $topic_slide[2]);//抱
				$objPHPExcel->getActiveSheet()->setCellValue('CF'. $i, $topic_slide[3]);//寶
				$objPHPExcel->getActiveSheet()->setCellValue('CG'. $i, $topic_slide[4]);//寶
			}
			else if($data['script'][80] == $scriptslide[count($scriptslide)-5])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-5]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-5]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CC'. $i, $topic_slide[0]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CD'. $i, $topic_slide[1]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CE'. $i, $topic_slide[2]);//抱
				$objPHPExcel->getActiveSheet()->setCellValue('CF'. $i, $topic_slide[3]);//寶
				$objPHPExcel->getActiveSheet()->setCellValue('CG'. $i, $topic_slide[4]);//寶
			}
			else if($data['script'][80] == $scriptslide[count($scriptslide)-4])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-4]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-4]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CC'. $i, $topic_slide[0]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CD'. $i, $topic_slide[1]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CE'. $i, $topic_slide[2]);//抱
				$objPHPExcel->getActiveSheet()->setCellValue('CF'. $i, $topic_slide[3]);//寶
				$objPHPExcel->getActiveSheet()->setCellValue('CG'. $i, $topic_slide[4]);//寶
			}
			else if($data['script'][80] == $scriptslide[count($scriptslide)-3])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-3]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-3]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CC'. $i, $topic_slide[0]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CD'. $i, $topic_slide[1]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CE'. $i, $topic_slide[2]);//抱
				$objPHPExcel->getActiveSheet()->setCellValue('CF'. $i, $topic_slide[3]);//寶
				$objPHPExcel->getActiveSheet()->setCellValue('CG'. $i, $topic_slide[4]);//寶
			}
			else if($data['script'][80] == $scriptslide[count($scriptslide)-2])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-2]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-2]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CC'. $i, $topic_slide[0]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CD'. $i, $topic_slide[1]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CE'. $i, $topic_slide[2]);//抱
				$objPHPExcel->getActiveSheet()->setCellValue('CF'. $i, $topic_slide[3]);//寶
				$objPHPExcel->getActiveSheet()->setCellValue('CG'. $i, $topic_slide[4]);//寶
			}
			else if($data['script'][80] == $scriptslide[count($scriptslide)-1])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-1]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-1]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CC'. $i, $topic_slide[0]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CD'. $i, $topic_slide[1]);//爸
				$objPHPExcel->getActiveSheet()->setCellValue('CE'. $i, $topic_slide[2]);//抱
				$objPHPExcel->getActiveSheet()->setCellValue('CF'. $i, $topic_slide[3]);//寶
				$objPHPExcel->getActiveSheet()->setCellValue('CG'. $i, $topic_slide[4]);//寶
			}
			
			if($data['script'][81] == $scriptslide[count($scriptslide)-7])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-7]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-7]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CH'. $i, $topic_slide[0]);//氣
				$objPHPExcel->getActiveSheet()->setCellValue('CI'. $i, $topic_slide[1]);//球
				$objPHPExcel->getActiveSheet()->setCellValue('CJ'. $i, $topic_slide[2]);//輕
				$objPHPExcel->getActiveSheet()->setCellValue('CK'. $i, $topic_slide[3]);//飄
				$objPHPExcel->getActiveSheet()->setCellValue('CL'. $i, $topic_slide[4]);//飄
			}
			else if($data['script'][81] == $scriptslide[count($scriptslide)-6])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-6]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-6]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CH'. $i, $topic_slide[0]);//氣
				$objPHPExcel->getActiveSheet()->setCellValue('CI'. $i, $topic_slide[1]);//球
				$objPHPExcel->getActiveSheet()->setCellValue('CJ'. $i, $topic_slide[2]);//輕
				$objPHPExcel->getActiveSheet()->setCellValue('CK'. $i, $topic_slide[3]);//飄
				$objPHPExcel->getActiveSheet()->setCellValue('CL'. $i, $topic_slide[4]);//飄
			}
			else if($data['script'][81] == $scriptslide[count($scriptslide)-5])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-5]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-5]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CH'. $i, $topic_slide[0]);//氣
				$objPHPExcel->getActiveSheet()->setCellValue('CI'. $i, $topic_slide[1]);//球
				$objPHPExcel->getActiveSheet()->setCellValue('CJ'. $i, $topic_slide[2]);//輕
				$objPHPExcel->getActiveSheet()->setCellValue('CK'. $i, $topic_slide[3]);//飄
				$objPHPExcel->getActiveSheet()->setCellValue('CL'. $i, $topic_slide[4]);//飄
			}
			else if($data['script'][81] == $scriptslide[count($scriptslide)-4])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-4]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-4]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CH'. $i, $topic_slide[0]);//氣
				$objPHPExcel->getActiveSheet()->setCellValue('CI'. $i, $topic_slide[1]);//球
				$objPHPExcel->getActiveSheet()->setCellValue('CJ'. $i, $topic_slide[2]);//輕
				$objPHPExcel->getActiveSheet()->setCellValue('CK'. $i, $topic_slide[3]);//飄
				$objPHPExcel->getActiveSheet()->setCellValue('CL'. $i, $topic_slide[4]);//飄
			}
			else if($data['script'][81] == $scriptslide[count($scriptslide)-3])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-3]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-3]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CH'. $i, $topic_slide[0]);//氣
				$objPHPExcel->getActiveSheet()->setCellValue('CI'. $i, $topic_slide[1]);//球
				$objPHPExcel->getActiveSheet()->setCellValue('CJ'. $i, $topic_slide[2]);//輕
				$objPHPExcel->getActiveSheet()->setCellValue('CK'. $i, $topic_slide[3]);//飄
				$objPHPExcel->getActiveSheet()->setCellValue('CL'. $i, $topic_slide[4]);//飄
			}
			else if($data['script'][81] == $scriptslide[count($scriptslide)-2])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-2]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-2]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CH'. $i, $topic_slide[0]);//氣
				$objPHPExcel->getActiveSheet()->setCellValue('CI'. $i, $topic_slide[1]);//球
				$objPHPExcel->getActiveSheet()->setCellValue('CJ'. $i, $topic_slide[2]);//輕
				$objPHPExcel->getActiveSheet()->setCellValue('CK'. $i, $topic_slide[3]);//飄
				$objPHPExcel->getActiveSheet()->setCellValue('CL'. $i, $topic_slide[4]);//飄
			}
			else if($data['script'][81] == $scriptslide[count($scriptslide)-1])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-1]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-1]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CH'. $i, $topic_slide[0]);//氣
				$objPHPExcel->getActiveSheet()->setCellValue('CI'. $i, $topic_slide[1]);//球
				$objPHPExcel->getActiveSheet()->setCellValue('CJ'. $i, $topic_slide[2]);//輕
				$objPHPExcel->getActiveSheet()->setCellValue('CK'. $i, $topic_slide[3]);//飄
				$objPHPExcel->getActiveSheet()->setCellValue('CL'. $i, $topic_slide[4]);//飄
			}
			
			if($data['script'][82] == $scriptslide[count($scriptslide)-7])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-7]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-7]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CM'. $i, $topic_slide[0]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CN'. $i, $topic_slide[1]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CO'. $i, $topic_slide[2]);//學
				$objPHPExcel->getActiveSheet()->setCellValue('CP'. $i, $topic_slide[3]);//兔
				$objPHPExcel->getActiveSheet()->setCellValue('CQ'. $i, $topic_slide[4]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('CR'. $i, $topic_slide[5]);//跳
			}
			else if($data['script'][82] == $scriptslide[count($scriptslide)-6])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-6]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-6]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CM'. $i, $topic_slide[0]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CN'. $i, $topic_slide[1]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CO'. $i, $topic_slide[2]);//學
				$objPHPExcel->getActiveSheet()->setCellValue('CP'. $i, $topic_slide[3]);//兔
				$objPHPExcel->getActiveSheet()->setCellValue('CQ'. $i, $topic_slide[4]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('CR'. $i, $topic_slide[5]);//跳
			}
			else if($data['script'][82] == $scriptslide[count($scriptslide)-5])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-5]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-5]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CM'. $i, $topic_slide[0]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CN'. $i, $topic_slide[1]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CO'. $i, $topic_slide[2]);//學
				$objPHPExcel->getActiveSheet()->setCellValue('CP'. $i, $topic_slide[3]);//兔
				$objPHPExcel->getActiveSheet()->setCellValue('CQ'. $i, $topic_slide[4]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('CR'. $i, $topic_slide[5]);//跳
			}
			else if($data['script'][82] == $scriptslide[count($scriptslide)-4])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-4]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-4]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CM'. $i, $topic_slide[0]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CN'. $i, $topic_slide[1]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CO'. $i, $topic_slide[2]);//學
				$objPHPExcel->getActiveSheet()->setCellValue('CP'. $i, $topic_slide[3]);//兔
				$objPHPExcel->getActiveSheet()->setCellValue('CQ'. $i, $topic_slide[4]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('CR'. $i, $topic_slide[5]);//跳
			}
			else if($data['script'][82] == $scriptslide[count($scriptslide)-3])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-3]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-3]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CM'. $i, $topic_slide[0]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CN'. $i, $topic_slide[1]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CO'. $i, $topic_slide[2]);//學
				$objPHPExcel->getActiveSheet()->setCellValue('CP'. $i, $topic_slide[3]);//兔
				$objPHPExcel->getActiveSheet()->setCellValue('CQ'. $i, $topic_slide[4]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('CR'. $i, $topic_slide[5]);//跳
			}
			else if($data['script'][82] == $scriptslide[count($scriptslide)-2])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-2]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-2]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CM'. $i, $topic_slide[0]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CN'. $i, $topic_slide[1]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CO'. $i, $topic_slide[2]);//學
				$objPHPExcel->getActiveSheet()->setCellValue('CP'. $i, $topic_slide[3]);//兔
				$objPHPExcel->getActiveSheet()->setCellValue('CQ'. $i, $topic_slide[4]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('CR'. $i, $topic_slide[5]);//跳
			}
			else if($data['script'][82] == $scriptslide[count($scriptslide)-1])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-1]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-1]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CM'. $i, $topic_slide[0]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CN'. $i, $topic_slide[1]);//弟
				$objPHPExcel->getActiveSheet()->setCellValue('CO'. $i, $topic_slide[2]);//學
				$objPHPExcel->getActiveSheet()->setCellValue('CP'. $i, $topic_slide[3]);//兔
				$objPHPExcel->getActiveSheet()->setCellValue('CQ'. $i, $topic_slide[4]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('CR'. $i, $topic_slide[5]);//跳
			}
			
			if($data['script'][83] == $scriptslide[count($scriptslide)-7])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-7]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-7]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CS'. $i, $topic_slide[0]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CT'. $i, $topic_slide[1]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CU'. $i, $topic_slide[2]);//喜
				$objPHPExcel->getActiveSheet()->setCellValue('CV'. $i, $topic_slide[3]);//歡
				$objPHPExcel->getActiveSheet()->setCellValue('CW'. $i, $topic_slide[4]);//吃
				$objPHPExcel->getActiveSheet()->setCellValue('CX'. $i, $topic_slide[5]);//西
				$objPHPExcel->getActiveSheet()->setCellValue('CY'. $i, $topic_slide[6]);//瓜
				
			}
			else if($data['script'][83] == $scriptslide[count($scriptslide)-6])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-6]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-6]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CS'. $i, $topic_slide[0]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CT'. $i, $topic_slide[1]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CU'. $i, $topic_slide[2]);//喜
				$objPHPExcel->getActiveSheet()->setCellValue('CV'. $i, $topic_slide[3]);//歡
				$objPHPExcel->getActiveSheet()->setCellValue('CW'. $i, $topic_slide[4]);//吃
				$objPHPExcel->getActiveSheet()->setCellValue('CX'. $i, $topic_slide[5]);//西
				$objPHPExcel->getActiveSheet()->setCellValue('CY'. $i, $topic_slide[6]);//瓜
			}
			else if($data['script'][83] == $scriptslide[count($scriptslide)-5])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-5]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-5]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CS'. $i, $topic_slide[0]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CT'. $i, $topic_slide[1]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CU'. $i, $topic_slide[2]);//喜
				$objPHPExcel->getActiveSheet()->setCellValue('CV'. $i, $topic_slide[3]);//歡
				$objPHPExcel->getActiveSheet()->setCellValue('CW'. $i, $topic_slide[4]);//吃
				$objPHPExcel->getActiveSheet()->setCellValue('CX'. $i, $topic_slide[5]);//西
				$objPHPExcel->getActiveSheet()->setCellValue('CY'. $i, $topic_slide[6]);//瓜
			}
			else if($data['script'][83] == $scriptslide[count($scriptslide)-4])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-4]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-4]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CS'. $i, $topic_slide[0]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CT'. $i, $topic_slide[1]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CU'. $i, $topic_slide[2]);//喜
				$objPHPExcel->getActiveSheet()->setCellValue('CV'. $i, $topic_slide[3]);//歡
				$objPHPExcel->getActiveSheet()->setCellValue('CW'. $i, $topic_slide[4]);//吃
				$objPHPExcel->getActiveSheet()->setCellValue('CX'. $i, $topic_slide[5]);//西
				$objPHPExcel->getActiveSheet()->setCellValue('CY'. $i, $topic_slide[6]);//瓜
			}
			else if($data['script'][83] == $scriptslide[count($scriptslide)-3])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-3]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-3]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CS'. $i, $topic_slide[0]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CT'. $i, $topic_slide[1]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CU'. $i, $topic_slide[2]);//喜
				$objPHPExcel->getActiveSheet()->setCellValue('CV'. $i, $topic_slide[3]);//歡
				$objPHPExcel->getActiveSheet()->setCellValue('CW'. $i, $topic_slide[4]);//吃
				$objPHPExcel->getActiveSheet()->setCellValue('CX'. $i, $topic_slide[5]);//西
				$objPHPExcel->getActiveSheet()->setCellValue('CY'. $i, $topic_slide[6]);//瓜
			}
			else if($data['script'][83] == $scriptslide[count($scriptslide)-2])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-2]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-2]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CS'. $i, $topic_slide[0]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CT'. $i, $topic_slide[1]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CU'. $i, $topic_slide[2]);//喜
				$objPHPExcel->getActiveSheet()->setCellValue('CV'. $i, $topic_slide[3]);//歡
				$objPHPExcel->getActiveSheet()->setCellValue('CW'. $i, $topic_slide[4]);//吃
				$objPHPExcel->getActiveSheet()->setCellValue('CX'. $i, $topic_slide[5]);//西
				$objPHPExcel->getActiveSheet()->setCellValue('CY'. $i, $topic_slide[6]);//瓜
			}
			else if($data['script'][83] == $scriptslide[count($scriptslide)-1])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-1]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-1]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CS'. $i, $topic_slide[0]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CT'. $i, $topic_slide[1]);//姊
				$objPHPExcel->getActiveSheet()->setCellValue('CU'. $i, $topic_slide[2]);//喜
				$objPHPExcel->getActiveSheet()->setCellValue('CV'. $i, $topic_slide[3]);//歡
				$objPHPExcel->getActiveSheet()->setCellValue('CW'. $i, $topic_slide[4]);//吃
				$objPHPExcel->getActiveSheet()->setCellValue('CX'. $i, $topic_slide[5]);//西
				$objPHPExcel->getActiveSheet()->setCellValue('CY'. $i, $topic_slide[6]);//瓜
			}
			
			if($data['script'][84] == $scriptslide[count($scriptslide)-7])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-7]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-7]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CZ'. $i, $topic_slide[0]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DA'. $i, $topic_slide[1]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DB'. $i, $topic_slide[2]);//愛
				$objPHPExcel->getActiveSheet()->setCellValue('DC'. $i, $topic_slide[3]);//喝
				$objPHPExcel->getActiveSheet()->setCellValue('DD'. $i, $topic_slide[4]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DE'. $i, $topic_slide[5]);//口
				$objPHPExcel->getActiveSheet()->setCellValue('DF'. $i, $topic_slide[6]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DG'. $i, $topic_slide[7]);//樂
			}
			else if($data['script'][84] == $scriptslide[count($scriptslide)-6])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-6]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-6]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CZ'. $i, $topic_slide[0]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DA'. $i, $topic_slide[1]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DB'. $i, $topic_slide[2]);//愛
				$objPHPExcel->getActiveSheet()->setCellValue('DC'. $i, $topic_slide[3]);//喝
				$objPHPExcel->getActiveSheet()->setCellValue('DD'. $i, $topic_slide[4]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DE'. $i, $topic_slide[5]);//口
				$objPHPExcel->getActiveSheet()->setCellValue('DF'. $i, $topic_slide[6]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DG'. $i, $topic_slide[7]);//樂
			}
			else if($data['script'][84] == $scriptslide[count($scriptslide)-5])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-5]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-5]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CZ'. $i, $topic_slide[0]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DA'. $i, $topic_slide[1]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DB'. $i, $topic_slide[2]);//愛
				$objPHPExcel->getActiveSheet()->setCellValue('DC'. $i, $topic_slide[3]);//喝
				$objPHPExcel->getActiveSheet()->setCellValue('DD'. $i, $topic_slide[4]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DE'. $i, $topic_slide[5]);//口
				$objPHPExcel->getActiveSheet()->setCellValue('DF'. $i, $topic_slide[6]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DG'. $i, $topic_slide[7]);//樂
			}
			else if($data['script'][84] == $scriptslide[count($scriptslide)-4])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-4]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-4]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CZ'. $i, $topic_slide[0]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DA'. $i, $topic_slide[1]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DB'. $i, $topic_slide[2]);//愛
				$objPHPExcel->getActiveSheet()->setCellValue('DC'. $i, $topic_slide[3]);//喝
				$objPHPExcel->getActiveSheet()->setCellValue('DD'. $i, $topic_slide[4]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DE'. $i, $topic_slide[5]);//口
				$objPHPExcel->getActiveSheet()->setCellValue('DF'. $i, $topic_slide[6]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DG'. $i, $topic_slide[7]);//樂
			}
			else if($data['script'][84] == $scriptslide[count($scriptslide)-3])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-3]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-3]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CZ'. $i, $topic_slide[0]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DA'. $i, $topic_slide[1]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DB'. $i, $topic_slide[2]);//愛
				$objPHPExcel->getActiveSheet()->setCellValue('DC'. $i, $topic_slide[3]);//喝
				$objPHPExcel->getActiveSheet()->setCellValue('DD'. $i, $topic_slide[4]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DE'. $i, $topic_slide[5]);//口
				$objPHPExcel->getActiveSheet()->setCellValue('DF'. $i, $topic_slide[6]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DG'. $i, $topic_slide[7]);//樂
			}
			else if($data['script'][84] == $scriptslide[count($scriptslide)-2])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-2]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-2]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CZ'. $i, $topic_slide[0]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DA'. $i, $topic_slide[1]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DB'. $i, $topic_slide[2]);//愛
				$objPHPExcel->getActiveSheet()->setCellValue('DC'. $i, $topic_slide[3]);//喝
				$objPHPExcel->getActiveSheet()->setCellValue('DD'. $i, $topic_slide[4]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DE'. $i, $topic_slide[5]);//口
				$objPHPExcel->getActiveSheet()->setCellValue('DF'. $i, $topic_slide[6]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DG'. $i, $topic_slide[7]);//樂
			}
			else if($data['script'][84] == $scriptslide[count($scriptslide)-1])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-1]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-1]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('CZ'. $i, $topic_slide[0]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DA'. $i, $topic_slide[1]);//哥
				$objPHPExcel->getActiveSheet()->setCellValue('DB'. $i, $topic_slide[2]);//愛
				$objPHPExcel->getActiveSheet()->setCellValue('DC'. $i, $topic_slide[3]);//喝
				$objPHPExcel->getActiveSheet()->setCellValue('DD'. $i, $topic_slide[4]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DE'. $i, $topic_slide[5]);//口
				$objPHPExcel->getActiveSheet()->setCellValue('DF'. $i, $topic_slide[6]);//可
				$objPHPExcel->getActiveSheet()->setCellValue('DG'. $i, $topic_slide[7]);//樂
			}
			
			if($data['script'][85] == $scriptslide[count($scriptslide)-7])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-7]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-7]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DH'. $i, $topic_slide[0]);//一
				$objPHPExcel->getActiveSheet()->setCellValue('DI'. $i, $topic_slide[1]);//二
				$objPHPExcel->getActiveSheet()->setCellValue('DJ'. $i, $topic_slide[2]);//三
				$objPHPExcel->getActiveSheet()->setCellValue('DK'. $i, $topic_slide[3]);//大
				$objPHPExcel->getActiveSheet()->setCellValue('DL'. $i, $topic_slide[4]);//家
				$objPHPExcel->getActiveSheet()->setCellValue('DM'. $i, $topic_slide[5]);//來
				$objPHPExcel->getActiveSheet()->setCellValue('DN'. $i, $topic_slide[6]);//賽
				$objPHPExcel->getActiveSheet()->setCellValue('DO'. $i, $topic_slide[7]);//跑
			}
			else if($data['script'][85] == $scriptslide[count($scriptslide)-6])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-6]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-6]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DH'. $i, $topic_slide[0]);//一
				$objPHPExcel->getActiveSheet()->setCellValue('DI'. $i, $topic_slide[1]);//二
				$objPHPExcel->getActiveSheet()->setCellValue('DJ'. $i, $topic_slide[2]);//三
				$objPHPExcel->getActiveSheet()->setCellValue('DK'. $i, $topic_slide[3]);//大
				$objPHPExcel->getActiveSheet()->setCellValue('DL'. $i, $topic_slide[4]);//家
				$objPHPExcel->getActiveSheet()->setCellValue('DM'. $i, $topic_slide[5]);//來
				$objPHPExcel->getActiveSheet()->setCellValue('DN'. $i, $topic_slide[6]);//賽
				$objPHPExcel->getActiveSheet()->setCellValue('DO'. $i, $topic_slide[7]);//跑
			}
			else if($data['script'][85] == $scriptslide[count($scriptslide)-5])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-5]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-5]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DH'. $i, $topic_slide[0]);//一
				$objPHPExcel->getActiveSheet()->setCellValue('DI'. $i, $topic_slide[1]);//二
				$objPHPExcel->getActiveSheet()->setCellValue('DJ'. $i, $topic_slide[2]);//三
				$objPHPExcel->getActiveSheet()->setCellValue('DK'. $i, $topic_slide[3]);//大
				$objPHPExcel->getActiveSheet()->setCellValue('DL'. $i, $topic_slide[4]);//家
				$objPHPExcel->getActiveSheet()->setCellValue('DM'. $i, $topic_slide[5]);//來
				$objPHPExcel->getActiveSheet()->setCellValue('DN'. $i, $topic_slide[6]);//賽
				$objPHPExcel->getActiveSheet()->setCellValue('DO'. $i, $topic_slide[7]);//跑
			}
			else if($data['script'][85] == $scriptslide[count($scriptslide)-4])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-4]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-4]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DH'. $i, $topic_slide[0]);//一
				$objPHPExcel->getActiveSheet()->setCellValue('DI'. $i, $topic_slide[1]);//二
				$objPHPExcel->getActiveSheet()->setCellValue('DJ'. $i, $topic_slide[2]);//三
				$objPHPExcel->getActiveSheet()->setCellValue('DK'. $i, $topic_slide[3]);//大
				$objPHPExcel->getActiveSheet()->setCellValue('DL'. $i, $topic_slide[4]);//家
				$objPHPExcel->getActiveSheet()->setCellValue('DM'. $i, $topic_slide[5]);//來
				$objPHPExcel->getActiveSheet()->setCellValue('DN'. $i, $topic_slide[6]);//賽
				$objPHPExcel->getActiveSheet()->setCellValue('DO'. $i, $topic_slide[7]);//跑
			}
			else if($data['script'][85] == $scriptslide[count($scriptslide)-3])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-3]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-3]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DH'. $i, $topic_slide[0]);//一
				$objPHPExcel->getActiveSheet()->setCellValue('DI'. $i, $topic_slide[1]);//二
				$objPHPExcel->getActiveSheet()->setCellValue('DJ'. $i, $topic_slide[2]);//三
				$objPHPExcel->getActiveSheet()->setCellValue('DK'. $i, $topic_slide[3]);//大
				$objPHPExcel->getActiveSheet()->setCellValue('DL'. $i, $topic_slide[4]);//家
				$objPHPExcel->getActiveSheet()->setCellValue('DM'. $i, $topic_slide[5]);//來
				$objPHPExcel->getActiveSheet()->setCellValue('DN'. $i, $topic_slide[6]);//賽
				$objPHPExcel->getActiveSheet()->setCellValue('DO'. $i, $topic_slide[7]);//跑
			}
			else if($data['script'][85] == $scriptslide[count($scriptslide)-2])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-2]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-2]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DH'. $i, $topic_slide[0]);//一
				$objPHPExcel->getActiveSheet()->setCellValue('DI'. $i, $topic_slide[1]);//二
				$objPHPExcel->getActiveSheet()->setCellValue('DJ'. $i, $topic_slide[2]);//三
				$objPHPExcel->getActiveSheet()->setCellValue('DK'. $i, $topic_slide[3]);//大
				$objPHPExcel->getActiveSheet()->setCellValue('DL'. $i, $topic_slide[4]);//家
				$objPHPExcel->getActiveSheet()->setCellValue('DM'. $i, $topic_slide[5]);//來
				$objPHPExcel->getActiveSheet()->setCellValue('DN'. $i, $topic_slide[6]);//賽
				$objPHPExcel->getActiveSheet()->setCellValue('DO'. $i, $topic_slide[7]);//跑
			}
			else if($data['script'][85] == $scriptslide[count($scriptslide)-1])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-1]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-1]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DH'. $i, $topic_slide[0]);//一
				$objPHPExcel->getActiveSheet()->setCellValue('DI'. $i, $topic_slide[1]);//二
				$objPHPExcel->getActiveSheet()->setCellValue('DJ'. $i, $topic_slide[2]);//三
				$objPHPExcel->getActiveSheet()->setCellValue('DK'. $i, $topic_slide[3]);//大
				$objPHPExcel->getActiveSheet()->setCellValue('DL'. $i, $topic_slide[4]);//家
				$objPHPExcel->getActiveSheet()->setCellValue('DM'. $i, $topic_slide[5]);//來
				$objPHPExcel->getActiveSheet()->setCellValue('DN'. $i, $topic_slide[6]);//賽
				$objPHPExcel->getActiveSheet()->setCellValue('DO'. $i, $topic_slide[7]);//跑
			}
			
			if($data['script'][86] == $scriptslide[count($scriptslide)-7])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-7]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-7]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DP'. $i, $topic_slide[0]);//警
				$objPHPExcel->getActiveSheet()->setCellValue('DQ'. $i, $topic_slide[1]);//察
				$objPHPExcel->getActiveSheet()->setCellValue('DR'. $i, $topic_slide[2]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DS'. $i, $topic_slide[3]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DT'. $i, $topic_slide[4]);//吹
				$objPHPExcel->getActiveSheet()->setCellValue('DU'. $i, $topic_slide[5]);//哨
				$objPHPExcel->getActiveSheet()->setCellValue('DV'. $i, $topic_slide[6]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('DW'. $i, $topic_slide[7]);//抓
				$objPHPExcel->getActiveSheet()->setCellValue('DX'. $i, $topic_slide[8]);//小
				$objPHPExcel->getActiveSheet()->setCellValue('DY'. $i, $topic_slide[9]);//偷
			}
			else if($data['script'][86] == $scriptslide[count($scriptslide)-6])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-6]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-6]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DP'. $i, $topic_slide[0]);//警
				$objPHPExcel->getActiveSheet()->setCellValue('DQ'. $i, $topic_slide[1]);//察
				$objPHPExcel->getActiveSheet()->setCellValue('DR'. $i, $topic_slide[2]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DS'. $i, $topic_slide[3]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DT'. $i, $topic_slide[4]);//吹
				$objPHPExcel->getActiveSheet()->setCellValue('DU'. $i, $topic_slide[5]);//哨
				$objPHPExcel->getActiveSheet()->setCellValue('DV'. $i, $topic_slide[6]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('DW'. $i, $topic_slide[7]);//抓
				$objPHPExcel->getActiveSheet()->setCellValue('DX'. $i, $topic_slide[8]);//小
				$objPHPExcel->getActiveSheet()->setCellValue('DY'. $i, $topic_slide[9]);//偷
			}
			else if($data['script'][86] == $scriptslide[count($scriptslide)-5])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-5]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-5]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DP'. $i, $topic_slide[0]);//警
				$objPHPExcel->getActiveSheet()->setCellValue('DQ'. $i, $topic_slide[1]);//察
				$objPHPExcel->getActiveSheet()->setCellValue('DR'. $i, $topic_slide[2]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DS'. $i, $topic_slide[3]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DT'. $i, $topic_slide[4]);//吹
				$objPHPExcel->getActiveSheet()->setCellValue('DU'. $i, $topic_slide[5]);//哨
				$objPHPExcel->getActiveSheet()->setCellValue('DV'. $i, $topic_slide[6]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('DW'. $i, $topic_slide[7]);//抓
				$objPHPExcel->getActiveSheet()->setCellValue('DX'. $i, $topic_slide[8]);//小
				$objPHPExcel->getActiveSheet()->setCellValue('DY'. $i, $topic_slide[9]);//偷
			}
			else if($data['script'][86] == $scriptslide[count($scriptslide)-4])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-4]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-4]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DP'. $i, $topic_slide[0]);//警
				$objPHPExcel->getActiveSheet()->setCellValue('DQ'. $i, $topic_slide[1]);//察
				$objPHPExcel->getActiveSheet()->setCellValue('DR'. $i, $topic_slide[2]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DS'. $i, $topic_slide[3]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DT'. $i, $topic_slide[4]);//吹
				$objPHPExcel->getActiveSheet()->setCellValue('DU'. $i, $topic_slide[5]);//哨
				$objPHPExcel->getActiveSheet()->setCellValue('DV'. $i, $topic_slide[6]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('DW'. $i, $topic_slide[7]);//抓
				$objPHPExcel->getActiveSheet()->setCellValue('DX'. $i, $topic_slide[8]);//小
				$objPHPExcel->getActiveSheet()->setCellValue('DY'. $i, $topic_slide[9]);//偷
			}
			else if($data['script'][86] == $scriptslide[count($scriptslide)-3])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-3]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-3]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DP'. $i, $topic_slide[0]);//警
				$objPHPExcel->getActiveSheet()->setCellValue('DQ'. $i, $topic_slide[1]);//察
				$objPHPExcel->getActiveSheet()->setCellValue('DR'. $i, $topic_slide[2]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DS'. $i, $topic_slide[3]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DT'. $i, $topic_slide[4]);//吹
				$objPHPExcel->getActiveSheet()->setCellValue('DU'. $i, $topic_slide[5]);//哨
				$objPHPExcel->getActiveSheet()->setCellValue('DV'. $i, $topic_slide[6]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('DW'. $i, $topic_slide[7]);//抓
				$objPHPExcel->getActiveSheet()->setCellValue('DX'. $i, $topic_slide[8]);//小
				$objPHPExcel->getActiveSheet()->setCellValue('DY'. $i, $topic_slide[9]);//偷
			}
			else if($data['script'][86] == $scriptslide[count($scriptslide)-2])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-2]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-2]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DP'. $i, $topic_slide[0]);//警
				$objPHPExcel->getActiveSheet()->setCellValue('DQ'. $i, $topic_slide[1]);//察
				$objPHPExcel->getActiveSheet()->setCellValue('DR'. $i, $topic_slide[2]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DS'. $i, $topic_slide[3]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DT'. $i, $topic_slide[4]);//吹
				$objPHPExcel->getActiveSheet()->setCellValue('DU'. $i, $topic_slide[5]);//哨
				$objPHPExcel->getActiveSheet()->setCellValue('DV'. $i, $topic_slide[6]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('DW'. $i, $topic_slide[7]);//抓
				$objPHPExcel->getActiveSheet()->setCellValue('DX'. $i, $topic_slide[8]);//小
				$objPHPExcel->getActiveSheet()->setCellValue('DY'. $i, $topic_slide[9]);//偷
			}
			else if($data['script'][86] == $scriptslide[count($scriptslide)-1])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-1]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-1]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DP'. $i, $topic_slide[0]);//警
				$objPHPExcel->getActiveSheet()->setCellValue('DQ'. $i, $topic_slide[1]);//察
				$objPHPExcel->getActiveSheet()->setCellValue('DR'. $i, $topic_slide[2]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DS'. $i, $topic_slide[3]);//伯
				$objPHPExcel->getActiveSheet()->setCellValue('DT'. $i, $topic_slide[4]);//吹
				$objPHPExcel->getActiveSheet()->setCellValue('DU'. $i, $topic_slide[5]);//哨
				$objPHPExcel->getActiveSheet()->setCellValue('DV'. $i, $topic_slide[6]);//子
				$objPHPExcel->getActiveSheet()->setCellValue('DW'. $i, $topic_slide[7]);//抓
				$objPHPExcel->getActiveSheet()->setCellValue('DX'. $i, $topic_slide[8]);//小
				$objPHPExcel->getActiveSheet()->setCellValue('DY'. $i, $topic_slide[9]);//偷
			}
			
			
			$slide1 = explode(",,",$children['score'][$n][38]);
			
			$scriptslide = explode(",",$children['script'][$n][38]);
			
			if($data['script'][87] == $scriptslide[count($scriptslide)-2])
			{		
				$topic_slide = explode(",",$slide1[count($slide1)-2]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-2]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DZ'. $i, $topic_slide[0]);//1
				$objPHPExcel->getActiveSheet()->setCellValue('EA'. $i, $topic_slide[1]);//2
				$objPHPExcel->getActiveSheet()->setCellValue('EB'. $i, $topic_slide[2]);//3
				$objPHPExcel->getActiveSheet()->setCellValue('EC'. $i, $topic_slide[3]);//4
				$objPHPExcel->getActiveSheet()->setCellValue('ED'. $i, $topic_slide[4]);//5
			}
			else if($data['script'][87] == $scriptslide[count($scriptslide)-1])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-1]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-1]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('DZ'. $i, $topic_slide[0]);//1
				$objPHPExcel->getActiveSheet()->setCellValue('EA'. $i, $topic_slide[1]);//2
				$objPHPExcel->getActiveSheet()->setCellValue('EB'. $i, $topic_slide[2]);//3
				$objPHPExcel->getActiveSheet()->setCellValue('EC'. $i, $topic_slide[3]);//4
				$objPHPExcel->getActiveSheet()->setCellValue('ED'. $i, $topic_slide[4]);//5
			}
			
			if($data['script'][88] == $scriptslide[count($scriptslide)-2])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-2]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-2]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('EE'. $i, $topic_slide[0]);//6
				$objPHPExcel->getActiveSheet()->setCellValue('EF'. $i, $topic_slide[1]);//7
				$objPHPExcel->getActiveSheet()->setCellValue('EG'. $i, $topic_slide[2]);//8
				$objPHPExcel->getActiveSheet()->setCellValue('EH'. $i, $topic_slide[3]);//9
				$objPHPExcel->getActiveSheet()->setCellValue('EI'. $i, $topic_slide[4]);//10
			}
			else if($data['script'][88] == $scriptslide[count($scriptslide)-1])
			{
				$topic_slide = explode(",",$slide1[count($slide1)-1]);
				$script_slide = explode(" ",$scriptslide[count($scriptslide)-1]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('EE'. $i, $topic_slide[0]);//6
				$objPHPExcel->getActiveSheet()->setCellValue('EF'. $i, $topic_slide[1]);//7
				$objPHPExcel->getActiveSheet()->setCellValue('EG'. $i, $topic_slide[2]);//8
				$objPHPExcel->getActiveSheet()->setCellValue('EH'. $i, $topic_slide[3]);//9
				$objPHPExcel->getActiveSheet()->setCellValue('EI'. $i, $topic_slide[4]);//10
			}
			
			$slide1 = explode(",",$children['score'][$n][40]);
			
			$objPHPExcel->getActiveSheet()->setCellValue('EJ'. $i, $slide1[0]);//ㄆㄚ
			$objPHPExcel->getActiveSheet()->setCellValue('EK'. $i, $slide1[1]);//ㄊㄚ
			$objPHPExcel->getActiveSheet()->setCellValue('EL'. $i, $slide1[2]);//ㄎㄚ
			
			$objPHPExcel->getActiveSheet()->setCellValue('EM'. $i, '');//次數/秒數
			
			$objPHPExcel->getActiveSheet()->setCellValue('EN'. $i, '');//說故事
			
			$n++;
		}

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle($project_name[0]->name);


		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $project_name[0]->name . '.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */