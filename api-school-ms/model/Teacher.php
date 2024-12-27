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
            return json_encode([
                'result' => true,
                'message' => 'Get all teacher successfully',
                'data' => $arrKru
            ]);
        }else{
            return json_encode([
                'result' => false,
                'message' => 'Get data failed!! File does not exist.'
            ]);
        }

    }


    public function destroy()
    {
        if(!file_exists(self::FILE_DATA)){
            return json_encode([
                'result' => false,
                'message' => 'File data not found!!'
            ]);
            exit();
        }else{
            $found = 0;  
            $arrKru = json_decode(file_get_contents(self::FILE_DATA),true);

            foreach($arrKru as $index => $item){
                if($item['id'] == $this->id){
                    if($item['photo'] && file_exists(self::DIR_PHOTO . $item['photo'])){
                        unlink(self::DIR_PHOTO . $item['photo']);
                    }
                    array_splice($arrKru,$index,1);
                    $found = 1;
                    break;
                }
            }
            if($found == 0){
                return json_encode([
                    'result' => false,
                    'message' => 'id = ' . $this->id . ' is not found!!'
                ]);
                exit();
            }

            if(count($arrKru) == 0){  // after delete the last data in file => empty => delete the file
                unlink(self::FILE_DATA);
            } else{
                file_put_contents(self::FILE_DATA, json_encode($arrKru));
            }

            return json_encode([
                'result' => true,
                'message' => 'Data deleted successfully'
            ]);
        }

    }


    public function update()
    {
        if(!file_exists(self::FILE_DATA)){
            return json_encode([
                'result' => false,
                'message' => 'File data not found.'
            ]);
            exit();
        }else{
            $edited = '';
            $found = 0;
            $fileName = null;

            $arrKru = json_decode(file_get_contents(self::FILE_DATA),true);

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
                        $arrKru[$index]['photo'] = $fileName;  // set new photo 
                    }else{
                        $arrKru[$index]['photo'] = $item['photo'];
                    }
                    $edited = $arrKru[$index];
                    $found = 1;
                    break;
                }
            }
            if($found == 0){
                return json_encode([
                    'result' => false,
                    'message' => 'Update failed!!! ID: ' . $this->id . ' not found.'
                ]);
                exit();
            }
            
            file_put_contents(self::FILE_DATA,json_encode($arrKru));

            return json_encode([
                'result' => true,
                'message' => 'Data updated successfully',
                'data' => $edited
            ]);
        }
    
    }

}