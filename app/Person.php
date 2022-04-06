<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'cpf',
    ];

    public static function createPerson($full_name,
        $cpf,
        $nickname,
        $gender,
        $phone,
        $cep,
        $street,
        $neighborhood,
        $city,
        $description,
        $image)
    {
        $person = new Person;
        $person->full_name = $full_name;
        $person->cpf = $cpf;
        $person->nickname = $nickname;
        $person->gender = $gender;
        $person->phone = $phone;
        $person->cep = $cep;
        $person->street = $street;
        $person->neighborhood = $neighborhood;
        $person->city = $city;
        $person->description = $description;
        $person->image = $image;

        if($person->save()){
            return $person;
        }

        return false;
    }

    public static function updatePerson(
        $id,
        $full_name,
        $cpf,
        $nickname,
        $gender,
        $phone,
        $cep,
        $street,
        $neighborhood,
        $city,
        $description,
        $image)
    {
        $person = Person::find($id);
        if($person){
            $person->full_name = $full_name;
            $person->cpf = $cpf;
            $person->nickname = $nickname;
            $person->gender = $gender;
            $person->phone = $phone;
            $person->cep = $cep;
            $person->street = $street;
            $person->neighborhood = $neighborhood;
            $person->city = $city;
            $person->description = $description;
            $person->image = $image;
            if($person->save()){
                return $person;
            }
        }
        return false;
    }
}
