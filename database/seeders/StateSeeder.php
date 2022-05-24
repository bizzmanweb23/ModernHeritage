<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('states')->delete();

        $states =[
            [
              'country_id'=>'347',
              'states'=>'Andhra Pradesh',
              
            ],
            [
                'country_id'=>'347',
                'states'=>'Andaman and Nicobar Islands',
                
            ],
            [
              'country_id'=>'347',
              'states'=>'Arunachal Pradesh',
             
            ],
            [
              'country_id'=>'347',
              'states'=>'Assam',
             
         ],
        [
              'country_id'=>'347',
              'states'=>'Bihar',
              
        ],
        [
            'country_id'=>'347',
            'states'=>'Chandigarh',
           
        ],
        [
              'country_id'=>'347',
              'states'=>'Chhattisgarh',
             
                ],
       [
            'country_id'=>'347',
            'states'=>'Delhi',
                   
        ],
        [
              'country_id'=>'347',
              'states'=>'Goa',
             
                ],
        [
             'country_id'=>'347',
              'states'=>'Gujarat',
             
                ],
        [
              'country_id'=>'347',
              'states'=>'Haryana',
              
                ],
        [
              'country_id'=>'347',
              'states'=>'Himachal Pradesh',
             
                ],
        [
                'country_id'=>'347',
                'states'=>'Jammu and Kashmir',
                    
        ],
      
            
        [
              'country_id'=>'347',
              'states'=>'Jharkhand',
             
                ],
        [
              'country_id'=>'347',
              'states'=>'Karnataka',
             
                ],
        [
              'country_id'=>'347',
              'states'=>'Kerala',
            
        ],
        [
            'country_id'=>'347',
            'states'=>'Ladakh',
          
        ],
        [
            'country_id'=>'347',
            'states'=>'Lakshadweep',
          
        ], 

        [
              'country_id'=>'347',
              'states'=>'Madhya Pradesh',
            
                ],
        [
              'country_id'=>'347',
              'states'=>'Maharashtra',
           
                ],
        [
              'country_id'=>'347',
              'states'=>'Manipur',
             
                ],
        [
              'country_id'=>'347',
              'states'=>'Meghalaya',
            
                ],
        [
              'country_id'=>'347',
              'states'=>'Mizoram',
            
                ],
        [
              'country_id'=>'347',
              'states'=>'Nagaland',
            
                ],
        [
             'country_id'=>'347',
              'states'=>'Odisha',
             
        ],
        [
            'country_id'=>'347',
            'states'=>'Punjab',
           
     ],
        
        [
              'country_id'=>'347',
              'states'=>'Puducherry',
             
                ],
        [
              'country_id'=>'347',
              'states'=>'Rajasthan',
             
                ],
        [
              'country_id'=>'347',
              'states'=>'Sikkim',
           
                ],
        [
              'country_id'=>'347',
              'states'=>'Tamil Nadu',
             
                ],
        [
            
            'country_id'=>'347',
            'states'=>'Telangana',
             
                ],
        [
             
                  
            'country_id'=>'347',
            'states'=>'Tripura',
             
             
                ],
        [
             
            'country_id'=>'347',
            'states'=>'Uttar Pradesh',
             
                ],
        [
              
            'country_id'=>'347',
            'states'=>'Uttarakhand',
            
                ],
        [
             
            'country_id'=>'347',
            'states'=>'West Bengal',
             
                ],
      

    ];
       
           State::insert($states);
        }

    }
