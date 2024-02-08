<?php

namespace App\Layers\Presentation\Controllers\Colors;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Layers\Domain\Colors\Dto\CreateFileDto;
use App\Layers\Presentation\View\Colors\FilesView;
use App\Layers\UseCase\Colors\CreateNewFileUseCase;
use App\Layers\Presentation\Controllers\Controller;
use App\Layers\Presentation\Requests\Colors\CreateFileRequest;



class CreateFilesController extends Controller
{

    private CreateNewFileUseCase $_createNewFileUseCase;

    public function __construct(CreateNewFileUseCase $createNewFileUseCase)
    {
        $this->_createNewFileUseCase = $createNewFileUseCase;
    }

    public function create(Request $request)
    {

        return view('create');
    }

    public function store(CreateFileRequest $createFileRequest)
    {
        $validated = $createFileRequest->validated();

        $createFileDto = new CreateFileDto(
            $validated[FilesView::FILE_NAME]
        );

        $this->_createNewFileUseCase->create($createFileDto);

        Session::flush('success', 'Запись дбавлена');
        return redirect()->route('index');
    }
}
