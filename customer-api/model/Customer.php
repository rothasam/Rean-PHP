<?php

class Customer
{
    public $id, $firstName, $lastName, $gender, $branch, $email,$photo;
    public $filePhoto = null;
    public const FILE_DATA = '../../storage/data/customer.json';
    public const DIR_PHOTO = '../../storage/photo/customers/';

    public function store()
    {
        $arrCustomer = [];
        $this->id = 1;
        
        if(file_exists(self::FILE_DATA)){ // check if file exists
            $arrCustomer = json_decode(file_get_contents(self::FILE_DATA),true);
            $this->id = max(array_column($arrCustomer,'id')) + 1;
        }
        
        $fileName = null;
        if($this->filePhoto){ // check if file exists
            $path = pathinfo($this->filePhoto['name']);
            $fileName = uniqid(). '.'. (strlen($path['extension']) > 0 ? $path['extension'] : 'jpg');
            copy($this->filePhoto['tmp_name'], self::DIR_PHOTO . $fileName);//  save into folder storage
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


    public function index()
    {
        $arrCustomer = [];
        if(file_exists(self::FILE_DATA)){
            $arrCustomer = json_decode(file_get_contents(self::FILE_DATA),true);
            return json_encode([
                'result' => true,
                'message' => 'Get all customer successfully',
                'data' => $arrCustomer
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
            $arrCustomer = json_decode(file_get_contents(self::FILE_DATA),true);

            foreach($arrCustomer as $index => $customer)
            {
                if($customer['id'] == $this->id)
                {
                    if($customer['photo'] && file_exists(self::DIR_PHOTO . $customer['photo'])) // check if file name exists in both object and in folder photo
                    {
                        unlink(self::DIR_PHOTO. $customer['photo']);
                    }
                    array_splice($arrCustomer,$index,1);
                    $found = 1;
                    break;
                }
            }
            if($found == 0)
            {
                return json_encode([
                    'result' => false,
                    'message' => 'Customer id = ' . $this->id . ' is not found!!'
                ]);
                exit(); 
            }

            if(count($arrCustomer) == 0){
                unlink(self::FILE_DATA);
            }else{
                file_put_contents(self::FILE_DATA,json_encode($arrCustomer));
            }

            return json_encode([
                'result' => true,
                'message' => 'Customer deleted successfully'
            ]);
        } 

    }



    public function update()
    {
        if(!file_exists(self::FILE_DATA))
        {
            return json_encode([
                'result' => false,
                'message' => 'File data not found!!'
            ]);
            exit();
        }
        else{
            $found = 0;
            $arrCustomer = json_decode(file_get_contents(self::FILE_DATA),true);
            $fileName = null;

            if($this->filePhoto){
                $path = pathinfo($this->filePhoto['name']);
                $fileName = uniqid(). '.'. (strlen($path['extension']) > 0? $path['extension'] : 'jpg');
                copy($this->filePhoto['tmp_name'], self::DIR_PHOTO . $fileName);
                $this->photo = $fileName;
            }



            foreach($arrCustomer as $index => $customer)
            {
                if($customer['id'] == $this->id)
                {
                    $arrCustomer[$index]['firstName'] = $this->firstName;
                    $arrCustomer[$index]['lastName'] = $this->lastName;
                    $arrCustomer[$index]['gender'] = $this->gender;
                    $arrCustomer[$index]['branch'] = $this->branch;
                    $arrCustomer[$index]['email'] = $this->email;
                    if($this->filePhoto){
                        if($customer['photo'] && file_exists(self::DIR_PHOTO . $customer['photo'])){
                            unlink(self::DIR_PHOTO. $customer['photo']);
                        }
                        $arrCustomer[$index]['photo'] = $fileName; // dak rub tmey

                    }else{
                        $arrCustomer[$index]['photo'] = $customer['photo'] ?? null; // Keep old photo if no new one is uploaded
                    }

                    
                    $updated = $arrCustomer[$index];
                    $found = 1;
                    break;
                }
            }

            if($found == 0)
            {
                return json_encode([
                    'result' => false,
                   'message' => 'Customer id = '. $this->id.'is not found!!'
                ]);
                exit();
            }

            file_put_contents(self::FILE_DATA, json_encode($arrCustomer));

            return json_encode([
                'result' => true,
                'message' => 'Data updated successfully',
                'data' => $updated
            ]);
        }
    }
    
    public function getStatistics(){
        $arrCustomer = [];
        if(file_exists(self::FILE_DATA)){
            $arrCustomer = json_decode(file_get_contents(self::FILE_DATA),true);

            // initialize count
            $statistics = [
                'branches' => [
                    'Kandal' => 0,
                    'Phnom Penh' => 0,
                    'Prey Veng' => 0
                ],
                'gender' => [
                    'Male' => 0,
                    'Female' => 0,
                    'total_customers' => count($arrCustomer),
                ]
            ];

            foreach ($arrCustomer as $customer) {
                if (isset($statistics['branches'][$customer['branch']])) {
                    $statistics['branches'][$customer['branch']]++;
                }

                if (isset($statistics['gender'][$customer['gender']])) {
                    $statistics['gender'][$customer['gender']]++;  // [$customer['gender']] can be Male or Female => $statistics['gender']['Male']++ or $statistics['gender']['Female']++
                }
            }
            return json_encode([
                'result' => true,
                'message' => 'Get statistics successfully',
                'data' => $statistics
            ]);
            
        }else{
            return json_encode([
                'result' => false,
                'message' => 'Get data failed!! File does not exist.'
            ]);
        }
    }


}