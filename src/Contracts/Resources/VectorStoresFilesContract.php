<?php

namespace OpenAI\Contracts\Resources;

use OpenAI\Resources\VectorStoresFiles;
use OpenAI\Responses\VectorStores\Files\VectorStoreFileDeleteResponse;
use OpenAI\Responses\VectorStores\Files\VectorStoreFileListResponse;
use OpenAI\Responses\VectorStores\Files\VectorStoreFileResponse;
use OpenAI\ValueObjects\Transporter\Payload;
use OpenAI\ValueObjects\Transporter\Response;

interface VectorStoresFilesContract
{

    /**
     * Retrieves a file within a vector store.
     *
     * @see https://platform.openai.com/docs/api-reference/vector-stores-files/getFile
     */
    public function retrieve(string $vectorStoreId, string $fileId): VectorStoreFileResponse;

    /**
     * Delete a file within a vector store.
     *
     * https://platform.openai.com/docs/api-reference/vector-stores/delete
     */
    public function delete(string $vectorStoreId, string $fileId): VectorStoreFileDeleteResponse;

    /**
     * Create a file on a vector store
     *
     * @see https://platform.openai.com/docs/api-reference/vector-stores-files/createFile
     *
     * @param  array<string, mixed>  $parameters
     */
    public function create(string $vectorStoreId, array $parameters): VectorStoreFileResponse;

    /**
     * Returns a list of files within a vector store.
     *
     * @see https://platform.openai.com/docs/api-reference/vector-stores-files/listFiles
     */
    public function list(string $vectorStoreId): VectorStoreFileListResponse;
}
