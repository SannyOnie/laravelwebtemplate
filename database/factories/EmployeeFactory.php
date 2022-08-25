<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;

// ใช้งาน Model Employee
use App\Models\Employee;


class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    protected $model =Employee::class;

    public function definition()
    {
        //$gender = $faker->randomElement(['Male','Female']);
        return [
            //   
            'fullname'=>$this->faker->name,
            'gender'=>$this->faker->randomElement(['Male','Female']),
            'email'=>$this->faker->Unique->safeEmail(),
            'tel'=>$this->faker->phoneNumber(),
            'age'=>$this->faker->randomNumber(2,true),
            'address'=>$this->faker->address(),
            'avatar'=>$this->faker->imageUrl(800,600),
            'status'=> 0
        ];
    }
}
