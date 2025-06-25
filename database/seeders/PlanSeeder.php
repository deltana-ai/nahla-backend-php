<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'label' => 'عادي',
                'title' => 'الباقة الأساسية',
                'monthly_price' => '99',
                'yearly_price' => '900',
                'features' => [
                    ['text' => 'منتجات غير محدودة', 'enabled' => true],
                    ['text' => 'دعم فني على مدار الساعة', 'enabled' => true],
                    ['text' => 'تطبيق مخصص', 'enabled' => false],
                    ['text' => 'لوحة تحكم متقدمة', 'enabled' => false],
                ],
            ],
            [
                'label' => 'الأفضل',
                'title' => 'الباقة الاحترافية',
                'monthly_price' => '199',
                'yearly_price' => '1800',
                'features' => [
                    ['text' => 'منتجات غير محدودة', 'enabled' => true],
                    ['text' => 'دعم فني على مدار الساعة', 'enabled' => true],
                    ['text' => 'تطبيق مخصص', 'enabled' => true],
                    ['text' => 'لوحة تحكم متقدمة', 'enabled' => true],
                ],
            ],
            [
                'label' => 'مميز',
                'title' => 'الباقة المتقدمة',
                'monthly_price' => '149',
                'yearly_price' => '1400',
                'features' => [
                    ['text' => 'منتجات غير محدودة', 'enabled' => true],
                    ['text' => 'دعم فني على مدار الساعة', 'enabled' => true],
                    ['text' => 'تطبيق مخصص', 'enabled' => true],
                    ['text' => 'لوحة تحكم متقدمة', 'enabled' => false],
                ],
            ],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
