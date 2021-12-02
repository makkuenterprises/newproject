<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'category_id'=>'6',
                'product_name'=>'Baby Bubble bath and wash',
                'product_description'=>'Himalayas Gentle Baby Wash with its unique No Tears formula is infused with the goodness of Chickpea, 
                                        Fenugreek and Green Gram which cleanses your newborns skin, gently.',
                'product_thumbnail'=>'http://4med.in/assets/images/banner/fast15.jpg',
                'product_alt'=>'Baby Bubble bath and wash',
                'price'=>'485.50',
                'product_stock'=>'3',
                'product_size'=>'500ml',
                'prescription_required'=>true
            ],
            [
                'category_id'=>'6',
                'product_name'=>'Baby Diapers',
                'product_description'=>'Pampers Baby-Dry pants style diapers are the only pants in India with Ultra Absorb Core, Double Leak Guards and Lotion with Aloe Vera. 
                                        Ultra Absorb Core provides your baby a new type of dryness overnight - breathable dryness. Magic gel locks wetness away to provide up 
                                        to 12 hours of dryness. Now infused with baby lotion that has Aloe Vera, helps protect your baby’s delicate skin from diaper rash and 
                                        irritation. The new and improved product design enables a comfortable fit, closer to the baby’s body and a flexible waist band that 
                                        adapts to baby’s movements for a comfortable fit. A top layer with cotton-like soft material ensure a comfortable night’s sleep. 
                                        Our pants with fun exterior graphics, fun designs and characters ensure you enjoy with your baby.',
                'product_thumbnail'=>'http://4med.in/assets/images/banner/fast17.jpg',
                'product_alt'=>'Baby Diapers',
                'price'=>'938.50',
                'product_stock'=>'5',
                'product_size'=>'Small',
                'prescription_required'=>false
            ],
            [
                'category_id'=>'6',
                'product_name'=>'Baby Laundry Wash',
                'product_description'=>'Himalaya Gentle Baby Laundry Wash is specially formulated with naturally derived cleansing agents and herbs with antibacterial 
                                        property that are effective yet gentle on babys clothes. Enriched with Soapnut extracts, well-known for stain removal properties, 
                                        this formulation is tough on stains and odor. The antibacterial properties of Neem, Geranium, and Lemon effectively help sanitize 
                                        babys clothes. This laundry wash maintains the softness of the fabric and has a fresh and mild fragrance post wash, 
                                        without leaving detergent residue. Our biodegradable Baby Laundry Wash is gentle on your babys clothes and gentle on the 
                                        environment too!',
                'product_thumbnail'=>'http://4med.in/assets/images/banner/fast14.jpg',
                'product_alt'=>'Baby Laundry Wash',
                'price'=>'38.50',
                'product_stock'=>'5',
                'product_size'=>'400ml',
                'prescription_required'=>false    
            ],
            [
                'category_id'=>'6',
                'product_name'=>'Baby Bath Soap',
                'product_description'=>'A mother’s love is the most trusted test for mildness. When a new life is placed in your arms, you only let the purest and mildest 
                                        touch her. This is what has inspired us to develop the Johnsons top-to-toe range. It is clinically proven mild, for a new-borns 
                                        first bath. So what touches your baby is always as mild as your touch and as pure as your love. Johnson’s top-to-toe baby wash is 
                                        a specially designed a perfectly ph balanced cleanser, as mild as pure water, for your babys delicate skin and eyes.',
                'product_thumbnail'=>'http://4med.in/assets/images/banner/fast16.jpg',
                'product_alt'=>'Baby Bath Soap',
                'price'=>'238',
                'product_stock'=>'4',
                'product_size'=>'500ml',
                'prescription_required'=>false
            ],
             [
                'category_id'=>'6',
                'product_name'=>'Baby Bath Soap',
                'product_description'=>'A mother’s love is the most trusted test for mildness. When a new life is placed in your arms, you only let the purest and mildest 
                                        touch her. This is what has inspired us to develop the Johnsons top-to-toe range. It is clinically proven mild, for a new-borns 
                                        first bath. So what touches your baby is always as mild as your touch and as pure as your love. Johnson’s top-to-toe baby wash is 
                                        a specially designed a perfectly ph balanced cleanser, as mild as pure water, for your babys delicate skin and eyes.',
                'product_thumbnail'=>'http://4med.in/assets/images/banner/fast16.jpg',
                'product_alt'=>'Baby Bath Soap',
                'price'=>'238',
                'product_stock'=>'5',
                'product_size'=>'600ml',
                'prescription_required'=>false
            ],
            
             [
                'category_id'=>'6',
                'product_name'=>'Baby Bubble bath and wash',
                'product_description'=>'Himalayas Gentle Baby Wash with its unique No Tears formula is infused with the goodness of Chickpea, 
                                        Fenugreek and Green Gram which cleanses your newborns skin, gently.',
                'product_thumbnail'=>'http://4med.in/assets/images/banner/fast15.jpg',
                'product_alt'=>'Baby Bubble bath and wash',
                'price'=>'485.50',
                'product_stock'=>'3',
                'product_size'=>'500ml',
                'prescription_required'=>true
            ],
         
            [
                'category_id'=>'6',
                'product_name'=>'Baby Diapers',
                'product_description'=>'Pampers Baby-Dry pants style diapers are the only pants in India with Ultra Absorb Core, Double Leak Guards and Lotion with Aloe Vera. 
                                        Ultra Absorb Core provides your baby a new type of dryness overnight - breathable dryness. Magic gel locks wetness away to provide up 
                                        to 12 hours of dryness. Now infused with baby lotion that has Aloe Vera, helps protect your baby’s delicate skin from diaper rash and 
                                        irritation. The new and improved product design enables a comfortable fit, closer to the baby’s body and a flexible waist band that 
                                        adapts to baby’s movements for a comfortable fit. A top layer with cotton-like soft material ensure a comfortable night’s sleep. 
                                        Our pants with fun exterior graphics, fun designs and characters ensure you enjoy with your baby.',
                'product_thumbnail'=>'http://4med.in/assets/images/banner/fast17.jpg',
                'product_alt'=>'Baby Diapers',
                'price'=>'938.50',
                'product_stock'=>'5',
                'product_size'=>'Small',
                'prescription_required'=>false
            ],
            [
                'category_id'=>'6',
                'product_name'=>'Baby Diapers',
                'product_description'=>'Pampers Baby-Dry pants style diapers are the only pants in India with Ultra Absorb Core, Double Leak Guards and Lotion with Aloe Vera. 
                                        Ultra Absorb Core provides your baby a new type of dryness overnight - breathable dryness. Magic gel locks wetness away to provide up 
                                        to 12 hours of dryness. Now infused with baby lotion that has Aloe Vera, helps protect your baby’s delicate skin from diaper rash and 
                                        irritation. The new and improved product design enables a comfortable fit, closer to the baby’s body and a flexible waist band that 
                                        adapts to baby’s movements for a comfortable fit. A top layer with cotton-like soft material ensure a comfortable night’s sleep. 
                                        Our pants with fun exterior graphics, fun designs and characters ensure you enjoy with your baby.',
                'product_thumbnail'=>'http://4med.in/assets/images/banner/fast17.jpg',
                'product_alt'=>'Baby Diapers',
                'price'=>'938.50',
                'product_stock'=>'5',
                'product_size'=>'Large',
                'prescription_required'=>false
            ],
            [
                'category_id'=>'6',
                'product_name'=>'Baby Laundry Wash',
                'product_description'=>'Himalaya Gentle Baby Laundry Wash is specially formulated with naturally derived cleansing agents and herbs with antibacterial 
                                        property that are effective yet gentle on babys clothes. Enriched with Soapnut extracts, well-known for stain removal properties, 
                                        this formulation is tough on stains and odor. The antibacterial properties of Neem, Geranium, and Lemon effectively help sanitize 
                                        babys clothes. This laundry wash maintains the softness of the fabric and has a fresh and mild fragrance post wash, 
                                        without leaving detergent residue. Our biodegradable Baby Laundry Wash is gentle on your babys clothes and gentle on the 
                                        environment too!',
                'product_thumbnail'=>'http://4med.in/assets/images/banner/fast14.jpg',
                'product_alt'=>'Baby Laundry Wash',
                'price'=>'38.50',
                'product_stock'=>'5',
                'product_size'=>'400ml',
                'prescription_required'=>false    
            ],
           
            [
                'category_id'=>'6',
                'product_name'=>'Baby Bubble bath and wash',
                'product_description'=>'Himalayas Gentle Baby Wash with its unique No Tears formula is infused with the goodness of Chickpea, 
                                        Fenugreek and Green Gram which cleanses your newborns skin, gently.',
                'product_thumbnail'=>'http://4med.in/assets/images/banner/fast15.jpg',
                'product_alt'=>'Baby Bubble bath and wash',
                'price'=>'485.50',
                'product_stock'=>'3',
                'product_size'=>'500ml',
                'prescription_required'=>true
            ]
        ]);
    }
    
}
