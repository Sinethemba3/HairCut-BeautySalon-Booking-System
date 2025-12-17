<?php
class BookingServices extends Controller
{
    // 1) Require login
    public function __construct()
    {
        if (!Auth::logged_in()) {
            $this->redirect("login");
        }
    }

    public function index()
    {

        // 2) Load models & helpers
        $servicesModel    = new Service();
        $salonService     = new Salon_service(); 
        $request          = new Request();
        $session          = new Session();

        // 3) Allowed modes/branches
        $allowedModes    = ['hair', 'beauty'];
        $allowedBranches = ['east-london', 'mthatha'];

        // 4) Read from GET → session → defaults
        $modeFromGet   = strtolower(trim($request->get('mode')   ?? ''));
        $branchFromGet = strtolower(trim($request->get('branch') ?? ''));

        $mode   = in_array($modeFromGet,   $allowedModes)    ? $modeFromGet   : $session->get('selected_mode',   'hair');
        $branch = in_array($branchFromGet, $allowedBranches) ? $branchFromGet : $session->get('selected_branch', 'east-london');

        // 5) Persist in session
        $session->set('selected_mode',   $mode);
        $session->set('selected_branch', $branch);

        // 6) Load all salon services (therapists)
        $rows = $salonService->query("SELECT * FROM salon_services");

        // 7) Handle POST from the services form
        if ($request->posted()) {
            // 7a) Build main order data
            $data = $request->post();
            $data['paid']     = 0;
            $data['date']     = date("Y-m-d H:i:s");
            $data['user_url'] = $session->user('id');

            // 7b) Insert main order
            // show($data) or die();
            $servicesModel->insert($data);

            // 7c) Get new order ID
            $last = $servicesModel->first1(['user_url' => $data['user_url']]);
            if ($last) {
                $orderId = $last->id;

                // 7d) Extract the two parallel arrays
                $servicesList = $data['services_'] ?? [];
                $amountList   = $data['amount']    ?? [];

                // 7e) Insert each detail row
                $sdModel = new Service_detail();
                foreach ($servicesList as $i => $svc) {
                    
                    $sdModel->insert([
                        'order_id'     => $orderId,
                        'service_name' => $svc,
                        'price'        => $amountList[$i] ?? 0,
                        'date'         => date("Y-m-d H:i:s")
                    ]);
                }
            }

            // 7f) Redirect to therapist‐selection
            $this->redirect('therapists/edit');
        }

        // 8) Render the services view
        $this->view('bookingServices', [
            'rows'   => $rows,
            'mode'   => $mode,
            'branch' => $branch,
            // … you can also pass cart data here …
        ]);
    }
}
