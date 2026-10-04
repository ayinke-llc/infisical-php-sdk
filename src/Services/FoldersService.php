<?php

declare(strict_types=1);

namespace Infisical\SDK\Services;

use Infisical\SDK\Http\HttpClient;
use Infisical\SDK\Models\CreateFolderParameters;
use Infisical\SDK\Models\DeleteFolderParameters;
use Infisical\SDK\Models\Folder;

/**
 * Service for managing folders
 */
class FoldersService
{
    private HttpClient $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create(?CreateFolderParameters $parameters = null): Folder
    {
        if ($parameters?->name === null) {
            throw new \InvalidArgumentException('name is required');
        }

        $response = $this->httpClient->post('/api/v2/folders', $parameters->toArray());
        $responseData = json_decode($response->getBody()->getContents(), true);

        return Folder::fromArray($responseData['folder'] ?? []);
    }

    public function delete(?DeleteFolderParameters $parameters = null): Folder
    {
        if ($parameters?->folderIdOrName === null) {
            throw new \InvalidArgumentException('folderIdOrName is required');
        }

        $response = $this->httpClient->delete('/api/v2/folders/' . rawurlencode($parameters->folderIdOrName), $parameters->toArray());
        $responseData = json_decode($response->getBody()->getContents(), true);

        return Folder::fromArray($responseData['folder'] ?? []);
    }
}
