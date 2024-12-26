<?php

class Student
{
    public $id, $name, $gender, $phone , $photo;
    public $file = null;
    public const FILE_DATA = '../../storage/data/student.json';
    public const DIR_PHOTO = '../../storage/photo/students/';
    public function store()
    {

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


    public function index()
    {
        $arr = [];
        if(file_exists(self::FILE_DATA)){
            $arr = json_decode(file_get_contents(self::FILE_DATA),true);
        }

        return json_encode([
            'result' => true,
            'message' => 'Get all student successfully',
            'data' => $arr
        ]);
    }


    public function destroy()
    {
        if(!file_exists(self::FILE_DATA)){
            return json_encode([
                'result' => false,
                'message' => 'File data not found.'
            ]);
        }
        
        $arr = json_decode(file_get_contents(self::FILE_DATA),true);
        
        foreach($arr as $index => $item){
            if($item['id'] == $this->id){
                if($item['photo'] && file_exists(self::DIR_PHOTO . $item['photo'])){
                    unlink(self::DIR_PHOTO . $item['photo']);
                }
                array_splice($arr,$index,1);
                break;
            }
        }

        if(count($arr) == 0){
            unlink(self::FILE_DATA);
        }else{
            file_put_contents(self::FILE_DATA, json_encode($arr));
        }

        return json_encode([
            'result' => true,
            'message' => 'Data delete successfully'
        ]);
    }


    public function update(){
        if(!file_exists(self::FILE_DATA)){
            return json_encode([
                'result' => false,
                'message' => 'File data not found.'
            ]);
        }

        $arr = json_decode(file_get_contents(self::FILE_DATA),true);
        $fileName = null;
        if($this->file){
            $path = pathinfo($this->file['name']);
            $fileName = uniqid(). '.'. $path['extension'];
            copy($this->file['tmp_name'],self::DIR_PHOTO. $fileName);
            $this->photo = $fileName;
        }

        foreach($arr as $index => $item){
            
            if($item['id'] == $this->id){
                $arr[$index]['name'] = $this->name;
                $arr[$index]['gender'] = $this->gender;
                $arr[$index]['phone'] = $this->phone;
                // why at this line we dont use item['name'] instead of $arr[$index]['name'] ?
                // because $item is a reference to the array item, so if we change $item[' 
                // name'] it will change the original array item, but if we change $arr[$index
                // ]['name'] it will change the array item at the index $index in the array

                // still dont understand ?
                // it seems that we are not changing the original array but creating a new array with the changes
                // so when we want to get the data we read from the file, we still get the original data, not the updated one.
                // but when we want to save the updated data back to the file, we do that.

                if($this->file){
                    if($item['photo'] && file_exists(self::DIR_PHOTO . $item['photo'])){
                        unlink(self::DIR_PHOTO. $fileName);
                    }
                    $arr[$index]['photo'] = $fileName;
                }else{
                    $arr[$index]['photo'] = $item['photo'];
                }
                $stu = $arr[$index];
                break;

            }
        }
        file_put_contents(self::FILE_DATA,json_encode($arr));

        return json_encode([
            'result' => true,
            'message' => 'Data update successfully',
            'data' => $stu
        ]);
    }
}