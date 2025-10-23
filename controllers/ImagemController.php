<?php

class ImagemController{
    static $maxSize= 1024 * 1024 * 5; // para pictures de apenas 5mb - MegaBite
    static $typefiles = [
        "image/png"=> "png",
        "image/jpg"=> "jpg",
    ];
    static $path = __DIR__ . "/../uploads/";

    public static function normalizeFotos($pictures){
        $files = [];
        if(is_array($pictures[''])){
            foreach($pictures['name'] as $index => $name){
                $files[] = [
                    "name" => $pictures['name'][$index],
                    "type" => $pictures['type'][$index],
                    "tmp_name" => $pictures['tmp_name'][$index],
                    "error" => $pictures['error'][$index],
                    "size" => $pictures['size'][$index]
                ];
            }
        }else{
            $files[] = $pictures;
        }
        return $files;
    }

    public static function nomeAleatorio($extension){
            $name = bin2hex(random_bytes(16));
            return $name . "." . $extension;
    }
    public static function upload($pictures){
        $files = [];
        $erros = [];
        $saves = [];

        if ($pictures) {
            $files = self::normalizeFotos($pictures);
        }

        foreach($files as $index => $photo){
            $err =$photo['error'] ?? UPLOAD_ERR_NO_FILE;

            if($err === UPLOAD_ERR_NO_FILE) continue;

            if($err !== UPLOAD_ERR_OK){
                $erros[]= "Erro no upload(foto:{$index})";
                continue;
            }
    
        if(($photo['size'] ?? 0) > $self::$maxSize){
            $erros[] = "Excedeu o limite de (self::{$maxSize}) de 5 MB";
            continue;
        }

        $info = new \finfo(FILEINFO_MIME_TYPE);
        $mime = $info->file($photo['tmp_name']) ?: ($photo['type'] ?? "application/octet-stream");

        if(!isset(self::$typefiles[$mime]) ){
            $erros[] = "Tipo do arquivo não é permitido";
            continue;
        }

        $photoName = self::nomeAleatorio(self::$typefiles[$mime]);
        $destPath = self::$path . $photoName;
        if(!move_uploaded_file($photo['tmp_name'], $destPath) ){
            $erros[] = "Falha ao mover o arquivo";
            continue;
        }
        $saves[] = [
            "name" => $photoName,
            "path" => "uploads/" . $photoName,
            "type" => self::$typefiles[$mime]
        ];
    }

        return [
            "files" => $files,
            "erros" => $erros,
            "saves"=> $saves
        ];
    }
}
?>