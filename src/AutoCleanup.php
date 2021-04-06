<?php

namespace GhostZero\TmiCluster;

use Exception;
use GhostZero\TmiCluster\Contracts\ChannelManager;

class AutoCleanup
{
    private Lock $lock;

    private ChannelManager $channelManager;

    public function __construct()
    {
        $this->lock = app(Lock::class);
        $this->channelManager = app(ChannelManager::class);
    }

    public static function shouldCleanup(): bool
    {
        return config('tmi-cluster.channel_manager.auto_cleanup.enabled');
    }

    public function register(TmiClusterClient $client)
    {
        $cleanupInterval = $this->getCleanupInterval();
        $client->log(sprintf('Register cleanup loop for every %s sec.', $cleanupInterval));
        $client->getTmiClient()->getLoop()->addPeriodicTimer($cleanupInterval, fn() => $this->handle($client));
    }

    private function handle(TmiClusterClient $client)
    {
        try {
            if (!$this->shouldCleanup()) {
                return;
            }

            $channels = $this->channelManager->absence($client->getTmiClient()->getChannels());

            foreach ($channels as $channel) {
                $client->getTmiClient()->part($channel);
            }

            $client->log(sprintf('Cleanup complete! Parted: %s', count($channels)));
        } catch (Exception $e) {
            $client->log($e->getTraceAsString());
        }
    }

    private function getCleanupInterval(): int
    {
        return config('tmi-cluster.channel_manager.auto_cleanup.interval', 300)
            + random_int(0, max(0, config('tmi-cluster.channel_manager.auto_cleanup.max_delay', 600)));
    }
}
