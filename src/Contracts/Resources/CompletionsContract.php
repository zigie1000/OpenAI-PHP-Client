<?php

namespace OpenAI\Contracts\Resources;

use OpenAI\Exceptions\OpenAIThrowable;
use OpenAI\Responses\Completions\CreateResponse;
use OpenAI\Responses\Completions\CreateStreamedResponse;
use OpenAI\Responses\StreamResponse;

interface CompletionsContract
{
    /**
     * Creates a completion for the provided prompt and parameters
     *
     * @see https://platform.openai.com/docs/api-reference/completions/create-completion
     *
     * @param  array<string, mixed>  $parameters
     *
     * @throws OpenAIThrowable
     */
    public function create(array $parameters): CreateResponse;

    /**
     * Creates a streamed completion for the provided prompt and parameters
     *
     * @see https://platform.openai.com/docs/api-reference/completions/create-completion
     *
     * @param  array<string, mixed>  $parameters
     * @return StreamResponse<CreateStreamedResponse>
     *
     * @throws OpenAIThrowable
     */
    public function createStreamed(array $parameters): StreamResponse;
}
