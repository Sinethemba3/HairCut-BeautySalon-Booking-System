<?php
class Dashboard extends Controller
{
    public function __construct()
    {
        if (!Auth::logged_in()) {
            $this->redirect("login");
        }
    }

    public function index()
    {
        $serviceModel = new Service();
        $customerModel = new Customer();

        $thisMonth = date('Y-m');
        $lastMonth = date('Y-m', strtotime('-1 month'));

        // Revenue comparison (Services)
        $currentRevenue = (float)$serviceModel->query(
            "SELECT COALESCE(SUM(amount),0) AS total FROM services WHERE paid = 1 AND DATE_FORMAT(`date`, '%Y-%m') = ?", [$thisMonth]
        )[0]->total;

        $prevRevenue = (float)$serviceModel->query(
            "SELECT COALESCE(SUM(amount),0) AS total FROM services WHERE paid = 1 AND DATE_FORMAT(`date`, '%Y-%m') = ?", [$lastMonth]
        )[0]->total;

        $revenuePercent = $prevRevenue > 0 ? (($currentRevenue - $prevRevenue) / $prevRevenue) * 100 : 0;

        // Customers
        $currentCustomers = (int)$customerModel->query(
            "SELECT COUNT(*) AS cnt FROM customers WHERE DATE_FORMAT(`date`, '%Y-%m') = ?", [$thisMonth]
        )[0]->cnt;

        $prevCustomers = (int)$customerModel->query(
            "SELECT COUNT(*) AS cnt FROM customers WHERE DATE_FORMAT(`date`, '%Y-%m') = ?", [$lastMonth]
        )[0]->cnt;

        $customerPercent = $prevCustomers > 0 ? (($currentCustomers - $prevCustomers) / $prevCustomers) * 100 : 0;

        // Growth
        $growthPercent = ($revenuePercent + $customerPercent) / 2;

        // Monthly appointments (Jan - Dec)
        $monthly_appointments_query = "
            SELECT MONTH(date) AS month, COUNT(id) AS total
            FROM services
            WHERE date IS NOT NULL AND YEAR(date) = YEAR(CURDATE())
            GROUP BY MONTH(date)
        ";
        $monthly_appointments_data = $serviceModel->query($monthly_appointments_query);
        $appointments_by_month = array_fill(1, 12, 0);
        if ($monthly_appointments_data && is_array($monthly_appointments_data)) {
            foreach ($monthly_appointments_data as $row) {
                $appointments_by_month[(int)$row->month] = (int)$row->total;
            }
        }


        $this->view('dashboard', [
            'currentRevenue'        => $currentRevenue,
            'revenuePercent'        => $revenuePercent,
            'currentCustomers'      => $currentCustomers,
            'customerPercent'       => $customerPercent,
            'growthPercent'         => $growthPercent,
            'appointments_by_month' => $appointments_by_month 
        ]);
    }
}
