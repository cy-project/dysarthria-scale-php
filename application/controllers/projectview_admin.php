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
		$date=  date("Y/m/d");
		
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
	public function modification_data_child(){
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
		
		$pm = new Project_model;
		$this->data = $this->uri->uri_to_assoc(3);
		
		$this->data['project_name'] = $pm->getProjectName($this->data['project_id']);
		
		$project_name = $this->data['project_name'];
		
		$project_id = $this->data['project_id'];
		
		$this->data = $pm->getTestingList($project_id);
		$this->data['project_id'] = $project_id;
		//$this->load->view('subjects_list_admin',$this->data);
		print_r($this->data);
		/*
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
		$objPHPExcel->getActiveSheet()->setCellValue('CC1', '爸爸抱寶寶');
		$objPHPExcel->getActiveSheet()->setCellValue('CD1', '氣球輕輕飄');
		$objPHPExcel->getActiveSheet()->setCellValue('CE1', '弟弟學兔子跳');
		$objPHPExcel->getActiveSheet()->setCellValue('CF1', '姊姊喜歡吃西瓜');
		$objPHPExcel->getActiveSheet()->setCellValue('CG1', '哥哥愛喝可口可樂');
		$objPHPExcel->getActiveSheet()->setCellValue('CH1', '一二三大家來賽跑');
		$objPHPExcel->getActiveSheet()->setCellValue('CI1', '警察伯伯吹哨子抓小偷');
		$objPHPExcel->getActiveSheet()->setCellValue('CJ1', '1 2 3 4 5');
		$objPHPExcel->getActiveSheet()->setCellValue('CK1', '6 7 8 9 10');
		$objPHPExcel->getActiveSheet()->setCellValue('CL1', 'ㄆㄚ ㄊㄚ ㄎㄚ');
		$objPHPExcel->getActiveSheet()->setCellValue('CM1', '次數/秒數');
		$objPHPExcel->getActiveSheet()->setCellValue('CN1', '說故事');

		for ($i = 2; $i < 5; $i++) {
			$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, '學生姓名');
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('H' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('I' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('J' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('K' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('L' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('M' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('N' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('O' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('P' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('Q' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('R' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('S' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('T' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('U' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('V' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('W' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('X' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('Y' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('Z' . $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AA'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AB'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AC'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AD'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AE'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AF'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AG'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AH'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AI'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AJ'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AK'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AL'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AM'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AN'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AO'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AP'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AQ'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AR'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AS'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AT'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AU'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AV'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AW'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AX'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AY'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('AZ'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BA'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BB'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BC'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BD'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BE'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BF'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BG'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BH'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BI'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BJ'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BK'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BL'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BM'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BN'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BO'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BP'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BQ'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BR'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BS'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BT'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BU'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BV'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BW'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BX'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BY'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('BZ'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CA'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CB'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CC'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CD'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CE'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CF'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CG'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CH'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CI'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CJ'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CK'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CL'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CM'. $i, 'Test value');
			$objPHPExcel->getActiveSheet()->setCellValue('CN'. $i, 'Test value');
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
		exit;*/
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */