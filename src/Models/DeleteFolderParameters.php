<?php

declare(strict_types=1);

namespace Infisical\SDK\Models;

/**
 * Parameters for deleting a folder by ID or name
 */
class DeleteFolderParameters
{
    public function __construct(
        public readonly ?string $folderIdOrName = null,
        public readonly ?string $environment = null,
        public readonly ?string $projectId = null,
        public readonly ?string $path = null,
        public readonly ?bool $forceDelete = null,
    ) {
    }

    /**
     * Convert to array for HTTP request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $params = [];

        if ($this->environment !== null) {
            $params['environment'] = $this->environment;
        }

        if ($this->projectId !== null) {
            $params['projectId'] = $this->projectId;
        }

        if ($this->path !== null) {
            $params['path'] = $this->path;
        }

        if ($this->forceDelete !== null) {
            $params['forceDelete'] = $this->forceDelete;
        }

        return $params;
    }
}
