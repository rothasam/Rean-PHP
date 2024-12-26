<?php

class Teacher
{
    public $id, $name, $gender, $email, $salary, $photo;
    public $file = null;
    public const FILE_DATA = '../../storage/data/teacher.json';
    public const DIR_PHOTO = '../../storage/photo/';

    public function store()
    {
        $arrKru = [];
        $fileName = null;
        $this->id=1;
        
        if(file_exists(self::FILE_DATA)){
            $arrKru = json_decode(file_get_contents(self::FILE_DATA),true);
            $this->id = max(array_column($arrKru,'id')) + 1;
        }

        if($this->file != null){
            $path = pathinfo($this->file['name']);
            $fileName = uniqid() . '.' . $path['extension'];
            copy($this->file['tmp_name'],self::DIR_PHOTO . $fileName);
        }
        $this->photo = $fileName;

        $newKru = [
            'id' => $this->id,
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'salary' => $this->salary,
            'photo' => $this->photo
        ];

        array_push($arrKru, $newKru);

        file_put_contents(self::FILE_DATA, json_encode($arrKru));

        return json_encode([
            'result' => true,
            'message' => 'Data saved successfully',
            'data' => $newKru
        ]);
    }


    public function index()
    {
        $arrKru = [];
        if(file_exists(self::FILE_DATA)){
            $arrKru = json_decode(file_get_contents(self::FILE_DATA),true);
        }

        return json_encode([
            'result' => true,
            'message' => 'Get all teacher successfully',
            'data' => $arrKru
        ]);
    }


    public function destroy()
    {
        if(!file_exists(self::FILE_DATA)){
            return json_encode([
                'result' => false,
                'message' => 'File data not found.'
            ]);
            exit();
        }

        $arrKru = json_decode(file_get_contents(self::FILE_DATA),true);

        foreach($arrKru as $index => $item){
            if($item['id'] == $this->id){
                if($item['photo'] && file_exists(self::DIR_PHOTO . $item['photo'])){
                    unlink(self::DIR_PHOTO . $item['photo']);
                }
                array_splice($arrKru,$index,1);
                break;
            }
        }

        if(count($arrKru) == 0){
            unlink(self::FILE_DATA);
        } else{
            file_put_contents(self::FILE_DATA, json_encode($arrKru));
        }

        return json_encode([
            'result' => true,
            'message' => 'Data deleted successfully'
        ]);
    }


    public function update()
    {
        if(!file_exists(self::FILE_DATA)){
            return json_encode([
                'result' => false,
                'message' => 'File data not found.'
            ]);
            exit();
        }
        
        $arrKru = json_decode(file_get_contents(self::FILE_DATA),true);
        $fileName = null;

        if($this->file != null){
            $path = pathinfo($this->file['name']);
            $fileName = uniqid(). '.'. $path['extension'];
            copy($this->file['tmp_name'],self::DIR_PHOTO. $fileName);
            $this->photo = $fileName;
        }

        foreach($arrKru as $index => $item){
            if($item['id'] == $this->id){
                $arrKru[$index]['name'] = $this->name;
                $arrKru[$index]['gender'] = $this->gender;
                $arrKru[$index]['email'] = $this->email;
                $arrKru[$index]['salary'] = $this->salary;
                if($this->file){
                    if($item['photo'] && file_exists(self::DIR_PHOTO. $item['photo'])){
                        unlink(self::DIR_PHOTO. $item['photo']);
                    }
                    $arrKru[$index]['photo'] = $fileName;
                }else{
                    $arrKru[$index]['photo'] = $item['photo'];
                }
                $edited = $arrKru[$index];
                break;
            }
        }
        file_put_contents(self::FILE_DATA,json_encode($arrKru));

        return json_encode([
            'result' => true,
            'message' => 'Data updated successfully',
            'data' => $edited
        ]);
    }

}