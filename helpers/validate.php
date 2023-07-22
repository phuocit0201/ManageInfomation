<?php
class Validate
{
    public function validateLogin($username, $password)
    {
        if ($this->checkSpecialCharacters($username) || $this->checkSpecialCharacters($password)) {
            return false;
        }

        return true;
    }

    public function checkSpecialCharacters($data)
    {
        $specialCharacters = ["'", ";", "(", ")", "`", '"']; // Mảng chứa các ký tự đặc biệt cần kiểm tra

        foreach ($specialCharacters as $character) {
            if (strpos($data, $character) !== false) {
                return true; // Trả về true nếu dữ liệu chứa ký tự đặc biệt
            }
        }

        return false; // Trả về false nếu dữ liệu không chứa ký tự đặc biệt
    }
}
