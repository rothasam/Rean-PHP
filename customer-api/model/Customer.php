<?php

class Customer
{
    public $id, $firstName, $lastName, $gender, $branch, $email,$photo;
    public $file = null;
    public const FILE_DATA = '../../storage/data/customer.json';
    public const DIR_PHOTO = '../../storage/photo/customers/';

    public function store()
    {
        $arrCustomer = [];
        $this->id = 1;

        if(file_exists(self::FILE_DATA)){
            $arr = json_decode(file_get_contents(self::FILE_DATA),true);
            $this->id = max(array_column($arr,'id')) + 1;
        }

        $fileName = null;
        if($this->file){
            $path = pathinfo($this->file['name']);
            $fileName = uniqid(). '.'. (strlen($path['extension']) > 0 ? $path['extension'] : 'jpg');
            copy($this->file['tmp_name'], self::DIR_PHOTO. $fileName);
        }

        $this->photo = $fileName;

        $newCustomer = [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'gender' => $this->gender,
            'branch' => $this->branch,
            'email' => $this->email,
            'photo' => $this->photo
        ];

        array_push($arrCustomer,$newCustomer);

        file_put_contents(self::FILE_DATA, json_encode($arrCustomer));

        return json_encode([
           'result' => true,
           'message' => 'Customer saved successfully',
            'data' => $newCustomer
        ]);

    }

    



}