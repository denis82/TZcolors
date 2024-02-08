<?php

namespace App\Layers\Presentation\Controllers\Colors;

use Illuminate\Http\Request;
use App\Layers\UseCase\Colors\GetAllFilesUseCase;
use App\Layers\Presentation\View\Colors\FilesView;
use App\Layers\Presentation\Controllers\Controller;


class GetFilesController extends Controller
{

    private FilesView $_filesView;
    private GetAllFilesUseCase $_getAllFilesUseCase;

    public function __construct(
        FilesView $filesView,
        GetAllFilesUseCase $getAllFilesUseCase
    ) {
        $this->_filesView = $filesView;
        $this->_getAllFilesUseCase = $getAllFilesUseCase;
    }

    public function index(Request $request)
    {
        $files = $this->_filesView->toArray(
            $this->_getAllFilesUseCase->getAll()
        );
        return view('index', ['files' => $files]);
    }
}
