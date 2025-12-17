<?php
    class Bookings extends  Controller
    {
        public function index()
        {
            $errors = [];

            $our_services   = new Our_service();
            $salonModel     = new Salon();

            // Load other data separately
            $serviceData = $our_services->findAll();
            $salonData = $salonModel->findAll();

            // Pass all to the view
            $this->view('/bookings', [
                'rowz'   => $serviceData,
                'rows'   => $salonData,
                'errors' => $errors,
            ]);
        }
    }