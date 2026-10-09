<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General Group
            ['key' => 'company_name', 'value' => 'MONOCORP', 'group' => 'general', 'label' => 'Company Name'],
            ['key' => 'tagline', 'value' => 'Architectural Digital Engineering & Modern Systems', 'group' => 'general', 'label' => 'Tagline'],
            ['key' => 'hero_heading', 'value' => 'Precision Engineering for High-Velocity Digital Products', 'group' => 'general', 'label' => 'Hero Heading'],
            ['key' => 'hero_subheading', 'value' => 'We design, engineer, and deploy high-performance web systems, cloud architectures, and scalable APIs with zero unnecessary abstractions.', 'group' => 'general', 'label' => 'Hero Subheading'],
            
            // About Group
            ['key' => 'about_story', 'value' => 'Founded by seasoned software engineers, MONOCORP is an independent engineering agency specializing in high-throughput backends, resilient cloud topologies, and minimalist user interfaces. We reject bloated software patterns in favor of sharp, single-responsibility architectures that perform reliably under heavy production load.', 'group' => 'about', 'label' => 'Company Story'],
            ['key' => 'about_vision', 'value' => 'To be the benchmark for architectural integrity and minimalist digital craftsmanship across modern enterprise software.', 'group' => 'about', 'label' => 'Vision Statement'],
            ['key' => 'about_mission', 'value' => 'Deliver high-performance, fault-tolerant digital systems through strict engineering discipline, atomic architecture, and zero-compromise execution.', 'group' => 'about', 'label' => 'Mission Statement'],
            ['key' => 'about_methodology', 'value' => 'Our 4-stage engineering lifecycle: 01 Discovery & Specifications -> 02 Semantic Architecture -> 03 Atomic Implementation -> 04 Containerized Deployment.', 'group' => 'about', 'label' => 'Methodology Overview'],

            // Stats
            ['key' => 'stat_projects', 'value' => '150+', 'group' => 'stats', 'label' => 'Projects Delivered'],
            ['key' => 'stat_uptime', 'value' => '99.98%', 'group' => 'stats', 'label' => 'Uptime SLA Target'],
            ['key' => 'stat_experience', 'value' => '10+ Yrs', 'group' => 'stats', 'label' => 'Engineering Experience'],
            ['key' => 'stat_retention', 'value' => '98%', 'group' => 'stats', 'label' => 'Client Retention Rate'],

            // Contact & Social
            ['key' => 'contact_email', 'value' => 'engineering@monocorp.agency', 'group' => 'contact', 'label' => 'Contact Email'],
            ['key' => 'contact_phone', 'value' => '+1 (555) 234-5678', 'group' => 'contact', 'label' => 'Contact Phone'],
            ['key' => 'office_address', 'value' => '500 Howard Street, Suite 400, San Francisco, CA 94105', 'group' => 'contact', 'label' => 'Office Address'],
            ['key' => 'working_hours', 'value' => 'Monday - Friday, 09:00 - 18:00 UTC', 'group' => 'contact', 'label' => 'Working Hours'],
            ['key' => 'github_url', 'value' => 'https://github.com/mwdharmaaa', 'group' => 'social', 'label' => 'GitHub URL'],
            ['key' => 'twitter_url', 'value' => 'https://x.com', 'group' => 'social', 'label' => 'Twitter/X URL'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com', 'group' => 'social', 'label' => 'LinkedIn URL'],
        ];

        foreach ($settings as $setting) {
            CompanySetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
