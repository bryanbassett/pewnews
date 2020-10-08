<?php

namespace Database\Factories;

use App\Models\Articles;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticlesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articles::class;
    public function getImage(){
        $url='https://source.unsplash.com/1600x900/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        return $url; 
    }
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(6,true),
            'content' => '<p class="text-2xl">'.$this->faker->realText(100, 2).'</p><p>'.$this->faker->paragraph(3,true).'</p><p>'.$this->faker->paragraph(3,true).'</p>',
            'imageUrl' => $this->getImage(),
            'user_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
