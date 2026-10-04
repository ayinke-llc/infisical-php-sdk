<?php

declare(strict_types=1);

namespace Infisical\SDK\Models;

/**
 * Parameters for creating a folder
 */
class CreateFolderParameters
{
    public function __construct(
        public readonly ?string $environment = null,
        public readonly ?string $projectId = null,
        public readonly ?string $name = null,
        public readonly ?string $path = null,
        public readonly ?string $description = null,
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

        if ($this->name !== null) {
            $params['name'] = $this->name;
        }

        if ($this->path !== null) {
            $params['path'] = $this->path;
        }

        if ($this->description !== null) {
            $params['description'] = $this->description;
        }

        return $params;
    }
}
