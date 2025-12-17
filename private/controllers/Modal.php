<?php 
	class Modal extends  Controller
	{
		public function index()
        {
            $services           = new Service();
            $product            = new Product();
            $salon_service      = new Salon_service();
            $service_details    = new Service_detail();

            $ses                = new Session;
			$req                = new Request;

            $cart = $ses->get('CART');
			$_SESSION['CART'] = $cart;

			$data['total'] = 0;

			if(is_array($cart)) {
				foreach ($cart as $key => $arr) {
					
					$cart[$key]['row'] = $product->first1(['id'=>$arr['id']]);

					if(!empty($cart[$key]['row']))
						$data['total'] += $cart[$key]['qty'] * $cart[$key]['row']->price;
				}
			}

			$data   = $salon_service->findall();

            if ($req->posted()) {
                # code...
                $arr              = $req->post();
                $arr['paid']      = 0;
                $arr['date']      = date("Y-m-d H:i:s");
                $arr['user_url']  = $ses->user('id');
                
                $services->insert($arr);

                //get id for last added order
                $arr2 = [];
                $arr2['user_url'] = $arr['user_url'];

                $services->services_type = 'desc';
                $row = $services->first1($arr2);

                $arr['order_id'] = 0;
                if ($row) {
                    # code...
                    $id = $row->id;
                    $arr['order_id'] = $id;

                    $arr2 = [];
                    $arr2['order_id'] = $id;

                    $service_details->insert($arr2);
                }
                
                $this->redirect('single_steps/edit');
            }

            $this->view('select_service', [
                'rows' => $data,
                'CART' => $cart,
            ]);
        }
	}