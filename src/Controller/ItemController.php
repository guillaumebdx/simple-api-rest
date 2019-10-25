<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\ItemManager;

/**
 * Class ItemController
 *
 */
class ItemController
{


    /**
     * Retrieve item listing
     *
     * @return string
     */
    public function all()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $itemManager = new ItemManager();
            $items = $itemManager->selectAll();

            return json_encode($items);
        }
        header('HTTP/1.1 405 Method Not Allowed');
    }


    /**
     * Retrieve item informations specified by $id
     *
     * @param int $id
     * @return string
     */
    public function show(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $itemManager = new ItemManager();
            $item = $itemManager->selectOneById($id);

            return json_encode($item);
        }
        header('HTTP/1.1 405 Method Not Allowed');
    }


    /**
     * Edit item by $id
     *
     * @param int $id
     */
    public function edit(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            try {
                $itemManager = new ItemManager();
                $item = $itemManager->selectOneById($id);
                $json = file_get_contents('php://input');
                $obj = json_decode($json);
                $item['title'] = $obj->title;
                $itemManager->update($item);
                header('HTTP/1.1 204 resource updated successfully');
            } catch (\Exception $e) {
                /* var_dump should be delete in production */
                var_dump($e->getMessage());
                header('HTTP/1.1 500 Internal Server Error');
            }
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
        }
    }


    /**
     * post new item
     *
     * @return string
     */
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $json = file_get_contents('php://input');
                $obj = json_decode($json);
                $itemManager = new ItemManager();
                $item = [
                    'title' => $obj->title,
                ];
                $id = $itemManager->insert($item);
                header('HTTP/1.1 201 Created');
                return json_encode(['id' => $id]);
            } catch (\Exception $e) {
                /* var_dump should be delete in production */
                var_dump($e->getMessage());
                header('HTTP/1.1 500 Internal Server Error');
            }
        }
        header('HTTP/1.1 405 Method Not Allowed');
    }


    /**
     * Handle item deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            try {
                $itemManager = new ItemManager();
                $itemManager->delete($id);
                header('HTTP/1.1 204 resource deleted successfully');
            } catch (\Exception $e) {
                /* var_dump should be delete in production */
                var_dump($e->getMessage());
                header('HTTP/1.1 500 Internal Server Error');
            }
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
        }
    }
}
