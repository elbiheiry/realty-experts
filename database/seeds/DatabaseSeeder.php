<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        \Illuminate\Support\Facades\DB::table('admins')->insert([
//            'name' => 'admin',
//            'email' => 'admin@rec.com',
//            'password' => \Illuminate\Support\Facades\Hash::make('Admin123')
//        ]);
//
//        \Illuminate\Support\Facades\DB::table('abouts')->insert([
//            'video_link' => 'https://www.youtube.com/watch?v=T7Iqe3K4Vog&ab_channel=Realtyexperts',
//            'years_of_success' => '4',
//            'image' => 'about.jpg'
//        ]);
//
//        \Illuminate\Support\Facades\DB::table('about_translations')->insert([
//            'title' => 'REALTY EXPERTS CONSULTANCY',
//            'subtitle' => 'BE INVESTOR NOT A LANDLORD.',
//            'description' => 'Then we started our own entity at 2018 REC. . The Company strives with dedication to determine the needs of the clients and excels in providing the right solutions to meet the client’s expectations and attain the critical success factors in respect of service
//                              This Unique entity is managed by Mr. Haitham Anan who has been working over 19 years at the Egyptian Military establishment, and has been one of this great establishment He shares great Value’s, as integrity, honestly, Respect and the value of professional Teamwork, which become our Value
//                              REC combined our personalized style of Customer Service knowledge of the industry and commitment of training we are sure to be your freelance change property consultant.',
//            'tour' => 'AFTER TWO YEARS OF EXCESSIVE WORK AND ACHIEVEMENTS, WE ACHIEVED ONE OF OUR MAIN GOALS TO GAIN THE TRUST OF THE ACUD. AND TO BE THERE EXCLUSIVE REPRESENTATIVE FOR DEMONSTRATING THE NEW ADMINISTRATIVE CAPITAL BY PREPARING AND MANAGING INFORMATIVE TO THE NEW CAPITAL.
//                       WE ORGANIZED MORE THAN 37 VISITS WITH MORE THAN 4000 VISITORS, FROM DECEMBER 2018 TILL MAY 2019. SHOWING THE GREAT ACHIEVEMENT THAT HAVE BEEN DONE IN SHORT TIME, VISITING THE MOSQUE, CATHEDRAL AND AL-MASA HOTEL.
//                       AS WE DO BELIEVE THAT WE HAVE ROLE TOWARDS OUR COUNTRY AND OUR COMMUNITY, WE WORKED HARD TO HIGHLIGHT THE GREAT IMPORTANCE, VALUE, AND BENEFITS OF THE NEW ADMINISTRATIVE CAPITAL. DUE TO OUR EFFORTS ,WE INCREASE THE AWARENESS OF PEOPLE ABOUT THE PROJECT AND SO THE SALES OF ALL THE DEVELOPERS HAVE BEEN INCREASED , AND WE WERE PART OF IT .',
//            'mission' => 'TO ACT IN THE BEST INTERESTS OF OUR CLIENTS AT ALL TIMES, BRINGING UNQUESTIONABLE ETHICS TO EACH TRANSACTION, TO BECOME TRUSTED ADVISORS FOR OUR CUSTOMERS ACQUISITION, DISPOSITIONS AND LEASING NEEDS TO DEVELOP LONG TERM CLIENT’S RELATIONS BY PROVIDING EXCEPTIONAL BROKERAGE SERVICE THAT DRIVES UNPARALLELED CUSTOMER SATISFACTION.',
//            'vision' => 'REALTY EXPERTS IS DETERMINED TO BE RECOGNIZED AS A PIONEER IN REAL ESTATE SECTOR, AS OUR MISSION IS TO PROVIDE OUR CLIENTS WITH THE HIGHEST QUALITY OF BROKERAGE SERVICES AVAILABLE, TO BRING VALUE ADDED AND HIGHLY QUALIFIED TEAM OF REAL ESTATE PROFESSIONALS TO THE TABLE FOR ALL OF OUR CLIENTS TO PROVIDE OUR CLIENTS WITH EXTENSIVE MARKET ANALYSIS THAT HELP THEM TO MAKE TIMELY AND APPROPRIATE INVESTMENT DECISION',
//            'value' => 'OUR SUCCESS IS BUILT ON FOUNDATION OF SHARED VALUE’S .WE ARE PARTNERS OF PROGRESS OF OUR ESTEEMED CLIENT’S ,DELIVERING A PROMISE TO BE HONORED IN FUTURE AND INSTILL MUTUAL TRUST TO ENSURE OUR INTEGRITY IS UPHELD AS AN ONGOING EXERCISE',
//            'goals' => 'TO BECOME AND REMAIN OUR CLIENTS MOST TRUSTED ADVISOR, TO BE RECOGNIZED FOR DELIVERING SUPERIOR COMBINATION OF SUCCESSFUL INVESTMENT SOLUTIONS AND EXCEPTIONAL CUSTOMER SERVICE.OUR VISION REMINDS THAT CLIENTS THE BUSINESS WHERE THEY ARE WELCOME AND STAY WERE, THEY ARE APPRECIATED.',
//            'locale' => 'en',
//            'about_id' => 1
//        ]);
//
//        \Illuminate\Support\Facades\DB::table('about_translations')->insert([
//            'title' => 'REALTY EXPERTS CONSULTANCY',
//            'subtitle' => 'BE INVESTOR NOT A LANDLORD.',
//            'description' => 'Then we started our own entity at 2018 REC. . The Company strives with dedication to determine the needs of the clients and excels in providing the right solutions to meet the client’s expectations and attain the critical success factors in respect of service
//                              This Unique entity is managed by Mr. Haitham Anan who has been working over 19 years at the Egyptian Military establishment, and has been one of this great establishment He shares great Value’s, as integrity, honestly, Respect and the value of professional Teamwork, which become our Value
//                              REC combined our personalized style of Customer Service knowledge of the industry and commitment of training we are sure to be your freelance change property consultant.',
//            'tour' => 'AFTER TWO YEARS OF EXCESSIVE WORK AND ACHIEVEMENTS, WE ACHIEVED ONE OF OUR MAIN GOALS TO GAIN THE TRUST OF THE ACUD. AND TO BE THERE EXCLUSIVE REPRESENTATIVE FOR DEMONSTRATING THE NEW ADMINISTRATIVE CAPITAL BY PREPARING AND MANAGING INFORMATIVE TO THE NEW CAPITAL.
//                       WE ORGANIZED MORE THAN 37 VISITS WITH MORE THAN 4000 VISITORS, FROM DECEMBER 2018 TILL MAY 2019. SHOWING THE GREAT ACHIEVEMENT THAT HAVE BEEN DONE IN SHORT TIME, VISITING THE MOSQUE, CATHEDRAL AND AL-MASA HOTEL.
//                       AS WE DO BELIEVE THAT WE HAVE ROLE TOWARDS OUR COUNTRY AND OUR COMMUNITY, WE WORKED HARD TO HIGHLIGHT THE GREAT IMPORTANCE, VALUE, AND BENEFITS OF THE NEW ADMINISTRATIVE CAPITAL. DUE TO OUR EFFORTS ,WE INCREASE THE AWARENESS OF PEOPLE ABOUT THE PROJECT AND SO THE SALES OF ALL THE DEVELOPERS HAVE BEEN INCREASED , AND WE WERE PART OF IT .',
//            'mission' => 'TO ACT IN THE BEST INTERESTS OF OUR CLIENTS AT ALL TIMES, BRINGING UNQUESTIONABLE ETHICS TO EACH TRANSACTION, TO BECOME TRUSTED ADVISORS FOR OUR CUSTOMERS ACQUISITION, DISPOSITIONS AND LEASING NEEDS TO DEVELOP LONG TERM CLIENT’S RELATIONS BY PROVIDING EXCEPTIONAL BROKERAGE SERVICE THAT DRIVES UNPARALLELED CUSTOMER SATISFACTION.',
//            'vision' => 'REALTY EXPERTS IS DETERMINED TO BE RECOGNIZED AS A PIONEER IN REAL ESTATE SECTOR, AS OUR MISSION IS TO PROVIDE OUR CLIENTS WITH THE HIGHEST QUALITY OF BROKERAGE SERVICES AVAILABLE, TO BRING VALUE ADDED AND HIGHLY QUALIFIED TEAM OF REAL ESTATE PROFESSIONALS TO THE TABLE FOR ALL OF OUR CLIENTS TO PROVIDE OUR CLIENTS WITH EXTENSIVE MARKET ANALYSIS THAT HELP THEM TO MAKE TIMELY AND APPROPRIATE INVESTMENT DECISION',
//            'value' => 'OUR SUCCESS IS BUILT ON FOUNDATION OF SHARED VALUE’S .WE ARE PARTNERS OF PROGRESS OF OUR ESTEEMED CLIENT’S ,DELIVERING A PROMISE TO BE HONORED IN FUTURE AND INSTILL MUTUAL TRUST TO ENSURE OUR INTEGRITY IS UPHELD AS AN ONGOING EXERCISE',
//            'goals' => 'TO BECOME AND REMAIN OUR CLIENTS MOST TRUSTED ADVISOR, TO BE RECOGNIZED FOR DELIVERING SUPERIOR COMBINATION OF SUCCESSFUL INVESTMENT SOLUTIONS AND EXCEPTIONAL CUSTOMER SERVICE.OUR VISION REMINDS THAT CLIENTS THE BUSINESS WHERE THEY ARE WELCOME AND STAY WERE, THEY ARE APPRECIATED.',
//            'locale' => 'ar',
//            'about_id' => 1
//        ]);
//
//        \Illuminate\Support\Facades\DB::table('home_sections')->insert([
//            'id' => 1,
//            'image' => 'page-head.jpg'
//        ]);
//
//        \Illuminate\Support\Facades\DB::table('home_section_translations')->insert([
//            'locale' => 'en',
//            'home_section_id' => 1,
//            'first_section_title' => 'Realty <span>Experts</span> Consultancy',
//            'first_section_slogan' => 'BE INVESTOR NOT A LANDLORD',
//            'first_section_description' => 'The Company strives with dedication to determine the needs of the clients and excels in providing the right solutions to meet the client’s expectations and attain the critical success factors in respect of service',
//            'projects_title' => 'LATEST PROJECTS',
//            'projects_description' => 'REC combined our personalized style of Customer Service knowledge of the industry and commitment of training we are sure to be your freelance change property consultant.',
//            'team_title' => 'OUR TEAM',
//            'team_description' => 'REC combined our personalized style of Customer Service knowledge of the industry and commitment of training we are sure to be your freelance change property consultant.',
//            'partners_title' => 'OUR PARTNERS',
//            'partners_description' => 'REC combined our personalized style of Customer Service knowledge of the industry and commitment of training we are sure to be your freelance change property consultant.',
//            'gallery_title' => 'GREAT MOMENTS',
//            'gallery_description' => 'REC combined our personalized style of Customer Service knowledge of the industry and commitment of training we are sure to be your freelance change property consultant.'
//        ]);
//
//        \Illuminate\Support\Facades\DB::table('home_section_translations')->insert([
//            'locale' => 'ar',
//            'home_section_id' => 1,
//            'first_section_title' => 'Realty <span>Experts</span> Consultancy',
//            'first_section_slogan' => 'BE INVESTOR NOT A LANDLORD',
//            'first_section_description' => 'The Company strives with dedication to determine the needs of the clients and excels in providing the right solutions to meet the client’s expectations and attain the critical success factors in respect of service',
//            'projects_title' => 'LATEST PROJECTS',
//            'projects_description' => 'REC combined our personalized style of Customer Service knowledge of the industry and commitment of training we are sure to be your freelance change property consultant.',
//            'team_title' => 'OUR TEAM',
//            'team_description' => 'REC combined our personalized style of Customer Service knowledge of the industry and commitment of training we are sure to be your freelance change property consultant.',
//            'partners_title' => 'OUR PARTNERS',
//            'partners_description' => 'REC combined our personalized style of Customer Service knowledge of the industry and commitment of training we are sure to be your freelance change property consultant.',
//            'gallery_title' => 'GREAT MOMENTS',
//            'gallery_description' => 'REC combined our personalized style of Customer Service knowledge of the industry and commitment of training we are sure to be your freelance change property consultant.'
//        ]);
//
//        \Illuminate\Support\Facades\DB::table('settings')->insert([
//            'facebook' => 'https://www.facebook.com/RealtyexpertsEgypt',
//            'twitter' => 'https://twitter.com/Rec_realtyexp',
//            'instagram' => 'https://www.instagram.com/Realty.experts/',
//            'phone' => '+201149588588',
//            'email' => 'info@realtyexperts.co',
//            'whatsapp' => '+201029929880',
//            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6908.4398625395825!2d31.455560940237056!3d30.030547640349713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145822c1931fd679%3A0xd695368765168ecc!2sN%2090th%20Street%20-%20Service%20Ln%2C%20First%20New%20Cairo%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1601975925419!5m2!1sen!2seg'
//        ]);
//
//
//        \Illuminate\Support\Facades\DB::table('setting_translations')->insert([
//            'address' => 'N 90 st ,Cairo Business Plaza ,North Building office 003/1,fifth settlement New Cairo',
//            'locale' => 'en',
//            'setting_id' => 1
//        ]);
//
//        \Illuminate\Support\Facades\DB::table('setting_translations')->insert([
//            'address' => 'N 90 st ,Cairo Business Plaza ,North Building office 003/1,fifth settlement New Cairo',
//            'locale' => 'ar',
//            'setting_id' => 1
//        ]);

        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'id' => 1
        ]);

        \Illuminate\Support\Facades\DB::table('category_translations')->insert([
            'category_id' => 1,
            'locale' => 'en',
            'name' => 'uncategorized'
        ]);

        \Illuminate\Support\Facades\DB::table('category_translations')->insert([
            'category_id' => 1,
            'locale' => 'ar',
            'name' => 'غير مصنف'
        ]);

        \Illuminate\Support\Facades\DB::table('regions')->insert([
            'id' => 1
        ]);

        \Illuminate\Support\Facades\DB::table('region_translations')->insert([
            'region_id' => 1,
            'locale' => 'en',
            'name' => 'unallocated'
        ]);

        \Illuminate\Support\Facades\DB::table('region_translations')->insert([
            'region_id' => 1,
            'locale' => 'ar',
            'name' => 'غير محدد'
        ]);
    }
}
