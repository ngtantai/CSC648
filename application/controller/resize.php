<?php
/**
 * Created by PhpStorm.
 * User: guoyiruan
 * Date: 7/22/16
 * Time: 11:33 PM
 */

// Imaging
class imaging
{

    // Variables
    private $img_input;
    private $img_output;
    private $img_src;
    public $format;
    private $quality = 80;
    private $x_input;
    private $y_input;
    private $x_output;
    private $y_output;
    private $resize;

    public function set_img($img)
    {

        $ext = strtoupper(pathinfo($img, PATHINFO_EXTENSION));

        if(is_file($img) && ($ext == "JPG" OR $ext == "JPEG"))
        {

            $this->format = $ext;
            $this->img_input = ImageCreateFromJPEG($img);
            $this->img_src = $img;


        }

        elseif(is_file($img) && $ext == "PNG")
        {

            $this->format = $ext;
            $this->img_input = ImageCreateFromPNG($img);
            $this->img_src = $img;

        }

        elseif(is_file($img) && $ext == "GIF")
        {

            $this->format = $ext;
            $this->img_input = ImageCreateFromGIF($img);
            $this->img_src = $img;

        }

        $this->x_input = imagesx($this->img_input);
        $this->y_input = imagesy($this->img_input);

    }

    public function set_size($size = 100)
    {
        if($this->x_input > $size && $this->y_input > $size)
        {
            if($this->x_input >= $this->y_input)
            {

                $this->x_output = $size;
                $this->y_output = ($this->x_output / $this->x_input) * $this->y_input;

            }
            else
            {

                $this->y_output = $size;
                $this->x_output = ($this->y_output / $this->y_input) * $this->x_input;

            }
            $this->resize = TRUE;

        }
        else { $this->resize = FALSE; }

    }
    public function set_quality($quality)
    {

        if(is_int($quality))
        {
            $this->quality = $quality;
        }
    }

    public function save_img($path)
    {

        if($this->resize)
        {
            $this->img_output = ImageCreateTrueColor($this->x_output, $this->y_output);
            ImageCopyResampled($this->img_output, $this->img_input, 0, 0, 0, 0, $this->x_output, $this->y_output, $this->x_input, $this->y_input);

        }

        if($this->format == "JPG" OR $this->format == "JPEG")
        {
            if($this->resize) { imageJPEG($this->img_output, $path, $this->quality); }
            else { copy($this->img_src, $path); }

        }
        elseif($this->format == "PNG")
        {
            if($this->resize) { imagePNG($this->img_output, $path); }
            else { copy($this->img_src, $path); }

        }

        elseif($this->format == "GIF")
        {
            if($this->resize) { imageGIF($this->img_output, $path); }
            else { copy($this->img_src, $path); }
        }
    }

    public function get_width()
    {
        return $this->x_input;
    }

    public function get_height()
    {
        return $this->y_input;
    }

    public function clear_cache()
    {
        @ImageDestroy($this->img_input);
        @ImageDestroy($this->img_output);
    }
}
?>