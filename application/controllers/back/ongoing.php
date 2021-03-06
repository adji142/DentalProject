<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* 
	*/
	class ongoing extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('back/m_dash');
			$this->load->model('back/m_profile');
			$this->load->model('back/m_post');
			$this->load->model('back/m_ongoing');
			$this->load->helper(array('url','file'));
		}
		function search(){
			if(is_null($this->input->get('id'))){
				$this->load->view('ongoing');
			}
			else{
				$this->load->model('m_ongoing');
				$data['post'] = $this->m_ongoing->search($this->input->get('id'));
				$this->load->view('ongoing',$data);
				echo $this->m_ongoing->search($this->input->get('id'));
			}
		}
		//test auto complate
		public function autocomplete()
        {
                // load model
                $this->load->model('m_ongoing');
                $search_data = $this->input->post('search');
                $id_reg = $this->session->userdata('id_reg');
                $result = $this->m_ongoing->get_autocomplete($search_data,$id_reg);
                if (!empty($result))
                {
                    foreach ($result as $row):
                        $param = $row->id_post;
                        $expired = "";
                        if($row->status=="expired"){
                        $expired='<font color = "red">This post is expired.</font> <a data-toggle="modal" href="'.base_url("back/ongoing/show_modal/".$param."").'">Re-new it</a>';
                            }
                            else{
                                $expired='';
                            }
                        echo '
                        <div id = "finalResult">
        <div class="col-md-3">
        <div class="box" style="height: 70%;">
        <div class="box-header with-border">
        <a href="'.base_url("back/edit/show/".$param."").'"><h3 class="box-title"><font color = "#0087F7">'.$row->promo_title.'</font></h3></a>
        <div class="box-tools pull-right">
        </div>
        </div>
        <div class="box-body">
        <p>
        <img width="100%" src="'.base_url().'/'.$row->pic1.'"  alt="User Image" height="50%" class="img-circle">
        </p>
        <p>
        <?php echo $desc;?>
        </p>
        <p>
        Periode :'.$row->start_period.' until '.$row->end_period.'
        </p>
        '.$expired.'
        </div>
        <div class="box-footer">
          <p><i class="fa fa-eye"> Viewer</i></p>
          <p><i class="fa fa-heart-o"> Like</i></p>
        </div>
        </div>
        </div>
        </div>
        ';
                    endforeach;
                }
                else
                {
                    echo "<li> <em> Not found ... </em> </li>";
                }

        }
        function asc(){
            $this->load->model('m_ongoing');
                $search_data = $this->input->post('new');
                $result = $this->m_ongoing->get_asc($search_data);
                if (!empty($result))
                {
                    foreach ($result as $row):
                        $param = $row->id_post;
                        $expired = "";
                        if($row->status=="expired"){
                        $expired='<font color = "red">This post is expired.</font> <a data-toggle="modal" href="'.base_url("back/ongoing/show_modal/".$param."").'">Re-new it</a>';
                            }
                            else{
                                $expired='';
                            }
                        echo '
                        <div id = "finalResult">
                        <div class="col-md-3">
                        <div class="box" style="height: 70%;">
                        <div class="box-header with-border">
                        <a href="'.base_url("back/edit/show/".$param."").'"><h3 class="box-title"><font color = "#0087F7">'.$row->promo_title.'</font></h3></a>
                        <div class="box-tools pull-right">
                        </div>
                        </div>
                        <div class="box-body">
                        <p>
                        <img width="100%" src="'.base_url().'/'.$row->pic1.'"  alt="User Image" height="50%" class="img-circle">
                        </p>
                        <p>
                        <?php echo $desc;?>
                        </p>
                        <p>
                        Periode :'.$row->start_period.' until '.$row->end_period.'
                        </p>
                        '.$expired.'
                        </div>
                        <div class="box-footer">
                          <p><i class="fa fa-eye"> Viewer</i></p>
                          <p><i class="fa fa-heart-o"> Like</i></p>
                        </div>
                        </div>
                        </div>
                        </div>
                        ';
                        endforeach;
                }
                else
                {
                    echo "<li> <em> Not found ... </em> </li>";
                }
        }
        function desc(){
            $this->load->model('m_ongoing');
                $search_data = $this->input->post('old');
                $result = $this->m_ongoing->get_desc($search_data);
                if (!empty($result))
                {
                    foreach ($result as $row):
                        $param = $row->id_post;
                        $expired = "";
                        if($row->status=="expired"){
                        $expired='<font color = "red">This post is expired.</font> <a data-toggle="modal" href="'.base_url("back/ongoing/show_modal/".$param."").'">Re-new it</a>';
                            }
                            else{
                                $expired='';
                            }
                        echo '
                        <div id = "finalResult">
                        <div class="col-md-3">
                        <div class="box" style="height: 70%;">
                        <div class="box-header with-border">
                        <a href="'.base_url("back/edit/show/".$param."").'"><h3 class="box-title"><font color = "#0087F7">'.$row->promo_title.'</font></h3></a>
                        <div class="box-tools pull-right">
                        </div>
                        </div>
                        <div class="box-body">
                        <p>
                        <img width="100%" src="'.base_url().'/'.$row->pic1.'"  alt="User Image" height="50%" class="img-circle">
                        </p>
                        <p>
                        <?php echo $desc;?>
                        </p>
                        <p>
                        Periode :'.$row->start_period.' until '.$row->end_period.'
                        </p>
                        '.$expired.'
                        </div>
                        <div class="box-footer">
                          <p><i class="fa fa-eye"> Viewer</i></p>
                          <p><i class="fa fa-heart-o"> Like</i></p>
                        </div>
                        </div>
                        </div>
                        </div>
                        ';
                        endforeach;
                }
                else
                {
                    echo "<li> <em> Not found ... </em> </li>";
                }
        }

        function exp(){
            $this->load->model('m_ongoing');
                $search_data = $this->input->post('old');
                $result = $this->m_ongoing->get_exp($search_data);
                if (!empty($result))
                {
                    foreach ($result as $row):
                        $param = $row->id_post;
                        $expired = "";
                        if($row->status=="expired"){
                        $expired='<font color = "red">This post is expired.</font> <a data-toggle="modal" href="'.base_url("back/ongoing/show_modal/".$param."").'">Re-new it</a>';
                            }
                            else{
                                $expired='';
                            }
                        echo '
                        <div id = "finalResult">
                        <div class="col-md-3">
                        <div class="box" style="height: 70%;">
                        <div class="box-header with-border">
                        <a href="'.base_url("back/edit/show/".$param."").'"><h3 class="box-title"><font color = "#0087F7">'.$row->promo_title.'</font></h3></a>
                        <div class="box-tools pull-right">
                        </div>
                        </div>
                        <div class="box-body">
                        <p>
                        <img width="100%" src="'.base_url().'/'.$row->pic1.'"  alt="User Image" height="50%" class="img-circle">
                        </p>
                        <p>
                        <?php echo $desc;?>
                        </p>
                        <p>
                        Periode :'.$row->start_period.' until '.$row->end_period.'
                        </p>
                        '.$expired.'
                            
                        </div>
                        <div class="box-footer">
                          <p><i class="fa fa-eye"> Viewer</i></p>
                          <p><i class="fa fa-heart-o"> Like</i></p>
                        </div>
                        </div>
                        </div>
                        </div>
                        ';
                        endforeach;
                }
                else
                {
                    echo "<li> <em> Not found ... </em> </li>";
                }
        }
        function run(){
            $this->load->model('m_ongoing');
                $search_data = $this->input->post('old');
                $result = $this->m_ongoing->get_run($search_data);
                if (!empty($result))
                {
                    foreach ($result as $row):
                        $param = $row->id_post;
                        $expired = "";
                        if($row->status=="expired"){
                        $expired='<font color = "red">This post is expired.</font> <a data-toggle="modal" href="'.base_url("back/ongoing/show_modal/".$param."").'">Re-new it</a>';
                            }
                            else{
                                $expired='';
                            }
                        echo '
                        <div id = "finalResult">
                        <div class="col-md-3">
                        <div class="box" style="height: 70%;">
                        <div class="box-header with-border">
                        <a href="'.base_url("back/edit/show/".$param."").'"><h3 class="box-title"><font color = "#0087F7">'.$row->promo_title.'</font></h3></a>
                        <div class="box-tools pull-right">
                        </div>
                        </div>
                        <div class="box-body">
                        <p>
                        <img width="100%" src="'.base_url().'/'.$row->pic1.'"  alt="User Image" height="50%" class="img-circle">
                        </p>
                        <p>
                        <?php echo $desc;?>
                        </p>
                        <p>
                        Periode :'.$row->start_period.' until '.$row->end_period.'
                        </p>
                        '.$expired.'
                        </div>
                        <div class="box-footer">
                          <p><i class="fa fa-eye"> Viewer</i></p>
                          <p><i class="fa fa-heart-o"> Like</i></p>
                        </div>
                        </div>
                        </div>
                        </div>
                        ';
                        endforeach;
                }
                else
                {
                    echo "<li> <em> Not found ... </em> </li>";
                }
        }
    function show_modal($param){
        $data['title'] = "Re New your promo duration";
        $data['get_post'] = $param;
        $data['show']="
            <script type='text/javascript'>
                $(window).on('load',function(){
                $('#modal_renew').modal('show');
                });
            </script>
        ";
        $this->load->view('back/ongoing',$data);
    }
    function re_new(){
        $id_reg = $this->session->userdata('id_reg');
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $id_post = $this->input->post('hide');
        $update = array(
            'start_period'=>$start,
            'end_period'=>$end,
            'status'=>'running'
        );
        $where = array(
            'id_post'=>$id_post,
            'id_reg' =>$id_reg
        );
        $go_update = $this->m_ongoing->go_renew($update,$where);
        if($go_update){
            $this->session->set_flashdata('result_renew','
                <div class="col-lg-12 connectedSortable">
                <div class="alert alert-success alert-dismissible">
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Succes re newing promo periode
                </div>
                </div>
                ');
            redirect('back/dashboard/ongoing/');
        }
        else{
            $this->session->set_flashdata('result_renew','
                <div class="col-lg-12 connectedSortable">
                <div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-ban"></i> Alert!! Failed to try update your promo periode</h4>
                </div>
                </div>');
        }
    }
	}
?>