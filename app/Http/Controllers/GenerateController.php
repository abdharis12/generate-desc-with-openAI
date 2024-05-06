<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class GenerateController extends Controller
{
    public function index(Request $request)
    {
        $system_prompt = "generate description personal info:
        title: $request->title
        subtitle: $request->subtitle
        designation: $request->designation

        Only answer with a description of your personal info.";

        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => $system_prompt],
                ['role' => 'user', 'content' => 'Hello!'],
            ],
        ]);

        $data = $result->choices[0]->message->content;

        return $data;
    }
}
