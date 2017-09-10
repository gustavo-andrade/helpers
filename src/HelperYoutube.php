<?php
namespace GHSA;

/**
 *
 * Métodos de ajuda com URLs do YouTube
 *
 *
 * Gustavo H. S. Andrade
 *
 */
class HelperYoutube
{


    /**
     * Retorna apenas o ID do video do YouTube para exibição no player
     *
     * @param $video_url
     * @return array|mixed|null
     */
    public static function getYouTubeId($video_url){
        if($video_url != null){

            $link_array = explode("=", $video_url);
            $id_link = $link_array[1];
            $id_link = str_replace("&index", "", $id_link);
            $id_link = str_replace("&list", "", $id_link);

            $id_link = explode("&", $id_link);
            $id_link  = $id_link[0];

            return $id_link;

        }else{
            return null;
        }
    }

    /**
     * Retona o link do vídeo do youtube para ser usado em um embed
     *
     * @param $video_id
     * @return string
     */
    public static function getYouTubeEmbedLink($video_id){
        return "//www.youtube.com/embed/".$video_id;
    }

    /**
     * Retorna um código iFrame para embed de um vídeo do youtube
     *
     * @param $video_id
     * @param $width
     * @param $height
     * @return string
     */
    public static function getYouTubeEmbed($video_id, $width, $height){
        $link_video = self::getYouTubeEmbedLink($video_id);
        return "<iframe width='$width' height='$height' id='videoPlayer' src='$link_video' frameborder='0' allowfullscreen></iframe>";
    }


    /**
     * Retorna uma imagem do vídeo
     *
     * @param $video_id
     * @param int $img_number
     * @return string
     */
    public static function getYouTubeVideoImage($video_id, $img_number = 0){
        return "http://img.youtube.com/vi/$video_id/$img_number.jpg";
    }




}