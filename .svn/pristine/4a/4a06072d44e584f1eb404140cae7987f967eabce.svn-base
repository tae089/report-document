<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author CokesHome
 * @copyright Copyright (c) 2015, CokesHome
 * 
 * This is controller for Menu Module
 */

class Menus extends Admin_Controller {
    
    /**
     * Load the models, library, etc
     *
     * 
     */
    
    //Permission
    protected $viewPermission   = "Menus.View";
    protected $addPermission    = "Menus.Add";
    protected $managePermission = "Menus.Manage";
    protected $deletePermission = "Menus.Delete";

    public function __construct()
    {
        parent::__construct();

        $this->load->model('menus_model');
        $this->load->model('menus/permissions_model');
        // $this->load->library('Form_validation');
		$this->form_validation->set_error_delimiters('','');
		$this->lang->load('menus');

		$this->template->page_icon('fa fa-pencil');
    }

   	public function index()
   	{
   		$this->auth->restrict($this->viewPermission);

		if (isset($_POST['delete']) && has_permission($this->deletePermission))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->menus_model->delete($pid);
				}

				if ($result)
				{
					$this->template->set_message(count($checked) .' '. lang('menus_deleted') .'.', 'success');
				}
				else
				{
					$this->template->set_message(lang('menus_del_failure') . $this->menus_model->error, 'error');
				}
			}
			else
			{
				$this->template->set_message(lang('menus_del_error') . $this->menus_model->error, 'error');
			}
		}//end if

		$x = $this->db->dbprefix;

		$menus = $this->menus_model->where("parent_id",0)->order_by("order","ASC")->find_all();
		
		if($menus){
			foreach ($menus as $key => $mn) {
				$submenus = $this->menus_model->where("parent_id",$mn->id)->order_by("order","ASC")->find_all();
				if($submenus){
					$menus[$key]->child = $submenus;
				}
				else
				{
					$submenus = array();
					$menus[$key]->child = $submenus;
				}
				
			}
		}

		$parents 	 = $this->menus_model->where("parent_id",0)->order_by("title","ASC")->find_all();
		$permissions = $this->permissions_model->like("nm_permission",".View")->order_by("nm_permission","ASC")->find_all();
		
		$x 			 = $this->db->dbprefix;
		$group 		 = $this->db->order_by("group_name","ASC")->get("{$x}group_menus")->result(); 

		$this->template->set('group_menus',$group);
		$this->template->set('parents',$parents);
		$this->template->set('permissions',$permissions);
		$this->template->set('menus', $menus);
		$this->template->title(lang("menus_manage"));
		$this->template->page_icon('fa fa-list');
		$this->template->render('index');
   	}

   	//Create New Menu
   	public function create()
   	{
   		$this->auth->restrict($this->addPermission);
                
		if (isset($_POST['save']))
		{
			if ($this->save_menu())
			{
				$this->template->set_message(lang("menus_create_success"), 'success');
				redirect('menu');
			}
		}

		$parents 	 = $this->menus_model->where("parent_id",0)->order_by("title","ASC")->find_all();
		$permissions = $this->permissions_model->like("nm_permission",".View")->order_by("nm_permission","ASC")->find_all();
		
		$x 			 = $this->db->dbprefix;
		$group 		 = $this->db->order_by("group_name","ASC")->get("{$x}group_menus")->result(); 

		$this->template->set('group_menus',$group);
		$this->template->set('parents',$parents);
		$this->template->set('permissions',$permissions);
		$this->template->title(lang("menus_create_new_button"));
		$this->template->render('menus_form');
   	}

   	//Edit Categories
   	public function edit($id=0)
   	{
   		$this->auth->restrict($this->managePermission);
                
		if (empty($id))
		{
			$this->template->set_message(lang("menus_invalid_id"), 'error');
			redirect('menu');
		}

		if (isset($_POST['save']))
		{
			if ($this->save_menu('update', $id))
			{
				$this->template->set_message(lang("menus_edit_success"), 'success');
			}
		}

		$parents 	 = $this->menus_model->where("parent_id",0)->order_by("title","ASC")->find_all();
		$permissions = $this->permissions_model->like("nm_permission",".View")->order_by("nm_permission","ASC")->find_all();
		
		$x 			 = $this->db->dbprefix;
		$group 		 = $this->db->order_by("group_name","ASC")->get("{$x}group_menus")->result();

		$this->template->set('group_menus',$group);
		$this->template->set('parents',$parents);
		$this->template->set('permissions',$permissions);
		$this->template->set('data', $this->menus_model->find($id));
		$this->template->set('type',"edit");
		$this->template->title(lang("menus_edit_heading"));
		$this->template->render('menus_form');
   	}

   	protected function save_menu($type='insert', $id=0)
   	{
   		if($type=='insert')
   		{
   			$extrarule_name = "|unique[menus.title]";
   		}
   		else{
   			$extrarule_name = "";
   		}

   		$this->form_validation->set_rules('title','lang:menus_title','required|trim|max_length[100]'.$extrarule_name);
   		$this->form_validation->set_rules('link','lang:menus_link','trim|max_length[255]');
   		$this->form_validation->set_rules('icon','lang:menus_icon','trim|max_length[45]');
   		$this->form_validation->set_rules('target','lang:menus_target','trim|max_length[10]');
   		$this->form_validation->set_rules('group_menu','lang:menus_group','trim|max_length[11]|numeric');
   		$this->form_validation->set_rules('parent_id','lang:menus_parent','trim|max_length[11]|numeric');
   		$this->form_validation->set_rules('permission_id','lang:menus_permissions','trim|max_length[11]|numeric');
		$this->form_validation->set_rules('status','lang:menus_status','trim|max_length[1]|numeric');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		unset($_POST['submit'], $_POST['save']);

		if ($type == 'insert')
		{
			$id = $this->menus_model->insert($_POST);

			if (is_numeric($id))
			{
				$return = TRUE;
			}
			else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
			$return = $this->menus_model->update($id, $_POST);
		}

		return $return;
   	}


   	public function save_order()
   	{

   		$this->auth->restrict($this->managePermission);

   		$data = array();
   		$order = 1;
   		foreach ($_POST['menu'] as $key => $val) {
   			
   			if($val=="null")
   			{
   				$val = 0;
   			}

   			$x = array(
					'id'		=> $key,
					'parent_id' => $val,
					'order' 	=> $order
				);

   			array_push($data, $x);	
   			$order += 1;
   		}

   		if(count($data)){
   			$result = $this->menus_model->update_batch($data, 'id');
   		}

   		$param = array(
   				'save' => $result,
   				'token' => $this->security->get_csrf_hash()
   				);

   		echo json_encode($param);
   	}

   	//Save Menu using ajax
   	public function save_menus_ajax(){

   		$id 	= $this->input->post("menuid");
   		$type 	= $this->input->post("type");

   		$title 	= ($this->input->post('title')!="") ? $this->input->post('title'):"Untitled Menu";
   		$link 	= ($this->input->post('link') != "") ? $this->input->post('link'):"#";
   		$icon 	= ($this->input->post('icon')!="") ? $this->input->post('icon') : "fa fa-angle-right";
   		$target = $this->input->post('target');
   		$group_menu = $this->input->post('group_menu');
   		$parent_id 	= isset($_POST['parent_id']) ? $this->input->post('parent_id'):0;
   		$permission_id 	= isset($_POST['permission_id']) ? $this->input->post('permission_id'):0;
		$status 		= $this->input->post('status');
   		
   		if($type=="edit")
   		{
   			$this->auth->restrict($this->managePermission);

   			if($id!="")
			{
		   		
				$data = array(
							array(
								'id' => $id,
								'title' => $title,
								'link' => $link,
								'icon' => $icon,
								'target' => $target,
								'group_menu' => $group_menu,
								'parent_id' => $parent_id,
								'permission_id' => $permission_id,
								'status' => $status,
							)
						);

				//Update Menu
				$result = $this->menus_model->update_batch($data,'id');
			}
			else
			{
				$result = FALSE;
			}
   		}
   		else //Add New Menu
   		{
   			$this->auth->restrict($this->addPermission);

   			$x = $this->db->dbprefix;
   			$order = $this->db->select_max("order")->from("{$x}menus")->get()->result();
   			
   			$data = array(
						'title' => $title,
						'link' => $link,
						'icon' => $icon,
						'target' => $target,
						'group_menu' => $group_menu,
						'parent_id' => $parent_id,
						'permission_id' => $permission_id,
						'status' => $status,
						'order' => $order[0]->order + 1
					);

			//Add Menu
			$id = $this->menus_model->insert($data);

			if(is_numeric($id))
			{
				$result = TRUE;
			}
			else
			{
				$result = FALSE;
			}

   		}

		$param = array(
   				'save' => $result,
   				'token' => $this->security->get_csrf_hash()
   				);

		echo json_encode($param);
   	}

   	//Delete Menu
   	public function delete()
   	{
   		$this->auth->restrict($this->deletePermission);

   		$id = $this->input->post('id');

   		//check if menu has child
   		if(is_numeric($id)){
   			$check = $this->menus_model->count_by("parent_id",$id);
   			
   			if($check==0)
   			{
   				$result = $this->menus_model->delete($id);
   			}
   			else
   			{
   				$result = 2;
   			}	
   		}
   		else
   		{
   			$result = 0;
   		}

   		$param = array(
   				'delete' => $result,
   				'token' => $this->security->get_csrf_hash()
   				);

   		echo json_encode($param);
   		
   	}
}
?>