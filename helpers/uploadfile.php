<?php
function UpLoadFile($url, $file = [], $accept_file_file = [])
{
    //tạo đường dẫn khi upload lên sever
    $nameFile = time() . '_' . basename($file["name"]);
    $target_file = $url . $nameFile;
    //kiểm tra dung lượng của file
    $error = [];
    //Kiểm tra loại file
    if (count($accept_file_file) > 0) {
        $file_type = pathinfo($file["name"], PATHINFO_EXTENSION);
        if (!in_array(strtolower($file_type), $accept_file_file)) {
            return [
                'status' => false,
                'messager' => "file " . $file["name"] . " không đúng định dạng"
            ];
        }
    }

    //upload lên sever
    if (empty($error)) {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return [
                'status' => true,
                'name' => $nameFile,
            ];;
        }
    }
}
