<?php

class Student
{
    public $id, $name, $gender, $phone , $photo;
    public $file = null;
    public const FILE_DATA = '../../storage/data/student.json';
    public const DIR_PHOTO = '../../storage/photo/students/';
    public function store()
    {
        // $file = $_FILE['photo'];
        // $file['name'];
        // $file['tmp_name'];


        $arr = [];
        $this->id = 1;
        if(file_exists(self::FILE_DATA)){
            $arr = json_decode(file_get_contents(self::FILE_DATA),true);
            $this->id = max(array_column($arr,'id')) + 1;
        }

        $fileName = null;
        if($this->file){
            $path = pathinfo($this->file['name']);
            $fileName = uniqid() . '.' . $path['extension'];
            copy($this->file['tmp_name'],self::DIR_PHOTO . $fileName);
        }
        $this->photo = $fileName;

        $stu = [
            'id' => $this->id,
            'name' => $this->name,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'photo' => $this->photo
        ];

        array_push($arr,$stu);

        file_put_contents(self::FILE_DATA, json_encode($arr));
        
        return json_encode([
            'result' => true,
            'message' => 'Add new student successfully',
            // 'data' => $arr // return all data
            'data' => $stu

        ]);
    }
}