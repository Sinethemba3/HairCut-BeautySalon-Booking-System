<?php

class Image
{
    public function crop($src_image_path, $dest_image_path, $max_size = 600)
    {
        if (!file_exists($src_image_path)) {
            throw new Exception("Source image not found: " . $src_image_path);
        }

        $ext = strtolower(pathinfo($src_image_path, PATHINFO_EXTENSION));

        // Create source image resource
        switch ($ext) {
            case 'jpeg':
            case 'jpg':
                $src_image = imagecreatefromjpeg($src_image_path);
                break;
            case 'png':
                $src_image = imagecreatefrompng($src_image_path);
                break;
            case 'gif':
                $src_image = imagecreatefromgif($src_image_path);
                break;
            default:
                throw new Exception("Unsupported image type: " . $ext);
        }

        if (!$src_image) {
            throw new Exception("Failed to create image resource from source.");
        }

        $width  = imagesx($src_image);
        $height = imagesy($src_image);

        // Determine square crop area
        if ($width > $height) {
            $src_x = ($width - $height) / 2;
            $src_y = 0;
            $src_w = $src_h = $height;
        } else {
            $src_x = 0;
            $src_y = ($height - $width) / 2;
            $src_w = $src_h = $width;
        }

        // Create destination image
        $dst_image = imagecreatetruecolor($max_size, $max_size);

        // Preserve transparency for PNG/GIF
        if ($ext === 'png' || $ext === 'gif') {
            imagecolortransparent($dst_image, imagecolorallocatealpha($dst_image, 0, 0, 0, 127));
            imagealphablending($dst_image, false);
            imagesavealpha($dst_image, true);
        }

        imagecopyresampled(
            $dst_image,
            $src_image,
            0,
            0,
            (int)$src_x,
            (int)$src_y,
            $max_size,
            $max_size,
            (int)$src_w,
            (int)$src_h
        );

        // Ensure destination directory exists
        $dir = dirname($dest_image_path);
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        // Save based on format
        switch ($ext) {
            case 'jpeg':
            case 'jpg':
                imagejpeg($dst_image, $dest_image_path, 90);
                break;
            case 'png':
                imagepng($dst_image, $dest_image_path);
                break;
            case 'gif':
                imagegif($dst_image, $dest_image_path);
                break;
        }

        imagedestroy($src_image);
        imagedestroy($dst_image);

        return true;
    }

    public function profile_thumbnail($image_path)
    {
        $crop_size = 600;
        $ext = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));

        $thumbnail = str_replace('.' . $ext, '_thumbnail.' . $ext, $image_path);

        // Try to create the thumbnail if it doesn’t exist
        if (!file_exists($thumbnail)) {
            $success = $this->crop($image_path, $thumbnail, $crop_size);
            if (!$success || !file_exists($thumbnail)) {
                return false; // ❌ Thumbnail creation failed
            }
        }

        return $thumbnail;
    }
}
