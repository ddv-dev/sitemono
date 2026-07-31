<?php
// app/Http/Controllers/FaqController.php

namespace App\Http\Controllers;

use App\Services\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $faqService;

    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    /**
     * Страница всех FAQ
     */
    public function index()
    {
        $themes = $this->faqService->getThemes();
        return view('faq', compact('themes'));
    }

    /**
     * Получить FAQ по теме (для AJAX)
     */
    public function getByTheme(Request $request)
    {
        $slug = $request->input('theme');
        
        if (!$slug) {
            return response()->json([
                'success' => false,
                'message' => 'Тема не указана'
            ], 400);
        }

        $theme = $this->faqService->getThemeBySlug($slug);
        
        if (!$theme) {
            return response()->json([
                'success' => false,
                'message' => 'Тема не найдена'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'theme' => $theme->name,
                'faqs' => $theme->activeFaqs
            ]
        ]);
    }

    /**
     * Получить все FAQ (для AJAX)
     */
    public function getAll()
    {
        $faqs = $this->faqService->getAllFaqs();
        
        return response()->json([
            'success' => true,
            'data' => $faqs
        ]);
    }
}