<?php

namespace NutriScore\Services;

use NutriScore\DataMappers\FileMapper;
use NutriScore\DataMappers\UserMapper;
use NutriScore\Models\File\File;
use NutriScore\Models\File\FileType;
use NutriScore\Validators\FileValidator;
use NutriScore\Validators\ValidationObject;

final class FileService {
    public function __construct(
        private readonly FileMapper $fileMapper,
        private readonly UserMapper $userMapper,
        private readonly FileValidator $validator,
    ) { }

    public function findAllByIds(array $ids): array {
        return $this->fileMapper->loadAllByIds($ids);
    }

    public function findProfileImageByUserId(int $userId): ?File {
        $profileImageId = $this->userMapper->loadById($userId)->getProfileImageId();
        return ($profileImageId != null) ? $this->fileMapper->loadById($profileImageId) : null;
    }

    public function save(?array $file, ?string $text = 'Uploaded File', int $existingImageId = null): ValidationObject {
        $fileData = array_merge($file, ['text' => $text]);
        $this->validator->validate($fileData);

        if ($this->validator->isValid()) {
            $fileName = $this->createUniqueFilename($fileData['name']);
            $absolutePath = APP_IMAGE_UPLOAD_DIR . DIRECTORY_SEPARATOR . $this->createDateCodedPath();
            $relativePath = str_replace(APP_PUBLIC_DIR , '', $absolutePath);
            $uploadPath = $absolutePath . DIRECTORY_SEPARATOR . $fileName;

            if (!file_exists($absolutePath)) {
                mkdir($absolutePath, 0777, true);
            }

            if (!move_uploaded_file($fileData['tmp_name'], $uploadPath)) {
                $this->validator->getValidationObject()->addError('file', _('Failed to upload file'));
            } else {
                $data = [
                    'path' => $relativePath . DIRECTORY_SEPARATOR . $fileName,
                    'text' => $text,
                    'fileType' => FileType::IMAGE
                ];

                if ($existingImageId) {
                    $file = $this->fileMapper->loadById($existingImageId);
                    $this->fileMapper->delete($file);
                    $this->deleteFile($file);
                }

                $file = File::create($data);
                $this->fileMapper->save($file);

                $this->validator->getValidationObject()->setData($file);
            }
        } else {
            $this->validator->getValidationObject()->setData(File::create()); // TODO remove dummy file
        }

        return $this->validator->getValidationObject();
    }

    private function createDateCodedPath(): string {
        return str_replace('/', DIRECTORY_SEPARATOR, date('Y/m/d'));
    }

    private function createUniqueFilename(string $filename): string {
        $nameParts = explode('.', $filename);
        $namePart = $nameParts[0];

        $fileExt = end($nameParts);
        $time = time();
        $rand = rand(1234, 9876);

        return "$namePart-$time-$rand.$fileExt";
    }

    private function deleteFile(File $file): void {
        $absolutePath = APP_ROOT_DIR . $file->getPath();

        if (file_exists($absolutePath)) {
            unlink($absolutePath);
        }
    }

}