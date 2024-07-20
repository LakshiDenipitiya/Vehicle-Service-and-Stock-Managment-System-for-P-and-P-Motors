<?php

class Report_Model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function countservice(){
		$sql="select*from jobrequest
		where 
		jobrequest.sparepart_id=jobrequest.id
		AND batch='{{batch}}'
		GROUP BY 
		sparepart";
		$query = $this->db->query($sql);
		return $query->result();

	}
}
	?>