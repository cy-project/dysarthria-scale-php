<?

class Permission_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Datamodel');
		$this->load->database();
	
	}
	
	public function insertGroup($pname,$pidarray)//array is a permission id array
	{
	
		
	
	}
	
	public function createPermision()//create a new permission
	{
	
	
	}
	
	
	public function addPermission($uid)//add user permission
	{
	
	
	}
	
	public function removePermission($uid)//remove user permission
	{
	
	
	}
	
	public function getPermissionList()
	{
	
	}
	

}


