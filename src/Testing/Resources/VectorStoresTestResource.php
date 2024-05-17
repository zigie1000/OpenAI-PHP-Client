<?php

namespace OpenAI\Testing\Resources;

use OpenAI\Contracts\Resources\VectorStoresContract;
use OpenAI\Resources\VectorStores;
use OpenAI\Responses\VectorStores\VectorStoreDeleteResponse;
use OpenAI\Responses\VectorStores\VectorStoreListResponse;
use OpenAI\Responses\VectorStores\VectorStoreResponse;
use OpenAI\Testing\Resources\Concerns\Testable;

final class VectorStoresTestResource implements VectorStoresContract
{
    use Testable;

    public function resource(): string
    {
        return VectorStores::class;
    }

    public function modify(string $vectorStore, array $parameters): VectorStoreResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function retrieve(string $vectorStore): VectorStoreResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function delete(string $vectorStore): VectorStoreDeleteResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function create(array $parameters): VectorStoreResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function list(): VectorStoreListResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
