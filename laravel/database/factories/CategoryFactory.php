<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_name=$this->faker->unique()->words($nb=4,$asText=true);
        $slug=Str::slug($category_name);
        return [
            'name' => $category_name,
            'slug' => $slug
        ];
    }
}
