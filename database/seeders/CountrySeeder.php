<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('countries')->delete();

        $countries =[
            [
              
              'country'=>'Afghanistan',
              'country_code'=>93
              
            ],
            [
             
              'country'=>'Albania',
              'country_code'=>355
             
            ],
            [
              
              'country'=>'Algeria',
              'country_code'=>213
             
         ],
       
        [
              
              'country'=>'Andorra',
              'country_code'=>376
             
                ],
        [
              
              'country'=>'Angola',
              'country_code'=>244
             
       ],
       
        [
              
              'country'=>'Antarctica',
              'country_code'=>672
              
                ],
       
        [
             
              'country'=>'Argentina',
              'country_code'=>54
             
                ],
        [
              
              'country'=>'Armenia',
              'country_code'=>374
             
                ],
       
        [
              'country'=>'Australia',
              'country_code'=>61
            
                ],
        [
             
              'country'=>'Austria',
              'country_code'=>43

           
                ],
        [
             
              'country'=>'Azerbaijan',
              'country_code'=>994
             
                ],
      
        [
             
              'country'=>'Bahrain',
              'country_code'=>973
            
                ],
        [
            
              'country'=>'Bangladesh',
              'country_code'=>880
            
                ],
      
        [
             
              'country'=>'Belarus',
              'country_code'=>375
             
                ],
        [
            
              'country'=>'Belgium',
              'country_code'=>32
             
                ],
        [
              
              'country'=>'Belize',
              'country_code'=>501
           
                ],
        [
             
              'country'=>'Benin',
              'country_code'=>229
             
                ],
      
        [
             
              'country'=>'Bhutan',
              'country_code'=>975
                ],
        [
             
              'country'=>'Bolivia',
              'country_code'=>591
             
                ],
        [
              
              'country'=>'Bosnia and Herzegovina',
              'country_code'=>387
            
                ],
        [
             
              'country'=>'Botswana',
              'country_code'=>267
             
                ],
       
        [
              
              'country'=>'Brazil',
              'country_code'=>55
             
                ],
        [
             
              'country'=>'British Indian Ocean Territory',
              'country_code'=>246
              
                ],
        [
              'country'=>'Brunei',
              'country_code'=>673
             
                ],
        [
             
              'country'=>'Bulgaria',
              'country_code'=>359
            
                ],
        [
              'country'=>'Burkina Faso',
              'country_code'=>226
            
                ],
        [
             
              'country'=>'Burundi',
              'country_code'=>257
             
                ],
        [
             
              'country'=>'Cambodia',
              'country_code'=>855
          
                ],
        [
              
              'country'=>'Cameroon',
              'country_code'=>237
        
             
                ],
        [
              
              'country'=>'Canada',
              'country_code'=>1
            
                ],
        [
            
              'country'=>'Cape Verde',
              'country_code'=>238
             
                ],
       
        [
             
              'country'=>'Central African Republic',
              'country_code'=>236
            
                ],
        [
              
              'country'=>'Chad',
              'country_code'=>235
            
                ],
        [
              
              'country'=>'Chile',
              'country_code'=>56
           
                ],
        [
             
              'country'=>'China',
              'country_code'=>86
            
                ],
        [
              
              'country'=>'Christmas Island',
              'country_code'=>61
           
                ],
        [
             
              'country'=>'Cocos (Keeling) Islands',
              'country_code'=>61
             
                ],
        [
             
              'country'=>'Colombia',
              'country_code'=>57
          

                ],
        [
              
              'country'=>'Comoros',
              'country_code'=>269
            
                ],
        [
             
              'country'=>'Republic Of The Congo',
              'country_code'=>242
            
                ],
        [
            
              'country'=>'Democratic Republic Of The Congo',
              'country_code'=>243
             
                ],
        
      
        [
             
              'country'=>'Cuba',
              'country_code'=>53
             
                ],
        [
            
              'country'=>'Cyprus',
              'country_code'=>357
             
                ],
        [
              
              'country'=>'Czech Republic',
              'country_code'=>	420
             
                ],
        [
           
              'country'=>'Denmark',
              'country_code'=>45
             
                ],
        [
             
              'country'=>'Djibouti',
              'country_code'=>	253
             
                ],
       
       
        [
              
              'country'=>'East Timor',
              'country_code'=>670
             
                ],
        [
             
              'country'=>'Ecuador',
              'country_code'=>593
             
                ],
        [
             
              'country'=>'Egypt',
              'country_code'=>20
             
                ],
        [
            
              'country'=>'El Salvador',
              'country_code'=>503
             
                ],
        [
             
              'country'=>'Equatorial Guinea',
              'country_code'=>240
             
                ],
        [
            
              'country'=>'Eritrea',
              'country_code'=>291
             
                ],
        [
             
              'country'=>'Estonia',
              'country_code'=>372
             
                ],
        [
             
              'country'=>'Ethiopia',
              'country_code'=>251
             
                ],
       
        [
            
              'country'=>'Falkland Islands',
              'country_code'=>500
             
                ],
        [
            
              'country'=>'Faroe Islands',
              'country_code'=>298
             
                ],
        [
           
              'country'=>'Fiji Islands',
              'country_code'=>679
             
                ],
        [
             
              'country'=>'Finland',
              'country_code'=>358
                ],
        [
           
              'country'=>'France',
              'country_code'=>	33
                ],
       
        [
              'country'=>'French Polynesia',
              'country_code'=>689
                ],
       
        [
            
              'country'=>'Gabon',
              'country_code'=>241
                ],
        [
             
              'country'=>'Gambia The',
              'country_code'=>220
                ],
        [
             
              'country'=>'Georgia',
              'country_code'=>	995
                ],
        [
              
              'country'=>'Germany',
              'country_code'=>49
                ],
        [
         
              'country'=>'Ghana',
              'country_code'=>233
                ],
        [
             
              'country'=>'Gibraltar',
              'country_code'=>	350
                ],
        [
             
              'country'=>'Greece',
              'country_code'=>30
                ],
        [
             
              'country'=>'Greenland',
              'country_code'=>299
                ],
       
        
       
        [
             
              'country'=>'Guatemala',
              'country_code'=>	502
                ],
        
        [
              
              'country'=>'Guinea',
              'country_code'=>224
                ],
        [
              
              'country'=>'Guinea-Bissau',
              'country_code'=>245
                ],
        [
            
              'country'=>'Guyana',
              'country_code'=>	592
                ],
        [
            
              'country'=>'Haiti',
              'country_code'=>509
                ],
       
        [
            
              'country'=>'Honduras',
              'country_code'=>504
                ],
        [
            
              'country'=>'Hong Kong S.A.R.',
              'country_code'=>	852
                ],
        [
             
              'country'=>'Hungary',
              'country_code'=>36
                ],
        [
            
              'country'=>'Iceland',
              'country_code'=>354
                ],
        [
            
              'country'=>'India',
              'country_code'=>91
                ],
        [
             
              'country'=>'Indonesia',
              'country_code'=>62
                ],
        [
             
              'country'=>'Iran',
              'country_code'=>98
                ],
        [
            
              'country'=>'Iraq',
              'country_code'=>964
                ],
        [
             
              'country'=>'Ireland',
              'country_code'=>353
                ],
        [
             
              'country'=>'Israel',
              'country_code'=>972
                ],
        [
             
              'country'=>'Italy',
              'country_code'=>39
                ],
     
        [
             
              'country'=>'Japan',
              'country_code'=>81
                ],
       
        [
            
              'country'=>'Jordan',
              'country_code'=>962
                ],
        [
            
              'country'=>'Kazakhstan',
              'country_code'=>7
                ],
        [
            
              'country'=>'Kenya',
              'country_code'=>254
                ],
        [
            
              'country'=>'Kiribati',
              'country_code'=>	686
                ],
        
        [
            
              'country'=>'Kuwait',
              'country_code'=>965
                ],
        [
             
              'country'=>'Kyrgyzstan',
              'country_code'=>996
                ],
        [
            
              'country'=>'Laos',
              'country_code'=>856
                ],
        [
             
              'country'=>'Latvia',
              'country_code'=>371
                ],
        [
              
              'country'=>'Lebanon',
              'country_code'=>961
                ],
        [
            
              'country'=>'Lesotho',
              'country_code'=>266
                ],
        [
             
              'country'=>'Liberia',
              'country_code'=>231
                ],
        [
             
              'country'=>'Libya',
              'country_code'=>	218
                ],
        [
             
              'country'=>'Liechtenstein',
              'country_code'=>423
                ],
        [
             
              'country'=>'Lithuania',
              'country_code'=>370
                ],
        [
            
              'country'=>'Luxembourg',
              'country_code'=>352
                ],
        [
              
              'country'=>'Macau S.A.R.',
              'country_code'=>853
                ],
        [
            
              'country'=>'Macedonia',
              'country_code'=>389
                ],
        [
             
              'country'=>'Madagascar',
              'country_code'=>261
                ],
        [
              'country'=>'Malawi',
              'country_code'=>265
                ],
        [
            
              'country'=>'Malaysia',
              'country_code'=>60
                ],
        [
            
              'country'=>'Maldives',
              'country_code'=>960
                ],
        [
             
              'country'=>'Mali',
              'country_code'=>223
                ],
        [
            
              'country'=>'Malta',
              'country_code'=>356
                ],
       
        [
            
              'country'=>'Marshall Islands',
              'country_code'=>692
                ],
       
        [
             
              'country'=>'Mauritania',
              'country_code'=>222
                ],
        [
             
              'country'=>'Mauritius',
              'country_code'=>230
                ],
        [
             
              'country'=>'Mayotte',
              'country_code'=>262
                ],
        [
              
              'country'=>'Mexico',
              'country_code'=>52
                ],
        [
              
              'country'=>'Micronesia',
              'country_code'=>691
                ],
        [
             
              'country'=>'Moldova',
              'country_code'=>373
                ],
        [
            
              'country'=>'Monaco',
              'country_code'=>377
                ],
        [
            
              'country'=>'Mongolia',
              'country_code'=>976
                ],
       
        [
             
              'country'=>'Morocco',
              'country_code'=>212
                ],
        [
             
              'country'=>'Mozambique',
              'country_code'=>258
                ],
        [
             
              'country'=>'Myanmar',
              'country_code'=>95
                ],
        [
              
              'country'=>'Namibia',
              'country_code'=>264
                ],
        [
             
              'country'=>'Nauru',
              'country_code'=>674
                ],
        [
             
              'country'=>'Nepal',
              'country_code'=>977
                ],
        [
             
              'country'=>'Netherlands Antilles',
              'country_code'=>	599
                ],
        [
             
              'country'=>'Netherlands The',
              'country_code'=>31
                ],
        [
             
              'country'=>'New Caledonia',
              'country_code'=>687
                ],
        [
             
              'country'=>'New Zealand',
              'country_code'=>64
                ],
        [
            
              'country'=>'Nicaragua',
              'country_code'=>	505
                ],
        [
            
              'country'=>'Niger',
              'country_code'=>227
                ],
        [
            
              'country'=>'Nigeria',
              'country_code'=>	234
                ],
        [
           
              'country'=>'Niue',
              'country_code'=>683
                ],
        
       
        [
              
              'country'=>'Norway',
              'country_code'=>47
                ],
        [
             
              'country'=>'Oman',
              'country_code'=>968
                ],
        [
             
              'country'=>'Pakistan',
              'country_code'=>	92
                ],
        [
              'country'=>'Palau',
              'country_code'=>	680
                ],
       
        [
           
              'country'=>'Panama',
              'country_code'=>	507
                ],
        [
              
              'country'=>'Papua new Guinea',
              'country_code'=>675
                ],
        [
            
              'country'=>'Paraguay',
              'country_code'=>	595
                ],
        [
             
              'country'=>'Peru',
              'country_code'=>	51
                ],
        [
          
              'country'=>'Philippines',
              'country_code'=>63
                ],
        
        [
           
              'country'=>'Poland',
              'country_code'=>48
                ],
        [
            
              'country'=>'Portugal',
              'country_code'=>351
                ],
        
        [
             
              'country'=>'Qatar',
              'country_code'=>974
                ],
        [
             
              'country'=>'Reunion',
              'country_code'=>262
                ],
        [
             
              'country'=>'Romania',
              'country_code'=>40
                ],
        [
             
              'country'=>'Russia',
              'country_code'=>7
                ],
        [
           
              'country'=>'Rwanda',
              'country_code'=>250
                ],
        [
             
              'country'=>'Saint Helena',
              'country_code'=>290
                ],
       
      
        [
             
              'country'=>'Saint Pierre and Miquelon',
              'country_code'=>508
                ],
      
        [
             
              'country'=>'Samoa',
              'country_code'=>685
                ],
        [
           
              'country'=>'San Marino',
              'country_code'=>378
                ],
        [
              
              'country'=>'Sao Tome and Principe',
              'country_code'=>239
                ],
        [
             
              'country'=>'Saudi Arabia',
              'country_code'=>966
                ],
        [
              
              'country'=>'Senegal',
              'country_code'=>221
                ],
        [
              
              'country'=>'Serbia',
              'country_code'=>381
                ],
        [
             
              'country'=>'Seychelles',
              'country_code'=>248
                ],
        [
              
              'country'=>'Sierra Leone',
              'country_code'=>232
                ],
        [
            
              'country'=>'Singapore',
              'country_code'=>	65
                ],
        [
           
              'country'=>'Slovakia',
              'country_code'=>421
                ],
        [
            
              'country'=>'Slovenia',
              'country_code'=>386
                ],
       
        [
              
              'country'=>'Solomon Islands',
              'country_code'=>677
                ],
        [
              
              'country'=>'Somalia',
              'country_code'=>252
                ],
        [
             
              'country'=>'South Africa',
              'country_code'=>27
                ],
        
        [
              
              'country'=>'South Sudan',
              'country_code'=>211
                ],
        [
              
              'country'=>'Spain',
              'country_code'=>34
                ],
        [
             
            
              'country'=>'Sri Lanka',
              'country_code'=>94
             
                ],
        [
          
              'country'=>'Sudan',
              'country_code'=>249
                ],
       
        [
             
              'country'=>'Svalbard And Jan Mayen Islands',
              'country_code'=>47
                ],
        [
            
              'country'=>'Swaziland',
              'country_code'=>268
                ],
        [
             
              'country'=>'Sweden',
              'country_code'=>46
                ],
        [
            
              'country'=>'Switzerland',
              'country_code'=>41
                ],
        [
              
              'country'=>'Syria',
              'country_code'=>963
                ],
        [
            
              'country'=>'Taiwan',
              'country_code'=>992
                ],
       
        [
         
              'country'=>'Tanzania',
              'country_code'=>	255
                ],
        [
             
              'country'=>'Thailand',
              'country_code'=>66
                ],
        [
           
              'country'=>'Togo',
              'country_code'=>228
                ],
        [
              
              'country'=>'Tokelau',
              'country_code'=>690
                ],
        [
             
              'country'=>'Tonga',
              'country_code'=>676
                ],
        
        [
             
              'country'=>'Tunisia',
              'country_code'=>216
                ],
        [
             
              'country'=>'Turkey',
              'country_code'=>90
                ],
        [
            
              'country'=>'Turkmenistan',
              'country_code'=>993
                ],
       
        [
              
              'country'=>'Tuvalu',
              'country_code'=>688
                ],
        [
             
              'country'=>'Uganda',
              'country_code'=>256
                ],
        [
            
              'country'=>'Ukraine',
              'country_code'=>380
                ],
        [
             
              'country'=>'United Arab Emirates',
              'country_code'=>971
                ],
        [
              
              'country'=>'United Kingdom',
              'country_code'=>44
                ],
        [
              
              'country'=>'United States',
              'country_code'=>1
                ],
        
        [
            
              'country'=>'Uruguay',
              'country_code'=>598
                ],
        [
            
              'country'=>'Uzbekistan',
              'country_code'=>998
                ],
        [
           
              'country'=>'Vanuatu',
              'country_code'=>678
                ],
       
        [
              
              'country'=>'Venezuela',
              'country_code'=>58
             
                ],
        [
              
              'country'=>'Vietnam',
              'country_code'=> 84
           
                ],
      
       
               [
              
              'country'=>'Wallis And Futuna Islands',
              'country_code'=>681
             
                ],
               [
              
              'country'=>'Western Sahara',
              'country_code'=>212
             
                ],
                [
              
              'country'=>'Yemen',
              'country_code'=>967
             
                ],
        [
            
              'country'=>'Yugoslavia',
              'country_code'=>38
             
                ],
        [
             
              'country'=>'Zambia',
              'country_code'=>260
             
                ],
        [
           
              'country'=>'Zimbabwe',
              'country_code'=>263
                ],
          ];
          
          Country::insert($countries);
        }


    }
