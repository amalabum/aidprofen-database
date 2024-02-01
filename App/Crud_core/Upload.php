<?php

 class  Upload {

    private  $out_put=null;
    private  $file=null;
    public function __construct($postedFile,$out_put=null)
    {
        $this->index=$postedFile;
        $this->out_put=$out_put;
    }

    public  function Compreser_mono($size)
    {
        if ( !empty($this->index) AND ! $this->index['error']){
            $post_photo=$this->index['name'];
            $post_photo_tmp=$this->index['tmp_name'];
            $nom=rand()."fk".basename($this->index['name']);

            $verif_image_ext=getimagesize($post_photo_tmp);
            $ext=pathinfo($post_photo,PATHINFO_EXTENSION);
         
            if ($verif_image_ext && $verif_image_ext[2]<4) {

                if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG') {
                    $src = imagecreatefromjpeg($post_photo_tmp);
                }

                if ($ext == 'png' || $ext == 'PNG') {
                    $src = imagecreatefrompng($post_photo_tmp);
                }
                if ($ext == 'gif' || $ext == 'GIF') {
                    $src = imagecreatefromgif($post_photo_tmp);
                }
                list($width_min, $height_min) = getimagesize($post_photo_tmp);
                $newwidth_min = $size;
                $newheight_min = ($height_min / $width_min) * $newwidth_min;
                $tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min);

                imagecopyresampled($tmp_min, $src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);
                if (file_exists($this->out_put == null ? $this->out_put . '/' : $this->out_put)) {
                    if (imagejpeg($tmp_min, $this->out_put . $nom, 200)) {                        
                       
                        return $nom;
                    
                    } else {
                        return false;
                    }
                }else{
                    return  false;
                }
            }

        }else {
            return false;
        }

        return false;
    }
    
}
?>