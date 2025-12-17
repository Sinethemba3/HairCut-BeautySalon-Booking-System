<?php
    class Auth
    {
        public static function authenticate($row)
        {
            $_SESSION['USER'] = $row;
        }

        public static function logout()
        {
            if (isset($_SESSION['USER'])) {

               // Do something
               unset($_SESSION['USER']);
            }
        }

         /**
         * Check if the user is logged in.
         *
         * @return bool
         */
        public static function logged_in(): bool
        {
            if (isset($_SESSION['USER'])) {

               // Do something
               return true;
            }

            return false;
        }

        /**
         * Get the role of the logged-in user.
         *
         * @return string|false The user's role, or false if not logged in.
         */
        public static function user_name(): string|false
        {
            if (isset($_SESSION['USER'])) {

               // Do something
               return $_SESSION['USER']->name ?? false;;
            }
            return false;
        }

        /**
         * Get the surname of the logged-in user.
         *
         * @return string|false The user's surname, or false if not logged in.
         */
        public static function surname(): string|false
        {
            return $_SESSION['USER']->surname ?? false;
        }

        /**
         * Get the phone of the logged-in user.
         *
         * @return string|false The user's phone, or false if not logged in.
         */
        public static function phone(): string|false
        {
            return $_SESSION['USER']->phone ?? false;
        }

        /**
         * Get the email of the logged-in user.
         *
         * @return string|false The user's email, or false if not logged in.
         */
        public static function email(): string|false
        {
            return $_SESSION['USER']->email ?? false;
        }

        public static function __callStatic($method, $params)
        {
            $prop = strtolower(str_replace("get", "", $method));

            if (isset($_SESSION['USER']->$prop)) {

                // Do something
                return $_SESSION['USER']->$prop;
             }
             return 'Unknown';
        }

        public static function switch_salon($id)
        {
            if (isset($_SESSION['USER']) && $_SESSION['USER']->role == 'Supper_admin') {

                // Do something
                $user = new User();
                $salon = new Salon();

               if ($row = $salon->where('id', $id)) {

                    // Do something
                    $row = $row[0];
                    $arr['salon_id'] = $row->salon_id;

                    $user->update($_SESSION['USER']->id, $arr);
                    $_SESSION['USER']->salon_id = $row->salon_id;
                    $_SESSION['USER']->salon_name = $row->salon;
               }
               return true;
            }
            return false;
        }

        public static function access($user_type = 'Customer')
        {
            if (!isset($_SESSION['USER'])) {
                // Return
                return false;
            }

            // User Permissions
            $logged_in_user = $_SESSION['USER']->role ?? null;

            $USER_TYPE['Supper_admin']   = ['Supper_admin', 'Admin', 'Staff', 'Customer'];
            $USER_TYPE['Admin']          = ['Admin', 'Staff', 'Customer'];
            $USER_TYPE['Staff']          = ['Staff', 'Customer'];
            $USER_TYPE['Customer']       = ['Customer'];

            if (!isset($USER_TYPE[$logged_in_user])) {
                // Return
                return false;
            }

            if (in_array($user_type, $USER_TYPE[$logged_in_user])) {
                // Return
                return true;
            }
            return false;
        }

        public static function i_own_content($row)
        {
            if (is_array($row)) {
                # code...
                $row = $row[0];
            }

            if (!isset($_SESSION['USER'])) {
                // Return
                return false;
            }

            if (isset($row->user_id)) {
                # code...
                if ($_SESSION['USER']->user_id == $row->user_id) {
                    # code...
                    return true;
                }
            }

            $allowed[] = 'Supper_admin';
            $allowed[] = 'Admin';

            if (in_array($_SESSION['USER']->role, $allowed)) {
                # code...
                return true;
            }

            return false;
        }

        public static function i_own_contents($row)
        {
            if (is_array($row)) {
                # code...
                $row = $row[0];
            }

            if (!isset($_SESSION['USER'])) {
                // Return
                return false;
            }

            if (isset($row->user_url)) {
                # code...
                if ($_SESSION['USER']->user_url == $row->user_url) {
                    # code...
                    return true;
                }
            }

            $allowed[] = 'Supper_admin';
            $allowed[] = 'Admin';

            if (in_array($_SESSION['USER']->role, $allowed)) {
                # code...
                return true;
            }

            return false;
        }

        public static function products($row)
        {
            if (is_array($row)) {
                # code...
                $row = $row[0];
            }

            if (!isset($_SESSION['USER'])) {
                // Return
                return false;
            }

            if (isset($row->product_id)) {
                # code...
                if ($_SESSION['USER']->product_id == $row->product_id) {
                    # code...
                    return true;
                }
            }

            $allowed[] = 'Supper_admin';
            $allowed[] = 'Admin';

            if (in_array($_SESSION['USER']->role, $allowed)) {
                # code...
                return true;
            }

            return false;
        }

        public static function order($row, $id)
        {
            if($row->status == 'Pending'){
 
                $orders = '
                                <a class="dropdown-item d-flex align-items-center" href="'.ROOT.'/appointments/edit/'.$row->id.'">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">'.get_date($row->date).'</div>
                                        <span class="font-weight-bold">'.esc($row->email).'</span>
                                    </div>
                                </a>
                                <input type="hidden" name="id" value="'.$id.'">
                ';
            }
            else{
                $orders = '';
            }
            echo ' '.$orders.' ';
        }

        public static function appointments($row, $id)
        {
            if($row->status == 'Pending'){
 
                $appointments = '
                                <a class="dropdown-item d-flex align-items-center" href="'.ROOT.'/appointments/edit/'.$row->id.'">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">'.get_date($row->date).'</div>
                                        <span class="font-weight-bold">'.esc($row->services_).'</span>
                                    </div>
                                </a>
                                <input type="hidden" name="id" value="'.$id.'">
                ';
            }
            else{
                $appointments = '';
            }
            echo ' '.$appointments.' ';
        }

        public static function message($row, $id, $message)
        {
            if($row->message == $message){
 
                $messages = '
                                <a class="dropdown-item d-flex align-items-center" href="'.ROOT.'/appointments/edit/'.$row->id.'">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">'.esc($row->subject).'</div>
                                        <span class="font-weight-bold">'.esc($row->name).'</span>
                                    </div>
                                </a>
                                <input type="hidden" name="id" value="'.$id.'">
                ';
            }
            else{
                $messages = '';
            }
            echo ' '.$messages.' ';
        }

        // Services
        public static function service2($row, $id)
        {
            $service = $row->services ?? '';

            // Skip if unknown
            if (!in_array($service, ['Hair', 'Beauty'])) {
                return;
            }

            $img = get_image($row->image);
            $serviceEsc = esc($service);
            $serviceId = (int)$row->service_id;

            echo '
                <div class="service-promo-single-item">
                    <div class="image">
                        <a href="javascript:void(0);" onclick="openBranchModal(\'' . $serviceEsc . '\', ' . $serviceId . ')">
                            <img src="' . $img . '" alt="">
                        </a>
                    </div>
                    <div class="contact-social">
                        <h5 style="font-weight: lighter;">Follow Us</h5>
                        <ul>
                            <li><a href="' . ($service == 'Beauty' ? 'https://www.facebook.com/share/7aQqUELVVZvkGf2F/?mibextid=qi20mg' : 'https://www.facebook.com/share/3qYAG72RyXUf5yg5/?mibextid=qi20mg') . '"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="' . ($service == 'Beauty' ? 'https://www.instagram.com/afikam_luxury_spa?igsh=MWxjZTkyemozNW5ndA==' : 'https://www.instagram.com/afikam_hair_beauty?igsh=MTE3cWwya3AwOWtoMg==') . '"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div> 
                    <div class="content">
                        <a href="javascript:void(0);" onclick="openBranchModal(\'' . $serviceEsc . '\', ' . $serviceId . ')" class="btn btn-xs icon-space-left"
                            style="background: #FFB6C1; padding: 10px 25px; border-radius: 35px; min-width: 120px; letter-spacing: .1em; font-weight: 400; font-size: 50px; text-align: center;">
                            <span class="d-flex align-items-center text-white" style="font-size: 0.7rem;">
                                ' . $serviceEsc . '<i class="ion-ios-arrow-thin-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <input type="hidden" name="id" value="' . $id . '">
            ';
        }

        // Working days1
        public static function step($row, $name, $id)
        {
            if ($row->name == $name && $row->occupation == 'Hair') {
                $days = [
                    'monday'    => 'mo',
                    'tuesday'   => 'tu',
                    'wednesday' => 'we',
                    'thursday'  => 'th',
                    'friday'    => 'fr',
                    'saturday'  => 'st',
                    'sunday'    => 'sn',
                ];

                foreach ($days as $day => $code) {
                    $value = $row->$day ?? '';
                    $active = ($value === $code) ? 'active' : '';
                    $dayLabel = $active ? $value : 'off';
                    echo "<li class='{$active}'>{$dayLabel}</li>";
                }

                // Add hidden input once
                echo "<input type='hidden' name='id' value='".esc($id)."'>";
            }
        }

        // Working days2
        public static function step3($row, $name, $id)
        {
            if ($row->name == $name && $row->occupation == 'Beauty') {

                $days = [
                    'monday'    => 'mo',
                    'tuesday'   => 'tu',
                    'wednesday' => 'we',
                    'thursday'  => 'th',
                    'friday'    => 'fr',
                    'saturday'  => 'st',
                    'sunday'    => 'sn',
                ];

                foreach ($days as $day => $code) {
                    $value = $row->$day ?? '';
                    $active = ($value === $code) ? 'active' : '';
                    $dayLabel = $active ? $value : 'off';
                    echo "<li class='{$active}'>{$dayLabel}</li>";
                }

                // Output hidden input once
                echo "<input type='hidden' name='id' value='" . esc($id) . "'>";
            }
        }

        // Wig Colors
        public static function color($row, $id)
        {
            $colors = [
                'Natural Black'    => '#000000',
                'Chocolate Brown'  => '#411900',
                'Honey Blond'      => '#CFB695',
                'Grey'             => '#817f7f',
                'Red'              => '#FF0000',   // pure red (change if you want dark)
                'Dark Red'         => '#8B0000',   // NEW
                'Blond'            => '#FAF0BE',   // NEW
                'Highlight'        => '#6A5144',
                'Other'            => 'other',
            ];            

            $name = $row->color ?? '';

            if (!isset($colors[$name])) {
                return; // Unknown color → stop
            }

            $colorCode = $colors[$name];

            // Create color label
            if ($name === 'Other') {
                // "Other" = no fixed color → show multicolor text
                $label = "<span style='padding: 12px 18px; background: linear-gradient(90deg, #000000, #411900, #CFB695, #817f7f); 
                        color:#fff; border-radius:6px;'>Multicolor</span>";
            } else {
                // Normal single-color square
                $label = "<span style='background: {$colorCode}; padding: 12px 18px; border-radius:6px; display:inline-block;'></span>";
            }

            echo '
                <div class="col-xl-5 col-sm-4">
                    <label class="text-dark fw-bold" style="font-size: 1rem;">Colour: ' . esc($name) . '</label>
                </div>

                <div class="col-xl-7 col-sm-6"><hr></div>

                <div class="col-xl-7 col-sm-6 pt-3 pb-3">
                    ' . $label . '
                </div>

                <input type="hidden" name="id" value="' . esc($id) . '">
            ';
        }
    }
    