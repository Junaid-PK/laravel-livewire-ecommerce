<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'slug' => $this->faker->unique()->name(),
            'short_description'=> $this->faker->unique()->name(),
            'description' =>$this->faker->text(),
            'regular_price'=>$this->faker->numberBetween(10,500),
            'SKU'=> 'DIGI'.$this->faker->unique()->numberBetween(100,500),
            'stock_status' => 'instock',
            'quantity' =>$this->faker->numberBetween(100,200),
            'image'=>'digital_'.$this->faker->unique()->numberBetween(1,22).'.jpg',
            'category_id'=>$this->faker->numberBetween(1,5)
        ];
    }
}
