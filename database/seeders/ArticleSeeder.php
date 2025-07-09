<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $admin = User::where('role', 'admin')->first();

        $articles = [
            [
                'title' => 'Welcome to Our News Website',
                'content' => 'This is our first article on the new news website. We are excited to share the latest news and updates with you. Stay tuned for more interesting articles and breaking news stories.',
                'published' => true,
            ],
            [
                'title' => 'Technology Trends in 2024',
                'content' => 'The technology landscape is rapidly evolving. In this article, we explore the latest trends that are shaping the future of technology, including artificial intelligence, machine learning, and blockchain technology.',
                'published' => true,
            ],
            [
                'title' => 'Climate Change and Environmental Impact',
                'content' => 'Climate change continues to be one of the most pressing issues of our time. This article discusses the latest research on environmental impact and what we can do to make a difference.',
                'published' => true,
            ],
            [
                'title' => 'Sports Update: Championship Results',
                'content' => 'Get the latest updates from the championship games. Our sports team covers all the action, scores, and highlights from the most exciting matches of the season.',
                'published' => true,
            ],
            [
                'title' => 'Health and Wellness Tips',
                'content' => 'Maintaining good health is essential for a happy life. In this article, we share practical tips and advice for staying healthy and maintaining wellness in your daily routine.',
                'published' => true,
            ],
            [
                'title' => 'Economic Outlook for Next Quarter',
                'content' => 'Our economic analysts provide insights into the market trends and economic outlook for the upcoming quarter. Learn about investment opportunities and market predictions.',
                'published' => true,
            ],
            [
                'title' => 'Draft Article - Not Published',
                'content' => 'This is a draft article that has not been published yet. It will not appear on the public website until it is marked as published.',
                'published' => false,
            ],
        ];

        foreach ($articles as $articleData) {
            Article::create([
                'title' => $articleData['title'],
                'content' => $articleData['content'],
                'published' => $articleData['published'],
                'user_id' => $admin->id,
            ]);
        }
    }
}