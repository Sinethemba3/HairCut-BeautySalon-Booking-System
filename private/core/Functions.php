<?php
    function get_var($key, $default = "", $method = "POST")
    {
        $data = $_POST;

        if ($method == "GET") {
            # code...
            $data = $_GET;
        }

        if (isset($data[$key])) {
            # code...
            return $data[$key];
        }

        return $default;
    }

    function get_select($key, $value)
    {
        if (isset($_POST[$key])) {
            if ($_POST[$key] == $value) {
                return "selected";
            }
        }

        return "";
    }

    function random_string($length)
    {
        $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $text = "";

        for ($x=0; $x < $length; $x++) { 
            $random = rand(0,61);
            $text .= $array[$random];
        }
        return $text;
    }

    function random_str($length)
    {
        $array = array(0,1,2,3,4,5,6,7,8,9);
        $text = "";

        for ($x=0; $x < $length; $x++) { 
            $random = rand(0,6);
            $text .= $array[$random];
        }
        return $text;
    }

    /** displays input values after a page refresh **/
    function old_checked(string $key, string $value, string $default = ""):string
    {
        if(isset($_POST[$key]))
        {
            if($_POST[$key] == $value) {
            return ' checked ';
            }
        }
        else {

            if($_SERVER['REQUEST_METHOD'] == "GET" && $default == $value)
            {
            return ' checked ';
            }
        }

        return '';
    }

    function esc($var)
    {
        // Check if the variable is null and convert it to an empty string or handle it as needed
        return htmlspecialchars($var === null ? '' : $var, ENT_QUOTES, 'UTF-8');
    }

    function get_date($date)
    {
        return date("jS M, Y",strtotime($date));
    }

    function get_dates($date)
    {
        return date("jS M, Y H:i", strtotime($date)); // H:i gives time in 24-hour format
    }

    function get_time($time)
    {
        return date("H:i:s", strtotime($time)); // H:i gives time in 24-hour format
    }

    function show($data) {
        echo "<pre>";
            print_r($data);
        echo "</pre>";
        die; // ❌ execution stops here
    }

    function get_image($image, $gender = "Male")
    {
        if (!file_exists($image)) {
            $image = ROOT . "/images/female.png";
            if ($gender == "Male") {
                $image = ROOT . "/images/male.png";
            }
        } else {
            $class = new Image();
            $thumbnail = $class->profile_thumbnail($image);
            $image = ROOT . "/" . ltrim($thumbnail, '/');
        }

        return $image;
    }

    function fetch_chat_file($file)
    {
        // Only return the path if file exists and is not empty
        if (!empty($file) && is_string($file) && file_exists($file)) {
            return ROOT . '/' . $file;
        }

        // Return false or null if no file exists (so nothing will be shown)
        return false;
    }
    
    function fetch_image($image, $gender = 'Male')
    {
        // Check if the provided image is empty, not a string, or doesn't exist
        if (empty($image) || !is_string($image) || !file_exists($image)) {
            
            // Default to the female placeholder image if no valid image is provided
            $image = ROOT . '/images/female.png';

            // If the gender is 'Male', use the male placeholder image instead
            if ($gender === 'Male') {
                $image = ROOT . '/images/male.png';
            }
        } 
        else { 
            // If the image exists, use the Image class to process it
            try {
                // Generate image and set the image path
                return ROOT . '/' . $image;
            } 
            catch (Exception $e) {
                // Handle any errors (e.g., Image class issues)
                $image = ROOT . '/images/default.avif'; // Fallback to default
            }
        }

        // Return the final image path (either the placeholder or the processed image)
        return $image;
    }

    function fetch_images($imagePath, $defaultImage = 'default.avif'): string
    {
        // Ensure the image path is not empty and the file exists
        if (!empty($imagePath) && file_exists($imagePath)) {
            // If the image exists, return its full path
            return ROOT . '/' . $imagePath;
        }
        // If the image doesn't exist, return the default image path
        return ROOT . '/images/' . $defaultImage;
    }

    function message(?string $msg = null, bool $clear = false)
    {
        $ses = new Session();

        // Store message
        if (!empty($msg)) {
            $ses->set('message', $msg);
            return true;
        }

        // Retrieve message
        $stored = $ses->get('message');

        if (!empty($stored)) {
            if ($clear) {
                $ses->pop('message');
            }
            return $stored;
        }

        return false;
    }

    function checked($needle, $haystack)
	{
		if ($haystack) {
			return in_array($needle, $haystack) ? 'checked' : '';
		}

		return '';
	}

    function views_path($view)
    {
        if (file_exists("../private/views/" . $view . ".inc.php")) {
            return ("../private/views/" . $view . ".inc.php");
        }
        else{
            return ("../private/views/_404.view.php");
        }
    }

    function upload_image($fileKey)
    {
        if (!isset($_FILES[$fileKey]) || $_FILES[$fileKey]['error'] !== 0) {
            return false;
        }

        $file = $_FILES[$fileKey];

        $allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/gif',
            'image/webp',
            'image/bmp',
            'image/tiff',
            'image/svg+xml',
        ];

        if (!in_array($file['type'], $allowedTypes)) {
            return false;
        }

        $folder = "uploads/";
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        // Sanitize and rename file
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $safeName = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($file['name'], PATHINFO_FILENAME));
        $filename = time() . '_' . $safeName . '.' . $ext;

        $destination = $folder . $filename;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return $destination;
        }

        return false;
    }

    function add_get_var(){
        $text = '';
        if (!empty($_GET)) {
            # code...
            foreach ($_GET as $key => $value) {
                # code...
                if ($key != 'url') {
                    # code...
                    $text .= '<input type="hidden" name="'.$key.'" value="'.$value.'" />';
                } 
            }
        }

        return $text;
    }
    
    function getCartQty()
    {
        # If there is nothing in the cart, return 0
        if(empty($_SESSION['CART']))
        return 0;
    
        # Store array
        $qty = [];
        
        # Loop items in cart
        foreach($_SESSION["CART"] as $item){
            # Store the quantity of each item
            $qty[] =  $item['qty'];
        }
        # Return the sum
        return array_sum($qty);
    }

    function generateSKU(string $productID, string $category, string $description): string
    {
        // Ensure category and product type are not empty
        if (empty($category) || empty($description)) {
            throw new InvalidArgumentException("Category and Description must be provided.");
        }

        // Extract the first 3 letters of the category
        $categoryCode = strtoupper(substr($category, 0, 3));

        // Extract the first 3 letters of the product type
        $descriptionCode = strtoupper(substr($description, 0, 4));

        // Generate a short hash from productID for uniqueness
        $shortID = substr(hash('sha256', $productID), 0, 8);

        // Create SKU by concatenating the first 3 letters of category, product type, and short hash
        return $categoryCode . '-' . strtoupper($descriptionCode . '-' . $shortID);
    }

    function PayFast($data) {
        header('HTTP/1.0 200 OK');
        // header("Location: https://payment.payfast.io/eng/process");
    }

    function PayJustNow($data) {
        header('HTTP/1.0 200 OK');
        // header("Location: https://checkout.payjustnow.io/v2");
    }

    function PayFastBookings($data) {
        header('HTTP/1.0 200 OK');
        // header("Location: https://payf.st/jx54v/");
    }

    function PayFastLayByes($data) {
        header('HTTP/1.0 200 OK');
        // header("Location: https://payf.st/jx54v/");
    }