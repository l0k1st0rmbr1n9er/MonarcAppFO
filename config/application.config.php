<?php
/**
 * Configuration file generated by ZFTool
 * The previous configuration file is stored in application.config.old
 *
 * @see https://github.com/zendframework/ZFTool
 */
$env = getenv('APP_ENV') ?: 'dev';
$appConfDir = getenv('APP_CONF_DIR') ?? '';

$confPaths = ['config/autoload/{,*.}{global,local}.php'];
$dataPath = 'data';
if (!empty($appConfDir)) {
    $confPaths[] = $appConfDir . '/local.php';
    $dataPath = $appConfDir . '/data';
    if (!is_dir($dataPath . '/cache')) {
        if (!mkdir($concurrentDirectory = $dataPath . '/cache') && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
    }
}

return [
    'modules' => [
        'Monarc\Core',
        'Monarc\FrontOffice',
        'Zend\Cache',
        'Zend\Form',
        'Zend\InputFilter',
        'Zend\Filter',
        'Zend\Paginator',
        'Zend\Hydrator',
        'Zend\Di',
        'Zend\Router',
        'Zend\Validator',
        'DoctrineModule',
        'DoctrineORMModule',
    ],
    'module_listener_options' => [
        'module_paths' => [
            './module',
            './vendor'
        ],
        'config_glob_paths' => $confPaths,
        'config_cache_enabled' => $env === 'production',
        'config_cache_key' => 'c8aaaaa11586f8b1bf5565cc6064e70a', // md5('config_cache_key_monarc')
        'module_map_cache_enabled' => $env === 'production',
        'module_map_cache_key' => '664579376c4dcdcaa0bcdd0f7e7bf25b', // md5('module_map_cache_key_monarc'),
        'cache_dir' => $dataPath . '/cache/',
        'check_dependencies' => $env !== 'production',
    ],
];
