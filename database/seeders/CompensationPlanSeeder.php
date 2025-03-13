<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompensationPlan;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompensationPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $compensationPlans = [
            [
                "job_position_id" => 1,
                "extra_field" => [
                    [
                        "group" => [
                            "salary_grade_level" => [
                                [
                                    "level" => "1",
                                    "step_1" => "20,000",
                                    "step_2" => "21,000",
                                    "step_3" => "22,000",
                                    "step_4" => "23,000",
                                    "step_5" => "24,000",
                                    "step_6" => "25,000",
                                    "step_7" => "26,000",
                                    "step_8" => "27,000",
                                ],
                                [
                                    "level" => "2",
                                    "step_1" => "28,000",
                                    "step_2" => "29,000",
                                    "step_3" => "30,000",
                                    "step_4" => "31,000",
                                    "step_5" => "32,000",
                                    "step_6" => "33,000",
                                    "step_7" => "34,000",
                                    "step_8" => "35,000",
                                ],
                                [
                                    "level" => "3",
                                    "step_1" => "36,000",
                                    "step_2" => "37,000",
                                    "step_3" => "38,000",
                                    "step_4" => "39,000",
                                    "step_5" => "40,000",
                                    "step_6" => "41,000",
                                    "step_7" => "42,000",
                                    "step_8" => "43,000",
                                ],
                                [
                                    "level" => "4",
                                    "step_1" => "44,000",
                                    "step_2" => "45,000",
                                    "step_3" => "46,000",
                                    "step_4" => "47,000",
                                    "step_5" => "48,000",
                                    "step_6" => "49,000",
                                    "step_7" => "50,000",
                                    "step_8" => "51,000",
                                ],
                                [
                                    "level" => "5",
                                    "step_1" => "52,000",
                                    "step_2" => "53,000",
                                    "step_3" => "54,000",
                                    "step_4" => "55,000",
                                    "step_5" => "56,000",
                                    "step_6" => "57,000",
                                    "step_7" => "58,000",
                                    "step_8" => "60,000",
                                ],
                            ],
                            "basic_rate" => [
                                "basic_pay_range" => "20,000 - 35,000",
                                "daily_rate" => "667 - 1,167",
                                "hourly_rate" => "83.33",
                            ],
                            "payroll" => [
                                "basic_pay_range" => "20,000 - 35,000",
                                "rest_day_overtime_pay" => "866.64 - 1,166.64",
                                "regular_overtime_pay" => "833.33 - 1,250",
                                "allowances" => "1,000 - 2,500",
                                "bonuses" => "1,000 - 3,500",
                                "fringe_benefits" => "5,000 - 10,000",
                                "total_compensation_range" => "27,000 - 45,000"
                            ],
                            "benefits" => [
                                [
                                    "component" => "13th Month Pay",
                                    "details" => "Equivalent to one month's salary, paid at year-end."
                                ],
                                [
                                    "component" => "Performance-Based Bonuses",
                                    "details" => "5-10% of annual salary."
                                ],
                                [
                                    "component" => "Health Insurance",
                                    "details" => "PHP 2,000 - 5,000/month."
                                ],
                                [
                                    "component" => "Leave Benefits",
                                    "details" => "Paid sick leave and vacation days."
                                ],
                                [
                                    "component" => "Other allowances",
                                    "details" => "- Transportation Allowance: PHP 1,000 - PHP 2,500/month
                                                -Meal Allowance: PHP 1,000 - PHP 2,500/month"
                                ],
                            ]
                        ]
                    ]
                ]
            ],
            [
                "job_position_id" => 2,
                "extra_field" => [
                    [
                        "group" => [
                            "salary_grade_level" => [
                                [
                                    "level" => "1",
                                    "step_1" => "45,000",
                                    "step_2" => "48,000",
                                    "step_3" => "51,000",
                                    "step_4" => "54,000",
                                    "step_5" => "57,000",
                                    "step_6" => "60,000",
                                    "step_7" => "63,000",
                                    "step_8" => "66,000",
                                ],
                                [
                                    "level" => "2",
                                    "step_1" => "69,000",
                                    "step_2" => "72,000",
                                    "step_3" => "75,000",
                                    "step_4" => "78,000",
                                    "step_5" => "81,000",
                                    "step_6" => "84,000",
                                    "step_7" => "87,000",
                                    "step_8" => "90,000",
                                ],
                                [
                                    "level" => "3",
                                    "step_1" => "93,000",
                                    "step_2" => "96,000",
                                    "step_3" => "99,000",
                                    "step_4" => "102,000",
                                    "step_5" => "105,000",
                                    "step_6" => "108,000",
                                    "step_7" => "111,000",
                                    "step_8" => "114,000",
                                ],
                                [
                                    "level" => "4",
                                    "step_1" => "117,000",
                                    "step_2" => "120,000",
                                    "step_3" => "123,000",
                                    "step_4" => "126,000",
                                    "step_5" => "129,000",
                                    "step_6" => "132,000",
                                    "step_7" => "135,000",
                                    "step_8" => "138,000",
                                ],
                                [
                                    "level" => "5",
                                    "step_1" => "141,000",
                                    "step_2" => "144,000",
                                    "step_3" => "147,000",
                                    "step_4" => "150,000",
                                    "step_5" => "153,000",
                                    "step_6" => "156,000",
                                    "step_7" => "159,000",
                                    "step_8" => "162,000",
                                ],
                            ],
                            "basic_rate" => [
                                "basic_pay_range" => "45,000 - 80,000",
                                "daily_rate" => "1,500 - 2,667",
                                "hourly_rate" => "187.50",
                            ],
                            "payroll" => [
                                "basic_pay_range" => "45,000 - 80,000",
                                "rest_day_overtime_pay" => "1,950 - 2,699.32",
                                "regular_overtime_pay" => "1,875 - 2,500",
                                "allowances" => "3,000 - 5,000",
                                "bonuses" => "4,500 - 16,000",
                                "fringe_benefits" => "10,000 - 20,000",
                                "total_compensation_range" => "65,000 - 108,000"
                            ],
                            "benefits" => [
                                [
                                    "component" => "13th Month Pay",
                                    "details" => "Equivalent to one month's salary, paid at year-end."
                                ],
                                [
                                    "component" => "Performance-Based Bonuses",
                                    "details" => "10-20% of annual salary."
                                ],
                                [
                                    "component" => "Health Insurance",
                                    "details" => "PHP 5,000 - 10,000/month."
                                ],
                                [
                                    "component" => "Leave Benefits",
                                    "details" => "Paid sick leave and vacation days."
                                ],
                                [
                                    "component" => "Other allowances",
                                    "details" => "- Transportation Allowance: PHP 3,000 - PHP 5,000/month
                                                -Meal Allowance: PHP 3,000 - PHP 5,000/month"
                                ],
                            ]
                        ]
                    ]
                ]
            ],
            [
                "job_position_id" => 3,
                "extra_field" => [
                    [
                        "group" => [
                            "salary_grade_level" => [
                                [
                                    "level" => "1",
                                    "step_1" => "18,000",
                                    "step_2" => "19,000",
                                    "step_3" => "20,000",
                                    "step_4" => "21,000",
                                    "step_5" => "22,000",
                                    "step_6" => "23,000",
                                    "step_7" => "24,000",
                                    "step_8" => "25,000",
                                ],
                                [
                                    "level" => "2",
                                    "step_1" => "26,000",
                                    "step_2" => "27,000",
                                    "step_3" => "28,000",
                                    "step_4" => "29,000",
                                    "step_5" => "30,000",
                                    "step_6" => "31,000",
                                    "step_7" => "32,000",
                                    "step_8" => "33,000",
                                ],
                                [
                                    "level" => "3",
                                    "step_1" => "34,000",
                                    "step_2" => "35,000",
                                    "step_3" => "36,000",
                                    "step_4" => "37,000",
                                    "step_5" => "38,000",
                                    "step_6" => "39,000",
                                    "step_7" => "40,000",
                                    "step_8" => "41,000",
                                ],
                                [
                                    "level" => "4",
                                    "step_1" => "42,000",
                                    "step_2" => "43,000",
                                    "step_3" => "44,000",
                                    "step_4" => "45,000",
                                    "step_5" => "46,000",
                                    "step_6" => "47,000",
                                    "step_7" => "48,000",
                                    "step_8" => "49,000",
                                ],
                                [
                                    "level" => "5",
                                    "step_1" => "50,000",
                                    "step_2" => "51,000",
                                    "step_3" => "52,000",
                                    "step_4" => "53,000",
                                    "step_5" => "54,000",
                                    "step_6" => "55,000",
                                    "step_7" => "56,000",
                                    "step_8" => "57,000",
                                ],
                            ],
                            "basic_rate" => [
                                "basic_pay_range" => "18,000 - 30,000",
                                "daily_rate" => "600 - 1,000",
                                "hourly_rate" => "75",
                            ],
                            "payroll" => [
                                "basic_pay_range" => "18,000 - 30,000",
                                "rest_day_overtime_pay" => "780 - 1,300",
                                "regular_overtime_pay" => "750 - 1,250",
                                "allowances" => "1,000 - 2,000",
                                "bonuses" => "1,000 - 3,000",
                                "fringe_benefits" => "3,000 - 5,000",
                                "total_compensation_range" => "24,000 - 39,000"
                            ],
                            "benefits" => [
                                [
                                    "component" => "13th Month Pay",
                                    "details" => "Equivalent to one month's salary, paid at year-end."
                                ],
                                [
                                    "component" => "Performance-Based Bonuses",
                                    "details" => "5-10% of annual salary."
                                ],
                                [
                                    "component" => "Health Insurance",
                                    "details" => "PHP 1,500 - 3,000/month."
                                ],
                                [
                                    "component" => "Leave Benefits",
                                    "details" => "Paid sick leave and vacation days."
                                ],
                                [
                                    "component" => "Other allowances",
                                    "details" => "- Transportation Allowance: PHP 1,000 - PHP 2,000/month
                                                -Meal Allowance: PHP 1,000 - PHP 2,000/month"
                                ],
                            ]
                        ]
                    ]
                ]
            ],
            [
                "job_position_id" => 4,
                "extra_field" => [
                    [
                        "group" => [
                            "salary_grade_level" => [
                                [
                                    "level" => "1",
                                    "step_1" => "25,000",
                                    "step_2" => "26,000",
                                    "step_3" => "27,000",
                                    "step_4" => "28,000",
                                    "step_5" => "29,000",
                                    "step_6" => "30,000",
                                    "step_7" => "31,000",
                                    "step_8" => "32,000",
                                ],
                                [
                                    "level" => "2",
                                    "step_1" => "33,000",
                                    "step_2" => "34,000",
                                    "step_3" => "35,000",
                                    "step_4" => "36,000",
                                    "step_5" => "37,000",
                                    "step_6" => "38,000",
                                    "step_7" => "39,000",
                                    "step_8" => "40,000",
                                ],
                                [
                                    "level" => "3",
                                    "step_1" => "41,000",
                                    "step_2" => "42,000",
                                    "step_3" => "43,000",
                                    "step_4" => "44,000",
                                    "step_5" => "45,000",
                                    "step_6" => "46,000",
                                    "step_7" => "47,000",
                                    "step_8" => "48,000",
                                ],
                                [
                                    "level" => "4",
                                    "step_1" => "49,000",
                                    "step_2" => "50,000",
                                    "step_3" => "51,000",
                                    "step_4" => "52,000",
                                    "step_5" => "53,000",
                                    "step_6" => "54,000",
                                    "step_7" => "55,000",
                                    "step_8" => "56,000",
                                ],
                                [
                                    "level" => "5",
                                    "step_1" => "57,000",
                                    "step_2" => "58,000",
                                    "step_3" => "59,000",
                                    "step_4" => "60,000",
                                    "step_5" => "61,000",
                                    "step_6" => "62,000",
                                    "step_7" => "63,000",
                                    "step_8" => "64,000",
                                ],
                            ],
                            "basic_rate" => [
                                "basic_pay_range" => "25,000 - 40,000",
                                "daily_rate" => "833 - 1,333",
                                "hourly_rate" => "104.17",
                            ],
                            "payroll" => [
                                "basic_pay_range" => "25,000 - 40,000",
                                "rest_day_overtime_pay" => "1,083.20 - 1,733.33",
                                "regular_overtime_pay" => "1,041.67 - 1,666.67",
                                "allowances" => "1,250 - 4,000",
                                "bonuses" => "2,000 - 3,500",
                                "fringe_benefits" => "5,000 - 10,000",
                                "total_compensation_range" => "34,000 - 56,500"
                            ],
                            "benefits" => [
                                [
                                    "component" => "13th Month Pay",
                                    "details" => "Equivalent to one month's salary, paid at year-end."
                                ],
                                [
                                    "component" => "Performance-Based Bonuses",
                                    "details" => "5-10% of annual salary."
                                ],
                                [
                                    "component" => "Health Insurance",
                                    "details" => "PHP 2,500 - 5,000/month."
                                ],
                                [
                                    "component" => "Leave Benefits",
                                    "details" => "Paid sick leave and vacation days."
                                ],
                                [
                                    "component" => "Other allowances",
                                    "details" => "- Transportation Allowance: PHP 2,000 - PHP 3,500/month
                                                -Meal Allowance: PHP 2,000 - PHP 3,500/month"
                                ],
                            ]
                        ]
                    ]
                ]
            ],
            [
                "job_position_id" => 5,
                "extra_field" => [
                    [
                        "group" => [
                            "salary_grade_level" => [
                                [
                                    "level" => "1",
                                    "step_1" => "25,000",
                                    "step_2" => "26,000",
                                    "step_3" => "27,000",
                                    "step_4" => "28,000",
                                    "step_5" => "29,000",
                                    "step_6" => "30,000",
                                    "step_7" => "31,000",
                                    "step_8" => "32,000",
                                ],
                                [
                                    "level" => "2",
                                    "step_1" => "33,000",
                                    "step_2" => "34,000",
                                    "step_3" => "35,000",
                                    "step_4" => "36,000",
                                    "step_5" => "37,000",
                                    "step_6" => "38,000",
                                    "step_7" => "39,000",
                                    "step_8" => "40,000",
                                ],
                                [
                                    "level" => "3",
                                    "step_1" => "41,000",
                                    "step_2" => "42,000",
                                    "step_3" => "43,000",
                                    "step_4" => "44,000",
                                    "step_5" => "45,000",
                                    "step_6" => "46,000",
                                    "step_7" => "47,000",
                                    "step_8" => "48,000",
                                ],
                                [
                                    "level" => "4",
                                    "step_1" => "49,000",
                                    "step_2" => "50,000",
                                    "step_3" => "51,000",
                                    "step_4" => "52,000",
                                    "step_5" => "53,000",
                                    "step_6" => "54,000",
                                    "step_7" => "55,000",
                                    "step_8" => "56,000",
                                ],
                                [
                                    "level" => "5",
                                    "step_1" => "57,000",
                                    "step_2" => "58,000",
                                    "step_3" => "59,000",
                                    "step_4" => "60,000",
                                    "step_5" => "61,000",
                                    "step_6" => "62,000",
                                    "step_7" => "63,000",
                                    "step_8" => "64,000",
                                ],
                            ],
                            "basic_rate" => [
                                "basic_pay_range" => "25,000 - 45,000",
                                "daily_rate" => "833 - 1,500",
                                "hourly_rate" => "104.17",
                            ],
                            "payroll" => [
                                "basic_pay_range" => "25,000 - 45,000",
                                "rest_day_overtime_pay" => "1,083.20 - 1,500",
                                "regular_overtime_pay" => "1,041.67 - 1,500",
                                "allowances" => "2,000 - 4,000",
                                "bonuses" => "1,250 - 4,500",
                                "fringe_benefits" => "5,500 - 10,000",
                                "total_compensation_range" => "36,500 - 63,000"
                            ],
                            "benefits" => [
                                [
                                    "component" => "13th Month Pay",
                                    "details" => "Equivalent to one month's salary, paid at year-end."
                                ],
                                [
                                    "component" => "Performance-Based Bonuses",
                                    "details" => "5-10% of annual salary."
                                ],
                                [
                                    "component" => "Health Insurance",
                                    "details" => "PHP 3,000 - 6,000/month."
                                ],
                                [
                                    "component" => "Leave Benefits",
                                    "details" => "Paid sick leave and vacation days."
                                ],
                                [
                                    "component" => "Other allowances",
                                    "details" => "- Transportation Allowance: PHP 2,000 - PHP 4,000/month
                                                -Meal Allowance: PHP 2,000 - PHP 4,000/month"
                                ],
                            ]
                        ]
                    ]
                ]
            ],
        ];

        foreach ($compensationPlans as $compensationPlan) {
            CompensationPlan::updateOrCreate(["job_position_id" => $compensationPlan['job_position_id']], $compensationPlan);
        }
    }
}
