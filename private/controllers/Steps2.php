<?php
    class Steps2 extends  Controller
    {
        public function index()
        {
            
        }

        public function edit($id = '')
        {
            $ses = new Session;
			$req = new Request;
            $services = new Service();

            $id = trim($id == '') ? Auth::getUser_id() : $id;

            $query = "SELECT * FROM services ORDER BY id DESC";
            $data = $services->query($query);

            if($req->posted()) {
                $arr = $req->post();

                $myrow = $services->first('user_id', $id);

                $arr['user_url'] = 0;
                if (is_object($myrow)) {
                    # code...
                    $id = $myrow->id;
					$arr['user_url'] = $id;

                    $arr2 = $myrow->amount;
                    $arr['amount'] = $arr2;
                    
                    $arr['user_url'] = $ses->user('id');

                    $services->update($myrow->id, $_POST);
                }

                if($arr['billingOptions']  == 'payfast'){
                    # code...
                    PayFastBookings($arr);
                }
                else {
                    # code...
                    $query = "UPDATE services SET paid = 1 WHERE user_url = :user_url  && id = :id LIMIT 1";
                    $data = $services->query($query);
                }
            } 

            # code...
            $this->view('steps2.edit', [
                'row'=>$data,
            ]);
        }
    }