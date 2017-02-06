<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author CokesHome
 * @copyright Copyright (c) 2015, CokesHome
 * 
 * This is controller for Users Management
 */
class Brand extends Admin_Controller {
	    //Permissions
	protected $viewPermission   = "Users.View";
	protected $addPermission    = "Users.Add";
	protected $managePermission = "Users.Manage";
	protected $deletePermission = "Users.Delete";
	public function __construct()
	{
		parent::__construct();
		$this->lang->load('users');
		$this->load->model(array('users/users_model',
			'users/groups_model',
			'users/user_groups_model',
			'users/permissions_model',
			'users/user_permissions_model',
			'users/brand_model'
			));
		$this->template->page_icon('fa fa-bank');

	}

	public function index()
	{
       // $this->auth->restrict($this->viewPermission);
/*        if(isset($_POST['delete']) && has_permission($this->deletePermission))
        {
            $checked = $this->input->post('checked');
            if (is_array($checked) && count($checked))
            {
                $result = FALSE;
                $sukses = 0;
                foreach ($checked as $pid)
                {
                    $result      = $this->users_model->delete($pid);
                    if($result)
                    {
                        $keterangan = "SUKSES, hapus data user dengan ID : ".$pid;
                        $status     = 1;
                        $sukses++;
                    }
                    else
                        $keterangan = "GAGAL, hapus data user dengan ID : ".$pid;
                        $status     = 0;
                    $nm_hak_akses   = $this->deletePermission; 
                    $kode_universal = $pid;
                    $jumlah         = 1;
                    $sql            = $this->db->last_query();
                    simpan_aktifitas($nm_hak_akses, $kode_universal, $keterangan, $jumlah, $sql, $status);
                }
                if ($result)
                    $this->template->set_message(count($sukses) .' '. lang('users_del_success') .'.', 'success');
                else
                    $this->template->set_message(lang('users_del_fail') . $this->users_model->error, 'error');
            }
            else
                $this->template->set_message(lang('users_del_error'), 'error');
            unset($_POST['delete']);
        }*/

        // Pagination
        $this->load->library('pagination');
        if(isset($_POST['table_search']))
        	$search = isset($_POST['table_search'])?$this->input->post('table_search'):'';
        else
        	$search = isset($_GET['search'])?$this->input->get('search'):'';
        $filter = "";
        if($search!="")
        	$filter = "?search=".$search;
        $search2 = $this->db->escape_str($search);
        $where="`brand`.`name_brand` LIKE '%$search2%' ESCAPE '!'";
        $total = $this->brand_model
        ->where($where)
        ->count_all();
        $offset = $this->input->get('per_page');
        $limit = $this->config->item('list_limit');
        $this->pager['base_url']            = current_url().$filter;
        $this->pager['total_rows']          = $total;
        $this->pager['per_page']            = $limit;
        $this->pager['page_query_string']   = TRUE;
        $this->pagination->initialize($this->pager);

        $data = $this->brand_model->select("brand.*")
        ->order_by('id_brand','ASC')
        ->limit($limit, $offset)->find_all();
        $this->template->set('results', $data);
        $this->template->set('search', $search);
        $this->template->title(lang('brand_manage_title'));
        $this->template->set("numb", $offset+1);
        $this->template->render('brand_index'); 
    }

    public function create()
    {
    	$this->auth->restrict($this->addPermission);

    	if (isset($_POST['save']))
    	{
    		if ($this->save_brand())
    		{
    			$this->template->set_message(lang("brand_create_success"), 'success');
    			redirect('users/brand');
    		}
    	}

    	$this->template->title(lang('brand_title_new'));
    	$this->template->render('brand_form');
    }

}