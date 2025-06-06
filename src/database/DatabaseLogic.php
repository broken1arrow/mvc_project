<?php

namespace App\database;

use App\Controller\ControllPage;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DatabaseLogic
{
    private Request $request;
    private ControllPage $controller;

    function __construct(Request $request, ControllPage $controller)
    {
        $this->request = $request;
        $this->controller = $controller;
    }


    public function saveImage(): ?string
    {
        /**@var UploadedFile $uploadFile */
        $uploadFile = $this->request->files->get('image');
        if (!($uploadFile instanceof UploadedFile))
            return null;

        $destination = $this->controller->getParameter('kernel.project_dir') . '/public/uploads';
        if ($uploadFile->getSize() >= $uploadFile->getMaxFilesize())
            return null;

        $orginalFilename = pathinfo($uploadFile->getClientOriginalName(), PATHINFO_FILENAME);
        $newFilename = $orginalFilename . "_" . uniqid() . "." . $uploadFile->guessExtension();

        $uploadFile->move($destination, $newFilename);
        return $newFilename;
    }
}
