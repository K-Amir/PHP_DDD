<?php

namespace Main\Infrastructure\Config;

use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use MongoDB\Client;

class MongoDbConfiguration
{
    private DocumentManager $dm;
    private string $uri = 'mongodb+srv://admin:admin@cluster0.liw9r.mongodb.net/?retryWrites=true&w=majority';

    public function __construct()
    {
        $config = new Configuration();
        $config->setHydratorDir(__DIR__ . '/Hydrators');
        $config->setHydratorNamespace('Hydrators');
        $config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . '../../Domain/Entities'));

        $client = new Client($this->uri, [], ['typeMap' => DocumentManager::CLIENT_TYPEMAP]);

        $this->dm = DocumentManager::create($client, $config);
    }

    /**
     * @return DocumentManager
     */
    public function getDm(): DocumentManager
    {
        return $this->dm;
    }

}



