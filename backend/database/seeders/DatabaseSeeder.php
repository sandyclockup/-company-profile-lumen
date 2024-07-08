<?php

/**
 * This file is part of the Sandy Andryanto Company Profile Website.
 *
 * @author     Sandy Andryanto <sandy.andryanto.dev@gmail.com>
 * @copyright  2024
 *
 * For the full copyright and license information,
 * please view the LICENSE.md file that was distributed
 * with this source code.
 */

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Faq;
use App\Models\Portfolio;
use App\Models\Reference;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Testimonial;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->command->warn('Begin instalation, please wait for a minute...');
        User::InitialCreate();
        Reference::InitialCreate();
        Contact::InitialCreate();
        Customer::InitialCreate();
        Faq::InitialCreate();
        Service::InitialCreate();
        Slider::InitialCreate();
        Team::InitialCreate();
        Testimonial::InitialCreate();
        Portfolio::InitialCreate();
        Article::InitialCreate();
        $this->command->warn('Your application has been instaled :)');
    }


}
