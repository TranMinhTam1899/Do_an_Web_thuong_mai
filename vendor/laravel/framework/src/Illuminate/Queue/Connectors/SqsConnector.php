<?php

namespace Illuminate\Queue\Connectors;

use Aws\Sqs\SqsClient;
<<<<<<< HEAD
use Illuminate\Support\Arr;
use Illuminate\Queue\SqsQueue;
=======
use Illuminate\Queue\SqsQueue;
use Illuminate\Support\Arr;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

class SqsConnector implements ConnectorInterface
{
    /**
     * Establish a queue connection.
     *
     * @param  array  $config
     * @return \Illuminate\Contracts\Queue\Queue
     */
    public function connect(array $config)
    {
        $config = $this->getDefaultConfiguration($config);

        if (! empty($config['key']) && ! empty($config['secret'])) {
            $config['credentials'] = Arr::only($config, ['key', 'secret', 'token']);
        }

        return new SqsQueue(
            new SqsClient($config), $config['queue'], $config['prefix'] ?? ''
        );
    }

    /**
     * Get the default configuration for SQS.
     *
     * @param  array  $config
     * @return array
     */
    protected function getDefaultConfiguration(array $config)
    {
        return array_merge([
            'version' => 'latest',
            'http' => [
                'timeout' => 60,
                'connect_timeout' => 60,
            ],
        ], $config);
    }
}
