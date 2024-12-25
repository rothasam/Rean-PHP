<?php

class Student
{
    public $id = 1;
    public $name = 'Rotha';
    public $gender = 'Female';
    public $phone = '1234567';
    public $dob = '2003-10-29';


    public function store()
    {
        $arr = [];
        $this->id=1;

        if(file_exists('student.json')){
            $arr = json_decode(file_get_contents('student.json'),true);
            $this->id = max(array_column($arr,'id')) + 1;
        }

        $temp = [
            'id' => $this->id,
            'name' => $this->name,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'dob' => $this->dob
        ];
        array_push($arr,$temp);

        file_put_contents('student.json',json_encode($arr));

        return json_encode([
            'result' => true,
            'message' => 'Data saved successfully',
            'data' => $temp
        ]);

    }
}

header('Content-Type: application/json');

// $stu = new Student(); 
// $stu->store();

$stu1 = new Student();
// $stu1->name = 'haha';
// $stu1->store();

$stu1->name = $_POST['name'];
$stu1->gender = $_POST['gender'];
$stu1->phone = $_POST['phone'];
$stu1->dob = $_POST['dob'];

echo $stu1->store();




