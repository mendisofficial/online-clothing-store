<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class ProductSeeder extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'BrandSeeder',
            'CategorySeeder',
            'ColorSeeder',
            'SizeSeeder'
        ];
    }

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [
            // Nike products
            ['name' => 'Nike Air Max T-Shirt', 'description' => 'Comfortable cotton t-shirt with Nike Air Max logo', 'image_path' => 'https://placehold.co/600x600/000000/FFFFFF.png?text=Nike+Air+Max+T-Shirt&font=roboto', 'brand_id' => 1, 'category_id' => 1, 'size_id' => 3, 'color_id' => 1],
            ['name' => 'Nike Dri-FIT Running Tee', 'description' => 'Moisture-wicking t-shirt for athletic performance', 'image_path' => 'https://placehold.co/600x600/FFFFFF/000000.png?text=Nike+Dri-FIT+Running+Tee&font=roboto', 'brand_id' => 1, 'category_id' => 1, 'size_id' => 2, 'color_id' => 2],
            ['name' => 'Nike Air Force 1', 'description' => 'Classic basketball sneakers with timeless style', 'image_path' => 'https://placehold.co/600x600/FFFFFF/000000.png?text=Nike+Air+Force+1&font=roboto', 'brand_id' => 1, 'category_id' => 3, 'size_id' => 4, 'color_id' => 2],
            ['name' => 'Nike Windbreaker Jacket', 'description' => 'Lightweight jacket perfect for outdoor activities', 'image_path' => 'https://placehold.co/600x600/000000/FFFFFF.png?text=Nike+Windbreaker+Jacket&font=roboto', 'brand_id' => 1, 'category_id' => 4, 'size_id' => 3, 'color_id' => 1],
            ['name' => 'Nike Swoosh Cap', 'description' => 'Adjustable cap with embroidered Nike swoosh', 'image_path' => 'https://placehold.co/600x600/000000/FFFFFF.png?text=Nike+Swoosh+Cap&font=roboto', 'brand_id' => 1, 'category_id' => 5, 'size_id' => 3, 'color_id' => 1],

            // Adidas products
            ['name' => 'Adidas Originals 3-Stripes Tee', 'description' => 'Classic three stripes design t-shirt', 'image_path' => 'https://placehold.co/600x600/000000/FFFFFF.png?text=Adidas+3-Stripes+Tee&font=roboto', 'brand_id' => 2, 'category_id' => 1, 'size_id' => 3, 'color_id' => 1],
            ['name' => 'Adidas Performance Shirt', 'description' => 'High-performance athletic t-shirt', 'image_path' => 'https://placehold.co/600x600/0066CC/FFFFFF.png?text=Adidas+Performance+Shirt&font=roboto', 'brand_id' => 2, 'category_id' => 1, 'size_id' => 4, 'color_id' => 3],
            ['name' => 'Adidas Stan Smith', 'description' => 'Iconic white tennis sneakers', 'image_path' => 'https://placehold.co/600x600/FFFFFF/000000.png?text=Adidas+Stan+Smith&font=roboto', 'brand_id' => 2, 'category_id' => 3, 'size_id' => 3, 'color_id' => 2],
            ['name' => 'Adidas Track Jacket', 'description' => 'Classic track jacket with three stripes', 'image_path' => 'https://placehold.co/600x600/000000/FFFFFF.png?text=Adidas+Track+Jacket&font=roboto', 'brand_id' => 2, 'category_id' => 4, 'size_id' => 4, 'color_id' => 1],
            ['name' => 'Adidas Trefoil Beanie', 'description' => 'Warm knit beanie with trefoil logo', 'image_path' => 'https://placehold.co/600x600/808080/FFFFFF.png?text=Adidas+Trefoil+Beanie&font=roboto', 'brand_id' => 2, 'category_id' => 5, 'size_id' => 3, 'color_id' => 5],

            // Puma products
            ['name' => 'Puma Essential Logo Tee', 'description' => 'Comfortable everyday t-shirt with Puma logo', 'image_path' => 'https://placehold.co/600x600/FF0000/FFFFFF.png?text=Puma+Essential+Logo+Tee&font=roboto', 'brand_id' => 3, 'category_id' => 1, 'size_id' => 2, 'color_id' => 4],
            ['name' => 'Puma Evostripe Shirt', 'description' => 'Modern athletic t-shirt with Evostripe design', 'image_path' => 'https://placehold.co/600x600/000000/FFFFFF.png?text=Puma+Evostripe+Shirt&font=roboto', 'brand_id' => 3, 'category_id' => 1, 'size_id' => 3, 'color_id' => 1],
            ['name' => 'Puma Suede Classic', 'description' => 'Vintage-inspired suede sneakers', 'image_path' => 'https://placehold.co/600x600/0066CC/FFFFFF.png?text=Puma+Suede+Classic&font=roboto', 'brand_id' => 3, 'category_id' => 3, 'size_id' => 4, 'color_id' => 3],
            ['name' => 'Puma Evostripe Jacket', 'description' => 'Modern track jacket with streamlined design', 'image_path' => 'https://placehold.co/600x600/808080/FFFFFF.png?text=Puma+Evostripe+Jacket&font=roboto', 'brand_id' => 3, 'category_id' => 4, 'size_id' => 3, 'color_id' => 5],
            ['name' => 'Puma Archive Logo Cap', 'description' => 'Retro-style cap with archive Puma logo', 'image_path' => 'https://placehold.co/600x600/FFFFFF/000000.png?text=Puma+Archive+Logo+Cap&font=roboto', 'brand_id' => 3, 'category_id' => 5, 'size_id' => 3, 'color_id' => 2],

            // Levi's products
            ['name' => 'Levi\'s 501 Original Fit Jeans', 'description' => 'Classic straight-leg jeans with button fly', 'image_path' => 'https://placehold.co/600x600/0066CC/FFFFFF.png?text=Levi\'s+501+Original+Fit+Jeans&font=roboto', 'brand_id' => 4, 'category_id' => 2, 'size_id' => 3, 'color_id' => 3],
            ['name' => 'Levi\'s 511 Slim Fit Jeans', 'description' => 'Modern slim-fit jeans for everyday wear', 'image_path' => 'https://placehold.co/600x600/000000/FFFFFF.png?text=Levi\'s+511+Slim+Fit+Jeans&font=roboto', 'brand_id' => 4, 'category_id' => 2, 'size_id' => 4, 'color_id' => 1],
            ['name' => 'Levi\'s Classic Crew Tee', 'description' => 'Premium cotton t-shirt with classic fit', 'image_path' => 'https://placehold.co/600x600/FFFFFF/000000.png?text=Levi\'s+Classic+Crew+Tee&font=roboto', 'brand_id' => 4, 'category_id' => 1, 'size_id' => 3, 'color_id' => 2],
            ['name' => 'Levi\'s Trucker Jacket', 'description' => 'Iconic denim jacket with classic styling', 'image_path' => 'https://placehold.co/600x600/0066CC/FFFFFF.png?text=Levi\'s+Trucker+Jacket&font=roboto', 'brand_id' => 4, 'category_id' => 4, 'size_id' => 4, 'color_id' => 3],
            ['name' => 'Levi\'s Leather Belt', 'description' => 'Genuine leather belt with metal buckle', 'image_path' => 'https://placehold.co/600x600/000000/FFFFFF.png?text=Levi\'s+Leather+Belt&font=roboto', 'brand_id' => 4, 'category_id' => 5, 'size_id' => 3, 'color_id' => 1],

            // Zara products
            ['name' => 'Zara Basic Cotton Tee', 'description' => 'Soft cotton t-shirt in basic colors', 'image_path' => 'https://placehold.co/600x600/FFFFFF/000000.png?text=Zara+Basic+Cotton+Tee&font=roboto', 'brand_id' => 5, 'category_id' => 1, 'size_id' => 2, 'color_id' => 2],
            ['name' => 'Zara Printed Graphic Tee', 'description' => 'Trendy t-shirt with artistic print design', 'image_path' => 'https://placehold.co/600x600/000000/FFFFFF.png?text=Zara+Printed+Graphic+Tee&font=roboto', 'brand_id' => 5, 'category_id' => 1, 'size_id' => 3, 'color_id' => 1],
            ['name' => 'Zara Skinny Jeans', 'description' => 'Modern skinny-fit jeans in stretch denim', 'image_path' => 'https://placehold.co/600x600/000000/FFFFFF.png?text=Zara+Skinny+Jeans&font=roboto', 'brand_id' => 5, 'category_id' => 2, 'size_id' => 2, 'color_id' => 1],
            ['name' => 'Zara Bomber Jacket', 'description' => 'Contemporary bomber jacket in satin finish', 'image_path' => 'https://placehold.co/600x600/808080/FFFFFF.png?text=Zara+Bomber+Jacket&font=roboto', 'brand_id' => 5, 'category_id' => 4, 'size_id' => 3, 'color_id' => 5],
            ['name' => 'Zara Chain Bracelet', 'description' => 'Minimalist chain bracelet in gold tone', 'image_path' => 'https://placehold.co/600x600/FFFFFF/000000.png?text=Zara+Chain+Bracelet&font=roboto', 'brand_id' => 5, 'category_id' => 5, 'size_id' => 3, 'color_id' => 2]
        ];

        $table = $this->table('product');
        $table->insert($data)->save();
    }
}
