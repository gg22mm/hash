<?php

declare(strict_types=1);

namespace Wll\Hash;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
            ],
            'commands' => [
            ],
            'listeners' => [],
            // 合并到  config/autoload/annotations.php 文件
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'hashing',
                    'description' => 'hashing-bcrypt',
                    'source' => __DIR__ . '/../publish/hashing.php',
                    'destination' => BASE_PATH . '/config/autoload/hashing.php',
                ],
            ],
        ];
    }
}
