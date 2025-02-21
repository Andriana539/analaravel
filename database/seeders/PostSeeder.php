<?php

namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $judul = [
            'Selalu Dipuja-Puja Bangsa',

        ];

        foreach ($judul as $j) {
            $slug = Str::slug($j);
            $slugOri = $slug;
            $count = 1;
            while(Post::where('slug',$slug)->exists()){
                $slug = $slugOri."-". $count;
                $count++;
            }
            
           
            Post::create([
                'user_id' => 1, // or any valid user ID
                'title' => $j,
                'slug' => $slug,
                'description' => 'deskripsi untuk ' . $j,
                'status' => 'publish',
            ]);
        }
                
    }
}
