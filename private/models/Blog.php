<?php
	class Blog  extends Model
	{
		protected $table = 'blogs';

		protected $allowedColumns = [
			'video',
			'blog_name',
			'uploaded_by',
			'description',
			'date',
		];

		protected $beforeInsert = [
			'make_user_id',
		];

		public function validate($DATA, $id = '')
		{
			$this->errors = [];
	
			if(empty($DATA['blog_name']))
			{
				$this->errors['blog_name'] = "Blog name is required";
			}
			
			if(empty($DATA['description']))
			{
				$this->errors['description'] = "Blog description is required";
			}
			
			if(empty($this->errors))
			{
				return true;
			}

			return false;
		}

		public function make_user_id($data)
		{
			if (isset($_SESSION['USER']->user_id)){
				$data['user_id'] = $_SESSION['USER']->user_id;
			}

			return $data;
		}

		function create_table()
		{
			
			$query = "create table if not exists blogs(

				id int unsigned primary key auto_increment,
				video varchar(1000) not null,
				blog_name varchar(25) not null,
				uploaded_by varchar(25) not null,
				description text,
				date varchar(10) not null,
				user_id int default 0 not null,

				key blog_name (blog_name),
				key uploaded_by (uploaded_by)
			)";

			$this->query($query);
		}
	}