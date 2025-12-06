<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AttachmentController extends Controller
{
    public function show($path)
    {
        // Ensure the user is authenticated (handled by middleware in route, but good to be safe)
        if (!auth()->check()) {
            abort(403, 'Unauthorized');
        }

        // Check if file exists in the local (private) disk
        if (!Storage::disk('local')->exists($path)) {
            abort(404);
        }

        // Return the file securely
        return Storage::disk('local')->response($path);
    }
}
