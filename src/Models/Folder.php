<?php

declare(strict_types=1);

namespace Infisical\SDK\Models;

/**
 * Represents a folder
 */
class Folder
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $envId,
        public readonly int $version,
        public readonly ?string $parentId,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly string $path,
        public readonly bool $isReserved,
        public readonly ?string $description,
        public readonly ?string $lastSecretModified,
    ) {
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'] ?? '',
            $data['name'] ?? '',
            $data['envId'] ?? '',
            $data['version'] ?? 0,
            $data['parentId'] ?? null,
            $data['createdAt'] ?? '',
            $data['updatedAt'] ?? '',
            $data['path'] ?? '',
            $data['isReserved'] ?? false,
            $data['description'] ?? null,
            $data['lastSecretModified'] ?? null,
        );
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
