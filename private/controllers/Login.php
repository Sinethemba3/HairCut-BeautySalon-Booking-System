<?php 
class Login extends Controller
{
    const MAX_ATTEMPTS = 3;
    const LOCKOUT_TIME = 60; // in seconds

    public function index()
    {
        $usersModel     = new User;
        $salonsModel    = new Salon;
        $session        = new Session;
        $customersModel = new Customer;

        // Flash a welcome toast
        // FlashMessages::flash("Login or Signup if you don't have an account.", "warning");
        
        $errors = [];
        $lockoutKey = 'login_lockout_' . $_SERVER['REMOTE_ADDR'];
        $attemptsKey = 'login_attempts_' . $_SERVER['REMOTE_ADDR'];

        // Check if the user is locked out
        $lockoutTime = $session->get($lockoutKey);
        if ($lockoutTime && (time() - $lockoutTime < self::LOCKOUT_TIME)) {
            $remaining = self::LOCKOUT_TIME - (time() - $lockoutTime);
            $errors['email'] = "Too many login attempts. Please try again in $remaining seconds.";
        } elseif (count($_POST) > 0) {
            $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                $errors['email'] = "Email and password are required.";
            } else {
                // Attempt login on users table first
                $row = $usersModel->where('email', $email);
                
                if ($row) {
                    $row = $row[0];
                    if (password_verify($password, $row->password)) {
                        $session->set($attemptsKey, 0);
                        $session->remove($lockoutKey);

                        Auth::authenticate($row); // Authenticate the user

                        // Redirect based on role/rank
                        $role = strtolower($row->role ?? '');

                        if (in_array($role, ['admin', 'super_admin'])) {
                            $this->redirect('/dashboard');
                        } elseif ($role === 'staff') {
                            $this->redirect('/therapist_accounts');
                        } else {
                            // Default fallback (could be user or other role)
                            $this->redirect('/dashboard');
                        }
                        return;
                    } else {
                        $errors['email'] = "Wrong email or password.";
                    }
                } else {
                    // Attempt login on customers table if user not found
                    $customer = $customersModel->where('email', $email);
                    if ($customer) {
                        $customer = $customer[0];
                        if (password_verify($password, $customer->password)) {
                            $session->set($attemptsKey, 0);
                            $session->remove($lockoutKey);

                            Auth::authenticate($customer); // Authenticate the customer

                            $this->redirect('/home'); // Redirect to home for customers
                            return;
                        } else {
                            $errors['email'] = "Wrong email or password.";
                        }
                    } else {
                        $errors['email'] = "No user or customer found with this email.";
                    }
                }

                // Increment login attempts on failure
                $attempts = $session->get($attemptsKey, 0) + 1;
                $session->set($attemptsKey, $attempts);

                if ($attempts >= self::MAX_ATTEMPTS) {
                    $session->set($lockoutKey, time()); // Set lockout time
                    $errors['locked'] = "Too many login attempts. Please try again in " . self::LOCKOUT_TIME . " seconds.";
                } else {
                    $errors['email'] = "Wrong email or password. Attempts remaining: " . (self::MAX_ATTEMPTS - $attempts);
                }
            }
        }

        $uniqueSalons = $salonsModel->findAll();

        $this->view('/login', [
            'uniqueSalons'   => $uniqueSalons,
            'errors'        => $errors
        ]);
    }
}
