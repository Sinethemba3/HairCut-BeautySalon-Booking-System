<?php
	class Message extends Model
	{
		protected $table = 'messages';

		protected $allowedColumns = [

			'name',
			'email',
			'subject',
			'message',
			'reply',
			'date',
		];

		protected $beforeInsert = [
            'make_user_id',
        ];

		public function validate($DATA, $id = '')
		{
			$this->errors = array();
	
			//check for name
            if (empty($DATA['name']) || !preg_match('/^[a-z A-Z]+$/', trim($DATA['name']))) {
                $this->errors['name'] = "Only letters allowed in name";
            }

            //check for email
            if (empty($DATA['email']) || !filter_var($DATA['email'], FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = "Email is not valid";
            }

			if(empty($DATA['subject']))
			{
				$this->errors['subject'] = "subject is required";
			}
			elseif(!preg_match('/^[a-z A-Z -~+_.?#=!&;,:%@$\|*]+$/', trim($DATA['subject'])))
			{
				$this->errors['subject'] = "Please enter a valid subject";
			}

			if(empty($DATA['message']))
			{
				$this->errors['message'] = "Message is required";
			}
			elseif(!preg_match('/^[a-z A-Z -~+_.?#=!&;,:%@$\|*]+$/', trim($DATA['message'])))
			{
				$this->errors['message'] = "Please enter a valid message";
			}

			// if(empty($DATA['reply']))
			// {
			// 	$this->errors['reply'] = "reply is required";
			// }
			// elseif(!preg_match('/^[a-z A-Z -~+_.?#=!&;,:%@$\|*]+$/', trim($DATA['reply'])))
			// {
			// 	$this->errors['reply'] = "Please enter a valid reply";
			// }
	
			if (count($this->errors) == 0) {
                return true;
            }

			return false;
		}

		public function make_user_id($data)
        {
            $data['user_id'] = random_string(60);
            
            return $data;
        }

		public function get_messages_count()
        {

			$message = new Message();
            if (Auth::access('Admin')) {
                # code...
                $query = "SELECT * FROM messages WHERE reply IN ('Pending')";
                $messages_count = $message->query($query);
            }

            if ($messages_count) {
                # code...
                return count($messages_count);
            }
            
            return 0;
        }
	}