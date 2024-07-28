<?php

namespace Baselinker\Api\Request;

use Baselinker\Api\Client;
use Baselinker\Api\Response\Response;
use Baselinker\Config;
use GuzzleHttp\ClientInterface;

class ExternalStorages extends Client implements ExternalStoragesInterface
{
 
    /**
     * @param \Baselinker\Config $config
     * @param \GuzzleHttp\ClientInterface|null $client
     */
    public function __construct(Config $config, ?ClientInterface $client = null)
    {
        parent::__construct($config, $client);
    }

    /**
     * @inheritDoc
     */
    public function getExternalStoragesList(): Response
    {
        return new Response(
            $this->post('getExternalStoragesList')
        );
    }

    /**
     * @inheritDoc
     */
    public function getExternalStorageCategories(string $storageId): Response
    {
        return new Response(
            $this->post('getExternalStorageCategories', [
                'storage_id' => $storageId,
            ])
        );
    }

    /**
     * @inheritDoc
     */
    public function getExternalStorageProductsData(string $storageId, array $products): Response
    {
        return new Response(
            $this->post('getExternalStorageProductsData', [
                'storage_id' => $storageId,
                'products' => $products,
            ])
        );
    }

    /**
     * @inheritDoc
     */
    public function getExternalStorageProductsList(string $storageId, array $filters = [], ?int $page = null): Response
    {
        $filters['storage_id'] = $storageId;
        $filters['page'] = $page;

        return new Response(
            $this->post('getExternalStorageProductsList', $filters)
        );
    }

    /**
     * @inheritDoc
     */
    public function getExternalStorageProductsQuantity(string $storageId, ?int $page = null): Response
    {
        return new Response(
            $this->post('getExternalStorageProductsQuantity', [
                'storage_id' => $storageId,
                'page' => $page,
            ])
        );
    }

    /**
     * @inheritDoc
     */
    public function getExternalStorageProductsPrices(string $storageId, ?int $page = null): Response
    {
        return new Response(
            $this->post('getExternalStorageProductsPrices', [
                'storage_id' => $storageId,
                'page' => $page,
            ])
        );
    }

    /**
     * @inheritDoc
     */
    public function updateExternalStorageProductsQuantity(string $storageId, array $products): Response
    {
        return new Response(
            $this->post('updateExternalStorageProductsQuantity', [
                'storage_id' => $storageId,
                'products' => $products,
            ])
        );
    }
}
