<?php

declare(strict_types=1);

namespace OpenAI\Resources;

use Generator;
use OpenAI\Responses\Completions\CreateResponse;
use OpenAI\ValueObjects\Transporter\Payload;

final class Completions
{
    use Concerns\Transportable;

    /**
     * Creates a completion for the provided prompt and parameters
     *
     * @see https://beta.openai.com/docs/api-reference/completions/create-completion
     *
     * @param  array<string, mixed>  $parameters
     */
    public function create(array $parameters): CreateResponse|Generator
    {
        $payload = Payload::create('completions', $parameters);

        /** @var array{id: string, object: string, created: int, model: string, choices: array<int, array{text: string, index: int, logprobs: array{tokens: array<int, string>, token_logprobs: array<int, float>, top_logprobs: array<int, string>|null, text_offset: array<int, int>}|null, finish_reason: string}>, usage: array{prompt_tokens: int, completion_tokens: int, total_tokens: int}}|Generator $result */
        $result = $this->transporter->requestObject($payload, $parameters['stream'] ?? false);

        if (is_array($result)) {
            return CreateResponse::from($result);
        }

        return $this->stream($result);
    }

    private function stream(Generator $stream): Generator
    {
        foreach ($stream as $data) {
            yield CreateResponse::from($data);
        }
    }
}
