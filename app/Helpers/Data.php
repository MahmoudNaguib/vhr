<?php
function insertDefaultConfigs() {
    $logo = resizeImage(public_path() . '/images/logo/logo.png', ['large' => 'resize,300x300', 'small' => 'resize,200x200']);
    $rows = [];
    ///////////////// Logo
    $rows = [
        [
            'field' => 'app_name',
            'value' => env('APP_NAME'),
            'created_by' => 1
        ],
        [
            'field' => 'contact_email',
            'value' => env('CONTACT_EMAIL'),
            'created_by' => 1
        ],
        [
            'field' => 'facebook',
            'value' => env('FACEBOOK'),
            'created_by' => 1
        ],
        [
            'field' => 'twitter',
            'value' => env('TWITTER'),
            'created_by' => 1
        ],
        [
            'field' => 'linkedin',
            'value' => env('LINKEDIN'),
            'created_by' => 1
        ],
        [
            'field' => 'youtube',
            'value' => env('YOUTUBE'),
            'created_by' => 1
        ],
        [
            'field' => 'about',
            'value' => 'about page content',
            'created_by' => 1
        ],
        [
            'field' => 'logo',
            'value' => $logo,
            'created_by' => 1
        ],
    ];
    \DB::table('configs')->insert($rows);
}

function insertDefaultUsers() {
    $users = [];
    $adminUser = [
        'type' => 'admin',
        'role_id' => 1,
        'company_id' => null,
        'is_company_admin' => 0,
        'name' => 'Admin',
        'email' => 'admin@demo.com',
        'token' => generateToken('admin@demo.com'),
        'mobile' => '0122' . rand(1000000, 9999999),
        'password' => bcrypt('demo@12345'),
        'confirmed' => 1,
        'is_active' => 1,
        'is_verified'=>0,
        'created_by' => 1,
        'image' => resizeImage(public_path() . '/images/users/avatar.png', \App\Models\User::$attachFields['image']['sizes']),
        'country_id' => 62,
        'completed_profile'=>1
    ];
    $recruiterUser = [
        'type' => 'recruiter',
        'role_id' => null,
        'company_id' => 1,
        'is_company_admin' => 1,
        'name' => 'Recruiter',
        'email' => 'recruiter@demo.com',
        'token' => generateToken('recruiter@demo.com'),
        'mobile' => '0122' . rand(1000000, 9999999),
        'password' => bcrypt('demo@12345'),
        'confirmed' => 1,
        'is_active' => 1,
        'is_verified'=>1,
        'created_by' => 1,
        'image' => resizeImage(public_path() . '/images/users/avatar.png', \App\Models\User::$attachFields['image']['sizes']),
        'country_id' => 62,
        'completed_profile'=>1
    ];
    $employeeUser = [
        'type' => 'employee',
        'role_id' => null,
        'company_id' => null,
        'is_company_admin' => 0,
        'name' => 'Employee',
        'email' => 'employee@demo.com',
        'token' => generateToken('employee@demo.com'),
        'mobile' => '0122' . rand(1000000, 9999999),
        'password' => bcrypt('demo@12345'),
        'confirmed' => 1,
        'is_active' => 1,
        'is_verified'=>0,
        'created_by' => 1,
        'image' => resizeImage(public_path() . '/images/users/avatar.png', \App\Models\User::$attachFields['image']['sizes']),
        'country_id' => 62,
        'completed_profile'=>1
    ];
    $users = [
        $adminUser,
        $recruiterUser,
        $employeeUser
    ];
    \DB::table('users')->insert($users);
}

function permissions() {
    $all = [];
    foreach (config('modules') as $key => $value) {
        foreach ($value as $permission)
            $all[] = $permission;
    }
    return $all;
}

function insertDefaultRoles() {
    $rows = [
        [
            'id' => 1,
            'title' => 'Super Administrator',
            'permissions' => json_encode(permissions()),
            'is_default' => 1,
            'created_by' => 1,
        ],
        [
            'id' => 2,
            'title' => 'Administrators',
            'permissions' => json_encode(permissions()),
            'is_default' => 0,
            'created_by' => 1,
        ]
    ];
    \DB::table('roles')->insert($rows);
}

function insertDefaultCompanies() {
    $rows = [
        [
            'id' => 1,
            'title' => 'Company 1',
            'plan_id'=>1,
            'expiry_date'=>date('Y-m-d', strtotime(date('Y-m-d') . ' +1 year')),
            'industry_id' => 1,
            'country_id' => 62,
            'city' => 'Cairo',
            'address' => 'Full Address',
            'website' => 'https://company1.com',
            'linkedin' => 'https://linkedin.com',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'image' => resizeImage(public_path() . '/images/companies/' . rand(1, 3) . '.png', \App\Models\Company::$attachFields['image']['sizes']),
            'commercial_registry' => 'commercial_registry.png',
            'tax_id_card' => 'tax_id_card.png',
        ],
    ];
    \DB::table('companies')->insert($rows);
}

function insertDefaultCountries() {
    $countries = file_get_contents(resource_path() . '/countries.json');
    $countries = json_decode($countries, true);
    $rows = [];
    if ($countries) {
        foreach ($countries as $country) {
            $rows[] = [
                'code' => $country['code'],
                'title' => $country['name'],
                'created_by' => 1
            ];
        }
    }
    \DB::table('countries')->insert($rows);
}

function insertDefaultIndustries() {
    $rows = [
        [
            'id' => 1,
            'title' => 'Telecom',
            'created_by' => 1,
        ],
        [
            'id' => 2,
            'title' => 'Medical',
            'created_by' => 1,
        ],
        [
            'id' => 3,
            'title' => 'Transportation',
            'created_by' => 1,
        ],
        [
            'id' => 4,
            'title' => 'Advertising',
            'created_by' => 1,
        ],
        [
            'id' => 5,
            'title' => 'Agriculture',
            'created_by' => 1,
        ],
        [
            'id' => 6,
            'title' => 'Communications',
            'created_by' => 1,
        ],
        [
            'id' => 7,
            'title' => 'Construction',
            'created_by' => 1,
        ],
        [
            'id' => 8,
            'title' => 'Education',
            'created_by' => 1,
        ],
        [
            'id' => 9,
            'title' => 'Fashion',
            'created_by' => 1,
        ],
        [
            'id' => 10,
            'title' => 'Finance',
            'created_by' => 1,
        ],
        [
            'id' => 11,
            'title' => 'Food',
            'created_by' => 1,
        ],
        [
            'id' => 12,
            'title' => 'Hospitality',
            'created_by' => 1,
        ],
        [
            'id' => 13,
            'title' => 'Infrastructure',
            'created_by' => 1,
        ],
        [
            'id' => 14,
            'title' => 'IT/Software',
            'created_by' => 1,
        ],
        [
            'id' => 15,
            'title' => 'Manufacturing',
            'created_by' => 1,
        ],
        [
            'id' => 16,
            'title' => 'Retail',
            'created_by' => 1,
        ],
    ];
    \DB::table('industries')->insert($rows);
}
function insertDefaultPlans() {
    $rows = [
        [
            'id' => 1,
            'title' => 'Free Annual',
            'users_count'=>1,
            'unlock_count'=>5,
            'posts_count'=>1,
            'duration_in_month'=>12,
            'price'=>0,
            'created_by' => 1,
        ],
        [
            'id' => 2,
            'title' => 'Basic monthly',
            'users_count'=>5,
            'unlock_count'=>20,
            'posts_count'=>5,
            'duration_in_month'=>1,
            'price'=>10,
            'created_by' => 1,
        ],
        [
            'id' => 3,
            'title' => 'Basic annual',
            'users_count'=>10,
            'unlock_count'=>300,
            'posts_count'=>50,
            'duration_in_month'=>12,
            'price'=>100,
            'created_by' => 1,
        ],
        [
            'id' => 4,
            'title' => 'Silver monthly',
            'users_count'=>10,
            'unlock_count'=>50,
            'posts_count'=>10,
            'duration_in_month'=>12,
            'price'=>15,
            'created_by' => 1,
        ],
        [
            'id' => 5,
            'title' => 'Silver annual',
            'users_count'=>20,
            'unlock_count'=>700,
            'posts_count'=>150,
            'duration_in_month'=>1,
            'price'=>150,
            'created_by' => 1,
        ],
    ];
    \DB::table('plans')->insert($rows);
}
