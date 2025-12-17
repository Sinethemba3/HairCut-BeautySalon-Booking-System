<?php
    class Payfastbookings extends  Controller
    {
        public function index()
        {
            
        }

        public function edit($id = '')
        {
            $ses      = new Session();
			$req      = new Request();
            $services = new Service();

            $id = trim($id == '') ? Auth::getUser_id() : $id;

            $query = "SELECT * FROM services ORDER BY id DESC";
            $data  = $services->query($query);

            if($req->posted()) {
                $arr = $req->post();

                $myrow = $services->first('user_id', $id);

                $arr['user_url'] = 0;
                if (is_object($myrow)) {
                    # code...
                    $bookingId = $myrow->id;
					$arr['user_url'] = $bookingId;

                    $arr2 = $myrow->amount;
                    $arr['amount'] = $arr2;

                    $arr['user_url'] = $ses->user('id');

                    $services->update($myrow->id, $_POST);
                }
            } 

            # code...
            $this->view('payfastbookings.edit', [
                'row'=>$data,
            ]);
        }
    }