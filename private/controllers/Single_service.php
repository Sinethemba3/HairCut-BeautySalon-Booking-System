<?php
    class Single_service extends  Controller
    {
        public function index($id = '')
        {
            $errors = array();

            if (!Auth::access('Staff')) {
                $this-> redirect("access-denied");
            }

            $our_sevices = new Our_service();
            $row = $our_sevices->first('service_id', $id);

            $page_tab = isset($_GET['tab']) ? $_GET['tab'] : 'staffs';
            $lect = new Staff();

            $results = false;
            
            if ($page_tab == 'staffs') {
                //Display staffs
                $query = "SELECT * FROM staffs WHERE service_id = :service_id && disabled = 0 ORDER BY id DESC";
                $staffs =  $lect->query($query, ['service_id'=>$id]);

                $data['staffs'] = $staffs;
            }

            $data['row']        = $row;
            $data['page_tab']   = $page_tab;
            $data['results']    = $results;
            $data['errors']     = $errors;

            $this->view('single_service', $data);
        }

        // Students Add
        public function staffsadd($id = '')
        {
            $errors = array();

            if (!Auth::logged_in()) {
                $this-> redirect("login");
            }

            $our_sevices = new Our_service();
            $row = $our_sevices->first('service_id', $id);
            
            $page_tab = 'staffs-add';
            $stud = new Staff();

            $results = false;

            if (count($_POST) > 0) {

                if (isset($_POST['search'])) {
                        // Handle errors caused by an empty input when searching
                        if (trim($_POST['name']) != "") {
                        // Find Students
                        $user = new User();
                        $name = "%".trim($_POST['name'])."%";
                        $query = "SELECT * FROM users WHERE (name LIKE :fname || surname LIKE :lname) && role = 'Staff' LIMIT 10";
                        $results = $user->query($query, ['fname'=>$name, 'lname'=>$name]);
                    }
                    else {
                        // errors
                        $errors[] = "Please type a name to find";
                    }
                }
                elseif (isset($_POST['selected'])) {
                    // Check Lecturer if it already exists or not
                    $query = "SELECT disabled, id FROM staffs WHERE user_id = :user_id && service_id = :service_id LIMIT 1";

                    // Add Students
                    if (!$check = $stud->query($query, [
                            'user_id'  => $_POST['selected'],
                            'service_id' => $id,
                        ])) {
                        
                        $arr = array();
                        $arr['user_id']     = $_POST['selected'];
                        $arr['service_id']    = $id;
                        $arr['disabled']    = 0;
                        $arr['date']        = date("Y-m-d H:i:s");
        
                        $stud->insert($arr);
        
                        $this->redirect('single_service/'.$id.'?tab=staffs');
                    }
                    else {
                       // check if user is active or not
                       if (isset($check[0]->disabled)) {
                        # code...
                        if ($check[0]->disabled) {
                            # code...
                            $arr = array();
                            $arr['disabled']    = 0;
                            $stud->update($check[0]->id,$arr);
            
                            $this->redirect('single_service/'.$id.'?tab=staffs');
                            }
                            else {
                                // Error code
                                $errors[] = "That staffs already belongs to this class";
                            }
                        }
                        else {
                            // Error code
                            $errors[] = "That staffs already belongs to this class";
                        }
                    }
                }
            }
            
            $data['row']        = $row;
            $data['page_tab']   = $page_tab;
            $data['results']    = $results;
            $data['errors']     = $errors;

            $this->view('single_service', $data);
        }

        // Stusents Remove
        public function staffsremove($id = '')
        {
            $errors = array();

            if (!Auth::logged_in()) {
                $this-> redirect("login");
            }

            $our_sevices = new Our_service();
            $row = $our_sevices->first('service_id', $id);
            
            $page_tab = 'staffs-remove';
            $stud = new Staff();

            $results = false;

            if (count($_POST) > 0) {

                if (isset($_POST['search'])) {
                        // Handle errors caused by an empty input when searching
                        if (trim($_POST['name']) != "") {
                        // Find Students
                        $user = new User();
                        $name = "%".trim($_POST['name'])."%";
                        $query = "SELECT * FROM users WHERE (name LIKE :fname || surname LIKE :lname) && role = 'Staff' LIMIT 10";
                        $results = $user->query($query, ['fname'=>$name, 'lname'=>$name]);
                    }
                    else {
                        //errors
                        $errors[] = "Please type a name to find";
                    }
                }
                elseif (isset($_POST['selected'])) {
                    // Check Lecturer if it already exists or not
                    $query = "SELECT id FROM staffs WHERE user_id = :user_id && service_id = :service_id && disabled = 0 LIMIT 1";

                    // Remove Students
                    if ($row = $stud->query($query, [
                            'user_id'  => $_POST['selected'],
                            'service_id' => $id,
                        ])) {
                        
                        $arr = array();
                        $arr['disabled'] = 1;
        
                        $stud->update($row[0]->id, $arr);
        
                        $this->redirect('single_service/'.$id.'?tab=staffs');
                    }
                    else {
                        // Error code
                        $errors[] = "That staffs was not found in this class";
                    }  
                }
            }
            
            $data['row']        = $row;
            $data['page_tab']   = $page_tab;
            $data['results']    = $results;
            $data['errors']     = $errors;

            $this->view('single_service', $data);
        }
    }