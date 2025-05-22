<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 个人介绍
        $profile = [
            'name' => '游戏币',
            'title' => 'PHP全栈开发工程师',
            'description' => '专注于 Web 应用开发和系统架构设计，擅长 PHP/Laravel 全栈开发，同时具备 Golang 开发经验。精通微信开发、小程序开发，熟悉 Vue.js、React 等前端框架。具备丰富的项目部署、性能优化和运维管理经验。',
            'image' => 'images/avatar.jpg'
        ];

        // 服务内容
        $services = [
            [
                'title' => 'Web 应用开发',
                'description' => '使用 PHP/Laravel 开发高性能、可扩展的 Web 应用，提供从需求分析到部署上线的全流程服务。',
                'items' => [
                    '企业级应用开发',
                    'API 接口开发',
                    '数据库设计与优化',
                    '系统架构设计'
                ]
            ],
            [
                'title' => '系统优化与维护',
                'description' => '提供专业的系统性能优化和维护服务，确保系统稳定高效运行。',
                'items' => [
                    '代码性能优化',
                    '数据库优化',
                    '缓存策略优化',
                    '系统监控维护'
                ]
            ],
            [
                'title' => '项目部署与运维',
                'description' => '提供专业的 PHP 项目部署和运维服务，包括环境搭建、部署上线和日常维护。',
                'items' => [
                    'LNMP环境搭建',
                    '项目部署上线',
                    '服务器维护',
                    '安全加固'
                ]
            ]
        ];

        // 技能展示
        $skills = [
            'development' => [
                [
                    'name' => 'PHP/Laravel',
                    'percentage' => 90
                ],
                [
                    'name' => 'MySQL/Redis',
                    'percentage' => 85
                ],
                [
                    'name' => '前端开发',
                    'percentage' => 75
                ],
                [
                    'name' => 'Golang',
                    'percentage' => 60
                ]
            ],
            'devops' => [
                [
                    'name' => 'LNMP环境搭建',
                    'percentage' => 90
                ],
                [
                    'name' => 'PHP项目部署',
                    'percentage' => 85
                ],
                [
                    'name' => '性能优化',
                    'percentage' => 80
                ],
                [
                    'name' => '服务器维护',
                    'percentage' => 85
                ]
            ]
        ];



        // 常见问题
        $faqs = [
            [
                'question' => '项目开发周期一般是多久？',
                'answer' => '项目周期取决于具体需求和规模。一般小型项目（如企业官网）2-4周，中型项目（如电商系统）1-3个月，大型项目（如企业级应用）3-6个月。我们会根据需求评估给出具体时间。'
            ],
            [
                'question' => '如何保证项目质量？',
                'answer' => '我们采用规范的开发流程：需求分析、技术方案设计、开发、测试、部署上线。每个阶段都有严格的代码审查和测试流程，确保代码质量和系统稳定性。'
            ],
            [
                'question' => '项目上线后提供哪些维护服务？',
                'answer' => '我们提供全面的维护服务：系统监控、性能优化、安全更新、bug修复、功能迭代等。同时提供7*24小时技术支持，确保系统稳定运行。'
            ],
            [
                'question' => '付款方式是什么？',
                'answer' => '我们采用 442 付款方式：项目启动时支付 40%，开发中期支付 40%，项目验收后支付 20%。所有款项都通过正规渠道支付，并提供发票。'
            ],
            [
                'question' => '开发过程中如何沟通？',
                'answer' => '我们提供多种沟通方式：每周固定例会、即时通讯工具（微信/钉钉）、项目管理平台。重要节点会提供详细的进度报告，确保项目透明可控。'
            ],
            [
                'question' => '项目交付包含哪些内容？',
                'answer' => '项目交付包含：完整的源代码、数据库设计文档、API文档、部署文档、使用手册、测试报告等。同时提供技术培训，确保客户能够顺利使用系统。'
            ],
            [
                'question' => '如何保证项目按时交付？',
                'answer' => '我们采用敏捷开发方法，将项目分解为多个迭代周期，每个周期都有明确的目标和交付物。通过定期评审和调整，确保项目按计划推进。'
            ],
            [
                'question' => '项目后期如何收费？',
                'answer' => '项目上线后，我们提供两种维护方案：1. 按次收费：根据具体需求提供技术支持；2. 包年服务：提供全面的维护和技术支持。具体费用根据项目规模和维护内容确定。'
            ]
        ];

        $contact = [
            'wechat' => 'o140445',
            'email' => 'o140445s@gmail.com',
            'github' => 'github.com/yourusername'
        ];

        //项目展示  3个
        $projects = Project::where('status', 'published')->limit(3)->get();


        return view('home', compact('profile', 'services', 'skills', 'projects', 'faqs', 'contact'));
    }
}
